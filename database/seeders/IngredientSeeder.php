<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->insert([
            [
                'name' => 'дрожжевое тесто',
                'kcal' => 292,
                'price' => 77,
                'category_id' => 1
            ],
            [
                'name' => 'базилик зелёный',
                'kcal' => 27,
                'price' => 395,
                'category_id' => 2
            ],
            [
                'name' => 'масло оливковое',
                'kcal' => 898,
                'price' => 555,
                'category_id' => 8
            ],
            [
                'name' => 'соус томатный',
                'kcal' => 134,
                'price' => 640,
                'category_id' => 8
            ],
            [
                'name' => 'помидоры',
                'kcal' => 18,
                'price' => 200,
                'category_id' => 3
            ],
            [
                'name' => 'сыр Моцарелла',
                'kcal' => 242,
                'price' => 504,
                'category_id' => 4
            ],
            [
                'name' => 'сладкий перец',
                'kcal' => 31,
                'price' => 370,
                'category_id' => 3
            ],
            [
                'name' => 'оливки',
                'kcal' => 115,
                'price' => 480,
                'category_id' => 3
            ],
            [
                'name' => 'анчоусы',
                'kcal' => 131,
                'price' => 800,
                'category_id' => 11
            ],
            [
                'name' => 'шампиньоны',
                'kcal' => 27,
                'price' => 272,
                'category_id' => 5
            ],
            [
                'name' => 'куриное филе',
                'kcal' => 110,
                'price' => 460,
                'category_id' => 6
            ],
            [
                'name' => 'сыр Пармезан',
                'kcal' => 392,
                'price' => 900,
                'category_id' => 4
            ],
            [
                'name' => 'спагетти',
                'kcal' => 344,
                'price' => 216,
                'category_id' => 10
            ],
            [
                'name' => 'бекон',
                'kcal' => 393,
                'price' => 620,
                'category_id' => 6
            ],
            [
                'name' => 'яичный желток',
                'kcal' => 352,
                'price' => 390,
                'category_id' => 12
            ],
            [
                'name' => 'свинина',
                'kcal' => 259,
                'price' => 259,
                'category_id' => 6
            ],
            [
                'name' => 'говядина',
                'kcal' => 187,
                'price' => 570,
                'category_id' => 6
            ],
            [
                'name' => 'сельдерей',
                'kcal' => 14,
                'price' => 599,
                'category_id' => 2
            ],
            [
                'name' => 'красное вино',
                'kcal' => 250,
                'price' => 655,
                'category_id' => 7
            ],
            [
                'name' => 'белое вино',
                'kcal' => 150,
                'price' => 646,
                'category_id' => 7
            ],
            [
                'name' => 'лингвини',
                'kcal' => 157,
                'price' => 250,
                'category_id' => 10
            ],
            [
                'name' => 'креветки',
                'kcal' => 95,
                'price' => 451,
                'category_id' => 11
            ],
            [
                'name' => 'кальмар',
                'kcal' => 100,
                'price' => 528,
                'category_id' => 11
            ],
            [
                'name' => 'морской гребешок',
                'kcal' => 92,
                'price' => 839,
                'category_id' => 11
            ],
            [
                'name' => 'баклажаны',
                'kcal' => 24,
                'price' => 450,
                'category_id' => 3
            ],
            [
                'name' => 'фасоль',
                'kcal' => 14,
                'price' => 440,
                'category_id' => 3
            ],
            [
                'name' => 'картофель',
                'kcal' => 77,
                'price' => 285,
                'category_id' => 3
            ],
            [
                'name' => 'Панчетта',
                'kcal' => 460,
                'price' => 1010,
                'category_id' => 6
            ],
            [
                'name' => 'огурцы',
                'kcal' => 15,
                'price' => 214,
                'category_id' => 3
            ],
            [
                'name' => 'мороженное',
                'kcal' => 207,
                'price' => 406,
                'category_id' => 4
            ],
            [
                'name' => 'сливки',
                'kcal' => 206,
                'price' => 500,
                'category_id' => 4
            ],
            [
                'name' => 'кофе',
                'kcal' => 1,
                'price' => 750,
                'category_id' => 12
            ],
            [
                'name' => 'желатин',
                'kcal' => 355,
                'price' => 1200,
                'category_id' => 12
            ],
            [
                'name' => 'клубника',
                'kcal' => 41,
                'price' => 470,
                'category_id' => 9
            ],
        ]);
    }
}
