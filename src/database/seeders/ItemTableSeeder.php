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
                'id' => 1,
                'user_id' => 1,
                'condition_id' => 2,
                'name' => 'HDD',
                'description' => '高速で信頼性の高いハードディスク',
                'image' => 'storage/item_images/HDD.jpg',
                'brand' => 'IO-DATA',
                'price' => 5000,
                'purchase_user_id' => null,
                'payment_id' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'condition_id' => 1,
                'name' => 'コーヒーミル',
                'description' => '手動のコーヒーミル',
                'image' => 'storage/item_images/コーヒーミル.jpg',
                'brand' => 'no brand',
                'price' => 4000,
                'purchase_user_id' => 2,
                'payment_id' => 1,
                'post_code' => '123-4567',
                'address' => '神奈川県横浜市２－３－４',
                'building' => 'コーチテック横浜支店３Ｆ'
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'condition_id' => 3,
                'name' => 'ショルダーバッグ',
                'description' => 'おしゃれなショルダーバッグ',
                'image' => 'storage/item_images/ショルダーバッグ.jpg',
                'brand' => 'ルイ・ヴィトン',
                'price' => 3500,
                'purchase_user_id' => null,
                'payment_id' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'id' => 4,
                'user_id' => 2,
                'condition_id' => 4,
                'name' => 'タンブラー',
                'description' => '使いやすいタンブラー',
                'image' => 'storage/item_images/タンブラー.jpg',
                'brand' => 'ノーブランド',
                'price' => 500,
                'purchase_user_id' => null,
                'payment_id' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'id' => 5,
                'user_id' => 2,
                'condition_id' => 1,
                'name' => 'ノートPC',
                'description' => '高性能なノートパソコン',
                'image' => 'storage/item_images/ノートPC.jpg',
                'brand' => 'ノーブランド',
                'price' => 45000,
                'purchase_user_id' => null,
                'payment_id' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'id' => 6,
                'user_id' => '2',
                'condition_id' => '2',
                'name' => 'マイク',
                'description' => '高音質のレコーディング用マイク',
                'image' => 'storage/item_images/マイク.jpg',
                'brand' => '',
                'price' => 8000,
                'purchase_user_id' => 3,
                'payment_id' => 2,
                'post_code' => '234-5678',
                'address' => '北海道旭川市３－４－５',
                'building' => 'コーチテック旭川支店１Ｆ'
            ],
            [
                'id' => 7,
                'user_id' => 2,
                'condition_id' => 2,
                'name' => 'メイクセット',
                'description' => '便利なメイクアップセット',
                'image' => 'storage/item_images/メイクセット.jpg',
                'brand' => '',
                'price' => 2500,
                'purchase_user_id' => null,
                'payment_id' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'id' => 8,
                'user_id' => 3,
                'condition_id' => 4,
                'name' => '革靴',
                'description' => 'クラシックなデザインの革靴',
                'image' => 'storage/item_images/革靴.jpg',
                'brand' => 'Edward Green',
                'price' => 4000,
                'purchase_user_id' => null,
                'payment_id' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'id' => 9,
                'user_id' => 3,
                'condition_id' => 3,
                'name' => '玉ねぎ3束',
                'description' => '新鮮な玉ねぎ3束のセット',
                'image' => 'storage/item_images/玉ねぎ3束.jpg',
                'brand' => '自家栽培',
                'price' => 300,
                'purchase_user_id' => null,
                'payment_id' => null,
                'post_code' => null,
                'address' => null,
                'building' => null
            ],
            [
                'id' => 10,
                'user_id' => 3,
                'condition_id' => 1,
                'name' => '腕時計',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'image' => 'storage/item_images/腕時計.jpg',
                'brand' => 'emporio armani',
                'price' => 15000,
                'purchase_user_id' => 1,
                'payment_id' => 1,
                'post_code' => '567-8901',
                'address' => '沖縄県那覇市５－６－７',
                'building' => 'コーチテックマンション２０５'
            ]
        ];
        DB::table('items')->insert($contents);
    }
}
