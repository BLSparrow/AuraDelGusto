<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryIngredientsSeeder extends Seeder
{
    public function run()
    {
        DB::table('category_ingredients')->insert([
            [
                'name' => 'Тесто',
            ],
            [
                'name' => 'Зелень',
            ],
            [
                'name' => 'Овощи-крупы',
            ],
            [
                'name' => 'Сыромолочная продукция',
            ],
            [
                'name' => 'Грибы',
            ],
            [
                'name' => 'Мясные изделия',
            ],
            [
                'name' => 'Вина',
            ],
            [
                'name' => 'Соуса',
            ],
            [
                'name' => 'Фрукты-ягоды',
            ],
            [
                'name' => 'Паста',
            ],
            [
                'name' => 'Морепродукты',
            ],
            [
                'name' => 'Остальное',
            ],
        ]);
    }
}
