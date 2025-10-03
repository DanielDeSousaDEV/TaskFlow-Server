<?php

namespace Database\Factories;

use App\TaskStatusEnum;
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
        return [
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'status' => fake()->randomElement(TaskStatusEnum::values()),
            'completed_at' => fake()->boolean()
                ? fake()->dateTimeBetween('-1 month', 'now')
                : null,
            'order' => null,
            'kanban_id' => null
        ];
    }
}
