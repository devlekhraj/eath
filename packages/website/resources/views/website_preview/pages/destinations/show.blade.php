@extends('website_preview.layout.master')

@section('title', $region['name'] . ' Trekking Region · EATH Website')
@section('meta_description', 'Explore sample trekking routes, seasonal calendars, altitude profiles, and planning details for the ' . $region['name'] . ' region in Nepal.')

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
                    Himalayan Destination Profile
                </span>
                <span class="website-micro" style="color: rgba(255, 255, 255, 0.85);">
                    {{ count($allRegionTreks) }} Sample {{ \Illuminate\Support\Str::plural('Itinerary', count($allRegionTreks)) }}
                </span>
            </div>

            <h1 class="website-h1" style="color: #ffffff; margin: 0 0 var(--space-3) 0;">
                {{ $region['name'] }} Trekking Region
            </h1>

            <p class="website-body" style="color: rgba(255, 255, 255, 0.92); margin: 0; line-height: 1.6; font-size: 1.125rem;">
                {{ $region['intro'] }}
            </p>
        </div>
    </header>

    <!-- 3. Region Overview (Reading-width Column) -->
    <section aria-labelledby="heading-region-overview" style="margin-bottom: var(--space-10); max-width: 820px;">
        <h2 id="heading-region-overview" class="website-h2" style="margin-bottom: var(--space-3);">
            About the {{ $region['name'] }} Region
        </h2>

        <div class="website-notice website-notice--info" style="margin-bottom: var(--space-5); padding: var(--space-3) var(--space-4);">
            <span class="website-micro" style="display: block; line-height: 1.4;">
                <strong>Sample Content Notice:</strong> Geographical descriptions, altitude ceilings, and trekking windows are mock fixture records. Real Himalayan expedition planning requires current route verification and professional guiding consultation.
            </span>
        </div>

        <div style="color: var(--color-text-secondary); line-height: 1.7; font-size: 1rem;">
            <p style="margin-bottom: var(--space-4);">
                The {{ $region['name'] }} corridor represents one of Nepal’s premier alpine environments, featuring distinctive ecological transitions, ancient ethnic settlements, and dramatic high-altitude vistas. Whether traversing classic teahouse routes or exploring remote lateral valleys, trekking here demands thoughtful seasonal timing and disciplined acclimatization.
            </p>
            <p style="margin: 0;">
                Below you will find catalog route samples, trail difficulty ranges, illustrative logistics guidance, and recommended planning questions to help structure your itinerary.
            </p>
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
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border);">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Trailhead Logistics</span>
            <h2 id="heading-access-logistics" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                Reaching the {{ $region['name'] }} Trailheads
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-5) 0; line-height: 1.5;">
                Logistical overview based on typical transit hubs. Flight schedules, mountain highway conditions, and conservation permit criteria are subject to local governmental adjustments.
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4); margin-bottom: var(--space-4);">
                <div>
                    <strong class="website-small website-text-muted" style="display: block; text-transform: uppercase;">Transit Gateway:</strong>
                    <p class="website-small" style="margin: 2px 0 0 0;">{{ $logistics['gateway'] }}</p>
                </div>
                <div>
                    <strong class="website-small website-text-muted" style="display: block; text-transform: uppercase;">Typical Trailheads:</strong>
                    <p class="website-small" style="margin: 2px 0 0 0;">{{ $logistics['trailheads'] }}</p>
                </div>
                <div>
                    <strong class="website-small website-text-muted" style="display: block; text-transform: uppercase;">Conservation &amp; Entry Permits:</strong>
                    <p class="website-small" style="margin: 2px 0 0 0;">{{ $logistics['permits'] }}</p>
                </div>
                <div>
                    <strong class="website-small website-text-muted" style="display: block; text-transform: uppercase;">Recommended Pacing:</strong>
                    <p class="website-small" style="margin: 2px 0 0 0;">{{ $logistics['pacing'] }}</p>
                </div>
            </div>

            <div class="website-notice website-notice--warning" style="margin: 0; padding: var(--space-3) var(--space-4);">
                <span class="website-micro" style="display: block; color: var(--color-warning-dark); line-height: 1.4;">
                    <strong>Operational Notice:</strong> Timetables, domestic aviation protocols, and permit fees are illustrative for this website. Never finalize real mountain travel arrangements without verified operator briefing.
                </span>
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
    <section aria-labelledby="heading-plan-region-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 2px solid var(--color-primary-light); text-align: center;">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-2); text-transform: uppercase;">
                Custom Journey Builder
            </span>
            <h2 id="heading-plan-region-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                Ready to Plan Your {{ $region['name'] }} Adventure?
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 680px; margin: 0 auto var(--space-6) auto; line-height: 1.6;">
                Launch our interactive trek planner with the {{ $region['name'] }} region pre-selected. Tailor your travel window, pacing, and group size to receive curated itinerary recommendations.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}?mode=discover&region={{ $region['slug'] }}&source=destination" class="website-btn website-btn--primary">
                    Plan a {{ $region['name'] }} Trek &rarr;
                </a>
                <a href="{{ route('website.contact') }}" class="website-btn website-btn--outline">
                    Ask a Planning Question
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
