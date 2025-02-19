<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectEmployee>
 */
class ProjectEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::query()->inRandomOrder()->first()->id,
            'employee_id' => Employee::query()->inRandomOrder()->first()->id,
            'role' => $this->faker->jobTitle(),
            'hourly_rate' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
