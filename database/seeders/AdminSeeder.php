<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'role' => 1,
            'email' => 'saad@gmail.com',
            'password' => bcrypt('admin@123'),
        ]);
        Admin::create([
            'name' => 'Sheraz shoaib',
            'role' => 2,
            'email' => 'sheraz@gmail.com',
            'password' => bcrypt('sherazshoaib@123'),
        ]);
    }
}
