{{-- Floating Inquiry Trigger Button --}}
<button id="inquiry-toggle" class="inquiry-floating-btn btnOpenInquiry" aria-label="Open Plan My Trek inquiry form">
    <span>Plan My Trek</span>
    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M21.79 3.19a.75.75 0 0 0-.78-.15L2.5 10.06a.75.75 0 0 0 .06 1.43l4.68 1.56 1.78 5.37a.75.75 0 0 0 1.28.28l2.78-2.78 4.44 3.28a.75.75 0 0 0 1.18-.46l3.75-14.25a.75.75 0 0 0-.64-1.3ZM8.4 12.55l9.54-6.07-7.98 7.4a.75.75 0 0 0-.22.68l.69 3.4-1.08-3.24a.75.75 0 0 0-.47-.48l-2.48-.83Z" />
    </svg>
</button>

{{-- Sliding Inquiry Panel Drawer --}}
<div id="inquiry-panel" role="dialog" aria-modal="true" aria-labelledby="inquiry-panel-title">
    <div class="inquiry-backdrop absolute inset-0 bg-slate-900/50 backdrop-blur-sm"></div>
    <aside class="inquiry-drawer absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-2xl flex flex-col">
        <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
            <div>
                <span class="eyebrow-label">Direct Consultation</span>
                <h3 id="inquiry-panel-title" class="mt-1 text-xl font-semibold text-slate-900 font-display">Plan Your Himalayan Trek</h3>
            </div>
            <button id="inquiry-close"
                class="rounded-full p-2 text-slate-400 hover:text-slate-700 hover:bg-slate-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900"
                aria-label="Close inquiry panel">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 6l12 12M18 6l-12 12" />
                </svg>
            </button>
        </div>
        <div class="flex-1 overflow-y-auto">
            @include('website.layout.partials.inquiry-form')
        </div>
    </aside>
</div>

