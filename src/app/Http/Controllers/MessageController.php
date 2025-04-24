<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Requests\MessageRequest2;
use App\Models\Item;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

    public function index($item_id)
    {
        $item = Item::find($item_id);
        $userId = Auth::id();
        if((($item->user_id == $userId || $item->purchase_user_id == $userId) && ($item->message_status == 1 || $item->message_status == 2)) == false) {
                    return redirect('/mypage?page=trade');
        }

        Item::find($item_id)->messages()->where('user_id', '!=', $userId)
                                        ->where('unchecked', 1)
                                        ->update(
                                            ['unchecked' => 0]
                                        );

        $otherItems = Item::where(function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->orWhere('purchase_user_id', $userId);
        })->whereIn('message_status', [1, 2])
        ->where('id', '!=', $item_id)
        ->where(function ($query) use ($userId){
            $query->where(function ($subQuery) use ($userId) {
                $subQuery->where('user_id', $userId)
                    ->whereNull('purchase_user_evaluation');
            })
            ->orWhere(function ($subQuery) use ($userId) {
                $subQuery->where('purchase_user_id', $userId)
                    ->whereNull('user_evaluation');
            });
        })
        ->orderBy('message_updated_at', 'desc')
        ->get();

        return view('trade', compact('item', 'otherItems', 'userId'));

    }

    public function store($item_id, MessageRequest $request)
    {
        $dir = 'message_images';
        $userId = Auth::id();

        $message = new Message();
        $message->item_id = $item_id;
        $message->user_id = $userId;
        $message->content = $request->content;
        if (!is_null($request->file('image'))) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs($dir, $fileName, 'public');
            $message->image = 'storage/' . $dir . '/' . $fileName;
        } else {
            $message->image = null;
        }
        $message->unchecked = true;
        $message->save();

        $item = Item::find($item_id);
        $item->message_updated_at = Carbon::now();
        $item->save();

        return redirect('/mypage/trade/' . $item_id);
    }

    public function update($item_id, $message_id, MessageRequest2 $request)
    {

        $dir = 'message_images';

        $message = Message::find($message_id);
        if (!is_null($request->file('post_image'))) {
            $fileName = current($request->file('post_image'))->getClientOriginalName();
            current($request->file('post_image'))->storeAs($dir, $fileName, 'public');
            $message->image = 'storage/' . $dir . '/' . $fileName;
        }
        $message->content = current($request->content_edit);
        $message->unchecked = true;
        $message->save();

        return redirect('/mypage/trade/' . $item_id);
    }

    public function destroy($item_id, $message_id)
    {
        $message = Message::find($message_id);
        $message->delete();

        return redirect('/mypage/trade/' . $item_id);

    }

    public function complete($item_id)
    {
        $uncheckedCount = Message::where('item_id', $item_id)
                        ->where('unchecked', true)
                        ->count();

        if ($uncheckedCount > 0) {
            return redirect('/mypage/trade/' . $item_id)->with('message', '※未読があり完了不可！');
        }

        $item = Item::find($item_id);
        $item->message_status = 2;
        $item->save();

        return redirect('/mypage/trade/' . $item_id);
    }

    public function send($item_id, Request $request)
    {
        $userId = Auth::id();
        $evaluation = $request->evaluation;
        $item = Item::find($item_id);
        if ($item->user_id == $userId) {
            $item->purchase_user_evaluation = $evaluation;
            $item->message_status = 3;
        } elseif ($item->purchase_user_id == $userId) {
            $item->user_evaluation = $evaluation;
        }
        $item->save();

        if ($item->purchase_user_id == $userId) {


            Mail::raw('商品「' . $item->name . '」について、購入者の「' . $item->purchaseUser->name . '」さんが取引完了されたことをお知らせします。', function ($message) use ($item) {
                $message->to($item->user->email)->subject('※ 取引完了のおしらせ');
            });
        }

        return redirect('/')->with('message', '※取引が完了しました！');
    }
}
