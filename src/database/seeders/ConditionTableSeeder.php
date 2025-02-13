<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionTableSeeder extends Seeder
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
                'id' => '1',
                'name' => '良好'
            ],
            [
                'id' => '2',
                'name' => '目立った傷や汚れなし'
            ],
            [
                'id' => '3',
                'name' => 'やや傷や汚れあり'
            ],
            [
                'id' => '4',
                'name' => '状態が悪い'
            ]
        ];
        DB::table('conditions')->insert($contents);
    }
}
