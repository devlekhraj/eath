@php
    $seasonColorMap = [
        'winter' => '#0c4a6e',
        'spring' => '#0284c7',
        'summer' => '#64748b',
        'autumn' => '#e11d48',
    ];

    $fallbackGauges = [
        1  => ['badge' => 'Winter Window',          'visibilityScore' => 3, 'visibilityLabel' => 'Crisp Silhouettes', 'activityScore' => 1, 'activityLabel' => 'Quiet'],
        2  => ['badge' => 'Late Winter',             'visibilityScore' => 3, 'visibilityLabel' => 'Morning Clarity',    'activityScore' => 1, 'activityLabel' => 'Low Footprint'],
        3  => ['badge' => 'Spring Awakening',        'visibilityScore' => 4, 'visibilityLabel' => 'Wildflower Bloom',   'activityScore' => 3, 'activityLabel' => 'Steady Flow'],
        4  => ['badge' => 'Prime Spring Window',     'visibilityScore' => 5, 'visibilityLabel' => 'Prime Panoramic',    'activityScore' => 4, 'activityLabel' => 'Active & Social'],
        5  => ['badge' => 'High Passes Open',        'visibilityScore' => 4, 'visibilityLabel' => 'Extended Daylight',  'activityScore' => 4, 'activityLabel' => 'Expedition Peak'],
        6  => ['badge' => 'Rain-Shadow Plateau',     'visibilityScore' => 2, 'visibilityLabel' => 'Rain-Shadow Arid',   'activityScore' => 1, 'activityLabel' => 'Quiet Sanctuaries'],
        7  => ['badge' => 'Trans-Himalayan',         'visibilityScore' => 2, 'visibilityLabel' => 'Dry Plateau Skies',  'activityScore' => 1, 'activityLabel' => 'Serene Enclaves'],
        8  => ['badge' => 'Rain-Shadow Sanctuaries', 'visibilityScore' => 2, 'visibilityLabel' => 'High Pastures',     'activityScore' => 1, 'activityLabel' => 'Tranquil'],
        9  => ['badge' => 'Post-Monsoon Wash',      'visibilityScore' => 4, 'visibilityLabel' => 'Post-Monsoon Wash',  'activityScore' => 3, 'activityLabel' => 'Rising Vitality'],
        10 => ['badge' => 'Peak Trekking Season',    'visibilityScore' => 5, 'visibilityLabel' => 'Crystal 360° Clarity','activityScore' => 5, 'activityLabel' => 'Peak Vitality'],
        11 => ['badge' => 'Sharp Panoramas',         'visibilityScore' => 5, 'visibilityLabel' => 'Razor-Sharp Vistas', 'activityScore' => 3, 'activityLabel' => 'Tapering Steady'],
        12 => ['badge' => 'Winter Sunshine',         'visibilityScore' => 4, 'visibilityLabel' => 'Dry Azure Skies',    'activityScore' => 2, 'activityLabel' => 'Quiet Valleys'],
    ];
@endphp

