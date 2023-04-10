<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        $start_date = $this->faker->date();

        $end_date = new \DateTime($start_date);

        return [
            'user_id' => rand(1,10),
            'status_id' => rand(1,3),
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'start_date' => $start_date,
            'end_date' => $end_date->modify('+1 day'),
        ];
    }
}
