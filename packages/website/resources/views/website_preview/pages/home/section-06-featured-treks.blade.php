@props(['treks'])

<section id="section-06-featured-treks" data-section="06-featured-treks" class="website-section website-section--warm" aria-labelledby="featured-treks-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Curated Expeditions',
            'title' => 'Featured Himalayan Treks',
            'subtitle' => 'Handcrafted sample itineraries reflecting classic high-altitude trails, tea-house logistics, and conservative acclimatization days.',
            'actionUrl' => route('website.treks.index'),
            'actionText' => 'View All 8 Treks &rarr;'
        ])

        <div class="website-grid-3">
            @foreach($treks as $trek)
                @include('website_preview.components.trek-card', ['trek' => $trek])
            @endforeach
        </div>

        <!-- Integrated Sample Departures Sub-bar -->
        <div style="margin-top: var(--space-8); padding: var(--space-4) var(--space-6); background: var(--color-surface); border: 1px solid var(--color-border); display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: var(--space-4);">
            <div style="display: flex; align-items: center; gap: var(--space-3);">
                <span class="website-eyebrow website-eyebrow--accent">SAMPLE SCHEDULE</span>
                <span class="website-small website-text-secondary">
                    Fixed group departure dates available across all 8 featured treks (September 2030 sample calendar).
                </span>
            </div>
            <a href="{{ route('website.departures.index') }}" class="website-link website-small font-weight-medium" style="white-space: nowrap;">
                Explore All 24 Fixed Departures &rarr;
            </a>
        </div>
    </div>
</section>
