<style>
    .swiper {
        width: 100%;
        min-height: 200px;
        max-height: 400px;
        height: auto;
        position: relative;
        border-radius: 16px;
        overflow: hidden;
    }

    .swiper-slide img {
        width: 100%;
        height: auto;
        min-height: 200px;
        max-height: 400px;
        object-fit: cover;
        border-radius: 16px;
        display: block;
    }

    /* Smaller screens: reduce max height */
    @media (max-width: 768px) {
        .swiper {
            max-height: 400px;
        }

        .swiper-slide img {
            max-height: 400px;
        }
    }

    /* Hide default Swiper arrows */
    .swiper-button-next::after,
    .swiper-button-prev::after {
        display: none;
    }

    .swiper-button-next,
    .swiper-button-prev {
        background: #f2fdff;
        border-radius: 50%;
        height: 58px;
        width: 58px;
        padding: 14px;
        border: 8px solid #ffffff;
    }
</style>

<div class="px-3">
    <div class="container-fluid theme-space">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://placehold.co/1500x400" alt="Slide 1" />
                </div>
                <div class="swiper-slide">
                    <img src="https://placehold.co/1500x400" alt="Slide 2" />
                </div>
                <div class="swiper-slide">
                    <img src="https://placehold.co/1500x400" alt="Slide 3" />
                </div>
                <div class="swiper-slide">
                    <img src="https://placehold.co/1500x400" alt="Slide 4" />
                </div>
            </div>

            <!-- Custom Lucide Navigation Icons -->
            <div class="swiper-button-prev d-none d-sm-flex">
                <i data-lucide="chevron-left"></i>
            </div>
            <div class="swiper-button-next d-none d-sm-flex">
                <i data-lucide="chevron-right"></i>
            </div>


            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Swiper
        new Swiper('.mySwiper', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        // Initialize Lucide Icons
        lucide.createIcons();
    });
</script>
