@extends('website_preview.layout.master')

@section('title', 'Himalayan Trekking Destinations & Regions · EATH Website')
@section('meta_description', 'Explore Nepal\'s 5 major trekking regions: Everest, Annapurna, Langtang, Manaslu, and Mustang. Compare regional trail characters and find curated sample itineraries.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- Geographic-Discovery Introduction -->
    <header style="margin-bottom: var(--space-8); max-width: 820px;">
        <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
            <span class="website-badge website-badge--accent" style="text-transform: uppercase;">
                5 Fixture Regions
            </span>
            <span class="website-micro website-text-muted">Sample Catalog Preview · Pure Fixture Data</span>
        </div>

        <h1 class="website-h1" style="margin-bottom: var(--space-3);">Himalayan Trekking Destinations</h1>
        <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6; font-size: 1.125rem;">
            Explore Nepal’s iconic mountain valleys, classic circuits, and preserved cultural regions. Each destination presents unique trail character, acclimatization profiles, and seasonal trekking windows.
        </p>
    </header>

    <!-- 3. Editorial Destination Grid (5 Fixture Regions) -->
    <section aria-labelledby="heading-destination-grid" style="margin-bottom: var(--space-12);">
        <h2 id="heading-destination-grid" class="sr-only">Regional Destinations</h2>

        <div class="website-destinations-grid">
            @foreach($regions as $index => $region)
                @php
                    $img = $region['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("region-{$region['slug']}", $region['name']);
                    $trekCount = $region['trek_count'] ?? count($region['treks'] ?? []);
                @endphp
                <div class="website-dest-item">
                    <article class="website-card" style="padding: 0; overflow: hidden; height: 100%; display: flex; flex-direction: column; border: 1px solid var(--color-border); border-radius: var(--radius-lg); background: var(--color-surface);">
                        <!-- Destination Portrait / Landscape Cover -->
                        <div style="position: relative; aspect-ratio: 16/10; overflow: hidden; background: var(--color-background-warm);">
                            <img src="{{ $img['url'] }}" 
                                 alt="{{ $img['alt'] ?? ($region['name'] . ' Region') }}" 
                                 width="{{ $img['width'] ?? 800 }}" 
                                 height="{{ $img['height'] ?? 500 }}" 
                                 loading="lazy" 
                                 style="width: 100%; height: 100%; object-fit: cover; display: block;">

                            <div style="position: absolute; top: var(--space-3); left: var(--space-3);">
                                @if($trekCount > 0)
                                    <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.94); color: var(--color-text); font-weight: 600;">
                                        {{ $trekCount }} Sample {{ \Illuminate\Support\Str::plural('Trek', $trekCount) }}
                                    </span>
                                @else
                                    <span class="website-badge website-badge--neutral" style="background: rgba(255, 255, 255, 0.94); color: var(--color-text-muted);">
                                        0 Sample Treks
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div style="padding: var(--space-5); display: flex; flex-direction: column; flex-grow: 1;">
                            <h3 class="website-h3" style="margin-bottom: var(--space-2);">
                                <a href="{{ route('website.destinations.show', $region['slug']) }}" class="website-link" style="color: inherit; text-decoration: none;">
                                    {{ $region['name'] }} Region
                                </a>
                            </h3>

                            <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.5; flex-grow: 1;">
                                {{ $region['intro'] }}
                            </p>

                            <div style="padding-top: var(--space-3); border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center;">
                                @if($trekCount > 0)
                                    <a href="{{ route('website.destinations.show', $region['slug']) }}" class="website-link" style="color: var(--color-primary); font-weight: 600; font-size: var(--type-small); display: inline-flex; align-items: center; gap: 4px;">
                                        Explore {{ $region['name'] }} &rarr;
                                    </a>
                                @else
                                    <a href="{{ route('website.planner.start') }}?mode=custom&source=destination" class="website-link" style="color: var(--color-primary); font-weight: 600; font-size: var(--type-small); display: inline-flex; align-items: center; gap: 4px;">
                                        Plan Custom Trip &rarr;
                                    </a>
                                @endif

                                <span class="website-micro website-text-muted">
                                    Fixture Website
                                </span>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 4. Compact Region-Orientation Text / Guide -->
    <section aria-labelledby="heading-region-orientation" style="margin-bottom: var(--space-12);">
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border);">
            <div style="max-width: 820px; margin-bottom: var(--space-6);">
                <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-2);">Regional Geography</span>
                <h2 id="heading-region-orientation" class="website-h2" style="margin-bottom: var(--space-2);">
                    Choosing Your Himalayan Corridor
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Nepal's trekking terrain spans vast ecological gradients—from lush rhododendron river gorges to arid trans-Himalayan rain shadows. Visitors may explore by individual destination or compare routes based on duration, trail rhythm, and personal physical readiness.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
                <div style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
                    <h3 class="website-h4" style="color: var(--color-primary-dark); margin-bottom: var(--space-1);">Everest (Khumbu)</h3>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                        Home to dramatic alpine amphitheaters, Sherpa Buddhist monasteries, and world-renowned high passes. Demands methodical acclimatization and reliable high-altitude pacing.
                    </p>
                </div>

                <div style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
                    <h3 class="website-h4" style="color: var(--color-primary-dark); margin-bottom: var(--space-1);">Annapurna</h3>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                        Celebrated for bio-climatic diversity. Transitions from terraced agricultural foothills to jagged mountain sanctuaries and high alpine circuit passes like Thorong La.
                    </p>
                </div>

                <div style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
                    <h3 class="website-h4" style="color: var(--color-primary-dark); margin-bottom: var(--space-1);">Langtang</h3>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                        Located directly north of Kathmandu. Combines pristine pine-forested valley trails, Tamang mountain heritage, and access to Kyanjin Gompa and alpine glacial basins.
                    </p>
                </div>

                <div style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
                    <h3 class="website-h4" style="color: var(--color-primary-dark); margin-bottom: var(--space-1);">Manaslu</h3>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                        A restricted-area circuit around the world's eighth highest summit. Offers untamed wilderness, rich Tibetan cultural settlements, and Larkya La pass crossing.
                    </p>
                </div>

                <div style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
                    <h3 class="website-h4" style="color: var(--color-primary-dark); margin-bottom: var(--space-1);">Mustang (Upper Mustang)</h3>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                        An arid trans-Himalayan plateau in the rain shadow of the Annapurna and Dhaulagiri ranges. Features ancient cave settlements, wind-carved canyons, and summer trekking suitability.
                    </p>
                </div>
            </div>

            <div style="margin-top: var(--space-5); padding-top: var(--space-4); border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3);">
                <span class="website-small website-text-muted">
                    Looking for seasonal windows or weather considerations?
                </span>
                <a href="{{ route('website.months.index') }}" class="website-btn website-btn--outline website-btn--compact">
                    View When to Go Calendar &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- 5. Featured Sample Treks Across Regions -->
    <section aria-labelledby="heading-featured-treks" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-6); flex-wrap: wrap; gap: var(--space-3);">
            <div>
                <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Curated Routes</span>
                <h2 id="heading-featured-treks" class="website-h2" style="margin: 0;">Featured Itineraries Across Regions</h2>
                <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                    Sample journeys highlighting the distinct terrain and difficulty levels across our catalog.
                </p>
            </div>

            <a href="{{ route('website.treks.index') }}" class="website-link" style="color: var(--color-primary); font-weight: 600; font-size: var(--type-small);">
                View all 8 catalog treks &rarr;
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--space-6);">
            @foreach($featuredTreks as $featuredTrek)
                @include('website_preview.components.trek-card', ['trek' => $featuredTrek])
            @endforeach
        </div>
    </section>

    <!-- 6. Discover-Mode Planning CTA -->
    <section aria-labelledby="heading-destination-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 2px solid var(--color-primary-light); text-align: center;">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-2); text-transform: uppercase;">
                Interactive Route Finder
            </span>
            <h2 id="heading-destination-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                Unsure Which Region Suits Your Travel Window?
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 680px; margin: 0 auto var(--space-6) auto; line-height: 1.6;">
                Our interactive trek planner analyzes your available travel days, preferred season, and alpine experience to recommend suitable routes across all 5 Himalayan regions.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}?mode=discover&source=destination" class="website-btn website-btn--primary">
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
                    <span>Compare Treks Side-by-Side</span>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
