<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'saad',
            'email' => 'saad@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'sheraz',
            'email' => 'sheraz@gmail.com',
            'password' => Hash::make('1234567'),
        ]);
        DB::table('users')->insert([
            'name' => 'arsalan',
            'email' => 'arsalan@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
