<?php

namespace Website\Services;

use Website\Support\WebsiteClock;
use Carbon\CarbonImmutable;

class WebsitePlannerDraftService
{
    public const SCHEMA_VERSION = 1;

    protected static function sessionKey(): string
    {
        return config('website.session_prefix', 'eath_website_v1.') . 'draft';
    }

    protected static function ttlSeconds(): int
    {
        return (int) config('website.session_ttl_minutes', 120) * 60;
    }

    public static function receiptKey(): string
    {
        return config('website.session_prefix', 'eath_website_v1.') . 'receipt';
    }

    public static function idempotencyKey(): string
    {
        return config('website.session_prefix', 'eath_website_v1.') . 'idempotency_token';
    }

    public static function getReceipt(): ?array
    {
        $session = self::getSessionStore();
        if (!$session) {
            return null;
        }
        $raw = $session->get(self::receiptKey());
        if (!is_array($raw)) {
            return null;
        }

        // TTL check using real clock
        $now = WebsiteClock::realTimestamp();
        $submittedAt = $raw['submitted_at'] ?? 0;
        if (($now - $submittedAt) > self::ttlSeconds()) {
            self::resetReceipt();
            return null;
        }

        return $raw;
    }

    public static function saveReceipt(array $receipt): void
    {
        if ($session = self::getSessionStore()) {
            $session->put(self::receiptKey(), $receipt);
        }
    }

    public static function resetReceipt(): void
    {
        if ($session = self::getSessionStore()) {
            $session->forget(self::receiptKey());
        }
    }

    public static function getOrCreateIdempotencyToken(): string
    {
        $session = self::getSessionStore();
        if (!$session) {
            return bin2hex(random_bytes(16));
        }
        $token = $session->get(self::idempotencyKey());
        if (!$token || !is_string($token)) {
            $token = bin2hex(random_bytes(16));
            $session->put(self::idempotencyKey(), $token);
        }
        return $token;
    }

    public static function resetAll(): void
    {
        self::resetDraft();
        self::resetReceipt();
        if ($session = self::getSessionStore()) {
            $session->forget(self::idempotencyKey());
        }
    }

    protected static function getSessionStore()
    {
        if (request()->hasSession()) {
            return request()->session();
        }
        if (app()->bound('session')) {
            return app('session');
        }
        return null;
    }

    /**
     * Get the active session draft, validating schema version and real-clock TTL.
     */
    public static function getDraft(): ?array
    {
        $session = self::getSessionStore();
        if (!$session) {
            return null;
        }
        $raw = $session->get(self::sessionKey());

        if (!is_array($raw)) {
            return null;
        }

        // Schema version check
        if (($raw['schema_version'] ?? 0) !== self::SCHEMA_VERSION) {
            self::resetDraft();
            return null;
        }

        // Real-clock TTL check
        $now = WebsiteClock::realTimestamp();
        $updatedAt = $raw['updated_at'] ?? 0;
        if (($now - $updatedAt) > self::ttlSeconds()) {
            self::resetDraft();
            return null;
        }

        // Derive current completed steps
        $raw['completed_steps'] = self::getCompletedSteps($raw);

        return $raw;
    }

