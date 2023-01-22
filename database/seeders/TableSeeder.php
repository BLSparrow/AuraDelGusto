<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tables')->insert([
            [
                'number' => 1,
                'image' => 'table_for_2.jpg',
                'quantity' => 2,
            ],
            [
                'number' => 2,
                'image' => 'table_for_2_2.jpg',
                'quantity' => 2,
            ],
            [
                'number' => 3,
                'image' => 'table_for_4.jpg',
                'quantity' => 4,
            ],
            [
                'number' => 4,
                'image' => 'table_for_4_2.jpg',
                'quantity' => 4,
            ]
        ]);
    }
}
