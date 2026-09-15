@extends('website_preview.layout.master')

@section('title', 'Sample Departures & Group Dates · EATH Website')
@section('meta_description', 'Browse illustrative group departure dates, sample availability, and estimated rates across Nepal\'s premier trekking routes. Pure catalog website.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- H1 & Sample-Calendar / Availability Warning -->
    <header style="margin-bottom: var(--space-8); max-width: 880px;">
        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2); flex-wrap: wrap;">
            <span class="website-badge website-badge--primary">Sample Calendar</span>
            <span class="website-badge website-badge--neutral">Reference Clock: 2030-09-01</span>
            <span class="website-badge website-badge--neutral">24 Fixture Departures</span>
        </div>

        <h1 class="website-h1" style="margin: 0 0 var(--space-3) 0;">
            Sample Departures &amp; Group Dates
        </h1>

        <p class="website-body website-text-secondary" style="font-size: 1.125rem; line-height: 1.6; margin: 0 0 var(--space-4) 0;">
            Explore sample scheduled departures across our catalog of Himalayan routes. Each entry illustrates seasonal departure pacing, capacity thresholds, and per-person pricing structures.
        </p>

        <!-- Prominent Availability Warning -->
        <div class="website-notice website-notice--info" style="margin: 0; padding: var(--space-4);">
            <strong class="website-small" style="display: block; margin-bottom: var(--space-1); color: var(--color-primary-dark);">
                Sample Calendar &amp; Availability Notice
            </strong>
            <span class="website-micro" style="display: block; line-height: 1.5;">
                Departure dates, seat capacities, and rates are illustrative website fixtures anchored to a fixed catalog clock (2030-09-01). They do not represent real-time booking availability, guaranteed group departures, or live airline schedules. Selecting dates or changing filters does not place a hold or reserve seats.
            </span>
        </div>
    </header>

    <!-- 3. Month, Region & Trek Filters -->
    <section aria-labelledby="heading-departure-filters" style="margin-bottom: var(--space-8);">
        <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border);">
            <form action="{{ route('website.departures.index') }}" method="GET" style="display: flex; flex-wrap: wrap; gap: var(--space-4); align-items: flex-end;">
                <!-- Month Filter -->
                <div style="flex: 1 1 180px;">
                    <label for="filter-month" class="website-micro" style="font-weight: 600; display: block; margin-bottom: var(--space-1); text-transform: uppercase;">
                        Departure Month
                    </label>
                    <select id="filter-month" name="month" class="website-input" style="width: 100%;">
                        <option value="">All Sample Months</option>
                        @foreach($allMonths as $m)
                            <option value="{{ $m['id'] }}" {{ (string)$filterMonth === (string)$m['id'] ? 'selected' : '' }}>
                                {{ $m['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Region Filter -->
                <div style="flex: 1 1 180px;">
                    <label for="filter-region" class="website-micro" style="font-weight: 600; display: block; margin-bottom: var(--space-1); text-transform: uppercase;">
                        Region
                    </label>
                    <select id="filter-region" name="region" class="website-input" style="width: 100%;">
                        <option value="">All Regions</option>
                        @foreach($allRegions as $r)
                            <option value="{{ $r['id'] }}" {{ $filterRegion === $r['id'] ? 'selected' : '' }}>
                                {{ $r['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Trek Filter -->
                <div style="flex: 2 1 240px;">
                    <label for="filter-trek" class="website-micro" style="font-weight: 600; display: block; margin-bottom: var(--space-1); text-transform: uppercase;">
                        Trek Route
                    </label>
                    <select id="filter-trek" name="trek" class="website-input" style="width: 100%;">
                        <option value="">All Catalog Treks</option>
                        @foreach($allTreks as $t)
                            <option value="{{ $t['id'] }}" {{ $filterTrek === $t['id'] ? 'selected' : '' }}>
                                {{ $t['name'] }} ({{ $t['duration_days'] }}d)
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Actions -->
                <div style="display: flex; gap: var(--space-2); align-items: center;">
                    <button type="submit" class="website-btn website-btn--primary">
                        Filter
                    </button>

                    @if($hasActiveFilters)
                        <a href="{{ route('website.departures.index') }}" class="website-btn website-btn--outline" style="text-decoration: none;">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <!-- 4. Count and Departure Rows Grouped by Start Month -->
    <section aria-labelledby="heading-departures-list" style="margin-bottom: var(--space-10);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-2);">
            <div>
                <h2 id="heading-departures-list" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                    Available Sample Departures ({{ $totalCount }})
                </h2>
                <p class="website-small website-text-secondary" style="margin: 0;">
                    Page {{ $page }} of {{ $totalPages }} (12 departures per page).
                </p>
            </div>

            @if($hasActiveFilters)
                <span class="website-badge website-badge--accent">
                    Filtered Results
                </span>
            @endif
        </div>

        @if(count($groupedDepartures) > 0)
            @foreach($groupedDepartures as $monthGroup => $departures)
                <div style="margin-bottom: var(--space-8);">
                    <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-3); padding-bottom: var(--space-2); border-bottom: 2px solid var(--color-border);">
                        <svg class="website-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="4" width="18" height="18"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <h3 class="website-h3" style="margin: 0; color: var(--color-primary-dark);">
                            {{ $monthGroup }}
                        </h3>
                        <span class="website-badge website-badge--neutral" style="font-size: 0.75rem;">
                            {{ count($departures) }} {{ count($departures) === 1 ? 'Departure' : 'Departures' }}
                        </span>
                    </div>

                    <!-- Accessible Table Wrapper -->
                    <div class="website-table-wrapper" tabindex="0" role="region" aria-label="Departures for {{ $monthGroup }}">
                        <table class="website-departures-table">
                            <caption class="sr-only">List of sample group departures scheduled for {{ $monthGroup }}</caption>
                            <thead>
                                <tr>
                                    <th scope="col" style="min-width: 220px;">Trek Route</th>
                                    <th scope="col" style="min-width: 190px;">Start &amp; End Dates</th>
                                    <th scope="col" style="min-width: 100px;">Duration</th>
                                    <th scope="col" style="min-width: 160px;">Sample Status</th>
                                    <th scope="col" style="min-width: 120px;">Seats</th>
                                    <th scope="col" style="min-width: 130px;">Sample Rate</th>
                                    <th scope="col" style="min-width: 180px; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departures as $dep)
                                    <tr>
                                        <!-- Trek Route -->
                                        <td>
                                            <a href="{{ route('website.treks.show', ['slug' => $dep['trek_slug']]) }}"
                                               class="text-primary"
                                               style="font-weight: 600; text-decoration: underline; display: block; margin-bottom: 2px;">
                                                {{ $dep['trek_name'] }}
                                            </a>
                                            <span class="website-micro website-text-muted">
                                                Code: {{ $dep['id'] }}
                                            </span>
                                        </td>

                                        <!-- Dates -->
                                        <td>
                                            <strong style="display: block; color: var(--color-text);">
                                                {{ $dep['start_date'] }}
                                            </strong>
                                            <span class="website-micro website-text-secondary">
                                                to {{ $dep['end_date'] }}
                                            </span>
                                        </td>

                                        <!-- Duration -->
                                        <td>
                                            <span>{{ $dep['duration_days'] }} Days</span>
                                        </td>

                                        <!-- Sample Status (icon-driven, neutral text, no colored UI boxes) -->
                                        <td>
                                            @include('website_preview.components.status-indicator', [
                                                'status' => $dep['status'],
                                                'label' => $dep['status'] === 'open' ? 'Open' : ($dep['status'] === 'limited' ? 'Limited Seats' : 'Full / Unavailable')
                                            ])
                                        </td>

                                        <!-- Available Seats -->
                                        <td>
                                            @if($dep['sample_seats'] > 0)
                                                <span style="font-weight: 600;">{{ $dep['sample_seats'] }}</span>
                                                <span class="website-micro website-text-secondary"> left</span>
                                            @else
                                                <span class="website-micro website-text-muted">0 seats</span>
                                            @endif
                                        </td>

                                        <!-- Per Person USD Rate -->
                                        <td>
                                            <strong style="color: var(--color-primary-dark); font-size: 0.95rem;">
                                                {{ \Website\Support\WebsiteMoneyFormatter::formatUsd($dep['price_minor']) }}
                                            </strong>
                                            <span class="website-micro website-text-muted" style="display: block;">/ person</span>
                                        </td>

                                        <!-- Actions -->
                                        <td style="text-align: center;">
                                            <div style="display: flex; flex-direction: column; gap: var(--space-1); align-items: center;">
                                                @if($dep['is_bookable'])
                                                    <a href="{{ route('website.planner.start') }}?mode=selected&trek={{ $dep['trek_id'] }}&departure={{ $dep['id'] }}&source=departure"
                                                       class="website-btn website-btn--primary"
                                                       style="padding: var(--space-1) var(--space-3); font-size: 0.8rem; width: 100%;">
                                                        Plan This Date &rarr;
                                                    </a>
                                                @else
                                                    <button type="button"
                                                            class="website-btn website-btn--ghost"
                                                            disabled
                                                            style="padding: var(--space-1) var(--space-3); font-size: 0.8rem; width: 100%; opacity: 0.6; cursor: not-allowed;">
                                                        Full (No Seats)
                                                    </button>
                                                    <a href="{{ route('website.planner.start') }}?mode=custom&trek={{ $dep['trek_id'] }}&source=departure"
                                                       class="website-micro text-primary"
                                                       style="text-decoration: underline; margin-top: 2px;">
                                                        Custom Dates &rarr;
                                                    </a>
                                                @endif

                                                <a href="{{ route('website.treks.show', ['slug' => $dep['trek_slug']]) }}"
                                                   class="website-micro website-text-secondary"
                                                   style="text-decoration: underline;">
                                                    View Details
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach

            <!-- Pagination Bar -->
            @if($totalPages > 1)
                <nav aria-label="Departures Pagination" style="display: flex; justify-content: space-between; align-items: center; margin-top: var(--space-6); padding-top: var(--space-4); border-top: 1px solid var(--color-border); flex-wrap: wrap; gap: var(--space-3);">
                    @php
                        $prevPageUrl = ($page > 1) ? route('website.departures.index', array_merge(request()->query(), ['page' => $page - 1])) : null;
                        $nextPageUrl = ($page < $totalPages) ? route('website.departures.index', array_merge(request()->query(), ['page' => $page + 1])) : null;
                    @endphp

                    @if($prevPageUrl)
                        <a href="{{ $prevPageUrl }}" class="website-btn website-btn--outline" style="font-size: 0.875rem;">
                            &larr; Previous Page
                        </a>
                    @else
                        <span class="website-btn website-btn--ghost" style="font-size: 0.875rem; opacity: 0.5; cursor: not-allowed;">
                            &larr; Previous Page
                        </span>
                    @endif

                    <span class="website-small website-text-secondary">
                        Page <strong>{{ $page }}</strong> of <strong>{{ $totalPages }}</strong> ({{ $totalCount }} total departures)
                    </span>

                    @if($nextPageUrl)
                        <a href="{{ $nextPageUrl }}" class="website-btn website-btn--outline" style="font-size: 0.875rem;">
                            Next Page &rarr;
                        </a>
                    @else
                        <span class="website-btn website-btn--ghost" style="font-size: 0.875rem; opacity: 0.5; cursor: not-allowed;">
                            Next Page &rarr;
                        </span>
                    @endif
                </nav>
            @endif
        @else
            <!-- Helpful Filter Empty State -->
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-surface); border: 1px dashed var(--color-border);">
                <div style="max-width: 520px; margin: 0 auto;">
                    <svg class="website-icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="margin-bottom: var(--space-2);">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <h3 class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        No Departures Found
                    </h3>
                    <p class="website-body website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-5);">
                        No sample departures in our catalog fixture match your selected filters. Try clearing one or more filters to view other scheduled group dates.
                    </p>
                    <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                        <a href="{{ route('website.departures.index') }}" class="website-btn website-btn--primary">
                            Reset All Filters
                        </a>
                        <a href="{{ route('website.planner.start') }}?mode=custom&source=departure" class="website-btn website-btn--outline">
                            Request Custom Dates
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <!-- 5. Private / Custom-Date Alternative -->
    <section aria-labelledby="heading-private-dates" style="margin-bottom: var(--space-10);">
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: var(--space-4);">
                <div style="max-width: 700px;">
                    <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Tailored Travel</span>
                    <h2 id="heading-private-dates" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        Prefer Private or Flexible Dates?
                    </h2>
                    <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                        If fixed group departure dates do not align with your travel schedule, every route in our catalog can be organized as a private, customized expedition for solo hikers, couples, families, or private teams.
                    </p>
                </div>

                <a href="{{ route('website.planner.start') }}?mode=custom&source=departure" class="website-btn website-btn--primary">
                    Plan Private Dates &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- 6. Planning CTA -->
    <section aria-labelledby="heading-plan-journey-cta" class="website-final-cta" style="border-radius: 0 !important;">
        <div class="website-final-cta__inner">
            <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-3); display: inline-block;">
                EXPEDITION PLANNING
            </span>
            <h2 id="heading-plan-journey-cta" class="website-final-cta__title" style="font-size: var(--type-h2);">
                Ready to Build Your Himalayan Itinerary?
            </h2>
            <p class="website-final-cta__subtitle">
                Use our guided trip planner to match itineraries with your party size, comfort level, and target travel months.
            </p>

            <div class="website-final-cta__actions">
                <a href="{{ route('website.planner.start') }}?mode=discover&source=departure"
                   class="website-btn website-btn--accent"
                   style="border-radius: 0 !important;">
                    Launch Interactive Planner
                </a>
                <a href="{{ route('website.treks.index') }}"
                   class="website-btn website-btn--outline"
                   style="color: #ffffff; border-color: rgba(255, 255, 255, 0.6); border-radius: 0 !important;">
                    Explore All 8 Treks
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
