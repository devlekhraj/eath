@props(['upcomingDepartures' => []])

<section id="section-05-departures" data-section="05-departures" class="website-section website-section--warm" aria-labelledby="upcoming-departures-heading">
    <div class="website-container">
        <!-- Section Header -->
        <div class="website-departures-header" style="margin-bottom: var(--space-6);">
            <span class="website-eyebrow" style="color: var(--color-primary); font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; background: transparent !important; border: none !important; padding: 0 !important; display: block; margin-bottom: var(--space-2);">
                SEPTEMBER DEPARTURES
            </span>
            <h2 id="upcoming-departures-heading" style="font-family: var(--font-display); font-size: var(--type-h2); font-weight: 700; color: var(--color-text); line-height: 1.2; margin: 0 0 var(--space-2);">
                Your Himalayan journey, starting this season
                <span class="sr-only" style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;">Upcoming Fixed Departures</span>
            </h2>
            <p style="font-size: var(--type-body); color: var(--color-text-secondary); margin: 0 0 var(--space-5); max-width: 680px;">
                Explore upcoming September sample departures.
            </p>

            <!-- Sub-header bar: [ SEPTEMBER 2026 ] on left, [ View all departures ] on right -->
            <div class="website-departures-bar" style="display: flex; align-items: center; justify-content: space-between; gap: var(--space-3); flex-wrap: wrap;">
                <span class="website-season-badge" style="display: inline-flex; align-items: center; gap: var(--space-2); background: var(--color-primary); color: #ffffff; padding: 8px 16px; font-size: var(--type-micro); font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; border-radius: 0 !important;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" style="flex-shrink: 0;">
                        <rect x="3" y="4" width="18" height="18" rx="0" ry="0"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    SEPTEMBER 2026
                </span>
                <a href="{{ route('website.departures.index') }}" class="website-btn website-btn--outline website-btn--compact" style="border-radius: 0 !important; font-weight: 600; padding: 8px 18px;">
                    View all departures &rarr;
                </a>
            </div>
        </div>

        @if(count($upcomingDepartures) > 0)
        <div class="website-timeline-departures" role="region" aria-label="Upcoming September departures timeline">
            @foreach($upcomingDepartures as $index => $dep)
            @php
            $trekInfo = \Website\Services\WebsiteCatalogRepository::findTrek($dep['trek_id']);
            $difficulty = $dep['sample_difficulty'] ?? ucfirst($trekInfo['difficulty'] ?? 'Moderate');
            $region = ucfirst($trekInfo['region_id'] ?? ($dep['region_id'] ?? 'Himalayas'));
            $duration = $dep['duration_days'] ?? ($trekInfo['duration_days'] ?? 15);
            $day = $dep['sample_day'] ?? date('d', strtotime($dep['start_date']));
            $month = $dep['sample_month'] ?? strtoupper(date('M', strtotime($dep['start_date'])));
            $year = $dep['sample_year'] ?? date('Y', strtotime($dep['start_date']));
            $trekName = $dep['trek_name'] ?? ($trekInfo['name'] ?? 'Himalayan Trek');
            $isBookable = $dep['is_bookable'] ?? ($dep['status'] !== 'full');
            $openSpaces = $dep['sample_open'] ?? ($dep['sample_seats'] ?? 8);
            $totalSpaces = $dep['sample_total'] ?? 12;
            $percent = round(($openSpaces / max(1, $totalSpaces)) * 100);
            $isLast = $loop->last;
            @endphp
            <div class="website-timeline-row {{ $isLast ? 'website-timeline-row--last' : '' }} {{ $index === 0 ? 'website-timeline-row--featured' : '' }}">
                <!-- Date Column: 18 SEP 2026 (1st column) -->
                <div class="website-timeline-date">
                    <span class="website-timeline-date__text">
                        {{ $day }} {{ $month }} {{ $year }}
                    </span>
                </div>



                <!-- Center Column: Title, Meta & Capacity -->
                <div class="website-timeline-details">
                    <h3 class="website-timeline-details__title">
                        <a href="{{ route('website.treks.show', ['slug' => $dep['trek_slug']]) }}">
                            {{ $trekName }}
                        </a>
                    </h3>
                    <div class="website-timeline-details__meta">
                        <span>{{ $duration }} days</span>
                        <span class="website-sep">·</span>
                        <span>{{ $region }}</span>
                        <span class="website-sep">·</span>
                        <span>{{ $difficulty }}</span>
                    </div>
                    <!-- Spaces open info below duration & difficulty -->
                    <div class="website-timeline-capacity-row">
                        <span class="website-timeline-spaces">
                            {{ $openSpaces }} / {{ $totalSpaces }} spaces open
                        </span>
                        <div class="website-timeline-bar-track" aria-label="{{ $openSpaces }} of {{ $totalSpaces }} spaces open">
                            <div class="website-timeline-bar-fill {{ !$isBookable ? 'website-timeline-bar-fill--accent' : '' }}" style="width: {{ $percent }}%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Stacked Actions -->
                <div class="website-timeline-actions-col">
                    <span style="display:block; margin-bottom:8px; color:var(--color-primary); font-family:var(--font-display); font-size:1.35rem; font-weight:700;">{{ \Website\Support\WebsiteMoneyFormatter::format($dep['price_minor'] ?? (($dep['price_usd'] ?? ($trekInfo['price_usd'] ?? 1850)) * 100)) }}</span>
                    <a href="{{ route('website.treks.show', ['slug' => $dep['trek_slug']]) }}" class="website-btn website-btn--outline website-btn--compact website-btn--block">
                        View Trek
                    </a>
                    @if($isBookable)
                    <button type="button"
                        class="website-btn website-btn--primary website-btn--compact website-btn--block"
                        data-open-modal="{{ route('website.departures.wizard', ['departure_id' => $dep['id']]) }}"
                        data-modal-size="modal-lg"
                        data-departure-id="{{ $dep['id'] }}"
                        data-trek-id="{{ $dep['trek_id'] }}"
                        data-trek-name="{{ $trekName }}"
                        data-trek-slug="{{ $dep['trek_slug'] ?? '' }}"
                        data-start-date="{{ $day }} {{ $month }} {{ $year }}"
                        data-duration="{{ $duration }} Days"
                        data-region="{{ $region }}"
                        data-difficulty="{{ $difficulty }}"
                        data-price="{{ $dep['price_usd'] ?? (isset($dep['price_minor']) ? round($dep['price_minor'] / 100) : ($trekInfo['price_usd'] ?? 1850)) }}"
                        data-open-spaces="{{ $openSpaces }}"
                        data-total-spaces="{{ $totalSpaces }}"
                        data-planner-url="{{ route('website.planner.start') }}?mode=selected&trek={{ $dep['trek_id'] }}&departure={{ $dep['id'] }}&source=home_departure">
                        Plan This Date
                    </button>
                    @else
                    <a href="{{ route('website.contact', ['subject' => 'Departure ' . $dep['id'] . ' Inquiry', 'trek' => $dep['trek_id']]) }}" class="website-btn website-btn--accent website-btn--compact website-btn--block">
                        Inquire Now
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3); margin-top: var(--space-5); font-size: var(--type-micro); color: var(--color-text-muted);">
            <span>Sample calendar fixtures for preview · No live availability, scarcity, or payment reservation</span>
            <div style="display: flex; gap: var(--space-4); align-items: center;">
                <a href="{{ route('website.planner.start', ['mode' => 'custom', 'source' => 'home_departures']) }}" class="website-link">
                    Prefer Private Dates? Build Custom Trip &rarr;
                </a>
                <a href="{{ route('website.departures.index') }}" class="website-link">
                    Explore All 24 Fixed Departures &rarr;
                </a>
            </div>
        </div>
    </div>

</section>
