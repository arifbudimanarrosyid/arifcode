<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => rand(1, 50),
            'user_id' => rand(1, 5),
            'body' => $this->faker->paragraph(mt_rand(1, 3)),
            // 'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),

        ];
    }
}
