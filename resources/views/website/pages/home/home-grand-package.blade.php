<style>
    .offer-tag {
        display: inline-block;
        background: linear-gradient(135deg, #ff8a00, #e52e71);
        color: #fff;
        font-weight: 600;
        padding: 0.5rem 1.2rem;
        border-radius: 10px;
        /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); */
        font-size: 1rem;
        letter-spacing: 0.5px;
        transition: transform 0.2s ease;
    }

    .offer-tag:hover {
        transform: scale(1.08);
    }
</style>
@php
    $grandPackage = [
        'title' => 'Grand Everest Adventure Package',
        'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80',
        'duration' => '15 Days',
        'price' => '$1800',
        'people' => 20,
        'reviews' => 98,
        'rating' => 4.8,
        'description' =>
            'Join the ultimate trekking experience with expert guides, comfortable accommodations, and breathtaking views of the Everest region. Open to all adventurers!',
        'start_date' => '2025-09-15 08:00:00',
        'url' => '#book-grand-package',
    ];
@endphp

<section class="grand-package-highlight py-5"
    style="background: radial-gradient(circle at center, #f6faff 40%, #ffffff 100%);color: #333;">
    <div class="container py-5">

        @foreach ($featuredPackages as $package)
            <div class="row align-items-center mb-4">
                <!-- Image -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="image-wrapper rounded shadow-lg w-100" style="aspect-ratio: 4/3; overflow: hidden;">
                        <img src="{{ $package['banner_url'] }}" alt="{{ $package['title'] }}" class="w-100 h-100"
                            style="object-fit: cover;">
                    </div>
                </div>


                <!-- Details -->
                <div class="col-md-6">
                    <h2 class="fw-bold mb-3 text-primary">{{ $package['title'] }}</h2>
                    <div class="pb-0 mb-3">
                        <div class="pb-0">
                            <div>
                                <h3 class="fw-bold text-secondary">
                                    ${{ number_format((float) trim($package['price'], '$'), 2) }}
                                </h3>
                            </div>
                            <div class="mt-2">
                                <span class="offer-tag">
                                    🌟 All Inclusive
                                </span>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: justify">
                        <p class="mb-3">{{ $package['highlight'] ?? $package['description'] }}</p>
                    </div>

                    <div class="mb-3">
                        <span class="badge bg-light text-primary me-2">{{ $package['duration'] }}</span>
                        <span class="badge bg-light text-primary me-2">{{ $package['group_size'] }} People</span>
                        <span
                            class="badge bg-light text-primary">{{ \Carbon\Carbon::parse($package['end_date'])->format('M d, Y') }}</span>
                    </div>

                    <!-- Countdown boxes -->
                    {{-- <div id="countdown" class="d-flex gap-3 mb-3">
                        <div class="countdown-box text-center p-3 rounded bg-white text-primary fw-bold">
                            <div id="days" class="fs-3">--</div>
                            <div class="small">Days</div>
                        </div>
                        <div class="countdown-box text-center p-3 rounded bg-white text-primary fw-bold">
                            <div id="hours" class="fs-3">--</div>
                            <div class="small">Hours</div>
                        </div>
                        <div class="countdown-box text-center p-3 rounded bg-white text-primary fw-bold">
                            <div id="minutes" class="fs-3">--</div>
                            <div class="small">Minutes</div>
                        </div>
                        <div class="countdown-box text-center p-3 rounded bg-white text-primary fw-bold">
                            <div id="seconds" class="fs-3">--</div>
                            <div class="small">Seconds</div>
                        </div>
                    </div> --}}
                    <div class="countdown-container d-flex gap-3 mb-3" data-start="{{ $package['end_date'] }}">
                        <div class="countdown-box text-center p-3 rounded bg-white text-primary fw-bold">
                            <div class="days fs-3">--</div>
                            <div class="small">Days</div>
                        </div>
                        <div class="countdown-box text-center p-3 rounded bg-white text-primary fw-bold">
                            <div class="hours fs-3">--</div>
                            <div class="small">Hours</div>
                        </div>
                        <div class="countdown-box text-center p-3 rounded bg-white text-primary fw-bold">
                            <div class="minutes fs-3">--</div>
                            <div class="small">Minutes</div>
                        </div>
                        <div class="countdown-box text-center p-3 rounded bg-white text-primary fw-bold">
                            <div class="seconds fs-3">--</div>
                            <div class="small">Seconds</div>
                        </div>
                    </div>


                    {{-- <div class="d-flex align-items-center mb-3">
                        <h3 class="fw-bold me-4">${{ number_format((float) trim($grandPackage['price'], '$'), 2) }}</h3>
                        <div class="text-warning fs-5">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($grandPackage['rating']))
                                    <i class="fa-solid fa-star"></i>
                                @elseif ($i == ceil($grandPackage['rating']) && $grandPackage['rating'] - floor($grandPackage['rating']) > 0)
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="ms-2 text-light small">{{ $grandPackage['reviews'] }} Reviews</span>
                    </div> --}}

                    {{-- <button class="btn btn-primary btn-lg fw-semibold shadow-sm btnOpenModal" data-type="featured_packages" data-id="{{ $package['id'] }}">
                        Join Now <i class="fa-solid fa-arrow-right ms-2"></i>
                    </button> --}}
                    <div>
                        <div>
                            <button class="btn btn-gradient btnOpenModal" data-type="featured_packages"
                                data-id="{{ $package['id'] }}">
                                Join Now <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</section>

<style>
    .countdown-box {
        width: 100px;
        box-shadow: 0 0 10px rgb(0 0 0 / 0.1);
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.countdown-container').each(function() {
            var container = $(this);

            // Get start date (Y-m-d) and convert to timestamp at 23:59:59
            var startDateStr = container.data('start'); // e.g., "2025-08-20"
            var countdownDate = new Date(startDateStr + 'T23:59:59').getTime();

            function updateCountdown() {
                var now = new Date().getTime();
                var distance = countdownDate - now;

                if (distance < 0) {
                    container.html(
                        "<div class='text-light fw-bold fs-5'>This package has started!</div>");
                    clearInterval(timer);
                    return;
                }

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                container.find('.days').text(days);
                container.find('.hours').text(hours);
                container.find('.minutes').text(minutes);
                container.find('.seconds').text(seconds);
            }

            updateCountdown();
            var timer = setInterval(updateCountdown, 1000);
        });
    });
</script>
