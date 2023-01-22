<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'name' => 'Новый'
            ],
            [
                'name' => 'Подтверждён'
            ],
            [
                'name' => 'Отменён'
            ],
        ]);
    }
}
