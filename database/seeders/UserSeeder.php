<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::find(1);
        User::factory()->create()->each(function ($user) use ($role) {
            $user->roles()->sync([1, 2, 3, 4]);
        });
    }
}
