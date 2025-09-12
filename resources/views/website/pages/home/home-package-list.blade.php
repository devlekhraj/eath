<div style="background: radial-gradient(circle at center, #f6faff 40%, #ffffff 100%);">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-7 text-primary mb-2">
                {{ isset($settings['title_1']) ? $settings['title_1'] : 'Our Trekking Packages' }} </h2>
            <p class="text-muted fs-5">
                {{ isset($settings['sub_title_1']) ? $settings['sub_title_1'] : 'Discover handpicked adventures crafted for unforgettable experiences' }}
            </p>
        </div>

        @php
            if (empty($packages)) {
                $packages = [
                    [
                        'title' => 'Everest Base Camp Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '15 Days',
                        'price' => '$1200',
                        'people' => 12,
                        'reviews' => 45,
                        'rating' => 4.5,
                    ],
                    [
                        'title' => 'Annapurna Circuit Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '15 Days',
                        'price' => '$1400',
                        'people' => 10,
                        'reviews' => 39,
                        'rating' => 4.0,
                    ],
                    [
                        'title' => 'Langtang Valley Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '15 Days',
                        'price' => '$900',
                        'people' => 8,
                        'reviews' => 21,
                        'rating' => 3.5,
                    ],
                    [
                        'title' => 'Ghorepani Poon Hill Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '7 Days',
                        'price' => '$700',
                        'people' => 15,
                        'reviews' => 30,
                        'rating' => 4.2,
                    ],
                    [
                        'title' => 'Upper Mustang Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '14 Days',
                        'price' => '$1300',
                        'people' => 6,
                        'reviews' => 12,
                        'rating' => 3.8,
                    ],
                    [
                        'title' => 'Manaslu Circuit Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '18 Days',
                        'price' => '$1500',
                        'people' => 9,
                        'reviews' => 22,
                        'rating' => 4.3,
                    ],
                    [
                        'title' => 'Makalu Base Camp Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '15 Days',
                        'price' => '$1600',
                        'people' => 7,
                        'reviews' => 18,
                        'rating' => 4.1,
                    ],
                    [
                        'title' => 'Kanchenjunga Base Camp Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '21 Days',
                        'price' => '$1800',
                        'people' => 5,
                        'reviews' => 14,
                        'rating' => 4.7,
                    ],
                    [
                        'title' => 'Rara Lake Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '9 Days',
                        'price' => '$850',
                        'people' => 11,
                        'reviews' => 20,
                        'rating' => 4.0,
                    ],
                    [
                        'title' => 'Helambu Trek',
                        'image' =>
                            'https://media.istockphoto.com/id/2201384385/photo/construction-worker-spraying-house-insulation.jpg?s=2048x2048&w=is&k=20&c=MOfZtDnvINtEiSszK-5J2dB31XL9HgoWIHwzHmBEJtg=',
                        'duration' => '15 Days',
                        'price' => '$750',
                        'people' => 13,
                        'reviews' => 25,
                        'rating' => 4.4,
                    ],
                ];
            }

        @endphp


        <div class="swiper" id="travel-packages">
            <div class="swiper-wrapper">
                @foreach ($packages as $package)
                    <div class="swiper-slide">
                        <div class="card border-0 bg-white h-100">
                            <a href="/packages/{{ $package->slug }}">
                                <img src="{{ $package['image'] }}" class="card-img-top" alt="{{ $package['name'] }}"
                                    style="height: 210px; object-fit: cover;">
                                <div class="card-body p-3 d-flex flex-column">
                                    <div class="mb-3">
                                        <strong class="d-block mb-1">{{ $package['name'] }}</strong>
                                    </div>


                                    <!-- Price and reviews on same row -->
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        @if (isset($package->featured))
                                            <p class="fw-bold text-primary mb-0">
                                                {{ format_price($package->featured->price) }}</p>
                                        @else
                                            <p class="fw-bold text-primary mb-0">
                                                {{ format_price($package['min_price']) }}</p>
                                        @endif
                                        <div class="d-flex align-items-center text-muted mb-0">
                                            @php
                                                $fullStars = floor($package['rating']);
                                                $halfStar = $package['rating'] - $fullStars >= 0.5 ? 1 : 0;
                                                $emptyStars = 5 - $fullStars - $halfStar;
                                            @endphp

                                            @for ($i = 0; $i < $fullStars; $i++)
                                                <i class="fa-solid fa-star text-warning me-1"></i>
                                            @endfor
                                            @if ($halfStar)
                                                <i class="fa-solid fa-star-half-stroke text-warning me-1"></i>
                                            @endif
                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                <i class="fa-regular fa-star text-warning me-1"></i>
                                            @endfor

                                            {{-- <span class="small ms-2">({{ $package['reviews'] }})</span> --}}
                                        </div>
                                    </div>

                                    <!-- Duration and people on next row -->
                                    <div class="d-flex justify-content-start gap-3 mb-2 text-muted small mt-3">
                                        <div><i class="fa-regular fa-clock me-1"></i> {{ $package['duration'] }}</div>
                                        <div><i class="fa-solid fa-user-group me-1"></i> {{ $package['people'] }} People
                                        </div>
                                    </div>
                                    <span
                                        class="position-absolute top-0 end-0 bg-success text-white small px-2 py-1 rounded-bottom-start"
                                        style="font-weight:600;">
                                        Popular
                                    </span>


                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination travel-package-pagination mt-3"></div>
        </div>

        {{-- <div class="py-5 my-5">
            <div class="rounded-2 p-4  border border-primary-subtle bg-white">
                <h5 class="fw-bold mb-4 text-primary">
                    <i class="fa-solid fa-plane-departure me-2"></i> Know Before You Go
                </h5>
                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-start mb-3">
                        <div style="width: 30px;">
                            <i class="fa-solid fa-circle-info text-primary"></i>
                        </div>
                        <span>Prices may vary depending on the travel season and availability.</span>
                    </li>
                    <li class="d-flex align-items-start mb-3">
                        <div style="width: 30px;">
                            <i class="fa-solid fa-clock text-primary"></i>
                        </div>
                        <span>All durations are approximate and may vary due to weather or local conditions.</span>
                    </li>
                    <li class="d-flex align-items-start mb-3">
                        <div style="width: 30px;">
                            <i class="fa-solid fa-user-shield text-primary"></i>
                        </div>
                        <span>A professional guide and porter service is included in all trekking packages.</span>
                    </li>
                    <li class="d-flex align-items-start mb-3">
                        <div style="width: 30px;">
                            <i class="fa-solid fa-file-contract text-primary"></i>
                        </div>
                        <span>Please read our terms and conditions before confirming your booking.</span>
                    </li>
                    <li class="d-flex align-items-start">
                        <div style="width: 30px;">
                            <i class="fa-solid fa-phone text-primary"></i>
                        </div>
                        <span>
                            For customization or special group rates, feel free to
                            <a href="#contact" class="text-decoration-underline">contact us</a>.
                        </span>
                    </li>
                </ul>
            </div>
        </div> --}}



    </div>
</div>
