<!-- Demo styles -->
<style>
    #electronic-brands {
        padding: 2rem 1rem;
        margin: 0 auto;
    }

    #electronic-brands .swiper {
        width: 100%;
        height: 100%;
    }

    #electronic-brands .swiper-slide {
        text-align: center;
        font-size: 18px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
    }

    #electronic-brands .swiper-slide img {
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

<div id="electronic-brands" class="container-fluid theme-space">
    <div class="px-3">
        @include('website.pages.landing._section_title', [
            'first_word' => 'Top',
            'second_word' => 'Washing Machines',
        ])

        <div class="swiper productSwiper">
            <div class="swiper-wrapper">
                @foreach ($brands as $key => $brand)
                    <div class="swiper-slide d-flex flex-column align-items-center">
                        <img src="{{ asset('images/offers/' . $key+1 . '.png') }}" alt="{{ $brand['name'] }} logo"
                            loading="lazy" style="object-fit: contain;">
                        <span class="mt-2 fw-semibold">{{ $brand['name'] }}</span>
                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
            {{-- <div class="swiper-pagination mt-3"></div> --}}
        </div>
    </div>
</div>

<!-- Separate Swiper Init -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productSwiper = new Swiper("#electronic-brands .productSwiper", {
            slidesPerView: 2,
            spaceBetween: 12,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 3, // 3 slides on large screen
                    spaceBetween: 10,
                },
                1280: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });
    });
</script>
