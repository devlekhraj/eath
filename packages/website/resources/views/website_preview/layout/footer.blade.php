<!-- 7. Global Website Site Footer -->
<footer class="website-footer" role="contentinfo">
    <div class="website-container">
        <div class="website-footer__grid">
            <!-- Brand & Trust Credentials -->
            <div>
                <div class="website-brand" style="color: #ffffff; margin-bottom: var(--space-4);">
                    <img src="/images/logo.png" alt="EATH Ways Logo" width="180" height="74" style="height: 72px; max-height: 76px; width: auto; filter: brightness(0) invert(1);">
                </div>
                <p class="website-small" style="color: rgba(255, 255, 255, 0.8); line-height: 1.6; margin-bottom: var(--space-4);">
                    Safely guided Himalayan treks in Nepal. Dedicated to safety-first altitude pacing, licensed local leadership, and respectful community tourism across Everest, Annapurna, and Manaslu.
                </p>
                <div style="display: flex; gap: var(--space-2); flex-wrap: wrap;">
                    <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.12); color: #ffffff; border-color: rgba(255, 255, 255, 0.2);">
                        Licensed Nepal Operator
                    </span>
                    <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.12); color: #ffffff; border-color: rgba(255, 255, 255, 0.2);">
                        Safety-First Pacing
                    </span>
                </div>
            </div>

            <!-- Col 1: Treks & Regions -->
            <div>
                <h4 class="website-footer__heading">Treks &amp; Regions</h4>
                <ul class="website-footer__list">
                    <li><a href="{{ route('website.treks.index') }}">All Himalayan Treks</a></li>
                    <li><a href="{{ route('website.destinations.show', 'everest') }}">Everest Region</a></li>
                    <li><a href="{{ route('website.destinations.show', 'annapurna') }}">Annapurna Region</a></li>
                    <li><a href="{{ route('website.destinations.show', 'langtang') }}">Langtang Valley</a></li>
                    <li><a href="{{ route('website.destinations.show', 'manaslu') }}">Manaslu Circuit</a></li>
                    <li><a href="{{ route('website.destinations.show', 'mustang') }}">Upper Mustang</a></li>
                </ul>
            </div>

            <!-- Col 2: Plan & Compare -->
            <div>
                <h4 class="website-footer__heading">Plan &amp; Compare</h4>
                <ul class="website-footer__list">
                    <li><a href="{{ route('website.planner.start') }}">Plan My Trek</a></li>
                    <li><a href="{{ route('website.compare') }}">Compare Treks</a></li>
                    <li><a href="{{ route('website.departures.index') }}">Sample Departures</a></li>
                    <li><a href="{{ route('website.experiences.index') }}">Browse by Experience</a></li>
                    <li><a href="{{ route('website.months.index') }}">When to Go Calendar</a></li>
                </ul>
            </div>

            <!-- Col 3: Travel Guide & Editorial -->
            <div>
                <h4 class="website-footer__heading">Travel Guide</h4>
                <ul class="website-footer__list">
                    <li><a href="{{ route('website.articles.index') }}">Articles &amp; Checklists</a></li>
                    <li><a href="{{ route('website.safety') }}">Safety &amp; Acclimatization</a></li>
                    <li><a href="{{ route('website.responsible') }}">Responsible Tourism</a></li>
                    <li><a href="{{ route('website.faqs') }}">Frequently Asked Questions</a></li>
                </ul>
            </div>

            <!-- Col 4: Company & Simulated Contact -->
            <div>
                <h4 class="website-footer__heading">Company</h4>
                <ul class="website-footer__list">
                    <li><a href="{{ route('website.about') }}">About EATH</a></li>
                    <li><a href="{{ route('website.guides.index') }}">Our Local Guides</a></li>
                    <li><a href="{{ route('website.stories.index') }}">Traveler Stories</a></li>
                    <li><a href="{{ route('website.contact') }}">Contact Our Team</a></li>
                    <li>
                        <button type="button" class="website-btn website-btn--text" data-website-outbound style="color: #ffffff; text-align: left; font-size: var(--type-small);">
                            WhatsApp Inquiry (Website)
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom: Policies, Copyright, and Disclosure -->
        <div class="website-footer__bottom">
            <div class="website-footer__legal">
                <a href="{{ route('website.policy.privacy') }}">Privacy Policy</a>
                <a href="{{ route('website.policy.terms') }}">Terms &amp; Conditions</a>
                <a href="{{ route('website.policy.booking') }}">Booking Conditions</a>
                <a href="{{ route('website.policy.cancellation') }}">Cancellation Policy</a>
                <a href="{{ route('website.policy.cookies') }}">Cookie Policy</a>
            </div>

            <div>
                <span>&copy; {{ date('Y') }} EATH Ways Website. Sample trips, prices and availability.</span>
            </div>
        </div>
    </div>
</footer>

<!-- 8. Mobile Coordinated Action Bar (Fixed at bottom on small viewports) -->
<div class="website-mobile-bar" role="region" aria-label="Mobile actions">
    <a href="{{ route('website.compare') }}" class="website-btn website-btn--outline website-btn--compact" style="flex: 1;" aria-label="Compare shortlisted treks">
        <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="3" y="3" width="7" height="18"></rect>
            <rect x="14" y="3" width="7" height="18"></rect>
        </svg>
        <span>Compare</span>
        <span class="website-badge website-badge--primary website-compare-count" style="display: none; padding: 0.15rem 0.45rem;">0</span>
    </a>
    <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary website-btn--compact" style="flex: 2;">
        <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="10"></circle>
            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
        </svg>
        <span>Plan My Trek</span>
    </a>
</div>

<!-- Simulated External Contact Notice Dialog -->
<div id="website-contact-dialog" class="website-dialog" role="dialog" aria-modal="true" aria-labelledby="website-dialog-title">
    <div class="website-dialog__backdrop" id="website-contact-dialog-backdrop"></div>
    <div class="website-dialog__panel">
        <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-2);">Simulated Website Action</span>
        <h3 id="website-dialog-title" class="website-h3" style="margin-bottom: var(--space-3);">External Messaging Disabled</h3>
        <p class="website-body website-text-secondary" style="margin-bottom: var(--space-6);">
            Live WhatsApp, phone calling, and third-party messaging integrations are disabled in this preview environment. You can test our interactive inquiry flow directly through the simulated contact form.
        </p>
        <div style="display: flex; gap: var(--space-3); justify-content: flex-end; flex-wrap: wrap;">
            <button type="button" id="website-contact-dialog-close" class="website-btn website-btn--ghost">
                Close
            </button>
            <a href="{{ route('website.contact') }}" class="website-btn website-btn--primary">
                Open Website Contact Form
            </a>
        </div>
    </div>
</div>