<!-- 4. Twelve-Month Selector / Grid -->
<section aria-labelledby="heading-month-grid" style="margin-bottom: var(--space-10);">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-2);">
        <div>
            <h2 id="heading-month-grid" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                Select a Travel Month
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0;">
                Compare mountain clarity and trail footprint meters across the 12 Himalayan trekking windows.
            </p>
        </div>
        @if(!$isDefault)
            <a href="{{ route('website.months.index') }}" class="website-small text-primary when-to-go-reset-link" style="text-decoration: underline;">
                &larr; Reset to Default (September)
            </a>
        @endif
    </div>

    <div class="website-when-to-go-grid" role="navigation" aria-label="Calendar Months">
        @foreach($months as $m)
            @php
                $isSelected = ($m['id'] === $selectedMonth['id']);
                $seasonKey = strtolower($m['season_website'] ?? $m['season'] ?? 'spring');
                $accentColor = $seasonColorMap[$seasonKey] ?? '#0284c7';
                $fallback = $fallbackGauges[$m['id']] ?? ['badge' => $m['season'], 'visibilityScore' => 3, 'visibilityLabel' => 'Good', 'activityScore' => 3, 'activityLabel' => 'Moderate'];

                $content = $m['content'] ?? [];
                $clarityScore = (int) (!empty($content['clarity_score']) ? $content['clarity_score'] : $fallback['visibilityScore']);
                $clarityLabel = !empty($content['clarity_label']) ? $content['clarity_label'] : $fallback['visibilityLabel'];
                $footprintScore = (int) (!empty($content['footprint_score']) ? $content['footprint_score'] : $fallback['activityScore']);
                $footprintLabel = !empty($content['footprint_label']) ? $content['footprint_label'] : $fallback['activityLabel'];
                $seasonalBadge = !empty($content['badge']) ? $content['badge'] : $fallback['badge'];

                $monthNumPad = str_pad($m['id'], 2, '0', STR_PAD_LEFT);
            @endphp
            <a href="{{ route('website.months.index', ['month' => $m['slug']]) }}"
               class="website-month-tile {{ $isSelected ? 'website-month-tile--selected' : '' }}"
               style="border-radius: 0 !important; box-shadow: none !important; border-top: 3px solid {{ $accentColor }}; background: var(--color-surface);"
               aria-current="{{ $isSelected ? 'true' : 'false' }}"
               data-month-slug="{{ $m['slug'] }}"
               data-month-id="{{ $m['id'] }}">

                <!-- Month Header Row -->
                <div class="website-month-tile__header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-2);">
                    <div>
                        <div style="display: flex; align-items: baseline; gap: 6px;">
                            <span style="font-family: ui-monospace, monospace; font-size: 0.75rem; font-weight: 700; color: {{ $accentColor }};">
                                {{ $monthNumPad }}
                            </span>
                            <span class="website-month-tile__name" style="font-size: 1.1rem; font-weight: 700; color: var(--color-text);">
                                {{ $m['name'] }}
                            </span>
                        </div>
                        <span class="website-micro website-text-muted" style="text-transform: uppercase; font-weight: 600; letter-spacing: 0.05em; display: block; margin-top: 2px;">
                            {{ $seasonalBadge }}
                        </span>
                    </div>

                    @if($isSelected)
                        <span class="website-badge website-badge--primary" style="font-size: 0.65rem; padding: 2px 6px; border-radius: 0 !important; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em;">
                            {{ $isDefault && $m['id'] === 9 ? 'Default' : 'Selected' }}
                        </span>
                    @endif
                </div>

                <!-- Dual Graphical Rating Meters (Dynamic Database Driven) -->
                <div style="background: var(--color-background-warm, #f8fafc); padding: var(--space-2) var(--space-3); border: 1px solid var(--color-border-light, #e2e8f0); margin-bottom: var(--space-3); border-radius: 0 !important;">
                    <!-- Clarity Meter -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <span style="font-size: 0.72rem; color: var(--color-text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em;">
                            Clarity
                        </span>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div style="display: flex; gap: 3px; align-items: center;" aria-label="Clarity rating: {{ $clarityScore }} of 5">
                                @for($i = 1; $i <= 5; $i++)
                                    <span style="display: inline-block; width: 10px; height: 5px; background: {{ $i <= $clarityScore ? $accentColor : '#e2e8f0' }}; border-radius: 0 !important;"></span>
                                @endfor
                            </div>
                            <span style="font-size: 0.7rem; font-weight: 600; color: var(--color-text); min-width: 58px; text-align: right;">
                                {{ $clarityLabel }}
                            </span>
                        </div>
                    </div>

                    <!-- Footprint / Crowd Meter -->
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 0.72rem; color: var(--color-text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em;">
                            Footprint
                        </span>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div style="display: flex; gap: 3px; align-items: center;" aria-label="Footprint rating: {{ $footprintScore }} of 5">
                                @for($i = 1; $i <= 5; $i++)
                                    <span style="display: inline-block; width: 10px; height: 5px; background: {{ $i <= $footprintScore ? $accentColor : '#e2e8f0' }}; border-radius: 0 !important;"></span>
                                @endfor
                            </div>
                            <span style="font-size: 0.7rem; font-weight: 600; color: {{ $accentColor }}; min-width: 58px; text-align: right;">
                                {{ $footprintLabel }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Footer Meta with Hairline Divider -->
                <div class="website-month-tile__meta" style="margin-top: auto; display: flex; justify-content: space-between; align-items: center; padding-top: var(--space-1); border-top: 1px solid var(--color-border-light, #e2e8f0);">
                    <span class="website-small {{ $m['trek_count'] > 0 ? 'website-text-secondary' : 'website-text-muted' }}" style="font-size: 0.8rem;">
                        <strong>{{ $m['trek_count'] }}</strong> {{ $m['trek_count'] === 1 ? 'Route' : 'Routes' }}
                    </span>
                    <span class="website-micro text-primary" style="font-weight: 600;">
                        Select &rarr;
                    </span>
                </div>
            </a>
        @endforeach
    </div>
</section>
