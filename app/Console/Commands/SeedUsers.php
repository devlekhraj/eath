<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Admin\Models\User;

class SeedUsers extends Command
{
    protected $signature = 'seed:users';
    protected $description = 'Seed demo users into the users table';

    public function handle()
    {
        $users = include __DIR__ . '/data/users_data.php';


        foreach ($users as $user) {
            // Find User by both email and username
            $existingUser = User::where('email', $user['email'])
                ->where('username', $user['username'])
                ->first();

            if ($existingUser) {
                // Update existing user
                $existingUser->update($user);
            } else {
                // Create new user
                User::create($user);
            }
        }

        $this->info('Users seeded successfully.');
        return 0;
    }
}

