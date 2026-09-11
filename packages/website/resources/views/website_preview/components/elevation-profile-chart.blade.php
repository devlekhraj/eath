@php
    $totalDays = count($itinerary);
    $plotLeft = 76;
    $plotRight = 924;
    $plotTop = 30;
    $plotBottom = 250;
    $plotWidth = $plotRight - $plotLeft;
    $plotHeight = $plotBottom - $plotTop;

    // Determine scale bounds
    $minScaleAlt = 1000;
    $maxScaleAlt = max(5800, (int)($maxAltitude ?? 5545) + 300);

    // Compute coordinate mapping helper
    $getAltY = function($alt) use ($minScaleAlt, $maxScaleAlt, $plotTop, $plotBottom, $plotHeight) {
        $clamped = max($minScaleAlt, min($maxScaleAlt, (float)$alt));
        $fraction = ($clamped - $minScaleAlt) / ($maxScaleAlt - $minScaleAlt);
        return round($plotBottom - ($fraction * $plotHeight), 1);
    };

    // Calculate (x, y) coordinates for each day
    $nodes = [];
    foreach ($itinerary as $index => $day) {
        $x = round($plotLeft + ($index / max(1, $totalDays - 1)) * $plotWidth, 1);
        $rawAlt = (int) preg_replace('/[^\d]/', '', $day['altitude_label'] ?? '');
        if ($rawAlt <= 0) {
            $rawAlt = 2500;
        }
        $y = $getAltY($rawAlt);
        $nodes[] = [
            'day' => $day['day'],
            'x' => $x,
            'y' => $y,
            'altitude' => $rawAlt,
            'altitude_label' => $day['altitude_label'] ?? ($rawAlt . 'm'),
            'title' => $day['title'],
            'route' => $day['route'] ?? '',
            'walking_hours_label' => $day['walking_hours_label'] ?? '',
            'is_acclimatization' => !empty($day['is_acclimatization']),
        ];
    }

    // Build SVG Path strings
    $linePoints = [];
    foreach ($nodes as $node) {
        $linePoints[] = "{$node['x']},{$node['y']}";
    }
    $linePathData = 'M ' . implode(' L ', $linePoints);
    $firstX = $nodes[0]['x'] ?? $plotLeft;
    $lastX = end($nodes)['x'] ?? $plotRight;
    $areaPathData = "M {$firstX},{$plotBottom} L " . implode(' L ', $linePoints) . " L {$lastX},{$plotBottom} Z";

    // Standard altitude guide ticks matching screenshot
    $guideTicks = [
        ['alt' => 5500, 'label' => '5,500m', 'is_red' => false],
        ['alt' => 5000, 'label' => '5,000m', 'is_red' => true],
        ['alt' => 4000, 'label' => '4,000m', 'is_red' => false],
        ['alt' => 3000, 'label' => '3,000m', 'is_red' => false],
        ['alt' => 2000, 'label' => '2,000m', 'is_red' => false],
    ];
@endphp

@if(!empty($titleAbove))
    <div class="website-elevation-title-group">
        <h3 class="website-elevation-title">
            Interactive Elevation &amp; Acclimatization Profile
        </h3>
        <p class="website-elevation-subtitle">
            Hover over any day node to view overnight camp altitude and acclimatization status.
        </p>
    </div>
@endif

