@extends('website_preview.layout.master')

@section('title', $trek['name'] . ' — Himalayan Trekking Itinerary (Website)')
@section('meta_description', $trek['name'] . ' (' . $trek['duration_days'] . ' days, ' . $trek['difficulty'] . ') in the ' . $trek['region']['name'] . ' region. Sample Himalayan trekking itinerary with licensed local guides.')

@push('head')
@vite(['packages/website/resources/website/scss/website-icons.scss'])
<style>
    .website-trek-dates { border: 1px solid #e2e8f0; border-top: 4px solid #0284c7; background: #fff; border-radius: 0 !important; box-shadow: none; }
    .website-trek-dates__header { padding: clamp(20px, 4vw, 32px); background: #0c4a6e; color: #fff; }
    .website-trek-dates__eyebrow { display: flex; align-items: center; gap: 8px; margin-bottom: 12px; color: #2fb8ff; background: transparent !important; border: none !important; padding: 0 !important; font-size: .72rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; }
    .website-trek-dates__header h2 { margin: 0 0 10px; color: #fff; font-size: clamp(1.8rem, 3vw, 2.5rem); line-height: 1.15; }
    .website-trek-dates__header p { margin: 0; font-size: .9rem; line-height: 1.6; color: #f1f5f9; }
    .website-trek-dates__row { display: grid; grid-template-columns: 100px minmax(0, 1fr) 180px; gap: 24px; align-items: center; padding: 26px; border-bottom: 1px solid #e2e8f0; }
    .website-trek-dates__row--next { background: #f1f5f9; border-left: 4px solid #e11d48; padding-left: 22px; }
    .website-trek-dates__date { display: flex; flex-direction: column; color: #0284c7; }
    .website-trek-dates__day { font-family: var(--font-display); font-size: 3rem; font-weight: 700; line-height: 1; }
    .website-trek-dates__month { margin-top: 8px; font-size: .75rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; }
    .website-trek-dates__label { margin: 0 0 8px; color: #e11d48; background: transparent !important; border: none !important; padding: 0 !important; font-size: .7rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; }
    .website-trek-dates__title { margin: 0 0 8px; font-size: 1.15rem; font-weight: 600; color: #0f172a; }
    .website-trek-dates__meta { margin: 0 0 12px; color: #475569; font-size: .8rem; }
    .website-trek-dates__spaces { color: #0c4a6e; font-size: .8rem; font-weight: 600; }
    .website-trek-dates__spaces--limited { color: #e11d48; }
    .website-trek-dates__price { display: block; font-family: var(--font-display); font-size: 1.65rem; font-weight: 700; color: #0284c7; line-height: 1.2; }
    .website-trek-dates__action { text-align: right; }
    .website-trek-dates__note { display: block; margin: 4px 0 14px; font-size: .7rem; color: #64748b; }
    .website-trek-dates .website-btn { min-height: 44px; border-radius: 0 !important; box-shadow: none; }
    .website-trek-dates__footer { display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap; padding: 18px 26px; font-size: .8rem; color: #64748b; }
    .website-trek-dates__footer a { color: #0284c7; text-decoration: underline; font-weight: 600; }
    @media (max-width: 1100px) {
        .website-trek-dates__row { grid-template-columns: 80px minmax(0, 1fr); gap: 18px; }
        .website-trek-dates__action { grid-column: 2; text-align: left; }
    }
    @media (max-width: 480px) {
        .website-trek-dates__row { padding: 20px; gap: 16px; grid-template-columns: 64px minmax(0, 1fr); }
        .website-trek-dates__row--next { padding-left: 16px; }
        .website-trek-dates__action { grid-column: 1 / -1; }
        .website-trek-dates__day { font-size: 2.5rem; }
        .website-trek-dates__footer { padding: 20px; }
    }
</style>
@endpush


@php
$priceFormatted = \Website\Support\WebsiteMoneyFormatter::format($trek['price_minor']);
$heroImage = $trek['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("trek-{$trek['id']}", $trek['name']);

$trekTaglines = [
't-ebc' => 'Walk through Sherpa country to the foot of the world\'s highest mountain.',
't-abc' => 'Trek into the heart of the Annapurna Sanctuary surrounded by 8,000m giants.',
't-langtang' => 'Journey through sacred alpine valleys and Tamang heritage villages.',
't-mardi' => 'A pristine ridge trek with dramatic close-up views of Machapuchare.',
't-gokyo' => 'Ascend past cobalt turquoise glacial lakes to panoramic Gokyo Ri.',
't-manaslu' => 'An epic remote circuit around the world\'s eighth highest peak.',
't-khopra' => 'Panoramic ridge walking high above the Kali Gandaki gorge.',
't-mustang' => 'Explore the walled medieval kingdom of Lo Manthang in the high rain shadow.',
];
$tagline = $trekTaglines[$trek['id']] ?? ($trek['tagline'] ?? 'Experience authentic Himalayan trails with licensed local Sherpa guides.');

// Best season calculation
if (in_array(3, $trek['suitable_months'] ?? []) && in_array(4, $trek['suitable_months'] ?? [])) {
$bestSeason = 'March & April';
} elseif (in_array(10, $trek['suitable_months'] ?? []) && in_array(11, $trek['suitable_months'] ?? [])) {
$bestSeason = 'Oct & Nov';
} else {
$bestSeason = 'Spring & Autumn';
}

$hideTopBreadcrumbs = true;
@endphp

@section('content')
<!-- Section 02: Full-Width Hero Banner with Overlaid Breadcrumbs -->
<header class="website-trek-hero-fullscreen">
    <div class="website-trek-hero-fullscreen__media">
        <img src="{{ $heroImage['url'] }}"
            alt="{{ $heroImage['alt'] }}"
            width="{{ $heroImage['width'] }}"
            height="{{ $heroImage['height'] }}"
            loading="eager"
            fetchpriority="high"
            class="website-trek-hero-fullscreen__img">

        <div class="website-trek-hero-fullscreen__scrim"></div>

        <div class="website-container website-trek-hero-fullscreen__container">
            <!-- Overlaid Top Breadcrumbs -->
            @if(!empty($breadcrumbs))
            <nav aria-label="Breadcrumb" class="website-trek-hero-breadcrumbs">
                <ol itemscope itemtype="https://schema.org/BreadcrumbList">
                    @foreach($breadcrumbs as $index => $crumb)
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        @if(!empty($crumb['url']) && !$loop->last)
                        <a itemprop="item" href="{{ $crumb['url'] }}">
                            <span itemprop="name">{{ $crumb['label'] }}</span>
                        </a>
                        <span class="website-trek-hero-breadcrumbs__sep" aria-hidden="true">&rsaquo;</span>
                        @else
                        <span itemprop="name" aria-current="page">{{ $crumb['label'] }}</span>
                        @endif
                        <meta itemprop="position" content="{{ $index + 1 }}">
                    </li>
                    @endforeach
                </ol>
            </nav>
            @endif

            <div class="website-trek-hero-fullscreen__content">
                <!-- Main Title -->
                <h1 class="website-h1 website-trek-hero-fullscreen__title">
                    {{ $trek['name'] }}
                </h1>

                <!-- Subtitle / Tagline quote -->
                <!-- <p class="website-trek-hero-fullscreen__tagline">
                    &ldquo;{{ $tagline }}&rdquo;
                </p> -->

                <!-- 4 Quick Stat Cards -->
                <div class="website-trek-hero-fullscreen__stats-row">
                    <div class="website-trek-hero-stat-card">
                        <span class="website-trek-hero-stat-card__label">Duration</span>
                        <strong class="website-trek-hero-stat-card__value">{{ $trek['duration_days'] }} Days</strong>
                    </div>
                    <div class="website-trek-hero-stat-card">
                        <span class="website-trek-hero-stat-card__label">Max Altitude</span>
                        <strong class="website-trek-hero-stat-card__value website-trek-hero-stat-card__value--altitude">
                            {{ $trek['max_altitude_m'] ? number_format($trek['max_altitude_m']) . ' m' : '5,545 m' }}
                        </strong>
                    </div>
                    <div class="website-trek-hero-stat-card">
                        <span class="website-trek-hero-stat-card__label">Starting Price</span>
                        <strong class="website-trek-hero-stat-card__value">
                            ${{ number_format($trek['price_usd'] ?? round($trek['price_minor'] / 100)) }} USD
                        </strong>
                    </div>
                    <div class="website-trek-hero-stat-card">
                        <span class="website-trek-hero-stat-card__label">Best Season</span>
                        <strong class="website-trek-hero-stat-card__value website-trek-hero-stat-card__value--season">
                            {{ $bestSeason }}
                        </strong>
                    </div>
                </div>

                <!-- Action CTAs Row -->
                <div class="website-trek-hero-fullscreen__actions-row">
                    <a href="#dates" class="website-btn website-btn--primary">
                        <i class="fa-regular fa-calendar-check" aria-hidden="true"></i>
                        <span>Check Guaranteed Dates</span>
                    </a>
                    <button type="button" class="website-btn website-btn--outline website-save-trek-btn" id="website-save-trek-btn" data-trek-id="{{ $trek['id'] }}">
                        <i class="fa-regular fa-bookmark" aria-hidden="true"></i>
                        <span>Save Trek</span>
                    </button>
                    <a href="{{ route('website.compare', ['treks' => [$trek['id']]]) }}"
                        role="button"
                        class="website-btn website-btn--outline website-compare-btn"
                        data-trek-id="{{ $trek['id'] }}"
                        aria-pressed="false"
                        aria-label="Add {{ $trek['name'] }} to comparison">
                        <i class="fa-solid fa-code-compare" aria-hidden="true"></i>
                        <span>Compare Trek</span>
                    </a>
                    <a href="{{ route('website.contact', ['trek' => $trek['id'], 'subject' => 'Inquiry for ' . $trek['name']]) }}"
                        class="website-btn website-btn--outline">
                        <i class="fa-regular fa-comment-dots" aria-hidden="true"></i>
                        <span>Ask an Expert</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Section 04: Fullscreen Sticky Section Anchor Navigation -->
<nav class="website-detail-nav" aria-label="Trek detail section navigation">
    <div class="website-detail-nav__inner">
        <a href="#dates" class="website-detail-nav__link is-active">
            <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
            <span>Upcoming Departures</span>
        </a>
        <a href="#overview" class="website-detail-nav__link">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            <span>Overview</span>
        </a>
        <a href="#highlights" class="website-detail-nav__link">
            <i class="fa-solid fa-star" aria-hidden="true"></i>
            <span>Highlights</span>
        </a>
        <a href="#itinerary" class="website-detail-nav__link">
            <i class="fa-solid fa-route" aria-hidden="true"></i>
            <span>Itinerary ({{ $trek['duration_days'] }} Days)</span>
        </a>
        <a href="#map" class="website-detail-nav__link">
            <i class="fa-solid fa-map-location-dot" aria-hidden="true"></i>
            <span>Route Map</span>
        </a>
        <a href="#inclusions" class="website-detail-nav__link">
            <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
            <span>Inclusions</span>
        </a>
        <a href="#accommodation" class="website-detail-nav__link">
            <i class="fa-solid fa-bed" aria-hidden="true"></i>
            <span>Lodging &amp; Meals</span>
        </a>
        <a href="#preparation" class="website-detail-nav__link">
            <i class="fa-solid fa-person-hiking" aria-hidden="true"></i>
            <span>Preparation</span>
        </a>
        <a href="#safety" class="website-detail-nav__link">
            <i class="fa-solid fa-shield-heart" aria-hidden="true"></i>
            <span>Safety &amp; Support</span>
        </a>
        <a href="#gallery" class="website-detail-nav__link">
            <i class="fa-solid fa-images" aria-hidden="true"></i>
            <span>Gallery</span>
        </a>
        @if(count($stories) > 0)
        <a href="#stories" class="website-detail-nav__link">
            <i class="fa-solid fa-book-open" aria-hidden="true"></i>
            <span>Traveler Stories</span>
        </a>
        @endif
        <a href="#faqs" class="website-detail-nav__link">
            <i class="fa-solid fa-circle-question" aria-hidden="true"></i>
            <span>FAQs</span>
        </a>
        <a href="#related" class="website-detail-nav__link">
            <i class="fa-solid fa-compass" aria-hidden="true"></i>
            <span>Related Routes</span>
        </a>
    </div>
</nav>

<div class="website-container website-section--compact">
    @php
        $nextDeparture = $departures[0] ?? null;
        $nextDateFormatted = $nextDeparture ? date('d M Y', strtotime($nextDeparture['start_date'])) : null;
    @endphp

    <!-- Desktop 2fr : 1fr Main Content & Sticky Conversion Sidebar Layout -->
    <div class="website-detail-layout">
        <!-- Main Editorial Column (Left 2fr) -->
        <div class="website-detail-main">
            <!-- Section 05: Upcoming Fixed Departure Dates & Pricing -->
            <section id="dates" class="website-anchor-section website-trek-dates" aria-labelledby="trek-dates-title">
                <header class="website-trek-dates__header">
                    <span class="website-trek-dates__eyebrow"><i class="fa-solid fa-calendar-days" aria-hidden="true"></i> Sample Fixed Departures &middot; Confirmed Groups</span>
                    <h2 id="trek-dates-title">Your next adventure starts here.</h2>
                    <p>Choose your date for {{ $trek['name'] }}. Compare available spaces and sample trip prices below.</p>
                </header>
                @php $featuredDepartureShown = false; @endphp
                @forelse($departures as $departure)
                    @php
                        $bookable = $departure['is_bookable'] ?? ($departure['status'] !== 'full');
                        $spaces = max(0, (int) ($departure['sample_seats'] ?? 8));
                        $bookable = $bookable && $spaces > 0;
                        $featured = $bookable && !$featuredDepartureShown;
                        if ($featured) $featuredDepartureShown = true;
                    @endphp
                    <article class="website-trek-dates__row {{ $featured ? 'website-trek-dates__row--next' : '' }}">
                        <time class="website-trek-dates__date" datetime="{{ $departure['start_date'] }}">
                            <span class="website-trek-dates__day">{{ date('d', strtotime($departure['start_date'])) }}</span>
                            <span class="website-trek-dates__month">{{ date('M Y', strtotime($departure['start_date'])) }}</span>
                        </time>
                        <div>
                            @if($featured)
                                <p class="website-trek-dates__label"><i class="fa-solid fa-bolt" aria-hidden="true"></i> Next available departure</p>
                            @endif
                            <h3 class="website-trek-dates__title">{{ $departure['trek_name'] }}</h3>
                            <p class="website-trek-dates__meta">{{ $departure['duration_days'] }} days &middot; Standard lodge</p>
                            <span class="website-trek-dates__spaces {{ $bookable && $spaces <= 3 ? 'website-trek-dates__spaces--limited' : '' }}">
                                {{ !$bookable ? 'Fully booked' : ($spaces <= 3 ? 'Only ' . $spaces . ' of 12 spaces left' : $spaces . ' of 12 spaces available') }}
                            </span>
                        </div>
                        <div class="website-trek-dates__action">
                            <span class="website-trek-dates__price">{{ \Website\Support\WebsiteMoneyFormatter::format($departure['price_minor']) }}</span>
                            <span class="website-trek-dates__note">Illustrative USD / person</span>
                            @if($bookable)
                                <a href="{{ route('website.planner.start', ['mode' => 'selected', 'trek' => $departure['trek_id'], 'departure' => $departure['id']]) }}" class="website-btn {{ $featured ? 'website-btn--accent' : 'website-btn--outline' }} website-btn--compact website-btn--block" data-open-modal="{{ route('website.departures.modal', ['departure_id' => $departure['id']]) }}" aria-haspopup="dialog" aria-controls="website-global-modal" aria-label="Select departure on {{ date('d M Y', strtotime($departure['start_date'])) }}">
                                    {{ $featured ? 'Join next departure' : 'Select departure' }} <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            @else
                                <button type="button" class="website-btn website-btn--ghost website-btn--compact website-btn--block" disabled>Departure full</button>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="website-trek-dates__footer">No fixed departures are currently listed for this trek.</div>
                @endforelse
                <footer class="website-trek-dates__footer">
                    <span>Sample dates &amp; availability for this website.</span>
                    <a href="{{ route('website.departures.index') }}">Explore all departures &rarr;</a>
                </footer>
            </section>

            <!-- Section 06: Overview -->
            <section id="overview" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Trek Overview</h2>
                <div class="website-body website-text-secondary" style="margin-bottom: var(--space-4);">
                    <p style="margin-bottom: var(--space-4); line-height: 1.7;">
                        {{ $trek['summary'] }}
                    </p>
                    <p style="margin-bottom: var(--space-4); line-height: 1.7;">
                        {{ $trek['overview_secondary'] }}
                    </p>
                </div>

                <div style="padding: var(--space-4); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important;">
                    <p class="website-micro website-text-muted" style="margin: 0;">
                        <strong>Illustrative Itinerary Notice:</strong> This fixture record illustrates trail sequencing, walking pace, and elevation thresholds. Operational daily routes are subject to real-time weather and acclimatization assessments.
                    </p>
                </div>
            </section>

            <!-- Section 06: Highlights -->
            <section id="highlights" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Trip Highlights</h2>
                <div style="display: grid; grid-template-columns: 1fr; gap: var(--space-4);">
                    @foreach($trek['highlights'] as $index => $highlight)
                    <div style="display: flex; align-items: flex-start; gap: var(--space-4); padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important;">
                        <span style="display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: 0 !important; background: var(--color-primary-soft); color: var(--color-primary); font-weight: 600; font-size: var(--type-small); flex-shrink: 0;">
                            {{ $index + 1 }}
                        </span>
                        <span class="website-body" style="color: var(--color-text); font-weight: 500;">
                            {{ $highlight }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Section 07: Day-by-Day Itinerary (Trip Highlights Card Style, Multi-Expandable) -->
            <section id="itinerary" class="website-anchor-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-3);">
                    <h2 class="website-anchor-section__title" style="margin-bottom: 0;">
                        Day-by-Day Itinerary ({{ count($trek['itinerary']) }} Days)
                    </h2>
                    <div style="display: flex; align-items: center; gap: var(--space-3);">
                        <span class="website-small website-text-muted">
                            All days included in initial HTML
                        </span>
                        <button type="button" class="website-btn website-btn--ghost website-btn--compact" id="itinerary-toggle-all" style="border-radius: 0 !important; font-size: var(--type-micro); font-weight: 600; padding: 4px 10px;">
                            <i class="fa-solid fa-layer-group me-1" aria-hidden="true"></i>
                            <span id="itinerary-toggle-text">Expand All</span>
                        </button>
                    </div>
                </div>

                <!-- Interactive Elevation & Acclimatization Profile Chart -->
                @include('website_preview.components.elevation-profile-chart', [
                'itinerary' => $trek['itinerary'],
                'maxAltitude' => $trek['max_altitude_m'] ?? 5545
                ])

                <div style="display: flex; flex-direction: column; gap: var(--space-3);">
                    @foreach($trek['itinerary'] as $day)
                    <details class="website-itinerary-card" id="itinerary-day-{{ $day['day'] }}">
                        <summary class="website-itinerary-card__summary">
                            <div class="website-itinerary-card__header">
                                <!-- <span class="website-itinerary-card__badge {{ !empty($day['is_acclimatization']) ? 'website-itinerary-card__badge--acclimatization' : '' }}" title="Day {{ $day['day'] }}">
                                        <span aria-hidden="true">D{{ $day['day'] }}</span>
                                        <span class="visually-hidden">Day {{ $day['day'] }}</span>
                                    </span> -->
                                <div class="website-itinerary-card__title-group">
                                    <h3 class="website-itinerary-card__title">
                                        {{ $day['title'] }}
                                    </h3>
                                    @if(!empty($day['route']) || !empty($day['altitude_label']) || !empty($day['walking_hours_label']))
                                    <div class="website-itinerary-card__subtitle">
                                        @if(!empty($day['route']))
                                        <span class="website-itinerary-card__route">{{ $day['route'] }}</span>
                                        @endif
                                        @if(!empty($day['altitude_label']))
                                        <span class="website-itinerary-card__sep" aria-hidden="true">&bull;</span>
                                        <span class="website-itinerary-card__alt">{{ $day['altitude_label'] }}</span>
                                        @endif
                                        @if(!empty($day['walking_hours_label']))
                                        <span class="website-itinerary-card__sep" aria-hidden="true">&bull;</span>
                                        <span class="website-itinerary-card__hours">{{ $day['walking_hours_label'] }}</span>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if(!empty($day['is_acclimatization']))
                            <span class="website-badge website-badge--acclimatization">
                                Acclimatization Rest Day
                            </span>
                            @endif
                            <i class="fa-solid fa-chevron-down website-itinerary-card__chevron" aria-hidden="true"></i>
                        </summary>
                        <div class="website-itinerary-card__body">
                            <p class="website-itinerary-card__desc">
                                {{ $day['description'] }}
                            </p>
                            <div class="website-itinerary-card__meta">
                                <div class="website-itinerary-card__meta-item website-itinerary-meta-pill">
                                    <span class="website-itinerary-card__meta-key">
                                        <i class="fa-solid fa-person-walking" aria-hidden="true"></i>
                                        <strong>Walking:</strong>
                                    </span>
                                    <span class="website-itinerary-card__meta-val">~{{ $day['walking_hours'] }} hours</span>
                                </div>
                                <div class="website-itinerary-card__meta-item website-itinerary-meta-pill">
                                    <span class="website-itinerary-card__meta-key">
                                        <i class="fa-solid fa-house" aria-hidden="true"></i>
                                        <strong>Lodging:</strong>
                                    </span>
                                    <span class="website-itinerary-card__meta-val">{{ $day['accommodation_label'] }}</span>
                                </div>
                                <div class="website-itinerary-card__meta-item website-itinerary-meta-pill">
                                    <span class="website-itinerary-card__meta-key">
                                        <i class="fa-solid fa-utensils" aria-hidden="true"></i>
                                        <strong>Meals:</strong>
                                    </span>
                                    <span class="website-itinerary-card__meta-val">{{ $day['meal_note'] }}</span>
                                </div>
                            </div>
                        </div>
                    </details>
                    @endforeach
                </div>
            </section>

            <!-- Section 08: Route Map -->
            <section id="map" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Route Map</h2>
                <div class="website-route-map-card">
                    <div class="website-route-map-image-wrap">
                        <img src="{{ asset('images/website-route-map.webp') }}"
                            alt="Topographic Trail Map for {{ $trek['name'] }}"
                            class="website-route-map-img"
                            loading="lazy"
                            decoding="async">
                        <div class="website-route-map-overlay-tag">
                            <i class="fa-solid fa-mountain" aria-hidden="true"></i>
                            <span>Topographic Trail Map · GPS Simulation</span>
                        </div>
                    </div>
                    <div class="website-route-map-footer">
                        <div class="website-route-map-footer__icon">
                            <i class="fa-solid fa-map-location-dot" aria-hidden="true"></i>
                        </div>
                        <div class="website-route-map-footer__content">
                            <h3 class="website-route-map-footer__title">
                                Topographic Trail Map
                            </h3>
                            <p class="website-route-map-footer__desc">
                                {{ $trek['route_map_note'] }} Real departures receive physical topographic trail sheets, daily GPS checkpoints, and evening route briefings with your mountain leader.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 09: Inclusions & Exclusions -->
            <section id="inclusions" class="website-anchor-section">
                <h2 class="website-anchor-section__title">What's Included &amp; Excluded</h2>
                <div class="website-includes-excludes">
                    <!-- Inclusions -->
                    <div class="website-includes-excludes__col">
                        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2);">
                            <span style="color: var(--color-primary); font-weight: 700; font-size: 1.2rem;">&#10003;</span>
                            <h3 class="website-card-title" style="margin: 0;">Sample Ground Inclusions</h3>
                        </div>
                        <ul class="website-includes-excludes__list">
                            @foreach($trek['inclusions'] as $inc)
                            <li>
                                <span style="color: var(--color-primary); font-weight: 700;">&#10003;</span>
                                <span>{{ $inc }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Exclusions -->
                    <div class="website-includes-excludes__col">
                        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2);">
                            <span style="color: var(--color-error); font-weight: 700; font-size: 1.2rem;">&#10005;</span>
                            <h3 class="website-card-title" style="margin: 0;">Standard Exclusions</h3>
                        </div>
                        <ul class="website-includes-excludes__list">
                            @foreach($trek['exclusions'] as $exc)
                            <li>
                                <span style="color: var(--color-error); font-weight: 700;">&#10005;</span>
                                <span>{{ $exc }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div style="margin-top: var(--space-4); text-align: center;">
                    <span class="website-micro website-text-muted">
                        Non-contractual sample specifications · Final equipment and logistics scope agreed upon trip confirmation
                    </span>
                </div>
            </section>

            <!-- Section 11: Accommodation & Meals -->
            <section id="accommodation" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Tea House Lodging &amp; Meals</h2>
                <div class="website-card" style="margin-bottom: var(--space-4);">
                    <p class="website-body website-text-secondary" style="margin-bottom: var(--space-3); line-height: 1.6;">
                        {{ $trek['accommodation_note'] }}
                    </p>
                    <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                        Himalayan tea houses offer simple, twin-share bedrooms with foam mattresses, clean sheets, and communal dining areas warmed by wood or yak-dung stoves. Hearty freshly cooked meals feature traditional Sherpa and Nepalese cuisine (dal bhat, momos, porridge, noodle soup) designed to fuel strenuous trail days.
                    </p>
                </div>
            </section>

            <!-- Section 12: Difficulty, Altitude & Preparation -->
            <section id="preparation" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Physical Demands &amp; Altitude Pacing</h2>
                <div class="website-card" style="margin-bottom: var(--space-4);">
                    <div style="display: flex; align-items: center; gap: var(--space-3); margin-bottom: var(--space-3);">
                        <span class="website-badge website-badge--warm" style="text-transform: uppercase;">
                            Grade: {{ $trek['difficulty'] }}
                        </span>
                        <span class="website-small website-text-muted">
                            Max altitude: {{ $trek['max_altitude_m'] ? $trek['max_altitude_m'] . 'm' : 'Not provided' }}
                        </span>
                    </div>

                    <p class="website-body website-text-secondary" style="margin-bottom: var(--space-4); line-height: 1.6;">
                        This route involves regular ascents over uneven mountain paths, suspension bridges, and stone staircases. Acclimatization days are built into the schedule to minimize acute mountain sickness (AMS) risks. Cardiovascular conditioning and endurance training before travel are strongly recommended.
                    </p>

                    <div style="display: flex; flex-wrap: wrap; gap: var(--space-3);">
                        <a href="{{ route('website.articles.index') }}" class="website-btn website-btn--outline website-btn--compact">
                            Read Packing &amp; Prep Articles &rarr;
                        </a>
                        <a href="{{ route('website.safety') }}" class="website-btn website-btn--ghost website-btn--compact">
                            Altitude Safety Pacing Guidelines &rarr;
                        </a>
                    </div>
                </div>
            </section>

            <!-- Section 13: Permits, Transport & Logistics -->
            <section id="logistics" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Permits, Transport &amp; Logistics</h2>
                <div class="website-card">
                    <p class="website-body website-text-secondary" style="margin-bottom: var(--space-3); line-height: 1.6;">
                        {{ $trek['logistics_safety_note'] }}
                    </p>
                    <ul class="website-small website-text-secondary" style="padding-left: var(--space-5); margin: 0; line-height: 1.6;">
                        <li>Mandatory Trekker Information Management System (TIMS) cards and national park entry permits handled by our operations team.</li>
                        <li>Internal mountain flights (e.g. Lukla, Pokhara, Jomsom) require flexible contingency buffers due to weather conditions.</li>
                        <li>Porter welfare adheres strictly to International Porter Protection Group (IPPG) maximum 20kg weight guidelines.</li>
                    </ul>
                </div>
            </section>

            <!-- Section 14: Safety & Support -->
            <section id="safety" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Safety Protocols &amp; Field Support</h2>
                <div class="website-grid-2" style="margin-bottom: var(--space-4);">
                    <div class="website-card">
                        <h3 class="website-card-title" style="margin-bottom: var(--space-2);">Certified Leadership</h3>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                            All lead guides hold government licensing, Wilderness First Responder certification, and high-altitude navigation credentials.
                        </p>
                    </div>
                    <div class="website-card">
                        <h3 class="website-card-title" style="margin-bottom: var(--space-2);">Health Monitoring</h3>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                            Pulse oximeter readings taken every morning and evening. Strict descent protocols enforced if severe altitude symptoms emerge.
                        </p>
                    </div>
                </div>
                <a href="{{ route('website.safety') }}" class="website-link website-small">
                    Inspect complete safety, altitude &amp; evacuation protocols &rarr;
                </a>
            </section>

            <!-- Section 15: Photo Gallery (4 resolved images, lazy loaded) -->
            <section id="gallery" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Trek Photo Gallery</h2>
                <div class="website-gallery-grid">
                    @foreach($trek['gallery'] as $photo)
                    <div class="website-gallery-grid__item">
                        <img src="{{ $photo['url'] }}"
                            alt="{{ $photo['alt'] }}"
                            width="{{ $photo['width'] }}"
                            height="{{ $photo['height'] }}"
                            loading="lazy">
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Section 16: Traveler Stories (Associated or compact browse link) -->
            <section id="stories" class="website-anchor-section">
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-2);">
                    <h2 class="website-anchor-section__title" style="margin-bottom: 0;">
                        Field Notes &amp; Traveler Reflection
                    </h2>
                    <a href="{{ route('website.stories.index') }}" class="website-link website-small">
                        All Stories &rarr;
                    </a>
                </div>
                @if(count($stories) > 0)
                <div class="website-grid-2">
                    @foreach($stories as $story)
                    @include('website_preview.components.story-card', ['story' => $story])
                    @endforeach
                </div>
                @else
                <div style="padding: var(--space-4) var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: var(--space-3);">
                    <span class="website-small website-text-secondary">
                        No field notes yet published for this specific route. Explore fictional traveler reflections from other Himalayan trails.
                    </span>
                    <a href="{{ route('website.stories.index') }}" class="website-btn website-btn--outline website-btn--compact">
                        Browse Sample Stories &rarr;
                    </a>
                </div>
                @endif
            </section>

            <!-- Section 17: FAQs (Resolved fixture answers, no raw braces) -->
            <section id="faqs" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Frequently Asked Questions</h2>
                <div class="website-faq-list" role="region" aria-label="Frequently Asked Questions">
                    @foreach($faqs as $index => $faq)
                    <details class="website-faq-item" {{ $index === 0 ? 'open' : '' }}>
                        <summary class="website-faq-summary">
                            <div class="website-faq-summary-left">
                                <span class="website-faq-badge">Q{{ $index + 1 }}</span>
                                <span class="website-faq-question">
                                    {{ $faq['question'] }}
                                </span>
                            </div>
                            <span class="website-faq-toggle" aria-hidden="true">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </summary>
                        <div class="website-faq-body">
                            <div class="website-faq-body__content">
                                <p>
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        </div>
                    </details>
                    @endforeach
                </div>
            </section>

            <!-- Section 18: Related Treks (Max 3 derived records) -->
            @if(count($relatedTreks) > 0)
            <section id="related" class="website-anchor-section">
                <h2 class="website-anchor-section__title">Similar Himalayan Treks</h2>
                <div class="website-similar-grid">
                    @foreach($relatedTreks as $relTrek)
                    @php
                    $relImage = $relTrek['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("trek-{$relTrek['id']}", $relTrek['name']);
                    $relPriceFormatted = \Website\Support\WebsiteMoneyFormatter::format($relTrek['price_minor']);
                    @endphp
                    <article class="website-similar-card">
                        <div class="website-similar-card__img-wrap">
                            <img src="{{ $relImage['url'] }}"
                                alt="{{ $relImage['alt'] }}"
                                width="{{ $relImage['width'] }}"
                                height="{{ $relImage['height'] }}"
                                class="website-similar-card__img"
                                loading="lazy">
                        </div>
                        <div class="website-similar-card__body">
                            <h3 class="website-similar-card__title">
                                <a href="{{ route('website.treks.show', $relTrek['slug']) }}">
                                    {{ $relTrek['name'] }}
                                </a>
                            </h3>
                            <div class="website-similar-card__footer">
                                <div class="website-similar-card__price">
                                    Start from <strong>{{ $relPriceFormatted }}</strong> USD
                                </div>
                                <a href="{{ route('website.treks.show', $relTrek['slug']) }}" class="website-btn website-btn--primary website-btn--compact">
                                    View Trek
                                </a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Section 19: Final CTA -->
            <section class="website-final-cta" style="margin-top: var(--space-8);">
                <div class="website-final-cta__inner">
                    <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-3);">
                        SAMPLE PLANNING SIMULATION
                    </span>
                    <h2 class="website-final-cta__title" style="font-size: var(--type-h2);">
                        Ready to plan your {{ $trek['name'] }} expedition?
                    </h2>
                    <p class="website-final-cta__subtitle">
                        Build an unhurried, custom-paced itinerary draft with our licensed mountain team.
                    </p>
                    <div class="website-final-cta__actions">
                        <a href="{{ route('website.planner.start', ['mode' => 'selected', 'trek' => $trek['id'], 'source' => 'detail']) }}"
                            class="website-btn website-btn--accent">
                            Plan This Trek
                        </a>
                        <a href="{{ route('website.planner.form', ['mode' => 'custom', 'trek' => $trek['id'], 'source' => 'detail']) }}"
                            class="website-btn website-btn--outline"
                            data-open-panel
                            data-panel-title="Customize your route"
                            data-panel-size="650px"
                            style="color: #ffffff; border-color: rgba(255, 255, 255, 0.5);">
                            Customize Route
                        </a>
                        <a href="{{ route('website.contact') }}"
                            class="website-btn website-btn--ghost"
                            style="color: #ffffff;">
                            Ask a Question
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- Sticky Conversion Sidebar (Right 1fr ~340px) -->
        <aside class="website-detail-sidebar" aria-label="Trek planning and booking options">
            <div style="border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-4); margin-bottom: var(--space-4);">
                <span class="website-micro website-text-muted" style="text-transform: uppercase; letter-spacing: 0.05em;">
                    Illustrative Package Rate
                </span>
                <div style="display: flex; align-items: baseline; gap: var(--space-2); margin-top: var(--space-1);">
                    <span class="website-h2" style="color: var(--color-primary); font-weight: 700;">
                        {{ $priceFormatted }}
                    </span>
                    <span class="website-small website-text-muted">USD</span>
                </div>
                <span class="website-micro website-text-secondary">
                    Per-person ground package · Standard tea house basis
                </span>
            </div>

            <!-- Route Quick Snapshot -->
            <div style="display: flex; flex-direction: column; gap: var(--space-2); margin-bottom: var(--space-6); font-size: var(--type-small);">
                <div style="display: flex; justify-content: space-between;">
                    <span class="website-text-muted">Duration</span>
                    <strong>{{ $trek['duration_days'] }} Days</strong>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span class="website-text-muted">Max Elevation</span>
                    <strong>{{ $trek['max_altitude_m'] ? number_format($trek['max_altitude_m']) . 'm' : 'Not provided' }}</strong>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span class="website-text-muted">Difficulty</span>
                    <strong style="text-transform: capitalize;">{{ $trek['difficulty'] }}</strong>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span class="website-text-muted">Region</span>
                    <strong>{{ $trek['region']['name'] }}</strong>
                </div>
                @if($nextDeparture)
                <div style="display: flex; justify-content: space-between;">
                    <span class="website-text-muted">Next Departure</span>
                    <strong><a href="#dates" style="color: var(--color-primary); text-decoration: underline;">{{ $nextDateFormatted }}</a></strong>
                </div>
                @endif
            </div>

            <!-- Conversion Action Buttons -->
            <div style="display: flex; flex-direction: column; gap: var(--space-3);">
                <a href="{{ route('website.planner.start', ['mode' => 'selected', 'trek' => $trek['id'], 'source' => 'detail']) }}"
                    class="website-btn website-btn--accent"
                    style="width: 100%; justify-content: center;">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                    <span>Plan This Trek</span>
                </a>

                <a href="{{ route('website.planner.form', ['mode' => 'custom', 'trek' => $trek['id'], 'source' => 'detail']) }}"
                    class="website-btn website-btn--outline"
                    data-open-panel
                    data-panel-size="450px"
                    style="width: 100%; justify-content: center;">
                    Customize This Trek
                </a>

                <a href="{{ route('website.compare', ['treks' => [$trek['id']]]) }}"
                    role="button"
                    class="website-btn website-btn--outline website-compare-btn"
                    data-trek-id="{{ $trek['id'] }}"
                    style="width: 100%; justify-content: center;"
                    aria-pressed="false"
                    aria-label="Add {{ $trek['name'] }} to comparison">
                    <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="18"></rect>
                        <rect x="14" y="3" width="7" height="18"></rect>
                    </svg>
                    <span>Add to Compare</span>
                </a>

                <a href="{{ route('website.contact') }}"
                    class="website-btn website-btn--text"
                    style="width: 100%; justify-content: center; font-size: var(--type-small);">
                    Ask About This Trek &rarr;
                </a>
            </div>

            <!-- Website Simulation Disclosure -->
            <div style="margin-top: var(--space-5); padding-top: var(--space-4); border-top: 1px solid var(--color-border); text-align: center;">
                <span class="website-micro website-text-muted">
                    No payment gateway integrated · Non-binding preview planning flow
                </span>
            </div>
        </aside>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Itinerary expand/collapse all
        const toggleBtn = document.getElementById('itinerary-toggle-all');
        const toggleText = document.getElementById('itinerary-toggle-text');
        if (toggleBtn && toggleText) {
            toggleBtn.addEventListener('click', function() {
                const cards = document.querySelectorAll('#itinerary details.website-itinerary-card');
                const allOpen = Array.from(cards).every(c => c.open);
                cards.forEach(c => c.open = !allOpen);
                toggleText.textContent = allOpen ? 'Expand All' : 'Collapse All';
            });
        }

        // Sticky detail nav active scrollspy
        const nav = document.querySelector('.website-detail-nav');
        const navInner = document.querySelector('.website-detail-nav__inner');
        const navLinks = Array.from(document.querySelectorAll('.website-detail-nav__link'));
        const targetIds = navLinks.map(l => l.getAttribute('href').replace('#', ''));
        const sections = targetIds.map(id => document.getElementById(id)).filter(Boolean);

        if (navLinks.length > 0 && sections.length > 0) {
            let activeId = 'overview';

            function setActiveTab(targetId) {
                if (activeId === targetId) return;
                activeId = targetId;

                navLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (href === '#' + targetId) {
                        link.classList.add('is-active');
                        // Auto-scroll active tab into view horizontally if overflowing
                        if (navInner) {
                            const linkLeft = link.offsetLeft;
                            const linkWidth = link.offsetWidth;
                            const navScrollLeft = navInner.scrollLeft;
                            const navWidth = navInner.offsetWidth;
                            if (linkLeft < navScrollLeft || (linkLeft + linkWidth) > (navScrollLeft + navWidth)) {
                                navInner.scrollTo({
                                    left: linkLeft - (navWidth / 2) + (linkWidth / 2),
                                    behavior: 'smooth'
                                });
                            }
                        }
                    } else {
                        link.classList.remove('is-active');
                    }
                });
            }

            function updateScrollspy() {
                const scrollPos = window.scrollY;
                const windowHeight = window.innerHeight;
                const docHeight = document.documentElement.scrollHeight;

                // If scrolled to the very bottom of the page, activate the last section
                if (windowHeight + scrollPos >= docHeight - 50) {
                    setActiveTab(sections[sections.length - 1].id);
                    return;
                }

                // Threshold: bottom edge of the sticky nav bar + tolerance for scroll-margin
                const navBottom = nav ? nav.getBoundingClientRect().bottom : 142;
                const threshold = navBottom + 30;

                // Find the latest section whose top has reached or passed the threshold
                let currentSectionId = sections[0].id;
                for (let i = 0; i < sections.length; i++) {
                    const rect = sections[i].getBoundingClientRect();
                    if (rect.top <= threshold) {
                        currentSectionId = sections[i].id;
                    }
                }

                setActiveTab(currentSectionId);
            }

            // Click-to-scroll with immediate tab activation
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href').replace('#', '');
                    const targetEl = document.getElementById(targetId);
                    if (targetEl) {
                        e.preventDefault();
                        setActiveTab(targetId);
                        targetEl.scrollIntoView({
                            behavior: 'smooth'
                        });
                        if (window.history && window.history.replaceState) {
                            window.history.replaceState(null, null, '#' + targetId);
                        }
                    }
                });
            });

            // Initial evaluation on load
            updateScrollspy();

            // Throttled scroll listener
            let ticking = false;
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        updateScrollspy();
                        ticking = false;
                    });
                    ticking = true;
                }
            }, {
                passive: true
            });
        }
    });
</script>
@endpush
