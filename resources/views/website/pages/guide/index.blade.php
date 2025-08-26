@extends('website.layout.master')
@section('content')
    @php
        $guides = [
            [
                'name' => 'Lekh Raj Rai',
                'photo' => 'https://randomuser.me/api/portraits/men/10.jpg',
                'rating' => 4.5,
                'reviews' => 48,
                'languages' => ['English', 'Nepali'],
                'bio' =>
                    'Experienced mountain and cultural guide with 10+ years of leading tours in Nepal and Himalayas.',
            ],
            [
                'name' => 'Anita Gurung',
                'photo' => 'https://randomuser.me/api/portraits/women/20.jpg',
                'rating' => 5,
                'reviews' => 63,
                'languages' => ['English', 'Nepali', 'Tamang'],
                'bio' => 'Friendly and knowledgeable guide specializing in trekking and cultural tours across Nepal.',
            ],
            [
                'name' => 'Rajendra Lama',
                'photo' => 'https://randomuser.me/api/portraits/men/30.jpg',
                'rating' => 4,
                'reviews' => 27,
                'languages' => ['English', 'Nepali', 'Hindi'],
                'bio' => 'Skilled guide with passion for adventure trekking and wildlife tours in Nepal.',
            ],
            [
                'name' => 'Sita Rai',
                'photo' => 'https://randomuser.me/api/portraits/women/40.jpg',
                'rating' => 4.8,
                'reviews' => 55,
                'languages' => ['English', 'Nepali', 'Rai'],
                'bio' => 'Certified trekking guide with a warm personality and deep knowledge of Himalayan culture.',
            ],
            [
                'name' => 'Mohan KC',
                'photo' => 'https://randomuser.me/api/portraits/men/50.jpg',
                'rating' => 4.2,
                'reviews' => 40,
                'languages' => ['English', 'Nepali'],
                'bio' => 'Adventure enthusiast who loves leading challenging mountain expeditions across Nepal.',
            ],
            [
                'name' => 'Laxmi Sherpa',
                'photo' => 'https://randomuser.me/api/portraits/women/60.jpg',
                'rating' => 5,
                'reviews' => 80,
                'languages' => ['English', 'Nepali', 'Sherpa'],
                'bio' => 'Experienced in cultural and wildlife tours, especially in the Everest region.',
            ],
            [
                'name' => 'Dipendra Tamang',
                'photo' => 'https://randomuser.me/api/portraits/men/70.jpg',
                'rating' => 3.9,
                'reviews' => 20,
                'languages' => ['English', 'Nepali', 'Tamang'],
                'bio' => 'Multilingual guide specializing in city tours and historical landmarks.',
            ],
            [
                'name' => 'Priya Shrestha',
                'photo' => 'https://randomuser.me/api/portraits/women/80.jpg',
                'rating' => 4.7,
                'reviews' => 70,
                'languages' => ['English', 'Nepali'],
                'bio' => 'Passionate about eco-tourism and sustainable travel in Nepal’s remote regions.',
            ],
        ];

        // Function to render stars based on rating
        function renderStars($rating)
        {
            $fullStars = floor($rating);
            $halfStar = $rating - $fullStars >= 0.5;
            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
            $html = '';

            for ($i = 0; $i < $fullStars; $i++) {
                $html .= '<i class="fas fa-star"></i>';
            }
            if ($halfStar) {
                $html .= '<i class="fas fa-star-half-alt"></i>';
            }
            for ($i = 0; $i < $emptyStars; $i++) {
                $html .= '<i class="far fa-star"></i>';
            }
            return $html;
        }
    @endphp
    <style>
        .card-img-top {
            aspect-ratio: 16 / 9;
            /* or 4 / 3, 1 / 1, etc */
            width: 100%;
            /* responsive width */
            object-fit: cover;
        }
    </style>
    @php
        $pageSubtitle = "Meet our highly skilled and experienced travel guides who will make your Nepal journey unforgettable. They are
            passionate about sharing the beauty, culture, and adventure of Nepal with you.";
    @endphp
    <div class="container py-5">
        <h2 class="mb-3 text-center fw-bold" style="letter-spacing: 0.05em; color: #222;">
            {{ isset($settings['guide_profile_page_title']) ? $settings['guide_profile_page_title'] : 'Contact Us' }}
        </h2>

        <p class="text-center text-muted mb-5"
            style="max-width: 700px; margin-left: auto; margin-right: auto; font-size: 1.1rem; line-height: 1.5;">
            {{ isset($settings['guide_profile_page_sub_title']) ? $settings['guide_profile_page_sub_title'] : $pageSubtitle }}
        </p>

        @php
            $randomRating = rand(1, 5); // random rating between 1 and 5
            $randomReviews = rand(0, 200); // random number of reviews
        @endphp
        <div class="row g-4">
            @if (count($guideList) > 0)
                @foreach ($guideList as $guide)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm border-0 h-100">
                            <img src="{{ $guide['avatar'] }}" class="card-img-top" alt="Guide Photo"
                                style="height: 280px; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold mb-2">{{ $guide['name'] }}</h5>
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="text-warning me-2" aria-label="Rating: {{ $randomRating }} out of 5 stars">
                                        {!! renderStars($randomRating) !!}
                                    </div>
                                    <small class="text-muted">({{ $randomReviews }} reviews)</small>
                                </div>

                                <p class="mb-2">
                                    <strong>Languages:</strong> {{ implode(', ', $guide['language_spoken']) }}
                                </p>

                                <p class="card-text text-muted flex-grow-1" style="font-size: 0.95rem;">
                                    {{ $guide['bio'] }}
                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach ($guides as $guide)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm border-0 h-100">
                            <img src="{{ $guide['photo'] }}" class="card-img-top" alt="Guide Photo"
                                style="height: 280px; object-fit: cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold mb-2">{{ $guide['name'] }}</h5>
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="text-warning me-2"
                                        aria-label="Rating: {{ $guide['rating'] }} out of 5 stars">
                                        {!! renderStars($guide['rating']) !!}
                                    </div>
                                    <small class="text-muted">({{ $guide['reviews'] }} reviews)</small>
                                </div>
                                <p class="mb-2"><strong>Languages:</strong> {{ implode(', ', $guide['languages']) }}</p>
                                {{-- <p class="card-text text-muted flex-grow-1" style="font-size: 0.95rem;">
                                    {{ $guide['bio'] }}
                                </p> --}}
                                <div class="vuetify-pro-tiptap-editor__content view markdown-theme-default">
                                    {!! $guide['bio'] !!}
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
