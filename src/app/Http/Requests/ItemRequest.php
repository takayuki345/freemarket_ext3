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
            //画像サイズ容量の制限を設ける
            'image' => 'required',
            'category' => 'required',
            'condition' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => '画像を選択してください',
            'category.required' => 'カテゴリーを１つ以上選択してください',
            'condition.required' => '状態を選択してください',
            'name.required' => '商品名を入力してください',
            'description.required' => '商品説明を入力してください',
            'price.required' => '金額を入力してください',
        ];
    }
}
