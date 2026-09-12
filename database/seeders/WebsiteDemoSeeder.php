<?php

namespace Database\Seeders;

use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class WebsiteDemoSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('journey_month')->truncate();
        DB::table('experience_journey')->truncate();
        DB::table('guide_journey')->truncate();
        DB::table('article_journey')->truncate();
        DB::table('journey_departures')->truncate();
        DB::table('journey_itinerary_days')->truncate();
        DB::table('journey_itinerary_highlights')->truncate();
        DB::table('journey_highlights')->truncate();
        DB::table('journey_prices')->truncate();
        DB::table('journey_services')->truncate();
        DB::table('article_sections')->truncate();
        DB::table('articles')->truncate();
        DB::table('article_categories')->truncate();
        DB::table('traveler_stories')->truncate();
        DB::table('faqs')->truncate();
        DB::table('website_page_sections')->truncate();
        DB::table('website_pages')->truncate();
        DB::table('website_sections')->truncate();
        DB::table('website_settings')->truncate();
        DB::table('journeys')->truncate();
        DB::table('guides')->truncate();
        DB::table('travel_months')->truncate();
        DB::table('experiences')->truncate();
        DB::table('destinations')->truncate();
        Schema::enableForeignKeyConstraints();

        $catalog = $this->readJson('packages/website/src/Data/website-catalog.json');
        $content = $this->readJson('packages/website/src/Data/website-content.json');

        $destinationIds = $this->seedDestinations($catalog['regions'] ?? []);
        $experienceIds = $this->seedExperiences($catalog['experiences'] ?? []);
        $monthIds = $this->seedMonths($catalog['months'] ?? []);
        $guideIds = $this->seedGuides($content['guides'] ?? []);
        $journeyIds = $this->seedJourneys($catalog['treks'] ?? [], $destinationIds, $guideIds);

        $this->seedJourneyRelations($catalog['treks'] ?? [], $journeyIds, $experienceIds, $monthIds, $catalog['departure_templates'] ?? []);
        $articleIds = $this->seedArticles($content['articles'] ?? [], $journeyIds);
        $this->seedStories($content['stories'] ?? [], $journeyIds, $destinationIds);
        $this->seedFaqs($content['faqs'] ?? [], $journeyIds);
        $this->seedWebsitePages();
        $this->seedSettings($content['brand'] ?? []);
    }

    protected function readJson(string $path): array
    {
        return json_decode(file_get_contents(base_path($path)), true) ?: [];
    }

    protected function seedDestinations(array $regions): array
    {
        $ids = [];
        foreach ($regions as $index => $region) {
            $id = DB::table('destinations')->insertGetId([
                'name' => $region['name'],
                'slug' => $region['slug'],
                'summary' => $region['intro'] ?? null,
                'description' => $region['intro'] ?? null,
                'sort_order' => $index + 1,
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $ids[$region['id']] = $id;
        }

        return $ids;
    }

    protected function seedExperiences(array $experiences): array
    {
        $ids = [];
        foreach ($experiences as $index => $experience) {
            $id = DB::table('experiences')->insertGetId([
                'name' => $experience['name'],
                'slug' => $experience['slug'],
                'summary' => $experience['intro'] ?? null,
                'description' => $experience['intro'] ?? null,
                'sort_order' => $index + 1,
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $ids[$experience['id']] = $id;
        }

        return $ids;
    }

    protected function seedMonths(array $months): array
    {
        $ids = [];
        foreach ($months as $month) {
            $id = DB::table('travel_months')->insertGetId([
                'month_number' => $month['id'],
                'name' => $month['name'],
                'slug' => $month['slug'],
                'season' => $month['season_website'] ?? 'spring',
                'summary' => $month['intro'] ?? null,
                'description' => $month['intro'] ?? null,
                'sort_order' => $month['id'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $ids[(int) $month['id']] = $id;
        }

        return $ids;
    }

    protected function seedGuides(array $guides): array
    {
        $ids = [];
        foreach ($guides as $index => $guide) {
            $id = DB::table('guides')->insertGetId([
                'name' => $guide['name'],
                'slug' => $guide['slug'],
                'role' => $guide['role'] ?? null,
                'biography' => $guide['biography'] ?? null,
                'languages' => json_encode($guide['languages'] ?? []),
                'qualifications' => json_encode($guide['qualifications'] ?? []),
                'years_experience' => $guide['years_experience'] ?? null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => $index + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $ids[$guide['id']] = $id;
        }

        return $ids;
    }

    protected function seedJourneys(array $treks, array $destinationIds, array $guideIds): array
    {
        $ids = [];
        foreach ($treks as $index => $trek) {
            $id = DB::table('journeys')->insertGetId([
                'destination_id' => $destinationIds[$trek['region_id']] ?? reset($destinationIds),
                'guide_id' => $guideIds[$trek['guide_id'] ?? null] ?? null,
                'name' => $trek['name'],
                'slug' => $trek['slug'],
                'summary' => $trek['summary'],
                'description' => $trek['summary'],
                'overview_secondary' => 'Illustrative itinerary stored in the database for website planning and comparison.',
                'duration_days' => $trek['duration_days'],
                'duration_nights' => max(0, ((int) $trek['duration_days']) - 1),
                'difficulty' => $trek['difficulty'],
                'max_altitude_m' => $trek['max_altitude_m'] ?? null,
                'walking_hours_max' => $trek['walking_hours_max'] ?? null,
                'accommodation_style' => $this->normalizeAccommodation($trek['accommodation'] ?? null),
                'pace' => $trek['pace'] ?? null,
                'price_minor' => $trek['price_minor'],
                'currency' => $trek['currency'] ?? 'USD',
                'pricing_basis' => $trek['pricing_basis'] ?? 'per_person',
                'featured_rank' => $trek['featured_rank'] ?? ($index + 1),
                'is_featured' => true,
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'accommodation_note' => 'Accommodation details are database demo content and must be verified before real travel.',
                'logistics_note' => 'Logistics are stored for website planning display.',
                'safety_note' => 'Difficulty and altitude are not medical advice.',
                'route_map_note' => 'Route map not supplied.',
                'sort_order' => $index + 1,
                'meta_title' => "{$trek['name']} | E.A.T.H. Travels",
                'meta_description' => $trek['summary'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $ids[$trek['id']] = $id;
            $this->seedJourneyContent($id, $trek);
        }

        return $ids;
    }

    protected function seedJourneyContent(int $journeyId, array $trek): void
    {
        foreach ($trek['highlights'] ?? [] as $index => $highlight) {
            DB::table('journey_highlights')->insert([
                'journey_id' => $journeyId,
                'title' => $highlight,
                'sort_order' => $index + 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($day = 1; $day <= (int) $trek['duration_days']; $day++) {
            DB::table('journey_itinerary_days')->insert([
                'journey_id' => $journeyId,
                'day_number' => $day,
                'title' => $day === 1 ? 'Arrival and journey briefing' : ($day === (int) $trek['duration_days'] ? 'Departure and onward plans' : "Trail day {$day}"),
                'route' => $day === 1 ? 'Kathmandu arrival' : 'Himalayan trail section',
                'description' => 'Database-seeded itinerary day for website display and planning.',
                'location_label' => 'Nepal',
                'altitude_label' => $day === 1 ? '1,400m' : null,
                'walking_hours_label' => $day === 1 ? '2-3 hrs' : (($trek['walking_hours_max'] ?? 6) . ' hrs'),
                'accommodation_label' => 'Standard tea house',
                'meal_note' => 'Breakfast, lunch and dinner included where applicable.',
                'is_acclimatization' => in_array($day, [3, 6], true) && (int) $trek['duration_days'] >= 10,
                'sort_order' => $day,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (['inclusion' => ['Ground itinerary planning', 'Guide support', 'Standard accommodation'], 'exclusion' => ['International airfare', 'Travel insurance', 'Personal expenses']] as $type => $items) {
            foreach ($items as $index => $item) {
                DB::table('journey_services')->insert([
                    'journey_id' => $journeyId,
                    'type' => $type,
                    'title' => $item,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        DB::table('journey_prices')->insert([
            'journey_id' => $journeyId,
            'name' => 'Standard per person rate',
            'price_minor' => $trek['price_minor'],
            'currency' => $trek['currency'] ?? 'USD',
            'pricing_basis' => $trek['pricing_basis'] ?? 'per_person',
            'is_primary' => true,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    protected function seedJourneyRelations(array $treks, array $journeyIds, array $experienceIds, array $monthIds, array $templates): void
    {
        $baseDate = CarbonImmutable::parse('2030-09-01');

        foreach ($treks as $trek) {
            $journeyId = $journeyIds[$trek['id']];

            foreach ($trek['experience_ids'] ?? [] as $index => $experienceKey) {
                if (isset($experienceIds[$experienceKey])) {
                    DB::table('experience_journey')->insert([
                        'experience_id' => $experienceIds[$experienceKey],
                        'journey_id' => $journeyId,
                        'sort_order' => $index + 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            foreach ($trek['suitable_months'] ?? [] as $index => $monthNumber) {
                if (isset($monthIds[(int) $monthNumber])) {
                    DB::table('journey_month')->insert([
                        'journey_id' => $journeyId,
                        'travel_month_id' => $monthIds[(int) $monthNumber],
                        'suitability' => 'ideal',
                        'sort_order' => $index + 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            foreach ($templates as $template) {
                $start = $baseDate->addDays($template['start_offset_days']);
                DB::table('journey_departures')->insert([
                    'journey_id' => $journeyId,
                    'code' => $trek['id'] . '-' . $template['suffix'],
                    'start_date' => $start->toDateString(),
                    'end_date' => $start->addDays(((int) $trek['duration_days']) - 1)->toDateString(),
                    'status' => $template['status'] === 'active' ? 'open' : $template['status'],
                    'total_seats' => 12,
                    'available_seats' => $template['sample_seats'] ?? null,
                    'price_minor' => ((int) $trek['price_minor']) + ((int) ($template['price_adjustment_minor'] ?? 0)),
                    'currency' => $trek['currency'] ?? 'USD',
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    protected function normalizeAccommodation(?string $value): ?string
    {
        return match ($value) {
            'upgraded' => 'comfort',
            'teahouse' => 'standard',
            default => in_array($value, ['standard', 'comfort', 'luxury', 'mixed'], true) ? $value : null,
        };
    }

    protected function seedArticles(array $articles, array $journeyIds): array
    {
        $categoryIds = [];
        $articleIds = [];

        foreach ($articles as $article) {
            $category = $article['category'] ?? 'planning';
            $categoryIds[$category] ??= DB::table('article_categories')->insertGetId([
                'name' => Str::headline($category),
                'slug' => Str::slug($category),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $id = DB::table('articles')->insertGetId([
                'article_category_id' => $categoryIds[$category],
                'title' => $article['title'],
                'slug' => $article['slug'],
                'summary' => $article['summary'] ?? null,
                'author_name' => $article['author_label'] ?? null,
                'updated_on' => $article['updated_date'] ?? null,
                'is_featured' => true,
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $articleIds[$article['id']] = $id;

            foreach ($article['sections'] ?? [] as $index => $section) {
                DB::table('article_sections')->insert([
                    'article_id' => $id,
                    'heading' => $section['heading'],
                    'body' => $section['body'],
                    'sort_order' => $index + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach ($article['trek_ids'] ?? [] as $index => $trekId) {
                if (isset($journeyIds[$trekId])) {
                    DB::table('article_journey')->insert([
                        'article_id' => $id,
                        'journey_id' => $journeyIds[$trekId],
                        'sort_order' => $index + 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return $articleIds;
    }

    protected function seedStories(array $stories, array $journeyIds, array $destinationIds): void
    {
        foreach ($stories as $story) {
            $journeyId = $journeyIds[$story['trek_id'] ?? null] ?? null;
            DB::table('traveler_stories')->insert([
                'journey_id' => $journeyId,
                'title' => $story['title'],
                'slug' => $story['slug'],
                'summary' => $story['summary'] ?? null,
                'body' => $story['body'] ?? ($story['summary'] ?? null),
                'traveler_name' => $story['traveler_name'] ?? null,
                'traveler_country' => $story['traveler_country'] ?? null,
                'traveled_on' => $story['traveled_on'] ?? null,
                'is_featured' => true,
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    protected function seedFaqs(array $faqs, array $journeyIds): void
    {
        foreach ($faqs as $index => $faq) {
            DB::table('faqs')->insert([
                'question' => $faq['question'],
                'answer' => $faq['answer_template'] ?? $faq['answer'] ?? '',
                'category' => $faq['category'] ?? null,
                'sort_order' => $index + 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    protected function seedWebsitePages(): void
    {
        foreach (['about', 'contact', 'safety', 'responsible-travel', 'privacy', 'terms', 'booking-conditions', 'cancellation', 'cookies'] as $slug) {
            DB::table('website_pages')->insert([
                'title' => Str::headline($slug),
                'slug' => $slug,
                'summary' => 'Database-backed website page content.',
                'body' => 'This page is stored in the database and can be managed as website content.',
                'type' => in_array($slug, ['privacy', 'terms', 'booking-conditions', 'cancellation', 'cookies'], true) ? 'policy' : 'standard',
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    protected function seedSettings(array $brand): void
    {
        DB::table('website_settings')->insert([
            'key' => 'brand',
            'value' => json_encode($brand),
            'group' => 'website',
            'type' => 'json',
            'is_public' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
