<?php

namespace Database\Factories;

use App\Models\Foodie;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'foodie_username' => PostFactory::randomFoodie(),
            'restaurant_id' => $this->faker->numberBetween(1, Restaurant::count()),
            'meal_picture' => $this->faker->image('/tmp'),
            'price' => $this->faker->randomFloat(2, 5, 40),
            'rating' => $this->faker->randomFloat(2, 0, 5),
            'review' => $this->faker->sentence(25),
            'likes' => $this->faker->numberBetween(0, 1000)
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
