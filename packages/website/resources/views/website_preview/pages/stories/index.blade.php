@extends('website_preview.layout.master')

@section('title', 'Traveler Stories & Sample Trail Narratives | EATH Trekking Website')
@section('meta_description', 'Explore sample traveler narratives and photo-led hiking stories illustrating route perspectives, daily pacing, and trail planning for EATH.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    {{-- 2. H1 & Unmistakable Sample-Story Notice --}}
    <div style="margin-bottom: var(--space-8);">
        <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Trail Perspectives</span>
        <h1 class="website-h1" style="margin: 0 0 var(--space-4) 0;">
            Traveler Stories &amp; Field Perspectives
        </h1>
        <p class="website-lead website-text-secondary" style="margin: 0 0 var(--space-5) 0; max-width: 820px;">
            Personal narratives and photographic reflections offer insight into Himalayan rhythms, mountain pacing, and trip planning. Explore our sample story templates below.
        </p>

        {{-- Visible Sample-Story Notice Banner --}}
        <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md); box-shadow: none !important;">
            <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                <span style="font-size: 1.25rem; line-height: 1;" aria-hidden="true">ℹ️</span>
                <div>
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                        Fictional Website Stories Notice
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        All stories, traveler attributions, and narrative reflections on this page are preview fixtures designed to model editorial storytelling and route connections. They do not represent real customer testimonials, verified traveler reviews, third-party ratings, or actual client bookings.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. One Featured Fictional Narrative (Shown when not filtering) --}}
    @if(!$isFiltered && $featuredStory)
        <section aria-labelledby="heading-featured-story" style="margin-bottom: var(--space-12);">
            <div class="website-card" style="padding: 0; overflow: hidden; border: 1px solid var(--color-border); background: var(--color-surface); box-shadow: none !important;">
                <div style="display: grid; grid-template-columns: 1fr; gap: 0;" class="website-featured-story-grid">
                    <div style="aspect-ratio: 16 / 10; overflow: hidden; background: var(--color-background-warm);">
                        <img src="{{ $featuredStory['image']['url'] }}"
                             alt="{{ $featuredStory['image']['alt'] }}"
                             width="800"
                             height="500"
                             style="width: 100%; height: 100%; object-fit: cover; display: block;" />
                    </div>

                    <div style="padding: var(--space-6) var(--space-8); display: flex; flex-direction: column; justify-content: center;">
                        <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
                            <span class="website-badge website-badge--accent">Featured Preview Story</span>
                            @if(!empty($featuredStory['trek']))
                                <span class="website-badge website-badge--neutral">
                                    {{ $featuredStory['trek']['name'] }}
                                </span>
                            @endif
                        </div>

                        <h2 id="heading-featured-story" class="website-h2" style="margin: 0 0 var(--space-3) 0; font-size: 1.65rem;">
                            <a href="{{ route('website.stories.show', $featuredStory['slug']) }}" style="color: var(--color-text); text-decoration: none;">
                                {{ $featuredStory['title'] }}
                            </a>
                        </h2>

                        <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                            {{ $featuredStory['summary'] }}
                        </p>

                        <div style="display: flex; align-items: center; gap: var(--space-3); margin-bottom: var(--space-4); flex-wrap: wrap;">
                            <span class="website-small text-primary" style="font-weight: 600;">
                                Perspective by {{ $featuredStory['traveler_name'] }}
                            </span>
                            <span class="website-text-muted" aria-hidden="true">&bull;</span>
                            <span class="website-micro website-text-muted" style="font-style: italic;">
                                {{ $featuredStory['disclosure'] }}
                            </span>
                        </div>

                        <div style="display: flex; gap: var(--space-3); align-items: center; flex-wrap: wrap;">
                            <a href="{{ route('website.stories.show', $featuredStory['slug']) }}" class="website-btn website-btn--primary">
                                Read Full Story &rarr;
                            </a>
                            @if(!empty($featuredStory['trek']))
                                <a href="{{ route('website.treks.show', $featuredStory['trek']['slug']) }}" class="website-btn website-btn--outline">
                                    View {{ $featuredStory['trek']['name'] }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            @media (min-width: 900px) {
                .website-featured-story-grid {
                    grid-template-columns: 1.1fr 1fr !important;
                }
            }
        </style>
    @endif

    {{-- 4. Trek / Region Filters --}}
    <section aria-labelledby="heading-story-filters" style="margin-bottom: var(--space-8);">
        <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
            <form method="GET" action="{{ route('website.stories.index') }}" style="display: flex; gap: var(--space-4); align-items: flex-end; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 200px;">
                    <label for="filter-region" class="website-micro website-text-secondary" style="display: block; font-weight: 600; margin-bottom: var(--space-1); text-transform: uppercase; letter-spacing: 0.05em;">
                        Filter by Region
                    </label>
                    <select id="filter-region" name="region" class="website-input" style="width: 100%;">
                        <option value="">All Regions</option>
                        @foreach($allRegions as $reg)
                            <option value="{{ $reg['slug'] }}" {{ $selectedRegion === $reg['slug'] || $selectedRegion === $reg['id'] ? 'selected' : '' }}>
                                {{ $reg['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="flex: 1; min-width: 220px;">
                    <label for="filter-trek" class="website-micro website-text-secondary" style="display: block; font-weight: 600; margin-bottom: var(--space-1); text-transform: uppercase; letter-spacing: 0.05em;">
                        Filter by Sample Trek
                    </label>
                    <select id="filter-trek" name="trek" class="website-input" style="width: 100%;">
                        <option value="">All Sample Treks</option>
                        @foreach($allTreks as $trk)
                            <option value="{{ $trk['slug'] }}" {{ $selectedTrek === $trk['slug'] || $selectedTrek === $trk['id'] ? 'selected' : '' }}>
                                {{ $trk['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="display: flex; gap: var(--space-2); align-items: center;">
                    <button type="submit" class="website-btn website-btn--primary">
                        Filter Stories
                    </button>

                    @if($isFiltered)
                        <a href="{{ route('website.stories.index') }}" class="website-btn website-btn--ghost">
                            Clear Filters
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    {{-- 5. Story Cards with Count --}}
    <section aria-labelledby="heading-story-grid" style="margin-bottom: var(--space-14);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-6); flex-wrap: wrap; gap: var(--space-2);">
            <h2 id="heading-story-grid" class="website-h3" style="margin: 0;">
                @if($isFiltered)
                    Matching Sample Stories ({{ count($supportingStories) }})
                @else
                    More Sample Narratives ({{ count($supportingStories) }})
                @endif
            </h2>

            <span class="website-small website-text-secondary">
                {{ count($stories) }} sample {{ count($stories) === 1 ? 'narrative' : 'narratives' }} in preview catalog
            </span>
        </div>

        @if(!empty($supportingStories) && count($supportingStories) > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-6);">
                @foreach($supportingStories as $story)
                    @include('website_preview.components.story-card', ['story' => $story])
                @endforeach
            </div>
        @else
            {{-- Empty Filter State --}}
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">No Matches Found</span>
                <h3 class="website-h3" style="margin: 0 0 var(--space-2) 0;">No sample stories match your selected filters</h3>
                <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 500px;">
                    We do not use fabricated or scraped reviews to fill empty filter results. Clear your filters to browse all three preview stories.
                </p>
                <a href="{{ route('website.stories.index') }}" class="website-btn website-btn--primary">
                    Clear Filters &amp; View All Stories
                </a>
            </div>
        @endif
    </section>

    {{-- 6. Planning CTA --}}
    <section aria-labelledby="heading-stories-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); text-align: center; box-shadow: none !important;">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Your Himalayan Journey</span>
            <h2 id="heading-stories-cta" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                Inspired to Create Your Own Mountain Story?
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 640px; line-height: 1.6;">
                Every trek in our catalog can be customized with tailored daily stages, rest days, and personal pacing preferences. Use our interactive planner to explore route ideas and generate a sample proposal.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start', ['source' => 'stories']) }}" class="website-btn website-btn--primary">
                    Start Custom Journey Planner &rarr;
                </a>
                <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline">
                    Browse All Sample Treks
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
