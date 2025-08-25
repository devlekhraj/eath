<?php

namespace App\Console\Commands;

use App\Models\Faq;
use Illuminate\Console\Command;
use App\Models\Setting;

class SeedFaq extends Command
{
    protected $signature = 'seed:faq';
    protected $description = 'Seed faqs';

    public function handle()
    {
        $datas = include __DIR__ . '/data/faq_data.php';

        foreach ($datas as $data) {
            $existingData = Faq::where('question', $data['question'])->first();

            if ($existingData) {
                $existingData->update($data);
                $this->line("✅ Updated: {$data['question']} ({$data['answer']})");
            } else {
                $newData = Faq::create($data);
                $this->info("🎯 Inserted: {$newData->question}");
                $this->line("    Answer: {$newData->answer}");
            }
        }

        $this->info("\n✅ Faq seeding completed.");
        return 0;
    }
}
