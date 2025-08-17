<?php

namespace Database\Seeders;

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
        // User::factory()->count(10)->create();

        User::create([
            'id' => 5,
            'name' => "Test User",
            'email' => "testuser@example.com",
            'password' => bcrypt('password'),
        ]);
        
        User::create([
            'id' => 5,
            'name' => "Test User",
            'email' => "testuser@example.com",
            'password' => bcrypt('password'),
        ]);
    }
}
