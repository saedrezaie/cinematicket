<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Sans;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all("id");
        Movie::factory()->create()->each(function ($movie) use ($users){
            $movie->users()->sync($users);
        });

        Movie::factory()->create();
    }
}
