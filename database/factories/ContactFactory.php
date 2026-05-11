<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'linkedin_url' => fake()->regexify('[A-Za-z0-9]{255}'),
            'position' => fake()->regexify('[A-Za-z0-9]{150}'),
            'notes' => fake()->text(),
        ];
    }
}
