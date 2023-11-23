<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Ticket;
use Database\Factories\TicketFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::factory() ->create([
            "user_id"=> Ticket::factory()->create()->id,
            "movie_id"=> Ticket::factory()->create()->id,
        ]);
    }
}
