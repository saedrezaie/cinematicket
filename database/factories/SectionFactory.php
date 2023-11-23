<?php

namespace Database\Factories;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    protected $model = Section::class;

    public function definition(): array
    {
        return [
            "to" => fake()->time(),
            "from" => fake()->time(),
            "cinema_id" => Cinema::factory(),
            "movie_id" => Movie::factory()
        ];
    }
}
