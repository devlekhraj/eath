@php
    $reviews = [
        [
            'name' => 'Anita Sharma',
            'location' => 'Kathmandu, Nepal',
            'photo' => 'https://randomuser.me/api/portraits/women/45.jpg',
            'comment' => 'A truly unforgettable experience. The guide was amazing and the views were breathtaking!',
            'rating' => 5,
        ],
        [
            'name' => 'David Lee',
            'location' => 'Toronto, Canada',
            'photo' => 'https://randomuser.me/api/portraits/men/35.jpg',
            'comment' => 'Everything was well organized and smooth. Highly recommended for first-time trekkers.',
            'rating' => 4,
        ],
        [
            'name' => 'Sunita Thapa',
            'location' => 'Pokhara, Nepal',
            'photo' => 'https://randomuser.me/api/portraits/women/32.jpg',
            'comment' => 'Professional team and fantastic hospitality throughout the journey.',
            'rating' => 5,
        ],
        [
            'name' => 'Anita Sharma',
            'location' => 'Kathmandu, Nepal',
            'photo' => 'https://randomuser.me/api/portraits/women/45.jpg',
            'comment' => 'A truly unforgettable experience. The guide was amazing and the views were breathtaking!',
            'rating' => 5,
        ],
        [
            'name' => 'David Lee',
            'location' => 'Toronto, Canada',
            'photo' => 'https://randomuser.me/api/portraits/men/35.jpg',
            'comment' => 'Everything was well organized and smooth. Highly recommended for first-time trekkers.',
            'rating' => 4,
        ],
        [
            'name' => 'Sunita Thapa',
            'location' => 'Pokhara, Nepal',
            'photo' => 'https://randomuser.me/api/portraits/women/32.jpg',
            'comment' => 'Professional team and fantastic hospitality throughout the journey.',
            'rating' => 5,
        ],
        [
            'name' => 'Anita Sharma',
            'location' => 'Kathmandu, Nepal',
            'photo' => 'https://randomuser.me/api/portraits/women/45.jpg',
            'comment' => 'A truly unforgettable experience. The guide was amazing and the views were breathtaking!',
            'rating' => 5,
        ],
        [
            'name' => 'David Lee',
            'location' => 'Toronto, Canada',
            'photo' => 'https://randomuser.me/api/portraits/men/35.jpg',
            'comment' => 'Everything was well organized and smooth. Highly recommended for first-time trekkers.',
            'rating' => 4,
        ],
        [
            'name' => 'Sunita Thapa',
            'location' => 'Pokhara, Nepal',
            'photo' => 'https://randomuser.me/api/portraits/women/32.jpg',
            'comment' => 'Professional team and fantastic hospitality throughout the journey.',
            'rating' => 5,
        ],
    ];
@endphp

<section class="mt-5 pt-5 py-5">
    <div class="container">
        <h5 class="fw-bold text-primary mb-4">
            <i class="fa-solid fa-comments me-2"></i> What Our Customers Say
        </h5>

        <div class="swiper reviewSwiper">
            <div class="swiper-wrapper">
                @foreach ($reviews as $review)
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm h-100 mx-2 d-flex flex-column" style="min-height: 100%;">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ $review['photo'] }}" alt="{{ $review['name'] }}"
                                        class="rounded-circle me-3" width="50" height="50"
                                        style="object-fit: cover;">
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $review['name'] }}</h6>
                                        <small class="text-muted">{{ $review['location'] }}</small>
                                    </div>
                                </div>

                                {{-- Truncated or scrollable text --}}
                                <p class="text-muted flex-grow-1"
                                    style="overflow: hidden; max-height: 100px; text-overflow: ellipsis;">
                                    “{{ $review['comment'] }}”
                                </p>

                                {{-- Rating aligned to bottom --}}
                                <div class="text-warning mt-auto pt-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review['rating'])
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-regular fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Optional Pagination -->
            <div class="swiper-pagination mt-3"></div>
        </div>
    </div>
</section>
