@props(['experiences'])

<section id="section-05-experiences" data-section="05-experiences" class="website-section" aria-labelledby="experiences-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Travel by Interest',
            'title' => 'Himalayan Experience Styles',
            'subtitle' => 'From challenging high-pass crossings to unhurried valley trails, find the journey shaped around how you love to explore.',
            'actionUrl' => route('website.experiences.index'),
            'actionText' => 'All Experiences &rarr;'
        ])

        <div class="website-grid-3">
            @foreach($experiences as $experience)
                @include('website_preview.components.experience-card', ['experience' => $experience])
            @endforeach
        </div>
    </div>
</section>
