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
            'foodie_username' => Foodie::all()->random()->username,
            'restaurant_id' => Restaurant::all()->random()->id,
            'meal_picture' => $this->faker->image(storage_path('app/public/images'), 640, 480, null, false),
            'price' => $this->faker->randomFloat(2, 5, 25),
            'rating' => $this->faker->numberBetween(0, 5),
            'review' => $this->faker->realText($this->faker->numberBetween(10, 400)),
        ];
    }
}
