@php
    $articles = [
        [
            'title' => 'Exploring the Hidden Gems of Mustang',
            'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad',
            'description' =>
                "Discover the untouched beauty of Nepal's upper Mustang, a land of desert landscapes and ancient monasteries.",
            'date' => '2025-07-10',
            'url' => '/articles/mustang-hidden-gems', // add URL here
        ],
        [
            'title' => 'Top 5 Treks for Beginners in Nepal',
            'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad',
            'description' =>
                'Looking for your first trek in Nepal? These beginner-friendly routes are perfect to start your adventure journey.',
            'date' => '2025-07-12',
            'url' => '/articles/treks-for-beginners',
        ],
        [
            'title' => 'Best Times to Visit Everest Region',
            'image' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad',
            'description' =>
                'Plan your Everest Base Camp adventure at the perfect time for clear skies, great views, and memorable experiences.',
            'date' => '2025-07-15',
            'url' => '/articles/visit-everest-region',
        ],
    ];

@endphp
<section class="recent-articles-section py-5">
    <div class="container py-5">
        {{-- <div class="text-center mb-5">
            <h2 class="section-title">Recent Articles</h2>
            <p class="section-subtitle">Stay updated with our latest travel stories and tips</p>
        </div> --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold display-7 text-primary mb-2">Our Blogs</h2>
            <p class="text-muted fs-5">Stay updated with our latest travel stories and tips</p>
        </div>
        <div class="row g-4">
            @foreach ($blogs as $blog)
                <div class="col-md-4">
                    <div class="card h-100 article-card">
                        <a href="{{ url('blogs/' . $blog['slug']) }}"
                            class="text-decoration-none text-dark d-block h-100">
                            <img src="{{ $blog['banner_url'] }}" class="card-img-top" alt="{{ $blog['title'] }}">
                            <div class="card-body">
                                <p class="text-muted small mb-1">
                                    {{ \Carbon\Carbon::parse($blog['published_at'])->format('M d, Y') }}</p>
                                <h5 class="card-title text-primary">{{ $blog['title'] }}</h5>
                                <p class="card-text">{{ $blog['sub_title'] }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            @if (count($blogs) > 2)
                <div class="text-center">

                    <a href="/blogs" class="btn btn-gradient">
                        See All Blogs <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>
            @endif
        </div>
    </div>
</section>
