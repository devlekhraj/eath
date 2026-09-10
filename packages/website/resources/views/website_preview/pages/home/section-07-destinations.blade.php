@props(['regions'])

<section id="section-07-destinations" data-section="07-destinations" class="website-section" aria-labelledby="destinations-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Nepal Regions',
            'title' => 'Destination Explorer',
            'subtitle' => 'Five distinctive mountain massifs across Nepal, from the dramatic granite spires of Khumbu to the ancient arid canyons of Mustang.',
            'actionUrl' => route('website.destinations.index'),
            'actionText' => 'All Destinations &rarr;'
        ])

        <div class="website-destinations-grid">
            @foreach($regions as $region)
                <div class="website-dest-item">
                    @include('website_preview.components.destination-card', ['region' => $region])
                </div>
            @endforeach
        </div>
    </div>
</section>
