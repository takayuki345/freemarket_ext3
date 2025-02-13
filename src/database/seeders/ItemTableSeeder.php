<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            [
                'user_id' => 1,
                'condition_id' => 1,
                'name' => 'ハードディスク・ドライブ',
                'description' => '容量：２ＧＢ',
                'image' => 'storage/item_images/HDD.jpg',
                'brand' => 'IO-DATA',
                'price' => 9980,
                'purchaser' => null,
                'payment' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'user_id' => 1,
                'condition_id' => 2,
                'name' => 'コーヒーミル',
                'description' => 'コーヒー豆も提供可能です（別途・代金をいただきます）',
                'image' => 'storage/item_images/コーヒーミル.jpg',
                'brand' => 'no brand',
                'price' => 12800,
                'purchaser' => 2,
                'payment' => 'コンビニ払い',
                'post_code' => '123-4567',
                'address' => '神奈川県横浜市２－３－４',
                'building' => 'コーチテック横浜支店３Ｆ'
            ],
            [
                'user_id' => 2,
                'condition_id' => 3,
                'name' => 'ショルダーバッグ',
                'description' => '購入して１年以内の品となります',
                'image' => 'storage/item_images/ショルダーバッグ.jpg',
                'brand' => 'ルイ・ヴィトン',
                'price' => 35000,
                'purchaser' => null,
                'payment' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'user_id' => 2,
                'condition_id' => 4,
                'name' => 'タンブラー',
                'description' => '外観は傷が目立ちますが、ほとんど使用しておらず、中はきれいです',
                'image' => 'storage/item_images/タンブラー.jpg',
                'brand' => 'ノーブランド',
                'price' => 2000,
                'purchaser' => null,
                'payment' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'user_id' => 2,
                'condition_id' => 1,
                'name' => 'ノートパソコン',
                'description' => '持ち運びに便利な「モバイルサイズ」です',
                'image' => 'storage/item_images/ノートPC.jpg',
                'brand' => 'ＮＥＣ',
                'price' => 51200,
                'purchaser' => null,
                'payment' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'user_id' => '2',
                'condition_id' => '2',
                'name' => 'マイク',
                'description' => '低音～高音まで、広範な音域に対応！',
                'image' => 'storage/item_images/マイク.jpg',
                'brand' => '',
                'price' => 23800,
                'purchaser' => 3,
                'payment' => 'コンビニ払い',
                'post_code' => '234-5678',
                'address' => '北海道旭川市３－４－５',
                'building' => 'コーチテック旭川支店１Ｆ'
            ],
            [
                'user_id' => 2,
                'condition_id' => 3,
                'name' => 'メイクセット',
                'description' => '一度しか使用していません！！',
                'image' => 'storage/item_images/メイクセット.jpg',
                'brand' => '',
                'price' => 5000,
                'purchaser' => null,
                'payment' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'user_id' => 3,
                'condition_id' => 4,
                'name' => '革靴',
                'description' => 'サイズ：２６．５ｃｍ',
                'image' => 'storage/item_images/革靴.jpg',
                'brand' => 'Edward Green',
                'price' => 7000,
                'purchaser' => null,
                'payment' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'user_id' => 3,
                'condition_id' => 1,
                'name' => '玉ねぎ ３束',
                'description' => '有機農法で栽培。甘味がつよくて、安心・安全なたまねぎとなります。',
                'image' => 'storage/item_images/玉ねぎ3束.jpg',
                'brand' => '自家栽培',
                'price' => 850,
                'purchaser' => null,
                'payment' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'user_id' => 3,
                'condition_id' => 2,
                'name' => '腕時計',
                'description' => '※防水対応',
                'image' => 'storage/item_images/腕時計.jpg',
                'brand' => 'emporio armani',
                'price' => 12000,
                'purchaser' => 1,
                'payment' => 'カード支払い',
                'post_code' => '567-8901',
                'address' => '沖縄県那覇市５－６－７',
                'building' => 'コーチテックマンション２０５'
            ]
        ];
        DB::table('items')->insert($contents);
    }
}
