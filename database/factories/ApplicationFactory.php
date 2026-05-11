<?php

namespace Database\Factories;

use App\Models\ApplicationStatus;
use App\Models\Company;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'platform_id' => Platform::factory(),
            'application_status_id' => ApplicationStatus::factory(),
            'applied_at' => fake()->date(),
            'position' => fake()->regexify('[A-Za-z0-9]{150}'),
            'job_description' => fake()->text(),
            'requirements' => fake()->text(),
            'work_location' => fake()->regexify('[A-Za-z0-9]{150}'),
            'schedule' => fake()->regexify('[A-Za-z0-9]{150}'),
            'salary_min' => fake()->randomFloat(2, 0, 9999999999.99),
            'salary_max' => fake()->randomFloat(2, 0, 9999999999.99),
            'salary_currency' => fake()->regexify('[A-Za-z0-9]{10}'),
            'company_problem' => fake()->text(),
            'interview_tips' => fake()->text(),
            'email_sent' => fake()->boolean(),
            'cv_path' => fake()->regexify('[A-Za-z0-9]{255}'),
            'cover_letter_path' => fake()->regexify('[A-Za-z0-9]{255}'),
            'interest_level' => fake()->numberBetween(-10000, 10000),
            'follow_up_date' => fake()->date(),
            'response_date' => fake()->date(),
            'fit_score' => fake()->numberBetween(-10000, 10000),
            'is_remote' => fake()->boolean(),
        ];
    }
}
