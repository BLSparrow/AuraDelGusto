<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->insert([
            //Пицца
            [
                'name' => 'Маргарита',
                'description' => 'Самая простая и, пожалуй, самая главная. Настоящая королева пицц - "Маргарита".',
                'image' => 'margarita.jpg',
                'category_id' => 1,
                'weight' => 420,
                'price' => 425,
                'kilocalories' => 1384,
            ],
            [
                'name' => 'Неаполитанская',
                'description' => 'Неаполитанская пицца — небольшая, пышная, с высокими бортами. В Неаполе её едят складывая пополам или даже вчетверо.',
                'image' => 'neopolitan.jpg',
                'category_id' => 1,
                'weight' => 490,
                'price' => 390,
                'kilocalories' => 1220,
            ],
            [
                'name' => 'Кальцоне',
                'description' => 'Это закрытая пицца. Ее загибают поперек и защипывают по краям, похожа на большой чебурек.',
                'image' => 'calzone.jpg',
                'category_id' => 1,
                'weight' => 320,
                'price' => 455,
                'kilocalories' => 1260,
            ],
            //Паста
            [
                'name' => 'Карбонара',
                'description' => 'Самая популярная итальянская паста в мире.',
                'image' => 'karbonara.jpg',
                'category_id' => 2,
                'weight' => 290,
                'price' => 320,
                'kilocalories' => 500,
            ],
            [
                'name' => 'Болоньезе',
                'description' => 'Изысканое сочетание макаронных изделий с соусом Болоньезе.',
                'image' => 'balonez.jpg',
                'category_id' => 2,
                'weight' => 280,
                'price' => 370,
                'kilocalories' => 560,
            ],
            [
                'name' => 'Лингвини с морепродуктами',
                'description' => 'Паста для любителей морепродуктов',
                'image' => 'lingvini.jpg',
                'category_id' => 2,
                'weight' => 280,
                'price' => 410,
                'kilocalories' => 380,
            ],
            //Салаты
            [
                'name' => 'Пармеджано',
                'description' => 'Салат из печёного баклажана с Прованскими травами',
                'image' => 'baklazani_parmedzhano.jpg',
                'category_id' => 3,
                'weight' => 150,
                'price' => 335,
                'kilocalories' => 220,
            ],
            [
                'name' => 'Капрезе',
                'description' => 'Томатный взрыв, украшенный моцареллой',
                'image' => 'kapreze.jpg',
                'category_id' => 3,
                'weight' => 120,
                'price' => 310,
                'kilocalories' => 172,
            ],
            //Супы
            [
                'name' => 'Минестроне',
                'description' => 'Минестроне – не просто суп. Это символ итальянских принципов питания.',
                'image' => 'minestrone.jpg',
                'category_id' => 4,
                'weight' => 235,
                'price' => 250,
                'kilocalories' => 233,
            ],
            [
                'name' => 'Томатный гаспачо',
                'description' => 'Лёгкий овощной суп - прекрасная альтернатива окрошке.',
                'image' => 'tomat_gaspacho.jpg',
                'category_id' => 4,
                'weight' => 230,
                'price' => 220,
                'kilocalories' => 205,
            ],
            [
                'name' => 'Огуречный гаспачо',
                'description' => 'Лёгкий овощной суп - прекрасная альтернатива окрошке.',
                'image' => 'cucumber_gaspacho.jpg',
                'category_id' => 4,
                'weight' => 230,
                'price' => 220,
                'kilocalories' => 205,
            ],
            //Десерты
            [
                'name' => 'Панна котта',
                'description' => 'Североитальянский десерт из сливок, сахара, желатина и ванили.',
                'image' => 'panacota.jpg',
                'category_id' => 5,
                'weight' => 110,
                'price' => 200,
                'kilocalories' => 180,
            ],
            [
                'name' => 'Аффогато',
                'description' => 'Десерт на основе кофе.',
                'image' => 'afogato.jpg',
                'category_id' => 5,
                'weight' => 162,
                'price' => 235,
                'kilocalories' => 240,
            ],
            //Напитки
            [
                'name' => 'Капучино',
                'description' => 'Кофейный напиток, который традиционно готовят с двойным эспрессо, молоком и пеной.',
                'image' => 'kapuchino.jpeg',
                'category_id' => 6,
                'weight' => 120,
                'price' => 90,
                'kilocalories' => 45,
            ],
            [
                'name' => 'Чинотто',
                'description' => 'Итальянский ответ американской кока-коле',
                'image' => 'chinotto.jpg',
                'category_id' => 6,
                'weight' => 330,
                'price' => 180,
                'kilocalories' => 143,
            ],
        ]);
    }
}
