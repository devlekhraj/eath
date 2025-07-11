<style>
    .product-name {
        line-height: 1.4;
        height: calc(1.4em * 2);
        /* max 2 lines */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* limits to 2 lines */
        -webkit-box-orient: vertical;
        /* For non-webkit browsers fallback */
        overflow-wrap: break-word;
        word-break: break-word;
    }


    .badge-outline {
        padding: 0.25em 0.7em;
        font-size: 0.7rem;
        font-weight: 500;
        border: 1px solid transparent;
        border-radius: 0.8rem;
        background-color: transparent;
        text-transform: uppercase;
    }

    .badge-outline-primary {
        color: var(--bs-primary);
        border-color: var(--bs-primary);
    }

    .badge-outline-secondary {
        color: var(--bs-secondary);
        border-color: var(--bs-secondary);
    }

    .product-card {
        background: #fff;
        border: 1px solid #f3f3f3;
        border-radius: 8px;
    }

    .bg-flash,
    .hot-deals
    {
        background: #fff3f3;
    }

    .bg-best-seller {
        background: #fff9e6;
    }

    .bg-new-drop {
        background: #e6f7ff;
    }

    .bg-default {
        background: #ffffff;
    }
</style>

<article class="product-card p-2 position-relative" itemscope itemtype="https://schema.org/Product">

    @php
        // Determine background class based on tag
        $bgClass = match (strtolower($tag ?? '')) {
            'flash sale' => 'bg-flash',
            'best seller' => 'bg-best-seller',
            'new drop' => 'bg-new-drop',
            'hot deals' => 'hot-deals',
            default => 'bg-default',
    }; @endphp
    <!-- Top Left Tag -->
    @if (!empty($tag))
        <span role="status" aria-label="{{ $tag }}"
            class="position-absolute top-0 start-0 {{ $bgClass }} text-dark small fw-semibold d-flex align-items-center"
            style="
            z-index: 2;
            margin-top: 0.5rem;
            margin-left: 0.5rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            letter-spacing: 0.3px;
            font-size: 0.75rem;
            white-space: nowrap;">
            {{ $tag }}
        </span>
    @endif

    <!-- Top Right Favourite Button -->
    <button type="button" aria-label="{{ $is_fav ? 'Remove from favourites' : 'Add to favourites' }}"
        aria-pressed="{{ $is_fav ? 'true' : 'false' }}"
        class="btn btn-light btn-sm position-absolute top-0 end-0 rounded-circle shadow-sm"
        style="z-index: 2; margin-top: 0.5rem; margin-right: 0.5rem; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
        <i class="{{ $is_fav ? 'fas' : 'far' }} fa-heart text-danger" aria-hidden="true"></i>
    </button>

    <!-- Product Image -->
    <div class="product-imag" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
        <img src="{{ asset('images/products/' . $image) }}" alt="{{ $name }} product image"
            loading="lazy" width="300" height="300" style="width: 100%; height: auto; border-radius: 8px;">
        <meta itemprop="url" content="{{ asset('images/products/' . $image) }}">
    </div>

    <div class="text-start p-2">
        <!-- Product Name -->
        <h3 class="product-name mt-2 fw-semibold fs-6" itemprop="name">{{ $name }}</h3>

        <!-- Review Stars -->
        <div class="d-flex align-items-center gap-1 text-warning small mb-1"
            aria-label="Rating: {{ $rating ?? 0 }} out of 5 stars">
            @php
                $rating = $rating ?? 0;
                $fullStars = floor($rating);
                $halfStar = $rating - $fullStars >= 0.5;
                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
            @endphp

            {{-- Full stars --}}
            @for ($i = 0; $i < $fullStars; $i++)
                <i class="fas fa-star" aria-hidden="true"></i>
            @endfor

            {{-- Half star --}}
            @if ($halfStar)
                <i class="fas fa-star-half-alt" aria-hidden="true"></i>
            @endif

            {{-- Empty stars --}}
            @for ($i = 0; $i < $emptyStars; $i++)
                <i class="far fa-star" aria-hidden="true"></i>
            @endfor

            <span class="text-muted ms-1">(120)</span>
        </div>

        <!-- Price and Discount -->
        <div class="d-flex justify-content-between align-items-center product-price text-muted"
            style="font-size: clamp(0.95rem, 1vw + 0.25rem, 1rem);">
            <div>
                <div>
                    <del class="me-1">${{ number_format(1500, 2) }}</del>
                </div>
                <p class="badge bg-danger">15% OFF</p>
            </div>
            <span class="text-primary fw-semibold" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                <meta itemprop="priceCurrency" content="USD" />
                <meta itemprop="price" content="{{ number_format($product['price'] * 0.85, 2) }}" />
                ${{ number_format($product['price'] * 0.85, 2) }}
            </span>
        </div>

        <!-- EMI and Delivery badges -->
        {{-- <div class="d-none d-sm-flex gap-2 align-items-center mt-4">
            <div class="d-flex align-items-center gap-1">
                <span class="badge-outline badge-outline-primary shadow-sm"
                    style="box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 20px; padding: 0.35rem 0.75rem;">
                    <i data-lucide="credit-card" class="text-primary" style="width: 16px; height: 16px;"></i> EMI
                </span>
            </div>
            <div class="d-flex align-items-center gap-1">
                <span class="badge-outline badge-outline-secondary shadow-sm"
                    style="box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 20px; padding: 0.35rem 0.75rem;">
                    <i data-lucide="truck" class="text-secondary" style="width: 16px; height: 16px;"></i> Free Delivery
                </span>
            </div>
        </div> --}}
    </div>


</article>
