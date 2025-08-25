<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Setting;

class SeedSetting extends Command
{
    protected $signature = 'seed:settings';
    protected $description = 'Delete all settings and reseed fresh ones';

    public function handle()
    {
        $settings = include __DIR__ . '/data/settings_data.php';

        $this->warn("⚠️  Deleting all existing settings...");
        Setting::truncate(); // clears the table

        foreach ($settings as $setting) {
            $newSetting = Setting::create($setting);
            $this->info("🎯 Inserted: {$newSetting->code}");
            $this->line("    value: {$newSetting->value}");
        }

        $this->info("\n✅ Settings reseeding completed.");
        return 0;
    }
}
