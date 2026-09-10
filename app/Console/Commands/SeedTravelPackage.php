<?php

namespace App\Console\Commands;

use Admin\Models\TravelPackage;
use Illuminate\Console\Command;

class SeedTravelPackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:package';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = include __DIR__ . '/data/package_data.php';


        foreach ($users as $user) {
            // Find User by both email and username
            $existingUser = TravelPackage::where('slug', $user['slug'])
                ->first();

            if ($existingUser) {
                // Update existing user
                $existingUser->update($user);
            } else {
                // Create new user
                TravelPackage::create($user);
            }
        }

        $this->info('Travel Packages seeded successfully.');
        return 0;
    }
}
