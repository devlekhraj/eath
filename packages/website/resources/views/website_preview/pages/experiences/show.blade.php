@extends('website_preview.layout.master')

@section('title', (!empty($exp['meta_title']) ? $exp['meta_title'] : $exp['name'] . ' · Himalayan Trekking Experiences') . ' · EATH Website')
@section('meta_description', !empty($exp['meta_description']) ? $exp['meta_description'] : 'Explore sample Himalayan trekking journeys centered around ' . $exp['name'] . '. Compare matching routes, seasonal windows, and regional highlights.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- Hero with H1 and Relevant Image -->
    @php
        $heroImage = $exp['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("experience-{$exp['slug']}", $exp['name']);
    @endphp
    <header class="website-card" style="padding: 0; overflow: hidden; position: relative; margin-bottom: var(--space-8); border: 1px solid var(--color-border); border-radius: 0 !important; min-height: 320px; display: flex; flex-direction: column; justify-content: flex-end;">
        <img src="{{ $heroImage['url'] }}" 
             alt="{{ $heroImage['alt'] ?? ($exp['name'] . ' Experience') }}" 
             width="{{ $heroImage['width'] ?? 1600 }}" 
             height="{{ $heroImage['height'] ?? 900 }}" 
             loading="eager" 
             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; border-radius: 0 !important;">

        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(12, 74, 110, 0.95) 0%, rgba(15, 23, 42, 0.6) 50%, rgba(15, 23, 42, 0.25) 100%); z-index: 1;"></div>

        <div style="position: relative; z-index: 2; padding: var(--space-6) var(--space-8); color: #ffffff; max-width: 860px;">
            <div style="display: flex; gap: var(--space-3); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
                <span style="background: transparent !important; border: none !important; padding: 0 !important; color: #2FB8FF; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8125rem;">
                    Travel Theme Profile
                </span>
                <span style="color: rgba(255, 255, 255, 0.6); font-size: 0.8125rem;">·</span>
                <span class="website-micro" style="color: rgba(255, 255, 255, 0.9);">
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
    <section aria-labelledby="heading-emphasis" style="margin-bottom: var(--space-10); max-width: 840px;">
        <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-1); font-size: 0.8125rem;">
            Signature Focus
        </span>
        <h2 id="heading-emphasis" class="website-h2" style="margin-bottom: var(--space-3);">
            What This Experience Emphasizes
        </h2>

        <div class="website-notice website-notice--info" style="margin-bottom: var(--space-5); padding: var(--space-3) var(--space-4); border-radius: 0 !important;">
            <span class="website-micro" style="display: block; line-height: 1.4;">
                <strong>Sample Theme Notice:</strong> Experience categorizations indicate route characteristics and pacing preferences from catalog fixtures. They do not constitute safety guarantees, medical recommendations, or seasonal operational forecasts.
            </span>
        </div>

        <div style="color: var(--color-text-secondary); line-height: 1.7; font-size: 1rem;">
            <p style="margin-bottom: var(--space-4);">
                {{ $editorialContent['emphasis'] }}
            </p>
            @if(!empty($exp['description']) && $exp['description'] !== $editorialContent['emphasis'])
                <div style="margin-bottom: var(--space-4);">
                    {!! $exp['description'] !!}
                </div>
            @endif
            <p style="margin: 0;">
                Choosing an itinerary centered on <strong>{{ $exp['name'] }}</strong> ensures that your daily trail rhythm and rest stops align with your personal travel priorities.
            </p>
        </div>
    </section>

    <!-- 4. Preference Cues: Why Someone Might Enjoy It -->
    <section aria-labelledby="heading-preference-cues" style="margin-bottom: var(--space-10);">
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important;">
            <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-1); font-size: 0.8125rem;">
                Preference Cues
            </span>
            <h2 id="heading-preference-cues" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                Why Travelers Choose This Theme
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; max-width: 760px; line-height: 1.5;">
                {{ $editorialContent['cues'] }}
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
                @foreach($editorialContent['highlights'] as $highlight)
                    <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important;">
                        <strong class="website-small" style="display: block; color: var(--color-primary); margin-bottom: var(--space-1);">
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

    <!-- Photo Gallery Showcase (if present) -->
    @if(!empty($exp['gallery']))
        <section aria-labelledby="heading-exp-gallery" style="margin-bottom: var(--space-12);">
            <div style="margin-bottom: var(--space-4);">
                <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-1); font-size: 0.8125rem;">
                    Visual Showcase
                </span>
                <h2 id="heading-exp-gallery" class="website-h2" style="margin: 0;">
                    Scenes from {{ $exp['name'] }}
                </h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-4);">
                @foreach($exp['gallery'] as $photo)
                    <div class="website-card" style="padding: 0; overflow: hidden; border: 1px solid var(--color-border); border-radius: 0 !important;">
                        <div style="position: relative; aspect-ratio: 16/10; overflow: hidden;">
                            <img src="{{ $photo['url'] }}" alt="{{ $photo['alt'] ?? $exp['name'] }}" loading="lazy" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0 !important;">
                        </div>
                        @if(!empty($photo['title']) || !empty($photo['caption']))
                            <div style="padding: var(--space-3); background: var(--color-surface);">
                                @if(!empty($photo['title']))
                                    <div class="website-small font-weight-medium" style="color: var(--color-text);">{{ $photo['title'] }}</div>
                                @endif
                                @if(!empty($photo['caption']))
                                    <div class="website-micro website-text-secondary" style="margin-top: var(--space-1);">{{ $photo['caption'] }}</div>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- 5. Matching Trek Cards -->
    <section id="matching-treks" aria-labelledby="heading-matching-treks" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-3);">
            <div>
                <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-1); font-size: 0.8125rem;">
                    Curated Journeys
                </span>
                <h2 id="heading-matching-treks" class="website-h2" style="margin: 0;">
                    Matching Itineraries for {{ $exp['name'] }}
                </h2>
                <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                    Showing {{ count($matchingTreks) }} catalog {{ \Illuminate\Support\Str::plural('route', count($matchingTreks)) }} tagged with this experience theme.
                </p>
            </div>
            @if(count($matchingTreks) > 0)
                <a href="#comparison-helper" class="website-micro text-primary text-decoration-underline">
                    View seasonal guide &darr;
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
            <div class="website-card" style="padding: var(--space-8); text-align: center; border-radius: 0 !important;">
                <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0;">
                    No catalog itineraries are currently tagged directly with this experience theme.
                </p>
                <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                    Explore All Available Treks
                </a>
            </div>
        @endif
    </section>

    <!-- 6. Seasonal Windows for this Experience -->
    @if(count($associatedMonths) > 0)
        <section id="comparison-helper" aria-labelledby="heading-seasonal-windows" style="margin-bottom: var(--space-10);">
            <div class="website-card" style="padding: var(--space-6); border: 1px solid var(--color-border); border-radius: 0 !important;">
                <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-1); font-size: 0.8125rem;">
                    Seasonal Windows
                </span>
                <h2 id="heading-seasonal-windows" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Best Timing Across Matching Routes
                </h2>
                <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; max-width: 720px; line-height: 1.5;">
                    The calendar months below represent the combined recommended trekking windows derived from the itineraries listed above.
                </p>

                <div style="display: flex; flex-wrap: wrap; gap: var(--space-2); margin-bottom: var(--space-4);">
                    @foreach($associatedMonths as $m)
                        <a href="{{ route('website.months.show', $m['slug']) }}" 
                           class="website-badge website-badge--neutral" 
                           style="padding: var(--space-2) var(--space-3); text-decoration: none; font-weight: 600; border: 1px solid var(--color-border); border-radius: 0 !important;">
                            {{ $m['name'] }}
                            <span class="website-micro website-text-muted" style="margin-left: var(--space-1);">({{ $m['season'] }})</span>
                        </a>
                    @endforeach
                </div>

                <span class="website-micro website-text-secondary" style="display: block; line-height: 1.4;">
                    * Weather windows vary by specific elevation and valley geography. Detailed monthly planning guides are linked above.
                </span>
            </div>
        </section>
    @endif

    <!-- 7. Preparation & Suitability Questions (Editorial Content) -->
    <section aria-labelledby="heading-prep-questions" style="margin-bottom: var(--space-10);">
        <div style="margin-bottom: var(--space-4);">
            <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-1); font-size: 0.8125rem;">
                Preparation Guidance
            </span>
            <h2 id="heading-prep-questions" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                Suitability &amp; Route Readiness
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                Key questions to consider before finalizing an itinerary focused on this travel theme.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
            @foreach($editorialContent['prepQuestions'] as $question)
                <div class="website-card" style="padding: var(--space-4) var(--space-5); border: 1px solid var(--color-border); border-radius: 0 !important;">
                    <h3 class="website-small" style="color: var(--color-text); margin: 0 0 var(--space-2) 0; font-weight: 600;">
                        {{ $question['title'] }}
                    </h3>
                    <p class="website-micro website-text-secondary" style="margin: 0; line-height: 1.5;">
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
                    <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-1); font-size: 0.8125rem;">
                        Editorial Context
                    </span>
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
            <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-1); font-size: 0.8125rem;">
                Common Inquiries
            </span>
            <h2 id="heading-exp-faqs" class="website-h3" style="margin: 0;">
                Frequently Asked Questions
            </h2>
        </div>

        @include('website_preview.components.accordion', ['items' => $editorialContent['faqs']])
    </section>

    <!-- 10. Plan This Experience CTA -->
    <section aria-labelledby="heading-plan-exp-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 1px solid var(--color-primary-light); text-align: center; border-radius: 0 !important;">
            <span style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: var(--space-2); font-size: 0.8125rem;">
                Personalized Trip Builder
            </span>
            <h2 id="heading-plan-exp-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                {{ !empty($exp['cta_title']) ? $exp['cta_title'] : "Plan a {$exp['name']} Journey" }}
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 680px; margin: 0 auto var(--space-6) auto; line-height: 1.6;">
                {{ !empty($exp['cta_description']) ? $exp['cta_description'] : "Launch our interactive trek planner with the {$exp['name']} theme pre-selected. Specify your travel duration, difficulty comfort, and party size to discover matching routes." }}
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ !empty($exp['cta_primary_btn_url']) ? $exp['cta_primary_btn_url'] : route('website.planner.start') . '?mode=discover&experience=' . $exp['slug'] . '&source=experience' }}" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                    <span>{{ !empty($exp['cta_primary_btn_text']) ? $exp['cta_primary_btn_text'] : 'Plan My Journey →' }}</span>
                </a>
                <a href="{{ !empty($exp['cta_secondary_btn_url']) ? $exp['cta_secondary_btn_url'] : route('website.compare') }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                    <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="18"></rect>
                        <rect x="14" y="3" width="7" height="18"></rect>
                    </svg>
                    <span>{{ !empty($exp['cta_secondary_btn_text']) ? $exp['cta_secondary_btn_text'] : 'Compare Shortlisted Routes' }}</span>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
