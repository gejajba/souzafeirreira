<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => fake()->randomElement(['Direito Bancário', 'Direito Civil', 'Trabalhista', 'Família e Sucessões']),
            'tag' => fake()->word(),
            'order' => fake()->numberBetween(1, 10),
            'summary' => fake()->paragraph(),
            'content' => fake()->paragraphs(3, true),
            'active' => true,
            'published_at' => now(),
        ];
    }
}
