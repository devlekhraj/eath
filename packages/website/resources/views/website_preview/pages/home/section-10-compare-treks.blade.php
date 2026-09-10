@props(['compareTreks'])

<section id="section-10-compare-treks" data-section="10-compare-treks" class="website-section website-section--warm" aria-labelledby="compare-treks-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Decision Clarity',
            'title' => 'Compare Himalayan Treks Side-by-Side',
            'subtitle' => 'Inspect key trade-offs between trail duration, maximum elevation, physical challenge, and illustrative package pricing.',
            'actionUrl' => route('website.compare', ['treks' => ['t-ebc', 't-abc', 't-langtang']]),
            'actionText' => 'Open Comparison Tool &rarr;'
        ])

        <div class="website-compare-teaser-grid">
            @foreach($compareTreks as $trek)
                @if($trek)
                    <div class="website-compare-teaser-grid__card">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-2);">
                            <span class="website-badge website-badge--warm">{{ $trek['region']['name'] ?? 'Nepal' }}</span>
                            <span class="website-micro website-text-muted" style="text-transform: capitalize;">{{ $trek['difficulty'] }}</span>
                        </div>

                        <h3 class="website-card-title" style="margin-bottom: var(--space-1);">
                            <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-link" style="color: inherit;">
                                {{ $trek['name'] }}
                            </a>
                        </h3>

                        <ul class="website-compare-teaser-grid__facts">
                            <li>
                                <span class="website-text-secondary">Duration</span>
                                <strong>{{ $trek['duration_days'] }} Days</strong>
                            </li>
                            <li>
                                <span class="website-text-secondary">Max Altitude</span>
                                <strong>{{ $trek['max_altitude_m'] }}m</strong>
                            </li>
                            <li>
                                <span class="website-text-secondary">Difficulty</span>
                                <strong style="text-transform: capitalize;">{{ $trek['difficulty'] }}</strong>
                            </li>
                            <li>
                                <span class="website-text-secondary">Illustrative Cost</span>
                                <strong style="color: var(--color-primary);">{{ \Website\Support\WebsiteMoneyFormatter::format($trek['price_minor']) }} USD</strong>
                            </li>
                            <li>
                                <span class="website-text-secondary">Trail Terrain</span>
                                <span>{{ $trek['terrain_summary'] ?? 'Alpine valley & ridges' }}</span>
                            </li>
                        </ul>

                        <div class="website-trek-card__actions" style="margin-top: auto; padding-top: var(--space-3); border-top: 1px solid var(--color-border);">
                            <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-btn website-btn--outline website-trek-card__btn">
                                <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m2 20 7-10 5 6 4-3 4 7H2z"></path>
                                </svg>
                                <span>View Trek</span>
                            </a>
                            <a href="{{ route('website.compare', ['treks' => [$trek['id']]]) }}"
                               role="button"
                               class="website-btn website-btn--outline website-compare-btn website-trek-card__btn"
                               data-trek-id="{{ $trek['id'] }}"
                               aria-pressed="false"
                               aria-label="Add {{ $trek['name'] }} to comparison">
                                <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect x="3" y="3" width="7" height="18"></rect>
                                    <rect x="14" y="3" width="7" height="18"></rect>
                                </svg>
                                <span>Compare</span>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div style="margin-top: var(--space-8); text-align: center;">
            <a href="{{ route('website.compare', ['treks' => ['t-ebc', 't-abc', 't-langtang']]) }}"
               class="website-btn website-btn--primary">
                <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="3" width="7" height="18"></rect>
                    <rect x="14" y="3" width="7" height="18"></rect>
                </svg>
                <span>Compare These 3 Treks in Full Detail &rarr;</span>
            </a>
        </div>
    </div>
</section>
