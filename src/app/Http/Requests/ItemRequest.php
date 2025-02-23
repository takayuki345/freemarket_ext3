<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            // 画像サイズ容量の制限を設ける？
            'image' => ['required', 'mimes:jpeg,png'],
            'category' => 'required',
            'condition' => 'required',
            'name' => 'required',
            'description' => ['required', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'image.required' => '画像を選択してください',
            'image.mimes' => 'jpeg もしくは png のファイル形式を指定して下さい',
            'category.required' => 'カテゴリーを１つ以上選択してください',
            'condition.required' => '状態を選択してください',
            'name.required' => '商品名を入力してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '255文字以下で入力して下さい',
            'price.required' => '金額を入力してください',
            'price.numeric' => '数字で入力してください',
            'price.min' => '0円以上で入力してください'
        ];
    }
}
