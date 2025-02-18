<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        if (isset(User::find($userId)->userInfo)) {

            $userInfo = User::find($userId)->userInfo;
            $button = '更新する';
            
        } else {

            $userInfo = [
                'image' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ];
            $button = '登録する';

        }

        return view('edit-profile', compact('user', 'userInfo', 'button'));

    }

    public function update(UserInfoRequest $request)
    {

        $dir = 'profile_images';
        $userId = Auth::id();

        User::find($userId)->update([
            'name' => $request->name
        ]);

        if (isset(User::find($userId)->userInfo)) {

            $userInfo = User::find($userId)->userInfo;

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

        } else {

            $userInfo = new UserInfo();
            $userInfo->user_id = $userId;

            if (!is_null($request->file('image'))) {
                $fileName = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs($dir, $fileName, 'public');
                $userInfo->image = 'storage/' . $dir . '/' . $fileName;
            }

            $userInfo->post_code = $request->post_code;
            $userInfo->address = $request->address;
            $userInfo->building = $request->building;
            $userInfo->save();

        }

        return redirect('/mypage');

    }
}
