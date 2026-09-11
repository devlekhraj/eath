@php
    $itinerary = $trek['itinerary'] ?? [];
    $totalDays = count($itinerary) > 0 ? count($itinerary) : ($trek['duration_days'] ?? 0);
    $priceFormatted = \Website\Support\WebsiteMoneyFormatter::format($trek['price_minor']);
    $regionName = strtoupper($trek['region']['name'] ?? 'NEPAL');
@endphp

<header class="website-join__header">
    <div class="website-join__header-main">
        <h2 id="website-global-modal-title" class="website-join__title" style="font-size: 1.35rem; margin-bottom: 4px;">
            {{ $trek['name'] }}
        </h2>
        <div class="website-join__subtitle" style="font-size: 0.8125rem; color: var(--color-text-secondary); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span class="font-weight-bold website-text-primary">{{ $totalDays }} Days Day-by-Day Itinerary</span>
            <span class="website-join__dot">&middot;</span>
            <span>{{ $regionName }} Region</span>
            <span class="website-join__dot">&middot;</span>
            <span>Max {{ number_format($trek['max_altitude_m']) }}m</span>
            <span class="website-join__dot">&middot;</span>
            <span style="text-transform: capitalize;">{{ $trek['difficulty'] }}</span>
        </div>
    </div>
    <button type="button" class="website-join__close" data-bs-dismiss="modal" aria-label="Close itinerary modal">&times;</button>
</header>

<div class="website-join__body" style="max-height: 75vh; overflow-y: auto; padding: 0 !important; border: none !important; background: var(--color-background-warm);">
    @if(count($itinerary) > 0)
        @include('website_preview.components.elevation-profile-chart', [
            'itinerary' => $itinerary,
            'maxAltitude' => $trek['max_altitude_m'] ?? 5545,
            'borderless' => true,
            'titleAbove' => true,
        ])
    @endif

    <div style="padding: 24px;">
        <div style="margin-bottom: var(--space-4); padding: 12px 16px; background: var(--color-surface); border: 1px solid var(--color-border); border-left: 4px solid var(--color-primary); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
            <div style="font-size: 0.8125rem; color: var(--color-text-secondary); line-height: 1.5;">
                <strong>Illustrative Route Fixture:</strong> Standard sequencing and pacing guided by licensed Sherpa leaders.
            </div>
            <div style="font-size: 0.8125rem; color: var(--color-text); font-weight: 600;">
                Total: {{ $totalDays }} Days
            </div>
        </div>

        @if(count($itinerary) > 0)
            <div class="website-itinerary-timeline" style="display: flex; flex-direction: column; gap: 16px;">
                @foreach($itinerary as $day)
                    <article class="website-itinerary-modal-day" id="itinerary-day-{{ $day['day'] }}" style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; padding: 20px; box-shadow: none;">
                        <div style="display: flex; justify-content: space-between; align-items: baseline; gap: 12px; margin-bottom: 8px; flex-wrap: wrap;">
                            <div style="display: flex; align-items: baseline; gap: 10px;">
                                <span style="font-family: var(--font-display); font-size: 1.15rem; font-weight: 700; color: var(--color-primary); line-height: 1; min-width: 65px;">
                                    DAY {{ str_pad($day['day'], 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <h3 style="margin: 0; font-size: 1.05rem; font-weight: 600; color: var(--color-text);">
                                    {{ $day['title'] }}
                                </h3>
                            </div>
                            @if(!empty($day['walking_hours_label']))
                                <span style="font-size: 0.75rem; font-weight: 600; color: var(--color-secondary); background: var(--color-background-warm); padding: 3px 8px; border: 1px solid var(--color-border); text-transform: uppercase;">
                                    <i class="fa-solid fa-person-walking" aria-hidden="true" style="margin-right: 4px;"></i> {{ $day['walking_hours_label'] }}
                                </span>
                            @endif
                        </div>

                        @if(!empty($day['route']))
                            <div style="font-size: 0.8125rem; color: var(--color-primary); font-weight: 500; margin-bottom: 10px; display: flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-route" aria-hidden="true" style="font-size: 0.75rem;"></i>
                                <span>{{ $day['route'] }}</span>
                            </div>
                        @endif

                        @if(!empty($day['desc']))
                            <p style="font-size: 0.85rem; color: var(--color-text-secondary); line-height: 1.6; margin: 0 0 14px;">
                                {{ $day['desc'] }}
                            </p>
                        @endif

                        <!-- Day Specs Pills (Hairline Borders, Zero Radius) -->
                        <div style="display: flex; flex-wrap: wrap; gap: 8px; padding-top: 12px; border-top: 1px solid var(--color-border); font-size: 0.75rem; color: var(--color-text-secondary);">
                            @if(!empty($day['altitude_label']))
                                <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; background: var(--color-background-warm); border: 1px solid var(--color-border);">
                                    <i class="fa-solid fa-mountain" style="color: var(--color-primary); font-size: 0.7rem;" aria-hidden="true"></i>
                                    <strong>Altitude:</strong> {{ $day['altitude_label'] }}
                                </span>
                            @endif
                            @if(!empty($day['accommodation_label']))
                                <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; background: var(--color-background-warm); border: 1px solid var(--color-border);">
                                    <i class="fa-solid fa-bed" style="color: var(--color-secondary); font-size: 0.7rem;" aria-hidden="true"></i>
                                    <strong>Stay:</strong> {{ $day['accommodation_label'] }}
                                </span>
                            @endif
                            @if(!empty($day['meal_note']))
                                <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; background: var(--color-background-warm); border: 1px solid var(--color-border);">
                                    <i class="fa-solid fa-utensils" style="color: var(--color-text-muted); font-size: 0.7rem;" aria-hidden="true"></i>
                                    <strong>Meals:</strong> {{ $day['meal_note'] }}
                                </span>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div style="padding: 32px; text-align: center; background: var(--color-surface); border: 1px solid var(--color-border);">
                <p style="color: var(--color-text-secondary); margin-bottom: 16px;">
                    Detailed day-by-day fixtures are being finalized for this route.
                </p>
                <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-btn website-btn--primary website-btn--compact">
                    View Trek Details Page
                </a>
            </div>
        @endif
    </div>
</div>

<footer class="website-join__footer" style="padding: 16px 24px; border-top: 1px solid var(--color-border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; background: var(--color-surface);">
    <div>
        <span style="font-size: 0.7rem; color: var(--color-text-muted); text-transform: uppercase; letter-spacing: 0.05em; display: block;">Starting from</span>
        <span style="font-family: var(--font-display); font-size: 1.25rem; font-weight: 700; color: var(--color-primary);">{{ $priceFormatted }} USD</span>
        <span style="font-size: 0.75rem; color: var(--color-text-secondary);">per person</span>
    </div>
    <div style="display: flex; gap: 10px; align-items: center;">
        <button type="button" class="website-btn website-btn--outline website-btn--compact" data-bs-dismiss="modal">
            Close
        </button>
        <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-btn website-btn--accent website-btn--compact">
            <span>Explore Full Trek</span>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</footer>
