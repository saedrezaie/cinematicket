<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(
            RoleSeeder::class,
        );
        $this->call(
            UserSeeder::class,
        );
//        $this->call(
//            MovieSeeder::class,
//        );
//        $this->call(
//          CinemaSeeder::class,
//        );
//        $this->call(
//          CitySeeder::class,
//        );
//        $this->call(
//          TicketSeeder::class,
//        );
//        $this->call(
//          SansSeeder::class
//        );
        $this->call(
          CategorySeeder::class,
        );
    }
}
