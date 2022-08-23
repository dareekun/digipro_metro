<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class department extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_list')->insert([
            'id' => 0,
            'department' => 'Developer',
        ]);
        DB::table('department_list')->insert([
            'id' => 1,
            'department' => 'Production',
        ]);
        DB::table('department_list')->insert([
            'id' => 2,
            'department' => 'Quality Control',
        ]);
        DB::table('department_list')->insert([
            'id' => 3,
            'department' => 'Warehouse',
        ]);
    }
}
