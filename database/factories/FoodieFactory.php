<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foodie>
 */
class FoodieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'email_address' => $this->faker->unique()->email(),
            'profile_picture' => $this->faker->image(storage_path('app/public/images'), 640, 480, null, false),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'bio' => $this->faker->realText($this->faker->numberBetween(200, 400)),
        ];
    }
}
