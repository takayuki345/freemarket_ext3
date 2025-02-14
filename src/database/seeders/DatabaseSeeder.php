<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            UserInfosTableSeeder::class,
            ConditionTableSeeder::class,
            CategoryTableSeeder::class,
            PaymentTableSeeder::class,
            ItemTableSeeder::class,
            CategoryItemTableSeeder::class,
            CommentTableSeeder::class,
            LikeTableSeeder::class,
        ]);
    }
}
