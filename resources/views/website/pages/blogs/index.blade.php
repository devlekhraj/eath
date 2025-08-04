@extends('website.layout.master')
@section('content')
    <style>
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .text-truncate-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .title-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 3.2rem;
            /* Ensures space for two lines based on font-size + line-height */
        }
    </style>


    <div class="container py-5">
        <h2 class="mb-3 text-center fw-bold" style="letter-spacing: 0.05em; color: #222;">
            Latest Travel Blogs
        </h2>

        <p class="text-center text-muted mb-5" style="max-width: 720px; margin: 0 auto; font-size: 1.1rem; line-height: 1.6;">
            Discover inspiring stories, expert travel tips, and hidden treasures of Nepal shared by our seasoned explorers.
            Start your journey through words.
        </p>

        {{-- @php
            $blogs = [
                [
                    'title' => 'Exploring the Hidden Gems of Mustang',
                    'slug' => 'exploring-the-hidden-gems-of-mustang',
                    'image' => 'https://source.unsplash.com/600x400/?mountain,nepal',
                    'excerpt' =>
                        'Mustang offers surreal landscapes and ancient Tibetan culture. Discover the lesser-known trails and villages tucked in the shadows of the Himalayas.',
                    'date' => 'August 1, 2025',
                    'author' => 'Admin',
                ],
                [
                    'title' => 'Top 5 Treks for Beginners in Nepal',
                    'slug' => 'top-5-treks-for-beginners-in-nepal',
                    'image' => 'https://source.unsplash.com/600x400/?trekking,nepal',
                    'excerpt' =>
                        'New to trekking? Here are the top 5 beginner-friendly treks in Nepal that offer stunning views without the extreme difficulty.',
                    'date' => 'July 25, 2025',
                    'author' => 'Lekh Raj',
                ],
                [
                    'title' => 'Culture and Cuisine: A Journey Through Kathmandu',
                    'slug' => 'culture-and-cuisine-a-journey-through-kathmandu',
                    'image' => 'https://source.unsplash.com/600x400/?kathmandu,nepal',
                    'excerpt' =>
                        'Explore the vibrant culture, street food, and sacred heritage sites of Nepal’s capital city, Kathmandu. Explore the vibrant culture, street food, and sacred heritage sites of Nepal’s capital city, Kathmandu.Explore the vibrant culture, street food, and sacred heritage sites of Nepal’s capital city, Kathmandu.Explore the vibrant culture, street food, and sacred heritage sites of Nepal’s capital city, Kathmandu.Explore the vibrant culture, street food, and sacred heritage sites of Nepal’s capital city, Kathmandu.',
                    'date' => 'July 10, 2025',
                    'author' => 'Priya Shrestha',
                ],
            ];

        @endphp --}}

        <div class="row g-4">
            @foreach ($blogs as $blog)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ url('blogs/' . $blog['slug']) }}" class="text-decoration-none text-reset">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden transition"
                            style="transition: transform 0.3s ease;">
                            <img src="{{ $blog['banner_url'] }}" class="card-img-top" alt="{{ $blog['title'] }}"
                                title="{{ $blog['title'] }}" loading="lazy" style="height: 220px; object-fit: cover;">

                            <div class="card-body d-flex flex-column px-4 py-4">
                                <h5 class="fw-bold text-info mb-2 title-truncate-2"
                                    style="font-size: 1.2rem; line-height: 1.6;">
                                    {{ $blog['title'] }}
                                </h5>

                                <small class="text-muted mb-2 d-block">
                                    By {{ $blog['author'] }} | {{ format_date($blog['published_at']) }}
                                </small>

                                <p class="text-muted mb-3 flex-grow-1 text-truncate-3"
                                    style="font-size: 0.95rem; line-height: 1.5;">
                                    {{ $blog['sub_title'] }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
