<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectPayment>
 */
class ProjectPaymentFactory extends Factory
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
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'payment_date' => $this->faker->dateTimeBetween('now', '+3 years'),
        ];
    }
}
