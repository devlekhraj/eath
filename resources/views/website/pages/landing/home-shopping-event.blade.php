<style>
    #shopping-event-banner {
        background: linear-gradient(to bottom, #ffe066, #87ceeb);
        color: #000;
    }

    #shopping-event-banner #countdown > div {
        min-width: 70px;
        background: rgba(0, 0, 0, 0.1);
        padding: 0.4rem 0.75rem;
        border-radius: 0.5rem;
        text-align: center;
    }

    #shopping-event-banner #countdown span {
        font-size: clamp(1.25rem, 2vw + 0.5rem, 2rem);
        font-weight: 600;
        display: block;
    }

    /* Responsive Row Behavior */
    @media (max-width: 768px) {
        #shopping-event-banner .row {
            flex-direction: column-reverse !important;
            text-align: center;
        }

        #shopping-event-banner .banner-image {
            margin-bottom: 1.5rem;
        }

        #shopping-event-banner #countdown {
            justify-content: center !important;
        }
    }

    /* Event Grid Styling */
    .event-item-wrapper {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    @media (min-width: 768px) {
        .event-item-wrapper {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 1200px) {
        .event-item-wrapper {
            grid-template-columns: repeat(5, 1fr);
        }
    }

    .event-item h5 {
        font-size: clamp(1rem, 1vw + 0.5rem, 1.25rem);
    }

    .event-item p {
        font-size: clamp(0.9rem, 0.8vw + 0.4rem, 1.1rem);
    }
</style>

<section id="shopping-event-banner" class="py-5 text-center position-relative">
    <div class="container-fluid theme-space">
        <div class="row align-items-center text-md-start text-white">
            <!-- Banner Image -->
            <div class="col-md-6 banner-image">
                <img src="{{ asset('images/shopping-event/event.webp') }}" alt="Shopping Event Banner" class="img-fluid">
            </div>

            <!-- Countdown Text -->
            <div class="col-md-6">
                <h2 class="fw-bold mb-3" style="font-size: clamp(1.75rem, 3vw + 1rem, 2.5rem);">Mega Shopping Event!</h2>
                <p class="lead mb-4" style="font-size: clamp(1rem, 2vw + 0.5rem, 1.25rem);">Grab your favorite items before the offer ends.</p>
                <div id="countdown" class="d-flex justify-content-start gap-2 gap-md-3 fs-6 fw-semibold flex-wrap">
                    <div><span id="days">00</span><div class="small">Days</div></div>
                    <div><span id="hours">00</span><div class="small">Hours</div></div>
                    <div><span id="minutes">00</span><div class="small">Minutes</div></div>
                    <div><span id="seconds">00</span><div class="small">Seconds</div></div>
                </div>
                <a href="#" class="btn btn-warning btn-lg mt-4 px-4 py-2 rounded-pill">Shop Now</a>
            </div>
        </div>

        @php
            $products = [
                ['name' => 'iPhone 15', 'rating' => 5, 'reviews' => 120, 'price' => 1349],
                ['name' => 'Samsung Galaxy S23', 'rating' => 4, 'reviews' => 98, 'price' => 1099],
                ['name' => 'Google Pixel 8', 'rating' => 4, 'reviews' => 74, 'price' => 999],
                ['name' => 'OnePlus 11', 'rating' => 3, 'reviews' => 65, 'price' => 859],
                ['name' => 'Xiaomi 13 Pro', 'rating' => 4, 'reviews' => 52, 'price' => 799],
            ];
        @endphp

        <div class="py-4 px-4">
            <div class="event-item-wrapper">
                @foreach ($products as $product)
                    <div class="event-item bg-light p-3 rounded shadow-sm text-center">
                        <h5 class="fw-bold mb-2">{{ $product['name'] }}</h5>
                        <p class="fw-semibold text-success mb-2">${{ number_format($product['price'], 2) }}</p>
                        <div class="text-warning mb-1">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $product['rating'])
                                    <i class="fa-solid fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <small class="text-muted">({{ $product['reviews'] }} reviews)</small>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const eventDate = new Date("2025-07-10T23:59:59").getTime();

        const countdown = () => {
            const now = new Date().getTime();
            const distance = eventDate - now;

            if (distance < 0) return;

            document.getElementById("days").innerText = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
            document.getElementById("hours").innerText = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
            document.getElementById("minutes").innerText = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
            document.getElementById("seconds").innerText = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
        };

        countdown();
        setInterval(countdown, 1000);
    });
</script>
