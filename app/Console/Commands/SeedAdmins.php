<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Admin\Models\Admin;

class SeedAdmins extends Command
{
    protected $signature = 'seed:admins';
    protected $description = 'Seed demo admin users';

    public function handle()
    {
        $admins = include __DIR__ . '/data/admin_data.php';

        foreach ($admins as $admin) {
            // Find Admin by both email and username
            $existingAdmin = Admin::where('email', $admin['email'])
                ->where('username', $admin['username'])
                ->first();

            if ($existingAdmin) {
                // Update existing Admin
                $existingAdmin->update($admin);
            } else {
                // Create new Admin
                Admin::create($admin);
            }
        }

        $this->info('Admins seeded successfully.');
        return 0;
    }
}
