@extends('website_preview.layout.master')

@section('title', ($page?->meta_title ?: ($title ?: 'Himalayan Safety & Field Support Framework')) . ' | EATH Trekking Website')
@section('meta_description', $page?->meta_description ?: ($metaDescription ?: 'Explore our proposed safety discussion framework, acclimatization pacing questions, and field coordination standards for Himalayan trekking.'))

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    <div style="max-width: 860px; margin: 0 auto;">
        {{-- 1. Hero Image --}}
        <img
            src="{{ $heroImage['url'] }}"
            alt="{{ $heroImage['alt'] }}"
            width="{{ $heroImage['width'] }}"
            height="{{ $heroImage['height'] }}"
            loading="eager"
            decoding="async"
            style="width: 100%; height: auto; aspect-ratio: 16/9; object-fit: cover; margin-bottom: var(--space-8); border-radius: 0 !important;"
        >

        {{-- 2. H1 & Operational Verification Note --}}
        <header style="margin-bottom: var(--space-10);">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
                Field Standards
            </div>
            <h1 class="website-h1" style="margin: 0 0 var(--space-4) 0;">
                {{ $page?->title ?: 'Himalayan Safety & Field Support Framework' }}
            </h1>
            <p class="website-lead website-text-secondary" style="margin: 0 0 var(--space-5) 0; line-height: 1.6;">
                {{ $page?->summary ?: 'Trekking in high-altitude environments requires structured acclimatization, open communication, and proactive trail decision-making. Explore our proposed preparation framework and discussion guidelines below.' }}
            </p>

            {{-- Operational Verification Notice Banner --}}
            @php
                $noticeTitle = $page?->notice_title ?: 'Sample editorial layout — operational content must be verified';
                $noticeBody = $page?->notice_body ?: 'This page is an editorial preview showing how safety policies, health check routines, and field coordination topics could be structured. It does not constitute verified company policy, medical advice, or real-time emergency dispatch instructions. In live operations, all guidelines must be verified with certified mountain leaders and official health authorities.';
            @endphp
            @if(!empty($noticeTitle) || !empty($noticeBody))
                <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: 0 !important; box-shadow: none !important;">
                    <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                        <span style="font-size: 1.25rem; line-height: 1;" aria-hidden="true">ℹ️</span>
                        <div>
                            @if(!empty($noticeTitle))
                                <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                                    {{ $noticeTitle }}
                                </strong>
                            @endif
                            @if(!empty($noticeBody))
                                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                                    {{ $noticeBody }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </header>

        {{-- 3. Dynamic Page Sections --}}
        @php
            $sections = $page?->sections ?? collect();
        @endphp

        @if($sections->isNotEmpty())
            @foreach($sections as $index => $section)
                @php
                    $rawContent = $section->content;
                    $items = $rawContent['items'] ?? (is_array($rawContent) ? $rawContent : []);
                    $tag = $rawContent['tag'] ?? null;
                    $layout = $section->layout_key ?: 'standard';
                    $secHeadingId = 'heading-safety-sec-' . ($section->id ?: $index);
                @endphp

                <section aria-labelledby="{{ $secHeadingId }}" style="margin-bottom: var(--space-12);">
                    <div style="margin-bottom: var(--space-4);">
                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                            {{ $tag ?: ($layout === 'cards_grid' ? 'Operational Standards' : ($layout === 'qa_grid' ? 'Traveler Inquiries' : ($layout === 'disclosure' ? 'Transparency Standard' : 'Field Guideline'))) }}
                        </div>
                        <h2 id="{{ $secHeadingId }}" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                            {{ $section->heading }}
                        </h2>
                        @if(!empty($section->body))
                            <div class="website-body website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.6;">
                                {!! $section->body !!}
                            </div>
                        @endif
                    </div>

                    {{-- Layout specific presentation --}}
                    @if($layout === 'checklist' && !empty($items))
                        <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                            <ul style="margin: 0; padding-left: var(--space-5); line-height: 1.7;" class="website-body website-text-secondary">
                                @foreach($items as $item)
                                    <li style="margin-bottom: var(--space-2);">
                                        <strong>{{ $item['title'] ?? '' }}:</strong> {{ $item['description'] ?? '' }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif($layout === 'cards_grid' && !empty($items))
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
                            @foreach($items as $item)
                                <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                                    @if(!empty($item['tag']))
                                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.72rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                                            {{ $item['tag'] }}
                                        </div>
                                    @endif
                                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                                        {{ $item['title'] ?? '' }}
                                    </strong>
                                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                                        {{ $item['description'] ?? '' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @elseif($layout === 'qa_grid' && !empty($items))
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
                            @foreach($items as $item)
                                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                                        {{ $item['title'] ?? '' }}
                                    </strong>
                                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                                        {{ $item['description'] ?? '' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @elseif($layout === 'disclosure')
                        <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                            @if(!empty($items))
                                @foreach($items as $item)
                                    <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border-light); margin-bottom: var(--space-2); border-radius: 0 !important;">
                                        <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                                            {{ $item['title'] ?? 'Operational Protocol' }}:
                                        </strong>
                                        <p class="website-micro website-text-muted" style="margin: 0; font-style: italic; line-height: 1.5;">
                                            {{ $item['description'] ?? '' }}
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endif
                </section>
            @endforeach
        @else
            {{-- Fallback Presentation (Zero Breakage Policy) --}}
            {{-- 3. Proposed Preparation-Discussion Framework --}}
            <section aria-labelledby="heading-framework" style="margin-bottom: var(--space-12);">
                <div style="margin-bottom: var(--space-6);">
                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">Three-Stage Model</div>
                    <h2 id="heading-framework" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        Proposed Preparation-Discussion Framework
                    </h2>
                    <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                        Before embarking on a mountain journey, travelers and expedition planners should align across three critical preparation phases:
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-4);">
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.72rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">Phase 1</div>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.1rem;">
                            Pre-Trip Medical &amp; Conditioning Alignment
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                            Review cardiovascular fitness, personal medications, and previous high-altitude exposure with a physician. Confirm an itinerary designed with gradual daily ascent increments.
                        </p>
                    </div>

                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.72rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">Phase 2</div>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.1rem;">
                            Daily Trail Monitoring &amp; Pacing Checks
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                            Establish routine morning and evening health check-ins, assess hydration and appetite, and evaluate daily walking pace against group fatigue markers.
                        </p>
                    </div>

                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.72rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">Phase 3</div>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.1rem;">
                            Contingency Buffers &amp; Descent Routing
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                            Ensure the route contains built-in weather rest days and clearly mapped lower-elevation fallback trails in the event of persistent symptoms or sudden snowstorms.
                        </p>
                    </div>
                </div>
            </section>
        @endif

        {{-- 4. Related Guides & FAQs (Preserved) --}}
        <section aria-labelledby="heading-related-safety-content" style="margin-bottom: var(--space-14);">
            <div style="margin-bottom: var(--space-5);">
                <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">Editorial Resources</div>
                <h2 id="heading-related-safety-content" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Related Preparation Guides &amp; FAQs
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0;">
                    Deepen your understanding of altitude preparation and trail logistics with our sample travel guides:
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-4);">
                @if($highAltitudeArticle)
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; display: flex; flex-direction: column;">
                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.7rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">Preparation</div>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                            <a href="{{ route('website.articles.show', $highAltitudeArticle['slug']) }}" style="color: var(--color-text); text-decoration: none;">
                                {{ $highAltitudeArticle['title'] }}
                            </a>
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                            {{ $highAltitudeArticle['summary'] }}
                        </p>
                        <a href="{{ route('website.articles.show', $highAltitudeArticle['slug']) }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto; border-radius: 0 !important;">
                            Read Guide &rarr;
                        </a>
                    </div>
                @endif

                @if($packingArticle)
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; display: flex; flex-direction: column;">
                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.7rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">Gear Checklist</div>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                            <a href="{{ route('website.articles.show', $packingArticle['slug']) }}" style="color: var(--color-text); text-decoration: none;">
                                {{ $packingArticle['title'] }}
                            </a>
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                            {{ $packingArticle['summary'] }}
                        </p>
                        <a href="{{ route('website.articles.show', $packingArticle['slug']) }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto; border-radius: 0 !important;">
                            Read Guide &rarr;
                        </a>
                    </div>
                @endif

                <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.7rem; margin: 0 auto var(--space-2) auto; background: transparent !important; border: none !important; padding: 0 !important;">Knowledge Base</div>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        Frequently Asked Questions
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5;">
                        Find answers about sample pricing, trip customization, and comparison tools.
                    </p>
                    <a href="{{ route('website.faqs') }}" class="website-btn website-btn--primary website-btn--compact" style="margin-top: auto; border-radius: 0 !important;">
                        View FAQ Hub &rarr;
                    </a>
                </div>
            </div>
        </section>

        {{-- 5. Bottom Call-To-Action (CTA) Banner --}}
        @php
            $ctaTitle = $page?->cta_title ?: 'Have Questions About Trail Pacing or Altitude Preparation?';
            $ctaDescription = $page?->cta_description ?: 'Our team can help design an itinerary structured around your fitness and acclimatization comfort. Submit a simulated planning question or build a tailored route proposal.';
            $ctaPrimaryText = $page?->cta_primary_btn_text ?: 'Ask a Planning Question →';
            $ctaPrimaryUrl = $page?->cta_primary_btn_url ?: route('website.contact');
            $ctaSecondaryText = $page?->cta_secondary_btn_text ?: 'Start Custom Journey Planner';
            $ctaSecondaryUrl = $page?->cta_secondary_btn_url ?: route('website.planner.start');
        @endphp
        <section aria-labelledby="heading-safety-cta">
            <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; text-align: center; box-shadow: none !important;">
                <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
                    Planning Inquiries
                </div>
                <h2 id="heading-safety-cta" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                    {{ $ctaTitle }}
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 620px; line-height: 1.6;">
                    {{ $ctaDescription }}
                </p>
                <p class="website-small website-text-muted" style="margin: 0 auto var(--space-6) auto; max-width: 580px; font-style: italic;">
                    Notice: This contact form simulates planning inquiries. It does not connect to live emergency helplines or dispatch rescue services.
                </p>

                <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                    <a href="{{ $ctaPrimaryUrl }}" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                        {{ $ctaPrimaryText }}
                    </a>
                    @if(!empty($ctaSecondaryText) && !empty($ctaSecondaryUrl))
                        <a href="{{ $ctaSecondaryUrl }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                            {{ $ctaSecondaryText }}
                        </a>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
