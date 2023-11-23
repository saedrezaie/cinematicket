<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Section;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $category1 = Category::factory()->create(
            ["name" => "family"]
        )->each(function (Category $category1) {
            $cat1 = Category::create([
                "name" => "educational",
                "parent_id" => $category1->id,
            ]);
            $movies = Movie::factory(5)->create([
                'category_id' => $cat1->id
            ]);
            $cinemas = Cinema::factory(6)->create();
            $sections = [];
            foreach ($movies as $movie) {
                foreach ($cinemas as $cinema) {
                    for ($i = 1; $i < 4; $i++) {
                        $sections[] = Section::factory()->create([
                            "cinema_id" => $cinema->id,
                            "movie_id" => $movie->id
                        ]);
                    }
                }
            }
            foreach ($sections as $section) {
                Ticket::factory(2)->create([
                    "section_id" => $section->id
                ]);
            }
//
//
//            $cat2 = Category::create([
//                "name" => "social",
//                "parent_id" => $category1->id
//            ]);
//            $movies = Movie::factory(5)->create([
//                'category_id' => $cat2->id
//            ]);
//            $cinemas = Cinema::factory(6)->create();
//            foreach ($cinemas as $cinema) {
//                $salon = Sans::factory(3)->create([
//                    "cinema_id" => $cinema->id
//                ]);
//            }
//            foreach ($movies as $movie) {
//                $movie->cinemas()->sync($cinemas);
//                $tickets = Ticket::factory(20)->create([
//                    "movie_id" => $movie->id,
//                ]);
//                foreach ($salon as $sans) {
//                    $sans->ticket()->sync($tickets->pluck("id"));
//                }
//            }
//
//
//            $cat3 = Category::create([
//                "name" => "political",
//                "parent_id" => $category1->id
//            ]);
//            $movies = Movie::factory(5)->create([
//                'category_id' => $cat3->id
//            ]);
//            $cinemas = Cinema::factory(6)->create();
//            foreach ($cinemas as $cinema) {
//                $salon = Sans::factory(3)->create([
//                    "cinema_id" => $cinema->id
//                ]);
//            }
//            foreach ($movies as $movie) {
//                $movie->cinemas()->sync($cinemas);
//                $tickets = Ticket::factory(20)->create([
//                    "movie_id" => $movie->id,
//                ]);
//                foreach ($salon as $sans) {
//                    $sans->ticket()->sync($tickets->pluck("id"));
//                }
//            }
        });
//
//
//        $category2 = Category::create(
//            ["name" => "adults"]
//        );
//        $cat4 = Category::create([
//            "name" => "educational",
//            "parent_id" => $category2->id,
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cat4->id
//        ]);
//        $cinemas = Cinema::factory(6)->create();
//        foreach ($cinemas as $cinema) {
//            $salon = Sans::factory(3)->create([
//                "cinema_id" => $cinema->id
//            ]);
//        }
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//            $tickets = Ticket::factory(20)->create([
//                "movie_id" => $movie->id,
//            ]);
//            foreach ($salon as $sans) {
//                $sans->ticket()->sync($tickets->pluck("id"));
//            }
//        }
//
//
//        $cat5 = Category::create([
//            "name" => "social",
//            "parent_id" => $category2->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cat5->id
//        ]);
//        $cinemas = Cinema::factory(6)->create();
//        foreach ($cinemas as $cinema) {
//            $salon = Sans::factory(3)->create([
//                "cinema_id" => $cinema->id
//            ]);
//        }
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//            $tickets = Ticket::factory(20)->create([
//                "movie_id" => $movie->id,
//            ]);
//            foreach ($salon as $sans) {
//                $sans->ticket()->sync($tickets->pluck("id"));
//            }
//        }
//
//
//        $cat6 = Category::create([
//            "name" => "political",
//            "parent_id" => $category2->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cat6->id
//        ]);
//        $cinemas = Cinema::factory(6)->create();
//        foreach ($cinemas as $cinema) {
//            $salon = Sans::factory(3)->create([
//                "cinema_id" => $cinema->id
//            ]);
//        }
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//            $tickets = Ticket::factory(20)->create([
//                "movie_id" => $movie->id,
//            ]);
//            foreach ($salon as $sans) {
//                $sans->ticket()->sync($tickets->pluck("id"));
//            }
//        }
//
//
//        $category3 = Category::create(
//            ["name" => "children"]
//        );
//        $cat7 = Category::create([
//            "name" => "educational",
//            "parent_id" => $category3->id,
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cat7->id
//        ]);
//        $cinemas = Cinema::factory(6)->create();
//        foreach ($cinemas as $cinema) {
//            $salon = Sans::factory(3)->create([
//                "cinema_id" => $cinema->id
//            ]);
//        }
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//            $tickets = Ticket::factory(20)->create([
//                "movie_id" => $movie->id,
//            ]);
//            foreach ($salon as $sans) {
//                $sans->ticket()->sync($tickets->pluck("id"));
//            }
//        }
//
//
//        $cat8 = Category::create([
//            "name" => "social",
//            "parent_id" => $category3->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cat8->id
//        ]);
//        $cinemas = Cinema::factory(6)->create();
//        foreach ($cinemas as $cinema) {
//            $salon = Sans::factory(3)->create([
//                "cinema_id" => $cinema->id
//            ]);
//        }
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//            $tickets = Ticket::factory(20)->create([
//                "movie_id" => $movie->id,
//            ]);
//            foreach ($salon as $sans) {
//                $sans->ticket()->sync($tickets->pluck("id"));
//            }
//        }
//
//
//        $cat9 = Category::create([
//            "name" => "political",
//            "parent_id" => $category3->id
//        ]);
//        $movies = Movie::factory(5)->create([
//            'category_id' => $cat9->id
//        ]);
//        $cinemas = Cinema::factory(6)->create();
//        foreach ($cinemas as $cinema) {
//            $salon = Sans::factory(3)->create([
//                "cinema_id" => $cinema->id
//            ]);
//        }
//        foreach ($movies as $movie) {
//            $movie->cinemas()->sync($cinemas);
//            $tickets = Ticket::factory(20)->create([
//                "movie_id" => $movie->id,
//            ]);
//            foreach ($salon as $sans) {
//                $sans->ticket()->sync($tickets->pluck("id"));
//            }
//        }
    }
}

