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
        //generates actual image into local server using faker provider
        $fakerFileName = $this->faker->image("public/assets/images", 800, 600);

        return [
            'title' => fake()->company(),
            'description' => fake()->sentence(),
            'published' => fake()->numberBetween(0, 1),
            'category_id' => fake()->numberBetween(1, 2),
            //save image name into database
            'image' => basename($fakerFileName),
            // OR
            // 'image' => basename($this->faker->image("public/assets/images", 800, 600)),
            // //not an actual image-->images folder is empty
            // 'image' => fake()->imageUrl(640, 480, 'animals', true),
            // // actual colored image-->saved into images folder
            // 'image' => fake()->image('public/assets/images', 400, 300, null, false),
        ];
    }
}
