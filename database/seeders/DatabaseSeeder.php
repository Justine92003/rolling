<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users using the factory
        // User::factory(10)->create();

        // Create a specific user
        User::factory()->create([
            'name' => 'juan delacruz',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('qwerty12345'),
        ]);
    }
}