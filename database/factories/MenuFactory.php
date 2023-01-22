<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->colorName(),
            'description' => $this->faker->realText(155),
            'image' => $this->faker->imageUrl($width = 640, $height = 480, 'cats'),
            'category_id' => 1,
            'weight' => 500,
            'price' => 1500,
            'kilocalories' => 1100,
        ];
    }
}
