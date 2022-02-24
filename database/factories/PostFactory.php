<?php

namespace Database\Factories;

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
            'posted_by' => $this->faker->userName(),
            'restaurant_id' => $this->faker->numberBetween(1, 20),
            'meal_picture' => $this->faker->image('/tmp'),
            'price' => $this->faker->randomFloat(2, 5, 40),
            'rating' => $this->faker->randomFloat(2, 0, 5),
            'review' => $this->faker->sentence(15),
        ];
    }
}
