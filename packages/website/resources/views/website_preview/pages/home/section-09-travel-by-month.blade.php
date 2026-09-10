@props(['months', 'selectedMonth', 'treks' => []])

<section id="section-09-travel-by-month" data-section="09-travel-by-month" class="website-section" aria-labelledby="travel-by-month-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Seasonal Calendar',
            'title' => 'When to Trek in Nepal',
            'subtitle' => 'The Himalayas experience distinct weather windows throughout the year. Select any month to inspect trail conditions and suitable routes in place.',
            'actionUrl' => route('website.months.index'),
            'actionText' => '12-Month Calendar &rarr;'
        ])

        <!-- Twelve Accessible Month Buttons / Tabs -->
        <div class="website-month-grid" role="tablist" aria-label="Nepal travel calendar months">
            @foreach($months as $month)
                @php
                    $isSelected = (int)$month['id'] === (int)($selectedMonth['id'] ?? 9);
                @endphp
                <a href="{{ route('website.months.show', $month['slug']) }}"
                   class="website-month-grid__btn {{ $isSelected ? 'is-selected' : '' }}"
                   data-month-target="website-month-panel-{{ $month['id'] }}"
                   aria-label="{{ $month['name'] }}: {{ $month['season'] }} season ({{ $month['trek_count'] }} suitable treks)"
                   role="tab"
                   aria-selected="{{ $isSelected ? 'true' : 'false' }}">
                    <span style="font-weight: 600; font-size: var(--type-small);">{{ substr($month['name'], 0, 3) }}</span>
                    <span class="website-micro website-text-muted" style="font-size: 0.7rem;">{{ $month['season'] }}</span>
                    <span class="website-micro" style="font-size: 0.65rem; margin-top: 2px;">{{ $month['trek_count'] }} treks</span>
                </a>
            @endforeach
        </div>

        <!-- In-Place Month Panels (Rendered for each month; active panel shown in place) -->
        <div class="website-month-panels">
            @foreach($months as $m)
                @php
                    $isCurSelected = (int)$m['id'] === (int)($selectedMonth['id'] ?? 9);
                    $mId = (int)$m['id'];
                    $matchingTreks = array_values(array_filter($treks, fn($t) => in_array($mId, $t['suitable_months'] ?? [])));
                    $isPast = $mId < 9;
                    $isCurrent = $mId === 9;
                    $isFuture = $mId > 9;
                @endphp
                <div id="website-month-panel-{{ $m['id'] }}"
                     class="website-month-panel {{ $isCurSelected ? 'is-active' : '' }}"
                     role="tabpanel"
                     aria-labelledby="month-tab-{{ $m['id'] }}"
                     style="{{ $isCurSelected ? '' : 'display: none;' }}">

                    <!-- Month Overview Header Card -->
                    <div style="background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: var(--space-6); display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: var(--space-6); margin-bottom: var(--space-6);">
                        <div style="max-width: 680px;">
                            <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2);">
                                @if($isCurrent)
                                    <span class="website-badge website-badge--accent">CURRENT SAMPLE MONTH</span>
                                @elseif($isPast)
                                    <span class="website-badge website-badge--warm">PAST SAMPLE WINDOW</span>
                                @else
                                    <span class="website-badge website-badge--primary">UPCOMING SAMPLE WINDOW</span>
                                @endif
                                <h3 class="website-card-title" style="margin: 0;">
                                    {{ $m['name'] }} in the Himalayas
                                </h3>
                            </div>
                            <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                                {{ $m['overview'] ?? "Trail conditions, atmospheric clarity, and seasonal logistics for {$m['name']} in the Himalayas." }}
                            </p>
                            <div style="display: flex; gap: var(--space-4); margin-top: var(--space-3); font-size: var(--type-small);">
                                <span><strong>Season:</strong> {{ $m['season'] }}</span>
                                <span><strong>Suitable Journeys:</strong> {{ count($matchingTreks) }} itineraries</span>
                            </div>
                        </div>

                        <div style="display: flex; gap: var(--space-3); align-items: center;">
                            <a href="{{ route('website.months.show', $m['slug']) }}" class="website-btn website-btn--primary website-btn--compact">
                                {{ $m['name'] }} Guide &rarr;
                            </a>
                            <a href="{{ route('website.treks.index', ['month' => $m['id']]) }}" class="website-btn website-btn--outline website-btn--compact">
                                Filter Catalog
                            </a>
                        </div>
                    </div>

                    <!-- In-Place Departures & Suitable Treks Table -->
                    <div class="website-table-wrapper" tabindex="0" role="region" aria-label="{{ $m['name'] }} trekking options">
                        <table class="website-departures-table" style="margin: 0;">
                            <thead>
                                <tr>
                                    <th scope="col" style="min-width: 220px;">Journey</th>
                                    <th scope="col">Region</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Difficulty</th>
                                    <th scope="col">Sample Departure / Season</th>
                                    <th scope="col" style="text-align: right; min-width: 180px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($matchingTreks as $trek)
                                    @php
                                        // Sample departure label
                                        if ($isPast) {
                                            $departureDateLabel = "Past Season ({$m['season']})";
                                        } elseif ($isCurrent) {
                                            $departureDateLabel = "Sep 14, 2030 (Sample Departures)";
                                        } else {
                                            $departureDateLabel = substr($m['name'], 0, 3) . " 2030 (Sample Window)";
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-link" style="font-weight: 600; color: var(--color-text);">
                                                {{ $trek['name'] }}
                                            </a>
                                            <span class="website-micro website-text-muted" style="display: block;">
                                                From {{ \Website\Support\WebsiteMoneyFormatter::format($trek['price_minor']) }} USD
                                            </span>
                                        </td>
                                        <td>
                                            <span class="website-badge website-badge--warm">{{ $trek['region']['name'] }}</span>
                                        </td>
                                        <td>{{ $trek['duration_days'] }} Days</td>
                                        <td style="text-transform: capitalize;">{{ $trek['difficulty'] }}</td>
                                        <td>
                                            <span class="website-small website-text-secondary">{{ $departureDateLabel }}</span>
                                        </td>
                                        <td style="text-align: right;">
                                            <div style="display: flex; gap: var(--space-2); justify-content: flex-end; align-items: center;">
                                                <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-btn website-btn--outline website-btn--compact">
                                                    View Trek
                                                </a>
                                                @if($isCurrent)
                                                    <a href="{{ route('website.contact', ['subject' => 'September ' . $trek['name'] . ' Inquiry', 'trek' => $trek['id']]) }}" class="website-btn website-btn--primary website-btn--compact">
                                                        Inquire Now
                                                    </a>
                                                @elseif($isFuture)
                                                    <a href="{{ route('website.contact', ['subject' => $m['name'] . ' ' . $trek['name'] . ' Inquiry', 'trek' => $trek['id'], 'month' => $m['id']]) }}" class="website-btn website-btn--primary website-btn--compact">
                                                        Inquire Now
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center; padding: var(--space-8); color: var(--color-text-secondary);">
                                            <p class="website-body" style="margin-bottom: var(--space-2);">
                                                No high-altitude expeditions recommended in {{ $m['name'] }} due to extreme cold or monsoon trail conditions.
                                            </p>
                                            <a href="{{ route('website.planner.start', ['mode' => 'custom']) }}" class="website-btn website-btn--outline website-btn--compact">
                                                Ask About Custom Low-Altitude Routes &rarr;
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Honest Website Notice -->
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3); margin-top: var(--space-3); font-size: var(--type-micro); color: var(--color-text-muted);">
                        <span>Sample calendar fixtures for preview · No live availability or booking transactions</span>
                        <a href="{{ route('website.departures.index') }}" class="website-link">
                            Explore All 24 Fixed Departures &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
