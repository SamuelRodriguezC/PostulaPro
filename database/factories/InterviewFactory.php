<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterviewFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'application_id' => Application::factory(),
            'interview_date' => fake()->dateTime(),
            'interview_type' => fake()->randomElement(["Virtual","Presencial","Telefono","Tecnica","RRHH"]),
            'interviewer_name' => fake()->regexify('[A-Za-z0-9]{150}'),
            'notes' => fake()->text(),
            'result' => fake()->randomElement(["Pendiente","Aprobada","Rechazada","Siguiente_ronda"]),
        ];
    }
}
