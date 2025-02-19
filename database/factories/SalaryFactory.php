<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::query()->inRandomOrder()->first()->id,
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'payment_date' => $this->faker->date(),
            'is_paid' => $this->faker->boolean(),
        ];
    }
}
