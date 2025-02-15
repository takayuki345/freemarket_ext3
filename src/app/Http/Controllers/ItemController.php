<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Like;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class ItemController extends Controller
{
    public function create()
    {
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

        $items = $query->get();

        return view('index', compact('page', 'items'));
    }

    public function show($item_id)
    {
        $userId = Auth::id();

        $item = Item::find($item_id);
        $categories = Item::find($item_id)->categories()->get();
        $condition = Item::find($item_id)->condition()->first();
        $comments = Item::find($item_id)->comments()->get();
        $liked = Like::where('item_id', $item_id)->where('user_id', $userId)->exists();
        $likedCount = Like::where('item_id', $item_id)->count();

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
}
