<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'country_id' => random_int(1, 100),
            'stocks' => random_int(1, 100),
            'amount' => fake()->randomFloat(2, 10, 100),
            'photo' => fake()->imageUrl()
        ];
    }
}
