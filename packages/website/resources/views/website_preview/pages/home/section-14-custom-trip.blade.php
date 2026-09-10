@php
    $customImage = \Website\Support\WebsiteAssetRegistry::resolve('region-manaslu', 'Manaslu remote mountain valley trail');
@endphp

<section id="section-14-custom-trip" data-section="14-custom-trip" class="website-section website-section--warm" aria-labelledby="custom-trip-heading">
    <div class="website-container">
        <div class="website-split website-split--reverse">
            <!-- Media Column -->
            <div class="website-split__media">
                <img src="{{ $customImage['url'] }}"
                     alt="{{ $customImage['alt'] }}"
                     width="{{ $customImage['width'] }}"
                     height="{{ $customImage['height'] }}"
                     loading="lazy">
            </div>

            <!-- Content Column -->
            <div class="website-split__content">
                <span class="website-eyebrow website-eyebrow--accent" style="margin-bottom: var(--space-2);">TAILORED ITINERARIES</span>
                <h2 id="custom-trip-heading" class="website-h2">
                    Design a Bespoke Himalayan Expedition
                </h2>
                <p class="website-body website-text-secondary">
                    Looking to trek outside fixed departure dates or combine remote valley circuits? Our custom trip planner allows you to define your party's exact requirements.
                </p>

                <!-- Key Tailoring Dimensions -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); margin: var(--space-2) 0;">
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-primary);">Flexible Dates</strong>
                        <span class="website-micro website-text-secondary">Depart on your preferred calendar day with private guide allocations.</span>
                    </div>
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-primary);">Unhurried Pace</strong>
                        <span class="website-micro website-text-secondary">Add acclimatization rest days or shorten daily trail hours to match your stamina.</span>
                    </div>
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-primary);">Special Interests</strong>
                        <span class="website-micro website-text-secondary">Tailored routes for high-altitude photography, flora, or Tibetan Buddhist heritage.</span>
                    </div>
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-primary);">Comfort Tier</strong>
                        <span class="website-micro website-text-secondary">Select traditional community teahouses or upgraded en-suite mountain lodges.</span>
                    </div>
                </div>

                <div style="margin-top: var(--space-4); display: flex; flex-wrap: wrap; gap: var(--space-4); align-items: center;">
                    <a href="{{ route('website.planner.start', ['mode' => 'custom', 'source' => 'home']) }}"
                       class="website-btn website-btn--primary">
                        Build My Custom Trip &rarr;
                    </a>
                    <span class="website-micro website-text-muted">
                        Simulated custom itinerary builder
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
