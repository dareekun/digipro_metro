<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Developer',
            'username' => 'developer',
            'department' => 999,
            'line' => 0,
            'password' => bcrypt('developer123'),
            'role' => 'developer',
        ]);
        DB::table('users')->insert([
            'name' => 'Manager',
            'username' => 'manager',
            'department' => 1,
            'line' => 0,
            'password' => bcrypt('manager123'),
            'role' => 'manager',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'department' => 1,
            'line' => 0,
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'User 01',
            'username' => 'user1',
            'department' => 1,
            'line' => 0,
            'password' => bcrypt('user123'),
            'role' => 'user',
        ]);
    }
}
