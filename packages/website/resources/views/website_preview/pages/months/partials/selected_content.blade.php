<!-- 5. Selected Month Overview Panel -->
<section id="selected-month-panel" aria-labelledby="heading-selected-month" style="margin-bottom: var(--space-10);">
    <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: var(--space-3); margin-bottom: var(--space-4);">
            <div>
                <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-1);">
                    <span class="website-badge website-badge--primary" style="border-radius: 0 !important;">{{ $selectedMonth['season'] }} Window</span>
                    @if($isDefault && $selectedMonth['id'] === 9)
                        <span class="website-badge website-badge--neutral" style="border-radius: 0 !important;">Sample Default</span>
                    @endif
                </div>
                <h2 id="heading-selected-month" class="website-h2" style="margin: 0;">
                    Trekking in {{ $selectedMonth['name'] }}
                </h2>
            </div>

            <!-- Link to dedicated Month Detail Page -->
            <a href="{{ route('website.months.show', ['month' => $selectedMonth['slug']]) }}"
               class="website-btn website-btn--outline"
               style="font-size: 0.875rem; border-radius: 0 !important;">
                Full {{ $selectedMonth['name'] }} Guide &rarr;
            </a>
        </div>

        <!-- Narrative Overview -->
        <p class="website-body" style="line-height: 1.6; margin-bottom: var(--space-4); max-width: 860px;">
            {{ $currentEditorial['overview'] }}
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-3); margin-bottom: var(--space-2);">
            <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important;">
                <strong class="website-micro" style="text-transform: uppercase; color: var(--color-text-muted); display: block; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                    Trail Atmosphere &amp; Crowds
                </strong>
                <span class="website-small" style="line-height: 1.4; display: block;">
                    {{ $currentEditorial['trail_vibe'] }}
                </span>
            </div>

            <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important;">
                <strong class="website-micro" style="text-transform: uppercase; color: var(--color-text-muted); display: block; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                    Seasonal Gear Note
                </strong>
                <span class="website-small" style="line-height: 1.4; display: block;">
                    {{ $currentEditorial['pack_tip'] }}
                </span>
            </div>
        </div>
    </div>
</section>

<!-- 6. Relevant Sample Trek Results -->
<section aria-labelledby="heading-matching-treks" style="margin-bottom: var(--space-12);">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-3);">
        <div>
            <div style="color: var(--color-accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                Catalog Routes
            </div>
            <h2 id="heading-matching-treks" class="website-h2" style="margin: 0;">
                Sample Itineraries for {{ $selectedMonth['name'] }} ({{ count($matchingTreks) }})
            </h2>
            <p class="website-small website-text-secondary" style="margin: var(--space-1) 0 0 0;">
                Treks tagged with {{ $selectedMonth['name'] }} suitability in the fixture catalog.
            </p>
        </div>

        @if(count($matchingTreks) > 0)
            <a href="{{ route('website.treks.index', ['month' => $selectedMonth['id']]) }}" class="website-btn website-btn--outline" style="font-size: 0.875rem; border-radius: 0 !important;">
                View All {{ $selectedMonth['name'] }} Treks in Search &rarr;
            </a>
        @endif
    </div>

    @if(count($matchingTreks) > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: var(--space-6);">
            @foreach($matchingTreks as $trek)
                @include('website_preview.components.trek-card', ['trek' => $trek])
            @endforeach
        </div>
    @else
        <!-- Honest Empty State for 0-match months (e.g. Winter January/February/December) -->
        <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-surface); border: 1px dashed var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
            <div style="max-width: 540px; margin: 0 auto;">
                <div style="font-size: 2.25rem; margin-bottom: var(--space-2);">❄️</div>
                <h3 class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    No Catalog Itineraries for {{ $selectedMonth['name'] }}
                </h3>
                <p class="website-body website-text-secondary" style="line-height: 1.6; margin-bottom: var(--space-5);">
                    Our sample catalog does not schedule standard group departures in {{ $selectedMonth['name'] }}. High-altitude passes often experience heavy snow or closed high-camps during mid-winter. However, custom lower-elevation foothill itineraries and valley walks can be planned on request.
                </p>
                <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                    <a href="{{ route('website.planner.start') }}?mode=custom&source=month" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                        Request Custom Winter Trek
                    </a>
                    <a href="{{ route('website.months.index', ['month' => 'october']) }}" class="website-btn website-btn--outline when-to-go-month-link" data-month-slug="october" style="border-radius: 0 !important;">
                        View Peak Season (October)
                    </a>
                </div>
            </div>
        </div>
    @endif
</section>

<!-- 7. Dynamic CTA Banner Carrying Selected Month -->
<section aria-labelledby="heading-plan-month-cta" class="website-final-cta" style="margin-bottom: var(--space-10); border-radius: 0 !important;">
    <div class="website-final-cta__inner">
        <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-3); display: inline-block;">
            {{ !empty($page?->cta_eyebrow) ? $page->cta_eyebrow : 'EXPEDITION PLANNING' }}
        </span>
        <h2 id="heading-plan-month-cta" class="website-final-cta__title" style="font-size: var(--type-h2);">
            {{ !empty($page?->cta_title) ? $page->cta_title : ('Ready to plan your ' . $selectedMonth['name'] . ' expedition?') }}
        </h2>
        <p class="website-final-cta__subtitle">
            {{ !empty($page?->cta_description) ? $page->cta_description : 'Build an unhurried, custom-paced itinerary draft with our licensed mountain team.' }}
        </p>

        <div class="website-final-cta__actions">
            <a href="{{ !empty($page?->cta_primary_btn_url) ? $page->cta_primary_btn_url : (route('website.planner.start') . '?mode=discover&month=' . $selectedMonth['id'] . '&source=month') }}"
               class="website-btn website-btn--accent"
               style="border-radius: 0 !important;">
                {{ !empty($page?->cta_primary_btn_text) ? $page->cta_primary_btn_text : ('Plan ' . $selectedMonth['name'] . ' Trek') }}
            </a>
            <a href="{{ !empty($page?->cta_secondary_btn_url) ? $page->cta_secondary_btn_url : route('website.contact') }}"
               class="website-btn website-btn--outline"
               style="color: #ffffff; border-color: rgba(255, 255, 255, 0.6); border-radius: 0 !important;">
                {{ !empty($page?->cta_secondary_btn_text) ? $page->cta_secondary_btn_text : 'Ask a Question' }}
            </a>
        </div>
    </div>
</section>
