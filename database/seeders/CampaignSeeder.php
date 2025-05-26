<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::where('is_admin', false)->get();
        
        foreach ($users as $user) {
            // Create some sample campaigns
            Campaign::create([
                'user_id' => $user->id,
                'name' => 'Weekly Newsletter',
                'subject' => 'Your Weekly Update from PB&J Solutions',
                'content' => '<p>This is a sample newsletter.</p>',
                'status' => 'sent',
                'sent_count' => 125,
                'open_count' => 54,
                'click_count' => 18,
                'sent_at' => now()->subDays(7),
            ]);
            
            Campaign::create([
                'user_id' => $user->id,
                'name' => 'Product Update',
                'subject' => 'New Features Available!',
                'content' => '<p>Check out our latest features!</p>',
                'status' => 'sent',
                'sent_count' => 98,
                'open_count' => 42,
                'click_count' => 21,
                'sent_at' => now()->subDays(14),
            ]);
            
            Campaign::create([
                'user_id' => $user->id,
                'name' => 'Special Offer',
                'subject' => 'Limited Time Offer Just for You',
                'content' => '<p>Don\'t miss this special deal!</p>',
                'status' => 'sent',
                'sent_count' => 142,
                'open_count' => 86,
                'click_count' => 35,
                'sent_at' => now()->subDays(21),
            ]);
            
            Campaign::create([
                'user_id' => $user->id,
                'name' => 'New Campaign Draft',
                'subject' => 'Coming Soon',
                'content' => '<p>This campaign is still being worked on.</p>',
                'status' => 'draft',
                'sent_count' => 0,
                'open_count' => 0,
                'click_count' => 0,
            ]);
        }
    }
} 