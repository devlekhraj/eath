<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Admin\Models\Inquiry;
use Admin\Models\Journey;
use Admin\Models\WebsitePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Website\Services\WebsiteCatalogRepository;
use Website\Support\WebsiteAssetRegistry;

class WebsitePageController extends Controller
{
    public function about()
    {
        $guides = WebsiteCatalogRepository::getGuides();
        $heroImage = WebsiteAssetRegistry::resolve('about-hero', 'About EATH Himalayan Trekking');

        return view('website_preview.pages.about', [
            'guides' => $guides,
            'heroImage' => $heroImage,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'About Us'],
            ],
        ]);
    }

    public function safety()
    {
        $highAltitudeArticle = WebsiteCatalogRepository::findArticle('questions-before-a-high-altitude-trip');
        $packingArticle = WebsiteCatalogRepository::findArticle('organizing-your-packing-questions');

        return view('website_preview.pages.safety', [
            'heroImage' => WebsiteAssetRegistry::resolve('safety-hero', 'Mountain trail support and preparation landscape'),
            'title' => 'Safety & Field Support Framework',
            'metaDescription' => 'Explore our proposed safety discussion framework, acclimatization pacing questions, and field coordination standards for Himalayan trekking.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Safety and Support'],
            ],
            'highAltitudeArticle' => $highAltitudeArticle,
            'packingArticle' => $packingArticle,
        ]);
    }

    public function responsible()
    {
        $cultureArticle = WebsiteCatalogRepository::findArticle('planning-a-culture-led-journey');

        $page = WebsitePage::with([
            'sections' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order'),
            'heroAttachment.mediaAsset',
            'heroImage',
        ])
        ->where('slug', 'responsible-travel')
        ->first();

        $heroUrl = $page?->heroAttachment?->mediaAsset?->url
            ?? $page?->heroImage?->path
            ?? null;

        $fallbackHero = WebsiteAssetRegistry::resolve('responsible-travel-hero', 'Nepal community and mountain environment landscape');

        $heroImage = [
            'url' => $heroUrl ?: $fallbackHero['url'],
            'alt' => $page?->heroAttachment?->alt_text ?: ($page?->heroImage?->alt_text ?: $fallbackHero['alt']),
            'width' => 1600,
            'height' => 900,
        ];

        return view('website_preview.pages.responsible', [
            'page' => $page,
            'heroImage' => $heroImage,
            'title' => $page?->meta_title ?: ($page?->title ?: 'Responsible Mountain Travel & Porter Welfare'),
            'metaDescription' => $page?->meta_description ?: ($page?->summary ?: 'Explore our proposed framework for ethical porter welfare, local community benefit, trail waste reduction, and sacred Himalayan etiquette.'),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Responsible Travel'],
            ],
            'cultureArticle' => $cultureArticle,
        ]);
    }

    public function contact(Request $request)
    {
        $treks = WebsiteCatalogRepository::getTreks();
        $requestedTrek = $request->query('trek');
        $preselectedTrek = null;

        if (is_string($requestedTrek)) {
            $preselectedTrek = WebsiteCatalogRepository::findTrek($requestedTrek);
            $preselectedTrek = $preselectedTrek['slug'] ?? null;
        }

        return view('website_preview.pages.contact', [
            'heroImage' => WebsiteAssetRegistry::resolve('contact-hero', 'Calm Nepal mountain landscape for contact planning'),
            'treks' => $treks,
            'preselectedTrek' => $preselectedTrek,
            'topics' => [
                'general' => 'General question',
                'trek' => 'A sample trek',
                'custom' => 'Custom trip idea',
                'departure' => 'Sample departure',
                'other' => 'Something else',
            ],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Contact'],
            ],
        ]);
    }

    public function submitContact(Request $request)
    {
        $allowedTrekValues = array_merge(
            array_column(WebsiteCatalogRepository::getTreks(), 'id'),
            array_column(WebsiteCatalogRepository::getTreks(), 'slug')
        );

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:254'],
            'topic' => ['required', 'string', 'in:general,trek,custom,departure,other'],
            'trek' => ['nullable', 'string', 'in:' . implode(',', $allowedTrekValues)],
            'message' => ['required', 'string', 'max:1000'],
        ]);

        if ($validator->fails()) {
            $treks = WebsiteCatalogRepository::getTreks();
            $submittedTrek = $request->input('trek');
            $preselectedTrek = is_string($submittedTrek)
                ? (WebsiteCatalogRepository::findTrek($submittedTrek)['slug'] ?? null)
                : null;

            return response()->view('website_preview.pages.contact', [
                'heroImage' => WebsiteAssetRegistry::resolve('contact-hero', 'Calm Nepal mountain landscape for contact planning'),
                'treks' => $treks,
                'preselectedTrek' => $preselectedTrek,
                'topics' => [
                    'general' => 'General question',
                    'trek' => 'A sample trek',
                    'custom' => 'Custom trip idea',
                    'departure' => 'Sample departure',
                    'other' => 'Something else',
                ],
                'breadcrumbs' => [
                    ['label' => 'Home', 'url' => route('website.home')],
                    ['label' => 'Contact'],
                ],
            ])->withErrors($validator);
        }

        // Real Database Persistence: Store in inquiries table
        try {
            $journeyModel = null;
            $submittedTrek = $request->input('trek');
            if (is_string($submittedTrek)) {
                $foundTrek = WebsiteCatalogRepository::findTrek($submittedTrek);
                if (!empty($foundTrek['db_id'])) {
                    $journeyModel = Journey::find($foundTrek['db_id']);
                }
            }

            Inquiry::create([
                'reference_code' => 'INQ-' . strtoupper(bin2hex(random_bytes(4))),
                'inquiry_type' => match ($request->input('topic')) {
                    'trek' => Inquiry::TYPE_JOURNEY,
                    'departure' => Inquiry::TYPE_DEPARTURE,
                    'custom' => Inquiry::TYPE_CUSTOM,
                    default => Inquiry::TYPE_GENERAL,
                },
                'journey_id' => $journeyModel?->id,
                'departure_id' => null,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => null,
                'country' => null,
                'subject' => 'Contact Inquiry: ' . ucfirst((string) $request->input('topic')),
                'message' => (string) $request->input('message'),
                'status' => Inquiry::STATUS_NEW,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Throwable $e) {
            report($e);
        }

        // Only a non-PII success flag survives PRG; submitted values are never flashed or stored.
        $request->session()->flash('contact_success', true);

        return redirect()->route('website.contact');
    }

    protected function renderPolicy(string $slug, string $label)
    {
        $policy = WebsiteCatalogRepository::getPolicy($slug);
        abort_unless($policy, 404);

        return view('website_preview.pages.policy', [
            'policy' => $policy,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => $label],
            ],
        ]);
    }

    public function privacy()
    {
        return $this->renderPolicy('privacy', 'Privacy Policy');
    }

    public function terms()
    {
        return $this->renderPolicy('terms', 'Terms & Conditions');
    }

    public function booking()
    {
        return $this->renderPolicy('booking-conditions', 'Booking Conditions');
    }

    public function cancellation()
    {
        return $this->renderPolicy('cancellation', 'Cancellation Policy');
    }

    public function cookies()
    {
        return $this->renderPolicy('cookies', 'Cookie Policy');
    }

    public function reset(Request $request)
    {
        $prefix = config('website.session_prefix', 'eath_website_v1.');
        $rootPrefix = rtrim($prefix, '.');
        $request->session()->forget($rootPrefix);

        foreach (array_keys($request->session()->all()) as $key) {
            if (str_starts_with($key, $rootPrefix)) {
                $request->session()->forget($key);
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Website session state cleared.',
        ]);
    }

    public function fallback()
    {
        return response()->view('website_preview.pages.error', [
            'title' => 'Website page not found',
            'message' => 'That sample page is not available. Continue exploring the website from the homepage.',
        ], 404);
    }
}
