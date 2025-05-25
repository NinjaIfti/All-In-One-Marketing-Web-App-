<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin test user
        User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
                'phone' => '555-123-4567',
                'email_verified_at' => now(),
                'is_admin' => true
            ]
        );

        // Create regular test user
        User::firstOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password123'),
                'phone' => '555-987-6543',
                'email_verified_at' => now(),
                'is_admin' => false
            ]
        );
    }
} 