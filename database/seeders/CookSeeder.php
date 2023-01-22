<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CookSeeder extends Seeder
{
    public function run()
    {
        DB::table('cooks')->insert([
            [
                'name' => 'Франческо Баритоно',
                'image' => 'chefs/chefs-1.jpg',
                'position' => 'Шеф-повар',
            ],
            [
                'name' => 'Лаура Арутинян',
                'image' => 'chefs/chefs-2.jpg',
                'position' => 'Кондитер',
            ],
            [
                'name' => 'Антон Пан',
                'image' => 'chefs/chefs-3.jpg',
                'position' => 'Повар',
            ]
        ]);
    }
}