    /**
     * Validate incoming entry context and return normalized entry parameters.
     */
    public static function validateEntryContext(array $input): array
    {
        $allowedModes = ['discover', 'selected', 'custom'];
        $allowedSources = ['home', 'listing', 'detail', 'compare', 'month', 'destination', 'experience', 'departure', 'article', 'story', 'contact'];

        $mode = in_array($input['mode'] ?? '', $allowedModes, true) ? $input['mode'] : 'discover';
        $source = in_array($input['source'] ?? '', $allowedSources, true) ? $input['source'] : 'home';

        $trekId = null;
        $departureId = null;
        $departureWarning = null;
        $prefills = [];

        $treks = WebsiteCatalogRepository::getTreks();
        $allTrekIds = array_column($treks, 'id');

        // Trek validation (supports ID or slug)
        $rawTrek = $input['trek'] ?? null;
        if (is_string($rawTrek)) {
            $foundTrek = WebsiteCatalogRepository::findTrek($rawTrek);
            if ($foundTrek) {
                $trekId = $foundTrek['id'];
            }
        }

        // Selected mode requires a valid trek; fallback to discover if unknown
        if ($mode === 'selected' && !$trekId) {
            $mode = 'discover';
        }

        // Departure validation
        $rawDeparture = $input['departure'] ?? null;
        if ($rawDeparture && is_string($rawDeparture)) {
            $departures = WebsiteCatalogRepository::getDepartures();
            $depIndex = array_search($rawDeparture, array_column($departures, 'id'));

            if ($depIndex !== false) {
                $dep = $departures[$depIndex];
                // Must match incoming trek
                if ($trekId && $dep['trek_id'] === $trekId) {
                    if ($dep['status'] === 'full') {
                        $departureWarning = 'The requested departure is currently full. You may plan custom dates for this trek instead.';
                    } else {
                        $departureId = $dep['id'];
                        $prefills['start_date'] = $dep['start_date'];
                        $prefills['available_days'] = $dep['duration_days'];
                        $prefills['month'] = CarbonImmutable::parse($dep['start_date'])->month;
                        $prefills['timing_mode'] = 'dates';
                    }
                }
            }
        }

        // Prefill region / experience / month context for discover mode
        $regions = WebsiteCatalogRepository::getRegions();
        $regionSlugs = array_column($regions, 'slug');
        if (!empty($input['region']) && in_array($input['region'], $regionSlugs, true)) {
            $prefills['region'] = $input['region'];
        }

        $experiences = WebsiteCatalogRepository::getExperiences();
        $experienceSlugs = array_column($experiences, 'slug');
        if (!empty($input['experience']) && in_array($input['experience'], $experienceSlugs, true)) {
            $prefills['experience'] = $input['experience'];
        }

        if (!empty($input['month']) && is_numeric($input['month'])) {
            $m = (int) $input['month'];
            if ($m >= 1 && $m <= 12) {
                $prefills['month'] = $m;
                $prefills['timing_mode'] = 'month';
            }
        }

        return [
            'mode' => $mode,
            'source' => $source,
            'trek_id' => $trekId,
            'departure_id' => $departureId,
            'departure_warning' => $departureWarning,
            'prefills' => $prefills,
        ];
    }

