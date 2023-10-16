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
        $createdAt = fake()->dateTime;
        $updatedAt = fake()->dateTimeBetween($createdAt, 'now');

        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'long_description' => fake()->paragraph(7, true),
            'completed' => fake()->boolean,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
