<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    public function run()
    {
        DB::table('staff')->insert([
            [
                'login' => 'Test',
                'email' => 'test@mail.ru',
                'password' => Hash::make('Test1111'),
                'role_id' => 1,
            ]
        ]);
    }
}
