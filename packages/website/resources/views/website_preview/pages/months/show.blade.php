@extends('website_preview.layout.master')

@section('title', $title ?? ('Planning a Trek in ' . $month['name'] . ' · EATH Website'))

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- Header & Hero Image -->
    <header style="margin-bottom: var(--space-8);">
        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2); flex-wrap: wrap;">
            <span class="website-badge website-badge--primary" style="border-radius: 0 !important;">{{ $month['season'] }} Window</span>
            <span class="website-badge website-badge--neutral" style="border-radius: 0 !important;">Month {{ $month['id'] }} of 12</span>
            <span class="website-badge website-badge--neutral" style="border-radius: 0 !important;">{{ count($matchingTreks) }} Sample {{ count($matchingTreks) === 1 ? 'Route' : 'Routes' }}</span>
        </div>

        <h1 class="website-h1" style="margin: 0 0 var(--space-3) 0;">
            Planning a Trek in {{ $month['name'] }}
        </h1>

        <!-- 3. Seasonality Summary and Disclaimer -->
        <div class="website-notice website-notice--info" style="margin-bottom: var(--space-5); padding: var(--space-3) var(--space-4); border-radius: 0 !important; border: 1px solid var(--color-border); box-shadow: none !important;">
            <span class="website-micro" style="display: block; line-height: 1.5;">
                <strong>Sample Seasonality Notice:</strong> Monthly suitability profiles reflect catalog fixtures and historical climatic patterns. This is not a live weather forecast, trail opening guarantee, or operational commitment. Independent verification with qualified operators is essential prior to actual travel.
            </span>
        </div>

        <p class="website-body website-text-secondary" style="font-size: 1.125rem; line-height: 1.7; max-width: 840px; margin: 0 0 var(--space-6) 0;">
            {{ $currentData['summary'] }}
        </p>

        @if($heroImage)
            <div style="border-radius: 0 !important; overflow: hidden; max-height: 380px; margin-bottom: var(--space-8); border: 1px solid var(--color-border); background: var(--color-surface); box-shadow: none !important;">
                <img src="{{ $heroImage['url'] }}"
                     alt="{{ $heroImage['alt'] }}"
                     style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 0 !important;"
                     loading="eager" />
            </div>
        @endif
    </header>

    <!-- 4. Reasons to Explore This Month -->
    @if(!empty($currentData['reasons']))
        <section aria-labelledby="heading-reasons" style="margin-bottom: var(--space-10);">
            <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                <div style="color: var(--color-accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                    Trail Highlights
                </div>
                <h2 id="heading-reasons" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Reasons to Consider {{ $month['name'] }}
                </h2>
                <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; max-width: 760px;">
                    Key environmental and cultural advantages associated with trekking during this calendar window.
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
                    @foreach($currentData['reasons'] as $reason)
                        <div style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                            <strong class="website-body" style="display: block; color: var(--color-primary-dark); margin-bottom: var(--space-1);">
                                ✓ {{ $reason['title'] }}
                            </strong>
                            <span class="website-small website-text-secondary" style="line-height: 1.5; display: block;">
                                {{ $reason['description'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- 5. Questions / Limitations to Verify -->
    @if(!empty($currentData['limitations']))
        <section aria-labelledby="heading-limitations" style="margin-bottom: var(--space-10); max-width: 840px;">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                Field Advisory
            </div>
            <h2 id="heading-limitations" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                Questions &amp; Limitations to Confirm
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.5;">
                Because weather conditions vary significantly year-to-year, consider discussing these practical logistical questions with your trek operator rather than assuming uniform trail conditions.
            </p>

            <div style="display: flex; flex-direction: column; gap: var(--space-3);">
                @foreach($currentData['limitations'] as $question)
                    <div style="display: flex; gap: var(--space-3); align-items: flex-start; padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                        <span style="color: var(--color-primary); font-weight: 700; font-size: 1.1rem; line-height: 1.2;">?</span>
                        <span class="website-small" style="line-height: 1.5; color: var(--color-text);">
                            {{ $question }}
                        </span>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 6. Matching Destinations (Shown only when destinations contain a matching sample trek) -->
    @if(count($matchingDestinations) > 0)
        <section aria-labelledby="heading-matching-destinations" style="margin-bottom: var(--space-10);">
            <div style="margin-bottom: var(--space-4);">
                <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                    Active Regions
                </div>
                <h2 id="heading-matching-destinations" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                    Trekking Regions Suitable for {{ $month['name'] }}
                </h2>
                <p class="website-small website-text-secondary" style="margin: 0;">
                    Destinations in our sample catalog featuring at least one itinerary with {{ $month['name'] }} suitability.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: var(--space-4);">
                @foreach($matchingDestinations as $dest)
                    <a href="{{ route('website.destinations.show', ['slug' => $dest['slug']]) }}"
                       class="website-card"
                       style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; text-decoration: none; color: inherit; display: block; transition: border-color var(--transition-fast);">
                        <strong class="website-body" style="color: var(--color-primary-dark); display: block; margin-bottom: var(--space-1);">
                            {{ $dest['name'] }} &rarr;
                        </strong>
                        <span class="website-micro website-text-secondary" style="display: block; line-height: 1.4;">
                            {{ Str::limit($dest['summary'] ?? $dest['intro'] ?? '', 90) }}
                        </span>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 7. Matching Trek Cards -->
    <section id="matching-treks" aria-labelledby="heading-matching-treks" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-3);">
            <div>
                <div style="color: var(--color-accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                    Sample Catalog
                </div>
                <h2 id="heading-matching-treks" class="website-h2" style="margin: 0;">
                    Sample Itineraries for {{ $month['name'] }} ({{ count($matchingTreks) }})
                </h2>
                <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                    Itineraries tagged for {{ $month['name'] }} in the catalog database.
                </p>
            </div>

            @if(count($matchingTreks) > 0)
                <a href="{{ route('website.treks.index', ['month' => $month['id']]) }}" class="website-btn website-btn--outline" style="font-size: 0.875rem; border-radius: 0 !important;">
                    View in Search &rarr;
                </a>
            @endif
        </div>

        @if(count($matchingTreks) > 0)
            <!-- 3 -> 2 -> 1 Trek Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: var(--space-6);">
                @foreach($matchingTreks as $trek)
                    @include('website_preview.components.trek-card', ['trek' => $trek])
                @endforeach
            </div>
        @else
            <!-- Honest Empty State for 0-match months -->
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-surface); border: 1px dashed var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                <div style="max-width: 560px; margin: 0 auto;">
                    <div style="font-size: 2.25rem; margin-bottom: var(--space-2);">❄️</div>
                    <h3 class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        No Catalog Itineraries Tagged for {{ $month['name'] }}
                    </h3>
                    <p class="website-body website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-5);">
                        Our sample database does not schedule standard group departures during {{ $month['name'] }} due to typical seasonal conditions or high pass snow. For customized lower-elevation routes, valley walks, or alternative dates, explore custom trip planning or choose another month.
                    </p>
                    <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                        <a href="{{ route('website.planner.start') }}?mode=custom&source=month" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                            Create Custom Request
                        </a>
                        <a href="{{ route('website.months.index') }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                            Browse All 12 Months
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <!-- 8. Relevant Packing & Preparation Articles -->
    @if(count($prepArticles) > 0)
        <section aria-labelledby="heading-prep-articles" style="margin-bottom: var(--space-10);">
            <div style="margin-bottom: var(--space-4);">
                <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                    Planning Guides
                </div>
                <h2 id="heading-prep-articles" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                    Preparation &amp; Packing Reading
                </h2>
                <p class="website-small website-text-secondary" style="margin: 0;">
                    Sample editorial guides providing context for planning your trekking dates and mountain gear.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
                @foreach($prepArticles as $article)
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; display: flex; flex-direction: column;">
                        <span class="website-micro website-badge website-badge--neutral" style="align-self: flex-start; margin-bottom: var(--space-2); border-radius: 0 !important;">Sample Article</span>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0;">
                            {{ $article['title'] }}
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.5; flex-grow: 1;">
                            {{ $article['summary'] ?? 'Practical advice for your Himalayan trekking journey.' }}
                        </p>
                        <a href="{{ route('website.articles.show', ['slug' => $article['slug']]) }}" class="website-small text-primary" style="font-weight: 600; text-decoration: underline;">
                            Read Guide &rarr;
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 9. Month FAQs -->
    @if(!empty($currentData['faqs']))
        <section aria-labelledby="heading-month-faqs" style="margin-bottom: var(--space-12);">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                Frequently Asked Questions
            </div>
            <h2 id="heading-month-faqs" class="website-h3" style="margin: 0 0 var(--space-4) 0;">
                Questions about {{ $month['name'] }} Trekking
            </h2>

            <div style="display: flex; flex-direction: column; gap: var(--space-3); max-width: 840px;">
                @foreach($currentData['faqs'] as $faq)
                    <details class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; cursor: pointer;">
                        <summary class="website-body" style="font-weight: 600; color: var(--color-primary-dark); outline: none;">
                            {{ $faq['question'] }}
                        </summary>
                        <p class="website-small website-text-secondary" style="margin: var(--space-3) 0 0 0; line-height: 1.6; cursor: default;">
                            {{ $faq['answer'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 10. Plan This Month CTA -->
    <section aria-labelledby="heading-plan-cta" style="margin-bottom: var(--space-12);">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 1px solid var(--color-primary); border-radius: 0 !important; box-shadow: none !important; text-align: center;">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
                Custom Journey Planning
            </div>
            <h2 id="heading-plan-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                Plan a {{ $month['name'] }} Journey
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 660px; margin: 0 auto var(--space-6) auto; line-height: 1.6;">
                Launch our interactive trek planner with {{ $month['name'] }} pre-selected. Customize party size, duration, and route preferences to view tailored recommendations.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}?mode=discover&month={{ $month['id'] }}&source=month" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                    Plan {{ $month['name'] }} Trek &rarr;
                </a>
                @if(count($matchingTreks) > 0)
                    <a href="{{ route('website.treks.index', ['month' => $month['id']]) }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                        View All {{ $month['name'] }} Treks
                    </a>
                @endif
                <a href="{{ route('website.months.index') }}" class="website-btn website-btn--ghost" style="border-radius: 0 !important;">
                    All Months Overview
                </a>
            </div>
        </div>
    </section>

    <!-- 11. Previous / Next Month Navigation (Wrapping safely December/January) -->
    <nav aria-label="Month Navigation" style="padding-top: var(--space-6); border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3);">
        <a href="{{ route('website.months.show', ['month' => $prevMonth['slug']]) }}"
           class="website-btn website-btn--outline"
           style="font-size: 0.875rem; border-radius: 0 !important;">
            &larr; {{ $prevMonth['name'] }} ({{ $prevMonth['season'] }})
        </a>

        <a href="{{ route('website.months.index') }}" class="website-small text-primary" style="font-weight: 600; text-decoration: underline;">
            All 12 Months Overview
        </a>

        <a href="{{ route('website.months.show', ['month' => $nextMonth['slug']]) }}"
           class="website-btn website-btn--outline"
           style="font-size: 0.875rem; border-radius: 0 !important;">
            {{ $nextMonth['name'] }} ({{ $nextMonth['season'] }}) &rarr;
        </a>
    </nav>

</div>
@endsection
