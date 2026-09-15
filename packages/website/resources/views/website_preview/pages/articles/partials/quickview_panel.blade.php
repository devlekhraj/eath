<header class="website-join__header" style="position: sticky; top: 0; z-index: 10; background: var(--color-surface); border-bottom: 1px solid var(--color-border); padding: 18px 24px; display: flex; justify-content: space-between; align-items: flex-start; gap: 16px;">
    <div>
        <span class="website-join__step" style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-accent); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; display: block; margin-bottom: 4px;">
            FIELD GUIDE QUICK PEEK · {{ strtoupper($categoryLabel) }}
        </span>
        <h2 id="website-global-offcanvas-title" class="website-join__title" style="font-family: var(--font-display); font-size: 1.35rem; font-weight: 700; color: var(--color-text); margin: 0 0 4px 0; line-height: 1.25;">
            {{ $article['title'] }}
        </h2>
        <div id="website-global-offcanvas-subtitle" class="website-join__subtitle" style="font-size: 0.8125rem; color: var(--color-text-secondary); line-height: 1.4; display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <span>{{ $article['reading_time'] ?? '5 min read' }}</span>
            <span style="opacity: 0.5;">&middot;</span>
            <span>{{ $article['author_label'] ?? 'EATH Field Editorial' }}</span>
            @if(!empty($article['updated_date']))
                <span style="opacity: 0.5;">&middot;</span>
                <span>{{ date('M Y', strtotime($article['updated_date'])) }}</span>
            @endif
        </div>
    </div>
    <button type="button" id="website-global-offcanvas-close" class="website-join__close" data-bs-dismiss="offcanvas" aria-label="Close side panel" style="background: transparent; border: none; font-size: 1.6rem; line-height: 1; color: var(--color-text-muted); cursor: pointer; padding: 0; margin-top: -2px;">&times;</button>
</header>

<div class="website-join__body" style="padding: 0 !important; background: var(--color-background); min-height: 100%;">
    @if(!empty($article['image']['url']))
        <div style="width: 100%; height: 200px; position: relative; overflow: hidden; background: var(--color-secondary);">
            <img src="{{ $article['image']['url'] }}"
                 alt="{{ $article['image']['alt'] ?? $article['title'] }}"
                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 0 !important; display: block;" />
            <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(12, 74, 110, 0.15) 0%, rgba(12, 74, 110, 0.75) 100%);"></div>
            <div style="position: absolute; bottom: 14px; left: 20px; right: 20px;">
                <span style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; background: var(--color-primary); color: #ffffff; padding: 2px 6px; border-radius: 0 !important; display: inline-block;">
                    {{ $categoryLabel }}
                </span>
            </div>
        </div>
    @endif

    <div style="padding: 24px; display: flex; flex-direction: column; gap: 24px;">
        
        <!-- Summary Block -->
        <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-left: 4px solid var(--color-primary); padding: 18px 20px; border-radius: 0 !important;">
            <span style="font-size: 0.7rem; font-weight: 700; color: var(--color-primary); text-transform: uppercase; letter-spacing: 0.08em; display: block; margin-bottom: 6px;">
                FIELD EXECUTIVE SUMMARY
            </span>
            <p style="font-size: 0.95rem; font-weight: 500; color: var(--color-text); margin: 0; line-height: 1.6;">
                {{ $article['summary'] }}
            </p>
        </div>

        <!-- Section Outlines & Insights -->
        @if(!empty($article['sections']) && count($article['sections']) > 0)
            <div>
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px; border-bottom: 1px solid var(--color-border); padding-bottom: 6px;">
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text); text-transform: uppercase; letter-spacing: 0.08em;">
                        GUIDE SECTION BREAKDOWN ({{ count($article['sections']) }})
                    </span>
                    <span style="font-size: 0.72rem; color: var(--color-text-muted);">
                        TABLE OF CONTENTS
                    </span>
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach($article['sections'] as $sIdx => $section)
                        <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; padding: 14px 16px; box-shadow: none;">
                            <div style="display: flex; align-items: baseline; gap: 8px; margin-bottom: 6px;">
                                <span style="font-family: var(--font-display); font-weight: 700; font-size: 0.85rem; color: var(--color-primary); min-width: 22px;">
                                    {{ str_pad($sIdx + 1, 2, '0', STR_PAD_LEFT) }}.
                                </span>
                                <h4 style="font-size: 0.9rem; font-weight: 700; color: var(--color-text); margin: 0; line-height: 1.3;">
                                    {{ $section['heading'] }}
                                </h4>
                            </div>
                            <p style="font-size: 0.8125rem; color: var(--color-text-secondary); margin: 0 0 0 30px; line-height: 1.5;">
                                {{ \Illuminate\Support\Str::limit(strip_tags($section['body']), 160) }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Applicable Trek Routes -->
        @if(!empty($article['related_treks']) && count($article['related_treks']) > 0)
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; padding: 16px 18px;">
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-secondary); text-transform: uppercase; letter-spacing: 0.08em; display: block; margin-bottom: 10px;">
                    RELEVANT HIMALAYAN EXPEDITIONS
                </span>
                <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                    @foreach($article['related_treks'] as $relTrek)
                        <a href="{{ route('website.treks.show', $relTrek['slug']) }}"
                           class="website-filter-chip"
                           style="font-size: 0.78rem; padding: 4px 10px; border-radius: 0 !important; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                            <span>{{ $relTrek['name'] }}</span>
                            <span style="font-size: 0.7rem; opacity: 0.7;">({{ $relTrek['region'] }})</span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Direct Actions -->
        <div style="padding-top: 8px; border-top: 1px solid var(--color-border); display: flex; flex-direction: column; gap: 10px;">
            <a href="{{ route('website.articles.show', ['slug' => $article['slug']]) }}"
               class="website-btn website-btn--accent"
               style="justify-content: center; border-radius: 0 !important; font-size: 0.875rem;">
                <span>Read Full Field Guide</span>
                <span aria-hidden="true">&rarr;</span>
            </a>
            <a href="{{ route('website.planner.start', ['mode' => 'discover', 'source' => $article['slug']]) }}"
               class="website-btn website-btn--outline"
               style="justify-content: center; border-radius: 0 !important; font-size: 0.875rem;">
                <span>Plan Expedition with this Guide</span>
            </a>
        </div>

    </div>
</div>
