<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $userInfo = User::find($userId)->userInfo()->first();

        return view('edit-profile', compact('user', 'userInfo'));
    }

    public function update(UserInfoRequest $request)
    {

        $dir = 'image';
        $userId = Auth::id();
        User::find($userId)->update([
            'name' => $request->name
        ]);

        $userInfo = User::find($userId)->userInfo()->first();

        if (is_null($request->file('image'))) {
            $userInfo->update([
                'post_code' => $request->post_code,
                'address' => $request->address,
                'building' => $request->building
            ]);
        } else {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs($dir, $fileName, 'public');
            $userInfo->update([
                'image' => 'storage/' . $dir . '/' . $fileName,
                'post_code' => $request->post_code,
                'address' => $request->address,
                'building' => $request->building
            ]);
        }



        return redirect('/mypage');
    }
}
