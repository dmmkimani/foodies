<?php

namespace Database\Factories;

use App\Models\Foodie;
use App\Models\Post;
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
            'foodie_username' => CommentFactory::randomFoodie(),
            'post_id' => $this->faker->numberBetween(1, Post::count()),
            'comment' => $this->faker->sentence($this->faker->numberBetween(1, 30)),
            'likes' => $this->faker->numberBetween(0, 105)
        ];
    }

    public function randomFoodie() {
        $foodies_list = [];
        $foodies = Foodie::get();
        foreach($foodies as $foodie) {
            $foodies_list[] = $foodie->username;
        }
        return $foodies_list[array_rand($foodies_list)];
    }
}
