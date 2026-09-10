@extends('website_preview.layout.master')

@section('title', 'Himalayan Trekking Experiences · EATH Website')
@section('meta_description', 'Discover Nepal trekking by theme and interest: Mountain Scenery, Cultural Trails, Quieter Routes, Short Treks, Photography, and Iconic Routes.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- Introduction Explaining Interest-Based Discovery -->
    <header style="margin-bottom: var(--space-8); max-width: 840px;">
        <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
            <span class="website-badge website-badge--accent" style="text-transform: uppercase;">
                6 Travel Themes
            </span>
            <span class="website-micro website-text-muted">Sample Catalog Preview · Interest-Led Exploration</span>
        </div>

        <h1 class="website-h1" style="margin-bottom: var(--space-3);">Himalayan Trekking Experiences</h1>
        <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6; font-size: 1.125rem;">
            Discover Nepal by the landscape features and cultural pace that inspire you most. Rather than selecting routes solely by geography, our interest-based themes help you identify journeys aligned with your photography goals, cultural curiosities, or desire for quiet trails.
        </p>
    </header>

    <!-- 3. Six Experience Tiles -->
    <section aria-labelledby="heading-experience-tiles" style="margin-bottom: var(--space-12);">
        <h2 id="heading-experience-tiles" class="sr-only">Trekking Experience Categories</h2>

        @if(count($experiences) > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: var(--space-6);">
                @foreach($experiences as $exp)
                    @php
                        $image = $exp['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("experience-{$exp['slug']}", $exp['name']);
                        $count = $exp['trek_count'] ?? count($exp['treks'] ?? []);
                    @endphp
                    <article class="website-card" style="padding: 0; overflow: hidden; height: 100%; display: flex; flex-direction: column; border: 1px solid var(--color-border); border-radius: var(--radius-lg); background: var(--color-surface);">
                        <div style="position: relative; aspect-ratio: 16/10; overflow: hidden; background: var(--color-background-warm);">
                            <img src="{{ $image['url'] }}" 
                                 alt="{{ $image['alt'] ?? ($exp['name'] . ' Experience') }}" 
                                 width="{{ $image['width'] ?? 800 }}" 
                                 height="{{ $image['height'] ?? 500 }}" 
                                 loading="lazy" 
                                 style="width: 100%; height: 100%; object-fit: cover; display: block;">

                            <div style="position: absolute; top: var(--space-3); left: var(--space-3);">
                                <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.94); color: var(--color-text); font-weight: 600;">
                                    {{ $count }} Sample {{ \Illuminate\Support\Str::plural('Trek', $count) }}
                                </span>
                            </div>
                        </div>

                        <div style="padding: var(--space-5); display: flex; flex-direction: column; flex-grow: 1;">
                            <h3 class="website-h3" style="margin-bottom: var(--space-2);">
                                <a href="{{ route('website.experiences.show', $exp['slug']) }}" class="website-link" style="color: inherit; text-decoration: none;">
                                    {{ $exp['name'] }}
                                </a>
                            </h3>

                            <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.5; flex-grow: 1;">
                                {{ $exp['intro'] }}
                            </p>

                            <div style="padding-top: var(--space-3); border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center;">
                                <a href="{{ route('website.experiences.show', $exp['slug']) }}" class="website-link" style="color: var(--color-primary); font-weight: 600; font-size: var(--type-small); display: inline-flex; align-items: center; gap: 4px;">
                                    Explore Theme &rarr;
                                </a>

                                <span class="website-micro website-text-muted">
                                    Website Tag
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-background-warm); border: 1px dashed var(--color-border);">
                <h3 class="website-h3" style="margin-bottom: var(--space-2);">No Experience Categories Available</h3>
                <p class="website-small website-text-secondary" style="margin-bottom: var(--space-4);">
                    No sample interest themes are currently loaded in the catalog fixture. You can still configure a customized route through our planner.
                </p>
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary">
                    Launch Trek Planner &rarr;
                </a>
            </div>
        @endif
    </section>

    <!-- 4. Example Trips Using Shared TrekCard -->
    <section aria-labelledby="heading-example-trips" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-6); flex-wrap: wrap; gap: var(--space-3);">
            <div>
                <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Curated Samples</span>
                <h2 id="heading-example-trips" class="website-h2" style="margin: 0;">Example Journeys Across Themes</h2>
                <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                    Sample itineraries illustrating how multiple landscape and cultural experiences intersect on trail.
                </p>
            </div>

            <a href="{{ route('website.treks.index') }}" class="website-link" style="color: var(--color-primary); font-weight: 600; font-size: var(--type-small);">
                View all 8 catalog treks &rarr;
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-6);">
            @foreach($exampleTreks as $trek)
                @include('website_preview.components.trek-card', ['trek' => $trek])
            @endforeach
        </div>
    </section>

    <!-- 5. Help Me Choose CTA -->
    <section aria-labelledby="heading-choose-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 2px solid var(--color-primary-light); text-align: center;">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-2); text-transform: uppercase;">
                Personalized Matching
            </span>
            <h2 id="heading-choose-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                Need Help Choosing Your Experience?
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 680px; margin: 0 auto var(--space-6) auto; line-height: 1.6;">
                Our interactive trip planner balances multiple interest categories against your available days, preferred season, and alpine experience to find your ideal match.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}?mode=discover&source=experience" class="website-btn website-btn--primary">
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
