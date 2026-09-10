<section id="section-11-why-eath" data-section="11-why-eath" class="website-section" aria-labelledby="why-eath-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Proposed Planning Approach',
            'title' => 'Why Trek With EATH Ways',
            'subtitle' => 'We reject rigid tour packages. Our methodology centers on individualized pacing, transparent route trade-offs, and licensed local mountain leadership.',
            'actionUrl' => route('website.about'),
            'actionText' => 'About Our Approach &rarr;'
        ])

        <div class="website-grid-3">
            <!-- Column 1: Understand Preferences -->
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); padding: var(--space-8); display: flex; flex-direction: column;">
                <span class="website-step-label" style="margin-bottom: var(--space-4);">
                    STEP 01 · LISTEN
                </span>
                <h3 class="website-h3" style="margin-bottom: var(--space-3);">
                    Understand Preferences
                </h3>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    We begin with your personal endurance comfort, elevation experience, and preferred travel pace—rather than pushing pre-packaged fixed itineraries that rush through critical acclimatization zones.
                </p>
            </div>

            <!-- Column 2: Inspect Trade-offs -->
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); padding: var(--space-8); display: flex; flex-direction: column;">
                <span class="website-step-label" style="margin-bottom: var(--space-4);">
                    STEP 02 · EVALUATE
                </span>
                <h3 class="website-h3" style="margin-bottom: var(--space-3);">
                    Inspect Trade-offs
                </h3>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    We openly discuss the realities of each route: daily walking hours, lodge heating limitations, altitude profiles, and weather volatility, so you make informed, confident choices.
                </p>
            </div>

            <!-- Column 3: Review Together -->
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); padding: var(--space-8); display: flex; flex-direction: column;">
                <span class="website-step-label" style="margin-bottom: var(--space-4);">
                    STEP 03 · REFINE
                </span>
                <h3 class="website-h3" style="margin-bottom: var(--space-3);">
                    Review Together
                </h3>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Before any commitment, we review your draft plan collaboratively. Experienced mountain leaders adjust rest days, gear requirements, and contingency buffers for a safe expedition.
                </p>
            </div>
        </div>
    </div>
</section>
