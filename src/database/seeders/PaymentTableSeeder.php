<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder
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
                'name' => 'コンビニ払い',
                'method' => 'konbini'
            ],
            [
                'id' => 2,
                'name' => 'カード支払い',
                'method' => 'card'
            ]
        ];
        DB::table('payments')->insert($contents);
    }
}
