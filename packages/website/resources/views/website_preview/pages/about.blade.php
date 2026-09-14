@extends('website_preview.layout.master')

@section('title', ($page?->meta_title ?: ($title ?: 'About EATH: Elevated Alpine Trekking & Hospitality')) . ' | EATH Website')
@section('meta_description', $page?->meta_description ?: ($metaDescription ?: 'Proposed brand story, planning philosophy, and architectural design for the EATH Himalayan trekking website platform.'))

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- H1 & Proposed Brand Introduction -->
    <header style="max-width: 820px; margin-bottom: var(--space-8);">
        <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
            Proposed Brand Story
        </div>

        <h1 class="website-h1" style="margin: 0 0 var(--space-3) 0;">
            {{ $page?->title ?: 'About EATH: Elevated Alpine Trekking & Hospitality' }}
        </h1>

        <p class="website-body website-text-secondary" style="font-size: 1.15rem; line-height: 1.6; margin: 0 0 var(--space-4) 0;">
            {{ $page?->summary ?: 'A modern approach to Himalayan journey planning built around transparent pacing, traveler preferences, and honest environmental boundaries.' }}
        </p>

        <!-- Brand Narrative Notice Banner -->
        @php
            $noticeTitle = $page?->notice_title ?: 'Sample Brand Narrative Notice';
            $noticeBody = $page?->notice_body ?: 'This page presents proposed brand positioning and architectural design for the EATH platform. Descriptions of operational methods, guide profiles, and service philosophies represent sample editorial content for testing and evaluation, not verified historical records.';
        @endphp
        @if(!empty($noticeTitle) || !empty($noticeBody))
            <div class="website-card" style="padding: var(--space-3) var(--space-4); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-primary); border-radius: 0 !important; box-shadow: none !important;">
                <span class="website-micro" style="display: block; line-height: 1.5;">
                    @if(!empty($noticeTitle))
                        <strong>{{ $noticeTitle }}:</strong>
                    @endif
                    {{ $noticeBody }}
                </span>
            </div>
        @endif
    </header>

    <!-- Hero Image Banner -->
    @if(!empty($heroImage['url']))
        <div style="max-height: 440px; margin-bottom: var(--space-10); border: 1px solid var(--color-border); background: var(--color-surface); border-radius: 0 !important; overflow: hidden;">
            <img src="{{ $heroImage['url'] }}"
                 alt="{{ $heroImage['alt'] }}"
                 style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 0 !important;"
                 loading="eager" />
        </div>
    @endif

    <!-- Dynamic Sections -->
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
                $secHeadingId = 'heading-about-sec-' . ($section->id ?: $index);
            @endphp

            <section aria-labelledby="{{ $secHeadingId }}" style="margin-bottom: var(--space-12);">
                <div style="margin-bottom: var(--space-4);">
                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                        {{ $tag ?: ($layout === 'cards_grid' ? 'The Workflow' : ($layout === 'checklist' ? 'Guiding Principles' : 'Our Approach')) }}
                    </div>
                    <h2 id="{{ $secHeadingId }}" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        {{ $section->heading }}
                    </h2>
                    @if(!empty($section->body))
                        <div class="website-body website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.7; font-size: 1.05rem;">
                            {!! $section->body !!}
                        </div>
                    @endif
                </div>

                @if($layout === 'cards_grid' && !empty($items))
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
                        @foreach($items as $item)
                            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                                @if(!empty($item['tag']))
                                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.75rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">
                                        {{ $item['tag'] }}
                                    </div>
                                @endif
                                <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0;">
                                    {{ $item['title'] ?? '' }}
                                </h3>
                                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                                    {{ $item['description'] ?? '' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @elseif($layout === 'checklist' && !empty($items))
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
                        @foreach($items as $item)
                            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
                                <strong class="website-body" style="color: var(--color-primary); display: block; margin-bottom: var(--space-2);">
                                    ✓ {{ $item['title'] ?? '' }}
                                </strong>
                                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.6;">
                                    {{ $item['description'] ?? '' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    @else
        <!-- Fallback Default Narrative -->
        <section aria-labelledby="heading-story" style="max-width: 800px; margin-bottom: var(--space-12);">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">Our Approach</div>
            <h2 id="heading-story" class="website-h2" style="margin: 0 0 var(--space-4) 0;">
                Rethinking the Himalayan Trekking Experience
            </h2>

            <div style="color: var(--color-text-secondary); line-height: 1.75; font-size: 1.0625rem;">
                <p style="margin-bottom: var(--space-4);">
                    Himalayan trekking has historically been presented through rigid package formulas, crowded high-volume corridors, and marketing superlatives that obscure the genuine physical and logistical realities of mountain travel.
                </p>
                <p style="margin-bottom: var(--space-4);">
                    EATH is conceived to shift the focus back to where it belongs: thoughtful itinerary pacing, transparent trade-offs, and traveler self-determination. Rather than pressuring visitors with artificial scarcity or rushed departures, our digital platform organizes routes according to real-world considerations—acclimatization safety, seasonal suitability, and personal travel rhythm.
                </p>
                <p style="margin: 0;">
                    Whether you seek the quiet tranquility of lateral valley trails, photographic dawn pacing, or authentic interactions with high-mountain communities, the platform provides clear, grounded criteria to help you design an intentional journey.
                </p>
            </div>
        </section>
    @endif

    <!-- Field Leadership Guide Profiles -->
    @if(!empty($guides))
        <section aria-labelledby="heading-team-preview" style="margin-bottom: var(--space-12);">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-2);">
                <div>
                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">Field Leadership</div>
                    <h2 id="heading-team-preview" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                        Sample Guide &amp; Planner Profiles
                    </h2>
                    <p class="website-small website-text-secondary" style="margin: 0;">
                        Illustrative guide records designed to model team representation in the website.
                    </p>
                </div>

                <a href="{{ route('website.guides.index') }}" class="website-btn website-btn--outline" style="font-size: 0.875rem; border-radius: 0 !important;">
                    View All Field Guides &rarr;
                </a>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-5);">
                @foreach($guides as $guide)
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important; display: flex; flex-direction: column;">
                        <div style="width: 100%; aspect-ratio: 1 / 1; border-radius: 0 !important; overflow: hidden; margin-bottom: var(--space-3); background: var(--color-background-warm);">
                            <img src="{{ $guide['image']['url'] }}"
                                 alt="{{ $guide['image']['alt'] }}"
                                 style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 0 !important;"
                                 loading="lazy" />
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-1);">
                            <h3 class="website-h4" style="margin: 0;">{{ $guide['name'] }}</h3>
                        </div>

                        <span class="website-micro text-primary" style="font-weight: 600; margin-bottom: var(--space-2); display: block;">
                            {{ $guide['role'] }}
                        </span>

                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                            {{ $guide['biography'] }}
                        </p>

                        <div style="padding-top: var(--space-2); border-top: 1px solid var(--color-border-light);">
                            <span class="website-micro website-text-muted" style="display: block; font-style: italic;">
                                {{ $guide['disclosure'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Responsible-Travel Overview Link -->
    <section aria-labelledby="heading-responsible-link" style="margin-bottom: var(--space-12);">
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: 0 !important; box-shadow: none !important;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: var(--space-4);">
                <div style="max-width: 720px;">
                    <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-1); background: transparent !important; border: none !important; padding: 0 !important;">Trail Ethics</div>
                    <h2 id="heading-responsible-link" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        Our Responsible Travel Framework
                    </h2>
                    <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                        High-altitude ecosystems and indigenous communities are fragile. Learn how our proposed operational model addresses fair porter compensation, leave-no-trace waste disposal, and cultural respect along mountain trails.
                    </p>
                </div>

                <a href="{{ route('website.responsible') }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                    Read Responsible Travel Policy &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- Bottom Contact / Plan CTA -->
    @php
        $ctaTitle = $page?->cta_title ?: 'Design Your Tailored Himalayan Journey';
        $ctaDescription = $page?->cta_description ?: 'Step away from rigid tour packages. Use our interactive planner to find routes matched to your experience, duration, and personal mountain rhythm.';
        $ctaPrimaryText = $page?->cta_primary_btn_text ?: 'Launch Journey Planner →';
        $ctaPrimaryUrl = $page?->cta_primary_btn_url ?: route('website.planner.start') . '?mode=discover&source=about';
        $ctaSecondaryText = $page?->cta_secondary_btn_text ?: 'Explore Trek Catalog';
        $ctaSecondaryUrl = $page?->cta_secondary_btn_url ?: route('website.treks.index');
    @endphp
    <section aria-labelledby="heading-about-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important; text-align: center; box-shadow: none !important;">
            <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
                Start Exploring
            </div>
            <h2 id="heading-about-cta" class="website-h2" style="margin-bottom: var(--space-2);">
                {{ $ctaTitle }}
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 640px; margin: 0 auto var(--space-5) auto; line-height: 1.6;">
                {{ $ctaDescription }}
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
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
@endsection
