<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\ApplicationStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationStatusHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'application_id' => Application::factory(),
            'application_status_id' => ApplicationStatus::factory(),
            'changed_at' => fake()->dateTime(),
            'notes' => fake()->text(),
        ];
    }
}
