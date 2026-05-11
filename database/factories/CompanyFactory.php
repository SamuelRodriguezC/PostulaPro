<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'industry' => fake()->regexify('[A-Za-z0-9]{150}'),
            'website' => fake()->regexify('[A-Za-z0-9]{255}'),
            'hr_email' => fake()->regexify('[A-Za-z0-9]{150}'),
            'phone' => fake()->phoneNumber(),
            'location' => fake()->regexify('[A-Za-z0-9]{150}'),
            'size' => fake()->regexify('[A-Za-z0-9]{50}'),
            'notes' => fake()->text(),
        ];
    }
}
