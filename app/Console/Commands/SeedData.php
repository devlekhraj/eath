<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SeedData extends Command
{
    protected $signature = 'seed:data';
    protected $description = 'Run all seeders for academic years, grades, sections, and subjects';

    public function handle()
    {
        $this->info('Seeding admins...');
        $this->call('seed:admins');
        $this->info('Seeding users...');
        $this->call('seed:users');

        $this->info('✅ All demo school data seeded successfully.');
        return 0;
    }
}
