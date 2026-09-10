@extends('website_preview.layout.master')

@section('title', 'Himalayan Trekking Guide & Articles · EATH Website')
@section('meta_description', 'Educational guides on Nepal trekking seasons, high-altitude preparation, teahouse packing, and route planning. Catalog fixtures website.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- H1 & Editorial Introduction -->
    <header style="margin-bottom: var(--space-8); max-width: 860px;">
        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2); flex-wrap: wrap;">
            <span class="website-badge website-badge--primary">Educational Library</span>
            <span class="website-badge website-badge--neutral">6 Canonical Articles</span>
        </div>

        <h1 class="website-h1" style="margin: 0 0 var(--space-3) 0;">
            Himalayan Trekking Guide &amp; Preparation Articles
        </h1>

        <p class="website-body website-text-secondary" style="font-size: 1.125rem; line-height: 1.6; margin: 0 0 var(--space-4) 0;">
            Practical insights on route selection, seasonal timing, altitude acclimatization, and teahouse packing. These educational sample guides illustrate how editorial content supports thoughtful journey planning.
        </p>

        <div class="website-notice website-notice--info" style="margin: 0; padding: var(--space-3) var(--space-4);">
            <span class="website-micro" style="display: block; line-height: 1.5;">
                <strong>Editorial Notice:</strong> Content profiles are illustrative reference guides for exploring the interface. They illustrate practical planning concepts but do not replace certified medical advice or route-specific briefings.
            </span>
        </div>
    </header>

    <!-- 3. Search & 4. Category Filters -->
    <section aria-labelledby="heading-filter-bar" style="margin-bottom: var(--space-8);">
        <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border);">
            <!-- Search Form -->
            <form action="{{ route('website.articles.index') }}" method="GET" style="display: flex; gap: var(--space-3); margin-bottom: var(--space-4); flex-wrap: wrap;">
                @if($selectedCategory)
                    <input type="hidden" name="category" value="{{ $selectedCategory }}">
                @endif
                <div style="flex: 1 1 280px; position: relative;">
                    <input type="search"
                           name="q"
                           value="{{ $q }}"
                           placeholder="Search articles by topic, gear, season..."
                           maxlength="120"
                           class="website-input"
                           style="width: 100%;"
                           aria-label="Search articles" />
                </div>
                <button type="submit" class="website-btn website-btn--primary">
                    Search Articles
                </button>
                @if($q)
                    <a href="{{ route('website.articles.index', array_filter(['category' => $selectedCategory])) }}" class="website-btn website-btn--outline">
                        Clear Search
                    </a>
                @endif
            </form>

            <!-- Category Pills -->
            <div style="display: flex; gap: var(--space-2); flex-wrap: wrap; align-items: center;">
                <span class="website-micro" style="font-weight: 600; text-transform: uppercase; color: var(--color-text-muted); margin-right: var(--space-1);">
                    Topics:
                </span>

                <a href="{{ route('website.articles.index', array_filter(['q' => $q])) }}"
                   class="website-badge {{ $selectedCategory === null ? 'website-badge--primary' : 'website-badge--neutral' }}"
                   style="text-decoration: none; padding: 4px 10px; font-size: 0.8rem;">
                    All ({{ count($categoryCounts) ? array_sum($categoryCounts) : 6 }})
                </a>

                @foreach($allowedCategories as $catKey => $catLabel)
                    @php
                        $isActive = ($selectedCategory === $catKey);
                        $count = $categoryCounts[$catKey] ?? 0;
                    @endphp
                    <a href="{{ route('website.articles.index', array_filter(['category' => $isActive ? null : $catKey, 'q' => $q])) }}"
                       class="website-badge {{ $isActive ? 'website-badge--primary' : 'website-badge--neutral' }}"
                       style="text-decoration: none; padding: 4px 10px; font-size: 0.8rem;">
                        {{ $catLabel }} ({{ $count }})
                        @if($isActive) &times; @endif
                    </a>
                @endforeach

                @if($selectedCategory)
                    <a href="{{ route('website.articles.index', array_filter(['q' => $q])) }}" class="website-micro text-primary" style="text-decoration: underline; margin-left: var(--space-2);">
                        Reset Topic
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- 5. Featured Sample Article (Only shown when not searching and on page 1 without category filter) -->
    @if($featuredArticle && !$q && !$selectedCategory && $page === 1)
        <section aria-labelledby="heading-featured-article" style="margin-bottom: var(--space-10);">
            <div class="website-card" style="padding: 0; background: var(--color-surface); border: 1px solid var(--color-border); overflow: hidden; display: grid; grid-template-columns: 1fr; @media(min-width: 768px) { grid-template-columns: 1fr 1fr; }">
                <div style="display: flex; flex-direction: column; @media(min-width: 768px) { flex-direction: row; }">
                    <div style="width: 100%; @media(min-width: 768px) { width: 50%; } background: var(--color-background-warm); aspect-ratio: 16 / 10;">
                        <img src="{{ $featuredArticle['image']['url'] }}"
                             alt="{{ $featuredArticle['image']['alt'] }}"
                             style="width: 100%; height: 100%; object-fit: cover; display: block;"
                             loading="eager" />
                    </div>
                    <div style="padding: var(--space-6); display: flex; flex-direction: column; justify-content: center; flex: 1;">
                        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2);">
                            <span class="website-badge website-badge--accent">Featured Guide</span>
                            <span class="website-badge website-badge--neutral">{{ ucfirst($featuredArticle['category']) }}</span>
                        </div>
                        <h2 id="heading-featured-article" class="website-h2" style="margin: 0 0 var(--space-3) 0; font-size: 1.5rem;">
                            <a href="{{ route('website.articles.show', ['slug' => $featuredArticle['slug']]) }}" style="color: var(--color-text); text-decoration: none;">
                                {{ $featuredArticle['title'] }}
                            </a>
                        </h2>
                        <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-5) 0; line-height: 1.6;">
                            {{ $featuredArticle['summary'] }}
                        </p>
                        <div>
                            <a href="{{ route('website.articles.show', ['slug' => $featuredArticle['slug']]) }}" class="website-btn website-btn--primary">
                                Read Full Guide &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- 6. ArticleCard Grid with Count -->
    <section aria-labelledby="heading-articles-grid" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-2);">
            <div>
                <h2 id="heading-articles-grid" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                    All Planning Guides ({{ $totalCount }})
                </h2>
                <p class="website-small website-text-secondary" style="margin: 0;">
                    Page {{ $page }} of {{ $totalPages }} ({{ count($articles) }} articles displayed).
                </p>
            </div>

            @if($q || $selectedCategory)
                <span class="website-badge website-badge--accent">
                    Filtered Results
                </span>
            @endif
        </div>

        @if(count($articles) > 0)
            <!-- 3 -> 2 -> 1 Responsive Grid -->
            <div class="website-articles-grid">
                @foreach($articles as $article)
                    <article class="website-article-card">
                        <div class="website-article-card__image-wrapper">
                            <img src="{{ $article['image']['url'] }}"
                                 alt="{{ $article['image']['alt'] }}"
                                 loading="lazy" />
                        </div>
                        <div class="website-article-card__content">
                            <div style="margin-bottom: var(--space-2);">
                                <span class="website-badge website-badge--neutral" style="font-size: 0.72rem; text-transform: uppercase;">
                                    {{ $allowedCategories[$article['category']] ?? ucfirst($article['category']) }}
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

                            <div class="website-article-card__meta">
                                <span class="website-micro website-text-muted">
                                    Sample Reference · {{ $article['author_label'] ?? 'EATH Editorial' }}
                                </span>
                                <a href="{{ route('website.articles.show', ['slug' => $article['slug']]) }}" class="website-small text-primary" style="font-weight: 600; text-decoration: underline;">
                                    Read Guide &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- 7. Pagination -->
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
                        <span class="website-btn website-btn--ghost" style="font-size: 0.875rem; opacity: 0.5; cursor: not-allowed;">
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
                        <span class="website-btn website-btn--ghost" style="font-size: 0.875rem; opacity: 0.5; cursor: not-allowed;">
                            Next Page &rarr;
                        </span>
                    @endif
                </nav>
            @endif
        @else
            <!-- Empty State -->
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-surface); border: 1px dashed var(--color-border);">
                <div style="max-width: 500px; margin: 0 auto;">
                    <svg class="website-icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="margin-bottom: var(--space-2);">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                    <h3 class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        No Articles Found
                    </h3>
                    <p class="website-body website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-5);">
                        @if($q)
                            No articles match your search term "<strong>{{ $q }}</strong>". Try searching for keywords like "pack", "month", or "altitude".
                        @else
                            No articles match the selected category.
                        @endif
                    </p>
                    <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                        <a href="{{ route('website.articles.index') }}" class="website-btn website-btn--primary">
                            Browse All Articles
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <!-- 8. Planning CTA -->
    <section aria-labelledby="heading-plan-journey-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 2px solid var(--color-primary-light); text-align: center;">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-2); text-transform: uppercase;">
                Custom Journey Planning
            </span>
            <h2 id="heading-plan-journey-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                Ready to Put Your Research into Practice?
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 660px; margin: 0 auto var(--space-6) auto; line-height: 1.6;">
                Launch our interactive trek planner to receive personalized itinerary matches based on your preferred travel month, route pace, and party size.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}?mode=discover&source=article" class="website-btn website-btn--primary">
                    Launch Interactive Planner &rarr;
                </a>
                <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline">
                    Browse Sample Itineraries
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
