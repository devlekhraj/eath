@extends('website_preview.layout.master')

@section('title', $title ?? 'When to Trek in Nepal · Month-by-Month Guide · EATH Website')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- H1 & Explicit Sample Seasonality Note -->
    <header style="margin-bottom: var(--space-8); max-width: 860px;">
        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2); flex-wrap: wrap;">
            <span class="website-badge website-badge--primary" style="border-radius: 0 !important;">Sample Calendar</span>
            <span class="website-badge website-badge--neutral" style="border-radius: 0 !important;">12 Months</span>
        </div>

        <h1 class="website-h1" style="margin: 0 0 var(--space-3) 0;">
            {{ $page?->title ?? 'When to Trek in Nepal: Month-by-Month Guide' }}
        </h1>

        <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; font-size: 1.125rem; line-height: 1.6;">
            {{ $page?->summary ?? 'Himalayan trekking conditions shift markedly across elevation zones and seasons. Use this interactive calendar to review seasonal patterns, historical trail rhythms, and catalog itineraries matched to each travel month.' }}
        </p>

        <!-- Dynamic Seasonality Disclaimer Notice -->
        @php
            $noticeTitle = $page?->notice_title ?: 'Sample Seasonality Notice';
            $noticeBody = $page?->notice_body ?: 'Monthly suitability profiles reflect historical climatic patterns and catalog fixture tags. They do not constitute real-time weather forecasts, guarantee trail passability, or confirm departure operation. Independent route verification is essential before real-world travel.';
        @endphp
        <div class="website-notice website-notice--info" style="margin: 0; padding: var(--space-3) var(--space-4); border-radius: 0 !important; border: 1px solid var(--color-border); box-shadow: none !important;">
            <span class="website-micro" style="display: block; line-height: 1.5;">
                <strong>{{ $noticeTitle }}:</strong> {{ $noticeBody }}
            </span>
        </div>
    </header>

    <!-- 3. Climatic Framework: Four Himalayan Seasons -->
    <section aria-labelledby="heading-seasons" style="margin-bottom: var(--space-10);">
        <div style="margin-bottom: var(--space-4);">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                Climatic Framework
            </div>
            <h2 id="heading-seasons" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                Four Himalayan Seasons
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0; max-width: 780px;">
                Season wording represents an illustrative organizational label based on historical regional trends, not current weather guidance or operational promises.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
            @foreach($seasons as $season)
                @php
                    $seasonName = $season['name'] ?? $season['title'] ?? 'Season';
                    $seasonMonths = $season['months'] ?? $season['subtitle'] ?? ($season['tag'] ?? '');
                @endphp
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-2);">
                        <strong class="website-body" style="color: var(--color-primary-dark);">{{ $seasonName }}</strong>
                        @if(!empty($seasonMonths))
                            <span class="website-badge website-badge--neutral" style="font-size: 0.72rem; border-radius: 0 !important;">{{ $seasonMonths }}</span>
                        @endif
                    </div>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5;">
                        {{ $season['summary'] ?? '' }}
                    </p>
                    @if(!empty($season['trail_flow']))
                        <div style="padding-top: var(--space-2); border-top: 1px solid var(--color-border-light);">
                            <span class="website-micro website-text-muted" style="display: block;">
                                <strong>Trail flow:</strong> {{ $season['trail_flow'] }}
                            </span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <!-- 4. Twelve-Month Selector / Grid -->
    <div id="when-to-go-grid-container">
        @include('website_preview.pages.months.partials.grid')
    </div>

    <!-- 5, 6, 7. Dynamic Selected Month Content Container -->
    <div id="selected-month-content" style="transition: opacity 0.2s ease-in-out;">
        @include('website_preview.pages.months.partials.selected_content')
    </div>

    <!-- 8. Educational Guide Callout -->
    @if($article)
        <section aria-labelledby="heading-guide-article">
            <div class="website-card" style="padding: var(--space-6); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: var(--space-3);">
                    <div style="max-width: 720px;">
                        <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); border-radius: 0 !important;">Planning Guide</span>
                        <h3 id="heading-guide-article" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                            {{ $article['title'] }}
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5;">
                            {{ $article['summary'] ?? 'Practical considerations for balancing trail clarity, temperatures, and crowds across Himalayan travel windows.' }}
                        </p>
                    </div>
                    <a href="{{ route('website.articles.show', ['slug' => $article['slug']]) }}" class="website-btn website-btn--outline" style="font-size: 0.875rem; border-radius: 0 !important;">
                        Read Full Guide &rarr;
                    </a>
                </div>
            </div>
        </section>
    @endif
