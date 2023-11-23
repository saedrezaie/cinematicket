<?php

namespace Database\Factories;

use App\Models\Cinema;
use App\Models\City;
use App\Models\Movie;
use App\Models\Section;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "price"=> random_int(20000,70000),
            "time"=>  random_int(10,24),
            "salon"=> random_int(1,10),
            "user_id"=> User::factory(),
            "section_id"=> Section::factory(),
        ];
    }
}
