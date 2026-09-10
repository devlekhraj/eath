@extends('website_preview.layout.master')

@section('title', 'Safety & Field Support Framework | EATH Trekking Website')
@section('meta_description', 'Explore our proposed safety discussion framework, acclimatization pacing questions, and field coordination standards for Himalayan trekking.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    <div style="max-width: 860px; margin: 0 auto;">
        <img src="{{ $heroImage['url'] }}" alt="{{ $heroImage['alt'] }}" width="{{ $heroImage['width'] }}" height="{{ $heroImage['height'] }}" loading="eager" decoding="async" style="width:100%; height:auto; aspect-ratio:16/9; object-fit:cover; margin-bottom:var(--space-8);">
        {{-- 2. H1 & Explicit Verification Note --}}
        <header style="margin-bottom: var(--space-10);">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Field Standards</span>
            <h1 class="website-h1" style="margin: 0 0 var(--space-4) 0;">
                Himalayan Safety &amp; Field Support Framework
            </h1>
            <p class="website-lead website-text-secondary" style="margin: 0 0 var(--space-5) 0; line-height: 1.6;">
                Trekking in high-altitude environments requires structured acclimatization, open communication, and proactive trail decision-making. Explore our proposed preparation framework and discussion guidelines below.
            </p>

            {{-- Operational Verification Notice Banner --}}
            <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md); box-shadow: none !important;">
                <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                    <span style="font-size: 1.25rem; line-height: 1;" aria-hidden="true">ℹ️</span>
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                            Sample editorial layout — operational content must be verified
                        </strong>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                            This page is an editorial preview showing how safety policies, health check routines, and field coordination topics could be structured. It does not constitute verified company policy, medical advice, or real-time emergency dispatch instructions. In live operations, all guidelines must be verified with certified mountain leaders and official health authorities.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        {{-- 3. Proposed Preparation-Discussion Framework --}}
        <section aria-labelledby="heading-framework" style="margin-bottom: var(--space-12);">
            <div style="margin-bottom: var(--space-6);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Three-Stage Model</span>
                <h2 id="heading-framework" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Proposed Preparation-Discussion Framework
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Before embarking on a mountain journey, travelers and expedition planners should align across three critical preparation phases:
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-4);">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.72rem;">Phase 1</span>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.1rem;">
                        Pre-Trip Medical &amp; Conditioning Alignment
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Review cardiovascular fitness, personal medications, and previous high-altitude exposure with a physician. Confirm an itinerary designed with gradual daily ascent increments.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.72rem;">Phase 2</span>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.1rem;">
                        Daily Trail Monitoring &amp; Pacing Checks
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Establish routine morning and evening health check-ins, assess hydration and appetite, and evaluate daily walking pace against group fatigue markers.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.72rem;">Phase 3</span>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.1rem;">
                        Contingency Buffers &amp; Descent Routing
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Ensure the route contains built-in weather rest days and clearly mapped lower-elevation fallback trails in the event of persistent symptoms or sudden snowstorms.
                    </p>
                </div>
            </div>
        </section>

        {{-- 4. Questions About Guide Support and Responsibilities --}}
        <section aria-labelledby="heading-guide-support" style="margin-bottom: var(--space-12);">
            <h2 id="heading-guide-support" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Questions About Guide Support &amp; Responsibilities
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                <em>Before a real trip, confirm who provides support and what the actual itinerary includes.</em> Key questions to discuss with your operator include:
            </p>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <ul style="margin: 0; padding-left: var(--space-5); line-height: 1.7;" class="website-body website-text-secondary">
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Field Leadership Ratio:</strong> What is the ratio of licensed guides and assistant guides to clients on technical or steep trail sections?
                    </li>
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Wilderness First Aid Qualifications:</strong> Are all accompanying guides currently certified in Wilderness First Aid (WFA) or Wilderness First Responder (WFR)?
                    </li>
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Turn-Around Authority:</strong> Does the lead guide have explicit authority to mandate a rest day or initiate a descent if a trekker exhibits acute altitude symptoms?
                    </li>
                    <li>
                        <strong>Porter &amp; Crew Welfare:</strong> Are porters and support staff provided with fair wages, load limits (maximum 20–25kg), adequate cold-weather clothing, and rescue insurance?
                    </li>
                </ul>
            </div>
        </section>

        {{-- 5. Itinerary / Acclimatization Information to Confirm --}}
        <section aria-labelledby="heading-acclimatization" style="margin-bottom: var(--space-12);">
            <h2 id="heading-acclimatization" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Itinerary &amp; Acclimatization Information to Confirm
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                Ascent rate is the single most controllable risk factor in preventing Acute Mountain Sickness (AMS). When reviewing any proposed trekking schedule, verify the following details:
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-primary-dark); margin-bottom: var(--space-1);">
                        Sleeping Elevation Increments
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Confirm that sleeping elevation gains above 3,000 meters do not exceed recommended thresholds (typically 300 to 500 meters per day) without an intervening rest night.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-primary-dark); margin-bottom: var(--space-1);">
                        Active Acclimatization Days
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Confirm that rest days include optional &ldquo;climb high, sleep low&rdquo; day hikes to stimulate physiological adaptation without overexertion.
                    </p>
                </div>
            </div>
        </section>

        {{-- 6. Communication Arrangements to Confirm --}}
        <section aria-labelledby="heading-communication" style="margin-bottom: var(--space-12);">
            <h2 id="heading-communication" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Communication Arrangements to Confirm
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                Himalayan valleys vary widely in mobile cellular reception. Confirm communication contingencies before departing the trailhead:
            </p>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <ul style="margin: 0; padding-left: var(--space-5); line-height: 1.7;" class="website-body website-text-secondary">
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Satellite Messaging &amp; Tracking:</strong> Verify whether the field crew carries two-way satellite messengers (e.g. Garmin inReach) for remote valley communication.
                    </li>
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Base Operations Check-ins:</strong> Confirm the frequency of routine status updates between the trail leader and the central operations base in Kathmandu.
                    </li>
                    <li>
                        <strong>Cellular Dead Zones:</strong> Clarify which specific valleys or high camps on your itinerary have no cellular connectivity so family members understand expected offline periods.
                    </li>
                </ul>
            </div>
        </section>

        {{-- 7. Weather and Itinerary Decision Questions --}}
        <section aria-labelledby="heading-weather-decisions" style="margin-bottom: var(--space-12);">
            <h2 id="heading-weather-decisions" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Weather &amp; Itinerary Decision Questions
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                Mountain weather is dynamic, especially during seasonal transition windows. Formulate clear decision rules with your team:
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-4);">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        Pass Crossing Windows
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Ask what local meteorological indicators are monitored before committing to high pass crossings like Cho La, Thorong La, or Larkya La.
                    </p>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        Buffer Days for Domestic Flights
                    </strong>
                    <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                        Ensure at least one to two contingency days in Kathmandu following Lukla or Jomsom flights to avoid missing international departure flights during weather delays.
                    </p>
                </div>
            </div>
        </section>

        {{-- 8. Emergency-Coordination Information to Supply --}}
        <section aria-labelledby="heading-emergency-info" style="margin-bottom: var(--space-12);">
            <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
                <span class="website-badge website-badge--neutral">Protocols</span>
                <span class="website-badge website-badge--accent">Awaiting verified operational procedures for live deployment</span>
            </div>

            <h2 id="heading-emergency-info" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Emergency-Coordination Information to Supply
            </h2>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.6;">
                    In active commercial operations, an expedition provider must maintain formal emergency dispatch coordination with helicopter charter services, high-altitude medical clinics in Pheriche and Manang, and international insurance assistance providers.
                </p>
                <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border-light); border-radius: var(--radius-sm);">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                        Prototype Boundary Disclosure:
                    </strong>
                    <p class="website-micro website-text-muted" style="margin: 0; font-style: italic; line-height: 1.5;">
                        Notice: The EATH preview platform does not provide active emergency rescue telephone numbers, medical dispatch, or guaranteed helicopter evacuation capabilities. For real emergencies in Nepal, contact certified emergency services or your travel insurance assistance provider directly.
                    </p>
                </div>
            </div>
        </section>

        {{-- 9. Traveler Responsibilities and Insurance Questions --}}
        <section aria-labelledby="heading-insurance-reqs" style="margin-bottom: var(--space-12);">
            <h2 id="heading-insurance-reqs" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Traveler Responsibilities &amp; Insurance Questions
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                Every participant shares responsibility for collective group safety on Himalayan trails:
            </p>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                <ul style="margin: 0; padding-left: var(--space-5); line-height: 1.7;" class="website-body website-text-secondary">
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Mandatory Helicopter Evacuation Coverage:</strong> Does your policy explicitly cover emergency helicopter search, rescue, and repatriation up to the highest altitude of your route (e.g. 5,600m or 6,000m)? Standard travel policies frequently cap coverage at 3,000m.
                    </li>
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Cashless Guarantee of Payment:</strong> Does your insurer have established direct-billing relationships with Kathmandu emergency hospitals, or are you required to pay upfront?
                    </li>
                    <li style="margin-bottom: var(--space-2);">
                        <strong>Medical Condition Transparency:</strong> Disclose any asthma, hypertension, or past altitude sickness to your expedition leader before reaching the trailhead.
                    </li>
                    <li>
                        <strong>Honest Self-Assessment:</strong> Commit to reporting headaches, nausea, or sleeplessness immediately rather than attempting to &ldquo;push through&rdquo; symptoms.
                    </li>
                </ul>
            </div>
        </section>

        {{-- 10. Related Sample FAQs / Articles --}}
        <section aria-labelledby="heading-related-safety-content" style="margin-bottom: var(--space-14);">
            <div style="margin-bottom: var(--space-5);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Editorial Resources</span>
                <h2 id="heading-related-safety-content" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Related Preparation Guides &amp; FAQs
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0;">
                    Deepen your understanding of altitude preparation and trail logistics with our sample travel guides:
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-4);">
                @if($highAltitudeArticle)
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column;">
                        <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.7rem;">Preparation</span>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                            <a href="{{ route('website.articles.show', $highAltitudeArticle['slug']) }}" style="color: var(--color-text); text-decoration: none;">
                                {{ $highAltitudeArticle['title'] }}
                            </a>
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                            {{ $highAltitudeArticle['summary'] }}
                        </p>
                        <a href="{{ route('website.articles.show', $highAltitudeArticle['slug']) }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto;">
                            Read Guide &rarr;
                        </a>
                    </div>
                @endif

                @if($packingArticle)
                    <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column;">
                        <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2); font-size: 0.7rem;">Gear Checklist</span>
                        <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                            <a href="{{ route('website.articles.show', $packingArticle['slug']) }}" style="color: var(--color-text); text-decoration: none;">
                                {{ $packingArticle['title'] }}
                            </a>
                        </h3>
                        <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5; flex-grow: 1;">
                            {{ $packingArticle['summary'] }}
                        </p>
                        <a href="{{ route('website.articles.show', $packingArticle['slug']) }}" class="website-btn website-btn--outline website-btn--compact" style="margin-top: auto;">
                            Read Guide &rarr;
                        </a>
                    </div>
                @endif

                <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                    <span class="website-badge website-badge--neutral" style="margin: 0 auto var(--space-2) auto; font-size: 0.7rem;">Knowledge Base</span>
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        Frequently Asked Questions
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.5;">
                        Find answers about sample pricing, trip customization, and comparison tools.
                    </p>
                    <a href="{{ route('website.faqs') }}" class="website-btn website-btn--primary website-btn--compact" style="margin-top: auto;">
                        View FAQ Hub &rarr;
                    </a>
                </div>
            </div>
        </section>

        {{-- 11. Ask a Planning Question CTA --}}
        <section aria-labelledby="heading-safety-cta">
            <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); text-align: center; box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Planning Inquiries</span>
                <h2 id="heading-safety-cta" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                    Have Questions About Trail Pacing or Altitude Preparation?
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 620px; line-height: 1.6;">
                    Our team can help design an itinerary structured around your fitness and acclimatization comfort. Submit a simulated planning question or build a tailored route proposal.
                </p>
                <p class="website-small website-text-muted" style="margin: 0 auto var(--space-6) auto; max-width: 580px; font-style: italic;">
                    Notice: This contact form simulates planning inquiries. It does not connect to live emergency helplines or dispatch rescue services.
                </p>

                <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                    <a href="{{ route('website.contact') }}" class="website-btn website-btn--primary">
                        Ask a Planning Question &rarr;
                    </a>
                    <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--outline">
                        Start Custom Journey Planner
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
