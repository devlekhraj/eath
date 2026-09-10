@php
    $heroImage = \Website\Support\WebsiteAssetRegistry::resolve('hero-home', 'Himalayan mountain ranges at sunrise');
    $mobileHeroUrl = $heroImage['mobile_url'] ?? '/images/hero-mobile.webp';
@endphp

<section id="section-03-hero" data-section="03-hero" class="website-hero" aria-labelledby="hero-heading">
    <div class="website-hero__media" aria-hidden="true">
        <picture>
            <source media="(max-width: 640px)" srcset="{{ $mobileHeroUrl }}" type="image/webp">
            <source srcset="{{ $heroImage['url'] }}" type="image/webp">
            <img src="{{ $heroImage['url'] }}"
                 alt="{{ $heroImage['alt'] }}"
                 width="{{ $heroImage['width'] }}"
                 height="{{ $heroImage['height'] }}"
                 loading="eager"
                 fetchpriority="high">
        </picture>
    </div>

    <div class="website-hero__overlay" aria-hidden="true"></div>

    <div class="website-container" style="position: relative; z-index: 2; width: 100%;">
        <div class="website-hero__content">
            <h1 id="hero-heading" class="website-hero__title">
                Himalayan Journeys,<br>Thoughtfully Planned.
            </h1>

            <p class="website-hero__lead">
                Explore authentic trekking routes across Nepal with experienced local guides, conservative altitude-aware pacing, and transparent ground support.
            </p>

            <div class="website-hero__actions">
                <a href="{{ route('website.planner.start', ['mode' => 'discover', 'source' => 'home']) }}"
                   class="website-btn website-btn--accent website-btn--large">
                    <svg class="website-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                    <span>Find My Trek</span>
                </a>
                <a href="{{ route('website.treks.index') }}"
                   class="website-btn website-btn--outline website-btn--large"
                   style="color: #ffffff; border-color: rgba(255, 255, 255, 0.6); background: rgba(12, 74, 110, 0.4);">
                    <svg class="website-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m2 20 7-10 5 6 4-3 4 7H2z"></path>
                    </svg>
                    <span>Explore Treks</span>
                </a>
            </div>
        </div>
    </div>
</section>
