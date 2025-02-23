<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
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
                'name' => 'test1',
                'email' => 'test1@test',
                'email_verified_at' => '2025-01-01 00:00:20',
                'password' => \Hash::make('test1test1')
            ],
            [
                'id' => 2,
                'name' => 'test2',
                'email' => 'test2@test',
                'email_verified_at' => '2025-01-01 00:00:20',
                'password' => \Hash::make('test2test2')
            ],
            [
                'id' => 3,
                'name' => 'test3',
                'email' => 'test3@test',
                'email_verified_at' => '2025-01-01 00:00:20',
                'password' => \Hash::make('test3test3')
            ]
        ];
        DB::table('users')->insert($contents);
    }
}
