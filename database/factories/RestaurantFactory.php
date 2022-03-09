<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'about' => $this->faker->realText($this->faker->numberBetween(10, 200)),
            'address' => $this->faker->streetAddress(),
            'telephone_number' => $this->faker->e164PhoneNumber(),
            'website' => $this->faker->url(),
        ];
    }
}
