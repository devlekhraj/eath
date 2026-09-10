@extends('website_preview.layout.master')

@section('title', 'Review Your Himalayan Trek Plan (Website)')
@section('meta_description', 'Review your tailored Himalayan trek plan, dates, party size, and illustrative pricing before submitting website request.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12); max-width: 960px;">

    <!-- 1. Header & Navigation -->
    <div style="margin-bottom: var(--space-6);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-3); flex-wrap: wrap; gap: var(--space-2);">
            <div style="display: flex; gap: var(--space-2); align-items: center; flex-wrap: wrap;">
                <span class="website-badge website-badge--accent" style="text-transform: uppercase;">
                    Step 6 of 6 &middot; Plan Review
                </span>
                <span class="website-micro website-text-muted">Pure Session State &middot; No Booking or Payment Required</span>
            </div>

            <form method="POST" action="{{ route('website.planner.reset') }}" style="display: inline;">
                @csrf
                <button type="submit" class="website-btn website-btn--ghost website-btn--compact" style="color: var(--color-text-muted); font-size: var(--type-micro);" onclick="return confirm('Reset your website trip plan?');">
                    Reset Plan
                </button>
            </form>
        </div>

        <h1 class="website-h1" style="margin-bottom: var(--space-2);">Review Your Himalayan Journey</h1>
        <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.5; max-width: 760px;">
            Inspect your complete trip preferences below. You can edit any individual step or proceed to sample contact submission. No live reservation or financial charge will take place.
        </p>
    </div>

    <!-- 2. Selected Journey Banner -->
    @if(!empty($selectedTrek))
        <div class="website-card" style="padding: var(--space-5); margin-bottom: var(--space-6); background: var(--color-background-warm); border: 2px solid var(--color-primary-light);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: var(--space-3); flex-wrap: wrap;">
                <div>
                    <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-2);">Selected Trek Itinerary</span>
                    <h2 class="website-h2" style="margin: 0 0 var(--space-1) 0;">
                        <a href="{{ route('website.treks.show', $selectedTrek['slug']) }}?from=planner" class="text-primary" style="text-decoration: underline;">
                            {{ $selectedTrek['name'] }}
                        </a>
                    </h2>
                    <span class="website-small website-text-secondary">
                        {{ $selectedTrek['duration_days'] }} Days &middot; {{ ucfirst($selectedTrek['difficulty']) }} Grade &middot; Max {{ number_format($selectedTrek['max_altitude_m']) }}m &middot; {{ $selectedTrek['region']['name'] }} Region
                    </span>
                </div>

                <div style="text-align: right;">
                    <span class="website-micro website-text-muted" style="display: block;">Illustrative ground package</span>
                    <strong style="font-size: var(--type-h3); color: var(--color-primary-dark);">${{ number_format($unitPrice ?? $selectedTrek['price_usd']) }}</strong>
                    <span class="website-micro website-text-secondary"> USD / traveler</span>
                </div>
            </div>

            @if(!empty($selectedDeparture))
                <div style="margin-top: var(--space-3); padding-top: var(--space-3); border-top: 1px solid var(--color-border); display: flex; gap: var(--space-3); align-items: center; flex-wrap: wrap;">
                    <span class="website-badge website-badge--accent">Sample Fixed Departure</span>
                    <span class="website-small">
                        <strong>{{ \Carbon\CarbonImmutable::parse($selectedDeparture['start_date'])->format('F j, Y') }}</strong>
                        ({{ $selectedDeparture['sample_seats'] }} illustrative open seats)
                    </span>
                </div>
            @endif
        </div>
    @else
        <div class="website-card" style="padding: var(--space-5); margin-bottom: var(--space-6); background: var(--color-background-warm); border: 2px solid var(--color-warm);">
            <div style="display: flex; justify-content: space-between; align-items: center; gap: var(--space-2); flex-wrap: wrap;">
                <div>
                    <span class="website-badge website-badge--warm" style="margin-bottom: var(--space-2);">Custom Private Journey</span>
                    <h2 class="website-h2" style="margin: 0;">Bespoke Tailored Itinerary Request</h2>
                    <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                        No fixed catalog trek selected. Our team will tailor a private Himalayan journey around your dates and physical preferences.
                    </p>
                </div>
                <a href="{{ route('website.planner.step', ['step' => 'recommendations']) }}" class="website-btn website-btn--outline website-btn--compact">
                    Choose a Trek
                </a>
            </div>
        </div>
    @endif

    <!-- 3. Selection Conflicts Notice (If any) -->
    @if(!empty($conflicts))
        <div class="website-notice website-notice--warning" style="margin-bottom: var(--space-6); padding: var(--space-4);">
            <h3 class="website-h4" style="color: var(--color-warning-dark); margin-top: 0; margin-bottom: var(--space-1);">
                Planning Note: Review Items Detected
            </h3>
            <ul style="margin: 0; padding-left: var(--space-4); color: var(--color-warning-dark); font-size: var(--type-small);">
                @foreach($conflicts as $conflict)
                    <li>{{ $conflict }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- 4. Four Structured Step Review Groups -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4); margin-bottom: var(--space-6);">
        <!-- Group 1: Timing & Dates -->
        <div class="website-card" style="padding: var(--space-4);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-3); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-2);">
                <h3 class="website-h4" style="margin: 0; font-size: 1rem;">1. Travel Timing</h3>
                <a href="{{ route('website.planner.step', ['step' => 'timing']) }}" class="website-micro text-primary text-decoration-underline" style="font-weight: 600;">Edit</a>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-2); font-size: var(--type-small);">
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Timing Mode:</span>
                    <strong style="text-transform: capitalize;">{{ $draft['timing_mode'] ?? 'To discuss' }}</strong>
                </li>
                @if(!empty($draft['start_date']))
                    <li style="display: flex; justify-content: space-between;">
                        <span class="website-text-secondary">Target Start:</span>
                        <strong>{{ \Carbon\CarbonImmutable::parse($draft['start_date'])->format('M j, Y') }}</strong>
                    </li>
                @elseif(!empty($draft['month']))
                    <li style="display: flex; justify-content: space-between;">
                        <span class="website-text-secondary">Preferred Month:</span>
                        <strong>{{ \Carbon\CarbonImmutable::create(2030, $draft['month'], 1)->format('F') }}</strong>
                    </li>
                @endif
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Trip Duration:</span>
                    <strong>{{ !empty($draft['available_days']) ? $draft['available_days'] . ' Days' : 'Flexible / To discuss' }}</strong>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Flexibility:</span>
                    <span>{{ !empty($draft['flexible_dates']) ? '&plusmn;3 days flexible' : 'Exact dates only' }}</span>
                </li>
            </ul>
        </div>

        <!-- Group 2: Party & Experience -->
        <div class="website-card" style="padding: var(--space-4);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-3); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-2);">
                <h3 class="website-h4" style="margin: 0; font-size: 1rem;">2. Party &amp; Experience</h3>
                <a href="{{ route('website.planner.step', ['step' => 'travelers']) }}" class="website-micro text-primary text-decoration-underline" style="font-weight: 600;">Edit</a>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-2); font-size: var(--type-small);">
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Party Composition:</span>
                    <strong>{{ $draft['adults'] ?? 2 }} Adults{{ ($draft['children'] ?? 0) > 0 ? ', ' . $draft['children'] . ' Kids' : '' }}</strong>
                </li>
                @if(!empty($draft['child_age_bands']))
                    <li style="display: flex; justify-content: space-between;">
                        <span class="website-text-secondary">Child Age Bands:</span>
                        <span>{{ implode(', ', array_map(fn($b) => str_replace('_', '-', $b) . ' yrs', $draft['child_age_bands'])) }}</span>
                    </li>
                @endif
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Alpine Experience:</span>
                    <strong style="text-transform: capitalize;">{{ $draft['trekking_experience'] ?? 'To discuss' }}</strong>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Difficulty Ceiling:</span>
                    <span>{{ !empty($draft['max_difficulty']) ? ucfirst($draft['max_difficulty']) : 'No ceiling' }}</span>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Walking Hours Max:</span>
                    <span>{{ !empty($draft['walking_hours_max']) ? $draft['walking_hours_max'] . ' hrs/day' : 'Standard trail pacing' }}</span>
                </li>
            </ul>
        </div>

        <!-- Group 3: Interests & Pacing -->
        <div class="website-card" style="padding: var(--space-4);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-3); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-2);">
                <h3 class="website-h4" style="margin: 0; font-size: 1rem;">3. Trail Preferences</h3>
                <a href="{{ route('website.planner.step', ['step' => 'preferences']) }}" class="website-micro text-primary text-decoration-underline" style="font-weight: 600;">Edit</a>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-2); font-size: var(--type-small);">
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Selected Interests:</span>
                    <strong>{{ !empty($draft['interests']) ? count($draft['interests']) . ' Highlights' : 'No specific preference' }}</strong>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Accommodation:</span>
                    <strong style="text-transform: capitalize;">{{ str_replace('_', ' ', $draft['accommodation'] ?? 'standard') }}</strong>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Daily Pace:</span>
                    <strong style="text-transform: capitalize;">{{ str_replace('_', ' ', $draft['pace'] ?? 'balanced') }}</strong>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Trip Style:</span>
                    <strong style="text-transform: capitalize;">{{ str_replace('_', ' ', $draft['trip_style'] ?? 'private') }}</strong>
                </li>
            </ul>
        </div>

        <!-- Group 4: Budget & Add-ons -->
        <div class="website-card" style="padding: var(--space-4);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-3); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-2);">
                <h3 class="website-h4" style="margin: 0; font-size: 1rem;">4. Budget &amp; Notes</h3>
                <a href="{{ route('website.planner.step', ['step' => 'budget']) }}" class="website-micro text-primary text-decoration-underline" style="font-weight: 600;">Edit</a>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-2); font-size: var(--type-small);">
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Budget Guideline:</span>
                    <strong>{{ !empty($draft['budget_max_usd']) ? '$' . number_format($draft['budget_max_usd']) . ' USD' : 'To discuss' }}</strong>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Flights Included:</span>
                    <span style="text-transform: capitalize;">{{ $draft['budget_includes_flights'] ?? 'no' }}</span>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Add-on Requests:</span>
                    <span>{{ !empty($draft['addons']) ? count($draft['addons']) . ' requests' : 'None requested' }}</span>
                </li>
                <li style="display: flex; justify-content: space-between;">
                    <span class="website-text-secondary">Special Notes:</span>
                    <span>{{ !empty($draft['special_requests']) ? 'Custom notes provided' : 'None' }}</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- 5. Illustrative Price Breakdown -->
    <div class="website-card" style="padding: var(--space-5); margin-bottom: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border);">
        <h3 class="website-h3" style="margin-top: 0; margin-bottom: var(--space-3);">
            Illustrative Price Breakdown (Website Ground Package)
        </h3>

        @if(!empty($selectedTrek))
            @php
                $totalTravelers = ($draft['adults'] ?? 2) + ($draft['children'] ?? 0);
                $unitRate = $unitPrice ?? $selectedTrek['price_usd'];
                $illustrativeSubtotal = $unitRate * $totalTravelers;
            @endphp
            <div style="display: flex; flex-direction: column; gap: var(--space-3); margin-bottom: var(--space-4);">
                <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-2); font-size: var(--type-body);">
                    <span>Base ground package rate per person:</span>
                    <strong>${{ number_format($unitRate) }} USD</strong>
                </div>
                <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-2); font-size: var(--type-body);">
                    <span>Total travelers in party:</span>
                    <strong>{{ $totalTravelers }} Travelers ({{ $draft['adults'] ?? 2 }} Adults{{ ($draft['children'] ?? 0) > 0 ? ', ' . $draft['children'] . ' Children' : '' }})</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding-top: var(--space-1); font-size: 1.1rem; color: var(--color-primary-dark);">
                    <span>Illustrative Party Subtotal:</span>
                    <strong>${{ number_format($illustrativeSubtotal) }} USD</strong>
                </div>
            </div>

            <div class="website-notice website-notice--info" style="padding: var(--space-3); margin: 0;">
                <p class="website-micro" style="margin: 0; line-height: 1.4;">
                    <strong>Website Pricing Disclosure:</strong> In this sample preview, the standard unit rate is applied equally across all party travelers. This is an illustrative estimation and does not represent an actual child-pricing discount or commercial quote. International flights, medical/evacuation insurance, alcoholic beverages, and discretionary tips are excluded. This calculation is not an amount due or confirmed quote.
                </p>
            </div>
        @else
            <div style="padding: var(--space-4); background: var(--color-background-warm); border-radius: var(--radius-md); text-align: center;">
                <strong style="display: block; font-size: var(--type-h4); color: var(--color-text-secondary); margin-bottom: var(--space-1);">
                    No sample price selected
                </strong>
                <p class="website-small website-text-muted" style="margin: 0;">
                    Custom private journeys are quoted individually based on trail length, porter ratios, and lodge categories.
                </p>
            </div>
        @endif
    </div>

    <!-- 6. Bottom Navigation Actions -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3); border-top: 1px solid var(--color-border); padding-top: var(--space-5);">
        <a href="{{ route('website.planner.step', ['step' => 'recommendations']) }}" class="website-btn website-btn--ghost">
            &larr; Back to Route Suggestions
        </a>

        <a href="{{ route('website.planner.contact') }}" class="website-btn website-btn--primary">
            Continue to Sample Contact &rarr;
        </a>
    </div>
</div>
@endsection
