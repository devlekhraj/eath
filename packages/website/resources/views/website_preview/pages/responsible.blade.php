@extends('website_preview.layout.master')

@section('title', ($page?->meta_title ?: ($page?->title ?: 'Responsible Mountain Travel & Porter Welfare')) . ' | EATH Trekking Website')
@section('meta_description', $page?->meta_description ?: ($page?->summary ?: 'Explore our proposed framework for ethical porter welfare, local community benefit, trail waste reduction, and sacred Himalayan etiquette.'))

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    <div style="max-width: 860px; margin: 0 auto;">
        {{-- 1. Hero Banner --}}
        <img
            src="{{ $heroImage['url'] }}"
            alt="{{ $heroImage['alt'] }}"
            width="{{ $heroImage['width'] }}"
            height="{{ $heroImage['height'] }}"
            loading="eager"
            decoding="async"
            style="width: 100%; height: auto; aspect-ratio: 16/9; object-fit: cover; margin-bottom: var(--space-8); border-radius: 0 !important;"
        >

        {{-- 2. H1 & Operational / Ethical Notice --}}
        <header style="margin-bottom: var(--space-10);">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
                Ethical Operations
            </div>
            <h1 class="website-h1" style="margin: 0 0 var(--space-4) 0;">
                {{ $page?->title ?: 'Responsible Mountain Travel & Porter Welfare' }}
            </h1>
            <p class="website-lead website-text-secondary" style="margin: 0 0 var(--space-5) 0; line-height: 1.6;">
                {{ $page?->summary ?: 'The Himalayas are home to ancient living cultures, sensitive high-altitude ecosystems, and hardworking mountain communities. Explore our proposed operational code for ethical field leadership and environmental stewardship.' }}
            </p>

            {{-- Operational Notice Banner --}}
            @php
                $noticeTitle = $page?->notice_title ?: 'Proposed Practices Notice — Not Verified Factual Achievements';
                $noticeBody = $page?->notice_body ?: 'This editorial document outlines proposed environmental standards, porter protection policies, and cultural etiquette guidelines for the EATH platform prototype. It does not represent audited historical achievements, third-party eco-certifications, carbon offset claims, or verified conservation partnership data. In live commercial operations, sustainability policies require external verification and rigorous field compliance audits.';
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
                    $layout = $section->layout_key ?: 'standard';
                    $secHeadingId = 'heading-sec-' . ($section->id ?: $index);
                @endphp

                <section aria-labelledby="{{ $secHeadingId }}" style="margin-bottom: var(--space-12);">
                    <div style="margin-bottom: var(--space-4);">
                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                            {{ $section->layout_key === 'cards_grid' ? 'Operational Standards' : ($section->layout_key === 'qa_grid' ? 'Traveler Inquiries' : ($section->layout_key === 'disclosure' ? 'Transparency Standard' : 'Field Guideline')) }}
                        </div>
                        <h2 id="{{ $secHeadingId }}" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                            {{ $section->heading }}
                        </h2>
                        @if(!empty($section->body))
                            <div class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                                {!! $section->body !!}
                            </div>
                        @endif
                    </div>

                    {{-- Render layout specific presentation --}}
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
                                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.72rem; margin-bottom: var(--space-1);">
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
                                    <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border-light); border-radius: 0 !important;">
                                        <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                                            {{ $item['title'] ?? 'Prototype Standard' }}:
                                        </strong>
                                        <p class="website-micro website-text-muted" style="margin: 0; font-style: italic; line-height: 1.5;">
                                            {{ $item['description'] ?? '' }}
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @elseif(!empty($items))
                        <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                            @foreach($items as $item)
                                <div style="margin-bottom: var(--space-3);">
                                    <strong class="website-body" style="color: var(--color-text);">{{ $item['title'] ?? '' }}</strong>
                                    <p class="website-body website-text-secondary" style="margin: 4px 0 0 0; line-height: 1.55;">
                                        {{ $item['description'] ?? '' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </section>
            @endforeach
        @else
            {{-- Fallback: If no database sections are defined yet, render standard content to guarantee Zero Breakage --}}
            <section aria-labelledby="heading-local-communities" style="margin-bottom: var(--space-12);">
                <div style="margin-bottom: var(--space-4);">
                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1);">Economic Equity</div>
                    <h2 id="heading-local-communities" class="website-h3" style="margin: 0 0 var(--space-2) 0;">Supporting Himalayan Valley Communities</h2>
                    <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                        Tourism should directly sustain the families and villages that maintain trail ways, bridges, and teahouses across remote valleys. Our proposed approach prioritizes distributed local benefit:
                    </p>
                </div>
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                    <ul style="margin: 0; padding-left: var(--space-5); line-height: 1.7;" class="website-body website-text-secondary">
                        <li style="margin-bottom: var(--space-2);"><strong>Distributed Teahouse Patronage:</strong> Spreading overnight stays and meal orders across independently owned lodges.</li>
                        <li style="margin-bottom: var(--space-2);"><strong>Locally Sourced Food Production:</strong> Prioritizing indigenous grains and valley vegetables to channel expenditures to agricultural households.</li>
                        <li><strong>Infrastructure Respect:</strong> Supporting community-maintained suspension bridges and trail infrastructure through village fees.</li>
                    </ul>
                </div>
            </section>
        @endif

        {{-- 4. Related Articles & Pages --}}
        <section aria-labelledby="heading-related-content" style="margin-bottom: var(--space-14);">
            <div style="margin-bottom: var(--space-5);">
                <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                    Explore More
                </div>
                <h2 id="heading-related-content" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Related Travel Guides &amp; Company Resources
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0;">
                    Learn more about our operational philosophy and route planning principles:
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: var(--space-4);">
                @if($cultureArticle)
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; display: flex; flex-direction: column;">
                        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.72rem; margin-bottom: var(--space-2);">
                            Culture
                        </div>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                            <a href="{{ route('website.articles.show', $cultureArticle['slug']) }}" style="color: var(--color-text); text-decoration: none;">
                                {{ $cultureArticle['title'] }}
                            </a>
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                            {{ $cultureArticle['summary'] }}
                        </p>
                        <a href="{{ route('website.articles.show', $cultureArticle['slug']) }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto; border-radius: 0 !important;">
                            Read Guide &rarr;
                        </a>
                    </div>
                @endif

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; display: flex; flex-direction: column;">
                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.72rem; margin-bottom: var(--space-2);">
                        Leadership
                    </div>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        <a href="{{ route('website.guides.index') }}" style="color: var(--color-text); text-decoration: none;">
                            Meet Our Mountain Guides
                        </a>
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                        Explore sample guide profiles modeling route leadership, pacing philosophy, and respectful communication.
                    </p>
                    <a href="{{ route('website.guides.index') }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto; border-radius: 0 !important;">
                        View Guides &rarr;
                    </a>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; display: flex; flex-direction: column;">
                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.72rem; margin-bottom: var(--space-2);">
                        Field Protocol
                    </div>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        <a href="{{ route('website.safety') }}" style="color: var(--color-text); text-decoration: none;">
                            Safety &amp; Acclimatization
                        </a>
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                        Review our proposed three-stage safety framework and health monitoring routines for high-altitude passes.
                    </p>
                    <a href="{{ route('website.safety') }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto; border-radius: 0 !important;">
                        View Safety Framework &rarr;
                    </a>
                </div>
            </div>
        </section>

        {{-- 5. Bottom Call-To-Action (CTA) --}}
        @php
            $ctaTitle = $page?->cta_title ?: 'Ready to Plan a Mindful Himalayan Trek?';
            $ctaDesc = $page?->cta_description ?: 'Explore our interactive journey planner to craft an itinerary built on sensible pacing, local valley stays, and respectful trail exploration.';
            $ctaPrimaryText = $page?->cta_primary_btn_text ?: 'Start Custom Journey Planner →';
            $ctaPrimaryUrl = $page?->cta_primary_btn_url ?: route('website.planner.start');
            $ctaSecondaryText = $page?->cta_secondary_btn_text ?: 'Ask a Planning Question';
            $ctaSecondaryUrl = $page?->cta_secondary_btn_url ?: route('website.contact');
        @endphp

        <section aria-labelledby="heading-responsible-cta">
            <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; text-align: center; box-shadow: none !important;">
                <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
                    Mindful Travel
                </div>
                <h2 id="heading-responsible-cta" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                    {{ $ctaTitle }}
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 620px; line-height: 1.6;">
                    {{ $ctaDesc }}
                </p>

                <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                    @if(!empty($ctaPrimaryText) && !empty($ctaPrimaryUrl))
                        <a href="{{ $ctaPrimaryUrl }}" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                            {{ $ctaPrimaryText }}
                        </a>
                    @endif
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
