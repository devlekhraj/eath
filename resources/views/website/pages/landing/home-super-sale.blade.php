<!-- Demo styles -->
<style>
    #super-sale {
        padding: 2rem 1rem;
        margin: 0 auto;
    }

    #super-sale .swiper {
        width: 100%;
        height: 100%;
    }

    #super-sale .swiper-slide {
        text-align: center;
        font-size: 18px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
    }

    #super-sale .swiper-slide img {
        display: block;
        object-fit: contain;
        border-radius: 8px;
    }

 
</style>

@php
    $brands = collect([
        ['name' => 'Apple', 'logo' => 'apple.png'],
        ['name' => 'Samsung', 'logo' => 'samsung.png'],
        ['name' => 'Realme', 'logo' => 'realme.png'],
        ['name' => 'Xiaomi', 'logo' => 'xiaomi.png'],
        ['name' => 'Sony', 'logo' => 'sony.png'],
        ['name' => 'DJI', 'logo' => 'dji.png'],
        ['name' => 'LG', 'logo' => 'lg.png'],
        ['name' => 'OnePlus', 'logo' => 'oneplus.png'],
        ['name' => 'Huawei', 'logo' => 'huawei.png'],
        // ['name' => 'Google', 'logo' => 'google.png'],
    ]);
@endphp

<div id="super-sale" class="container-fluid theme-space">
    <div class="px-3">
        @include('website.pages.landing._section_title', [
            'first_word' => 'Super Sale',
            'second_word' => '18 April - 7 May',
        ])

        <div class="swiper productSwiper">
            <div class="swiper-wrapper">
                @foreach ($brands as $key => $brand)
                    <div class="swiper-slide d-flex flex-column align-items-center">
                        <img src="{{ asset('images/super-sale-products/' . $key+1 . '.png') }}" alt="{{ $brand['name'] }} logo"
                            loading="lazy" style="object-fit: contain;">
                        <span class="mt-2 fw-semibold">{{ $brand['name'] }}</span>
                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
            {{-- <div class="swiper-pagination mt-3"></div> --}}
        </div>

        
        @include('website.pages.landing._super_sale_products');

    </div>
</div>

<!-- Separate Swiper Init -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productSwiper = new Swiper("#super-sale .productSwiper", {
            slidesPerView: 3,
            spaceBetween: 12,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 6, // 3 slides on large screen
                    spaceBetween: 10,
                },
                1280: {
                    slidesPerView: 7,
                    spaceBetween: 20,
                },
            },
        });
    });
</script>
