@extends('website_preview.layout.master')

@section('title', $story['title'] . ' | Traveler Story | EATH Trekking Website')
@section('meta_description', 'Sample traveler narrative for ' . $story['title'] . ' (' . $story['traveler_name'] . ') illustrating route perspectives, trail pacing, and Himalayan planning for EATH.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    <div style="max-width: 820px; margin: 0 auto;">
        {{-- 2. H1, Fictional Attribution & Website Disclosure --}}
        <header style="margin-bottom: var(--space-8);">
            <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-3); flex-wrap: wrap;">
                <span class="website-badge website-badge--accent">Sample Traveler Narrative</span>
                @if($trek)
                    <span class="website-badge website-badge--neutral">{{ $trek['name'] }}</span>
                @endif
            </div>

            <h1 class="website-h1" style="margin: 0 0 var(--space-3) 0;">
                {{ $story['title'] }}
            </h1>

            <div style="display: flex; align-items: center; gap: var(--space-3); margin-bottom: var(--space-5); flex-wrap: wrap;">
                <span class="website-body text-primary" style="font-weight: 600;">
                    Narrative perspective by {{ $story['traveler_name'] }}
                </span>
                <span class="website-text-muted" aria-hidden="true">&bull;</span>
                <span class="website-small website-text-secondary">
                    Preview Field Reflection
                </span>
            </div>

            {{-- Unmistakable Fictional Notice Banner --}}
            <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md); box-shadow: none !important;">
                <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                    <span style="font-size: 1.15rem; line-height: 1;" aria-hidden="true">ℹ️</span>
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                            Fictional Website Story Notice
                        </strong>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                            {{ $story['disclosure'] }} This article is an illustrative narrative created to illustrate layout, trail context, and journey planner integration. It is not a verified review, customer endorsement, or real person&rsquo;s testimonial.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        {{-- 3. Related Sample Trek Context --}}
        @if($trek)
            <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); margin-bottom: var(--space-8); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3); box-shadow: none !important;">
                <div>
                    <span class="website-micro website-text-secondary" style="text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 2px;">
                        Associated Itinerary Context
                    </span>
                    <strong class="website-body" style="color: var(--color-text);">
                        {{ $trek['name'] }}
                    </strong>
                    <span class="website-small website-text-secondary" style="display: block;">
                        {{ $trek['region']['name'] ?? 'Nepal' }} &bull; {{ $trek['duration_days'] }} Days &bull; Elevation up to {{ $trek['max_altitude_m'] }}m
                    </span>
                </div>
                <div style="display: flex; gap: var(--space-2); align-items: center;">
                    <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-btn website-btn--outline website-btn--compact">
                        View Trek Details &rarr;
                    </a>
                </div>
            </div>
        @endif

        {{-- 4. Featured Image & Safe Fallback --}}
        <figure style="margin: 0 0 var(--space-8) 0;">
            <div style="aspect-ratio: 16 / 10; border-radius: var(--radius-lg); overflow: hidden; background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <img src="{{ $story['image']['url'] }}"
                     alt="{{ $story['title'] }} — Website narrative illustration"
                     width="800"
                     height="500"
                     style="width: 100%; height: 100%; object-fit: cover; display: block;" />
            </div>
            <figcaption class="website-micro website-text-muted" style="margin-top: var(--space-2); text-align: center; font-style: italic;">
                Sample visual representation for trail atmosphere and mountain terrain in the {{ $trek['name'] ?? 'Himalayan region' }}.
            </figcaption>
        </figure>

        {{-- 5. Complete Narrative Body --}}
        <article class="website-body website-text-secondary" style="line-height: 1.75; font-size: 1.05rem; margin-bottom: var(--space-12);">
            <p class="website-lead" style="color: var(--color-text); margin-bottom: var(--space-6); font-weight: 400; line-height: 1.6;">
                {{ $story['summary'] }}
            </p>

            <h2 class="website-h3" style="color: var(--color-text); margin: var(--space-8) 0 var(--space-3) 0;">
                The Rhythm of the Trail &amp; Daily Pacing
            </h2>
            <p>
                {{ $story['body'] }}
            </p>
            <p>
                In high-altitude walking, early hours offer the most stable conditions: crisp ridge air, morning sunlight illuminating snow-capped summits, and unhurried paths through quiet pine and rhododendron forests. Planning rest stops every two hours allowed time to hydrate, check pulse readings, and take in the panoramic valley vistas without racing against afternoon weather changes.
            </p>

            <h2 class="website-h3" style="color: var(--color-text); margin: var(--space-8) 0 var(--space-3) 0;">
                Formulating Route Questions &amp; Preferences
            </h2>
            <p>
                Using an interactive planning tool helped clarify questions before setting out: Was the daily walking distance comfortable? How many buffer days were built into the crossing? The transparent breakdown of physical demands, lodge amenities, and trail altitudes meant our group felt thoroughly oriented before stepping onto the stone steps.
            </p>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 3px solid var(--color-primary); margin: var(--space-6) 0; box-shadow: none !important;">
                <strong class="website-small" style="color: var(--color-text); display: block; margin-bottom: var(--space-1);">
                    Key Insight on Trail Flexibility:
                </strong>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                    &ldquo;Setting a conservative pace on the first three days made the higher passes feel entirely manageable. Acclimatization is not lost time; it is where the mountain landscape truly reveals itself.&rdquo;
                </p>
                <span class="website-micro website-text-muted" style="display: block; margin-top: var(--space-2); font-style: italic;">
                    Illustrative quote modeling traveler reflection in prototype format.
                </span>
            </div>

            <h2 class="website-h3" style="color: var(--color-text); margin: var(--space-8) 0 var(--space-3) 0;">
                Teahouse Evenings &amp; Local Hospitality
            </h2>
            <p>
                Evenings spent around the central dining hall stove provided an opportunity to review the next day&rsquo;s ascent profile with our team leader, discuss local Sherpa and Tamang cultural customs, and enjoy fresh, warm dal bhat. Restful sleep and deliberate hydration made every dawn feel fresh.
            </p>
        </article>

        {{-- 6. Safe Gallery from Sample Trek Assets (If Available) --}}
        @if($trek && !empty($trek['gallery']) && count($trek['gallery']) > 0)
            <section aria-labelledby="heading-story-gallery" style="margin-bottom: var(--space-12);">
                <h2 id="heading-story-gallery" class="website-h3" style="margin: 0 0 var(--space-4) 0;">
                    Trail Impressions from {{ $trek['name'] }}
                </h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: var(--space-3);">
                    @foreach(array_slice($trek['gallery'], 0, 3) as $gImg)
                        <div style="aspect-ratio: 4 / 3; border-radius: var(--radius-md); overflow: hidden; background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                            <img src="{{ $gImg['url'] }}"
                                 alt="{{ $gImg['alt'] }}"
                                 width="400"
                                 height="300"
                                 loading="lazy"
                                 style="width: 100%; height: 100%; object-fit: cover; display: block;" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- 7. Related Trek Card --}}
        @if($trek)
            <section aria-labelledby="heading-related-trek" style="margin-bottom: var(--space-12);">
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-2);">
                    <h2 id="heading-related-trek" class="website-h3" style="margin: 0;">
                        Featured Itinerary: {{ $trek['name'] }}
                    </h2>
                    <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-btn website-btn--text" style="font-size: var(--type-small);">
                        Full Route Details &rarr;
                    </a>
                </div>
                <div style="max-width: 480px;">
                    @include('website_preview.components.trek-card', ['trek' => $trek])
                </div>
            </section>
        @endif

        {{-- 8. Other Sample Stories (Excluding Current) --}}
        @if(!empty($otherStories) && count($otherStories) > 0)
            <section aria-labelledby="heading-other-stories" style="margin-bottom: var(--space-14);">
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-2);">
                    <h2 id="heading-other-stories" class="website-h3" style="margin: 0;">
                        More Sample Traveler Stories
                    </h2>
                    <a href="{{ route('website.stories.index') }}" class="website-btn website-btn--text" style="font-size: var(--type-small);">
                        View All Stories &rarr;
                    </a>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-5);">
                    @foreach($otherStories as $otherStory)
                        @include('website_preview.components.story-card', ['story' => $otherStory])
                    @endforeach
                </div>
            </section>
        @endif

        {{-- 9. Plan a Similar Trip CTA --}}
        <section aria-labelledby="heading-plan-similar">
            <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); text-align: center; box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Custom Trek Planning</span>
                <h2 id="heading-plan-similar" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                    Plan a Similar Journey
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 600px; line-height: 1.6;">
                    Inspired by this narrative? Configure a tailored Himalayan itinerary based on {{ $trek['name'] ?? 'this route' }} with personalized stages, rest days, and preferences.
                </p>
                <p class="website-small website-text-muted" style="margin: 0 auto var(--space-6) auto; max-width: 560px; font-style: italic;">
                    Note: Starting the planner will preselect {{ $trek['name'] ?? 'this route' }} in your website session draft. All trip parameters can be freely adjusted or switched at any time.
                </p>

                <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                    @if($trek)
                        <a href="{{ route('website.planner.start', ['mode' => 'selected', 'trek' => $trek['slug'], 'source' => 'story']) }}" class="website-btn website-btn--primary">
                            Plan {{ $trek['name'] }} &rarr;
                        </a>
                    @else
                        <a href="{{ route('website.planner.start', ['source' => 'story']) }}" class="website-btn website-btn--primary">
                            Plan a Sample Journey &rarr;
                        </a>
                    @endif
                    <a href="{{ route('website.stories.index') }}" class="website-btn website-btn--outline">
                        Back to All Stories
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
