@props(['departure', 'isLast' => false, 'isFirst' => false])

@php
    $startDate = strtotime($departure['start_date']);
    $day = date('d', $startDate);
    $month = strtoupper(date('M', $startDate));
    $year = date('Y', $startDate);
    $priceFormatted = \Website\Support\WebsiteMoneyFormatter::format($departure['price_minor']);
    $isBookable = $departure['is_bookable'] ?? ($departure['status'] !== 'full');
    $openSpaces = $departure['sample_seats'] ?? 8;
    $totalSpaces = 12;
    $percent = round(($openSpaces / max(1, $totalSpaces)) * 100);
@endphp

<div class="website-timeline-row {{ $isLast ? 'website-timeline-row--last' : '' }} {{ $isFirst ? 'website-timeline-row--featured' : '' }}">
    <!-- 1st Column: Start Date Only in Primary Color -->
    <div class="website-timeline-date">
        @if($isFirst)
            <span class="website-timeline-row__featured-badge">
                <i class="fa-solid fa-bolt" aria-hidden="true"></i>
                <span>Next Departure</span>
            </span>
        @endif
        <span class="website-timeline-date__text">
            {{ $day }} {{ $month }} {{ $year }}
        </span>
    </div>

    <!-- 2nd Column: Route Name, Duration & Spaces Open Capacity -->
    <div class="website-timeline-details">
        <h3 class="website-timeline-details__title">
            <span>{{ $departure['trek_name'] }}</span>
        </h3>
        <div class="website-timeline-details__meta">
            <span>{{ $departure['duration_days'] }} Days</span>
            <span class="website-sep">·</span>
            <span>Standard Lodge</span>
            <span class="website-sep">·</span>
            <span style="text-transform: capitalize;">{{ $departure['status'] }}</span>
            @if($isFirst)
                <span class="website-sep">·</span>
                <strong style="color: var(--color-primary);">Guaranteed Group</strong>
            @endif
        </div>
        <div class="website-timeline-capacity-row">
            <span class="website-timeline-spaces">
                {{ $openSpaces }} / {{ $totalSpaces }} spaces open
            </span>
            <div class="website-timeline-bar-track" aria-label="{{ $openSpaces }} of {{ $totalSpaces }} spaces open">
                <div class="website-timeline-bar-fill {{ !$isBookable ? 'website-timeline-bar-fill--accent' : ($isFirst ? 'website-timeline-bar-fill--primary' : '') }}" style="width: {{ $percent }}%;"></div>
            </div>
        </div>
    </div>

    <!-- 3rd Column: Price & Select Action -->
    <div class="website-timeline-actions-col">
        <div style="margin-bottom: 6px; text-align: right;">
            <span style="font-family: var(--font-display); font-size: 1.25rem; font-weight: 700; color: var(--color-primary); display: block; line-height: 1.1;">
                {{ $priceFormatted }}
            </span>
            <span class="website-micro website-text-muted">Illustrative USD</span>
        </div>

        @if($isBookable)
            <a href="{{ route('website.planner.start', ['mode' => 'selected', 'trek' => $departure['trek_id'], 'departure' => $departure['id']]) }}"
               class="website-btn {{ $isFirst ? 'website-btn--accent' : 'website-btn--primary' }} website-btn--compact website-btn--block"
               data-open-modal="{{ route('website.departures.modal', ['departure_id' => $departure['id']]) }}"
               aria-haspopup="dialog"
               aria-controls="website-global-modal">
                {{ $isFirst ? 'Join Next Departure' : 'Select Departure' }}
            </a>
        @else
            <button type="button" class="website-btn website-btn--ghost website-btn--compact website-btn--block" disabled>
                Departure Full
            </button>
        @endif
    </div>
</div>