{{-- 20 Global Site Footer --}}
<footer class="site-footer" role="contentinfo">
    <div class="content-container">
        <div class="footer-grid">
            <!-- Col 1: Identity & Credentials -->
            <div class="footer-brand-col">
                <a href="{{ route('home') }}" class="brand-link" aria-label="EATH Ways Home">
                    <div class="brand-logo-wrap">
                        <img src="/images/logo.png" alt="EATH Ways Logo" width="120" height="40" />
                    </div>
                    <div class="brand-text-group">
                        <span class="brand-title">EATH Ways</span>
                        <span class="brand-tagline">Himalayas · Nepal</span>
                    </div>
                </a>
                <p class="footer-desc">
                    Licensed Himalayan trekking specialist in Nepal. Dedicated to safety-first acclimatization pacing, local mountain leadership, and responsible tourism across Everest, Annapurna, and Manaslu.
                </p>
                <div class="footer-verified-badges">
                    <span class="badge-pill">Licensed Operator</span>
                    <span class="badge-pill">Nepal Gov. Registered</span>
                </div>
            </div>

            <!-- Col 2: Treks & Regions -->
            <div>
                <h4 class="footer-heading">Treks & Regions</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('trek.list') }}" class="font-semibold text-primary">All Himalayan Treks</a></li>
                    @if (sizeof($destinations) > 0)
                        @foreach ($destinations as $destination)
                            <li><a href="{{ $destination['url'] }}">{{ $destination['name'] }} Region</a></li>
                        @endforeach
                    @else
                        <li><a href="{{ route('trek.list') }}">Everest Region</a></li>
                        <li><a href="{{ route('trek.list') }}">Annapurna Region</a></li>
                        <li><a href="{{ route('trek.list') }}">Manaslu Circuit</a></li>
                    @endif
                </ul>
            </div>

            <!-- Col 3: Safety & Trip Planning -->
            <div>
                <h4 class="footer-heading">Safety & Planning</h4>
                <ul class="footer-links">
                    <li><a href="javascript:void(0)" class="btnOpenInquiry">Custom Itinerary Request</a></li>
                    @if (count($safetyBlogs) > 0)
                        @foreach ($safetyBlogs as $safety)
                            <li>
                                <a href="{{ route('blog.detail', ['category_slug' => $safety->category['slug'] ?? 'safety', 'blog_slug' => $safety->slug]) }}">
                                    {{ $safety->title }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li><a href="javascript:void(0)">Altitude Safety Protocol</a></li>
                        <li><a href="javascript:void(0)">Emergency & Rescue System</a></li>
                    @endif
                    @if (Route::has('faq'))
                        <li><a href="{{ route('faq') }}">Frequently Asked Questions</a></li>
                    @endif
                </ul>
            </div>

            <!-- Col 4: Company, Values & Direct Contact -->
            <div>
                <h4 class="footer-heading">Contact & Company</h4>
                <div class="footer-contact-list mb-4">
                    <div class="contact-item">
                        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                        </svg>
                        <a href="mailto:info@eathways.com">info@eathways.com</a>
                    </div>
                    <div class="contact-item">
                        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.484 1.288l.422 2.534a1.5 1.5 0 01-.416 1.34l-1.077 1.076a11.05 11.05 0 005.197 5.197l1.076-1.077a1.5 1.5 0 011.34-.416l2.534.422A1.5 1.5 0 0116.5 13.352V14.5a1.5 1.5 0 01-1.5 1.5h-1C6.716 16 2 11.284 2 4.5v-1z" clip-rule="evenodd" />
                        </svg>
                        <a href="tel:+9779841927372">+977 (984) 192-7372</a>
                    </div>
                    <div class="contact-item">
                        <svg viewBox="0 0 36 36" width="18" height="18" aria-hidden="true" focusable="false">
                            <path fill="#25D366" d="M19.11 17.66c-.28-.14-1.67-.82-1.93-.91-.26-.09-.45-.14-.64.14-.19.28-.73.91-.9 1.1-.17.19-.33.21-.61.07-.28-.14-1.17-.43-2.22-1.38-.82-.73-1.38-1.64-1.54-1.92-.16-.28-.02-.43.12-.57.12-.12.28-.33.42-.49.14-.16.19-.28.28-.47.09-.19.05-.35-.02-.49-.07-.14-.64-1.55-.88-2.12-.23-.55-.47-.48-.64-.49-.17-.01-.35-.01-.54-.01-.19 0-.49.07-.75.35-.26.28-.99.96-.99 2.34 0 1.38 1.02 2.71 1.16 2.9.14.19 2.01 3.07 4.86 4.3.68.29 1.21.46 1.62.59.68.22 1.3.19 1.79.12.55-.08 1.67-.68 1.91-1.34.24-.66.24-1.23.17-1.34-.07-.11-.26-.17-.54-.31z" />
                            <path fill="#25D366" d="M16.01 2.67C8.84 2.67 3.01 8.5 3.01 15.67c0 2.35.62 4.66 1.8 6.69L3 29.33l6.2-1.63c1.96 1.07 4.16 1.63 6.39 1.63 7.17 0 13-5.83 13-13S23.18 2.67 16.01 2.67zm0 23.66c-2.11 0-4.19-.56-6.01-1.62l-.43-.25-3.68.97.98-3.58-.27-.44a10.93 10.93 0 0 1-1.67-5.74c0-6.06 4.93-11 11-11s11 4.94 11 11-4.93 11-11 11z" />
                        </svg>
                        <a href="https://wa.me/9841927372" target="_blank" rel="noopener noreferrer">WhatsApp: +977 984-1927372</a>
                    </div>
                </div>
                <ul class="footer-links">
                    <li><a href="{{ route('about.our.story') }}">Our Story</a></li>
                    <li><a href="{{ route('about.guide.profiles') }}">Guide Profiles</a></li>
                    <li><a href="{{ route('responsible.travels') }}">Responsible Travel</a></li>
                    <li><a href="{{ route('blogs') }}">Nepal Travel Guide</a></li>
                    <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom Legal & Copyright -->
        <div class="footer-bottom">
            <div>
                © {{ date('Y') }} EATH Travel Pvt. Ltd. All rights reserved. Registered in Kathmandu, Nepal.
            </div>
            <div class="footer-legal-links">
                @if (Route::has('privacy.policy'))
                    <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
                @endif
                @if (Route::has('terms.conditions'))
                    <a href="{{ route('terms.conditions') }}">Terms & Conditions</a>
                @endif
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript Interactions -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // 1. Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        const mobileIconBars = document.getElementById("mobile-icon-bars");
        const mobileIconX = document.getElementById("mobile-icon-x");

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener("click", function () {
                const isHidden = mobileMenu.classList.toggle("hidden");
                const expanded = !isHidden;
                mobileMenuBtn.setAttribute("aria-expanded", expanded.toString());
                if (mobileIconBars && mobileIconX) {
                    mobileIconBars.classList.toggle("hidden", expanded);
                    mobileIconX.classList.toggle("hidden", !expanded);
                }
            });
        }

        // 2. Mobile Drawer Accordions
        const accordions = document.querySelectorAll("[data-mobile-accordion]");
        accordions.forEach(btn => {
            btn.addEventListener("click", () => {
                const targetId = `mobile-panel-${btn.getAttribute("data-mobile-accordion")}`;
                const panel = document.getElementById(targetId);
                if (!panel) return;
                const isHidden = panel.classList.toggle("hidden");
                btn.setAttribute("aria-expanded", (!isHidden).toString());
            });
        });

        // 3. Sliding Inquiry Panel Drawer
        const inquiryToggle = document.getElementById("inquiry-toggle");
        const inquiryPanel = document.getElementById("inquiry-panel");
        const inquiryClose = document.getElementById("inquiry-close");
        const inquiryBackdrop = document.querySelector("#inquiry-panel .inquiry-backdrop");

        const openInquiryPanel = () => {
            if (!inquiryPanel) return;
            // Close mobile menu if open
            if (mobileMenu && !mobileMenu.classList.contains("hidden")) {
                mobileMenu.classList.add("hidden");
                if (mobileMenuBtn) mobileMenuBtn.setAttribute("aria-expanded", "false");
                if (mobileIconBars && mobileIconX) {
                    mobileIconBars.classList.remove("hidden");
                    mobileIconX.classList.add("hidden");
                }
            }
            inquiryPanel.classList.add("is-open");
            if (inquiryToggle) inquiryToggle.setAttribute("aria-expanded", "true");
        };

        const closeInquiryPanel = () => {
            if (!inquiryPanel) return;
            inquiryPanel.classList.remove("is-open");
            if (inquiryToggle) inquiryToggle.setAttribute("aria-expanded", "false");
        };

        window.openInquiryPanel = openInquiryPanel;
        window.closeInquiryPanel = closeInquiryPanel;

        if (inquiryClose) inquiryClose.addEventListener("click", closeInquiryPanel);
        if (inquiryBackdrop) inquiryBackdrop.addEventListener("click", closeInquiryPanel);

        window.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                if (inquiryPanel && inquiryPanel.classList.contains("is-open")) {
                    closeInquiryPanel();
                }
                if (mobileMenu && !mobileMenu.classList.contains("hidden")) {
                    mobileMenu.classList.add("hidden");
                    if (mobileMenuBtn) mobileMenuBtn.setAttribute("aria-expanded", "false");
                    if (mobileIconBars && mobileIconX) {
                        mobileIconBars.classList.remove("hidden");
                        mobileIconX.classList.add("hidden");
                    }
                }
            }
        });

        // 4. CTA buttons with .btnOpenInquiry to open and prefill inquiry panel
        document.addEventListener("click", (e) => {
            const target = e.target.closest(".btnOpenInquiry");
            if (!target) return;
            e.preventDefault();

            const destinationId = target.getAttribute("data-destination-id") || "";
            const packageTitle = target.getAttribute("data-package-title") || "";
            const packageId = target.getAttribute("data-package-id") || "";

            openInquiryPanel();

            const form = document.getElementById("inquiry-form");
            if (!form) return;

            const destinationSelect = form.querySelector("#inquiry-destination");
            if (destinationSelect && destinationId) {
                destinationSelect.value = destinationId;
                destinationSelect.dispatchEvent(new Event("change"));
            }

            const descriptionEl = form.querySelector("#inquiry-description");
            if (descriptionEl && packageTitle) {
                const seed = `Inquiry for ${packageTitle}`;
                if (!descriptionEl.value.includes(seed)) {
                    descriptionEl.value = descriptionEl.value ? `${descriptionEl.value}\n\n${seed}` : seed;
                }
            }

            const planNameEl = form.querySelector("#inquiry-plan-name");
            if (planNameEl && packageTitle && !planNameEl.value) {
                planNameEl.value = packageTitle;
            }

            const packageIdEl = form.querySelector("#inquiry-package-id");
            if (packageIdEl && packageId) {
                packageIdEl.value = packageId;
            }
        });
    });
</script>
</body>
</html>
