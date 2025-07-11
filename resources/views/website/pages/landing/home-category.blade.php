<style>
    #category-container .circle-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
    }

    #category-container .circle-item {
        width: 12.5%;
        padding: 1rem 0.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-sizing: border-box;
    }

    #category-container .circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: #e5ebf9;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px solid #e5ebf9;
        overflow: hidden;
        transition: width 0.3s, height 0.3s;
    }

    #category-container .circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    #category-container .circle-label {
        /* margin-top: 0.5rem;
        text-align: center;
        font-size: 14px; */
        margin-top: 0.5rem;
        text-align: center;
        font-size: clamp(1rem, 1.05vw + 0.5rem, 1.1rem);
        font-weight: 500;
    }

    #category-container .swiper {
        padding: 1rem 0;
        width: 100%;
    }

    #category-container .swiper-slide {
        display: flex;
        justify-content: center;
    }

    #category-container .swiper-slide .circle-item {
        width: auto;
        padding: 0 4px;
    }

    .d-lg-none .circle {
        width: 70px !important;
        height: 70px !important;
        border-width: 1.5px;
    }

    .d-lg-none .circle-label {
        font-size: 11px;
        margin-top: 0.3rem;
    }

    .d-lg-none .circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
@php

    $categories = [
        ['name' => 'Mobile', 'image' => 'https://picsum.photos/110/110?random=1'],
        ['name' => 'Laptop', 'image' => 'https://picsum.photos/110/110?random=2'],
        ['name' => 'Tablet', 'image' => 'https://picsum.photos/110/110?random=3'],
        ['name' => 'Camera', 'image' => 'https://picsum.photos/110/110?random=4'],
        ['name' => 'Headphones', 'image' => 'https://picsum.photos/110/110?random=5'],
        ['name' => 'Smartwatch', 'image' => 'https://picsum.photos/110/110?random=6'],
        ['name' => 'TV', 'image' => 'https://picsum.photos/110/110?random=7'],
        ['name' => 'Printer', 'image' => 'https://picsum.photos/110/110?random=8'],
        ['name' => 'Speaker', 'image' => 'https://picsum.photos/110/110?random=9'],
        ['name' => 'Router', 'image' => 'https://picsum.photos/110/110?random=10'],
        ['name' => 'Monitor', 'image' => 'https://picsum.photos/110/110?random=11'],
        ['name' => 'Keyboard', 'image' => 'https://picsum.photos/110/110?random=12'],
        ['name' => 'Mouse', 'image' => 'https://picsum.photos/110/110?random=13'],
        ['name' => 'Charger', 'image' => 'https://picsum.photos/110/110?random=14'],
        ['name' => 'Drone', 'image' => 'https://picsum.photos/110/110?random=15'],
        ['name' => 'Gaming Console', 'image' => 'https://picsum.photos/110/110?random=16'],
    ];

    $imgBasePath = asset('images/category-icons');

@endphp
<div id="category-container" class="my-5 container-fluid theme-space">
    <div class="p-3">

        @include('website.pages.landing._section_title', [
            'first_word' => 'All',
            'second_word' => 'Categories',
        ])

        <!-- Desktop Grid -->
        <div class="circle-grid d-none d-lg-flex">
            @foreach ($categories as $index => $category)
                <div class="circle-item">
                    <div class="circle">
                        <img src="{{ $imgBasePath . '/' . ($index + 1) . '.png' }}" alt="{{ $category['name'] }}">
                    </div>
                    <div class="circle-label">{{ $category['name'] }}</div>
                </div>
            @endforeach
        </div>

        <!-- Swiper Slider for Mobile -->
        <div class="d-lg-none">
            <div class="swiper categorytSwiper">
                <div class="swiper-wrapper">
                    @foreach ($categories as $index => $category)
                        <div class="swiper-slide">
                            <div class="circle-item">
                                <div class="circle">
                                    <img src="{{ $imgBasePath . '/' . ($index + 1) . '.png' }}"
                                        alt="{{ $category['name'] }}">
                                </div>
                                <div class="circle-label">{{ $category['name'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productSwiper = new Swiper("#category-container .categorytSwiper", {
            slidesPerView: 3,
            spaceBetween: 10,
            loop: true,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 40,
                },
            },
        });
    });
</script>
