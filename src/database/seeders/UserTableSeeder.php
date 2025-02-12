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
        $content = [
            'id' => 1,
            'name' => 'test',
            'email' => 'test@test',
            'password' => \Hash::make('testtest')
        ];
        DB::table('users')->insert($content);
    }
}
