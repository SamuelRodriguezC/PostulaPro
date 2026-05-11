<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlatformFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'url' => fake()->url(),
            'logo_path' => fake()->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
