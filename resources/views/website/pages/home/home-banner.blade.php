{{-- <div id="home-banner">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="/images/banners/1.png" alt="Banner 1" class="img-fluid w-100 banner-img" />
      </div>
      <div class="swiper-slide">
        <img src="/images/banners/2.png" alt="Banner 2" class="img-fluid w-100 banner-img" />
      </div>
      <div class="swiper-slide">
        <img src="/images/banners/3.png" alt="Banner 3" class="img-fluid w-100 banner-img" />
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div> --}}

<style>
    /* Aspect Ratio Wrapper */
    .main-swiper {
        width: 100%;
        aspect-ratio: 16 / 5.6;
        /* Approx 22.5% height from width */
        position: relative;
        overflow: hidden;
        border-radius: 6px;
    }

    /* Swiper Slide Setup */
    .main-swiper .swiper-slide {
        width: 100%;
        height: 100%;
        position: relative;
    }

    /* Responsive Image that fits the area */
    .main-swiper .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .swiper-pagination-bullet-active {
        width: 24px;
        /* longer than others */
        background: #f5811c;
    }

   
</style>



@php
    $banners = ['/images/banners/1.png', '/images/banners/2.png', '/images/banners/3.png'];
@endphp


<div>
    <!-- Swiper HTML markup -->
    <div class="swiper main-swiper">
        <div class="swiper-wrapper">

            @foreach ($banners as $banner)
                <div class="swiper-slide">

                    <img src="{{ $banner }}" alt="Slide 1" class="img-fluid w-100" />

                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Navigation buttons -->
        {{-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> --}}

    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.main-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>
