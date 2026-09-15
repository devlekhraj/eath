@php
    $resolvedImageUrl = !empty($pillar['image_url']) ? $pillar['image_url'] : (!empty($pillar['image_key']) ? \Website\Support\WebsiteAssetRegistry::resolve($pillar['image_key'])['url'] : null);
    $resolvedImageAlt = !empty($pillar['image_alt']) ? $pillar['image_alt'] : ($pillar['title'] ?? 'Pillar Image');
@endphp

<header class="website-join__header" style="position: sticky; top: 0; z-index: 10; background: var(--color-surface); border-bottom: 1px solid var(--color-border); padding: 18px 24px; display: flex; justify-content: space-between; align-items: flex-start; gap: 16px;">
    <div>
        <span class="website-join__step" style="background: transparent !important; border: none !important; padding: 0 !important; color: var(--color-accent); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; display: block; margin-bottom: 4px;">
            {{ $pillar['kicker'] ?? 'EXPEDITION PILLAR ' . ($pillar['number'] ?? '01') }}
        </span>
        <h2 id="website-global-offcanvas-title" class="website-join__title" style="font-family: var(--font-display); font-size: 1.35rem; font-weight: 700; color: var(--color-text); margin: 0 0 4px 0; line-height: 1.25;">
            {{ $pillar['title'] }}
        </h2>
        <div id="website-global-offcanvas-subtitle" class="website-join__subtitle" style="font-size: 0.8125rem; color: var(--color-text-secondary); line-height: 1.4;">
            {{ $pillar['tagline'] }}
        </div>
    </div>
    <button type="button" id="website-global-offcanvas-close" class="website-join__close" data-bs-dismiss="offcanvas" aria-label="Close side panel" style="background: transparent; border: none; font-size: 1.6rem; line-height: 1; color: var(--color-text-muted); cursor: pointer; padding: 0; margin-top: -2px;">&times;</button>
</header>

