@php
$articles = [
    [
        'title' => 'Exploring the Hidden Gems of Mustang',
        'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad',
        'description' => "Discover the untouched beauty of Nepal's upper Mustang, a land of desert landscapes and ancient monasteries.",
        'date' => '2025-07-10',
        'url' => '/articles/mustang-hidden-gems'   // add URL here
    ],
    [
        'title' => 'Top 5 Treks for Beginners in Nepal',
        'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad',
        'description' => 'Looking for your first trek in Nepal? These beginner-friendly routes are perfect to start your adventure journey.',
        'date' => '2025-07-12',
        'url' => '/articles/treks-for-beginners'
    ],
    [
        'title' => 'Best Times to Visit Everest Region',
        'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad',
        'description' => 'Plan your Everest Base Camp adventure at the perfect time for clear skies, great views, and memorable experiences.',
        'date' => '2025-07-15',
        'url' => '/articles/visit-everest-region'
    ],
];

@endphp
<section class="recent-articles-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Recent Articles</h2>
            <p class="section-subtitle">Stay updated with our latest travel stories and tips</p>
        </div>
        <div class="row g-4">
            @foreach ($articles as $article)
                <div class="col-md-4">
                    <div class="card h-100 article-card">
                        <a href="{{ $article['url'] }}" class="text-decoration-none text-dark d-block h-100">
                            <img src="{{ $article['image'] }}" class="card-img-top" alt="{{ $article['title'] }}">
                            <div class="card-body">
                                <p class="text-muted small mb-1">{{ \Carbon\Carbon::parse($article['date'])->format('M d, Y') }}</p>
                                <h5 class="card-title">{{ $article['title'] }}</h5>
                                <p class="card-text">{{ $article['description'] }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

