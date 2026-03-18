{{-- inquiry panel --}}
<button id="inquiry-toggle"
    class="inquiry-cta fixed right-0 bottom-10 z-50 -translate-y-1/2 bg-slate-900 px-4 py-3 text-sm font-semibold text-white shadow-lg hover:bg-slate-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900 focus-visible:ring-offset-2">
    <span class="inline-flex items-center gap-2">
        Send Inquiry
        <svg class="telegram-zoom h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path
                d="M21.79 3.19a.75.75 0 0 0-.78-.15L2.5 10.06a.75.75 0 0 0 .06 1.43l4.68 1.56 1.78 5.37a.75.75 0 0 0 1.28.28l2.78-2.78 4.44 3.28a.75.75 0 0 0 1.18-.46l3.75-14.25a.75.75 0 0 0-.64-1.3ZM8.4 12.55l9.54-6.07-7.98 7.4a.75.75 0 0 0-.22.68l.69 3.4-1.08-3.24a.75.75 0 0 0-.47-.48l-2.48-.83Z" />
        </svg>
    </span>
</button>


<div id="inquiry-panel" class="fixed inset-0 z-50">
    <div class="inquiry-backdrop absolute inset-0 bg-slate-900/40"></div>
    <aside class="inquiry-drawer absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-xl">
        <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Inquiry</p>
                <h3 class="mt-1 text-lg font-semibold text-slate-900">Plan Your Trek</h3>
            </div>
            <button id="inquiry-close"
                class="rounded-full p-2 text-slate-500 hover:text-slate-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900"
                aria-label="Close inquiry panel">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 6l12 12M18 6l-12 12" />
                </svg>
            </button>
        </div>
        @include('website.layout.partials.inquiry-form')

    </aside>
</div>

</main>