    /**
     * Create or replace a draft session with validated entry context.
     */
    public static function createDraft(array $input): array
    {
        $context = self::validateEntryContext($input);
        $now = WebsiteClock::realTimestamp();

        $draft = [
            'schema_version' => self::SCHEMA_VERSION,
            'draft_id' => bin2hex(random_bytes(16)),
            'mode' => $context['mode'],
            'source' => $context['source'],
            'timing_mode' => $context['prefills']['timing_mode'] ?? null,
            'start_date' => $context['prefills']['start_date'] ?? null,
            'month' => $context['prefills']['month'] ?? null,
            'available_days' => $context['prefills']['available_days'] ?? null,
            'flexible_dates' => true,
            'adults' => null,
            'children' => 0,
            'child_age_bands' => [],
            'trekking_experience' => null,
            'max_difficulty' => null,
            'walking_hours_max' => null,
            'interests' => !empty($context['prefills']['experience']) ? [$context['prefills']['experience']] : [],
            'accommodation' => null,
            'pace' => null,
            'trip_style' => null,
            'currency' => 'USD',
            'budget_max_usd' => null,
            'budget_includes_flights' => null,
            'addons' => [],
            'special_requests' => '',
            'selected_trek_id' => $context['trek_id'],
            'departure_id' => $context['departure_id'],
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $draft['completed_steps'] = self::getCompletedSteps($draft);

        if ($session = self::getSessionStore()) {
            $session->put(self::sessionKey(), $draft);
        }

        return $draft;
    }

    /**
     * Validate incoming step inputs per specification and return clean attributes or errors.
     */
    public static function validateStep(string $step, array $input, ?array $currentDraft = null): array
    {
        $currentDraft = $currentDraft ?: self::getDraft() ?: [];
        $errors = [];
        $cleanData = [];
        $warnings = [];

        if ($step === 'timing') {
            $timingMode = $input['timing_mode'] ?? '';
            if (!in_array($timingMode, ['dates', 'month', 'unsure'], true)) {
                $errors['timing_mode'] = 'Please select how you would like to plan your dates.';
            } else {
                $cleanData['timing_mode'] = $timingMode;
                if ($timingMode === 'dates') {
                    $startDate = trim($input['start_date'] ?? '');
                    if ($startDate === '') {
                        $errors['start_date'] = 'Please provide a target start date.';
                    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $startDate)) {
                        $errors['start_date'] = 'Please enter a valid calendar date in YYYY-MM-DD format.';
                    } else {
                        // Check not before website calendar
                        $minDate = WebsiteClock::websiteDateString();
                        if ($startDate < $minDate) {
                            $errors['start_date'] = 'Please choose a date on or after the sample calendar date (September 1, 2030).';
                        } else {
                            try {
                                $parsed = CarbonImmutable::parse($startDate);
                                $cleanData['start_date'] = $startDate;
                                $cleanData['month'] = $parsed->month;
                            } catch (\Throwable $e) {
                                $errors['start_date'] = 'Invalid calendar date provided.';
                            }
                        }
                    }
                } elseif ($timingMode === 'month') {
                    $month = $input['month'] ?? null;
                    if (!$month || !is_numeric($month) || (int)$month < 1 || (int)$month > 12) {
                        $errors['month'] = 'Please select a preferred travel month (January to December).';
                    } else {
                        $cleanData['month'] = (int) $month;
                        $cleanData['start_date'] = null;
                    }
                } else { // unsure
                    $cleanData['start_date'] = null;
                    $cleanData['month'] = null;
                }
            }

            // available_days integer 3..30 or explicit null/unsure
            $availableDays = $input['available_days'] ?? null;
            if ($availableDays !== null && trim((string)$availableDays) !== '') {
                if (!is_numeric($availableDays) || (int)$availableDays < 3 || (int)$availableDays > 30 || (float)$availableDays != (int)$availableDays) {
                    $errors['available_days'] = 'Available trip duration must be a whole number between 3 and 30 days.';
                } else {
                    $cleanData['available_days'] = (int) $availableDays;
                }
            } else {
                $cleanData['available_days'] = null;
            }

            $cleanData['flexible_dates'] = !empty($input['flexible_dates']);

            // Departure check: changing timing_mode, start_date or duration clears departure selection if incompatible
            if (!empty($currentDraft['departure_id'])) {
                $departures = WebsiteCatalogRepository::getDepartures();
                $depIndex = array_search($currentDraft['departure_id'], array_column($departures, 'id'));
                if ($depIndex !== false) {
                    $dep = $departures[$depIndex];
                    $datesMatch = ($cleanData['timing_mode'] ?? '') === 'dates' && ($cleanData['start_date'] ?? '') === $dep['start_date'];
                    $daysMatch = empty($cleanData['available_days']) || $cleanData['available_days'] === $dep['duration_days'];
                    if (!$datesMatch || !$daysMatch) {
                        $cleanData['departure_id'] = null;
                        $warnings[] = 'Your previously selected sample departure was cleared because your travel dates or trip duration changed.';
                    }
                } else {
                    $cleanData['departure_id'] = null;
                }
            }
        } elseif ($step === 'travelers') {
            $adults = $input['adults'] ?? null;
            if ($adults === null || !is_numeric($adults) || (int)$adults < 1 || (int)$adults > 12 || (float)$adults != (int)$adults) {
                $errors['adults'] = 'Adult travelers must be a whole number between 1 and 12.';
            } else {
                $cleanData['adults'] = (int) $adults;
            }

            $children = $input['children'] ?? 0;
            if (!is_numeric($children) || (int)$children < 0 || (int)$children > 6 || (float)$children != (int)$children) {
                $errors['children'] = 'Accompanying children must be a whole number between 0 and 6.';
            } else {
                $cleanData['children'] = (int) $children;
            }

            if (($cleanData['children'] ?? 0) > 0) {
                $allowedBands = ['under_6', '6_11', '12_17'];
                $rawBands = (array) ($input['child_age_bands'] ?? []);
                $validBands = [];
                foreach ($rawBands as $b) {
                    if (in_array($b, $allowedBands, true)) {
                        $validBands[] = $b;
                    } else {
                        $errors['child_age_bands'] = 'Invalid child age category selected.';
                        break;
                    }
                }
                while (count($validBands) < $cleanData['children']) {
                    $validBands[] = '6_11';
                }
                $cleanData['child_age_bands'] = array_slice($validBands, 0, $cleanData['children']);
            } else {
                $cleanData['child_age_bands'] = [];
            }

            $trekkingExperience = $input['trekking_experience'] ?? '';
            if (!in_array($trekkingExperience, ['new', 'some', 'experienced', 'unsure'], true)) {
                $errors['trekking_experience'] = 'Please select your alpine hiking experience level.';
            } else {
                $cleanData['trekking_experience'] = $trekkingExperience;
            }

            $maxDiff = $input['max_difficulty'] ?? null;
            if ($maxDiff !== null && $maxDiff !== '' && $maxDiff !== 'none') {
                if (!in_array($maxDiff, ['easy', 'moderate', 'challenging'], true)) {
                    $errors['max_difficulty'] = 'Invalid maximum difficulty ceiling selected.';
                } else {
                    $cleanData['max_difficulty'] = $maxDiff;
                }
            } else {
                $cleanData['max_difficulty'] = null;
            }

            $walkingHours = $input['walking_hours_max'] ?? null;
            if ($walkingHours !== null && trim((string)$walkingHours) !== '') {
                if (!is_numeric($walkingHours) || (int)$walkingHours < 2 || (int)$walkingHours > 10 || (float)$walkingHours != (int)$walkingHours) {
                    $errors['walking_hours_max'] = 'Maximum daily walking hours must be a whole number between 2 and 10 hours.';
                } else {
                    $cleanData['walking_hours_max'] = (int) $walkingHours;
                }
            } else {
                $cleanData['walking_hours_max'] = null;
            }

            // Invalidate departure if total party exceeds illustrative seats
            if (!empty($currentDraft['departure_id']) && empty($errors['adults']) && empty($errors['children'])) {
                $departures = WebsiteCatalogRepository::getDepartures();
                $depIndex = array_search($currentDraft['departure_id'], array_column($departures, 'id'));
                if ($depIndex !== false) {
                    $dep = $departures[$depIndex];
                    $totalParty = ($cleanData['adults'] ?? 1) + ($cleanData['children'] ?? 0);
                    $sampleSeats = $dep['sample_seats'] ?? 0;
                    if ($totalParty > $sampleSeats) {
                        $cleanData['departure_id'] = null;
                        $warnings[] = "Your selected sample departure was cleared because your party of {$totalParty} exceeds the illustrative open seats ({$sampleSeats}) on that departure.";
                    }
                }
            }
        } elseif ($step === 'preferences') {
            $rawInterests = (array) ($input['interests'] ?? []);
            $validExperiences = array_column(WebsiteCatalogRepository::getExperiences(), 'id');
            $cleanInterests = [];
            foreach ($rawInterests as $item) {
                if ($item === '' || $item === 'no_preference') {
                    continue;
                }
                if (!in_array($item, $validExperiences, true)) {
                    $errors['interests'] = 'Invalid interest category selected: ' . e($item);
                    break;
                }
                $cleanInterests[] = $item;
            }
            if (count($cleanInterests) > 6) {
                $errors['interests'] = 'You may select a maximum of 6 interest categories.';
            }
            if (empty($errors['interests'])) {
                $cleanData['interests'] = array_values(array_unique($cleanInterests));
            }

            $accommodation = $input['accommodation'] ?? '';
            if (!in_array($accommodation, ['standard', 'upgraded', 'no_preference'], true)) {
                $errors['accommodation'] = 'Please choose your accommodation preference.';
            } else {
                $cleanData['accommodation'] = $accommodation;
            }

            $pace = $input['pace'] ?? '';
            if (!in_array($pace, ['relaxed', 'balanced', 'active', 'no_preference'], true)) {
                $errors['pace'] = 'Please choose your preferred trekking pace.';
            } else {
                $cleanData['pace'] = $pace;
            }

            $tripStyle = $input['trip_style'] ?? '';
            if (!in_array($tripStyle, ['private', 'group', 'no_preference'], true)) {
                $errors['trip_style'] = 'Please select your trip style preference.';
            } else {
                $cleanData['trip_style'] = $tripStyle;
            }
        } elseif ($step === 'budget') {
            $budgetMax = $input['budget_max_usd'] ?? null;
            if ($budgetMax !== null && trim((string)$budgetMax) !== '') {
                if (!is_numeric($budgetMax) || (int)$budgetMax < 100 || (int)$budgetMax > 10000 || (float)$budgetMax != (int)$budgetMax) {
                    $errors['budget_max_usd'] = 'Target ground package budget must be a whole number between $100 and $10,000 USD per person.';
                } else {
                    $cleanData['budget_max_usd'] = (int) $budgetMax;
                }
            } else {
                $cleanData['budget_max_usd'] = null;
            }

            $flights = $input['budget_includes_flights'] ?? '';
            if (!in_array($flights, ['no', 'yes', 'unsure'], true)) {
                $errors['budget_includes_flights'] = 'Please clarify whether your budget guideline includes international flights.';
            } else {
                $cleanData['budget_includes_flights'] = $flights;
            }

            $rawAddons = (array) ($input['addons'] ?? []);
            $validAddons = array_column(WebsiteCatalogRepository::getAddons(), 'id');
            $cleanAddons = [];
            foreach ($rawAddons as $addon) {
                if ($addon === '') continue;
                if (!in_array($addon, $validAddons, true)) {
                    $errors['addons'] = 'Invalid add-on option selected.';
                    break;
                }
                $cleanAddons[] = $addon;
            }
            if (empty($errors['addons'])) {
                $cleanData['addons'] = array_values(array_unique($cleanAddons));
            }

            $specialRequests = (string) ($input['special_requests'] ?? '');
            if (mb_strlen($specialRequests) > 1000) {
                $errors['special_requests'] = 'Special requests notes cannot exceed 1,000 characters.';
            } else {
                // Strip tags and sanitize for safe escaping everywhere
                $cleanData['special_requests'] = htmlspecialchars(strip_tags($specialRequests), ENT_QUOTES, 'UTF-8');
            }
        } elseif ($step === 'recommendations') {
            $action = $input['action'] ?? 'select_trek';
            if ($action === 'custom_request') {
                $cleanData['mode'] = 'custom';
                $cleanData['selected_trek_id'] = null;
                $cleanData['departure_id'] = null;
            } else {
                $selectedTrekId = $input['selected_trek_id'] ?? ($currentDraft['selected_trek_id'] ?? null);
                $treks = WebsiteCatalogRepository::getTreks();
                $allTrekIds = array_column($treks, 'id');

                if ($selectedTrekId && in_array($selectedTrekId, $allTrekIds, true)) {
                    $cleanData['selected_trek_id'] = $selectedTrekId;
                    $cleanData['mode'] = 'selected';
                    // Clear departure if it belonged to another trek
                    if (!empty($currentDraft['departure_id'])) {
                        $departures = WebsiteCatalogRepository::getDepartures();
                        $depIndex = array_search($currentDraft['departure_id'], array_column($departures, 'id'));
                        if ($depIndex !== false && $departures[$depIndex]['trek_id'] !== $selectedTrekId) {
                            $cleanData['departure_id'] = null;
                            $warnings[] = 'Your sample departure was cleared because you selected a different trek.';
                        }
                    }
                } elseif (($currentDraft['mode'] ?? '') === 'custom') {
                    $cleanData['mode'] = 'custom';
                    $cleanData['selected_trek_id'] = null;
                } else {
                    $errors['selected_trek_id'] = 'Please choose a recommended Himalayan trek or continue as a custom request.';
                }
            }
        }

        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'data' => $cleanData,
            'warnings' => $warnings,
        ];
    }

    /**
     * Update existing draft attributes, renewing TTL and invalidating incompatible fields.
     */
    public static function updateDraft(array $attributes): array
    {
        $draft = self::getDraft();
        if (!$draft) {
            $draft = self::createDraft($attributes);
        }

        $now = WebsiteClock::realTimestamp();

        // Allowed updatable fields per state contract
        $allowedFields = [
            'timing_mode', 'start_date', 'month', 'available_days', 'flexible_dates',
            'adults', 'children', 'child_age_bands', 'trekking_experience', 'max_difficulty',
            'walking_hours_max', 'interests', 'accommodation', 'pace', 'trip_style',
            'budget_max_usd', 'budget_includes_flights', 'addons', 'special_requests',
            'selected_trek_id', 'departure_id', 'mode'
        ];

        foreach ($allowedFields as $field) {
            if (array_key_exists($field, $attributes)) {
                $draft[$field] = $attributes[$field];
            }
        }

        // Invalidate selected departure if dates, duration, travelers, or trek changed incompatibly
        if ($draft['departure_id']) {
            $departures = WebsiteCatalogRepository::getDepartures();
            $depIndex = array_search($draft['departure_id'], array_column($departures, 'id'));
            if ($depIndex !== false) {
                $dep = $departures[$depIndex];
                if ($draft['selected_trek_id'] && $dep['trek_id'] !== $draft['selected_trek_id']) {
                    $draft['departure_id'] = null;
                }
            } else {
                $draft['departure_id'] = null;
            }
        }

        $draft['updated_at'] = $now;
        $draft['completed_steps'] = self::getCompletedSteps($draft);

        if ($session = self::getSessionStore()) {
            $session->put(self::sessionKey(), $draft);
        }

        return $draft;
    }

    /**
     * Safely purge only website draft keys without affecting other session state.
     */
    public static function resetDraft(): void
    {
        if ($session = self::getSessionStore()) {
            $session->forget(self::sessionKey());
        }
    }

    /**
     * Server-derived completed steps from draft attributes.
     */
    public static function getCompletedSteps(?array $draft = null): array
    {
        if (!$draft) {
            $draft = self::getDraft();
        }

        if (!$draft) {
            return [];
        }

        $completed = [];

        // 1. Timing step completion
        if (!empty($draft['timing_mode'])) {
            if ($draft['timing_mode'] === 'dates' && !empty($draft['start_date'])) {
                $completed[] = 'timing';
            } elseif ($draft['timing_mode'] === 'month' && !empty($draft['month'])) {
                $completed[] = 'timing';
            } elseif ($draft['timing_mode'] === 'unsure') {
                $completed[] = 'timing';
            }
        }

        // 2. Travelers step completion
        if (($draft['adults'] ?? 0) >= 1 && ($draft['adults'] ?? 0) <= 12 && !empty($draft['trekking_experience'])) {
            $completed[] = 'travelers';
        }

        // 3. Preferences step completion
        if (!empty($draft['accommodation']) && !empty($draft['pace']) && !empty($draft['trip_style'])) {
            $completed[] = 'preferences';
        }

        // 4. Budget step completion
        if (!empty($draft['budget_includes_flights'])) {
            $completed[] = 'budget';
        }

        // 5. Recommendations step completion
        if (!empty($draft['selected_trek_id']) || ($draft['mode'] ?? '') === 'custom') {
            $completed[] = 'recommendations';
        }

        // 6. Review step completion
        if (in_array('timing', $completed) && in_array('travelers', $completed) && in_array('preferences', $completed) && in_array('budget', $completed)) {
            $completed[] = 'review';
        }

        return $completed;
    }

    /**
     * Determine next accessible step based on earliest incomplete step.
     */
    public static function getNextAccessibleStep(?array $draft = null): string
    {
        $allSteps = ['timing', 'travelers', 'preferences', 'budget', 'recommendations', 'review'];
        $completed = self::getCompletedSteps($draft);

        foreach ($allSteps as $step) {
            if (!in_array($step, $completed, true)) {
                return $step;
            }
        }

        return 'review';
    }

    /**
     * Check if a specific step is accessible for navigation.
     */
    public static function isStepAccessible(string $step, ?array $draft = null): bool
    {
        $allSteps = ['timing', 'travelers', 'preferences', 'budget', 'recommendations', 'review'];
        if (!in_array($step, $allSteps, true)) {
            return false;
        }

        $stepIndex = array_search($step, $allSteps, true);
        $nextStep = self::getNextAccessibleStep($draft);
        $nextIndex = array_search($nextStep, $allSteps, true);

        return $stepIndex <= $nextIndex;
    }
}
