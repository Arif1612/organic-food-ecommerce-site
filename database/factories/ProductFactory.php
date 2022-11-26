<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(5),
            'description' => fake()->text(100),
            'price' => fake()->randomFloat(2, 200, 3000),
            'image' => fake()->imageUrl(360, 360, 'Exam', true, 'Practice', true, 'jpg')
        ];
    }
}
