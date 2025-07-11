<style>
    #home-offers .offers-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    @media (min-width: 768px) {
        #home-offers .offers-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 992px) {
        #home-offers .offers-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .grid-2x2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
    }

    .grid-2x2 .item {
        background-color: #fff;
        padding: 1rem;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.05);
        height: 100%;
    }

    .offers-card {
        background-color: #f8f9fa;
        padding: 1rem;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .offers-card h4 {
        margin-bottom: 1rem;
    }

    .in-focus {
        display: grid;
        grid-template-rows: 1fr 1fr;
        gap: 0.75rem;
        height: 100%;
    }

    .in-focus img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    h6 {
        margin-bottom: 6px;
    }

    @media (max-width: 575.98px) {
        .grid-2x2 {
            grid-template-columns: 1fr; /* stack items */
        }
    }
</style>

@php
    $moreReasons = [
        ['image' => 'images/products/5.png', 'title' => 'Top Rated Products', 'description' => 'Get the best at the best price'],
        ['image' => 'images/products/6.png', 'title' => 'Best Sellers', 'description' => 'Most popular picks'],
        ['image' => 'images/products/7.png', 'title' => 'New Arrivals', 'description' => 'Stay up to date'],
        ['image' => 'images/products/8.png', 'title' => 'Fatafat Mela', 'description' => 'Support local business'],
    ];

    $fatafatDeals = [
        ['image' => 'images/products/1.png', 'title' => 'Top Rated Products', 'description' => 'Get the best at the best price'],
        ['image' => 'images/products/2.png', 'title' => 'Best Sellers', 'description' => 'Most popular picks'],
        ['image' => 'images/products/3.png', 'title' => 'New Arrivals', 'description' => 'Stay up to date'],
        ['image' => 'images/products/4.png', 'title' => 'Fatafat Mela', 'description' => 'Support local business'],
    ];

    $inFocusBanners = [
        'images/offers/1.png',
        'images/offers/2.png',
    ];
@endphp

<div id="home-offers" class="container-fluid theme-space">
    <div class="px-3 mt-5">
        <div class="offers-grid">
            {{-- Column 1: More Reasons --}}
            <div class="offers-card">
                <h4>More Reason to Shop</h4>
                <div class="grid-2x2 mt-2">
                    @foreach ($moreReasons as $item)
                        <div class="item">
                            <img src="{{ asset($item['image']) }}" height="100" alt="">
                            <h6 class="fw-bold mt-2">{{ $item['title'] }}</h6>
                            <p class="text-muted">{{ $item['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Column 2: Fatafat Deals --}}
            <div class="offers-card">
                <h4>Fatafat Deals</h4>
                <div class="grid-2x2 mt-2">
                    @foreach ($fatafatDeals as $item)
                        <div class="item">
                            <img src="{{ asset($item['image']) }}" height="100" alt="">
                            <h6 class="fw-bold mt-2">{{ $item['title'] }}</h6>
                            <p class="text-muted">{{ $item['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Column 3: In Focus Banners --}}
            <div class="offers-card">
                <h4>In Focus</h4>
                <div class="in-focus">
                    @foreach ($inFocusBanners as $banner)
                        <img src="{{ asset($banner) }}" alt="Banner">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