</div>
@endsection

@push('scripts')
<script>
(function() {
    const gridContainer = document.getElementById('when-to-go-grid-container');
    const contentContainer = document.getElementById('selected-month-content');

    if (!gridContainer || !contentContainer) return;

    let currentAbortController = null;

    function fetchMonthData(url, pushToHistory = true) {
        if (currentAbortController) {
            currentAbortController.abort();
        }
        currentAbortController = new AbortController();

        // Visual loading state
        contentContainer.style.opacity = '0.45';
        contentContainer.style.pointerEvents = 'none';

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            signal: currentAbortController.signal
        })
        .then(function(response) {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(function(data) {
            if (data.grid_html) {
                gridContainer.innerHTML = data.grid_html;
            }
            if (data.content_html) {
                contentContainer.innerHTML = data.content_html;
            }
            if (data.title) {
                document.title = data.title;
            }

            if (pushToHistory) {
                window.history.pushState({ whenToGoUrl: url }, '', url);
            }

            // Reconcile compare toggle buttons if compare system exists
            if (window.websiteCompare && typeof window.websiteCompare.reconcile === 'function') {
                window.websiteCompare.reconcile();
            }

            contentContainer.style.opacity = '1';
            contentContainer.style.pointerEvents = 'auto';

            if (pushToHistory) {
                scrollToBelowSection();
            }
        })
        .catch(function(err) {
            if (err.name === 'AbortError') return;
            console.error('AJAX month load error:', err);
            // Graceful fallback to regular navigation
            window.location.href = url;
        });
    }

    function scrollToBelowSection() {
        const panel = document.getElementById('selected-month-panel') || document.getElementById('selected-month-content');
        if (panel) {
            const headerOffset = 90;
            const panelTop = panel.getBoundingClientRect().top + window.pageYOffset;
            window.scrollTo({
                top: Math.max(0, panelTop - headerOffset),
                behavior: 'smooth'
            });
        }
    }

    // Intercept clicks on month tiles, reset links, and internal month links
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a.website-month-tile, a.when-to-go-reset-link, a.when-to-go-month-link');
        if (!link) return;

        // Skip modified clicks (new tab, etc.)
        if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey || link.target === '_blank') {
            return;
        }

        const href = link.getAttribute('href');
        if (!href) return;

        try {
            const urlObj = new URL(href, window.location.origin);
            const pathClean = urlObj.pathname.replace(/\/+$/, '');
            const pathParts = pathClean.split('/');
            const lastPart = pathParts[pathParts.length - 1];

            // Only intercept /when-to-go index queries, not /when-to-go/october show detail pages
            if (lastPart === 'when-to-go') {
                e.preventDefault();

                // Optimistically mark tile as selected in grid
                if (link.classList.contains('website-month-tile')) {
                    gridContainer.querySelectorAll('.website-month-tile').forEach(function(tile) {
                        tile.classList.remove('website-month-tile--selected');
                        tile.setAttribute('aria-current', 'false');
                        const badge = tile.querySelector('.website-badge--primary');
                        if (badge) badge.remove();
                    });
                    link.classList.add('website-month-tile--selected');
                    link.setAttribute('aria-current', 'true');
                }

                // Immediately glide smoothly to the below section
                scrollToBelowSection();

                fetchMonthData(href, true);
            }
        } catch (ex) {
            // Ignore URL parse error and let browser handle standard link
        }
    });

    // Browser back / forward button handling
    window.addEventListener('popstate', function() {
        fetchMonthData(window.location.href, false);
    });
})();
</script>
@endpush


