@props([
    'priceMinor' => null,
    'basis' => 'per person ground package',
    'size' => 'normal',
])

@php
    $formatted = \Website\Support\WebsiteMoneyFormatter::format($priceMinor);
@endphp

<div class="website-price-display" style="display: flex; flex-direction: column;">
    <div style="display: flex; align-items: baseline; gap: var(--space-2);">
        <span class="{{ $size === 'large' ? 'website-h2' : 'website-card-title' }}" style="color: var(--color-primary); font-weight: 600;">
            {{ $formatted }}
        </span>
        <span class="website-micro website-text-muted" style="text-transform: uppercase;">
            USD
        </span>
    </div>
    <span class="website-micro website-text-secondary" style="margin-top: 2px;">
        Illustrative USD price · {{ $basis }}
    </span>
</div>
