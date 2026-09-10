<section id="section-15-how-it-works" data-section="15-how-it-works" class="website-section" aria-labelledby="how-it-works-heading">
    <div class="website-container">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Expedition Journey',
            'title' => 'How Planning Works with EATH',
            'subtitle' => 'From initial trail discovery to mountain-ready preparation, our collaborative process ensures transparent expectations at every stage.',
            'actionUrl' => route('website.planner.start', ['mode' => 'discover', 'source' => 'home']),
            'actionText' => 'Start Guided Planner &rarr;'
        ])

        <div class="website-steps-grid">
            <!-- Step 1: Discover -->
            <div class="website-steps-grid__card">
                <div class="website-steps-grid__number">01</div>
                <h3 class="website-card-title" style="margin-bottom: var(--space-2);">Discover</h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                    Filter fixture routes by season, walking hours, and altitude profile, or compare 3 classic itineraries side-by-side.
                </p>
            </div>

            <!-- Step 2: Plan Together -->
            <div class="website-steps-grid__card">
                <div class="website-steps-grid__number">02</div>
                <h3 class="website-card-title" style="margin-bottom: var(--space-2);">Plan Together</h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                    Configure dates, party size, and pacing in the interactive planner, matching route demands to your personal mountain comfort.
                </p>
            </div>

            <!-- Step 3: Confirm -->
            <div class="website-steps-grid__card">
                <div class="website-steps-grid__number">03</div>
                <h3 class="website-card-title" style="margin-bottom: var(--space-2);">Confirm</h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                    Inspect full day-by-day itineraries, inclusions, clear exclusions, and transparent ground pricing to confirm your trek choices.
                </p>
            </div>

            <!-- Step 4: Trek -->
            <div class="website-steps-grid__card">
                <div class="website-steps-grid__number">04</div>
                <h3 class="website-card-title" style="margin-bottom: var(--space-2);">Trek</h3>
                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                    Receive your simulated confirmation. In actual travel, licensed local mountain leaders accompany every step on trail with full gear review.
                </p>
            </div>
        </div>

        <!-- Explicit Simulation Boundary Explanation -->
        <div style="margin-top: var(--space-8); padding: var(--space-4) var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: var(--radius-lg); text-align: center;">
            <p class="website-small website-text-secondary" style="margin: 0;">
                <strong>Website Simulation Notice:</strong> This preview showcases the planning experience. Submitting requests generates a simulated local receipt; no commercial transaction or credit card processing occurs.
            </p>
        </div>
    </div>
</section>
