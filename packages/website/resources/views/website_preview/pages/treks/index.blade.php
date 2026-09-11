@extends('website_preview.layout.master')

@section('title', 'Himalayan Journeys & Treks — EATH Ways (Website)')
@section('meta_description', 'Explore curated luxury trekking journeys across the Everest, Annapurna, Langtang, Manaslu and Mustang regions of Nepal.')

@push('head')
    @vite(['packages/website/resources/website/scss/website-preview-icons.scss'])
@endpush

@section('content')
<div class="website-container website-section--compact">
    <!-- 1. Editorial Page Introduction -->
    <header class="website-editorial-header" style="max-width: 820px; margin-bottom: var(--space-10);">
        <span class="website-micro website-text-muted text-uppercase" style="letter-spacing: 0.1em; display: block; margin-bottom: var(--space-2);">The Himalayan Catalog · Nepal</span>
        <h1 class="website-h1" style="margin: 0 0 var(--space-4);">Find Your Nepal Journey</h1>
        <p class="website-lead website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-6);">
            Carefully paced itineraries across high mountain sanctuaries, sacred valleys, and remote passes. Explore sample journeys by duration, physical challenge, and regional character.
        </p>
        <div style="display: flex; gap: var(--space-3); align-items: center; flex-wrap: wrap;">
            <a href="{{ route('website.planner.start', ['mode' => 'discover', 'source' => 'listing']) }}" class="website-btn website-btn--primary">
                <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                </svg>
                <span>Plan My Trek</span>
            </a>
            <a href="{{ route('website.compare') }}" class="website-btn website-btn--outline">
                <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="3" width="7" height="18"></rect>
                    <rect x="14" y="3" width="7" height="18"></rect>
                </svg>
                <span>Compare Treks</span>
            </a>
        </div>
        <span class="website-sr-only">Explore sample treks</span>
    </header>

    <!-- Filter Status & Active Summary Bar (Zero Shadows, Clean Borders) -->
    <div id="website-filter-sidebar" class="website-listing-summary" aria-label="Sample trek filters" style="border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border); padding: var(--space-3) 0; margin-bottom: var(--space-8); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: var(--space-3);">
        <div style="display: flex; align-items: center; gap: var(--space-3); flex-wrap: wrap;">
            <span class="website-small font-weight-medium website-text-primary">{{ $totalCount }} sample {{ $totalCount === 1 ? 'trek' : 'treks' }}</span>
            <span class="website-micro website-text-muted" aria-hidden="true">·</span>
            <span class="website-small website-text-secondary">Page {{ $page }} of {{ $totalPages }}</span>
            @if(count($activeFilters) > 0)
                <span class="website-small website-text-muted" style="margin-left: var(--space-2);">Active:</span>
                @foreach($activeFilters as $filter)
                    <a href="{{ $filter['remove_url'] }}" class="website-filter-chip" aria-label="Remove filter {{ $filter['label'] }}">
                        {{ $filter['label'] }} <span aria-hidden="true">×</span>
                    </a>
                @endforeach
                <a href="{{ $clearAllUrl }}" class="website-link website-small" style="margin-left: var(--space-2);">Clear all</a>
            @endif
        </div>

        @if($hasInvalidDuration)
            <div role="alert" class="website-alert website-alert--error" style="width: 100%; margin-top: var(--space-2);">
                <span>Invalid range: Minimum days cannot exceed maximum days.</span>
            </div>
        @endif
    </div>

    <!-- Hidden state preservation inputs for testing and form synchronization -->
    @if($currentParams['days_min'] !== null)<input type="hidden" name="days_min" value="{{ $currentParams['days_min'] }}">@endif
    @if($currentParams['days_max'] !== null)<input type="hidden" name="days_max" value="{{ $currentParams['days_max'] }}">@endif

    <!-- 2. Journey-Type Selector (6 Calm Editorial Pills) -->
    <section aria-labelledby="journey-types-heading" style="margin-bottom: var(--space-12);">
        <div style="margin-bottom: var(--space-4);">
            <span class="website-micro website-text-muted text-uppercase" style="letter-spacing: 0.08em;">Curated Discovery</span>
            <h2 id="journey-types-heading" class="website-h3" style="margin-top: var(--space-1);">What kind of journey are you imagining?</h2>
        </div>
        <div class="website-journey-types" role="list">
            @foreach($journeyTypes as $type)
                @php
                    $isSelected = ($currentParams['experience'] ?? '') === $type['key'];
                    $customUrl = route('website.planner.start', ['mode' => 'custom', 'source' => 'listing']);
                    $filterUrl = route('website.treks.index', array_filter(['experience' => $type['key'], 'region' => $currentParams['region'] ?? null]));
                @endphp
                <a href="{{ $type['key'] === 'custom' ? $customUrl : $filterUrl }}" 
                   class="website-journey-type {{ $isSelected ? 'is-selected' : '' }}" 
                   role="listitem" 
                   aria-current="{{ $isSelected ? 'page' : 'false' }}">
                    <span class="website-journey-type__icon" aria-hidden="true">✦</span>
                    <span class="website-journey-type__label">{{ $type['label'] }}</span>
                    <span class="website-journey-type__description">{{ $type['description'] }}</span>
                </a>
            @endforeach
        </div>
    </section>

    <!-- 3. Dynamic Featured Journey (Expansive Editorial Feature) -->
    @if($featuredJourney)
        <section aria-labelledby="featured-journey-heading" style="margin-bottom: var(--space-14);">
            <div class="website-featured-journey">
                <div class="website-featured-journey__image">
                    @php
                        $featImage = $featuredJourney['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve('trek-'.$featuredJourney['id'], 'Himalayan mountain landscape');
                    @endphp
                    <img src="{{ $featImage['url'] }}" alt="{{ $featImage['alt'] }}" width="{{ $featImage['width'] }}" height="{{ $featImage['height'] }}" loading="eager" fetchpriority="high">
                </div>
                <div class="website-featured-journey__body">
                    <span class="website-micro website-text-secondary text-uppercase" style="letter-spacing: 0.08em;">{{ strtoupper($featuredJourney['region']['name'] ?? 'NEPAL') }} REGION · FEATURED ROUTE</span>
                    <h2 id="featured-journey-heading" class="website-h2" style="margin: var(--space-2) 0 var(--space-3);">{{ $featuredJourney['name'] }}</h2>
                    <p class="website-body website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-4);">{{ $featuredJourney['summary'] }}</p>
                    <div style="display: flex; flex-wrap: wrap; gap: var(--space-4); margin-bottom: var(--space-4); padding: var(--space-3) 0; border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border);">
                        <div>
                            <span class="website-micro website-text-muted display-block">DURATION</span>
                            <span class="website-small font-weight-medium">{{ $featuredJourney['duration_days'] }} Days</span>
                        </div>
                        <div>
                            <span class="website-micro website-text-muted display-block">MAX ELEVATION</span>
                            <span class="website-small font-weight-medium">{{ number_format($featuredJourney['max_altitude_m']) }} m</span>
                        </div>
                        <div>
                            <span class="website-micro website-text-muted display-block">GRADE</span>
                            <span class="website-small font-weight-medium">{{ ucfirst($featuredJourney['difficulty']) }}</span>
                        </div>
                        <div>
                            <span class="website-micro website-text-muted display-block">GUIDANCE</span>
                            <span class="website-small font-weight-medium">Private Sherpa Guide</span>
                        </div>
                    </div>
                    <p class="website-small website-text-secondary" style="margin-bottom: var(--space-5);">
                        From <span class="website-text-primary font-weight-bold" style="font-family: var(--font-display); font-size: 1.15rem; font-weight: 700;">{{ \Website\Support\WebsiteMoneyFormatter::format($featuredJourney['price_minor']) }} USD</span> per person
                    </p>
                    <div style="display: flex; gap: var(--space-3); flex-wrap: wrap;">
                        <a href="{{ route('website.treks.show', $featuredJourney['slug']) }}" class="website-btn website-btn--primary">
                            <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m2 20 7-10 5 6 4-3 4 7H2z"></path>
                            </svg>
                            <span>Explore Journey</span>
                        </a>
                        <a href="{{ route('website.compare', ['treks' => [$featuredJourney['id']]]) }}" 
                           class="website-btn website-btn--outline website-compare-btn" 
                           data-trek-id="{{ $featuredJourney['id'] }}" 
                           data-compare-long="true"
                           role="button" 
                           aria-pressed="false">
                            <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="3" width="7" height="18"></rect>
                                <rect x="14" y="3" width="7" height="18"></rect>
                            </svg>
                            <span>Add to Compare</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @else
        <!-- Honest Empty State when No Journeys Match -->
        <div class="website-card website-card--warm" style="padding: var(--space-10); margin-bottom: var(--space-12); text-align: center; border: 1px solid var(--color-border);">
            <span class="website-micro website-text-muted text-uppercase" style="letter-spacing: 0.08em; display: block; margin-bottom: var(--space-2);">0 sample treks</span>
            <h2 class="website-h3" style="margin-bottom: var(--space-2);">No matching sample treks found</h2>
            <p class="website-body website-text-secondary" style="max-width: 520px; margin: 0 auto var(--space-6);">
                No sample journeys match the selected filter combination. You can reset filters or request a bespoke itinerary tailored to your dates.
            </p>
            <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                <a href="{{ $clearAllUrl }}" class="website-btn website-btn--outline">
                    Clear All Filters
                </a>
                <a href="{{ route('website.planner.start', ['mode' => 'custom', 'source' => 'empty-listing']) }}" class="website-btn website-btn--primary">
                    Request Custom Itinerary
                </a>
            </div>
            <span class="website-sr-only">No matching sample journeys found</span>
        </div>
    @endif

    <!-- 4. Editorial Region Tabs -->
    <nav id="website-region-nav" aria-label="Browse by region" class="website-region-nav">
        <span class="website-region-nav__label">Regions:</span>
        <a href="{{ route('website.treks.index', array_filter(['experience' => $currentParams['experience'] ?? null])) }}#website-region-nav" 
           class="website-filter-pill {{ empty($currentParams['region']) ? 'is-selected' : '' }}">
            All Regions
        </a>
        @foreach($regions as $r)
            @php
                $isRegionSelected = ($currentParams['region'] ?? '') === $r['slug'];
                $rUrl = route('website.treks.index', array_filter([
                    'region' => $r['slug'],
                    'experience' => $currentParams['experience'] ?? null,
                ])) . '#website-region-nav';
            @endphp
            <a href="{{ $rUrl }}" class="website-filter-pill {{ $isRegionSelected ? 'is-selected' : '' }}">
                {{ $r['name'] }}
            </a>
        @endforeach
    </nav>

    <!-- 5. Curated Journey List (Editorial Cards) -->
    <section id="website-curated-journeys-section" aria-labelledby="journey-list-heading" style="margin-bottom: var(--space-14);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; gap: var(--space-4); flex-wrap: wrap; margin-bottom: var(--space-6); padding-bottom: var(--space-3); border-bottom: 1px solid var(--color-border);">
            <div>
                <span class="website-micro website-text-muted text-uppercase" style="letter-spacing: 0.08em;">Curated Portfolio</span>
                <h2 id="journey-list-heading" class="website-h3" style="margin-top: var(--space-1);">Curated Journeys</h2>
                <p class="website-small website-text-secondary" style="margin: 0;">{{ $totalCount }} illustrative sample {{ $totalCount === 1 ? 'journey' : 'journeys' }} to explore.</p>
            </div>
            
            <!-- Sorting Control -->
            <form id="website-listing-sort-form" method="GET" action="{{ route('website.treks.index') }}#website-region-nav" style="display: flex; gap: var(--space-2); align-items: center;">
                @if(!empty($currentParams['region']))<input type="hidden" name="region" value="{{ $currentParams['region'] }}">@endif
                @if(!empty($currentParams['experience']))<input type="hidden" name="experience" value="{{ $currentParams['experience'] }}">@endif
                @if(!empty($currentParams['difficulty']))<input type="hidden" name="difficulty" value="{{ $currentParams['difficulty'] }}">@endif
                <label for="listing-sort" class="website-small website-text-secondary">Sort by:</label>
                <select id="listing-sort" name="sort" class="website-select" style="padding: 0.4rem 0.8rem; border-radius: 0 !important; border: 1px solid var(--color-border); font-size: var(--type-small);">
                    <option value="recommended" {{ ($currentParams['sort'] ?? '') === 'recommended' ? 'selected' : '' }}>Recommended</option>
                    <option value="duration_asc" {{ ($currentParams['sort'] ?? '') === 'duration_asc' ? 'selected' : '' }}>Duration: short to long</option>
                    <option value="duration_desc" {{ ($currentParams['sort'] ?? '') === 'duration_desc' ? 'selected' : '' }}>Duration: long to short</option>
                    <option value="price_asc" {{ ($currentParams['sort'] ?? '') === 'price_asc' ? 'selected' : '' }}>Price: low to high</option>
                    <option value="price_desc" {{ ($currentParams['sort'] ?? '') === 'price_desc' ? 'selected' : '' }}>Price: high to low</option>
                </select>
            </form>
        </div>

        @if(count($treks) > 0)
            <div class="website-listing-grid website-editorial-journeys">
                @foreach($treks as $trek)
                    @php
                        $image = $trek['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve('trek-'.$trek['id'], 'Himalayan journey landscape');
                        $isFeatured = $loop->first;
                        $regionName = strtoupper($trek['region']['name'] ?? 'NEPAL');
                        $priceFormatted = \Website\Support\WebsiteMoneyFormatter::format($trek['price_minor']);
                    @endphp
                    <article class="website-editorial-journey {{ $isFeatured ? 'website-editorial-journey--featured' : '' }}" data-trek-id="{{ $trek['id'] }}">
                        <div class="website-editorial-journey__media">
                            <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-editorial-journey__media-link" tabindex="-1" aria-hidden="true">
                                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" width="{{ $image['width'] }}" height="{{ $image['height'] }}" loading="lazy">
                                <span class="website-editorial-journey__badge">
                                    {{ $trek['duration_days'] }} Days
                                </span>
                            </a>
                        </div>
                        <div class="website-editorial-journey__details">
                            @if($isFeatured)
                                <p class="website-editorial-journey__label website-editorial-journey__label--accent">
                                    <i class="fa-solid fa-bolt" aria-hidden="true"></i> Featured Signature Route &middot; {{ $regionName }} &middot; 
                                    <a href="{{ route('website.treks.itinerary.modal', $trek['slug']) }}" 
                                       class="website-itinerary-trigger" 
                                       data-open-modal="{{ route('website.treks.itinerary.modal', $trek['slug']) }}" 
                                       data-modal-size="modal-xl" 
                                       title="View {{ $trek['duration_days'] }} Days Itinerary Details">
                                        {{ $trek['duration_days'] }} Days Itinerary
                                    </a>
                                </p>
                            @else
                                <p class="website-editorial-journey__label">
                                    <i class="fa-solid fa-mountain" aria-hidden="true"></i> {{ $regionName }} Region &middot; 
                                    <a href="{{ route('website.treks.itinerary.modal', $trek['slug']) }}" 
                                       class="website-itinerary-trigger" 
                                       data-open-modal="{{ route('website.treks.itinerary.modal', $trek['slug']) }}" 
                                       data-modal-size="modal-xl" 
                                       title="View {{ $trek['duration_days'] }} Days Itinerary Details">
                                        {{ $trek['duration_days'] }} Days Itinerary
                                    </a>
                                </p>
                            @endif

                            <h3 class="website-editorial-journey__title">
                                <a href="{{ route('website.treks.show', $trek['slug']) }}">
                                    {{ $trek['name'] }}
                                </a>
                            </h3>

                            <p class="website-editorial-journey__meta">
                                {{ $trek['duration_days'] }} days &middot; Max {{ number_format($trek['max_altitude_m']) }}m &middot; Grade: {{ ucfirst($trek['difficulty']) }} &middot; Private Sherpa Guide
                            </p>

                            <p class="website-editorial-journey__summary">
                                {{ $trek['summary'] }}
                            </p>

                            <span class="website-editorial-journey__spaces">
                                <i class="fa-solid fa-circle-check" aria-hidden="true"></i> Guaranteed departures available &middot; Private dates on request
                            </span>
                        </div>
                        <div class="website-editorial-journey__action">
                            <div class="website-editorial-journey__pricing">
                                <span class="website-editorial-journey__price">{{ $priceFormatted }}</span>
                                <span class="website-editorial-journey__note">Illustrative USD / person</span>
                            </div>
                            <div class="website-editorial-journey__buttons">
                                <a href="{{ route('website.treks.show', $trek['slug']) }}" 
                                   class="website-btn {{ $isFeatured ? 'website-btn--accent' : 'website-btn--primary' }} website-btn--compact website-btn--block">
                                    <span>Explore Journey</span>
                                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('website.compare', ['treks' => [$trek['id']]]) }}" 
                                   class="website-btn website-btn--outline website-btn--compact website-btn--block website-compare-btn" 
                                   data-trek-id="{{ $trek['id'] }}" 
                                   role="button" 
                                   aria-label="Add {{ $trek['name'] }} to comparison" 
                                   aria-pressed="false">
                                    <span>Compare</span>
                                    <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <rect x="3" y="3" width="7" height="18"></rect>
                                        <rect x="14" y="3" width="7" height="18"></rect>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Bar -->
            @if($totalPages > 1)
                <div class="website-pagination" style="display: flex; justify-content: space-between; align-items: center; margin-top: var(--space-8); padding-top: var(--space-4); border-top: 1px solid var(--color-border);">
                    <div class="website-small website-text-secondary">
                        Showing Page {{ $page }} of {{ $totalPages }}
                    </div>
                    <div style="display: flex; gap: var(--space-2);">
                        @if($page > 1)
                            <a href="{{ route('website.treks.index', array_merge($currentParams, ['page' => $page - 1])) }}#website-region-nav" class="website-btn website-btn--outline website-btn--compact">
                                ← Previous
                            </a>
                        @endif
                        @if($page < $totalPages)
                            <a href="{{ route('website.treks.index', array_merge($currentParams, ['page' => $page + 1])) }}#website-region-nav" class="website-btn website-btn--outline website-btn--compact">
                                Next Page →
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        @else
            @include('website_preview.components.empty-state', [
                'title' => 'No matching sample treks found',
                'message' => 'Adjust your filter selection or clear filters to view all available Himalayan journeys.',
                'resetUrl' => $clearAllUrl,
                'resetLabel' => 'Clear All Filters',
            ])
        @endif
    </section>

    <!-- 6. Compare Treks Section (Integrated Teaser) -->
    <section aria-labelledby="compare-treks-heading" style="margin-bottom: var(--space-14); padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg);">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: var(--space-6); flex-wrap: wrap;">
            <div style="max-width: 620px;">
                <span class="website-micro website-text-muted text-uppercase" style="letter-spacing: 0.08em; display: block; margin-bottom: var(--space-1);">Side-by-Side Evaluation</span>
                <h2 id="compare-treks-heading" class="website-h3" style="margin: 0 0 var(--space-2);">Compare Himalayan Routes</h2>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Select up to three journeys to evaluate altitude gain profiles, daily walking hours, lodge comfort levels, and pacing side by side.
                </p>
            </div>
            <div>
                <a href="{{ route('website.compare') }}" class="website-btn website-btn--outline">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="18"></rect>
                        <rect x="14" y="3" width="7" height="18"></rect>
                    </svg>
                    <span>Open Comparison Matrix</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 7. Plan My Trek Section (Editorial Consultation Teaser) -->
    <section aria-labelledby="planner-teaser-heading" style="padding: var(--space-10) 0; border-top: 1px solid var(--color-border);">
        <div style="max-width: 680px;">
            <span class="website-micro website-text-muted text-uppercase" style="letter-spacing: 0.08em; display: block; margin-bottom: var(--space-2);">Private Consultation</span>
            <h2 id="planner-teaser-heading" class="website-h3" style="margin: 0 0 var(--space-3);">Not sure which trek fits your fitness or schedule?</h2>
            <p class="website-body website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-6);">
                Our guided planner balances your available travel days, high-altitude experience, seasonal weather preferences, and trail style to suggest the most rewarding private Himalayan journey.
            </p>
            <div style="display: flex; gap: var(--space-3); align-items: center; flex-wrap: wrap;">
                <a href="{{ route('website.planner.start', ['mode' => 'discover', 'source' => 'listing']) }}" class="website-btn website-btn--primary">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                    <span>Plan My Trek</span>
                </a>
                <a href="{{ route('website.contact') }}" class="website-btn website-btn--outline">
                    Speak With a Specialist
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
