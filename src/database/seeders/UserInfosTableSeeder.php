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
        $content = [
            'user_id' => 1,
            'image' => '/storage/images/profile001',
            'post_code' => '0123456',
            'address' => '東京都港区１－２ー３',
            'building' => 'コーチテックビルディング１Ｆ',
        ];
        DB::table('user_infos')->insert($content);
    }
}
