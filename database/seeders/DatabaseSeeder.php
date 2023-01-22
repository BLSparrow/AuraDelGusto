<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            TableSeeder::class,
            StatusSeeder::class,
            CategoryIngredientsSeeder::class,
            IngredientSeeder::class,
            CategoryProductsSeeder::class,
            MenuSeeder::class,
            IngredientMenuSeeder::class,
            RoleSeeder::class,
            StaffSeeder::class,
            CookSeeder::class,
        ]);

        User::factory(3)->create();
        Booking::factory(1)->create();
    }
}
