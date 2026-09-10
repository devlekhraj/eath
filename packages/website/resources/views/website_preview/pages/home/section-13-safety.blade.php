@php
    $safetyImage = \Website\Support\WebsiteAssetRegistry::resolve('homepage-safety', 'Mountain safety briefing in the Himalayas');
@endphp

<section id="section-13-safety" data-section="13-safety" class="website-section" aria-labelledby="safety-heading">
    <div class="website-container">
        <div class="website-split">
            <!-- Media Column -->
            <div class="website-split__media">
                <img src="{{ $safetyImage['url'] }}"
                     alt="{{ $safetyImage['alt'] }}"
                     width="{{ $safetyImage['width'] }}"
                     height="{{ $safetyImage['height'] }}"
                     loading="lazy">
            </div>

            <!-- Text Column -->
            <div class="website-split__content">
                <span class="website-eyebrow" style="margin-bottom: var(--space-2);">HIGH-ALTITUDE PROTOCOLS</span>
                <h2 id="safety-heading" class="website-h2">
                    Safety Pacing &amp; Mountain Support
                </h2>
                <p class="website-body website-text-secondary">
                    Himalayan wilderness demands conservative risk management. Our operational framework prioritizes physiological acclimatization over aggressive daily schedules.
                </p>

                <!-- Structured Editorial Blocks -->
                <div style="display: flex; flex-direction: column; gap: var(--space-4); margin-top: var(--space-2);">
                    <div style="border-left: 3px solid var(--color-primary); padding-left: var(--space-4);">
                        <h3 class="website-card-title" style="margin-bottom: var(--space-1);">1. Preparation</h3>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                            Ascent profiles with built-in rest milestones, verified packing gear checkups, and mandatory evacuation insurance review before trail departure.
                        </p>
                    </div>

                    <div style="border-left: 3px solid var(--color-primary); padding-left: var(--space-4);">
                        <h3 class="website-card-title" style="margin-bottom: var(--space-1);">2. On-Trail Support</h3>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                            Government-certified wilderness first-responder guides, twice-daily pulse oximeter readings, and direct satellite/radio emergency dispatch coordination.
                        </p>
                    </div>

                    <div style="border-left: 3px solid var(--color-primary); padding-left: var(--space-4);">
                        <h3 class="website-card-title" style="margin-bottom: var(--space-1);">3. Questions to Verify</h3>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                            Every trekker should verify: What is the porter load cap? Does the guide carry supplemental oxygen or a hyperbaric bag? What is the weather contingency plan?
                        </p>
                    </div>
                </div>

                <!-- Explicit Sample Operating Copy Note -->
                <div style="margin-top: var(--space-2); padding: var(--space-3); background: var(--color-background-warm); border-radius: var(--radius-md); border: 1px solid var(--color-border);">
                    <p class="website-micro website-text-muted" style="margin: 0;">
                        <strong>Sample Operating Copy:</strong> Altitude thresholds and emergency contingency plans displayed are illustrative test content. All operational protocols must be verified with certified mountain operators.
                    </p>
                </div>

                <div style="margin-top: var(--space-4); display: flex; flex-wrap: wrap; gap: var(--space-3); align-items: center;">
                    <a href="{{ route('website.safety') }}" class="website-btn website-btn--primary">
                        Read Full Safety Protocols &rarr;
                    </a>
                    <a href="{{ route('website.contact', ['subject' => 'Safety & Altitude Pacing Inquiry']) }}" class="website-btn website-btn--outline">
                        Ask a Safety Question
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
