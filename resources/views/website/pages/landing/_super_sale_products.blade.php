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
        ],
    ]);
@endphp


<div class="mt-5" id="supersale-products">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="border rounded p-0 mb-4">
                <img src="https://placehold.co/500x250" style="height: 250px; width:100%; object-fit:cover" alt="">

                <!-- Product Swiper -->
                <div class="swiper product-swiper-left position-relative mt-3">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                @include('website.pages.landing._super_sale_product_card')
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="swiper-button-prev-left swiper-button-prev">
                        <i data-lucide="chevron-left"></i>
                    </div>
                    <div class="swiper-button-next-left swiper-button-next">
                        <i data-lucide="chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="border rounded p-0 mb-4">
                <img src="https://placehold.co/500x250" style="height: 250px; width:100%; object-fit:cover"
                    alt="">

                <!-- Product Swiper -->
                <div class="swiper product-swiper-right position-relative mt-3">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                            <div class="swiper-slide">
                                <div class="swiper-slide">
                                    @include('website.pages.landing._super_sale_product_card')
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="swiper-button-prev-left swiper-button-prev">
                        <i data-lucide="chevron-left"></i>
                    </div>
                    <div class="swiper-button-next-left swiper-button-next">
                        <i data-lucide="chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Init Lucide Icons
        lucide.createIcons();

        // Init Swiper
        new Swiper(".product-swiper-left", {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 12,
            navigation: {
                nextEl: ".swiper-button-next-left",
                prevEl: ".swiper-button-prev-left",
            },
        });

        new Swiper(".product-swiper-right", {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 12,
            navigation: {
                nextEl: ".swiper-button-next-left",
                prevEl: ".swiper-button-prev-left",
            },
        });
    });
</script>

<style>

</style>
