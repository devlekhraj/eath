<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;
use Website\Support\WebsiteAssetRegistry;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $allowedCategories = [
            'seasons' => 'Seasons & Timing',
            'packing' => 'Packing & Gear',
            'preparation' => 'Preparation & Health',
            'planning' => 'Route Planning',
            'culture' => 'Himalayan Culture',
            'logistics' => 'Travel Logistics',
        ];

        $rawQ = $request->query('q');
        $q = is_string($rawQ) ? trim(mb_substr($rawQ, 0, 120)) : '';
        if ($q === '') {
            $q = null;
        }

        $rawCategory = $request->query('category');
        $selectedCategory = null;
        if (is_string($rawCategory) && array_key_exists(strtolower($rawCategory), $allowedCategories)) {
            $selectedCategory = strtolower($rawCategory);
        }

        // All canonical articles
        $allArticles = WebsiteCatalogRepository::getArticles();

        // Calculate counts per category
        $categoryCounts = [];
        foreach (array_keys($allowedCategories) as $catKey) {
            $categoryCounts[$catKey] = count(array_filter($allArticles, fn ($a) => $a['category'] === $catKey));
        }

        // Filtered articles
        $filteredArticles = WebsiteCatalogRepository::getArticles([
            'q' => $q,
            'category' => $selectedCategory,
        ]);

        $totalCount = count($filteredArticles);

        // Featured sample article
        $featuredArticle = null;
        if ($q === null && ($request->query('page', 1) == 1) && $selectedCategory === null) {
            $featuredArticle = WebsiteCatalogRepository::findArticle('choosing-a-travel-month');
        }

        $topicPillars = [
            'seasons' => [
                'title' => 'Seasons & Timing',
                'tagline' => 'Weather Windows & Trail Conditions',
                'description' => 'Pre-monsoon spring blooms, crisp autumn visibility, and high-pass winter considerations.',
                'icon' => 'sun',
                'image' => WebsiteAssetRegistry::resolve('article-seasons')['url'],
                'image_alt' => 'Clear autumn skies across the Nepal Himalayas',
            ],
            'packing' => [
                'title' => 'Packing & Gear',
                'tagline' => 'Alpine Layering & Teahouse Kit',
                'description' => 'Tested layering systems, cold-rated sleeping bags, footwear selection, and pack weight discipline.',
                'icon' => 'backpack',
                'image' => WebsiteAssetRegistry::resolve('homepage-safety')['url'],
                'image_alt' => 'Mountain trekker equipped with alpine backpack and boots',
            ],
            'preparation' => [
                'title' => 'Preparation & Health',
                'tagline' => 'Altitude Acclimatization Curves',
                'description' => 'Safe elevation gains, hydration baselines, AMS recognition, and physical endurance baselines.',
                'icon' => 'shield',
                'image' => WebsiteAssetRegistry::resolve('article-altitude')['url'],
                'image_alt' => 'High-altitude snow and glacial crossing at Cho La Pass',
            ],
            'planning' => [
                'title' => 'Route Planning',
                'tagline' => 'Shortlists, Pacing & Difficulty',
                'description' => 'Comparing daily walking hours, teahouse versus camping logistics, and contingency buffer days.',
                'icon' => 'map',
                'image' => WebsiteAssetRegistry::resolve('article-compare')['url'],
                'image_alt' => 'Stone footpath winding through Himalayan valleys for route planning',
            ],
            'culture' => [
                'title' => 'Himalayan Culture',
                'tagline' => 'Monasteries & Sherpa Traditions',
                'description' => 'Buddhist mani stone customs, stupa circumambulation, prayer flags, and mountain etiquette.',
                'icon' => 'compass',
                'image' => WebsiteAssetRegistry::resolve('homepage-responsible-travel')['url'],
                'image_alt' => 'Colorful Buddhist prayer flags and mountain village',
            ],
            'logistics' => [
                'title' => 'Travel Logistics',
                'tagline' => 'Permits, Flights & Checkpoints',
                'description' => 'Lukla flight weather buffers, TIMS card permits, national park entry fees, and mountain transfers.',
                'icon' => 'plane',
                'image' => WebsiteAssetRegistry::resolve('article-logistics')['url'],
                'image_alt' => 'High mountain suspension bridge across deep river gorge',
            ],
        ];

        // Pagination
        $page = max(1, (int) $request->query('page', 1));
        $perPage = 6;
        $totalPages = max(1, (int) ceil($totalCount / $perPage));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $perPage;
        $pageArticles = array_slice($filteredArticles, $offset, $perPage);

        // Enrich articles
        $treks = WebsiteCatalogRepository::getTreks();
        $treksMap = [];
        foreach ($treks as $t) {
            $treksMap[$t['id']] = $t;
        }

        $enrichArticle = function (?array $art) use ($treksMap) {
            if (!$art) {
                return null;
            }
            $related = [];
            foreach ($art['trek_ids'] ?? [] as $tId) {
                if (isset($treksMap[$tId])) {
                    $related[] = [
                        'id' => $tId,
                        'name' => $treksMap[$tId]['name'],
                        'slug' => $treksMap[$tId]['slug'],
                        'region' => $treksMap[$tId]['region']['name'] ?? 'Nepal',
                    ];
                }
            }
            $art['related_treks'] = $related;

            // Compute reading time estimate (approx 130 words/min)
            $wordCount = str_word_count($art['summary'] ?? '');
            foreach ($art['sections'] ?? [] as $s) {
                $wordCount += str_word_count($s['heading'] ?? '') + str_word_count($s['body'] ?? '');
            }
            $art['reading_time'] = max(3, (int) ceil($wordCount / 130)) . ' min read';

            return $art;
        };

        $pageArticles = array_map($enrichArticle, $pageArticles);
        if ($featuredArticle) {
            $featuredArticle = $enrichArticle($featuredArticle);
        }

        return view('website_preview.pages.articles.index', [
            'articles' => $pageArticles,
            'featuredArticle' => $featuredArticle,
            'totalCount' => $totalCount,
            'page' => $page,
            'perPage' => $perPage,
            'totalPages' => $totalPages,
            'q' => $q,
            'selectedCategory' => $selectedCategory,
            'allowedCategories' => $allowedCategories,
            'categoryCounts' => $categoryCounts,
            'topicPillars' => $topicPillars,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Travel Guide'],
            ],
        ]);
    }

    public function show(string $slug)
    {
        $art = WebsiteCatalogRepository::findArticle($slug);
        abort_unless($art, 404);

        $categoryLabels = [
            'seasons' => 'Seasons & Timing',
            'packing' => 'Packing & Gear',
            'preparation' => 'Preparation & Health',
            'planning' => 'Route Planning',
            'culture' => 'Himalayan Culture',
            'logistics' => 'Travel Logistics',
        ];
        $categoryLabel = $categoryLabels[$art['category']] ?? ucfirst($art['category']);

        // Resolve relevant sample treks
        $relevantTreks = [];
        foreach ($art['trek_ids'] ?? [] as $tId) {
            $trek = WebsiteCatalogRepository::findTrek($tId);
            if ($trek) {
                $relevantTreks[] = $trek;
            }
        }

        // Related articles
        $allArticles = WebsiteCatalogRepository::getArticles();
        $relatedArticles = [];
        foreach ($allArticles as $other) {
            if ($other['id'] === $art['id']) {
                continue;
            }
            $isSameCategory = ($other['category'] === $art['category']);
            $intersectsTrek = !empty(array_intersect($other['trek_ids'] ?? [], $art['trek_ids'] ?? []));
            if ($isSameCategory || $intersectsTrek) {
                $relatedArticles[] = $other;
            }
        }

        if (count($relatedArticles) < 2) {
            foreach ($allArticles as $other) {
                if ($other['id'] !== $art['id'] && !in_array($other['id'], array_column($relatedArticles, 'id'), true)) {
                    $relatedArticles[] = $other;
                    if (count($relatedArticles) >= 3) break;
                }
            }
        }
        $relatedArticles = array_slice($relatedArticles, 0, 3);

        return view('website_preview.pages.articles.show', [
            'article' => $art,
            'categoryLabel' => $categoryLabel,
            'relevantTreks' => $relevantTreks,
            'relatedArticles' => $relatedArticles,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Travel Guide', 'url' => route('website.articles.index')],
                ['label' => $categoryLabel, 'url' => route('website.articles.index', ['category' => $art['category']])],
                ['label' => $art['title']],
            ],
        ]);
    }
}
