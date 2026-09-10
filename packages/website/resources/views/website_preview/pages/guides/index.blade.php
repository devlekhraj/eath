@extends('website_preview.layout.master')

@section('title', 'Meet Our Mountain Guides | EATH Trekking Website')
@section('meta_description', 'Explore sample mountain guide and trek leader profiles illustrating Himalayan route leadership and expedition pacing for EATH.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    {{-- 2. H1 & Fictional Profile Notice --}}
    <div style="margin-bottom: var(--space-10);">
        <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Field Leadership</span>
        <h1 class="website-h1" style="margin: 0 0 var(--space-4) 0;">
            Meet Our Mountain Guides
        </h1>
        <p class="website-lead website-text-secondary" style="margin: 0 0 var(--space-5) 0; max-width: 820px;">
            A safe, culturally immersive Himalayan journey relies on experienced trail leadership, thoughtful pacing, and mutual respect. Explore how guide profiles and route specializations are represented in our platform.
        </p>

        {{-- Visible Fictional-Profile Notice Banner --}}
        <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md);">
            <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                <span style="font-size: 1.25rem; line-height: 1;" aria-hidden="true">ℹ️</span>
                <div>
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                        Fictional Website Profiles Notice
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        All guide profiles, names, biographies, and trail associations shown on this page are sample preview entries designed to illustrate team presentation and informational hierarchy. They do not represent real individuals, verified credentials, licensed affiliations, or real-time staff availability.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. Three Sample Profile Cards --}}
    <section aria-labelledby="heading-guides-list" style="margin-bottom: var(--space-14);">
        <h2 id="heading-guides-list" class="website-h3" style="margin: 0 0 var(--space-6) 0;">
            Sample Field Leaders &amp; Planners
        </h2>

        @if(!empty($guides) && count($guides) > 0)
            <div class="website-guides-grid">
                @foreach($guides as $guide)
                    <article class="website-guide-card">
                        <div class="website-guide-card__media">
                            <img src="{{ $guide['image']['url'] }}"
                                 alt="{{ $guide['image']['alt'] }}"
                                 width="400"
                                 height="400"
                                 loading="lazy" />
                        </div>

                        <div class="website-guide-card__body">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: var(--space-2); margin-bottom: var(--space-1);">
                                <h3 class="website-h3" style="margin: 0; font-size: 1.25rem;">
                                    <a href="{{ route('website.guides.show', $guide['slug']) }}" style="color: var(--color-text); text-decoration: none;">
                                        {{ $guide['name'] }}
                                    </a>
                                </h3>
                                <span class="website-badge website-badge--neutral" style="font-size: 0.72rem; flex-shrink: 0;">
                                    Fictional
                                </span>
                            </div>

                            <span class="website-micro text-primary" style="font-weight: 600; display: block; margin-bottom: var(--space-3);">
                                {{ $guide['role'] }}
                            </span>

                            <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6; flex-grow: 1;">
                                {{ $guide['biography'] }}
                            </p>

                            {{-- Honest Credentials State --}}
                            <div style="padding: var(--space-2) var(--space-3); background: var(--color-background-warm); border: 1px solid var(--color-border-light); border-radius: var(--radius-sm); margin-bottom: var(--space-3);">
                                <span class="website-micro website-text-muted" style="display: block;">
                                    Qualifications &amp; Languages: <em>Not supplied in this prototype (no fabricated credentials)</em>
                                </span>
                            </div>

                            {{-- Associated Sample Treks --}}
                            @if(!empty($guide['treks']) && count($guide['treks']) > 0)
                                <div style="margin-bottom: var(--space-4);">
                                    <span class="website-micro website-text-secondary" style="font-weight: 600; display: block; margin-bottom: var(--space-1);">
                                        Associated Sample Routes:
                                    </span>
                                    <div style="display: flex; flex-wrap: wrap; gap: var(--space-1);">
                                        @foreach($guide['treks'] as $trek)
                                            <a href="{{ route('website.treks.show', $trek['slug']) }}"
                                               class="website-badge website-badge--neutral"
                                               style="text-decoration: none; font-size: 0.75rem;">
                                                {{ $trek['name'] ?? $trek['title'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            {{-- Card-Level Fictional Disclosure --}}
                            <div class="website-guide-card__disclosure">
                                {{ $guide['disclosure'] }}
                            </div>

                            <a href="{{ route('website.guides.show', $guide['slug']) }}"
                               class="website-btn website-btn--primary"
                               style="margin-top: var(--space-4); width: 100%; text-align: center; justify-content: center;">
                                View Profile &rarr;
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="website-card" style="padding: var(--space-8); text-align: center; background: var(--color-background-warm); border: 1px solid var(--color-border);">
                <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0;">
                    No guide records currently available in this preview catalog.
                </p>
                <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--primary">
                    Browse All Treks
                </a>
            </div>
        @endif
    </section>

    {{-- 4. Questions to Discuss With a Guide --}}
    <section aria-labelledby="heading-guide-questions" style="margin-bottom: var(--space-14);">
        <div style="margin-bottom: var(--space-6);">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Preparation &amp; Communication</span>
            <h2 id="heading-guide-questions" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                Thoughtful Questions to Discuss With Your Guide
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0; max-width: 760px;">
                Open dialogue between travelers and mountain guides sets clear expectations, protects safety margins, and enriches the trekking experience. Here are four practical discussions to initiate before hitting the trail:
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.72rem;">1. Elevation &amp; Pace</span>
                <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                    Daily Ascent &amp; Acclimatization
                </h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                    &ldquo;How do you adapt the daily pace if someone experiences headache or fatigue? What are our scheduled rest pauses before reaching 4,000 meters?&rdquo;
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.72rem;">2. Trail Safety &amp; Weather</span>
                <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                    Weather Shifts &amp; Alternate Routes
                </h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                    &ldquo;What are our backup route options or safe teahouse rest points if sudden afternoon snowfall or heavy rain occurs on the pass approach?&rdquo;
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.72rem;">3. Cultural Courtesies</span>
                <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                    Monastery Etiquette &amp; Village Life
                </h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                    &ldquo;What local customs, prayer wheel practices, and photography etiquette should we observe when passing sacred chortens and traditional settlements?&rdquo;
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.72rem;">4. Health &amp; Hygiene</span>
                <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                    Water Treatment &amp; Nutrition
                </h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                    &ldquo;How are drinking water filtration, cooked meal safety, and specific dietary preferences managed at high-elevation teahouses along our route?&rdquo;
                </p>
            </div>
        </div>
    </section>

    {{-- 5. Training & Operating-Practice Verification Note --}}
    <section aria-labelledby="heading-verification-note" style="margin-bottom: var(--space-14);">
        <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
            <div style="display: flex; gap: var(--space-4); align-items: flex-start; flex-wrap: wrap;">
                <div style="flex-grow: 1; max-width: 800px;">
                    <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-1);">Operational Standards</span>
                    <h2 id="heading-verification-note" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                        Guide Training &amp; Field Verification Standards
                    </h2>
                    <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.6;">
                        In actual Himalayan expedition operations, certified mountain guides must hold recognized government licensing through the Nepal Mountaineering Association (NMA) or Trekking Agencies&rsquo; Association of Nepal (TAAN). Legitimate field safety requires certified Wilderness First Aid (WFA) training, high-altitude rescue coordination protocols, fair wage standards, and comprehensive medical/rescue insurance coverage for both guides and support staff.
                    </p>
                    <p class="website-small website-text-muted" style="margin: 0; font-style: italic;">
                        Notice for this prototype: The guide entries on this website are illustrative and do not assert live regulatory credentials or active commercial availability.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 6. Planning CTA --}}
    <section aria-labelledby="heading-guides-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); text-align: center; box-shadow: none !important;">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Start Your Journey</span>
            <h2 id="heading-guides-cta" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                Ready to Plan a Tailored Himalayan Trek?
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 640px; line-height: 1.6;">
                Use our interactive journey planner to specify your travel dates, preferred trekking style, and fitness profile. We design custom itineraries with dedicated acclimatization buffers and thoughtful trail pacing.
            </p>
            <p class="website-small website-text-muted" style="margin: 0 auto var(--space-6) auto; max-width: 580px; font-style: italic;">
                Please note: The planner does not preassign a guide. Any guide preferences can be recorded as an unconfirmed sample request during itinerary consultation.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary">
                    Start Custom Journey Planner &rarr;
                </a>
                <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline">
                    Browse All Treks
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
