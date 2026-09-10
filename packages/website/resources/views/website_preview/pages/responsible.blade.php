@extends('website_preview.layout.master')

@section('title', 'Responsible Mountain Travel & Porter Welfare | EATH Trekking Website')
@section('meta_description', 'Explore our proposed framework for ethical porter welfare, local community benefit, trail waste reduction, and sacred Himalayan etiquette.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    <div style="max-width: 860px; margin: 0 auto;">
        <img src="{{ $heroImage['url'] }}" alt="{{ $heroImage['alt'] }}" width="{{ $heroImage['width'] }}" height="{{ $heroImage['height'] }}" loading="eager" decoding="async" style="width:100%; height:auto; aspect-ratio:16/9; object-fit:cover; margin-bottom:var(--space-8);">
        {{-- 2. H1 & Proposed-Practices Disclaimer --}}
        <header style="margin-bottom: var(--space-10);">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Ethical Operations</span>
            <h1 class="website-h1" style="margin: 0 0 var(--space-4) 0;">
                Responsible Mountain Travel &amp; Porter Welfare
            </h1>
            <p class="website-lead website-text-secondary" style="margin: 0 0 var(--space-5) 0; line-height: 1.6;">
                The Himalayas are home to ancient living cultures, sensitive high-altitude ecosystems, and hardworking mountain communities. Explore our proposed operational code for ethical field leadership and environmental stewardship.
            </p>

            {{-- Proposed Practices Notice Banner --}}
            <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md); box-shadow: none !important;">
                <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                    <span style="font-size: 1.25rem; line-height: 1;" aria-hidden="true">ℹ️</span>
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                            Proposed Practices Notice — Not Verified Factual Achievements
                        </strong>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                            This editorial document outlines proposed environmental standards, porter protection policies, and cultural etiquette guidelines for the EATH platform prototype. It does not represent audited historical achievements, third-party eco-certifications, carbon offset claims, or verified conservation partnership data. In live commercial operations, sustainability policies require external verification and rigorous field compliance audits.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        {{-- 3. Local Communities --}}
        <section aria-labelledby="heading-local-communities" style="margin-bottom: var(--space-12);">
            <div style="margin-bottom: var(--space-4);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Economic Equity</span>
                <h2 id="heading-local-communities" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Supporting Himalayan Valley Communities
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Tourism should directly sustain the families and villages that maintain trail ways, bridges, and teahouses across remote valleys. Our proposed approach prioritizes distributed local benefit:
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                <ul style="margin: 0; padding-left: var(--space-5); line-height: 1.7;" class="website-body website-text-secondary">
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Distributed Teahouse Patronage:</strong> Spreading overnight stays and meal orders across independently owned, family-run lodges rather than concentrating patronage in a small circle of commercial partners.
                    </li>
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Locally Sourced Food Production:</strong> Prioritizing indigenous grains, valley potatoes, seasonal vegetables, and locally milled flour (tsampa, buckwheat) to channel trip expenditures directly to agricultural households.
                    </li>
                    <li>
                        <strong>Infrastructure Respect:</strong> Supporting community-maintained suspension bridges, solar power facilities, and trail maintenance efforts through responsible village fees and fair facility compensation.
                    </li>
                </ul>
            </div>
        </section>

        {{-- 4. Porter / Team Welfare --}}
        <section aria-labelledby="heading-porter-welfare" style="margin-bottom: var(--space-12);">
            <div style="margin-bottom: var(--space-4);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Human Dignity</span>
                <h2 id="heading-porter-welfare" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Porter Welfare &amp; Field Crew Standards
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Porters and support staff are the physical backbone of Himalayan trekking. Any reputable operator must uphold uncompromising ethical labor protections:
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-primary-dark); margin-bottom: var(--space-1);">
                        Strict Weight Ceilings
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Mandatory load limits capped at 20kg to 25kg per porter, strictly weighed before departure and never exceeded regardless of client luggage demands.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-primary-dark); margin-bottom: var(--space-1);">
                        Cold-Weather Equipment
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Provision of insulated mountain boots, thermal base layers, windproof jackets, warm hats, gloves, and UV-filtering sunglasses for all high-altitude staff.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-primary-dark); margin-bottom: var(--space-1);">
                        Fair Wages &amp; Rapid Settlement
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Fair, market-leading wages paid on transparent schedules, with clear tipping guidelines that treat tips as bonuses rather than wage substitutes.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-primary-dark); margin-bottom: var(--space-1);">
                        Equal Medical &amp; Rescue Rights
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Full medical coverage and identical helicopter evacuation protocols for sick or injured porters as provided for international clients.
                    </p>
                </div>
            </div>
        </section>

        {{-- 5. Environmental Considerations --}}
        <section aria-labelledby="heading-environment" style="margin-bottom: var(--space-12);">
            <div style="margin-bottom: var(--space-4);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Leave No Trace</span>
                <h2 id="heading-environment" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Environmental Care &amp; Trail Waste Reduction
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    High-altitude waste decomposes at negligible rates due to low oxygen and sub-zero temperatures. Preserving fragile alpine corridors requires active prevention:
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                <ul style="margin: 0; padding-left: var(--space-5); line-height: 1.7;" class="website-body website-text-secondary">
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Plastic Bottle Elimination:</strong> Trekking teams must avoid single-use bottled water by utilizing boiled lodge water, UV purifiers (SteriPEN), or water filtration pumps.
                    </li>
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Pack-It-In, Pack-It-Out:</strong> All non-biodegradable trash, snack wrappers, battery cells, and personal hygiene products must be carried back to designated municipal disposal points.
                    </li>
                    <li>
                        <strong>Water Source Protection:</strong> Washing clothing or utensils using biodegradable soap at least 50 meters away from natural glacial streams, springs, and community water supply pipes.
                    </li>
                </ul>
            </div>
        </section>

        {{-- 6. Cultural Respect --}}
        <section aria-labelledby="heading-cultural-respect" style="margin-bottom: var(--space-12);">
            <div style="margin-bottom: var(--space-4);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Trail Courtesies</span>
                <h2 id="heading-cultural-respect" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Cultural Traditions &amp; Sacred Etiquette
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Mountain trails pass through centuries of living Buddhist and Hindu traditions. Travelers should observe these respectful customs:
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4);">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        Clockwise Circumambulation
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Always pass mani stone walls, prayer wheels, and chortens on your right side (clockwise direction) as a traditional sign of reverence.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        Monastery Protocol
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Remove hats and shoes before entering shrines. Never touch sacred statues or paintings, and refrain from flash photography in active prayer halls.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        Photography Consent
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Always ask permission before photographing village elders, children, or spiritual ceremonies. A polite question and smile establish mutual trust.
                    </p>
                </div>
            </div>
        </section>

        {{-- 7. Wildlife Considerations --}}
        <section aria-labelledby="heading-wildlife" style="margin-bottom: var(--space-12);">
            <div style="margin-bottom: var(--space-4);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Fauna &amp; Flora</span>
                <h2 id="heading-wildlife" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Alpine Wildlife &amp; Fragile Flora Considerations
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    The high Himalaya supports elusive species such as blue sheep (bharal), Himalayan tahr, musk deer, snow leopards, and diverse birdlife. Our proposed operational code encourages non-intrusive observation:
                </p>
            </div>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <ul style="margin: 0; padding-left: var(--space-5); line-height: 1.7;" class="website-body website-text-secondary">
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Maintain Distance:</strong> Never pursue, corner, or attempt to feed mountain animals. Feeding wildlife alters natural foraging behaviors and creates dependency.
                    </li>
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Tread Softly on Alpine Tundra:</strong> Stay strictly on marked trails to avoid trampling slow-growing alpine vegetation, dwarf juniper scrub, and delicate moss cushions.
                    </li>
                    <li>
                        <strong>Preserve Habitat Integrity:</strong> Do not harvest wild medicinal herbs, rhododendron branches, or pine boughs for trail souvenirs or camp fires.
                    </li>
                </ul>
                <div class="website-micro website-text-muted" style="margin-top: var(--space-3); padding-top: var(--space-2); border-top: 1px solid var(--color-border-light); font-style: italic;">
                    Notice: This wildlife section provides ethical environmental guidelines and does not add a wildlife safari product category to our trekking catalog.
                </div>
            </div>
        </section>

        {{-- 8. Questions Travelers Can Ask --}}
        <section aria-labelledby="heading-traveler-questions" style="margin-bottom: var(--space-12);">
            <h2 id="heading-traveler-questions" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Questions Conscious Travelers Should Ask an Operator
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                Holding trekking agencies accountable encourages higher industry standards across Nepal. We recommend asking these direct questions before booking any expedition:
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        &ldquo;How are your porters equipped and protected?&rdquo;
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Ask if the operator enforces IPPG porter welfare guidelines, verifies footwear before high passes, and provides comprehensive rescue insurance for support crew.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        &ldquo;How do you manage trail waste on high routes?&rdquo;
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Ask what specific procedures ensure that plastics, fuel canisters, and food packaging are accounted for and carried down to municipal recycling facilities.
                    </p>
                </div>
            </div>
        </section>

        {{-- 9. Initiatives / Verification State --}}
        <section aria-labelledby="heading-initiatives" style="margin-bottom: var(--space-12);">
            <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
                <span class="website-badge website-badge--neutral">Status</span>
                <span class="website-badge website-badge--accent">Verified initiative details are not supplied in this website</span>
            </div>

            <h2 id="heading-initiatives" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Auditing &amp; Verified Partnership Disclosure
            </h2>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.6;">
                    Genuine sustainability requires measurable verification rather than marketing claims. To uphold transparency in this prototype, we do not invent fictitious charity donation statistics, unverified eco-labels, or simulated carbon offset calculations.
                </p>
                <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border-light); border-radius: var(--radius-sm);">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                        Prototype Integrity Standard:
                    </strong>
                    <p class="website-micro website-text-muted" style="margin: 0; font-style: italic; line-height: 1.5;">
                        Notice: In live deployment, partnerships with recognized organizations such as the International Porter Protection Group (IPPG) or the Kathmandu Environmental Education Project (KEEP) will be documented with verifiable third-party certification.
                    </p>
                </div>
            </div>
        </section>

        {{-- 10. Related Articles & Pages --}}
        <section aria-labelledby="heading-related-content" style="margin-bottom: var(--space-14);">
            <div style="margin-bottom: var(--space-5);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Explore More</span>
                <h2 id="heading-related-content" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Related Travel Guides &amp; Company Resources
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0;">
                    Learn more about our operational philosophy and route planning principles:
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: var(--space-4);">
                @if($cultureArticle)
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column;">
                        <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.7rem;">Culture</span>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                            <a href="{{ route('website.articles.show', $cultureArticle['slug']) }}" style="color: var(--color-text); text-decoration: none;">
                                {{ $cultureArticle['title'] }}
                            </a>
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                            {{ $cultureArticle['summary'] }}
                        </p>
                        <a href="{{ route('website.articles.show', $cultureArticle['slug']) }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto;">
                            Read Guide &rarr;
                        </a>
                    </div>
                @endif

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column;">
                    <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.7rem;">Leadership</span>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        <a href="{{ route('website.guides.index') }}" style="color: var(--color-text); text-decoration: none;">
                            Meet Our Mountain Guides
                        </a>
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                        Explore sample guide profiles modeling route leadership, pacing philosophy, and respectful communication.
                    </p>
                    <a href="{{ route('website.guides.index') }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto;">
                        View Guides &rarr;
                    </a>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column;">
                    <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.7rem;">Field Protocol</span>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        <a href="{{ route('website.safety') }}" style="color: var(--color-text); text-decoration: none;">
                            Safety &amp; Acclimatization
                        </a>
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                        Review our proposed three-stage safety framework and health monitoring routines for high-altitude passes.
                    </p>
                    <a href="{{ route('website.safety') }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto;">
                        View Safety Framework &rarr;
                    </a>
                </div>
            </div>
        </section>

        {{-- 11. Planning CTA --}}
        <section aria-labelledby="heading-responsible-cta">
            <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); text-align: center; box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Mindful Travel</span>
                <h2 id="heading-responsible-cta" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                    Ready to Plan a Mindful Himalayan Trek?
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 620px; line-height: 1.6;">
                    Explore our interactive journey planner to craft an itinerary built on sensible pacing, local valley stays, and respectful trail exploration.
                </p>

                <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                    <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary">
                        Start Custom Journey Planner &rarr;
                    </a>
                    <a href="{{ route('website.contact') }}" class="website-btn website-btn--outline">
                        Ask a Planning Question
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
