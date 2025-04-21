<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Like;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Stripe\StripeClient;

class ItemController extends Controller
{
    public function create()
    {
        $userId = Auth::id();

        if (!isset(User::find($userId)->userInfo)) {
            return redirect('/mypage/profile');
        }

        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell', compact('categories', 'conditions'));
    }

    public function store(ItemRequest $request)
    {
        $dir = 'item_images';
        $fileName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs($dir, $fileName, 'public');

        $userId = Auth::id();
        $item = new Item();
        $item->user_id = $userId;
        $item->condition_id = $request->condition;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image = 'storage/' . $dir. '/' . $fileName;
        $item->brand = '';
        $item->price = $request->price;
        $item->save();

        $item->categories()->sync($request->category);

        return redirect('/mypage');
    }

    public function index(Request $request)
    {

        $page = null;
        $userId = null;
        $keyword = $request->keyword;

        if (Auth::check()) {
            $userId = Auth::id();
        }

        $query = Item::query();

        if ($request->page == 'mylist') {

            $page = 'mylist';

            $query->whereIn('id', Like::select('item_id')->where('user_id', $userId));

        } else {

            if ($userId != null) {

                $query->where('user_id', '!=', Auth::id());
            }

        }


        if (isset($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        $items = $query->get();


        return view('index', compact('page', 'items', 'keyword'));
    }

    public function show($item_id)
    {
        $userId = Auth::id();

        $item = Item::find($item_id);
        $categories = Item::find($item_id)->categories;
        $condition = Item::find($item_id)->condition;
        $comments = Item::find($item_id)->comments;
        $liked = Like::where('item_id', $item_id)->where('user_id', $userId)->exists();
        $likedCount = Like::where('item_id', $item_id)->count();
        session()->forget(['post_code', 'address', 'building']);

        return view('detail', compact('item', 'categories', 'condition', 'comments', 'liked', 'likedCount'));
    }

    public function like($item_id)
    {
        $userId = Auth::id();
        $liked = Like::where('item_id', $item_id)->where('user_id', $userId)->exists();

        if($liked) {
            Item::find($item_id)->likes()->detach($userId);
        } else {
            Item::find($item_id)->likes()->attach($userId);
        }

        return redirect('/item/' . $item_id);
    }

    public function prePurchase($item_id)
    {
        $userId = Auth::id();

        if (!isset(User::find($userId)->userInfo)) {
            return redirect('/mypage/profile');
        }

        $userInfo = User::find($userId)->userInfo;

        $item = Item::find($item_id);

        if (!is_null($item->purchase_user_id)) {
            return redirect('/item/' . $item->id)->with('message', '※こちらの商品は販売済です！');
        }

        $payments = Payment::all();

        $purchaseInfo = [
            'post_code' => session('post_code', $userInfo->post_code),
            'address' => session('address', $userInfo->address),
            'building' => session('building', $userInfo->building)
        ];

        return view('pre-purchase', compact('item', 'payments', 'purchaseInfo'));
    }

    public function tempEdit($item_id)
    {
        $item = Item::find($item_id);

        if (!is_null($item->purchase_user_id)) {
            return redirect('/item/' . $item->id)->with('message', '※こちらの商品は販売済です！');
        }

        $userId = Auth::id();
        $userInfo = User::find($userId)->userInfo;

        $purchaseInfo = [
            'payment_id' => session('payment_id', null),
            'post_code' => session('post_code', $userInfo->post_code),
            'address' => session('address', $userInfo->address),
            'building' => session('building', $userInfo->building)
        ];

        return view('edit-address', compact('purchaseInfo', 'item_id'));
    }

    public function tempUpdate($item_id, AddressRequest $request)
    {
        $item = Item::find($item_id);

        if (!is_null($item->purchase_user_id)) {
            return redirect('/item/' . $item->id)->with('message', '※こちらの商品は販売済です！');
        }

        session([
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building
        ]);

        return redirect('/purchase/' . $item_id);
    }

    public function mypage(Request $request)
    {
        $userId = Auth::id();
        $userInfo = User::find($userId)->userInfo;

        if (!isset($userInfo)) {
            return redirect('/mypage/profile');
        }

        $page = $request->page;
        $items = null;

        $user = User::find($userId);

        if ($page == 'buy') {
            $items = Item::where('purchase_user_id', $userId)->get();
        } elseif ($page == 'trade') {

            $items = Item::where(function ($query) use ($userId) {
                        $query->where('user_id', $userId)
                        ->orWhere('purchase_user_id', $userId);
                    })->whereIn('message_status', [1, 2])
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


        } else {
            $items = User::find($userId)->items;
        }

        if ($user->totalEvaluationCount() == 0) {
            $evaluation = 0;
        } else {
            $evaluation = round($user->totalEvaluation() / $user->totalEvaluationCount());
        }

        return view('mypage', compact('user', 'userInfo', 'items', 'page', 'evaluation'));
    }

    public function purchase(PurchaseRequest $request)
    {
        $itemId = $request->item_id;
        $item = Item::find($itemId);

        if (!is_null($item->purchase_user_id)) {
            return redirect('/item/' . $item->id)->with('message', '※こちらの商品は販売済です！');
        }

        $userId = Auth::id();
        $stripe = new StripeClient(config('stripe.stripe_secret_key'));

        $paymentId = $request->payment_id;
        $paymentMethod = Payment::find($paymentId)->method;
        $amount = $item->price;
        $postCode = $request->post_code;
        $address = urlencode($request->address);
        $building = urlencode($request->building);

        $checkoutSession = $stripe->checkout->sessions->create([
            'payment_method_types' => [$paymentMethod],
            'payment_method_options' => [
                'konbini' => ['expires_after_days' => 7,],
            ],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => ['name' => $item->name],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => "http://localhost/purchase/{$itemId}/success?user_id={$userId}&amount={$amount}&payment_id={$paymentId}&post_code={$postCode}&address={$address}&building={$building}",
            ]
        );

        return redirect($checkoutSession->url);

    }

    public function success($item_id, Request $request)
    {
        if(!$request->user_id || !$request->amount || !$request->payment_id || !$request->post_code || !$request->address || !$request->building){
            throw new Exception("stripe決済想定後処理にて、パラメータ不足のエラー発生！");
        }

        $stripe = new StripeClient(config('stripe.stripe_secret_key'));

        $stripe->charges->create([
            'amount' => $request->amount,
            'currency' => 'jpy',
            'source' => 'tok_visa',
        ]);

        $item = Item::find($item_id);

        $item->purchase_user_id = $request->user_id;
        $item->payment_id = $request->payment_id;
        $item->post_code = $request->post_code;
        $item->address = $request->address;
        $item->building = $request->building;

        $item->message_status = 1;
        $item->message_updated_at = Carbon::now();

        $item->save();

        return redirect('/')->with('message', '※商品を購入しました！');

    }

}
