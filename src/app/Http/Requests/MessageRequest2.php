<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest2 extends FormRequest
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
            'content_edit.*' => ['required', 'max:400'],
            'post_image.*' => ['mimes:jpeg,png'],

        ];
    }

    public function messages()
    {
        return [
            'content_edit.*.required' => '本文を入力して下さい',
            'content_edit.*.max' => '本文は400文字以内で入力してください',
            'post_image.*.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
        ];
    }
}
