@php
    $plannerImage = \Website\Support\WebsiteAssetRegistry::resolve('homepage-custom-trip', 'Guided trekking discussion in Nepal');
@endphp

<section id="section-08-find-my-trek" data-section="08-find-my-trek" class="website-section website-section--warm" aria-labelledby="find-my-trek-heading">
    <div class="website-container">
        <div class="website-split">
            <!-- Media Column -->
            <div class="website-split__media">
                <img src="{{ $plannerImage['url'] }}"
                     alt="{{ $plannerImage['alt'] }}"
                     width="{{ $plannerImage['width'] }}"
                     height="{{ $plannerImage['height'] }}"
                     loading="lazy">
            </div>

            <!-- Content Column -->
            <div class="website-split__content">
                <span class="website-eyebrow" style="margin-bottom: var(--space-2);">INTERACTIVE ROUTE MATCHING</span>
                <h2 id="find-my-trek-heading" class="website-h2">
                    Find the Himalayan Trek Built for Your Ambition
                </h2>
                <p class="website-body website-text-secondary">
                    Every trekker arrives with distinct expectations, stamina, and schedule boundaries. Our guided planner evaluates your core preferences to recommend the best-fitting fixture itinerary.
                </p>

                <!-- Four Real Preference Cues (Not a fake form) -->
                <div class="website-preference-grid">
                    <div class="website-preference-grid__item">
                        <strong>1. Altitude Comfort</strong>
                        <span>Acclimatization tolerance and preferred maximum elevation thresholds.</span>
                    </div>
                    <div class="website-preference-grid__item">
                        <strong>2. Duration &amp; Pacing</strong>
                        <span>Flexible trail schedules from 7-day introductions to 18-day circuits.</span>
                    </div>
                    <div class="website-preference-grid__item">
                        <strong>3. Scenery vs. Culture</strong>
                        <span>High glacial amphitheatres, alpine lakes, or vibrant Sherpa hamlets.</span>
                    </div>
                    <div class="website-preference-grid__item">
                        <strong>4. Season &amp; Weather</strong>
                        <span>Post-monsoon crystal clarity or spring rhododendron blooms.</span>
                    </div>
                </div>

                <div style="margin-top: var(--space-4); display: flex; flex-wrap: wrap; gap: var(--space-4); align-items: center;">
                    <a href="{{ route('website.planner.start', ['mode' => 'discover', 'source' => 'home']) }}"
                       class="website-btn website-btn--accent">
                        <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                        </svg>
                        <span>Start Guided Route Planner &rarr;</span>
                    </a>
                    <span class="website-micro website-text-muted">
                        Simulated website workflow · No account required
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
