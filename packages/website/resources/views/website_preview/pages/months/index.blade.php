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

    <!-- 3. Twelve-Month Selector / Grid -->
    <section aria-labelledby="heading-month-grid" style="margin-bottom: var(--space-10);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-2);">
            <div>
                <h2 id="heading-month-grid" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                    Select a Travel Month
                </h2>
                <p class="website-small website-text-secondary" style="margin: 0;">
                    Choose a month to inspect mountain conditions and matching catalog journeys.
                </p>
            </div>
            @if(!$isDefault)
                <a href="{{ route('website.months.index') }}" class="website-small text-primary" style="text-decoration: underline;">
                    &larr; Reset to Default (September)
                </a>
            @endif
        </div>

        <div class="website-when-to-go-grid" role="navigation" aria-label="Calendar Months">
            @foreach($months as $m)
                @php
                    $isSelected = ($m['id'] === $selectedMonth['id']);
                @endphp
                <a href="{{ route('website.months.index', ['month' => $m['slug']]) }}"
                   class="website-month-tile {{ $isSelected ? 'website-month-tile--selected' : '' }}"
                   style="border-radius: 0 !important; box-shadow: none !important;"
                   aria-current="{{ $isSelected ? 'true' : 'false' }}">
                    <div class="website-month-tile__header">
                        <span class="website-month-tile__name">{{ $m['name'] }}</span>
                        @if($isSelected)
                            <span class="website-badge website-badge--primary" style="font-size: 0.7rem; padding: 2px 6px; border-radius: 0 !important;">
                                {{ $isDefault && $m['id'] === 9 ? 'Default' : 'Selected' }}
                            </span>
                        @endif
                    </div>

                    <div style="margin-bottom: var(--space-2);">
                        <span class="website-micro website-text-muted" style="text-transform: uppercase; font-weight: 600; letter-spacing: 0.05em; background: transparent !important; border: none !important; padding: 0 !important;">
                            {{ $m['season'] }}
                        </span>
                    </div>

                    <div class="website-month-tile__meta">
                        <span class="website-small {{ $m['trek_count'] > 0 ? 'website-text-secondary' : 'website-text-muted' }}">
                            {{ $m['trek_count'] }} {{ $m['trek_count'] === 1 ? 'Trek' : 'Treks' }}
                        </span>
                        <span class="website-micro text-primary" style="font-weight: 600;">
                            Select &rarr;
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- 4. Four Labeled Sample Season Groups -->
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

    <!-- 5. Selected Month Overview Panel -->
    <section id="selected-month-panel" aria-labelledby="heading-selected-month" style="margin-bottom: var(--space-10);">
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: var(--space-3); margin-bottom: var(--space-4);">
                <div>
                    <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-1);">
                        <span class="website-badge website-badge--primary" style="border-radius: 0 !important;">{{ $selectedMonth['season'] }} Window</span>
                        @if($isDefault && $selectedMonth['id'] === 9)
                            <span class="website-badge website-badge--neutral" style="border-radius: 0 !important;">Sample Default</span>
                        @endif
                    </div>
                    <h2 id="heading-selected-month" class="website-h2" style="margin: 0;">
                        Trekking in {{ $selectedMonth['name'] }}
                    </h2>
                </div>

                <!-- Link to dedicated Month Detail Page -->
                <a href="{{ route('website.months.show', ['month' => $selectedMonth['slug']]) }}"
                   class="website-btn website-btn--outline"
                   style="font-size: 0.875rem; border-radius: 0 !important;">
                    Full {{ $selectedMonth['name'] }} Guide &rarr;
                </a>
            </div>

            <!-- Narrative Overview -->
            <p class="website-body" style="line-height: 1.6; margin-bottom: var(--space-4); max-width: 860px;">
                {{ $currentEditorial['overview'] }}
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-3); margin-bottom: var(--space-2);">
                <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important;">
                    <strong class="website-micro" style="text-transform: uppercase; color: var(--color-text-muted); display: block; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                        Trail Atmosphere &amp; Crowds
                    </strong>
                    <span class="website-small" style="line-height: 1.4; display: block;">
                        {{ $currentEditorial['trail_vibe'] }}
                    </span>
                </div>

                <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important;">
                    <strong class="website-micro" style="text-transform: uppercase; color: var(--color-text-muted); display: block; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                        Seasonal Gear Note
                    </strong>
                    <span class="website-small" style="line-height: 1.4; display: block;">
                        {{ $currentEditorial['pack_tip'] }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Relevant Sample Trek Results -->
    <section aria-labelledby="heading-matching-treks" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-3);">
            <div>
                <div style="color: var(--color-accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                    Catalog Routes
                </div>
                <h2 id="heading-matching-treks" class="website-h2" style="margin: 0;">
                    Sample Itineraries for {{ $selectedMonth['name'] }} ({{ count($matchingTreks) }})
                </h2>
                <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                    Treks tagged with {{ $selectedMonth['name'] }} suitability in the fixture catalog.
                </p>
            </div>

            @if(count($matchingTreks) > 0)
                <a href="{{ route('website.treks.index', ['month' => $selectedMonth['id']]) }}" class="website-btn website-btn--outline" style="font-size: 0.875rem; border-radius: 0 !important;">
                    View All {{ $selectedMonth['name'] }} Treks in Search &rarr;
                </a>
            @endif
        </div>

        @if(count($matchingTreks) > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: var(--space-6);">
                @foreach($matchingTreks as $trek)
                    @include('website_preview.components.trek-card', ['trek' => $trek])
                @endforeach
            </div>
        @else
            <!-- Honest Empty State for 0-match months (e.g. Winter January/February/December) -->
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-surface); border: 1px dashed var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                <div style="max-width: 540px; margin: 0 auto;">
                    <div style="font-size: 2.25rem; margin-bottom: var(--space-2);">❄️</div>
                    <h3 class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        No Catalog Itineraries for {{ $selectedMonth['name'] }}
                    </h3>
                    <p class="website-body website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-5);">
                        Our sample catalog does not schedule standard group departures in {{ $selectedMonth['name'] }}. High-altitude passes often experience heavy snow or closed high-camps during mid-winter. However, custom lower-elevation foothill itineraries and valley walks can be planned on request.
                    </p>
                    <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                        <a href="{{ route('website.planner.start') }}?mode=custom&source=month" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                            Request Custom Winter Trek
                        </a>
                        <a href="{{ route('website.months.index', ['month' => 'october']) }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                            View Peak Season (October)
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <!-- 7. Dynamic CTA Banner Carrying Selected Month -->
    <section aria-labelledby="heading-plan-month-cta" style="margin-bottom: var(--space-10);">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 1px solid var(--color-primary); border-radius: 0 !important; box-shadow: none !important; text-align: center;">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
                {{ $page?->cta_title ? 'Custom Journey Planning' : 'Custom Journey Planning' }}
            </div>
            <h2 id="heading-plan-month-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                {{ $page?->cta_title ?: ('Plan a ' . $selectedMonth['name'] . ' Himalayan Trek') }}
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 680px; margin: 0 auto var(--space-6) auto; line-height: 1.6;">
                {{ $page?->cta_description ?: ('Launch our interactive trek planner with ' . $selectedMonth['name'] . ' pre-selected as your target window. Customize your preferred duration, party size, and difficulty comfort to explore matching itineraries.') }}
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ $page?->cta_primary_btn_url ?: (route('website.planner.start') . '?mode=discover&month=' . $selectedMonth['id'] . '&source=month') }}" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                    {{ $page?->cta_primary_btn_text ?: ('Plan ' . $selectedMonth['name'] . ' Trek →') }}
                </a>
                <a href="{{ route('website.months.index') }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                    Reset Selection
                </a>
            </div>
        </div>
    </section>

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

