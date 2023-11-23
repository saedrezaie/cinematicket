<?php

namespace Database\Factories;

use App\Models\Cinema;
use App\Models\City;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cinema>
 */
class CinemaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name,
            "phone" => fake()->phoneNumber,
            "address" => fake()->sentence,
            "capacity" => fake()->boolean,
            "city_id" => City::factory()->create()->id,
        ];
    }
}
