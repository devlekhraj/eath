<style>
    .bg-deals {
        background: #ffecb5;
    }

    .deal-section {
        /* display: flex;
        flex-wrap: wrap;
        gap: 2rem; */
    }

    /* .deal-banner {
        flex: 1 1 300px;
    }

    .deal-products {
        flex: 3 1 600px;
    } */

    .swiper-slide .product-item {
        background: #fff;
        padding: 1rem;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }


    #deal-countdown>div {
        background: rgba(0, 0, 0, 0.05);
        padding: 0.25rem 0.75rem;
        border-radius: 0.5rem;
        text-align: center;
        min-width: 70px;
    }

    #deal-countdown span {
        font-size: 1.25rem;
        display: block;
    }
</style>

@php
    $products = collect([
        [
            'name' => 'Apple iPhone 16 Pro',
            'price' => 1199.0,
            'image' => '1.png',
            'rating' => 2.5,
            'tag' => 'Hot Deals',
            'is_fav' => 1,
        ],
        [
            'name' => 'Apple MacBook Pro 14” (M3, 2024)',
            'price' => 1999.0,
            'image' => '2.png',
            'rating' => 3.7,
            'tag' => 'Hot Deals',
            'is_fav' => 0,
        ],
        [
            'name' => 'Apple iPad Air M2 (2024)',
            'price' => 699.0,
            'image' => '3.png',
            'rating' => 4.2,
            'tag' => 'Hot Deals',
            'is_fav' => 1,
        ],
        [
            'name' => 'DJI Mini 4 Pro Drone',
            'price' => 759.0,
            'image' => '4.png',
            'rating' => 3.0,
            'tag' => 'Hot Deals',
            'is_fav' => 0,
        ]
    ]);
@endphp

<div id="hot-deals">
    <div class="container-fluid theme-space">
        <div class="px-3 pt-5">
            <div class="bg-deals p-4 rounded">
                <div class="mb-4 d-flex flex-wrap justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">🔥 Hot Deals <span class="text-danger">Get our Best Prices</span></h5>
                        <p class="text-dark mb-0">Hurry up! Offer Ends Soon ⏰</p>
                    </div>

                    <div id="deal-countdown" class="d-flex gap-1 text-dark fw-semibold mt-3 mt-md-0">
                        <div><span id="deal-days">00</span>
                            <div class="small">Days</div>
                        </div>
                        <div><span id="deal-hours">00</span>
                            <div class="small">Hours</div>
                        </div>
                        <div><span id="deal-minutes">00</span>
                            <div class="small">Minutes</div>
                        </div>
                        <div><span id="deal-seconds">00</span>
                            <div class="small">Seconds</div>
                        </div>
                    </div>
                </div>


                <div class="deal-section row">
                    <!-- Static Banner -->
                    <div class="col-12 col-lg-3">
                        <div class="deal-banner mb-4">
                            <img src="{{ asset('images/hot-deal/product-banner.png') }}"
                                class="img-fluid rounded shadow" alt="Deal Banner">
                        </div>
                    </div>
                    <!-- Swiper Slider -->
                    <div class="col-12 col-lg-9">
                        <!-- Swiper Slider -->
                        <div class="deal-products">
                            <div class="swiper hotDealSlider">
                                <div class="swiper-wrapper">
                                    @foreach ($products as $product)
                                        <div class="swiper-slide">
                                            @include('website.pages.landing._hot_product_card', [
                                                'name' => $product['name'],
                                                'price' => $product['price'],
                                                'image' => $product['image'],
                                                'rating' => $product['rating'],
                                                'tag' => $product['tag'],
                                                'is_fav' => $product['is_fav'],
                                            ])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper(".hotDealSlider", {
            slidesPerView: 1,
            spaceBetween: 16,
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                }
            },
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        const dealEndDate = new Date("2025-07-10T23:59:59").getTime();

        const updateDealCountdown = () => {
            const now = new Date().getTime();
            const distance = dealEndDate - now;

            if (distance < 0) return;

            document.getElementById("deal-days").innerText = String(Math.floor(distance / (1000 * 60 * 60 *
                24))).padStart(2, '0');
            document.getElementById("deal-hours").innerText = String(Math.floor((distance % (1000 * 60 *
                60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
            document.getElementById("deal-minutes").innerText = String(Math.floor((distance % (1000 * 60 *
                60)) / (1000 * 60))).padStart(2, '0');
            document.getElementById("deal-seconds").innerText = String(Math.floor((distance % (1000 * 60)) /
                1000)).padStart(2, '0');
        };

        updateDealCountdown();
        setInterval(updateDealCountdown, 1000);
    });
</script>

</script>
