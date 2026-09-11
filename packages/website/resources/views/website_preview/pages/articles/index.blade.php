@extends('website_preview.layout.master')

@section('title', 'Himalayan Trekking Guide & Field Insights · EATH Ways')
@section('meta_description', 'Practical field advice on Nepal trekking seasons, teahouse packing discipline, high-altitude preparation, and route selection from licensed Himalayan guides.')

@section('content')
<div class="website-container website-section--compact">

    <!-- 1. Editorial Header & Library Introduction -->
    <header class="website-guide-hero">
        <span class="website-guide-hero__eyebrow">
            EXPEDITION LIBRARY · HIMALAYAN FIELD DISPATCHES
        </span>

        <h1 class="website-h1" style="margin: 0 0 var(--space-3) 0;">
            Himalayan Trekking Guide &amp; Field Insights
        </h1>

        <p class="website-guide-hero__lead">
            Authoritative field notes on weather windows, teahouse packing discipline, high-altitude acclimatization curves, and route selection—curated by licensed Nepal high-altitude mountain guides.
        </p>

        <div class="website-guide-hero__actions">
            <a href="{{ route('website.planner.start', ['mode' => 'discover', 'source' => 'travel-guide']) }}" class="website-btn website-btn--primary">
                <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                </svg>
                <span>Plan My Trek</span>
            </a>
            <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline">
                <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span>Explore Trek Catalog</span>
            </a>
        </div>
    </header>

    <!-- 2. Metrics & Authority Stat Strip (Zero Shadows, Hairline Borders) -->
    <div class="website-guide-stats" aria-label="Field Library Statistics">
        <div class="website-guide-stats__item">
            <span class="website-guide-stats__label">Curated Guides</span>
            <span class="website-guide-stats__value">6 Field Guides</span>
        </div>
        <div class="website-guide-stats__item">
            <span class="website-guide-stats__label">Core Disciplines</span>
            <span class="website-guide-stats__value">6 Planning Pillars</span>
        </div>
        <div class="website-guide-stats__item">
            <span class="website-guide-stats__label">Guide Network</span>
            <span class="website-guide-stats__value">100% Sherpa Verified</span>
        </div>
        <div class="website-guide-stats__item">
            <span class="website-guide-stats__label">Safety Standards</span>
            <span class="website-guide-stats__value">UIAA &amp; NMGA Protocol</span>
        </div>
    </div>

    <!-- 3. Search & Topic Filter Hub -->
    <section aria-labelledby="heading-filter-hub" style="margin-bottom: var(--space-8);">
        <h2 id="heading-filter-hub" class="website-sr-only">Search and Filter Travel Guides</h2>
        
        <div id="website-guide-filter-wrap" class="website-guide-filter-wrap">
            <!-- Search Input Form -->
            <form action="{{ route('website.articles.index') }}" method="GET" id="website-guide-search-form" class="website-guide-search-form" role="search">
                @if($selectedCategory)
                    <input type="hidden" name="category" value="{{ $selectedCategory }}">
                @endif
                <div class="website-guide-search-input-wrap">
                    <svg class="website-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="search"
                           name="q"
                           value="{{ $q }}"
                           placeholder="Search guides by keyword, gear, altitude, season, route..."
                           maxlength="120"
                           class="website-input"
                           aria-label="Search travel guides" />
                </div>
                <button type="submit" class="website-btn website-btn--primary">
                    <svg class="website-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <span>Search Library</span>
                </button>
                @if($q)
                    <a href="{{ route('website.articles.index', array_filter(['category' => $selectedCategory])) }}" class="website-guide-clear-search website-btn website-btn--outline">
                        Clear Search
                    </a>
                @endif
            </form>

            <!-- Topic Filter Buttons (Zero-Refresh Seamless In-Place Tabs) -->
            <div id="website-guide-topics" class="website-guide-topics" role="tablist" aria-label="Topic categories">
                <span class="website-guide-topics__label">Pillars:</span>

                <a href="{{ route('website.articles.index', array_filter(['q' => $q])) }}"
                   class="website-guide-topic-btn {{ $selectedCategory === null ? 'is-active' : '' }}"
                   data-category=""
                   role="tab"
                   aria-selected="{{ $selectedCategory === null ? 'true' : 'false' }}"
                   aria-current="{{ $selectedCategory === null ? 'page' : 'false' }}">
                    <span>All Guides</span>
                    <span class="website-guide-topic-count">{{ count($categoryCounts) ? array_sum($categoryCounts) : 6 }}</span>
                </a>

                @foreach($allowedCategories as $catKey => $catLabel)
                    @php
                        $isActive = ($selectedCategory === $catKey);
                        $count = $categoryCounts[$catKey] ?? 0;
                    @endphp
                    <a href="{{ route('website.articles.index', array_filter(['category' => $isActive ? null : $catKey, 'q' => $q])) }}"
                       class="website-guide-topic-btn {{ $isActive ? 'is-active' : '' }}"
                       data-category="{{ $catKey }}"
                       role="tab"
                       aria-selected="{{ $isActive ? 'true' : 'false' }}"
                       aria-current="{{ $isActive ? 'page' : 'false' }}">
                        <span>{{ $catLabel }}</span>
                        <span class="website-guide-topic-count">{{ $count }}</span>
                        @if($isActive) <span aria-hidden="true" style="margin-left: 2px;">&times;</span> @endif
                    </a>
                @endforeach

                @if($selectedCategory)
                    <a href="{{ route('website.articles.index', array_filter(['q' => $q])) }}" class="website-guide-reset-link website-small text-primary text-decoration-underline" style="margin-left: var(--space-2);">
                        Reset Filter
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- 4. Featured Guide Dispatch (Expansive Split Showcase) -->
    <div id="website-guide-featured-wrap">
        @if($featuredArticle && !$q && !$selectedCategory && $page === 1)
            <section aria-labelledby="heading-featured-dispatch">
                <div class="website-guide-featured">
                    <div class="website-guide-featured__image-wrap">
                        <img src="{{ $featuredArticle['image']['url'] }}"
                             alt="{{ $featuredArticle['image']['alt'] }}"
                             loading="eager"
                             fetchpriority="high" />
                        <span class="website-guide-featured__badge">
                            Featured Dispatch
                        </span>
                    </div>
                    <div class="website-guide-featured__body">
                        <div class="website-guide-featured__kicker">
                            <span class="website-guide-featured__category">
                                {{ $allowedCategories[$featuredArticle['category']] ?? strtoupper($featuredArticle['category']) }}
                            </span>
                            <span class="website-micro website-text-muted" aria-hidden="true">·</span>
                            <span class="website-guide-featured__read-time">
                                {{ $featuredArticle['reading_time'] ?? '5 min read' }}
                            </span>
                        </div>

                        <h2 id="heading-featured-dispatch" class="website-guide-featured__title">
                            <a href="{{ route('website.articles.show', ['slug' => $featuredArticle['slug']]) }}">
                                {{ $featuredArticle['title'] }}
                            </a>
                        </h2>

                        <p class="website-guide-featured__summary">
                            {{ $featuredArticle['summary'] }}
                        </p>

                        <!-- Meta Strip with Author & Related Treks -->
                        <div class="website-guide-featured__meta-strip">
                            <div class="website-guide-featured__meta-item">
                                <span class="meta-label">DISPATCH BY</span>
                                <span class="meta-val">{{ $featuredArticle['author_label'] ?? 'EATH Field Editorial' }}</span>
                            </div>
                            <div class="website-guide-featured__meta-item">
                                <span class="meta-label">LAST UPDATED</span>
                                <span class="meta-val">{{ date('F Y', strtotime($featuredArticle['updated_date'] ?? 'now')) }}</span>
                            </div>
                            @if(!empty($featuredArticle['related_treks']))
                                <div class="website-guide-featured__meta-item" style="flex: 1 1 100%;">
                                    <span class="meta-label">APPLIES TO ROUTES</span>
                                    <div style="display: flex; gap: var(--space-1); flex-wrap: wrap; margin-top: 4px;">
                                        @foreach($featuredArticle['related_treks'] as $relTrek)
                                            <a href="{{ route('website.treks.show', $relTrek['slug']) }}" class="website-filter-chip" style="font-size: 0.72rem; padding: 2px 8px;">
                                                {{ $relTrek['name'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="website-guide-featured__actions">
                            <a href="{{ route('website.articles.show', ['slug' => $featuredArticle['slug']]) }}" class="website-btn website-btn--primary">
                                <span>Read Full Field Guide</span>
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                            <a href="{{ route('website.planner.start', ['mode' => 'discover', 'source' => 'featured-article']) }}" class="website-btn website-btn--outline">
                                <span>Plan with this Guide</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>

    <!-- 5. Field Guides Grid (3 Columns Desktop, 2 Tablet, 1 Mobile) -->
    <section id="website-guide-catalog-section" aria-labelledby="heading-guides-catalog" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: var(--space-6); flex-wrap: wrap; gap: var(--space-2); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-3);">
            <div>
                <span class="website-micro website-text-muted text-uppercase" style="letter-spacing: 0.08em; display: block; margin-bottom: 2px;">
                    FIELD ARCHIVES · NEPAL
                </span>
                <h2 id="heading-guides-catalog" class="website-h2" style="margin: 0; font-size: 1.5rem;">
                    Field Guides &amp; Dispatches ({{ $totalCount }})
                </h2>
            </div>

            <div style="display: flex; align-items: center; gap: var(--space-3);">
                <span class="website-small website-text-secondary">
                    Showing {{ count($articles) }} of {{ $totalCount }} guides
                </span>
                @if($q || $selectedCategory)
                    <span class="website-badge website-badge--accent" style="font-size: 0.72rem;">
                        [ FILTERED ]
                    </span>
                @endif
            </div>
        </div>

        @if(count($articles) > 0)
            <div class="website-articles-grid">
                @foreach($articles as $article)
                    <article class="website-article-card" role="article">
                        <div class="website-article-card__image-wrapper">
                            <a href="{{ route('website.articles.show', ['slug' => $article['slug']]) }}" tabindex="-1" aria-hidden="true">
                                <img src="{{ $article['image']['url'] }}"
                                     alt="{{ $article['image']['alt'] }}"
                                     loading="lazy" />
                            </a>
                        </div>
                        
                        <div class="website-article-card__content">
                            <div class="website-article-card__top">
                                <span class="website-article-card__category">
                                    {{ $allowedCategories[$article['category']] ?? strtoupper($article['category']) }}
                                </span>
                                <span class="website-article-card__read-time">
                                    {{ $article['reading_time'] ?? '4 min read' }}
                                </span>
                            </div>

                            <h3 class="website-article-card__title">
                                <a href="{{ route('website.articles.show', ['slug' => $article['slug']]) }}">
                                    {{ $article['title'] }}
                                </a>
                            </h3>

                            <p class="website-article-card__summary">
                                {{ $article['summary'] }}
                            </p>

                            @if(!empty($article['related_treks']))
                                <div class="website-article-card__tags" aria-label="Related Treks">
                                    @foreach(array_slice($article['related_treks'], 0, 2) as $relTrek)
                                        <a href="{{ route('website.treks.show', $relTrek['slug']) }}" class="website-article-card__tag" title="View {{ $relTrek['name'] }}">
                                            {{ $relTrek['name'] }}
                                        </a>
                                    @endforeach
                                    @if(count($article['related_treks']) > 2)
                                        <span class="website-article-card__tag">+{{ count($article['related_treks']) - 2 }} more</span>
                                    @endif
                                </div>
                            @endif

                            <div class="website-article-card__meta">
                                <span class="website-micro website-text-muted">
                                    {{ $article['author_label'] ?? 'EATH Editorial' }}
                                </span>
                                <a href="{{ route('website.articles.show', ['slug' => $article['slug']]) }}" class="website-small text-primary font-weight-medium" style="text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                                    <span>Read Guide</span>
                                    <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Navigation (Strict Zero Radius & Zero Drop-Shadows) -->
            @if($totalPages > 1)
                <nav aria-label="Articles Pagination" style="display: flex; justify-content: space-between; align-items: center; margin-top: var(--space-8); padding-top: var(--space-4); border-top: 1px solid var(--color-border); flex-wrap: wrap; gap: var(--space-3);">
                    @php
                        $prevUrl = ($page > 1) ? route('website.articles.index', array_merge(request()->query(), ['page' => $page - 1])) : null;
                        $nextUrl = ($page < $totalPages) ? route('website.articles.index', array_merge(request()->query(), ['page' => $page + 1])) : null;
                    @endphp

                    @if($prevUrl)
                        <a href="{{ $prevUrl }}" class="website-btn website-btn--outline" style="font-size: 0.875rem;">
                            &larr; Previous Page
                        </a>
                    @else
                        <span class="website-btn website-btn--ghost" style="font-size: 0.875rem; opacity: 0.4; cursor: not-allowed;">
                            &larr; Previous Page
                        </span>
                    @endif

                    <span class="website-small website-text-secondary">
                        Page <strong>{{ $page }}</strong> of <strong>{{ $totalPages }}</strong>
                    </span>

                    @if($nextUrl)
                        <a href="{{ $nextUrl }}" class="website-btn website-btn--outline" style="font-size: 0.875rem;">
                            Next Page &rarr;
                        </a>
                    @else
                        <span class="website-btn website-btn--ghost" style="font-size: 0.875rem; opacity: 0.4; cursor: not-allowed;">
                            Next Page &rarr;
                        </span>
                    @endif
                </nav>
            @endif
        @else
            <!-- Clean Alpine Empty State -->
            <div style="padding: var(--space-10) var(--space-6); text-align: center; background: var(--color-surface); border: 1px solid var(--color-border);">
                <div style="max-width: 480px; margin: 0 auto;">
                    <svg class="website-icon" width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="margin-bottom: var(--space-3);">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                    <h3 class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        No Matching Guides Found
                    </h3>
                    <p class="website-body website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-5);">
                        @if($q)
                            We couldn't find any dispatches matching "<strong>{{ $q }}</strong>". Try terms like "seasons", "pack", "altitude", or clear your search.
                        @else
                            No articles are currently available in the selected category.
                        @endif
                    </p>
                    <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                        <a href="{{ route('website.articles.index') }}" class="website-btn website-btn--primary">
                            Browse All 6 Guides
                        </a>
                        <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline">
                            Browse Trek Catalog
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <!-- 6. 6 Topic Pillars Architectural Exploration Grid -->
    <section class="website-guide-pillars-section" aria-labelledby="heading-topic-pillars">
        <div style="margin-bottom: var(--space-6);">
            <span class="website-micro website-text-muted text-uppercase" style="letter-spacing: 0.08em; display: block; margin-bottom: var(--space-1);">
                SYSTEMATIC EXPEDITION PLANNING
            </span>
            <h2 id="heading-topic-pillars" class="website-h2" style="margin: 0 0 var(--space-2) 0;">
                The Six Pillars of Himalayan Trekking
            </h2>
            <p class="website-lead website-text-secondary" style="margin: 0; max-width: 780px;">
                Thorough high-altitude preparation requires balancing weather windows, personal physiology, equipment resilience, and mountain logistics.
            </p>
        </div>

        <div class="website-guide-pillars-grid">
            @foreach($topicPillars as $pKey => $pillar)
                @php
                    $pUrl = route('website.articles.index', ['category' => $pKey]);
                @endphp
                <a href="{{ $pUrl }}" class="website-pillar-card" role="article">
                    <div class="website-pillar-card__bg" style="background-image: url('{{ $pillar['image'] ?? '' }}');" role="img" aria-label="{{ $pillar['image_alt'] ?? $pillar['title'] }}"></div>
                    <div class="website-pillar-card__scrim"></div>
                    <div class="website-pillar-card__inner">
                        <div class="website-pillar-card__top">
                            <div class="website-pillar-card__icon">
                                @if($pillar['icon'] === 'sun')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="12" r="5"></circle>
                                        <line x1="12" y1="1" x2="12" y2="3"></line>
                                        <line x1="12" y1="21" x2="12" y2="23"></line>
                                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                        <line x1="1" y1="12" x2="3" y2="12"></line>
                                        <line x1="21" y1="12" x2="23" y2="12"></line>
                                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                    </svg>
                                @elseif($pillar['icon'] === 'backpack')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M4 10a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z"></path>
                                        <path d="M9 6V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path>
                                        <path d="M8 21v-5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v5"></path>
                                        <path d="M8 10h8"></path>
                                    </svg>
                                @elseif($pillar['icon'] === 'shield')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                @elseif($pillar['icon'] === 'map')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                        <line x1="8" y1="2" x2="8" y2="18"></line>
                                        <line x1="16" y1="6" x2="16" y2="22"></line>
                                    </svg>
                                @elseif($pillar['icon'] === 'compass')
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                                    </svg>
                                @else
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"></path>
                                    </svg>
                                @endif
                            </div>
                        </div>

                        <div class="website-pillar-card__bottom">
                            <h3 class="website-pillar-card__title">{{ $pillar['title'] }}</h3>
                            <div class="website-pillar-card__tagline">{{ $pillar['tagline'] }}</div>

                            <div class="website-pillar-card__footer">
                                <span class="website-pillar-card__action-text">Explore Guides</span>
                                <span class="website-pillar-card__arrow" aria-hidden="true">&rarr;</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- 7. Alpine Field Advisory Notice (Sharp Left-Accent Card, Zero-Radius) -->
    <section aria-labelledby="heading-field-advisory">
        <div class="website-guide-advisory">
            <h3 id="heading-field-advisory" class="website-guide-advisory__title">
                Mountain Advisory &amp; Editorial Standards
            </h3>
            <p class="website-guide-advisory__body">
                The guides presented in the EATH Expedition Library illustrate proven high-altitude trekking principles formulated over decades of guiding Nepal's major ranges. Actual trail conditions, weather forecasts, pass clearances, and personal physiological tolerances vary continuously. Before undertaking any high-altitude expedition, confirm itinerary pacing, emergency evacuation cover, and medical clearances with your certified expedition leader and qualified physicians.
            </p>
        </div>
    </section>

    <!-- 8. Journey Planning Callout Banner (CTA) -->
    <section aria-labelledby="heading-plan-expedition" style="margin-bottom: var(--space-8);">
        <div class="website-guide-cta">
            <span class="website-guide-cta__eyebrow">
                CUSTOM JOURNEY PLANNING
            </span>
            <h2 id="heading-plan-expedition" class="website-guide-cta__heading">
                Ready to Put Field Research into Practice?
            </h2>
            <p class="website-guide-cta__lead">
                Launch our interactive trek planner to receive tailored itinerary matches based on your preferred travel month, walking endurance, altitude profile, and party size.
            </p>

            <div class="website-guide-cta__actions">
                <a href="{{ route('website.planner.start', ['mode' => 'discover', 'source' => 'travel-guide-cta']) }}" class="website-btn website-btn--primary">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                    <span>Launch Interactive Trek Planner &rarr;</span>
                </a>
                <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline-light">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                        <line x1="8" y1="2" x2="8" y2="18"></line>
                        <line x1="16" y1="6" x2="16" y2="22"></line>
                    </svg>
                    <span>Browse All 12 Journeys</span>
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
