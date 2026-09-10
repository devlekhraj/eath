@extends('website_preview.layout.master')

@section('title', 'About EATH · Proposed Brand Story & Philosophy · EATH Website')
@section('meta_description', 'Proposed brand story, planning philosophy, and architectural design for the EATH Himalayan trekking website platform.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- H1 & Proposed Brand Introduction -->
    <header style="max-width: 820px; margin-bottom: var(--space-8);">
        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-3); flex-wrap: wrap;">
            <span class="website-badge website-badge--primary">Proposed Brand Story</span>
            <span class="website-badge website-badge--neutral">Architecture Website</span>
        </div>

        <h1 class="website-h1" style="margin: 0 0 var(--space-3) 0;">
            About EATH: Elevated Alpine Trekking &amp; Hospitality
        </h1>

        <p class="website-body website-text-secondary" style="font-size: 1.15rem; line-height: 1.6; margin: 0 0 var(--space-4) 0;">
            A modern approach to Himalayan journey planning built around transparent pacing, traveler preferences, and honest environmental boundaries.
        </p>

        <!-- Explicit Brand Narrative Disclaimer -->
        <div class="website-notice website-notice--info" style="margin: 0; padding: var(--space-3) var(--space-4);">
            <span class="website-micro" style="display: block; line-height: 1.5;">
                <strong>Sample Brand Narrative:</strong> This page presents proposed brand positioning and architectural design for the EATH platform. Descriptions of operational methods, guide profiles, and service philosophies represent sample editorial content for testing and evaluation, not verified historical records.
            </span>
        </div>
    </header>

    <!-- Hero Image Banner -->
    @if($heroImage)
        <div style="border-radius: var(--radius-lg); overflow: hidden; max-height: 400px; margin-bottom: var(--space-10); border: 1px solid var(--color-border); background: var(--color-surface);">
            <img src="{{ $heroImage['url'] }}"
                 alt="{{ $heroImage['alt'] }}"
                 style="width: 100%; height: 100%; object-fit: cover; display: block;"
                 loading="eager" />
        </div>
    @endif

    <!-- 3. Sample Company-Story Narrative -->
    <section aria-labelledby="heading-story" style="max-width: 800px; margin-bottom: var(--space-12);">
        <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-2);">Our Approach</span>
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

    <!-- 4. How This Planning Experience Works -->
    <section aria-labelledby="heading-process" style="margin-bottom: var(--space-12);">
        <div style="margin-bottom: var(--space-5);">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-1);">The Workflow</span>
            <h2 id="heading-process" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                How Our Planning Platform Operates
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0; max-width: 740px;">
                A three-step guided progression designed to replace high-pressure sales with transparent exploration.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border);">
                <div style="font-size: 1.75rem; margin-bottom: var(--space-2); color: var(--color-primary);">01</div>
                <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0;">Explore by Season &amp; Region</h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                    Filter itineraries using historical climatic windows and regional terrain characters rather than generalized promises.
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border);">
                <div style="font-size: 1.75rem; margin-bottom: var(--space-2); color: var(--color-primary);">02</div>
                <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0;">Guided Criteria Matching</h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                    Define your available days, party composition, physical comfort zone, and preferred pacing to evaluate deterministic route recommendations.
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border);">
                <div style="font-size: 1.75rem; margin-bottom: var(--space-2); color: var(--color-primary);">03</div>
                <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0;">Transparent Review &amp; Synthesis</h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                    Review itemized illustrative estimates and route trade-offs before generating a non-PII plan receipt—with zero forced deposits.
                </p>
            </div>
        </div>
    </section>

    <!-- 5. Three Proposed Differentiators -->
    <section aria-labelledby="heading-differentiators" style="margin-bottom: var(--space-12);">
        <div style="margin-bottom: var(--space-5);">
            <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Guiding Principles</span>
            <h2 id="heading-differentiators" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                Three Core Differentiators
            </h2>
            <p class="website-small website-text-secondary" style="margin: 0; max-width: 740px;">
                Foundational standards embedded in the design of every catalog itinerary and consultation.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border);">
                <strong class="website-body" style="color: var(--color-primary-dark); display: block; margin-bottom: var(--space-2);">
                    ✓ Pacing-First Route Architecture
                </strong>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Every itinerary prioritizes gradual ascent profiles and built-in acclimatization rest stops over rushed, physically punitive schedules.
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border);">
                <strong class="website-body" style="color: var(--color-primary-dark); display: block; margin-bottom: var(--space-2);">
                    ✓ Preference-Driven Discovery
                </strong>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.6;">
                    We treat travel desires—quiet forest paths, photography patience, cultural curiosity—as primary signals rather than afterthoughts.
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border);">
                <strong class="website-body" style="color: var(--color-primary-dark); display: block; margin-bottom: var(--space-2);">
                    ✓ Honest, Grounded Information
                </strong>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.6;">
                    We state seasonal limitations and trail conditions candidly. If a pass is snowbound in winter, we say so plainly without false assurances.
                </p>
            </div>
        </div>
    </section>

    <!-- 6. Fictional Website Team Preview -->
    <section aria-labelledby="heading-team-preview" style="margin-bottom: var(--space-12);">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-5); flex-wrap: wrap; gap: var(--space-2);">
            <div>
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Field Leadership</span>
                <h2 id="heading-team-preview" class="website-h3" style="margin: 0 0 var(--space-1) 0;">
                    Sample Guide &amp; Planner Profiles
                </h2>
                <p class="website-small website-text-secondary" style="margin: 0;">
                    Illustrative guide records designed to model team representation in the website.
                </p>
            </div>

            <a href="{{ route('website.guides.index') }}" class="website-btn website-btn--outline" style="font-size: 0.875rem;">
                View All Field Guides &rarr;
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-5);">
            @foreach($guides as $guide)
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); display: flex; flex-direction: column;">
                    <div style="width: 100%; aspect-ratio: 1 / 1; border-radius: var(--radius-md); overflow: hidden; margin-bottom: var(--space-3); background: var(--color-background-warm);">
                        <img src="{{ $guide['image']['url'] }}"
                             alt="{{ $guide['image']['alt'] }}"
                             style="width: 100%; height: 100%; object-fit: cover; display: block;"
                             loading="lazy" />
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-1);">
                        <h3 class="website-h4" style="margin: 0;">{{ $guide['name'] }}</h3>
                        <span class="website-badge website-badge--neutral" style="font-size: 0.72rem;">Sample</span>
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

    <!-- 7. Responsible-Travel Overview Link -->
    <section aria-labelledby="heading-responsible-link" style="margin-bottom: var(--space-12);">
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: var(--space-4);">
                <div style="max-width: 720px;">
                    <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Trail Ethics</span>
                    <h2 id="heading-responsible-link" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        Our Responsible Travel Framework
                    </h2>
                    <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                        High-altitude ecosystems and indigenous communities are fragile. Learn how our proposed operational model addresses fair porter compensation, leave-no-trace waste disposal, and cultural respect along mountain trails.
                    </p>
                </div>

                <a href="{{ route('website.responsible') }}" class="website-btn website-btn--outline">
                    Read Responsible Travel Policy &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- 8. Credentials Section with Honest Note -->
    <section aria-labelledby="heading-credentials" style="margin-bottom: var(--space-12); max-width: 820px;">
        <h2 id="heading-credentials" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
            Regulatory &amp; Credential Information
        </h2>

        <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border);">
            <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                Website Status: Not Supplied for this Prototype
            </strong>
            <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                Official commercial registration numbers, Department of Tourism licenses, and trade association memberships (such as TAAN and Nepal Tourism Board affiliations) are deliberately omitted from this interactive preview. Verified legal registrations, insurance certificates, and tax credentials will be provided upon full commercial launch.
            </p>
        </div>
    </section>

    <!-- 9. Contact / Plan CTA -->
    <section aria-labelledby="heading-about-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-primary-subtle); border: 2px solid var(--color-primary-light); text-align: center;">
            <span class="website-badge website-badge--primary" style="margin-bottom: var(--space-2); text-transform: uppercase;">
                Start Exploring
            </span>
            <h2 id="heading-about-cta" class="website-h2" style="margin-bottom: var(--space-2); color: var(--color-primary-dark);">
                Begin Your Himalayan Trek Design
            </h2>
            <p class="website-body website-text-secondary" style="max-width: 640px; margin: 0 auto var(--space-5) auto; line-height: 1.6;">
                Ready to see how our planning engine matches your travel criteria? Explore catalog routes or build a tailored itinerary today.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-4); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}?mode=discover&source=about" class="website-btn website-btn--primary">
                    Launch Trek Planner &rarr;
                </a>
                <a href="{{ route('website.contact') }}" class="website-btn website-btn--outline">
                    Send General Inquiry
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
