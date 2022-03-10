<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Foodie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->numberBetween(1, Post::count()),
            'foodie_username' => LikeFactory::randomFoodie(),
        ];
    }

    public function randomFoodie() 
    {
        $foodies_list = [];
        $foodies = Foodie::get();
        foreach($foodies as $foodie) {
            $foodies_list[] = $foodie->username;
        }
        return $foodies_list[array_rand($foodies_list)];
    }
}
