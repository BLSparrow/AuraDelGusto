<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('category_products')->insert([
            [
                'name' => 'Пицца',
                'description' => 'Традиционное итальянское блюдо в виде тонкой круглой лепёшки (пирога).',
                'image' => 'pizza.jpg',
            ],
            [
                'name' => 'Паста',
                'description' => 'Италия и паста — это практически синонимы.',
                'image' => 'pasts.jpg',
            ],
            [
                'name' => 'Салаты',
                'description' => 'Салаты, они и в Африке - салаты',
                'image' => 'salads.jpg',
            ],
            [
                'name' => 'Супы',
                'description' => 'Супы иногда подают в качестве примо, или первого блюда итальянской кухни',
                'image' => 'soups.jpg',
            ],
            [
                'name' => 'Десерты',
                'description' => 'Десерты, когда-то рожденные в Италии, уже стали традиционным лакомством во многих странах.',
                'image' => 'sweets.jpg',
            ],
            [
                'name' => 'Напитки',
                'description' => 'В Италии найдется превосходный вариант для всех случаев жизни.',
                'image' => 'drinks.jpg',
            ],
        ]);
    }
}