<footer class="site-footer border-slate-200">
    <div class="footer-inner max-w-7xl mx-auto px-2 sm:px-3 lg:px-4 py-12">
        <div class="grid gap-10 lg:grid-cols-[1.4fr_2fr]">
            <div>
                <h3 class="text-lg font-semibold">Nepal Himalayan Trekking Specialists</h3>
                <p class="mt-3 text-sm text-slate-600">Focused exclusively on Himalayan trekking in Nepal's
                    Everest,
                    Annapurna, and Manaslu regions with safety-first operations.</p>
                <div class="mt-4 text-sm text-slate-600 space-y-2">
                    <div>Email: info@eathways.com</div>
                    <div>Phone: +977 (984) 192-7372</div>
                    <div style="display: flex">
                        <span>WhatsApp:</span>
                        <a href="https://wa.me/9841927372" aria-label="WhatsApp">
                            <svg viewBox="0 0 36 36" width="18" height="18" aria-hidden="true" focusable="false"
                                style="vertical-align: middle;">
                                <path fill="#25D366"
                                    d="M19.11 17.66c-.28-.14-1.67-.82-1.93-.91-.26-.09-.45-.14-.64.14-.19.28-.73.91-.9 1.1-.17.19-.33.21-.61.07-.28-.14-1.17-.43-2.22-1.38-.82-.73-1.38-1.64-1.54-1.92-.16-.28-.02-.43.12-.57.12-.12.28-.33.42-.49.14-.16.19-.28.28-.47.09-.19.05-.35-.02-.49-.07-.14-.64-1.55-.88-2.12-.23-.55-.47-.48-.64-.49-.17-.01-.35-.01-.54-.01-.19 0-.49.07-.75.35-.26.28-.99.96-.99 2.34 0 1.38 1.02 2.71 1.16 2.9.14.19 2.01 3.07 4.86 4.3.68.29 1.21.46 1.62.59.68.22 1.3.19 1.79.12.55-.08 1.67-.68 1.91-1.34.24-.66.24-1.23.17-1.34-.07-.11-.26-.17-.54-.31z" />
                                <path fill="#25D366"
                                    d="M16.01 2.67C8.84 2.67 3.01 8.5 3.01 15.67c0 2.35.62 4.66 1.8 6.69L3 29.33l6.2-1.63c1.96 1.07 4.16 1.63 6.39 1.63 7.17 0 13-5.83 13-13S23.18 2.67 16.01 2.67zm0 23.66c-2.11 0-4.19-.56-6.01-1.62l-.43-.25-3.68.97.98-3.58-.27-.44a10.93 10.93 0 0 1-1.67-5.74c0-6.06 4.93-11 11-11s11 4.94 11 11-4.93 11-11 11z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 text-sm">

                <div>
                    <h4 class="font-semibold">Destinations</h4>
                    <div class="mt-3 space-y-2 text-slate-600">
                        @if (sizeof($destinations) > 0)
                            @foreach ($destinations as $destination)
                                <a href="{{ $destination['url'] }}" class="block">{{ $destination['name'] }}</a>
                            @endforeach
                        @else
                            <p>N/A</p>
                        @endif

                    </div>
                </div>
                <div>
                    <h4 class="font-semibold">Safety</h4>
                    <div class="mt-3 space-y-2 text-slate-600">
                        @if (count($safetyBlogs) > 0)
                            @foreach ($safetyBlogs as $safety)
                                <a href="/safety/{{ $safety->slug }}" class="block">{{ $safety->title }}</a>
                            @endforeach
                        @else
                            <p>n/a</p>
                        @endif

                    </div>
                </div>
                <div>
                    <h4 class="font-semibold">Responsible Travel</h4>
                    <div class="mt-3 space-y-2 text-slate-600">
                        <a href="/responsible-travel/" class="block">Overview</a>
                        <a href="/responsible-travel/local-community-impact/" class="block">Local Community
                            Impact</a>
                        <a href="/responsible-travel/environmental-responsibility/" class="block">Environmental
                            Responsibility</a>
                        <a href="/responsible-travel/social-fund/" class="block">Social Fund</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-10 border-t border-slate-200 pt-6 text-xs text-slate-500">© <?php echo date('Y'); ?> EATH Travel
            Pvt Ltd. All
            rights reserved.</div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const heroSwiper = new Swiper(".hero-swiper", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        effect: "fade",
        speed: 1200,
        fadeEffect: {
            crossFade: true
        }
    });

    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

    mobileMenuButton.addEventListener("click", () => {
        const isOpen = mobileMenu.classList.toggle("hidden");
        const expanded = !isOpen;
        mobileMenuButton.setAttribute("aria-expanded", expanded.toString());
    });

    const galleryItems = Array.from(document.querySelectorAll("[data-gallery-item]"));
    const galleryLightbox = document.getElementById("gallery-lightbox");
    const galleryImage = document.getElementById("gallery-lightbox-image");
    const galleryTitle = document.getElementById("gallery-lightbox-title");
    const gallerySubtitle = document.getElementById("gallery-lightbox-subtitle");
    const galleryPrev = document.querySelector("[data-gallery-prev]");
    const galleryNext = document.querySelector("[data-gallery-next]");
    const galleryCloseButtons = document.querySelectorAll("[data-gallery-close]");
    let galleryIndex = 0;

    const openGallery = (index) => {
        const item = galleryItems[index];
        if (!item || !galleryLightbox || !galleryImage) {
            return;
        }
        galleryIndex = index;
        galleryImage.classList.add("opacity-0");
        const nextSrc = item.dataset.src || "";
        const nextAlt = item.dataset.alt || "";
        if (galleryTitle) {
            galleryTitle.textContent = item.dataset.title || "";
        }
        if (gallerySubtitle) {
            gallerySubtitle.textContent = item.dataset.subtitle || "";
        }
        const applyImage = () => {
            galleryImage.src = nextSrc;
            galleryImage.alt = nextAlt;
            requestAnimationFrame(() => {
                galleryImage.classList.remove("opacity-0");
            });
        };
        if (galleryLightbox.classList.contains("hidden")) {
            galleryLightbox.classList.remove("hidden");
            document.body.classList.add("overflow-hidden");
            requestAnimationFrame(applyImage);
        } else {
            window.setTimeout(applyImage, 120);
        }
    };

    const closeGallery = () => {
        if (!galleryLightbox) {
            return;
        }
        if (galleryImage) {
            galleryImage.classList.add("opacity-0");
        }
        window.setTimeout(() => {
            galleryLightbox.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        }, 200);
    };

    const showGalleryItem = (direction) => {
        if (!galleryItems.length) {
            return;
        }
        const nextIndex = (galleryIndex + direction + galleryItems.length) % galleryItems.length;
        openGallery(nextIndex);
    };

    galleryItems.forEach((item, index) => {
        item.addEventListener("click", () => openGallery(index));
    });

    if (galleryPrev) {
        galleryPrev.addEventListener("click", () => showGalleryItem(-1));
    }
    if (galleryNext) {
        galleryNext.addEventListener("click", () => showGalleryItem(1));
    }
    galleryCloseButtons.forEach((button) => {
        button.addEventListener("click", closeGallery);
    });

    window.addEventListener("keydown", (event) => {
        if (!galleryLightbox || galleryLightbox.classList.contains("hidden")) {
            return;
        }
        if (event.key === "Escape") {
            closeGallery();
        } else if (event.key === "ArrowRight") {
            showGalleryItem(1);
        } else if (event.key === "ArrowLeft") {
            showGalleryItem(-1);
        }
    });

    document.querySelectorAll("[data-accordion]").forEach((button) => {
        button.addEventListener("click", () => {
            const target = button.getAttribute("data-accordion");
            const panel = document.querySelector(`[data-accordion-panel="${target}"]`);
            const isHidden = panel.classList.toggle("hidden");
            button.setAttribute("aria-expanded", (!isHidden).toString());
            button.querySelector("span").textContent = isHidden ? "+" : "−";
        });
    });

    const header = document.querySelector(".site-header");
    const scrollTargetConfigs = [{
            selector: ".hero-overlay",
            mode: "height"
        },
        {
            selector: ".blog-page-bg",
            mode: "top"
        },
    ];
    const scrollTargetConfig = scrollTargetConfigs
        .map((config) => ({
            ...config,
            element: document.querySelector(config.selector),
        }))
        .find((config) => config.element);
    const scrollTarget = scrollTargetConfig?.element ?? null;

    const updateHeaderStyle = () => {
        if (!header || !scrollTarget) {
            return;
        }
        const threshold =
            scrollTargetConfig?.mode === "top" ?
            scrollTarget.offsetTop - header.offsetHeight :
            scrollTarget.offsetHeight - header.offsetHeight;
        header.classList.toggle("is-scrolled", window.scrollY > threshold);
    };

    updateHeaderStyle();
    window.addEventListener("scroll", updateHeaderStyle);
    window.addEventListener("resize", updateHeaderStyle);

    if (header) {
        const updateDropdownBackdrop = () => {
            const hasOpenDropdown = !!header.querySelector(".group:focus-within, .group:hover");
            document.body.classList.toggle("is-dropdown-open", hasOpenDropdown);
        };

        header.addEventListener("mouseover", updateDropdownBackdrop);
        header.addEventListener("mouseout", updateDropdownBackdrop);
        header.addEventListener("focusin", updateDropdownBackdrop);
        header.addEventListener("focusout", updateDropdownBackdrop);
    }

    const typingTarget = document.querySelector(".hero-typing span");
    if (typingTarget) {
        const typingText = typingTarget.dataset.text || typingTarget.textContent.trim();
        const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        if (prefersReducedMotion) {
            typingTarget.textContent = typingText;
        } else {
            let index = 0;
            let forward = true;
            const typeSpeed = 90;
            const deleteSpeed = 50;
            const holdDelay = 1200;
            const pauseDelay = 400;

            const tick = () => {
                if (forward) {
                    index += 1;
                } else {
                    index -= 1;
                }

                typingTarget.textContent = typingText.slice(0, index);

                let delay = forward ? typeSpeed : deleteSpeed;
                if (forward && index >= typingText.length) {
                    forward = false;
                    delay = holdDelay;
                } else if (!forward && index <= 0) {
                    forward = true;
                    delay = pauseDelay;
                }
                window.setTimeout(tick, delay);
            };

            typingTarget.textContent = "";
            tick();
        }
    }

    const inquiryToggle = document.getElementById("inquiry-toggle");
    const inquiryPanel = document.getElementById("inquiry-panel");
    const inquiryClose = document.getElementById("inquiry-close");
    const inquiryBackdrop = document.querySelector("#inquiry-panel .inquiry-backdrop");

    if (inquiryToggle && inquiryPanel && inquiryClose && inquiryBackdrop) {
        const openInquiry = () => {
            inquiryPanel.classList.add("is-open");
            inquiryToggle.setAttribute("aria-expanded", "true");
        };
        const closeInquiry = () => {
            inquiryPanel.classList.remove("is-open");
            inquiryToggle.setAttribute("aria-expanded", "false");
        };

        inquiryToggle.setAttribute("aria-expanded", "false");
        inquiryToggle.setAttribute("aria-controls", "inquiry-panel");

        inquiryToggle.addEventListener("click", openInquiry);
        inquiryClose.addEventListener("click", closeInquiry);
        inquiryBackdrop.addEventListener("click", closeInquiry);
        window.addEventListener("keydown", (event) => {
            if (event.key === "Escape" && inquiryPanel.classList.contains("is-open")) {
                closeInquiry();
            }
        });
    }

</script>
</body>

</html>
