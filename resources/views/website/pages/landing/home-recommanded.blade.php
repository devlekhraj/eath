<!-- Demo styles -->
<style>
    #recommanded-product {
        padding: 2rem 1rem;
        margin: 0 auto;
    }

    #recommanded-product .swiper {
        width: 100%;
        height: 100%;
    }

    #recommanded-product .swiper-slide {
        text-align: center;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 8px;

    }

    #recommanded-product .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
        aspect-ratio: 1/1;
    }

    
</style>
@php
    $products = collect([
        [
            'name' => 'Apple iPhone 16 Pro',
            'price' => 1199.0,
            'image' => '1.png',
            'rating' => 2.5,
            'tag' => 'Best Seller',
            'is_fav' => 1,
        ],
        [
            'name' => 'Apple MacBook Pro 14” (M3, 2024)',
            'price' => 1999.0,
            'image' => '2.png',
            'rating' => 3.7,
            'tag' => 'Flash Sale',
            'is_fav' => 0,
        ],
        [
            'name' => 'Apple iPad Air M2 (2024)',
            'price' => 699.0,
            'image' => '3.png',
            'rating' => 4.2,
            'tag' => 'New Drop',
            'is_fav' => 1,
        ],
        [
            'name' => 'DJI Mini 4 Pro Drone',
            'price' => 759.0,
            'image' => '4.png',
            'rating' => 3.0,
            'tag' => 'Best Deals',
            'is_fav' => 0,
        ],
        [
            'name' => 'Sony WH-1000XM5 Headphones',
            'price' => 399.0,
            'image' => '5.png',
            'rating' => 4.8,
            'tag' => 'Best Seller',
            'is_fav' => 1,
        ],
        [
            'name' => 'Samsung Galaxy Watch 6',
            'price' => 299.0,
            'image' => '6.png',
            'rating' => 2.3,
            'tag' => 'Flash Sale',
            'is_fav' => 0,
        ],
        [
            'name' => 'LG 55” 4K UHD Smart TV',
            'price' => 649.0,
            'image' => '7.png',
            'rating' => 3.1,
            'tag' => 'New Drop',
            'is_fav' => 1,
        ],
        [
            'name' => 'Sony WH-1000XM5 Headphones',
            'price' => 399.0,
            'image' => '5.png',
            'rating' => 3.8,
            'tag' => 'Best Deals',
            'is_fav' => 0,
        ],
        [
            'name' => 'Samsung Galaxy Watch 6',
            'price' => 299.0,
            'image' => '6.png',
            'rating' => 4.3,
            'tag' => 'Best Seller',
            'is_fav' => 1,
        ],
        [
            'name' => 'LG 55” 4K UHD Smart TV',
            'price' => 649.0,
            'image' => '7.png',
            'rating' => 3.1,
            'tag' => 'Flash Sale',
            'is_fav' => 0,
        ],
    ]);
@endphp




<!-- Container with unique ID -->
<div id="recommanded-product" class="container-fluid theme-space">
    <div class="px-3">
        @include('website.pages.landing._section_title', [
            'first_word' => 'Recommanded',
            'second_word' => 'For You',
        ])

        <div class="swiper productSwiper">
            <div class="swiper-wrapper">
                @foreach ($products as $product)
                    <div class="swiper-slide">
                        @include('website.pages.landing._product_card',[
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


<!-- Separate Swiper Init -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productSwiper = new Swiper("#recommanded-product .productSwiper", {
            slidesPerView: 2,
            spaceBetween: 12,
            loop: true,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            },
        });
    });
</script>
