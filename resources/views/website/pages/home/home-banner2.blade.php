<style>
    .hero-bg-gradient {
        background: linear-gradient(135deg,
                #f7fcff 0%,
                #edf8ff 28%,
                #e0f3ff 58%,
                #d6eeff 100%);
        padding-top: 80px;
        padding-bottom: 80px;
    }


    .heroSwiper .swiper-pagination-bullet-active {
        background-color: #0d6efd;
        width: 20px;
        border-radius: 8px;
    }

    /* Aspect ratio wrapper (2.40:1) */
    .hero-image-wrapper {
        width: 100%;
        aspect-ratio: 1.8 / 1;
        /* === 2.40:1 */
        overflow: hidden;
        border-radius: 14px;
        /* optional */
    }

    /* Image fill */
    .hero-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(135deg, #00aaff, #007ad6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Paragraph Style */
    .hero-desc {
        font-size: 1.1rem;
        line-height: 1.75;
        color: #2d2d2d;
        max-width: 92%;
        font-weight: 400;
        letter-spacing: 0.2px;
        opacity: 0.92;
    }

    /* Primary Filled Button */
    .hero-btn-primary {
        background: linear-gradient(135deg, #0095ff, #006fd6);
        color: #fff !important;
        padding: 12px 26px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: 0.25s ease;
        box-shadow: 0 6px 16px rgba(0, 123, 255, 0.25);
    }

    .hero-btn-primary:hover {
        background: linear-gradient(135deg, #007fe0, #005bb8);
        transform: translateY(-2px);
        color: #fff !important;
    }

    /* Outline Button */
    .hero-btn-outline {
        border: 2px solid #0095ff;
        color: #0095ff !important;
        padding: 12px 26px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: 0.25s ease;
        background: transparent;
    }

    .hero-btn-outline:hover {
        background: rgba(0, 149, 255, 0.08);
        transform: translateY(-2px);
        color: #007ad6 !important;
        border: 2px solid #0095ff;
    }

    /* Icon inside both buttons */
    .btn-icon {
        font-size: 1.15rem;
        line-height: 1;
        display: inline-block;
    }

    .text-tagline {
        color: rgb(236 146 20) !important;
    }
</style>

<!-- HERO SECTION -->
<div class="hero-bg-gradient">
    <section class="container py-5">
        <div class="row align-items-center">

            <div class="col-lg-5 mb-4 mb-lg-0">


                <h1 class="display-5 fw-bold mt-2">
                    Adventure Awaits in the Himalayas<br>
                    <span class="gradient-text">Are You Ready?</span>

                </h1>

                <small class="text-uppercase text-tagline fw-semibold">Easy Access To Himalayas ·
                    {{ now()->year }}</small>

                <div class="d-flex gap-3 mt-4">

                    <!-- Primary Button -->
                    <a href="#" class="btn hero-btn-primary d-flex align-items-center gap-2">
                        Explore Packages
                        <i class="fa-solid fa-arrow-right btn-icon"></i>
                    </a>

                    <!-- Outline Button -->
                    <a href="#" class="btn hero-btn-outline d-flex align-items-center gap-2">
                        <i class="fa-solid fa-play btn-icon"></i>
                        Plan Your Trip
                    </a>
                </div>


            </div>



            <!-- RIGHT SLIDER -->
            <div class="col-lg-7">
                <div class="swiper heroSwiper  overflow-hidden" style="border-radius: 14px;">
                    <div class="swiper-wrapper">

                        @php
                            $banners = $mainBanner->images;
                            if (!$banners || count($banners) === 0) {
                                $banners = collect([
                                    (object) ['url' => '/images/banners/1.png'],
                                    (object) ['url' => '/images/banners/2.png'],
                                    (object) ['url' => '/images/banners/3.png'],
                                ]);
                            }
                        @endphp

                        @foreach ($banners as $banner)
                            <div class="swiper-slide">
                                <div class="hero-image-wrapper">
                                    <img src="{{ $banner->url }}" class="hero-image">
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new Swiper(".heroSwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            }
        });
    });
</script>
