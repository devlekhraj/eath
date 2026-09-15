<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Admin\Models\Journey;
use Admin\Models\JourneyDeparture;
use Admin\Models\PlannerSubmission;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;
use Website\Services\WebsitePlannerDraftService;
use Website\Services\WebsiteRecommendationService;
use Website\Support\WebsiteClock;

class PlannerController extends Controller
{
    protected function isAjaxRequest(Request $request): bool
    {
        return $request->ajax()
            || $request->header('X-Planner-Ajax') === '1'
            || $request->wantsJson();
    }

    public function index(Request $request)
    {
        $context = WebsitePlannerDraftService::validateEntryContext($request->all());
        $existingDraft = WebsitePlannerDraftService::getDraft();
        $nextStep = WebsitePlannerDraftService::getNextAccessibleStep($existingDraft);
        $treks = WebsiteCatalogRepository::getTreks();
        $treksKeyed = [];
        foreach ($treks as $t) {
            $treksKeyed[$t['id']] = $t;
        }

        $data = [
            'context' => $context,
            'existingDraft' => $existingDraft,
            'nextStep' => $nextStep,
            'treksKeyed' => $treksKeyed,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Plan My Trek'],
            ],
        ];

        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'step' => 'start',
                'url' => route('website.planner.start'),
                'title' => 'Plan My Himalayan Trek — Interactive Planner (Website)',
                'html' => view('website_preview.pages.planner.start', $data)->render(),
            ]);
        }

        return view('website_preview.pages.planner.start', $data);
    }

    public function form(Request $request)
    {
        return view('website_preview.pages.planner.plan-trip-form', [
            'context' => WebsitePlannerDraftService::validateEntryContext($request->all()),
            'existingDraft' => WebsitePlannerDraftService::getDraft(),
        ]);
    }

    public function start(Request $request)
    {
        $draft = WebsitePlannerDraftService::createDraft($request->all());
        $nextStep = WebsitePlannerDraftService::getNextAccessibleStep($draft);
        $redirectUrl = route('website.planner.step', ['step' => $nextStep]);

        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'next_step' => $nextStep,
                'redirect' => $redirectUrl,
            ]);
        }

        return redirect()->route('website.planner.step', ['step' => $nextStep]);
    }

    public function reset(Request $request)
    {
        WebsitePlannerDraftService::resetAll();
        $redirectUrl = route('website.planner.start');

        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'redirect' => $redirectUrl,
            ]);
        }

        return redirect()->route('website.planner.start');
    }

    public function wizard(Request $request)
    {
        $draft = WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.start'),
                    'notice' => 'Your previous website planning session has expired or was not started. Please begin a new plan below.',
                ], 401);
            }
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your previous website planning session has expired or was not started. Please begin a new plan below.');
        }

        $allSteps = [
            'timing' => [
                'short' => 'Timing',
                'title' => 'Travel Timing & Trip Duration',
                'description' => 'Select your ideal travel window or season, along with your planned duration in Nepal.',
            ],
            'travelers' => [
                'short' => 'Party',
                'title' => 'Travel Party & Group Size',
                'description' => 'Specify the number of adult travelers and any accompanying children.',
            ],
            'preferences' => [
                'short' => 'Pacing',
                'title' => 'Trail Preferences & Acclimatization Pacing',
                'description' => 'Indicate your alpine hiking experience, comfort ceiling, and preferred trip rhythm.',
            ],
            'budget' => [
                'short' => 'Budget',
                'title' => 'Ground Package Budget Guidelines',
                'description' => 'Establish per-person ground package expenditure guidelines.',
            ],
            'recommendations' => [
                'short' => 'Matches',
                'title' => 'Compatible Himalayan Journeys',
                'description' => 'Examine ranked route matches calculated from your input criteria.',
            ],
            'review' => [
                'short' => 'Review',
                'title' => 'Review Journey Itinerary & Selections',
                'description' => 'Inspect your complete draft choices before requesting final itinerary details.',
            ],
        ];

        $requestedStep = $request->query('step', 'timing');
        $stepKeys = array_keys($allSteps);

        if (!in_array($requestedStep, $stepKeys, true)) {
            $requestedStep = 'timing';
        }

        // Guard: enforce earliest accessible step
        if (!WebsitePlannerDraftService::isStepAccessible($requestedStep, $draft)) {
            $earliest = WebsitePlannerDraftService::getNextAccessibleStep($draft);
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.step', ['step' => $earliest]),
                ]);
            }
            return redirect()->route('website.planner.step', ['step' => $earliest]);
        }

        if ($requestedStep === 'review') {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('website.planner.review'),
                ]);
            }
            return redirect()->route('website.planner.review');
        }

        $stepIndex = array_search($requestedStep, $stepKeys, true);
        $prevStep = $stepIndex > 0 ? $stepKeys[$stepIndex - 1] : null;
        $nextStep = $stepIndex < count($stepKeys) - 1 ? $stepKeys[$stepIndex + 1] : null;

        $treks = WebsiteCatalogRepository::getTreks();
        $treksKeyed = [];
        foreach ($treks as $t) {
            $treksKeyed[$t['id']] = $t;
        }

        $accessibleSteps = [];
        foreach ($stepKeys as $sk) {
            if (WebsitePlannerDraftService::isStepAccessible($sk, $draft)) {
                $accessibleSteps[] = $sk;
            }
        }

        $experiences = WebsiteCatalogRepository::getExperiences();
        $addons = WebsiteCatalogRepository::getAddons();
        $months = WebsiteCatalogRepository::getMonths();
        $minDate = WebsiteClock::websiteDateString();

        $recommendationResult = null;
        if ($requestedStep === 'recommendations') {
            $recommendationResult = WebsiteRecommendationService::evaluate($draft);
        }

        $data = [
            'draft' => $draft,
            'currentStep' => $requestedStep,
            'stepIndex' => $stepIndex,
            'stepDetails' => $allSteps[$requestedStep],
            'allSteps' => $allSteps,
            'prevStep' => $prevStep,
            'nextStep' => $nextStep,
            'accessibleSteps' => $accessibleSteps,
            'treksKeyed' => $treksKeyed,
            'experiences' => $experiences,
            'addons' => $addons,
            'months' => $months,
            'minDate' => $minDate,
            'recommendationResult' => $recommendationResult,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Plan My Trek', 'url' => route('website.planner.start')],
                ['label' => $allSteps[$requestedStep]['short']],
            ],
        ];

        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'step' => $requestedStep,
                'url' => route('website.planner.step', ['step' => $requestedStep]),
                'title' => "Plan My Trek — {$allSteps[$requestedStep]['title']} (Website)",
                'html' => view('website_preview.pages.planner.step', $data)->render(),
            ]);
        }

        return view('website_preview.pages.planner.step', $data);
    }

    public function step(Request $request)
    {
        $currentStep = $request->input('step', 'timing');
        $allSteps = ['timing', 'travelers', 'preferences', 'budget', 'recommendations', 'review'];
        if (!in_array($currentStep, $allSteps, true)) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.start'),
                ], 400);
            }
            return redirect()->route('website.planner.start');
        }

        $draft = WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.start'),
                    'notice' => 'Your website planning session has expired. Please start a new plan.',
                ], 401);
            }
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your website planning session has expired. Please start a new plan.');
        }

        $validation = WebsitePlannerDraftService::validateStep($currentStep, $request->all(), $draft);

        if (!$validation['valid']) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'step' => $currentStep,
                    'errors' => $validation['errors'],
                ], 422);
            }

            return redirect()->route('website.planner.step', ['step' => $currentStep])
                ->withErrors($validation['errors'])
                ->withInput();
        }

        // Merge and update draft
        $draft = WebsitePlannerDraftService::updateDraft($validation['data']);

        // Check if custom request action was chosen in step 4 or recommendations
        if ($request->input('action') === 'custom_request') {
            $draft = WebsitePlannerDraftService::updateDraft([
                'mode' => 'custom',
                'selected_trek_id' => null,
            ]);
        }

        $currentIndex = array_search($currentStep, $allSteps, true);
        $nextStep = ($currentIndex !== false && $currentIndex < count($allSteps) - 1) ? $allSteps[$currentIndex + 1] : 'review';

        $redirectUrl = ($nextStep === 'review')
            ? route('website.planner.review')
            : route('website.planner.step', ['step' => $nextStep]);

        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'current_step' => $currentStep,
                'next_step' => $nextStep,
                'redirect' => $redirectUrl,
                'warnings' => $validation['warnings'] ?? [],
            ]);
        }

        $redirect = redirect()->route('website.planner.step', ['step' => $nextStep]);

        if (!empty($validation['warnings'])) {
            $redirect->with('warning', implode(' ', $validation['warnings']));
        }

        return $redirect;
    }

    public function select(Request $request)
    {
        $draft = WebsitePlannerDraftService::getDraft();
        $trek = is_string($request->input('selected_trek_id'))
            ? WebsiteCatalogRepository::findTrek($request->input('selected_trek_id'))
            : null;

        if (!$draft || !$trek) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.start'),
                    'notice' => 'That sample trek selection is no longer available. Please choose another option.',
                ], 400);
            }
            return redirect()->route('website.planner.start')
                ->with('notice', 'That sample trek selection is no longer available. Please choose another option.');
        }

        WebsitePlannerDraftService::updateDraft([
            'selected_trek_id' => $trek['id'],
            'mode' => 'selected',
        ]);

        $redirectUrl = route('website.planner.review');
        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'redirect' => $redirectUrl,
            ]);
        }

        return redirect()->route('website.planner.review');
    }

    public function review(Request $request)
    {
        $draft = WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.start'),
                    'notice' => 'Your website planning session has expired or was not started. Please begin a new plan below.',
                ], 401);
            }
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your website planning session has expired or was not started. Please begin a new plan below.');
        }

        $completed = WebsitePlannerDraftService::getCompletedSteps($draft);
        $requiredSteps = ['timing', 'travelers', 'preferences', 'budget'];
        foreach ($requiredSteps as $req) {
            if (!in_array($req, $completed, true)) {
                if ($this->isAjaxRequest($request)) {
                    return response()->json([
                        'success' => false,
                        'redirect' => route('website.planner.step', ['step' => $req]),
                        'notice' => 'Please complete the earlier steps before reviewing your plan.',
                    ]);
                }
                return redirect()->route('website.planner.step', ['step' => $req])
                    ->with('notice', 'Please complete the earlier steps before reviewing your plan.');
            }
        }

        $selectedTrek = null;
        if (!empty($draft['selected_trek_id'])) {
            $selectedTrek = WebsiteCatalogRepository::findTrek($draft['selected_trek_id']);
        }

        $selectedDeparture = null;
        $unitPrice = $selectedTrek ? $selectedTrek['price_usd'] : null;
        if (!empty($draft['departure_id'])) {
            $departures = WebsiteCatalogRepository::getDepartures();
            $depIndex = array_search($draft['departure_id'], array_column($departures, 'id'));
            if ($depIndex !== false) {
                $selectedDeparture = $departures[$depIndex];
                $unitPrice = $selectedDeparture['price_usd'];
            }
        }

        // Selection conflicts calculation
        $conflicts = [];
        if ($selectedTrek) {
            if (!empty($draft['available_days']) && $selectedTrek['duration_days'] > $draft['available_days']) {
                $conflicts[] = "The selected itinerary ({$selectedTrek['duration_days']} days) exceeds your planned travel window ({$draft['available_days']} days).";
            }
            if (!empty($draft['max_difficulty'])) {
                $diffRanks = ['easy' => 1, 'moderate' => 2, 'challenging' => 3];
                $trekRank = $diffRanks[$selectedTrek['difficulty']] ?? 2;
                $maxRank = $diffRanks[$draft['max_difficulty']] ?? 3;
                if ($trekRank > $maxRank) {
                    $conflicts[] = "The selected trek grade ({$selectedTrek['difficulty']}) exceeds your preferred maximum difficulty ceiling ({$draft['max_difficulty']}).";
                }
            }
            if ($selectedDeparture) {
                $totalParty = ($draft['adults'] ?? 2) + ($draft['children'] ?? 0);
                if ($totalParty > $selectedDeparture['sample_seats']) {
                    $conflicts[] = "Your party of {$totalParty} exceeds the illustrative open seats ({$selectedDeparture['sample_seats']}) on this departure.";
                }
            }
            if (!empty($draft['month']) && !in_array($draft['month'], $selectedTrek['best_months'] ?? [], true)) {
                $monthName = CarbonImmutable::create(2030, $draft['month'], 1)->format('F');
                $conflicts[] = "{$monthName} is outside the primary optimal trekking window for {$selectedTrek['name']}.";
            }
        }

        $data = [
            'draft' => $draft,
            'selectedTrek' => $selectedTrek,
            'selectedDeparture' => $selectedDeparture,
            'unitPrice' => $unitPrice,
            'conflicts' => $conflicts,
        ];

        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'step' => 'review',
                'url' => route('website.planner.review'),
                'title' => 'Review Your Himalayan Trek Plan (Website)',
                'html' => view('website_preview.pages.planner.review', $data)->render(),
            ]);
        }

        return view('website_preview.pages.planner.review', $data);
    }

    public function contact(Request $request)
    {
        $draft = WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.start'),
                    'notice' => 'Your website planning session has expired or was not started. Please begin a new plan below.',
                ], 401);
            }
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your website planning session has expired or was not started. Please begin a new plan below.');
        }

        $completed = WebsitePlannerDraftService::getCompletedSteps($draft);
        $requiredSteps = ['timing', 'travelers', 'preferences', 'budget'];
        foreach ($requiredSteps as $req) {
            if (!in_array($req, $completed, true)) {
                if ($this->isAjaxRequest($request)) {
                    return response()->json([
                        'success' => false,
                        'redirect' => route('website.planner.step', ['step' => $req]),
                    ]);
                }
                return redirect()->route('website.planner.step', ['step' => $req]);
            }
        }

        $selectedTrek = null;
        if (!empty($draft['selected_trek_id'])) {
            $selectedTrek = WebsiteCatalogRepository::findTrek($draft['selected_trek_id']);
        }

        $unitPrice = $selectedTrek ? $selectedTrek['price_usd'] : null;
        if (!empty($draft['departure_id'])) {
            $departures = WebsiteCatalogRepository::getDepartures();
            $depIndex = array_search($draft['departure_id'], array_column($departures, 'id'));
            if ($depIndex !== false) {
                $unitPrice = $departures[$depIndex]['price_usd'];
            }
        }

        $idempotencyToken = WebsitePlannerDraftService::getOrCreateIdempotencyToken();

        $data = [
            'draft' => $draft,
            'selectedTrek' => $selectedTrek,
            'unitPrice' => $unitPrice,
            'idempotencyToken' => $idempotencyToken,
        ];

        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'step' => 'contact',
                'url' => route('website.planner.contact'),
                'title' => 'Sample Contact Details (Website)',
                'html' => view('website_preview.pages.planner.contact', $data)->render(),
            ]);
        }

        return view('website_preview.pages.planner.contact', $data);
    }

    public function submit(Request $request)
    {
        $draft = WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.start'),
                    'notice' => 'Your website planning session expired. Please start fresh.',
                ], 401);
            }
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your website planning session expired. Please start fresh.');
        }

        // Validate idempotency token
        $expectedToken = WebsitePlannerDraftService::getOrCreateIdempotencyToken();
        $submittedToken = $request->input('idempotency_token');

        // Check if this token was already used to generate an active receipt
        $existingReceipt = WebsitePlannerDraftService::getReceipt();
        if ($existingReceipt && ($existingReceipt['idempotency_token'] ?? null) === $submittedToken) {
            $redirectUrl = route('website.planner.confirmation');
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => true,
                    'redirect' => $redirectUrl,
                ]);
            }
            return redirect()->route('website.planner.confirmation');
        }

        if (!$submittedToken || $submittedToken !== $expectedToken) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'errors' => ['idempotency_token' => ['Invalid or expired submission token. Please submit again.']],
                ], 422);
            }
            return redirect()->route('website.planner.contact')
                ->withErrors(['idempotency_token' => 'Invalid or expired submission token. Please submit again.']);
        }

        // Server validation of contact fields
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'email:rfc', 'max:254'],
            'phone' => ['nullable', 'string', 'max:32', 'regex:/^[+0-9\s().-]*$/'],
            'contact_method' => ['required', 'string', 'in:email,phone,whatsapp,unsure'],
        ], [
            'name.required' => 'Please provide a sample traveler name.',
            'name.max' => 'Traveler name cannot exceed 120 characters.',
            'email.required' => 'Please provide a sample email address.',
            'email.email' => 'Please provide a valid email syntax.',
            'email.max' => 'Email cannot exceed 254 characters.',
            'phone.max' => 'Phone number cannot exceed 32 characters.',
            'phone.regex' => 'Phone number contains invalid characters.',
            'contact_method.in' => 'Please select a valid contact method option.',
        ]);

        if ($validator->fails()) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }

            return redirect()->route('website.planner.contact')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        // Server-side recalculation of pricing
        $selectedTrek = null;
        $unitPriceCents = 0;
        $journeyModel = null;
        $departureModel = null;

        if (!empty($draft['selected_trek_id'])) {
            $selectedTrek = WebsiteCatalogRepository::findTrek($draft['selected_trek_id']);
            if ($selectedTrek) {
                $unitPrice = $selectedTrek['price_usd'];
                if (!empty($draft['departure_id'])) {
                    $departures = WebsiteCatalogRepository::getDepartures();
                    $depIndex = array_search($draft['departure_id'], array_column($departures, 'id'));
                    if ($depIndex !== false && $departures[$depIndex]['trek_id'] === $selectedTrek['id']) {
                        $unitPrice = $departures[$depIndex]['price_usd'];
                    }
                }
                $unitPriceCents = (int) ($unitPrice * 100);

                if (!empty($selectedTrek['db_id'])) {
                    $journeyModel = Journey::find($selectedTrek['db_id']);
                }
            }
        }

        if (!empty($draft['departure_id'])) {
            $depParts = explode('-', $draft['departure_id']);
            $depId = end($depParts);
            if (is_numeric($depId)) {
                $departureModel = JourneyDeparture::find((int) $depId);
            }
        }

        $adults = (int) ($draft['adults'] ?? 2);
        $children = (int) ($draft['children'] ?? 0);
        $totalTravelers = $adults + $children;
        $totalPriceCents = $unitPriceCents * $totalTravelers;

        // Construct timing summary string
        if (($draft['timing_mode'] ?? '') === 'dates' && !empty($draft['start_date'])) {
            $dateStr = CarbonImmutable::parse($draft['start_date'])->format('M j, Y');
            $durStr = !empty($draft['available_days']) ? " ({$draft['available_days']} days)" : '';
            $timingSummary = "Dates: {$dateStr}{$durStr}";
        } elseif (($draft['timing_mode'] ?? '') === 'month' && !empty($draft['month'])) {
            $monthStr = CarbonImmutable::create(2030, $draft['month'], 1)->format('F 2030');
            $durStr = !empty($draft['available_days']) ? " ({$draft['available_days']} days)" : '';
            $timingSummary = "Month: {$monthStr}{$durStr}";
        } else {
            $timingSummary = !empty($draft['available_days']) ? "Flexible duration ({$draft['available_days']} days)" : 'Flexible / To discuss';
        }

        // Generate website reference
        $reference = 'WEBSITE-' . strtoupper(bin2hex(random_bytes(3)));

        // Create minimal non-PII receipt
        $receipt = [
            'reference' => $reference,
            'draft_id' => $draft['draft_id'] ?? bin2hex(random_bytes(8)),
            'idempotency_token' => $submittedToken,
            'mode' => $draft['mode'] ?? 'discover',
            'trek_id' => $selectedTrek['id'] ?? null,
            'trek_name' => $selectedTrek['name'] ?? null,
            'trek_slug' => $selectedTrek['slug'] ?? null,
            'departure_id' => $draft['departure_id'] ?? null,
            'party_adults' => $adults,
            'party_children' => $children,
            'total_travelers' => $totalTravelers,
            'timing_summary' => $timingSummary,
            'illustrative_unit_price' => $unitPriceCents,
            'illustrative_total_price' => $totalPriceCents,
            'submitted_at' => WebsiteClock::realTimestamp(),
        ];

        // Save receipt in website session
        WebsitePlannerDraftService::saveReceipt($receipt);

        // Real Database Persistence: Save submission directly to planner_submissions table
        try {
            PlannerSubmission::create([
                'reference_code' => $reference,
                'journey_id' => $journeyModel?->id,
                'departure_id' => $departureModel?->id,
                'destination_id' => $journeyModel?->destination_id,
                'contact_name' => $validated['name'],
                'contact_email' => $validated['email'],
                'contact_phone' => $validated['phone'] ?? null,
                'country' => null,
                'adults' => $adults,
                'children' => $children,
                'available_days' => !empty($draft['available_days']) ? (int) $draft['available_days'] : null,
                'budget_minor' => $totalPriceCents,
                'currency' => 'USD',
                'status' => PlannerSubmission::STATUS_NEW,
                'preferences' => [
                    'timing_summary' => $timingSummary,
                    'contact_method' => $validated['contact_method'],
                    'draft_data' => $draft,
                ],
                'recommendation_snapshot' => $receipt,
                'message' => $draft['special_requests'] ?? null,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Throwable $e) {
            // Log persistence error without interrupting user session flow
            report($e);
        }

        // Discard contact inputs and free-text notes from draft
        WebsitePlannerDraftService::updateDraft([
            'special_requests' => '',
        ]);

        $redirectUrl = route('website.planner.confirmation');
        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'redirect' => $redirectUrl,
                'reference' => $reference,
            ]);
        }

        return redirect()->route('website.planner.confirmation');
    }

    public function confirmation(Request $request)
    {
        $receipt = WebsitePlannerDraftService::getReceipt();
        if (!$receipt) {
            if ($this->isAjaxRequest($request)) {
                return response()->json([
                    'success' => false,
                    'redirect' => route('website.planner.start'),
                    'notice' => 'No active website receipt found. Please configure a trek plan to view a simulated confirmation.',
                ], 404);
            }
            return redirect()->route('website.planner.start')
                ->with('notice', 'No active website receipt found. Please configure a trek plan to view a simulated confirmation.');
        }

        $data = [
            'receipt' => $receipt,
        ];

        if ($this->isAjaxRequest($request)) {
            return response()->json([
                'success' => true,
                'step' => 'confirmation',
                'url' => route('website.planner.confirmation'),
                'title' => 'Website Request Completed · ' . ($receipt['reference'] ?? 'Website Confirmation'),
                'html' => view('website_preview.pages.planner.confirmation', $data)->render(),
            ]);
        }

        return view('website_preview.pages.planner.confirmation', $data);
    }
}
