<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::where('is_admin', false)->get();
        
        foreach ($users as $user) {
            // Create sample subscribers (active)
            for ($i = 1; $i <= 130; $i++) {
                Subscriber::create([
                    'user_id' => $user->id,
                    'email' => "subscriber{$i}@example.com",
                    'first_name' => "First{$i}",
                    'last_name' => "Last{$i}",
                    'status' => 'active',
                    'subscribed_at' => now()->subDays(rand(1, 60)),
                ]);
            }
            
            // Create some unsubscribed subscribers
            for ($i = 1; $i <= 12; $i++) {
                Subscriber::create([
                    'user_id' => $user->id,
                    'email' => "unsubscribed{$i}@example.com",
                    'first_name' => "Unsub{$i}",
                    'last_name' => "User{$i}",
                    'status' => 'unsubscribed',
                    'subscribed_at' => now()->subDays(60),
                    'unsubscribed_at' => now()->subDays(rand(1, 30)),
                ]);
            }
        }
    }
} 