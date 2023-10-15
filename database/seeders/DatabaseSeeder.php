<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@info.com',
            'user_type' => 'super_admin',
            'password' => bcrypt('password'),
        ]);\App\Models\User::factory()->create([
            'name' => 'Test Manager',
            'email' => 'manager@info.com',
            'user_type' => 'manager',
            'password' => bcrypt('password'),
        ]);
    }
}
