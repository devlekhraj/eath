<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Admin\Models\Faq;
use Website\Services\WebsiteCatalogRepository;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = WebsiteCatalogRepository::getExperiences();
        $allTreks = WebsiteCatalogRepository::getTreks();

        // Curate 3 diversified example treks
        $exampleTreks = array_slice(array_values(array_filter($allTreks, fn($t) => in_array($t['id'], ['t-ebc', 't-abc', 't-mardi'], true))), 0, 3);
        if (count($exampleTreks) < 3) {
            $exampleTreks = array_slice($allTreks, 0, 3);
        }

        return view('website_preview.pages.experiences.index', [
            'experiences' => $experiences,
            'exampleTreks' => $exampleTreks,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Experiences'],
            ],
        ]);
    }

    public function show(string $slug)
    {
        $exp = WebsiteCatalogRepository::findExperience($slug);
        abort_unless($exp, 404);

        $matchingTreks = $exp['treks'] ?? [];
        $trekIds = array_column($matchingTreks, 'id');

        // Associated regions from matching treks
        $regionsMap = [];
        foreach ($matchingTreks as $t) {
            if (!empty($t['region'])) {
                $regionsMap[$t['region']['id']] = $t['region'];
            }
        }
        $associatedRegions = array_values($regionsMap);

        // Associated months union from matching treks
        $monthSet = [];
        foreach ($matchingTreks as $t) {
            foreach ($t['suitable_months'] ?? [] as $m) {
                $monthSet[$m] = true;
            }
        }
        ksort($monthSet);
        $allMonths = WebsiteCatalogRepository::getMonths();
        $associatedMonths = array_values(array_filter($allMonths, fn($m) => isset($monthSet[$m['id']])));

        // Related articles: match trek_ids or category, max 3
        $allArticles = WebsiteCatalogRepository::getArticles();
        $matchedArticles = [];
        foreach ($allArticles as $art) {
            $common = array_intersect($art['trek_ids'] ?? [], $trekIds);
            if (!empty($common)) {
                $matchedArticles[] = $art;
            }
        }
        if (count($matchedArticles) < 3) {
            foreach ($allArticles as $art) {
                if (!in_array($art['id'], array_column($matchedArticles, 'id'), true)) {
                    $matchedArticles[] = $art;
                }
                if (count($matchedArticles) >= 3) break;
            }
        }
        $matchedArticles = array_slice($matchedArticles, 0, 3);

        // Polymorphic FAQs from DB (faqable_type = 'experience')
        $dbFaqs = Faq::query()
            ->where('faqable_type', 'experience')
            ->where('faqable_id', $exp['db_id'])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        if ($dbFaqs->isNotEmpty()) {
            $faqs = $dbFaqs->map(fn (Faq $f) => [
                'question' => $f->question,
                'answer' => $f->answer,
            ])->all();
        } else {
            // Contextual fallback FAQs
            $faqs = [
                [
                    'question' => "What characterizes the {$exp['name']} experience in Nepal?",
                    'answer' => "Journeys under {$exp['name']} are specifically curated around distinct terrain, aesthetic highlights, and cultural environments, prioritizing quality vantage points and pacing.",
                ],
                [
                    'question' => "What fitness and preparation are recommended for {$exp['name']}?",
                    'answer' => "Daily hiking times generally range between 5 and 7 hours. Good cardiovascular endurance, well-broken-in footwear, and gradual acclimatization are strongly recommended.",
                ],
                [
                    'question' => "Can itineraries under {$exp['name']} be customized for private groups?",
                    'answer' => "Yes. You can use our personalized trip planner to adjust daily pacing, lodge categories, and acclimatization days according to your travel preferences.",
                ],
            ];
        }

        // Dynamic highlights and prep questions with zero-breakage fallbacks
        $highlights = !empty($exp['highlights']) ? $exp['highlights'] : [
            ['title' => 'Curated Vantage Points', 'description' => "Unobstructed vistas and prime photography perspectives aligned with {$exp['name']}."],
            ['title' => 'Signature Himalayan Terrain', 'description' => 'Hiking through pristine alpine environments, authentic communities, and scenic passes.'],
            ['title' => 'Experienced Mountain Leadership', 'description' => 'Guided by licensed local experts ensuring safety, pacing, and cultural interpretation.'],
        ];

        $prepQuestions = !empty($exp['prep_questions']) ? $exp['prep_questions'] : [
            ['title' => 'Conditioning Readiness', 'body' => "Are you prepared with cardiovascular training and stamina for continuous walking days under the {$exp['name']} theme?"],
            ['title' => 'Gear & Footwear', 'body' => 'Do you have broken-in trekking boots, thermal layers, and wind/rain protection suitable for Himalayan conditions?'],
            ['title' => 'Pacing Flexibility', 'body' => 'Do you have schedule flexibility to accommodate acclimatization and changing alpine weather?'],
        ];

        $editorialContent = [
            'emphasis' => !empty($exp['emphasis']) ? $exp['emphasis'] : ($exp['description'] ?: $exp['summary'] ?: "This travel theme emphasizes curated Himalayan paths aligned with {$exp['name']}."),
            'cues' => !empty($exp['cues']) ? $exp['cues'] : "Ideal for travelers seeking an unforgettable journey characterized by {$exp['name']}.",
            'highlights' => $highlights,
            'prepQuestions' => $prepQuestions,
            'faqs' => $faqs,
        ];

        return view('website_preview.pages.experiences.show', [
            'exp' => $exp,
            'matchingTreks' => $matchingTreks,
            'associatedRegions' => $associatedRegions,
            'associatedMonths' => $associatedMonths,
            'matchedArticles' => $matchedArticles,
            'editorialContent' => $editorialContent,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Experiences', 'url' => route('website.experiences.index')],
                ['label' => $exp['name']],
            ],
        ]);
    }
}
