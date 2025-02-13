<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInfosTableSeeder extends Seeder
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
                'image' => '/storage/profile_images/car.jpg',
                'post_code' => '012-3456',
                'address' => '東京都港区１－２ー３',
                'building' => 'コーチテック本社１０Ｆ',
            ],
            [
                'user_id' => 2,
                'image' => '/storage/profile_images/pc.jpg',
                'post_code' => '123-4567',
                'address' => '神奈川県横浜市２－３－４',
                'building' => 'コーチテック横浜支店３Ｆ',
            ],
            [
                'user_id' => 2,
                'image' => '/storage/profile_images/bell.jpg',
                'post_code' => '234-5678',
                'address' => '北海道旭川市３－４－５',
                'building' => 'コーチテック旭川支店１Ｆ',
            ]
        ];
        DB::table('user_infos')->insert($contents);
    }
}
