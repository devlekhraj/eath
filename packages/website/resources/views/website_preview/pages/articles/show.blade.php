@extends('website_preview.layout.master')

@section('title', $article['title'] . ' · Himalayan Trekking Guide · EATH Website')
@section('meta_description', Str::limit($article['summary'], 155))

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- Header & Attribution -->
    <header style="max-width: 820px; margin-bottom: var(--space-8);">
        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-3); flex-wrap: wrap;">
            <a href="{{ route('website.articles.index', ['category' => $article['category']]) }}"
               class="website-badge website-badge--primary"
               style="text-decoration: none;">
                {{ $categoryLabel }}
            </a>
            <span class="website-badge website-badge--neutral">Educational Guide</span>
        </div>

        <h1 class="website-h1" style="margin: 0 0 var(--space-4) 0;">
            {{ $article['title'] }}
        </h1>

        <p class="website-body website-text-secondary" style="font-size: 1.15rem; line-height: 1.6; margin: 0 0 var(--space-4) 0;">
            {{ $article['summary'] }}
        </p>

        <div style="display: flex; align-items: center; gap: var(--space-3); padding-top: var(--space-3); border-top: 1px solid var(--color-border); flex-wrap: wrap;">
            <span class="website-small" style="font-weight: 600; color: var(--color-primary-dark);">
                EATH Website Editorial
            </span>
            <span class="website-micro website-text-muted">•</span>
            <span class="website-micro website-text-muted">
                {{ $article['author_label'] ?? 'Editorial Team' }}
            </span>
            <span class="website-micro website-text-muted">•</span>
            <span class="website-micro website-text-muted">
                Sample Date: {{ $article['updated_date'] ?? '2026-02-01' }}
            </span>
        </div>
    </header>

    <!-- 3. Hero Image -->
    @if(!empty($article['image']['url']))
        <div style="border-radius: 0 !important; overflow: hidden; max-height: 420px; margin-bottom: var(--space-8); border: 1px solid var(--color-border); background: var(--color-surface);">
            <img src="{{ $article['image']['url'] }}"
                 alt="{{ $article['image']['alt'] }}"
                 style="width: 100%; height: 100%; object-fit: cover; display: block;"
                 loading="eager" />
        </div>
    @endif

    <!-- Layout: Reading Column + Sticky TOC Rail on Desktop -->
    <div style="display: grid; grid-template-columns: 1fr; gap: var(--space-8); align-items: start; @media(min-width: 1024px) { grid-template-columns: 1fr 280px; }">
        
        <!-- Main Reading Column (Max 800px for optimal 65-75 character reading measure) -->
        <main style="max-width: 800px;">

            <!-- 4. Mobile Native Details Disclosure for TOC -->
            @if(!empty($article['sections']) && count($article['sections']) > 1)
                <div style="margin-bottom: var(--space-6); @media(min-width: 1024px) { display: none; }">
                    <details class="website-card" style="padding: var(--space-4); background: var(--color-background-warm); border: 1px solid var(--color-border);">
                        <summary class="website-small" style="font-weight: 700; cursor: pointer; color: var(--color-primary-dark);">
                            Table of Contents ({{ count($article['sections']) }} Sections)
                        </summary>
                        <nav aria-label="Table of Contents" style="margin-top: var(--space-3); padding-top: var(--space-2); border-top: 1px solid var(--color-border-light);">
                            <ol style="margin: 0; padding-left: var(--space-4); line-height: 1.8;">
                                @foreach($article['sections'] as $idx => $sec)
                                    <li>
                                        <a href="#section-{{ $idx + 1 }}" class="website-small text-primary" style="text-decoration: underline;">
                                            {{ $sec['heading'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </nav>
                    </details>
                </div>
            @endif

            <!-- 5. Editorial Disclaimer Notice -->
            <div class="website-notice website-notice--info" style="margin-bottom: var(--space-6); padding: var(--space-3) var(--space-4);">
                <span class="website-micro" style="display: block; line-height: 1.5;">
                    <strong>Educational Sample Guide:</strong> This article is part of the EATH website knowledge base. Information illustrates general Himalayan trekking practices and does not replace certified professional advice or real-time trail briefings.
                </span>
            </div>

            <!-- 6. Article Body with Proper H2/H3 Order -->
            <article class="website-prose" style="font-size: 1.0625rem; line-height: 1.7; color: var(--color-text);">
                @foreach($article['sections'] as $idx => $section)
                    <section id="section-{{ $idx + 1 }}" style="margin-bottom: var(--space-8); scroll-margin-top: 100px;">
                        <h2 class="website-h2" style="font-size: 1.4rem; margin: 0 0 var(--space-3) 0; color: var(--color-primary-dark); padding-bottom: var(--space-2); border-bottom: 1px solid var(--color-border-light);">
                            {{ $section['heading'] }}
                        </h2>
                        <div style="color: var(--color-text-secondary); line-height: 1.75;">
                            <p style="margin: 0 0 var(--space-4) 0;">
                                {{ $section['body'] }}
                            </p>
                        </div>
                    </section>
                @endforeach
            </article>

            <!-- 7. Reference / Citation Notes -->
            <div style="padding: var(--space-4); background: var(--color-background-warm); border-left: 3px solid var(--color-primary); border-radius: 0 !important; margin-top: var(--space-8); margin-bottom: var(--space-10);">
                <strong class="website-micro" style="text-transform: uppercase; color: var(--color-primary-dark); display: block; margin-bottom: var(--space-1);">
                    Reference &amp; Editorial Standards
                </strong>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                    Guidelines compiled by EATH editorial contributors based on standard Himalayan teahouse logistics. For personalized itinerary pacing, consult licensed Nepal guides and medical authorities prior to high-altitude travel.
                </p>
            </div>

            <!-- 8. Relevant Sample Treks -->
            @if(count($relevantTreks) > 0)
                <section aria-labelledby="heading-related-treks" style="margin-top: var(--space-10); margin-bottom: var(--space-10);">
                    <div style="margin-bottom: var(--space-4);">
                        <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Itineraries Mentioned</span>
                        <h2 id="heading-related-treks" class="website-h3" style="margin: 0;">
                            Related Sample Treks
                        </h2>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-5);">
                        @foreach($relevantTreks as $trek)
                            @include('website_preview.components.trek-card', ['trek' => $trek])
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- 9. Related Articles -->
            @if(count($relatedArticles) > 0)
                <section aria-labelledby="heading-related-articles" style="margin-top: var(--space-10); margin-bottom: var(--space-10);">
                    <div style="margin-bottom: var(--space-4);">
                        <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Further Reading</span>
                        <h2 id="heading-related-articles" class="website-h3" style="margin: 0;">
                            Related Planning Guides
                        </h2>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
                        @foreach($relatedArticles as $rel)
                            <div class="website-card" style="padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); display: flex; flex-direction: column;">
                                <span class="website-micro website-badge website-badge--neutral" style="align-self: flex-start; margin-bottom: var(--space-2);">
                                    {{ ucfirst($rel['category']) }}
                                </span>
                                <h3 class="website-h4" style="font-size: 1rem; margin: 0 0 var(--space-2) 0;">
                                    <a href="{{ route('website.articles.show', ['slug' => $rel['slug']]) }}" style="color: var(--color-text); text-decoration: none;">
                                        {{ $rel['title'] }}
                                    </a>
                                </h3>
                                <p class="website-micro website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                                    {{ Str::limit($rel['summary'], 95) }}
                                </p>
                                <a href="{{ route('website.articles.show', ['slug' => $rel['slug']]) }}" class="website-micro text-primary" style="font-weight: 600; text-decoration: underline;">
                                    Read Guide &rarr;
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- 10. Contextual Planning CTA -->
            <section aria-labelledby="heading-article-cta" class="website-final-cta" style="margin-top: var(--space-10); border-radius: 0 !important;">
                <div class="website-final-cta__inner">
                    <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-3); display: inline-block;">
                        {{ !empty($article['cta_eyebrow']) ? $article['cta_eyebrow'] : 'EXPEDITION PLANNING' }}
                    </span>
                    <h2 id="heading-article-cta" class="website-final-cta__title" style="font-size: var(--type-h2);">
                        {{ !empty($article['cta_title']) ? $article['cta_title'] : 'Ready to Apply These Insights?' }}
                    </h2>
                    <p class="website-final-cta__subtitle">
                        {{ !empty($article['cta_description']) ? $article['cta_description'] : 'Step through our guided trek builder to discover itineraries matching your preferred timing, comfort, and group size.' }}
                    </p>

                    <div class="website-final-cta__actions">
                        <a href="{{ !empty($article['cta_primary_btn_url']) ? $article['cta_primary_btn_url'] : (route('website.planner.start') . '?mode=discover&source=article') }}"
                           class="website-btn website-btn--accent"
                           style="border-radius: 0 !important;">
                            {{ !empty($article['cta_primary_btn_text']) ? $article['cta_primary_btn_text'] : 'Start Journey Planner' }}
                        </a>
                        <a href="{{ !empty($article['cta_secondary_btn_url']) ? $article['cta_secondary_btn_url'] : route('website.articles.index') }}"
                           class="website-btn website-btn--outline"
                           style="color: #ffffff; border-color: rgba(255, 255, 255, 0.6); border-radius: 0 !important;">
                            {{ !empty($article['cta_secondary_btn_text']) ? $article['cta_secondary_btn_text'] : 'All Travel Guides' }}
                        </a>
                    </div>
                </div>
            </section>
        </main>

        <!-- Desktop Sidebar / Sticky TOC Rail -->
        @if(!empty($article['sections']) && count($article['sections']) > 1)
            <aside aria-label="Article Table of Contents" style="position: sticky; top: 100px; display: none; @media(min-width: 1024px) { display: block; }">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border);">
                    <h3 class="website-micro" style="font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--color-primary-dark); margin: 0 0 var(--space-3) 0;">
                        In This Guide
                    </h3>
                    <nav aria-label="Table of contents">
                        <ol style="margin: 0; padding-left: var(--space-4); line-height: 1.8;">
                            @foreach($article['sections'] as $idx => $sec)
                                <li style="margin-bottom: var(--space-2);">
                                    <a href="#section-{{ $idx + 1 }}" class="website-small text-primary" style="text-decoration: underline; line-height: 1.4; display: block;">
                                        {{ $sec['heading'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </nav>

                    <div style="margin-top: var(--space-5); padding-top: var(--space-4); border-top: 1px solid var(--color-border-light);">
                        <a href="{{ route('website.articles.index') }}" class="website-micro text-primary" style="text-decoration: underline;">
                            &larr; Back to Travel Guide
                        </a>
                    </div>
                </div>
            </aside>
        @endif

    </div>

</div>
@endsection
