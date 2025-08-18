<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Setting;

class SeedSetting extends Command
{
    protected $signature = 'seed:settings';
    protected $description = 'Seed settings';

    public function handle()
    {
        $settings = include __DIR__ . '/data/settings_data.php';

        foreach ($settings as $setting) {
            $existingSetting = Setting::where('code', $setting['code'])->first();

            if ($existingSetting) {
                $existingSetting->update($setting);
                $this->line("✅ Updated: {$setting['name']} ({$setting['value']})");
            } else {
                $newSetting = Setting::create($setting);
                $this->info("🎯 Inserted: {$newSetting->code}");
                $this->line("    value: {$newSetting->value}");
            }
        }

        $this->info("\n✅ Settings seeding completed.");
        return 0;
    }
}
