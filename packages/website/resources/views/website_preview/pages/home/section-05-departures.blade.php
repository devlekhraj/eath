@props(['upcomingDepartures' => []])

<section id="section-05-departures" data-section="05-departures" class="website-section website-section--warm" aria-labelledby="upcoming-departures-heading">
    <div class="website-container">
        <!-- Departures Card Component matching Trek Dates UI -->
        <div class="website-trek-dates" role="region" aria-labelledby="upcoming-departures-heading">
            <header class="website-trek-dates__header">
                <span class="website-trek-dates__eyebrow">
                    <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                    SEPTEMBER DEPARTURES &middot; CONFIRMED GROUPS
                </span>
                <h2 id="upcoming-departures-heading">
                    Your Himalayan journey, starting this season
                    <span class="sr-only">Upcoming Fixed Departures</span>
                </h2>
                <p>Explore upcoming September sample departures.</p>
            </header>

            @php $featuredDepartureShown = false; @endphp
            @forelse($upcomingDepartures as $index => $dep)
                @php
                    $trekId = $dep['trek_id'] ?? ($dep['trek_slug'] ?? '');
                    $trekInfo = !empty($trekId) ? \Website\Services\WebsiteCatalogRepository::findTrek($trekId) : null;
                    $trekName = $dep['trek_name'] ?? ($trekInfo['name'] ?? 'Himalayan Trek');
                    $trekSlug = $dep['trek_slug'] ?? ($dep['trek_id'] ?? ($trekInfo['slug'] ?? ''));
                    $duration = $dep['duration_days'] ?? ($trekInfo['duration_days'] ?? 15);
                    $day = $dep['sample_day'] ?? (!empty($dep['start_date']) ? date('d', strtotime($dep['start_date'])) : '01');
                    $month = $dep['sample_month'] ?? (!empty($dep['start_date']) ? strtoupper(date('M', strtotime($dep['start_date']))) : 'SEP');
                    $year = $dep['sample_year'] ?? (!empty($dep['start_date']) ? date('Y', strtotime($dep['start_date'])) : '2026');
                    $isBookable = $dep['is_bookable'] ?? (($dep['status'] ?? 'open') !== 'full');
                    $openSpaces = max(0, (int) ($dep['sample_open'] ?? ($dep['sample_seats'] ?? 8)));
                    $totalSpaces = (int) ($dep['sample_total'] ?? 12);
                    $isBookable = $isBookable && $openSpaces > 0;
                    $featured = $isBookable && !$featuredDepartureShown;
                    if ($featured) $featuredDepartureShown = true;
                    $priceMinor = $dep['price_minor'] ?? (($dep['price_usd'] ?? ($trekInfo['price_usd'] ?? 1850)) * 100);
                    $difficulty = $dep['sample_difficulty'] ?? ucfirst($trekInfo['difficulty'] ?? 'Moderate');
                    $region = ucfirst($trekInfo['region_id'] ?? ($dep['region_id'] ?? 'Himalayas'));
                @endphp
                <article class="website-trek-dates__row {{ $featured ? 'website-trek-dates__row--next' : '' }}">
                    <time class="website-trek-dates__date" datetime="{{ $dep['start_date'] ?? '' }}">
                        <span class="website-trek-dates__day">{{ str_pad((int)$day, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="website-trek-dates__month">{{ $month }} {{ $year }}</span>
                    </time>
                    <div>
                        @if($featured)
                            <p class="website-trek-dates__label">
                                <i class="fa-solid fa-bolt" aria-hidden="true"></i> Next available departure
                            </p>
                        @endif
                        <h3 class="website-trek-dates__title">
                            <a href="{{ !empty($trekSlug) ? route('website.treks.show', ['slug' => $trekSlug]) : '#' }}">
                                {{ $trekName }}
                            </a>
                        </h3>
                        <p class="website-trek-dates__meta">{{ $duration }} days &middot; Standard lodge</p>
                        <span class="website-trek-dates__spaces {{ $isBookable && $openSpaces <= 3 ? 'website-trek-dates__spaces--limited' : '' }}">
                            {{ !$isBookable ? 'Fully booked' : ($openSpaces <= 3 ? 'Only ' . $openSpaces . ' of ' . $totalSpaces . ' spaces left' : $openSpaces . ' of ' . $totalSpaces . ' spaces available') }}
                        </span>
                    </div>
                    <div class="website-trek-dates__action">
                        <span class="website-trek-dates__price">{{ \Website\Support\WebsiteMoneyFormatter::format($priceMinor) }}</span>
                        <span class="website-trek-dates__note">Illustrative USD / person</span>
                        @php
                            $depId = $dep['id'] ?? ($dep['db_id'] ?? ($index + 1));
                        @endphp
                        @if($isBookable)
                            <button type="button"
                                class="website-btn {{ $featured ? 'website-btn--accent' : 'website-btn--outline' }} website-btn--compact website-btn--block"
                                data-open-modal="{{ route('website.departures.wizard', ['departure_id' => $depId]) }}"
                                data-modal-size="modal-lg"
                                data-departure-id="{{ $depId }}"
                                data-trek-id="{{ $trekId }}"
                                data-trek-name="{{ $trekName }}"
                                data-trek-slug="{{ $trekSlug }}"
                                data-start-date="{{ $day }} {{ $month }} {{ $year }}"
                                data-duration="{{ $duration }} Days"
                                data-region="{{ $region }}"
                                data-difficulty="{{ $difficulty }}"
                                data-price="{{ $dep['price_usd'] ?? (isset($dep['price_minor']) ? round($dep['price_minor'] / 100) : ($trekInfo['price_usd'] ?? 1850)) }}"
                                data-open-spaces="{{ $openSpaces }}"
                                data-total-spaces="{{ $totalSpaces }}"
                                data-planner-url="{{ route('website.planner.start') }}?mode=selected&trek={{ $trekId }}&departure={{ $depId }}&source=home_departure"
                                aria-haspopup="dialog"
                                aria-controls="website-global-modal"
                                aria-label="Select departure on {{ $day }} {{ $month }} {{ $year }} for {{ $trekName }}">
                                {{ $featured ? 'Join next departure' : 'Select departure' }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                            </button>
                        @else
                            <button type="button" class="website-btn website-btn--ghost website-btn--compact website-btn--block" disabled>Departure full</button>
                        @endif
                    </div>
                </article>
            @empty
                <div class="website-trek-dates__footer">No fixed departures are currently listed for September.</div>
            @endforelse

            <footer class="website-trek-dates__footer">
                <span>Sample dates &amp; availability for this website.</span>
                <a href="{{ route('website.departures.index') }}">Explore all departures &rarr;</a>
            </footer>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3); margin-top: var(--space-4); font-size: var(--type-micro); color: var(--color-text-muted);">
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
