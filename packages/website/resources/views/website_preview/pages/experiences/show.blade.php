@extends('website_preview.layout.master')

@section('title', $exp['name'] . ' · Himalayan Trekking Experiences · EATH Website')
@section('meta_description', 'Explore sample Himalayan trekking journeys centered around ' . $exp['name'] . '. Compare matching routes, seasonal windows, and regional highlights.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- Hero with H1 and Relevant Image -->
    @php
        $heroImage = $exp['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("experience-{$exp['slug']}", $exp['name']);
    @endphp
    <header class="website-card" style="padding: 0; overflow: hidden; position: relative; margin-bottom: var(--space-8); border: 1px solid var(--color-border); border-radius: 0 !important; min-height: 300px; display: flex; flex-direction: column; justify-content: flex-end;">
        <img src="{{ $heroImage['url'] }}" 
             alt="{{ $heroImage['alt'] ?? ($exp['name'] . ' Experience') }}" 
             width="{{ $heroImage['width'] ?? 1600 }}" 
             height="{{ $heroImage['height'] ?? 900 }}" 
             loading="eager" 
             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">

        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(12, 74, 110, 0.95) 0%, rgba(15, 23, 42, 0.55) 50%, rgba(15, 23, 42, 0.2) 100%); z-index: 1;"></div>

        <div style="position: relative; z-index: 2; padding: var(--space-6) var(--space-8); color: #ffffff; max-width: 860px;">
            <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
                <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.22); color: #ffffff; border-color: rgba(255, 255, 255, 0.35);">
                    Travel Theme Profile
                </span>
                <span class="website-micro" style="color: rgba(255, 255, 255, 0.85);">
                    {{ count($matchingTreks) }} Matching {{ \Illuminate\Support\Str::plural('Itinerary', count($matchingTreks)) }}
                </span>
            </div>

            <h1 class="website-h1" style="color: #ffffff; margin: 0 0 var(--space-3) 0;">
                {{ $exp['name'] }}
            </h1>

            <p class="website-body" style="color: rgba(255, 255, 255, 0.92); margin: 0; line-height: 1.6; font-size: 1.125rem;">
                {{ $exp['intro'] }}
            </p>
        </div>
    </header>

    <!-- 3. What this Experience Emphasizes (Editorial Content) -->
    <section aria-labelledby="heading-emphasis" style="margin-bottom: var(--space-10); max-width: 820px;">
        <h2 id="heading-emphasis" class="website-h2" style="margin-bottom: var(--space-3);">
            What This Experience Emphasizes
        </h2>

        <div class="website-notice website-notice--info" style="margin-bottom: var(--space-5); padding: var(--space-3) var(--space-4);">
            <span class="website-micro" style="display: block; line-height: 1.4;">
                <strong>Sample Theme Notice:</strong> Experience categorizations indicate route characteristics and pacing preferences from catalog fixtures. They do not constitute safety guarantees, medical recommendations, or seasonal operational forecasts.
            </span>
        </div>

        <div style="color: var(--color-text-secondary); line-height: 1.7; font-size: 1rem;">
            <p style="margin-bottom: var(--space-4);">
                {{ $editorialContent['emphasis'] }}
            </p>
            <p style="margin: 0;">
                Choosing an itinerary centered on <strong>{{ $exp['name'] }}</strong> ensures that your daily trail rhythm and rest stops align with your personal travel priorities.
            </p>
        </div>
    </section>

    <!-- 4. Preference Cues: Why Someone Might Enjoy It -->
    <section aria-labelledby="heading-preference-cues" style="margin-bottom: var(--space-10);">
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border);">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-1);">Preference Cues</span>
            <h2 id="heading-preference-cues" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                Why Travelers Choose This Theme
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; max-width: 720px; line-height: 1.5;">
                {{ $editorialContent['cues'] }}
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
                @foreach($editorialContent['highlights'] as $highlight)
                    <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
                        <strong class="website-small" style="display: block; color: var(--color-primary-dark); margin-bottom: var(--space-1);">
                            ✓ {{ $highlight['title'] }}
                        </strong>
                        <span class="website-micro website-text-secondary" style="line-height: 1.4; display: block;">
                            {{ $highlight['description'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. Matching Trek Cards -->
    <section id="matching-treks" aria-labelledby="heading-matching-treks" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-3);">
            <div>
                <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Curated Journeys</span>
                <h2 id="heading-matching-treks" class="website-h2" style="margin: 0;">
                    Matching Itineraries for {{ $exp['name'] }}
                </h2>
                <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                    Showing {{ count($matchingTreks) }} catalog {{ \Illuminate\Support\Str::plural('route', count($matchingTreks)) }} tagged with this experience theme.
                </p>
            </div>

            <a href="{{ route('website.treks.index') }}?experience={{ $exp['slug'] }}" class="website-link" style="color: var(--color-primary); font-weight: 600; font-size: var(--type-small);">
                View in full catalog &rarr;
            </a>
        </div>

        @if(count($matchingTreks) > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-6);">
                @foreach($matchingTreks as $trek)
                    @include('website_preview.components.trek-card', ['trek' => $trek])
                @endforeach
            </div>
        @else
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-background-warm); border: 1px dashed var(--color-border);">
                <h3 class="website-h3" style="margin-bottom: var(--space-2);">No Matching Itineraries Found</h3>
                <p class="website-small website-text-secondary" style="margin-bottom: var(--space-4);">
                    No sample catalog routes are currently tagged with this theme. You can configure a customized private route through our planner.
                </p>
                <a href="{{ route('website.planner.start') }}?mode=custom&experience={{ $exp['slug'] }}&source=experience" class="website-btn website-btn--primary">
                    Plan Custom Journey &rarr;
                </a>
            </div>
        @endif
    </section>

    <!-- 6. Associated Regions & Sample Months -->
    <section aria-labelledby="heading-associated-contexts" style="margin-bottom: var(--space-10);">
        <div class="website-card" style="padding: var(--space-6); border: 1px solid var(--color-border);">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-6);">
                <!-- Associated Regions -->
                <div>
                    <strong class="website-small website-text-muted" style="display: block; text-transform: uppercase; margin-bottom: var(--space-2);">
                        Associated Mountain Regions
                    </strong>
                    <div style="display: flex; flex-wrap: wrap; gap: var(--space-2);">
                        @foreach($associatedRegions as $reg)
                            <a href="{{ route('website.destinations.show', $reg['slug']) }}" class="website-badge website-badge--neutral" style="text-decoration: none; padding: var(--space-2) var(--space-3); font-size: var(--type-small);">
                                {{ $reg['name'] }} Region &rarr;
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Sample Months Aggregate -->
                <div>
                    <strong class="website-small website-text-muted" style="display: block; text-transform: uppercase; margin-bottom: var(--space-2);">
                        Sample Operating Window
                    </strong>
                    <p class="website-micro website-text-secondary" style="margin: 0 0 var(--space-2) 0;">
                        Aggregated from matching route fixtures. Individual passes may vary by season.
                    </p>
                    <div style="display: flex; flex-wrap: wrap; gap: var(--space-2);">
                        @foreach($associatedMonths as $m)
                            <a href="{{ route('website.months.show', $m['slug']) }}" class="website-badge website-badge--accent" style="text-decoration: none; padding: var(--space-1) var(--space-2); font-size: var(--type-micro);">
                                {{ $m['name'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Preparation Considerations -->
    <section aria-labelledby="heading-prep-questions" style="margin-bottom: var(--space-10);">
        <h2 id="heading-prep-questions" class="website-h3" style="margin-bottom: var(--space-3);">
            Preparation Questions for {{ $exp['name'] }}
        </h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
            @foreach($editorialContent['prepQuestions'] as $question)
                <div class="website-card" style="padding: var(--space-4); border: 1px solid var(--color-border);">
                    <strong style="color: var(--color-primary-dark); font-size: var(--type-small); display: block; margin-bottom: var(--space-1);">
                        {{ $question['title'] }}
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                        {{ $question['body'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 8. Related Sample Articles -->
    @if(!empty($matchedArticles))
        <section aria-labelledby="heading-exp-articles" style="margin-bottom: var(--space-10);">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-2);">
                <div>
                    <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Editorial Context</span>
                    <h2 id="heading-exp-articles" class="website-h3" style="margin: 0;">
                        Related Articles &amp; Advice
                    </h2>
                </div>
                <a href="{{ route('website.articles.index') }}" class="website-micro text-primary text-decoration-underline">
                    Browse all guides &rarr;
                </a>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-5);">
                @foreach($matchedArticles as $art)
                    @include('website_preview.components.article-card', ['article' => $art])
                @endforeach
            </div>
        </section>
    @endif

    <!-- 9. Experience FAQs -->
    <section aria-labelledby="heading-exp-faqs" style="margin-bottom: var(--space-12);">
        <div style="margin-bottom: var(--space-5);">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-1);">Common Inquiries</span>
            <h2 id="heading-exp-faqs" class="website-h3" style="margin: 0;">
                Frequently Asked Questions
            </h2>
        </div>

        @include('website_preview.components.accordion', ['items' => $editorialContent['faqs']])
    </section>

    <!-- 10. Plan This Experience CTA -->
    <section aria-labelledby="heading-plan-exp-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 2px solid var(--color-primary-light); text-align: center;">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-2); text-transform: uppercase;">
                Personalized Trip Builder
            </span>
            <h2 id="heading-plan-exp-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                Plan a {{ $exp['name'] }} Journey
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 680px; margin: 0 auto var(--space-6) auto; line-height: 1.6;">
                Launch our interactive trek planner with the {{ $exp['name'] }} theme pre-selected. Specify your travel duration, difficulty comfort, and party size to discover matching routes.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}?mode=discover&experience={{ $exp['slug'] }}&source=experience" class="website-btn website-btn--primary">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                    <span>Plan My Journey &rarr;</span>
                </a>
                <a href="{{ route('website.compare') }}" class="website-btn website-btn--outline">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="18"></rect>
                        <rect x="14" y="3" width="7" height="18"></rect>
                    </svg>
                    <span>Compare Shortlisted Routes</span>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
