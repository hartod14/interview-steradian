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
            'car_name' => fake()->name(),
            'day_rate' => fake()->randomFloat(2, 100000, 1000000),
            'month_rate' => fake()->randomFloat(2, 100000, 1000000),
            'image' => fake()->imageUrl(),
        ];
    }
}
