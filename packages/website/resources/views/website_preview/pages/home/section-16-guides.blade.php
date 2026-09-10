@props(['guides'])

<section id="section-16-guides" data-section="16-guides" class="website-section website-section--warm" aria-labelledby="guides-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Mountain Leadership',
            'title' => 'Meet Your Local Guides',
            'subtitle' => 'Fictional website profiles representing licensed mountain leaders certified by the Nepal Mountaineering Association.',
            'actionUrl' => route('website.guides.index'),
            'actionText' => 'All Guides &rarr;'
        ])

        <div class="website-grid-3">
            @foreach($guides as $guide)
                @include('website_preview.components.guide-card', ['guide' => $guide])
            @endforeach
        </div>

        <div style="margin-top: var(--space-6); text-align: center;">
            <span class="website-badge website-badge--accent" style="font-size: 0.75rem;">
                FICTIONAL WEBSITE PROFILES · ILLUSTRATIVE TEAM REPRESENTATION
            </span>
        </div>
    </div>
</section>
