<?php

namespace Database\Factories;

use App\Models\{
    Category,
    User,
};
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
            'title'       => $this->faker->sentence,
            'due_date'    => $this->faker->dateTimeBetween('now', '+1 year'),
            'user_id'     => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
