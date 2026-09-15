@extends('website_preview.layout.master')

@section('title', ($region['meta_title'] ?? ($region['name'] . ' Trekking Region · EATH Travels')))
@section('meta_description', ($region['meta_description'] ?? ($region['summary'] ?? ('Explore trekking routes, seasonal calendars, altitude profiles, and planning details for the ' . $region['name'] . ' region in Nepal.'))))

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- Landscape Hero Section -->
    @php
        $heroImage = $region['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("region-{$region['slug']}", $region['name']);
    @endphp
    <header class="website-card" style="padding: 0; overflow: hidden; position: relative; margin-bottom: var(--space-8); border: 1px solid var(--color-border); border-radius: 0 !important; min-height: 300px; display: flex; flex-direction: column; justify-content: flex-end;">
        <img src="{{ $heroImage['url'] }}" 
             alt="{{ $heroImage['alt'] ?? ($region['name'] . ' Region') }}" 
             width="{{ $heroImage['width'] ?? 1600 }}" 
             height="{{ $heroImage['height'] ?? 900 }}" 
             loading="eager" 
             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">

        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(12, 74, 110, 0.95) 0%, rgba(15, 23, 42, 0.55) 50%, rgba(15, 23, 42, 0.2) 100%); z-index: 1;"></div>

        <div style="position: relative; z-index: 2; padding: var(--space-6) var(--space-8); color: #ffffff; max-width: 860px;">
            <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
                <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.22); color: #ffffff; border-color: rgba(255, 255, 255, 0.35);">
                    {{ $region['region_label'] ?? 'Himalayan Destination Profile' }}
                </span>
                <span class="website-micro" style="color: rgba(255, 255, 255, 0.85);">
                    {{ count($allRegionTreks) }} Sample {{ \Illuminate\Support\Str::plural('Itinerary', count($allRegionTreks)) }}
                </span>
            </div>

            <h1 class="website-h1" style="color: #ffffff; margin: 0 0 var(--space-3) 0;">
                {{ $region['name'] }} Trekking Region
            </h1>

            <p class="website-body" style="color: rgba(255, 255, 255, 0.92); margin: 0; line-height: 1.6; font-size: 1.125rem;">
                {{ $region['summary'] ?? $region['intro'] }}
            </p>
        </div>
    </header>

    <!-- 3. Region Overview (Reading-width Column) -->
    <section aria-labelledby="heading-region-overview" style="margin-bottom: var(--space-10); max-width: 820px;">
        <h2 id="heading-region-overview" class="website-h2" style="margin-bottom: var(--space-3);">
            About the {{ $region['name'] }} Region
        </h2>

        <div style="color: var(--color-text-secondary); line-height: 1.7; font-size: 1rem;">
            {!! $region['description'] ?? ('<p>' . e($region['summary'] ?? $region['intro']) . '</p>') !!}
        </div>
    </section>

    <!-- 4. Experience Highlights Derived from Region Treks -->
    @if(!empty($regionExperiences))
        <section aria-labelledby="heading-experience-highlights" style="margin-bottom: var(--space-10);">
            <div style="margin-bottom: var(--space-4);">
                <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-1);">Trail Highlights</span>
                <h2 id="heading-experience-highlights" class="website-h3" style="margin: 0;">
                    Key Experiences in {{ $region['name'] }}
                </h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
                @foreach($regionExperiences as $exp)
                    <div class="website-card" style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border);">
                        <strong style="color: var(--color-primary-dark); font-size: var(--type-body); display: block; margin-bottom: var(--space-1);">
                            {{ $exp['name'] }}
                        </strong>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.4;">
                            {{ $exp['intro'] }}
                        </p>
                        <div style="margin-top: var(--space-2);">
                            <a href="{{ route('website.experiences.show', $exp['slug']) }}" class="website-micro text-primary text-decoration-underline">
                                Browse experience category &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 5. Treks in this Destination with Controls -->
    <section id="regional-treks" aria-labelledby="heading-regional-treks" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-3);">
            <div>
                <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Catalog Routes</span>
                <h2 id="heading-regional-treks" class="website-h2" style="margin: 0;">
                    Sample Itineraries in {{ $region['name'] }}
                </h2>
                <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                    Showing {{ count($filteredTreks) }} of {{ count($allRegionTreks) }} available routes in this destination.
                </p>
            </div>

            @if(!empty($activeFilters['difficulty']) || !empty($activeFilters['duration']) || !empty($activeFilters['month']))
                <a href="{{ route('website.destinations.show', $region['slug']) }}" class="website-btn website-btn--ghost website-btn--compact" style="font-size: var(--type-small);">
                    Reset Filters &times;
                </a>
            @endif
        </div>

        <!-- Filter Controls Bar -->
        <div class="website-card" style="padding: var(--space-4); margin-bottom: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border);">
            <form method="GET" action="{{ route('website.destinations.show', $region['slug']) }}" style="display: flex; gap: var(--space-3); flex-wrap: wrap; align-items: flex-end;">
                <!-- Difficulty Filter -->
                <div style="flex: 1; min-width: 160px;">
                    <label for="filter-difficulty" class="website-micro website-text-muted" style="display: block; margin-bottom: var(--space-1); font-weight: 600;">
                        Grade / Difficulty
                    </label>
                    <select id="filter-difficulty" name="difficulty" class="website-input" style="width: 100%; font-size: var(--type-small);">
                        <option value="">All Difficulty Grades</option>
                        <option value="easy" {{ ($activeFilters['difficulty'] ?? '') === 'easy' ? 'selected' : '' }}>Easy</option>
                        <option value="moderate" {{ ($activeFilters['difficulty'] ?? '') === 'moderate' ? 'selected' : '' }}>Moderate</option>
                        <option value="challenging" {{ ($activeFilters['difficulty'] ?? '') === 'challenging' ? 'selected' : '' }}>Challenging</option>
                    </select>
                </div>

                <!-- Duration Filter -->
                <div style="flex: 1; min-width: 160px;">
                    <label for="filter-duration" class="website-micro website-text-muted" style="display: block; margin-bottom: var(--space-1); font-weight: 600;">
                        Trip Length
                    </label>
                    <select id="filter-duration" name="duration" class="website-input" style="width: 100%; font-size: var(--type-small);">
                        <option value="">Any Duration</option>
                        <option value="short" {{ ($activeFilters['duration'] ?? '') === 'short' ? 'selected' : '' }}>Short (Up to 8 days)</option>
                        <option value="medium" {{ ($activeFilters['duration'] ?? '') === 'medium' ? 'selected' : '' }}>Medium (9 to 14 days)</option>
                        <option value="long" {{ ($activeFilters['duration'] ?? '') === 'long' ? 'selected' : '' }}>Extended (15+ days)</option>
                    </select>
                </div>

                <!-- Month Filter -->
                <div style="flex: 1; min-width: 160px;">
                    <label for="filter-month" class="website-micro website-text-muted" style="display: block; margin-bottom: var(--space-1); font-weight: 600;">
                        Travel Month
                    </label>
                    <select id="filter-month" name="month" class="website-input" style="width: 100%; font-size: var(--type-small);">
                        <option value="">Any Month</option>
                        @foreach(range(1, 12) as $m)
                            <option value="{{ $m }}" {{ ((int)($activeFilters['month'] ?? 0)) === $m ? 'selected' : '' }}>
                                {{ \Carbon\CarbonImmutable::create(2030, $m, 1)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Apply & Reset Actions -->
                <div style="display: flex; gap: var(--space-2);">
                    <button type="submit" class="website-btn website-btn--primary website-btn--compact">
                        Filter
                    </button>
                    @if(!empty($activeFilters['difficulty']) || !empty($activeFilters['duration']) || !empty($activeFilters['month']))
                        <a href="{{ route('website.destinations.show', $region['slug']) }}" class="website-btn website-btn--outline website-btn--compact">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Trek Grid or Empty Filtered State -->
        @if(count($filteredTreks) > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-6);">
                @foreach($filteredTreks as $trek)
                    @include('website_preview.components.trek-card', ['trek' => $trek])
                @endforeach
            </div>
        @else
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-background-warm); border: 1px dashed var(--color-border);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">No Matches Found</span>
                <h3 class="website-h3" style="margin: 0 0 var(--space-2) 0;">No Sample Itineraries Match Your Filters</h3>
                <p class="website-small website-text-secondary" style="max-width: 520px; margin: 0 auto var(--space-5) auto; line-height: 1.5;">
                    No catalog routes in the {{ $region['name'] }} region match your selected duration, grade, or month criteria. You can reset filters or request a bespoke private itinerary.
                </p>
                <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                    <a href="{{ route('website.destinations.show', $region['slug']) }}" class="website-btn website-btn--outline">
                        Reset Regional Filters
                    </a>
                    <a href="{{ route('website.planner.start') }}?mode=custom&region={{ $region['slug'] }}&source=destination" class="website-btn website-btn--primary">
                        Plan a Custom Route &rarr;
                    </a>
                </div>
            </div>
        @endif
    </section>

    <!-- 6. Sample Best-Month Overview -->
    <section aria-labelledby="heading-best-months" style="margin-bottom: var(--space-10);">
        <div class="website-card" style="padding: var(--space-6); border: 1px solid var(--color-border);">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-1);">Seasonal Calendar</span>
            <h2 id="heading-best-months" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                Optimal Trekking Months for {{ $region['name'] }}
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; max-width: 720px; line-height: 1.5;">
                Derived from the union of associated catalog routes. Note that individual high passes and valley floor itineraries within {{ $region['name'] }} may have distinct micro-climates. This is a sample calendar guide, not an operational guarantee.
            </p>

            <div style="display: flex; flex-wrap: wrap; gap: var(--space-2); margin-bottom: var(--space-4);">
                @foreach($regionMonths as $rm)
                    <a href="{{ route('website.months.show', $rm['slug']) }}" class="website-badge website-badge--accent" style="padding: var(--space-2) var(--space-3); font-size: var(--type-small); text-decoration: none;">
                        {{ $rm['name'] }} &rarr;
                    </a>
                @endforeach
            </div>

            <div style="padding-top: var(--space-3); border-top: 1px solid var(--color-border);">
                <a href="{{ route('website.months.index') }}" class="website-micro text-primary text-decoration-underline">
                    View comprehensive 12-month Nepal trekking calendar &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- 7. Difficulty & Planning Questions -->
    <section aria-labelledby="heading-planning-ranges" style="margin-bottom: var(--space-10);">
        <h2 id="heading-planning-ranges" class="website-h3" style="margin-bottom: var(--space-3);">
            Physical Demand &amp; Altitude Profile
        </h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: var(--space-4); margin-bottom: var(--space-5);">
            <div class="website-card" style="padding: var(--space-4); border: 1px solid var(--color-border);">
                <span class="website-micro website-text-muted" style="display: block;">Max Catalog Altitude</span>
                <strong style="font-size: 1.5rem; color: var(--color-primary-dark);">{{ number_format($maxAlt) }}m</strong>
                <span class="website-micro website-text-secondary" style="display: block; margin-top: 2px;">Peak elevation across routes</span>
            </div>

            <div class="website-card" style="padding: var(--space-4); border: 1px solid var(--color-border);">
                <span class="website-micro website-text-muted" style="display: block;">Duration Scope</span>
                <strong style="font-size: 1.5rem; color: var(--color-primary-dark);">{{ $minDays }} – {{ $maxDays }} Days</strong>
                <span class="website-micro website-text-secondary" style="display: block; margin-top: 2px;">From compact trips to circuits</span>
            </div>

            <div class="website-card" style="padding: var(--space-4); border: 1px solid var(--color-border);">
                <span class="website-micro website-text-muted" style="display: block;">Difficulty Grades</span>
                <strong style="font-size: 1.25rem; color: var(--color-primary-dark); text-transform: capitalize;">
                    {{ implode(', ', $difficultiesPresent) ?: 'Moderate' }}
                </strong>
                <span class="website-micro website-text-secondary" style="display: block; margin-top: 2px;">Assessed based on terrain &amp; altitude</span>
            </div>
        </div>
    </section>

    <!-- 8. Access & Logistics Overview (With Verification Disclaimer) -->
    <section aria-labelledby="heading-access-logistics" style="margin-bottom: var(--space-10);">
        <div style="margin-bottom: var(--space-6);">
            <span style="display: block; color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: var(--type-micro); margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
                EXPEDITION DISPATCH &amp; TRAILHEAD LOGISTICS
            </span>
            <h2 id="heading-access-logistics" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                Reaching the {{ $region['name'] }} Trailheads &amp; Practical Guide
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0; max-width: 820px; line-height: 1.6;">
                Operational field intelligence covering mountain flights, road corridors, conservation checkpoints, and altitude safety protocols verified for the {{ $region['name'] }} region.
            </p>
        </div>

        @php
            $renderFactIcon = function($label, $iconName = null) {
                $haystack = strtolower(($label ?? '') . ' ' . ($iconName ?? ''));
                if (str_contains($haystack, 'air') || str_contains($haystack, 'flight') || str_contains($haystack, 'lukla') || str_contains($haystack, 'jomsom') || str_contains($haystack, 'aviation')) {
                    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17.8 19.2L16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.3c.4-.2.6-.6.5-1.1z"/></svg>';
                }
                if (str_contains($haystack, 'baggage') || str_contains($haystack, 'weight') || str_contains($haystack, 'pack') || str_contains($haystack, 'gear') || str_contains($haystack, 'kilogram')) {
                    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="0"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><line x1="12" y1="11" x2="12" y2="13"/></svg>';
                }
                if (str_contains($haystack, 'permit') || str_contains($haystack, 'checkpoint') || str_contains($haystack, 'regulation') || str_contains($haystack, 'rap') || str_contains($haystack, 'acap') || str_contains($haystack, 'tims') || str_contains($haystack, 'fee')) {
                    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>';
                }
                if (str_contains($haystack, 'acclimat') || str_contains($haystack, 'altitude') || str_contains($haystack, 'pacing') || str_contains($haystack, 'milestone') || str_contains($haystack, 'health') || str_contains($haystack, 'pulse') || str_contains($haystack, 'evac') || str_contains($haystack, 'rescue') || str_contains($haystack, 'helicopter')) {
                    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>';
                }
                if (str_contains($haystack, 'road') || str_contains($haystack, '4wd') || str_contains($haystack, 'transit') || str_contains($haystack, 'gateway') || str_contains($haystack, 'trailhead') || str_contains($haystack, 'jeep') || str_contains($haystack, 'bus')) {
                    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="3" width="15" height="13" rx="0"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>';
                }
                if (str_contains($haystack, 'pass') || str_contains($haystack, 'col') || str_contains($haystack, 'thorong') || str_contains($haystack, 'larkya') || str_contains($haystack, 'wind') || str_contains($haystack, 'weather') || str_contains($haystack, 'monsoon') || str_contains($haystack, 'rain')) {
                    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"/></svg>';
                }
                if (str_contains($haystack, 'lodge') || str_contains($haystack, 'teahouse') || str_contains($haystack, 'solar') || str_contains($haystack, 'home') || str_contains($haystack, 'rebuilt')) {
                    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>';
                }
                if (str_contains($haystack, 'cultur') || str_contains($haystack, 'monast') || str_contains($haystack, 'gompa') || str_contains($haystack, 'temple') || str_contains($haystack, 'cave') || str_contains($haystack, 'etiquette') || str_contains($haystack, 'tibetan')) {
                    return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
                }
                return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>';
            };

            $displayItems = [];
            if (!empty($logisticsItems) && count($logisticsItems) > 0) {
                $displayItems = $logisticsItems;
            } else {
                if (!empty($logistics['gateway'])) {
                    $displayItems[] = ['label' => 'Transit Gateway', 'value' => $logistics['gateway'], 'icon' => 'mdi-bus'];
                }
                if (!empty($logistics['trailheads'])) {
                    $displayItems[] = ['label' => 'Typical Trailheads', 'value' => $logistics['trailheads'], 'icon' => 'mdi-map-marker-path'];
                }
                if (!empty($logistics['permits'])) {
                    $displayItems[] = ['label' => 'Conservation & Entry Permits', 'value' => $logistics['permits'], 'icon' => 'mdi-shield-check-outline'];
                }
                if (!empty($logistics['pacing'])) {
                    $displayItems[] = ['label' => 'Recommended Pacing', 'value' => $logistics['pacing'], 'icon' => 'mdi-heart-pulse'];
                }
            }
        @endphp

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: var(--space-4); margin-bottom: var(--space-4);">
            @foreach($displayItems as $item)
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-top: 3px solid var(--color-primary); border-radius: 0; display: flex; flex-direction: column; justify-content: space-between; box-shadow: none; position: relative;">
                    <div>
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: var(--space-3);">
                            <span style="display: inline-block; color: var(--color-primary); font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
                                FACT {{ sprintf('%02d', $loop->iteration) }}
                            </span>
                            <span style="display: inline-flex; align-items: center; justify-content: center; width: 34px; height: 34px; background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0; color: var(--color-primary);">
                                {!! $renderFactIcon($item['label'], $item['icon'] ?? null) !!}
                            </span>
                        </div>

                        <h3 style="font-size: 1.0625rem; font-weight: 700; color: var(--color-secondary); margin: 0 0 var(--space-3) 0; line-height: 1.35;">
                            {{ $item['label'] }}
                        </h3>

                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.65;">
                            {{ $item['value'] }}
                        </p>
                    </div>

                    <div style="margin-top: var(--space-4); padding-top: var(--space-3); border-top: 1px solid var(--color-background-warm); display: flex; align-items: center; justify-content: space-between;">
                        <span class="website-micro website-text-muted" style="text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">
                            E.A.T.H. Field Standard
                        </span>
                        <span style="font-size: 11px; color: var(--color-primary); font-weight: 600; display: inline-flex; align-items: center; gap: 4px;">
                            <span style="display: inline-block; width: 6px; height: 6px; background: var(--color-primary); border-radius: 0;"></span>
                            Verified
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="padding: var(--space-4) var(--space-5); background: #fef2f2; border: 1px solid #fecaca; border-left: 4px solid var(--color-accent); border-radius: 0; display: flex; align-items: flex-start; gap: var(--space-3); margin-top: var(--space-5);">
            <div style="flex-shrink: 0; color: var(--color-accent); margin-top: 2px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                    <line x1="12" y1="9" x2="12" y2="13"/>
                    <line x1="12" y1="17" x2="12.01" y2="17"/>
                </svg>
            </div>
            <div>
                <strong style="display: block; color: #991b1b; font-size: var(--type-small); text-transform: uppercase; letter-spacing: 0.06em; font-weight: 700; margin-bottom: 2px;">
                    Expedition Operational Advisory Notice
                </strong>
                <p class="website-small" style="margin: 0; color: #7f1d1d; line-height: 1.55;">
                    {{ !empty($region['operational_notice']) ? $region['operational_notice'] : 'Domestic aviation timetables, mountain highway conditions, and conservation permit criteria are subject to governmental and meteorological changes. Always consult verified E.A.T.H. operations staff prior to departure.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- 9. Relevant Sample Articles -->
    @if(!empty($matchedArticles))
        <section aria-labelledby="heading-regional-articles" style="margin-bottom: var(--space-10);">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-2);">
                <div>
                    <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Editorial Guides</span>
                    <h2 id="heading-regional-articles" class="website-h3" style="margin: 0;">
                        Related Articles &amp; Planning Guides
                    </h2>
                </div>
                <a href="{{ route('website.articles.index') }}" class="website-micro text-primary text-decoration-underline">
                    View all travel guides &rarr;
                </a>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-5);">
                @foreach($matchedArticles as $art)
                    @include('website_preview.components.article-card', ['article' => $art])
                @endforeach
            </div>
        </section>
    @endif

    <!-- 10. Regional FAQs -->
    <section aria-labelledby="heading-regional-faqs" style="margin-bottom: var(--space-12);">
        <div style="margin-bottom: var(--space-5);">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-1);">Common Questions</span>
            <h2 id="heading-regional-faqs" class="website-h3" style="margin: 0;">
                Frequently Asked Questions about {{ $region['name'] }}
            </h2>
        </div>

        @include('website_preview.components.accordion', ['items' => $regionalFaqs])
    </section>

    <!-- 11. Plan This Region CTA -->
    <section aria-labelledby="heading-plan-region-cta" class="website-final-cta" style="margin-top: var(--space-8); border-radius: 0 !important;">
        <div class="website-final-cta__inner">
            <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-3); display: inline-block;">
                {{ !empty($region['cta_eyebrow']) ? $region['cta_eyebrow'] : 'EXPEDITION PLANNING' }}
            </span>
            <h2 id="heading-plan-region-cta" class="website-final-cta__title" style="font-size: var(--type-h2);">
                {{ !empty($region['cta_title']) ? $region['cta_title'] : ('Ready to Plan Your ' . $region['name'] . ' Adventure?') }}
            </h2>
            <p class="website-final-cta__subtitle">
                {{ !empty($region['cta_description']) ? $region['cta_description'] : ('Launch our interactive trek planner with the ' . $region['name'] . ' region pre-selected. Tailor your travel window, pacing, and group size to receive curated itinerary recommendations.') }}
            </p>

            <div class="website-final-cta__actions">
                <a href="{{ !empty($region['cta_primary_btn_url']) ? $region['cta_primary_btn_url'] : (route('website.planner.start') . '?mode=discover&region=' . $region['slug'] . '&source=destination') }}"
                   class="website-btn website-btn--accent"
                   style="border-radius: 0 !important;">
                    {{ !empty($region['cta_primary_btn_text']) ? $region['cta_primary_btn_text'] : ('Plan a ' . $region['name'] . ' Trek') }}
                </a>
                <a href="{{ !empty($region['cta_secondary_btn_url']) ? $region['cta_secondary_btn_url'] : route('website.contact') }}"
                   class="website-btn website-btn--outline"
                   style="color: #ffffff; border-color: rgba(255, 255, 255, 0.6); border-radius: 0 !important;">
                    {{ !empty($region['cta_secondary_btn_text']) ? $region['cta_secondary_btn_text'] : 'Ask a Planning Question' }}
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
