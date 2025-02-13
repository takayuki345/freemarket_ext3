<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
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
}
