@props([
    'status' => 'open',
    'label' => null,
])

@php
    $normalized = strtolower(trim((string) $status));
    $defaultLabel = match($normalized) {
        'open' => 'Open',
        'limited' => 'Limited',
        'full' => 'Full',
        default => ucfirst($status),
    };
    $displayLabel = $label ?? $defaultLabel;
@endphp

<span class="website-status-pill website-status-pill--{{ $normalized }}" role="status">
    @if($normalized === 'open')
        <svg class="website-status-pill__icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="16 10 11 15 8 12"></polyline>
        </svg>
    @elseif($normalized === 'limited')
        <svg class="website-status-pill__icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
        </svg>
    @else
        <svg class="website-status-pill__icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="15" y1="9" x2="9" y2="15"></line>
            <line x1="9" y1="9" x2="15" y2="15"></line>
        </svg>
    @endif
    <span class="website-status-pill__text">{{ $displayLabel }}</span>
</span>
