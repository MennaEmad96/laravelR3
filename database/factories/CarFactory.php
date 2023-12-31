<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'description' => fake()->sentence(),
            //not an actual image-->images folder is empty
            // 'image' => fake()->imageUrl(640, 480, 'animals', true),
            'image' => fake()->image('public/assets/images', 400, 300, null, false),
            'published' => fake()->numberBetween(0, 1),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
