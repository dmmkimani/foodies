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
            'email_address' => $this->faker->email(),
            'username' => $this->faker->userName(),
            'fName' => $this->faker->firstName(),
            'lName' => $this->faker->lastName(),
        ];
    }
}
