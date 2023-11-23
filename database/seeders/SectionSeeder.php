<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Sans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sans::factory()->create();
    }
}
