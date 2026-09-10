@props(['stories'])

<section id="section-12-stories" data-section="12-stories" class="website-section website-section--warm" aria-labelledby="stories-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Sample Reflections',
            'title' => 'Traveler Journeys &amp; Field Notes',
            'subtitle' => 'Fictional website narratives illustrating trail pacing, mountain perspectives, and lodge life across different seasons in Nepal.',
            'actionUrl' => route('website.stories.index'),
            'actionText' => 'All Traveler Stories &rarr;'
        ])

        <div class="website-grid-3">
            @foreach($stories as $story)
                @include('website_preview.components.story-card', ['story' => $story])
            @endforeach
        </div>

        <div style="margin-top: var(--space-6); text-align: center;">
            <span class="website-badge website-badge--accent" style="font-size: 0.75rem;">
                FICTIONAL SAMPLE STORIES · NO THIRD-PARTY PLATFORM RATINGS CLAIMED
            </span>
        </div>
    </div>
</section>
