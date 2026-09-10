<section id="section-17-responsible-travel" data-section="17-responsible-travel" class="website-section" aria-labelledby="responsible-travel-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Sustainable Tourism',
            'title' => 'Responsible Himalayan Travel',
            'subtitle' => 'Our commitment to preserving delicate alpine ecosystems, honoring highland traditions, and protecting the welfare of mountain support staff.',
            'actionUrl' => route('website.responsible'),
            'actionText' => 'Our Responsible Code &rarr;'
        ])

        <div class="website-grid-3">
            <!-- Theme 1: Communities -->
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); padding: var(--space-8); display: flex; flex-direction: column;">
                <span class="website-step-label" style="margin-bottom: var(--space-4);">
                    PROPOSED PRACTICE · LOCAL COMMUNITIES
                </span>
                <h3 class="website-h3" style="margin-bottom: var(--space-3);">
                    Highland Communities
                </h3>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    We stay exclusively in locally owned family teahouses, ensuring tourism revenues directly empower indigenous Sherpa, Gurung, and Tamang mountain communities along the route.
                </p>
            </div>

            <!-- Theme 2: Environment -->
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); padding: var(--space-8); display: flex; flex-direction: column;">
                <span class="website-step-label" style="margin-bottom: var(--space-4);">
                    PROPOSED PRACTICE · ENVIRONMENT
                </span>
                <h3 class="website-h3" style="margin-bottom: var(--space-3);">
                    Alpine Conservation
                </h3>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Zero single-use plastic water bottles. We advocate UV and chlorine dioxide purification methods, adhere strictly to Leave No Trace principles, and pack out all non-biodegradable waste.
                </p>
            </div>

            <!-- Theme 3: Team Welfare -->
            <div style="background: var(--color-surface); border: 1px solid var(--color-border); padding: var(--space-8); display: flex; flex-direction: column;">
                <span class="website-step-label" style="margin-bottom: var(--space-4);">
                    PROPOSED PRACTICE · PORTER WELFARE
                </span>
                <h3 class="website-h3" style="margin-bottom: var(--space-3);">
                    Porter &amp; Crew Welfare
                </h3>
                <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.6;">
                    Strict adherence to International Porter Protection Group (IPPG) guidelines: maximum 20kg load limits, fair living wages, quality cold-weather gear, and equal medical emergency coverage.
                </p>
            </div>
        </div>
    </div>
</section>
