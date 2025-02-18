<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'image' => 'required',
            'name' => 'required',
            'post_code' => 'required',
            'address' => 'required',
            'building' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'image.required' => '画像を選択して下さい',
            'name.required' => 'お名前を入力して下さい',
            'post_code.required' => '郵便番号を入力して下さい',
            'address.required' => '住所を入力して下さい',
            'building.required' => '建物を入力して下さい',
        ];
    }
}
