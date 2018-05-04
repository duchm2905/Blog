<?php

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
        DB::table('users')->insert([

            'email' => 'admin@HarveyNash.com',

            'password' => md5(123456),

            'name'=> 'Duc Ho Minh',

            'role'=> 'SUPER_ADMIN',

            'is_active'=> 1,

        ]);
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => md5('123456'),
            'role'=> 'MEMBER',
            'is_active'=> 1,
        ]);
        DB::table('category')->insert([

        'category_name' => 'defaultCategory',

        ]);
        DB::table('category')->insert([

            'category_name' => 'defaultCategory_2',

        ]);
    }
}
