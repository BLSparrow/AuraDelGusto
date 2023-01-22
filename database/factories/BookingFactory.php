<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-30 days', 'now');

        return [
            'user_id' => 1,
            'table_id' => 1,
            'dateStart' => $date,
            'dateEnd' => $this->faker->dateTimeInInterval($date, '+ 5 hours'),
            'prepayment' => 5.5,
        ];
    }
}
