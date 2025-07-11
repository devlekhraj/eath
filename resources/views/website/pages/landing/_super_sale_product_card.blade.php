<div class="h-100 p-2">
    <div class="d-flex align-items-center text-start">
        <!-- Left Side: Image -->
        <div class="flex-shrink-0" style="width: 200px;">
            <img src="{{ asset('images/products/' . $product['image']) }}" class="img-fluid rounded" alt="{{ $product['name'] }}">
        </div>

        <!-- Right Side: Info -->
        <div class="flex-grow-1 ms-3">
            <span class="badge bg-danger mb-1">{{ $product['tag'] }}</span>
            <h6 class="mb-1">{{ $product['name'] }}</h6>

            <!-- Price and Discount -->
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="text-primary fw-bold">${{ number_format($product['price'], 2) }}</span>
                <small
                    class="text-muted text-decoration-line-through">${{ number_format($product['price'] * 1.2, 2) }}</small>
                <small class="text-success">(20% OFF)</small>
            </div>

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

                {{-- <span class="text-muted ms-1">(120)</span> --}}
            </div>

            <!-- Countdown Placeholder -->
            <div class="text-danger small fw-semibold" data-countdown="2025-12-31T23:59:59">
                Ends in: <span class="countdown-timer">--:--:--</span>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Countdown Timer
        const timers = document.querySelectorAll('[data-countdown]');
        timers.forEach(timer => {
            const end = new Date(timer.getAttribute('data-countdown')).getTime();
            const span = timer.querySelector('.countdown-timer');

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = end - now;

                if (distance <= 0) {
                    span.textContent = 'Expired';
                    return;
                }

                const hours = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
                    .toString()
                    .padStart(2, '0'));
                const minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
                    .toString().padStart(
                        2, '0'));
                const seconds = String(Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(
                    2, '0'));

                span.textContent = `${hours}:${minutes}:${seconds}`;
                requestAnimationFrame(updateCountdown);
            }

            updateCountdown();
        });
    })
</script>
