<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3, 10)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(mt_rand(1, 3)),
            // 'content' => '<p>'.implode ('<p></p>',  $this->faker->paragraphs(mt_rand(10, 13))).'</p>',
            'content' => collect($this->faker->paragraphs(mt_rand(10, 15)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'is_published' => rand(0, 1),
            'is_featured' => rand(0, 1),
            // 'is_featured' => 0,
            'category_id' => rand(1, 5),
            'published_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            // 'user_id' => rand(1, 10)
        ];
    }
}
