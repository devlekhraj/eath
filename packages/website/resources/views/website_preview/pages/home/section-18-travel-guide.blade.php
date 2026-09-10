@props(['articles'])

<section id="section-18-travel-guide" data-section="18-travel-guide" class="website-section website-section--warm" aria-labelledby="travel-guide-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Field Insights',
            'title' => 'Nepal Mountain Travel Guide',
            'subtitle' => 'Practical advice curated by Himalayan guides: weather windows, packing gear essentials, and altitude health preparation.',
            'actionUrl' => route('website.articles.index'),
            'actionText' => 'All Travel Articles &rarr;'
        ])

        <div class="website-grid-3">
            @foreach($articles as $article)
                @include('website_preview.components.article-card', ['article' => $article])
            @endforeach
        </div>
    </div>
</section>
