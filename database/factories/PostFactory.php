<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = \App\Models\User::inRandomOrder()->first();
        $title = fake()->unique()->sentence();
        $slug = Str::of($title)->slug('-');

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->paragraph(3),
            'published_at' => fake()->dateTime(),
            'author_id' => $user->id,
        ];
    }
}