<div class="website-elevation-card {{ !empty($borderless) ? 'website-elevation-card--borderless' : '' }}" id="website-elevation-profile">
    <div class="website-elevation-card__header" @if(!empty($titleAbove)) style="justify-content: flex-end;" @endif>
        @if(empty($titleAbove))
            <div class="website-elevation-card__title-group">
                <h3 class="website-elevation-card__title">
                    Interactive Elevation &amp; Acclimatization Profile
                </h3>
                <p class="website-elevation-card__subtitle">
                    Hover over any day node to view overnight camp altitude and acclimatization status.
                </p>
            </div>
        @endif
        <div class="website-elevation-card__legend">
            <span class="website-elevation-card__legend-item">
                <span class="website-elevation-card__legend-dot website-elevation-card__legend-dot--pacing"></span>
                <span>Trail Pacing</span>
            </span>
            <span class="website-elevation-card__legend-item">
                <span class="website-elevation-card__legend-dot website-elevation-card__legend-dot--high-alt"></span>
                <span>5,000m High Altitude</span>
            </span>
        </div>
    </div>

    <div class="website-elevation-card__chart-wrapper">
        <svg viewBox="0 0 960 300"
             class="website-elevation-svg"
             preserveAspectRatio="xMidYMid meet"
             role="img"
             aria-label="Elevation and Acclimatization chart for {{ count($itinerary) }} days">
            <defs>
                <linearGradient id="elevationPacingGradient" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#0284c7" stop-opacity="0.22" />
                    <stop offset="45%" stop-color="#38bdf8" stop-opacity="0.10" />
                    <stop offset="100%" stop-color="#0284c7" stop-opacity="0.01" />
                </linearGradient>
            </defs>

            <!-- Horizontal Altitude Grid Lines & Labels -->
            @foreach($guideTicks as $tick)
                @php
                    $tickY = $getAltY($tick['alt']);
                @endphp
                @if($tick['is_red'])
                    <!-- 5,000m Critical High-Altitude Red Dashed Threshold -->
                    <line x1="{{ $plotLeft }}" y1="{{ $tickY }}" x2="{{ $plotRight }}" y2="{{ $tickY }}"
                          stroke="#f87171"
                          stroke-dasharray="4,4"
                          stroke-width="1.5"
                          stroke-opacity="0.85" />
                    <text x="{{ $plotLeft - 12 }}" y="{{ $tickY + 5 }}"
                          text-anchor="end"
                          fill="#e11d48"
                          font-size="14"
                          font-weight="700"
                          font-family="system-ui, -apple-system, sans-serif">{{ $tick['label'] }}</text>
                @else
                    <!-- Subtle Dashed Reference Lines -->
                    <line x1="{{ $plotLeft }}" y1="{{ $tickY }}" x2="{{ $plotRight }}" y2="{{ $tickY }}"
                          stroke="#e2e8f0"
                          stroke-dasharray="3,3"
                          stroke-width="1" />
                    <text x="{{ $plotLeft - 12 }}" y="{{ $tickY + 5 }}"
                          text-anchor="end"
                          fill="#64748b"
                          font-size="14"
                          font-weight="500"
                          font-family="system-ui, -apple-system, sans-serif">{{ $tick['label'] }}</text>
                @endif
            @endforeach

            <!-- Gradient Area Fill Under Elevation Curve -->
            <path d="{{ $areaPathData }}"
                  fill="url(#elevationPacingGradient)"
                  class="website-elevation-area" />

            <!-- Solid Main Trail Elevation Line -->
            <path d="{{ $linePathData }}"
                  fill="none"
                  stroke="#0284c7"
                  stroke-width="3.5"
                  stroke-linejoin="round"
                  stroke-linecap="round"
                  class="website-elevation-line" />

            <!-- Day Labels & Interactive Nodes -->
            @foreach($nodes as $node)
                <!-- Vertical Guideline connecting node to day indicator on hover -->
                <line x1="{{ $node['x'] }}" y1="{{ $node['y'] }}" x2="{{ $node['x'] }}" y2="265"
                      stroke="#38bdf8"
                      stroke-width="1.5"
                      stroke-dasharray="3,3"
                      class="website-elevation-vguide"
                      data-day="{{ $node['day'] }}"
                      opacity="0" />

                <!-- X-Axis Day Indicator (Clickable & Hoverable Trigger) -->
                <g class="website-elevation-day-item website-elevation-trigger"
                   data-day="{{ $node['day'] }}"
                   data-title="{{ $node['title'] }}"
                   data-route="{{ $node['route'] }}"
                   data-alt="{{ $node['altitude_label'] }}"
                   data-hours="{{ $node['walking_hours_label'] }}"
                   data-acclimatization="{{ $node['is_acclimatization'] ? '1' : '0' }}"
                   tabindex="0"
                   role="button"
                   aria-label="Day {{ $node['day'] }}: {{ $node['title'] }} at {{ $node['altitude_label'] }}">
                    <rect x="{{ $node['x'] - 18 }}" y="266" width="36" height="26"
                          fill="transparent"
                          class="website-elevation-day-hitbox" />
                    <text x="{{ $node['x'] }}" y="283"
                          text-anchor="middle"
                          fill="{{ $node['is_acclimatization'] ? '#0284c7' : '#64748b' }}"
                          font-size="13"
                          font-weight="{{ $node['is_acclimatization'] ? '700' : '600' }}"
                          font-family="system-ui, -apple-system, sans-serif"
                          class="website-elevation-day-label"
                          data-day="{{ $node['day'] }}">D{{ $node['day'] }}</text>
                </g>

                <!-- Visual Node on Elevation Line -->
                @if($node['is_acclimatization'])
                    <!-- Acclimatization Rest Day Node (Highlighted Cyan with White Border) -->
                    <circle cx="{{ $node['x'] }}" cy="{{ $node['y'] }}" r="6.5"
                            fill="#38bdf8"
                            stroke="#ffffff"
                            stroke-width="2.5"
                            class="website-elevation-node website-elevation-node--acclimatization"
                            data-day="{{ $node['day'] }}" />
                @else
                    <!-- Standard Day Node (White with Azure Outline) -->
                    <circle cx="{{ $node['x'] }}" cy="{{ $node['y'] }}" r="5"
                            fill="#ffffff"
                            stroke="#0284c7"
                            stroke-width="2.5"
                            class="website-elevation-node"
                            data-day="{{ $node['day'] }}" />
                @endif

                <!-- Hit Target Area for Smooth Hover/Touch on Elevation Curve Node -->
                <circle cx="{{ $node['x'] }}" cy="{{ $node['y'] }}" r="18"
                        fill="transparent"
                        class="website-elevation-hit-target website-elevation-trigger"
                        data-day="{{ $node['day'] }}"
                        data-title="{{ $node['title'] }}"
                        data-route="{{ $node['route'] }}"
                        data-alt="{{ $node['altitude_label'] }}"
                        data-hours="{{ $node['walking_hours_label'] }}"
                        data-acclimatization="{{ $node['is_acclimatization'] ? '1' : '0' }}"
                        tabindex="0"
                        role="button"
                        aria-label="Day {{ $node['day'] }}: {{ $node['title'] }} at {{ $node['altitude_label'] }}" />
            @endforeach
        </svg>

        <!-- Floating Interactive Tooltip -->
        <div class="website-elevation-tooltip" id="website-elevation-tooltip" aria-hidden="true">
            <div class="website-elevation-tooltip__day" id="website-tooltip-day">Day 1</div>
            <div class="website-elevation-tooltip__title" id="website-tooltip-title">Arrival</div>
            <div class="website-elevation-tooltip__route" id="website-tooltip-route"></div>
            <div class="website-elevation-tooltip__metrics">
                <span class="website-elevation-tooltip__alt" id="website-tooltip-alt">2,610m</span>
                <span class="website-elevation-tooltip__badge" id="website-tooltip-badge"></span>
            </div>
            <div class="website-elevation-tooltip__hint">Click to expand day itinerary &darr;</div>
        </div>
    </div>
</div>