<div class="website-join__body" style="padding: 0 !important; background: var(--color-background); min-height: 100%;">
    @if(!empty($resolvedImageUrl))
        <div style="width: 100%; height: 180px; position: relative; overflow: hidden; background: var(--color-secondary);">
            <img src="{{ $resolvedImageUrl }}"
                 alt="{{ $resolvedImageAlt }}"
                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 0 !important; display: block;" />
            <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(12, 74, 110, 0.2) 0%, rgba(12, 74, 110, 0.8) 100%);"></div>
            <div style="position: absolute; bottom: 14px; left: 20px; right: 20px; color: #ffffff;">
                <span style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; background: var(--color-accent); color: #ffffff; padding: 2px 6px; border-radius: 0 !important; display: inline-block; margin-bottom: 4px;">
                    FIELD PILLAR {{ $pillar['number'] ?? '01' }}
                </span>
                <div style="font-size: 0.95rem; font-weight: 600; text-shadow: 0 1px 2px rgba(0,0,0,0.4);">
                    {{ $pillar['tagline'] }}
                </div>
            </div>
        </div>
    @endif

    <div style="padding: 24px; display: flex; flex-direction: column; gap: 24px;">
        
        <!-- Summary & Lead -->
        <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-left: 4px solid var(--color-primary); padding: 18px 20px; border-radius: 0 !important;">
            <span style="font-size: 0.7rem; font-weight: 700; color: var(--color-primary); text-transform: uppercase; letter-spacing: 0.08em; display: block; margin-bottom: 6px;">
                EXECUTIVE EXPEDITION CONTEXT
            </span>
            <p style="font-size: 0.95rem; font-weight: 600; color: var(--color-text); margin-bottom: 8px; line-height: 1.5;">
                {{ $pillar['summary'] }}
            </p>
            <p style="font-size: 0.875rem; color: var(--color-text-secondary); margin: 0; line-height: 1.6;">
                {{ $pillar['lead'] }}
            </p>
        </div>

        <!-- 5 Essential Field Rules -->
        @if(!empty($pillar['rules']))
            <div>
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px; border-bottom: 1px solid var(--color-border); padding-bottom: 6px;">
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text); text-transform: uppercase; letter-spacing: 0.08em;">
                        ESSENTIAL FIELD PRINCIPLES ({{ count($pillar['rules']) }})
                    </span>
                    <span style="font-size: 0.72rem; color: var(--color-text-muted);">
                        MANDATORY BASELINE
                    </span>
                </div>

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach($pillar['rules'] as $idx => $rule)
                        <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; padding: 14px 16px; box-shadow: none;">
                            <div style="display: flex; align-items: baseline; gap: 8px; margin-bottom: 6px;">
                                <span style="font-family: var(--font-display); font-weight: 700; font-size: 0.9rem; color: var(--color-primary); min-width: 24px;">
                                    {{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <h4 style="font-size: 0.9rem; font-weight: 700; color: var(--color-text); margin: 0; line-height: 1.3;">
                                    {{ $rule['rule'] }}
                                </h4>
                            </div>
                            <p style="font-size: 0.8125rem; color: var(--color-text-secondary); margin: 0 0 0 32px; line-height: 1.5;">
                                {{ $rule['detail'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Alpine Hazards & Traps -->
        @if(!empty($pillar['hazards']))
            <div style="background: #fff1f2; border: 1px solid #fecdd3; border-left: 4px solid var(--color-accent); border-radius: 0 !important; padding: 16px 18px;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.08em;">
                        CRITICAL ALPINE PITFALLS TO AVOID
                    </span>
                </div>
                <ul style="margin: 0; padding-left: 20px; display: flex; flex-direction: column; gap: 8px; font-size: 0.8125rem; color: #9f1239; line-height: 1.5;">
                    @foreach($pillar['hazards'] as $hazard)
                        <li>{{ $hazard }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Field Checklist -->
        @if(!empty($pillar['checklists']))
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; padding: 16px 18px;">
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-secondary); text-transform: uppercase; letter-spacing: 0.08em; display: block; margin-bottom: 10px;">
                    EXPEDITION ACTION CHECKLIST
                </span>
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    @foreach($pillar['checklists'] as $item)
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="display: inline-flex; align-items: center; justify-content: center; width: 18px; height: 18px; background: #e0f2fe; color: var(--color-primary); border-radius: 0 !important; flex-shrink: 0; margin-top: 1px;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </span>
                            <span style="font-size: 0.8125rem; color: var(--color-text); line-height: 1.45;">
                                {{ $item }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Associated Field Guides -->
        @if(!empty($articles) && count($articles) > 0)
            <div>
                <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px; border-bottom: 1px solid var(--color-border); padding-bottom: 6px;">
                    <span style="font-size: 0.75rem; font-weight: 700; color: var(--color-text); text-transform: uppercase; letter-spacing: 0.08em;">
                        ASSOCIATED FIELD DISPATCHES
                    </span>
                    <a href="{{ route('website.articles.index', ['category' => $pillar['key']]) }}" style="font-size: 0.75rem; color: var(--color-primary); text-decoration: none; font-weight: 600;">
                        View All &rarr;
                    </a>
                </div>

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach($articles as $art)
                        <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; padding: 12px 14px; display: flex; gap: 12px; align-items: center;">
                            @if(!empty($art['image']['url']))
                                <img src="{{ $art['image']['url'] }}" alt="{{ $art['title'] }}" style="width: 56px; height: 56px; object-fit: cover; flex-shrink: 0; border-radius: 0 !important;" />
                            @endif
                            <div style="flex: 1 1 auto; min-width: 0;">
                                <h5 style="margin: 0 0 4px 0; font-size: 0.85rem; font-weight: 600; line-height: 1.3;">
                                    <a href="{{ route('website.articles.show', ['slug' => $art['slug']]) }}" style="color: var(--color-text); text-decoration: none;">
                                        {{ $art['title'] }}
                                    </a>
                                </h5>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <a href="{{ route('website.articles.show', ['slug' => $art['slug']]) }}" style="font-size: 0.75rem; color: var(--color-primary); text-decoration: none; font-weight: 600;">
                                        Read Dispatch &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Action Footer -->
        <div style="padding-top: 8px; border-top: 1px solid var(--color-border); display: flex; flex-direction: column; gap: 10px;">
            <a href="{{ route('website.articles.index', ['category' => $pillar['key']]) }}"
               class="website-btn website-btn--primary"
               style="justify-content: center; border-radius: 0 !important; font-size: 0.875rem;">
                <span>Filter Library by {{ $pillar['title'] }}</span>
                <span aria-hidden="true">&rarr;</span>
            </a>
            <a href="{{ route('website.planner.start', ['mode' => 'discover', 'pillar' => $pillar['key']]) }}"
               class="website-btn website-btn--outline"
               style="justify-content: center; border-radius: 0 !important; font-size: 0.875rem;">
                <span>Plan Expedition with this Pillar</span>
            </a>
        </div>

    </div>
</div>
