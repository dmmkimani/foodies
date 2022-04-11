<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
            'user_username' => User::all()->random()->username,
            'post_id' => $this->faker->numberBetween(1, Post::count()),
            'comment' => $this->faker->realText($this->faker->numberBetween(10, 200)),
        ];
    }
}
