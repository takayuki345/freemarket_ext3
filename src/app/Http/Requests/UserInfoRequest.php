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
            'image' => ['mimes:jpeg,png'],
            'name' => 'required',
            'post_code' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
            'address' => 'required',
            'building' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'jpeg もしくは png のファイル形式を指定して下さい',
            'name.required' => 'お名前を入力して下さい',
            'post_code.required' => '郵便番号を入力して下さい',
            'post_code.regex' => '郵便番号をハイフンありの8文字で入力して下さい（例）123-4567',
            'address.required' => '住所を入力して下さい',
            'building.required' => '建物を入力して下さい',
        ];
    }
}
