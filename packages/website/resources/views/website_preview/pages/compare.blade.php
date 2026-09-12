@extends('website_preview.layout.master')

@section('title', 'Compare Himalayan Treks Side-by-Side (Website) — EATH Ways')
@section('meta_description', 'Compare duration, altitude, physical challenge, seasonality, and illustrative pricing across Everest, Annapurna, Langtang, and Manaslu trails.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- 1. Header & Context -->
    <div style="margin-bottom: var(--space-6);">
        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2);">
            <span class="website-badge website-badge--warm">Side-by-Side Analysis</span>
            <span class="website-micro website-text-muted">Sample Fixtures</span>
        </div>
        <h1 class="website-h1" style="margin-bottom: var(--space-2);">Compare sample treks</h1>
        <p class="website-body website-text-secondary" style="max-width: 800px; margin-bottom: var(--space-3);">
            Inspect trail pacing, elevation milestones, tea house hospitality, and illustrative package rates across selected Himalayan journeys. All prices shown are sample ground-package starting rates per person; international flights and discretionary personal gear are excluded.
        </p>

        @if(!empty($notices))
            <div class="website-notice website-notice--info" role="status" style="margin-top: var(--space-4); margin-bottom: var(--space-4);">
                <div style="display: flex; flex-direction: column; gap: var(--space-1);">
                    @foreach($notices as $notice)
                        <div style="display: flex; align-items: flex-start; gap: var(--space-2);">
                            <span aria-hidden="true" style="color: var(--color-primary); font-weight: bold;">&bull;</span>
                            <span class="website-small">{{ $notice }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if(!empty($from) && $from === 'planner')
            <div class="website-notice website-notice--warm" style="margin-top: var(--space-4); margin-bottom: var(--space-4); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: var(--space-3);">
                <div>
                    <strong>Returning from interactive planner?</strong>
                    <span class="website-small website-text-secondary" style="display: block;">Your custom planner answers are safely saved in this session.</span>
                </div>
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary website-btn--compact">
                    &larr; Return to My Plan
                </a>
            </div>
        @endif
    </div>

    @if(count($selectedTreks) === 0)
        <!-- 2. Zero State: Helpful Browse & Preset Selector -->
        <div class="website-card" style="text-align: center; padding: var(--space-10) var(--space-6); margin-bottom: var(--space-10); background: var(--color-background-warm);">
            <div style="max-width: 600px; margin: 0 auto;">
                <div class="website-badge website-badge--accent" style="margin-bottom: var(--space-3);">0 of 3 Selected</div>
                <h2 class="website-h2" style="margin-bottom: var(--space-3);">No Treks Selected for Comparison</h2>
                <p class="website-body website-text-secondary" style="margin-bottom: var(--space-6);">
                    Choose up to 3 Himalayan trails to examine differences in maximum altitude, daily walking hours, physical difficulty, suitable seasons, and illustrative pricing.
                </p>

                <!-- Quick Preset Combinations -->
                <div style="margin-bottom: var(--space-8); padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
                    <span class="website-micro website-text-secondary" style="text-transform: uppercase; font-weight: 600; display: block; margin-bottom: var(--space-2);">
                        Quick Comparison Presets
                    </span>
                    <div style="display: flex; gap: var(--space-3); justify-content: center; flex-wrap: wrap;">
                        <a href="{{ route('website.compare', ['treks' => ['t-ebc', 't-abc', 't-langtang']]) }}" class="website-btn website-btn--outline website-btn--compact website-compare-set-link">
                            Classic Trio: EBC vs ABC vs Langtang
                        </a>
                        <a href="{{ route('website.compare', ['treks' => ['t-mardi', 't-khopra']]) }}" class="website-btn website-btn--outline website-btn--compact website-compare-set-link">
                            Annapurna Ridges: Mardi Himal vs Khopra
                        </a>
                        <a href="{{ route('website.compare', ['treks' => ['t-ebc', 't-gokyo']]) }}" class="website-btn website-btn--outline website-btn--compact website-compare-set-link">
                            Everest Routes: Base Camp vs Gokyo Lakes
                        </a>
                    </div>
                </div>
            </div>

            <!-- All 8 Treks Selection Grid -->
            <div style="text-align: left;">
                <h3 class="website-h3" style="margin-bottom: var(--space-4);">Select Treks from Catalog</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-4);">
                    @foreach($unselectedTreks as $trek)
                        <div class="website-card" style="display: flex; flex-direction: column; justify-content: space-between; padding: var(--space-4);">
                            <div>
                                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: var(--space-2);">
                                    <span class="website-micro website-text-secondary" style="text-transform: uppercase;">{{ $trek['region']['name'] }}</span>
                                    <span class="website-micro website-text-muted">{{ $trek['duration_days'] }} Days · {{ ucfirst($trek['difficulty']) }}</span>
                                </div>
                                <h4 class="website-card-title" style="margin-bottom: var(--space-2);">
                                    <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-link" style="color: inherit;">
                                        {{ $trek['name'] }}
                                    </a>
                                </h4>
                                <p class="website-small website-text-secondary" style="margin-bottom: var(--space-4); line-height: 1.5;">
                                    {{ $trek['summary'] }}
                                </p>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--color-border); padding-top: var(--space-3); margin-top: auto;">
                                <span class="website-h4" style="color: var(--color-primary); font-weight: 600; margin: 0;">
                                    {{ \Website\Support\WebsiteMoneyFormatter::format($trek['price_minor']) }} <span class="website-micro website-text-muted">USD</span>
                                </span>
                                <a href="{{ route('website.compare', ['treks' => [$trek['id']]]) }}"
                                   role="button"
                                   class="website-btn website-btn--primary website-btn--compact website-compare-btn"
                                   data-trek-id="{{ $trek['id'] }}"
                                   data-compare-mode="add"
                                   aria-pressed="false"
                                   aria-label="Add {{ $trek['name'] }} to comparison">
                                    + Add to Compare
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @else
        <!-- 3. Active Comparison Toolbar (Differences Toggle, Count, Clear) -->
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3); margin-bottom: var(--space-4); padding: var(--space-3) var(--space-4); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
            <div style="display: flex; align-items: center; gap: var(--space-4); flex-wrap: wrap;">
                <label style="display: inline-flex; align-items: center; gap: var(--space-2); cursor: pointer; font-size: var(--type-small); font-weight: 500;">
                    <input type="checkbox" id="website-toggle-diffs" aria-controls="website-compare-table" style="cursor: pointer; width: 18px; height: 18px; accent-color: var(--color-primary);">
                    <span>Show differences only</span>
                </label>

                <span id="website-diff-status" class="website-micro website-text-secondary" aria-live="polite">
                    Showing all {{ $totalRowsCount }} comparison metrics ({{ $differencesCount }} differences found)
                </span>
            </div>

            <div style="display: flex; align-items: center; gap: var(--space-3);">
                <span class="website-badge website-badge--warm">
                    {{ count($selectedTreks) }} of 3 selected
                </span>
                <a href="{{ route('website.compare', ['clear' => 1]) }}" id="website-compare-page-clear" class="website-btn website-btn--ghost website-btn--compact" aria-label="Clear all compared treks">
                    Clear Selection
                </a>
            </div>
        </div>

        @if(count($selectedTreks) === 1)
            <div class="website-notice website-notice--info" style="margin-bottom: var(--space-4);">
                <p class="website-small">
                    <strong>1 trek currently selected.</strong> Add 1 or 2 more treks using the slots below to compare side-by-side metrics.
                </p>
            </div>
        @endif

        <!-- 4. Semantic Comparison Table with Horizontal Scroll Support -->
        <p id="website-table-scroll-hint" class="website-micro website-text-muted" style="margin-bottom: var(--space-2); display: flex; align-items: center; gap: var(--space-1);">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            <span>Scroll horizontally on smaller screens to inspect all columns</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </p>

        <div class="website-table-wrapper" tabindex="0" role="region" aria-label="Trek comparison table" aria-describedby="website-table-scroll-hint">
            <table id="website-compare-table" class="website-compare-table" aria-label="Side-by-side trek comparison">
                <caption class="visually-hidden">Side-by-side comparison of selected Himalayan treks</caption>

                <!-- Table Header: Trek Cards with Image, Title, and Remove/Replace Controls -->
                <thead>
                    <tr>
                        <th scope="col" class="website-compare-table__feature-col" style="vertical-align: bottom;">
                            <span class="website-micro website-text-secondary" style="text-transform: uppercase; letter-spacing: 0.05em;">
                                Journey Specifications
                            </span>
                        </th>

                        @foreach($selectedTreks as $trek)
                            @php
                                $remainingIds = array_values(array_diff($selectedIds, [$trek['id']]));
                                $trekImage = $trek['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("trek-{$trek['id']}", $trek['name']);
                            @endphp
                            <th scope="col" class="website-compare-table__trek-col">
                                <div class="website-compare-header-card">
                                    <div style="aspect-ratio: 16/10; overflow: hidden; border-radius: var(--radius-sm); margin-bottom: var(--space-2); background: var(--color-background-warm);">
                                        <img src="{{ $trekImage['url'] }}" alt="{{ $trekImage['alt'] }}" width="{{ $trekImage['width'] }}" height="{{ $trekImage['height'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>

                                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: var(--space-1);">
                                        <span class="website-micro website-text-secondary" style="text-transform: uppercase;">
                                            {{ $trek['region']['name'] }}
                                        </span>
                                        <a href="{{ route('website.compare', ['treks' => $remainingIds, 'from' => $from]) }}"
                                           class="website-btn website-btn--ghost website-btn--compact"
                                           style="color: var(--color-text-muted); padding: 2px 6px; font-size: var(--type-micro);"
                                           aria-label="Remove {{ $trek['name'] }} from comparison">
                                            &times; Remove
                                        </a>
                                    </div>

                                    <h3 class="website-card-title" style="font-size: 1.1rem; margin-bottom: var(--space-2);">
                                        <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-link" style="color: inherit;">
                                            {{ $trek['name'] }}
                                        </a>
                                    </h3>

                                    <!-- Replace Control (Accessible Disclosure) -->
                                    @if(count($unselectedTreks) > 0)
                                        <details class="website-compare-replace-dropdown" style="position: relative; margin-top: var(--space-2);">
                                            <summary class="website-micro website-text-secondary" style="cursor: pointer; user-select: none;">
                                                Replace with &darr;
                                            </summary>
                                            <div class="website-compare-replace-menu" role="menu">
                                                @foreach($unselectedTreks as $uTrek)
                                                    @php
                                                        $replaced = array_map(fn($id) => $id === $trek['id'] ? $uTrek['id'] : $id, $selectedIds);
                                                    @endphp
                                                    <a href="{{ route('website.compare', ['treks' => $replaced, 'from' => $from]) }}" role="menuitem" class="website-compare-replace-item">
                                                        <span>{{ $uTrek['name'] }}</span>
                                                        <span class="website-micro website-text-muted">({{ $uTrek['duration_days'] }}d)</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </details>
                                    @endif
                                </div>
                            </th>
                        @endforeach

                        <!-- Empty Slot Column (if fewer than 3 treks selected) -->
                        @if(count($selectedTreks) < 3)
                            @for($i = count($selectedTreks); $i < 3; $i++)
                                <th scope="col" class="website-compare-table__add-col">
                                    <div class="website-compare-add-slot">
                                        <span class="website-badge website-badge--warm" style="margin-bottom: var(--space-2);">Empty Slot</span>
                                        <h4 class="website-h4" style="margin-bottom: var(--space-2); font-size: 1rem;">
                                            {{ count($selectedTreks) === 2 ? 'Add a 3rd Trek' : 'Add Trek to Compare' }}
                                        </h4>
                                        <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-4);">
                                            Select another trail from our catalog to compare metrics side-by-side.
                                        </p>

                                        @if(count($unselectedTreks) > 0)
                                            <form method="GET" action="{{ route('website.compare') }}" style="display: flex; flex-direction: column; gap: var(--space-2);">
                                                @foreach($selectedIds as $sid)
                                                    <input type="hidden" name="treks[]" value="{{ $sid }}">
                                                @endforeach
                                                @if(!empty($from))
                                                    <input type="hidden" name="from" value="{{ $from }}">
                                                @endif

                                                <label for="add-trek-select-{{ $i }}" class="visually-hidden">Choose trek to add</label>
                                                <select id="add-trek-select-{{ $i }}" name="treks[]" class="website-input website-input--compact" style="font-size: var(--type-small);">
                                                    <option value="" disabled selected>Choose a trek...</option>
                                                    @foreach($unselectedTreks as $uTrek)
                                                        <option value="{{ $uTrek['id'] }}">
                                                            {{ $uTrek['name'] }} ({{ $uTrek['duration_days'] }}d)
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="website-btn website-btn--outline website-btn--compact" style="width: 100%;">
                                                    + Add Selected
                                                </button>
                                            </form>
                                        @else
                                            <span class="website-micro website-text-muted">All available fixture treks are currently selected.</span>
                                        @endif
                                    </div>
                                </th>
                            @endfor
                        @endif
                    </tr>
                </thead>

                <!-- Table Body: Categorized Comparison Row Groups -->
                @foreach($rowGroups as $groupName => $rows)
                    <tbody class="website-compare-group">
                        <tr class="website-compare-table__group-header">
                            <th scope="colgroup" colspan="{{ 1 + count($selectedTreks) + (count($selectedTreks) < 3 ? (3 - count($selectedTreks)) : 0) }}">
                                {{ $groupName }}
                            </th>
                        </tr>

                        @foreach($rows as $row)
                            <tr data-different="{{ $row['is_different'] ? 'true' : 'false' }}">
                                <th scope="row" class="website-compare-table__row-label">
                                    <div style="display: flex; align-items: center; justify-content: space-between; gap: var(--space-2);">
                                        <span>{{ $row['label'] }}</span>
                                        @if($row['is_different'])
                                            <span class="website-badge website-badge--accent" style="font-size: 0.65rem; padding: 0.1rem 0.35rem;">Diff</span>
                                        @endif
                                    </div>
                                </th>

                                @foreach($row['values'] as $valIndex => $val)
                                    <td class="website-compare-table__cell">
                                        @if($row['render_type'] === 'badge')
                                            <span class="website-badge website-badge--warm">{{ $val }}</span>
                                        @elseif($row['render_type'] === 'list')
                                            <ul style="margin: 0; padding-left: var(--space-4); font-size: var(--type-small); line-height: 1.5;">
                                                @foreach((array)$val as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        @elseif($row['render_type'] === 'price')
                                            <span class="website-h4" style="color: var(--color-primary); font-weight: 600; margin: 0;">
                                                {{ $val }}
                                            </span>
                                        @else
                                            <span class="website-small" style="line-height: 1.5;">{{ $val }}</span>
                                        @endif
                                    </td>
                                @endforeach

                                <!-- Empty Filler Cells if fewer than 3 treks -->
                                @if(count($selectedTreks) < 3)
                                    @for($i = count($selectedTreks); $i < 3; $i++)
                                        <td class="website-compare-table__cell website-compare-table__cell--empty">
                                            <span class="website-text-muted">&mdash;</span>
                                        </td>
                                    @endfor
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                @endforeach

                <!-- Table Footer: Bottom Conversion Actions -->
                <tfoot>
                    <tr class="website-compare-table__footer-row">
                        <th scope="row" class="website-compare-table__row-label" style="vertical-align: middle;">
                            Next Actions
                        </th>

                        @foreach($selectedTreks as $trek)
                            <td class="website-compare-table__cell">
                                <div style="display: flex; flex-direction: column; gap: var(--space-2);">
                                    <a href="{{ route('website.planner.start', ['mode' => 'selected', 'trek' => $trek['id'], 'source' => 'compare']) }}" class="website-btn website-btn--primary website-btn--compact" style="width: 100%; justify-content: center;">
                                        Plan This Trek
                                    </a>
                                    <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-btn website-btn--outline website-btn--compact" style="width: 100%; justify-content: center;">
                                        View Detail Page
                                    </a>
                                </div>
                            </td>
                        @endforeach

                        @if(count($selectedTreks) < 3)
                            @for($i = count($selectedTreks); $i < 3; $i++)
                                <td class="website-compare-table__cell website-compare-table__cell--empty">
                                    <span class="website-micro website-text-muted">Select trek to view actions</span>
                                </td>
                            @endfor
                        @endif
                    </tr>
                </tfoot>
            </table>
        </div>
    @endif

    <!-- 5. Decision Guidance & Planner Return Section -->
    <section class="website-card" style="background: var(--color-secondary); border: 1px solid var(--color-secondary); border-radius: 0 !important; margin-top: var(--space-8); margin-bottom: var(--space-12); padding: var(--space-8); color: #ffffff;">
        <div style="max-width: 720px;">
            <div style="font-size: var(--type-micro); font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-primary-vivid); margin-bottom: var(--space-3);">
                Unbiased Recommendation Engine
            </div>
            <h2 class="website-h2" style="color: #ffffff; margin-bottom: var(--space-3);">
                Need help choosing the right trail?
            </h2>
            <p class="website-body" style="color: rgba(255, 255, 255, 0.9); margin-bottom: var(--space-6); line-height: 1.6;">
                Tell our guided trip planner about your preferred season, physical walking comfort ceiling, travel companions, and ground budget. We will calculate an unbiased compatibility score across all 8 Himalayan routes.
            </p>

            <div style="display: flex; gap: var(--space-3); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--accent">
                    Open Guided Trip Planner &rarr;
                </a>
                @if(!empty($from) && $from === 'planner')
                    <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--outline" style="color: #ffffff; border-color: rgba(255, 255, 255, 0.5);">
                        Return to Saved Plan
                    </a>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
