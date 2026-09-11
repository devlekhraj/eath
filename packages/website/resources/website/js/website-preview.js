import $ from 'jquery';
import { Modal, Offcanvas } from 'bootstrap';
import intlTelInput from 'intl-tel-input/intlTelInputWithUtils';
import 'intl-tel-input/styles';

window.$ = window.jQuery = $;
window.bootstrap = window.bootstrap || {};
window.bootstrap.Modal = Modal;
window.bootstrap.Offcanvas = Offcanvas;
window.intlTelInput = intlTelInput;
window.dispatchEvent(new CustomEvent('intlTelInput:ready', { detail: intlTelInput }));

/**
 * Global HTTP Ajax Helper with CSRF token and callback architecture
 *
 * Signature:
 * http(config, successCallback, errorCallback, loaderCallback)
 */
window.http = function(config = {}, success, error, loader) {
    if (typeof loader === 'function') {
        loader(true);
    }

    const csrfToken = $('meta[name="csrf-token"]').attr('content') || '';
    const defaults = {
        type: config.method || config.type || (config.data ? 'POST' : 'GET'),
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken,
        }
    };

    const options = $.extend(true, {}, defaults, config);

    return $.ajax(options)
        .done(function(resp, textStatus, jqXHR) {
            if (typeof success === 'function') {
                success(resp, jqXHR);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            const errorData = jqXHR.responseJSON || {
                status: jqXHR.status,
                message: errorThrown || 'Request failed. Please try again.'
            };
            if (typeof error === 'function') {
                error(errorData, jqXHR);
            }
        })
        .always(function() {
            if (typeof loader === 'function') {
                loader(false);
            }
        });
};

/**
 * Auto-initialize interactive plugins (intl-tel-input & ajax form submission) on injected modal content
 */
window.initModalPlugins = function(container) {
    const $container = $(container);

    // Initialize intl-tel-input on phone input
    const phoneInput = $container.find('input[type="tel"]')[0];
    if (phoneInput && window.intlTelInput && !phoneInput.dataset.itiInitialized) {
        phoneInput.dataset.itiInitialized = 'true';
        const iti = window.intlTelInput(phoneInput, {
            separateDialCode: true,
            initialCountry: "auto",
            initialCountryLookup: () => {
                return fetch("https://ipapi.co/json/")
                    .then((res) => res.json())
                    .then((data) => data.country_code ? data.country_code.toLowerCase() : "us")
                    .catch(() => "us");
            },
            countryOrder: ["us", "gb", "au", "ca", "de", "fr", "np", "in"],
            strictMode: true,
            dropdownParent: document.body,
        });

        const dialInput = $container.find('#trek-join-dial')[0];
        const countryHidden = $container.find('#trek-join-country')[0];

        phoneInput.addEventListener('countrychange', () => {
            const country = iti.getSelectedCountry();
            if (country) {
                if (country.dialCode && dialInput) {
                    dialInput.value = `+${country.dialCode}`;
                }
                if (country.name && countryHidden) {
                    countryHidden.value = country.name;
                }
            }
        });

        phoneInput._iti = iti;
    }

    // Attach Ajax submit handler to dynamic forms
    $container.find('form[data-ajax-form]').off('submit').on('submit', function(e) {
        e.preventDefault();
        const form = this;
        const $form = $(form);
        const $submitBtn = $form.find('button[type="submit"]');
        const $errorEl = $form.find('#trek-join-error');
        const $successEl = $container.find('#trek-join-success');

        $errorEl.prop('hidden', true).empty();

        const itiInput = $form.find('input[type="tel"]')[0];
        if (itiInput && itiInput._iti) {
            const country = itiInput._iti.getSelectedCountry();
            if (country) {
                if (country.dialCode) $form.find('#trek-join-dial').val(`+${country.dialCode}`);
                if (country.name) $form.find('#trek-join-country').val(country.name);
            }
        }

        const formData = new FormData(form);
        const originalBtnText = $submitBtn.text();

        window.http({
            url: form.action,
            method: form.method || 'POST',
            data: formData,
            processData: false,
            contentType: false,
        }, (resp) => {
            $form.prop('hidden', true);
            $successEl.prop('hidden', false);
            $successEl.find('button').trigger('focus');
        }, (err) => {
            const message = (err.errors ? Object.values(err.errors).flat()[0] : null) || err.message || 'Unable to process your request. Please check details and try again.';
            $errorEl.text(message).prop('hidden', false);
            $form.find('input:visible:first').trigger('focus');
        }, (isLoading) => {
            $submitBtn.prop('disabled', isLoading).text(isLoading ? 'Sending Interest…' : originalBtnText);
        });
    });

    // Initialize Elevation & Acclimatization Profile Interactive Chart if present in modal
    if (typeof window.initElevationProfile === 'function') {
        window.initElevationProfile(container);
    }

    // Auto-focus first visible input
    setTimeout(() => {
        $container.find('input:visible:first').trigger('focus');
    }, 150);
};

/**
 * Global openModal Helper
 *
 * Usage:
 * openModal({
 *     url: '/website/departures/t-ebc-a/modal',
 *     size: 'modal-lg', // Options: modal-sm, '', modal-lg, modal-xl, modal-fullscreen
 *     success: (html, $content) => {},
 *     error: (err) => {}
 * });
 */
window.openModal = function({ url, size = 'modal-lg', success, error }) {
    const modalEl = document.getElementById('website-global-modal');
    if (!modalEl) {
        console.error('website-global-modal element not found on page');
        return;
    }

    const $dialog = $(modalEl).find('.modal-dialog');
    // Remove existing size classes and add the requested size (if provided)
    $dialog.removeClass('modal-sm modal-lg modal-xl modal-fullscreen');
    if (size) {
        $dialog.addClass(size);
    }

    const $content = $('#website-global-modal-content');
    const bsModal = window.bootstrap.Modal.getOrCreateInstance(modalEl);

    // Show modal immediately with loading indicator
    $content.html(`
        <div class="website-modal-loader">
            <div class="website-modal-loader__spinner"></div>
            <span style="font-size: 0.9rem; font-weight: 600; color: #64748b;">Loading departure details…</span>
        </div>
    `);
    bsModal.show();

    // Fetch dynamic Blade view using http
    window.http({
        url: (() => {
            const panelUrl = new URL(url, window.location.origin);
            panelUrl.searchParams.set('panel', '1');
            return panelUrl.toString();
        })(),
        method: 'GET',
        dataType: 'html',
    }, (html) => {
        $content.html(html);
        if (typeof window.initModalPlugins === 'function') {
            window.initModalPlugins($content[0]);
        }
        if (typeof success === 'function') {
            success(html, $content);
        }
    }, (err) => {
        $content.html(`
            <header class="website-join__header">
                <h2 class="website-join__title" style="font-size: 1.25rem;">Unable to load</h2>
                <button type="button" class="website-join__close" data-bs-dismiss="modal">&times;</button>
            </header>
            <div class="website-join__body text-center" style="padding: 32px 24px;">
                <p class="website-join__error" style="display: block; margin-bottom: 20px;">
                    ${err.message || 'Unable to load departure information. Please try again.'}
                </p>
                <button type="button" class="website-btn website-btn--primary" data-bs-dismiss="modal" style="min-width: 120px; justify-content: center; border-radius: 0 !important;">
                    Close
                </button>
            </div>
        `);
        if (typeof error === 'function') {
            error(err);
        }
    });
};

/**
 * Global openRightPanel Helper
 *
 * Usage:
 * openRightPanel({
 *     url: '/website/departures/t-ebc-a/modal',
 *     size: '400px', // Custom width for the right panel (e.g., '400px', '50vw')
 *     success: (html, $content) => {},
 *     error: (err) => {}
 * });
 */
window.openRightPanel = function({ url = '', size = '400px', success, error } = {}) {
    const offcanvasEl = document.getElementById('website-global-offcanvas');
    if (!offcanvasEl) {
        console.error('website-global-offcanvas element not found on page');
        return;
    }

    // Apply custom width size to offcanvas element
    if (size) {
        offcanvasEl.style.setProperty('--bs-offcanvas-width', size);
    }

    const $content = $('#website-global-offcanvas-content');
    const header = document.getElementById('website-global-offcanvas-header');
    const title = document.getElementById('website-global-offcanvas-title');
    const subtitle = document.getElementById('website-global-offcanvas-subtitle');
    const bsOffcanvas = Offcanvas.getOrCreateInstance(offcanvasEl);
    document.getElementById('website-global-offcanvas-close')?.addEventListener('click', () => bsOffcanvas.hide());

    // Show offcanvas immediately with loading indicator
    $content.html(`
        <div class="website-modal-loader" style="height: 100%;">
            <div class="website-modal-loader__spinner"></div>
            <span style="font-size: 0.9rem; font-weight: 600; color: #64748b;">Loading details…</span>
        </div>
    `);
    bsOffcanvas.show();

    // If no URL is supplied, the panel can still be used as a static shell.
    if (!url) {
        return;
    }

    // Fetch dynamic Blade view using http
    window.http({
        url: url,
        method: 'GET',
        dataType: 'html',
    }, (html) => {
        const parsed = $('<div>').html(html);
        const loadedHeader = parsed.find('.website-join__header').first();
        if (loadedHeader.length) {
            title.textContent = loadedHeader.find('.website-join__title').text().trim() || 'Plan your trek';
            subtitle.innerHTML = loadedHeader.find('.website-join__subtitle').html() || '';
        }
        const loadedBody = parsed.find('.website-join__body').first();
        const loadedPlanner = parsed.find('.website-container').first();
        $content.html(loadedBody.length ? loadedBody.html() : (loadedPlanner.length ? loadedPlanner : html));

        // Convert any data-bs-dismiss="modal" to "offcanvas" to reuse the same templates
        $content.find('[data-bs-dismiss="modal"]').removeAttr('data-bs-dismiss');
        if (typeof window.initModalPlugins === 'function') {
            window.initModalPlugins($content[0]);
        }
        if (typeof success === 'function') {
            success(html, $content);
        }
    }, (err) => {
        $content.html(`
            <header class="website-join__header">
                <h2 class="website-join__title" style="font-size: 1.25rem;">Unable to load</h2>
                <button type="button" class="website-join__close" data-bs-dismiss="offcanvas">&times;</button>
            </header>
            <div class="website-join__body text-center" style="padding: 32px 24px;">
                <p class="website-join__error" style="display: block; margin-bottom: 20px;">
                    ${err.message || 'Unable to load information. Please try again.'}
                </p>
                <button type="button" class="website-btn website-btn--primary" data-bs-dismiss="offcanvas" style="min-width: 120px; justify-content: center; border-radius: 0 !important;">
                    Close
                </button>
            </div>
        `);
        if (typeof error === 'function') {
            error(err);
        }
    });
};

// Backwards-compatible alias for callers using the original misspelling.
// Keep this until all templates and integrations use the canonical name.
window.openRigntPanel = window.openRightPanel;

// Global click listener for any element with data-open-modal or data-open-panel
$(document).on('click', '[data-open-modal]', function(e) {
    e.preventDefault();
    const url = $(this).attr('data-open-modal') || $(this).attr('href');
    const size = $(this).attr('data-modal-size') || 'modal-lg';
    if (url) {
        window.openModal({ url, size });
    }
});

// Global click listener for any element with data-open-panel
$(document).on('click', '[data-open-panel]', function(e) {
    e.preventDefault();
    const url = $(this).attr('data-open-panel') || $(this).attr('href');
    const size = $(this).attr('data-panel-size') || '400px';
    if (url) {
        const panelTitle = $(this).attr('data-panel-title');
        if (panelTitle) {
            document.getElementById('website-global-offcanvas-title')?.replaceChildren(document.createTextNode(panelTitle));
        }
        window.openRightPanel({ url, size });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    // =========================================================================
    // 1. Mobile Navigation Drawer
    // =========================================================================
    const menuToggle = document.getElementById('website-mobile-menu-toggle');
    const menuDrawer = document.getElementById('website-mobile-drawer');
    const menuClose = document.getElementById('website-mobile-menu-close');
    const menuBackdrop = document.getElementById('website-mobile-backdrop');

    function openMobileMenu() {
        if (!menuDrawer) return;
        menuDrawer.classList.add('is-open');
        menuToggle?.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
        menuClose?.focus();
    }

    function closeMobileMenu() {
        if (!menuDrawer) return;
        menuDrawer.classList.remove('is-open');
        menuToggle?.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        menuToggle?.focus();
    }

    menuToggle?.addEventListener('click', (e) => {
        e.preventDefault();
        const isOpen = menuDrawer?.classList.contains('is-open');
        if (isOpen) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });

    menuClose?.addEventListener('click', (e) => {
        e.preventDefault();
        closeMobileMenu();
    });

    menuBackdrop?.addEventListener('click', closeMobileMenu);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && menuDrawer?.classList.contains('is-open')) {
            closeMobileMenu();
        }
    });

    // =========================================================================
    // 1b. Desktop Navigation Dropdown & Mega Menu Accessibility
    // =========================================================================
    const navDropdownItems = document.querySelectorAll('.website-nav__item');
    navDropdownItems.forEach((item) => {
        const trigger = item.querySelector('.website-nav__link');
        if (!trigger || !item.querySelector('.website-nav__dropdown, .website-nav__mega-menu')) return;

        item.addEventListener('mouseenter', () => trigger.setAttribute('aria-expanded', 'true'));
        item.addEventListener('mouseleave', () => trigger.setAttribute('aria-expanded', 'false'));
        item.addEventListener('focusin', () => trigger.setAttribute('aria-expanded', 'true'));
        item.addEventListener('focusout', (e) => {
            if (!item.contains(e.relatedTarget)) {
                trigger.setAttribute('aria-expanded', 'false');
            }
        });
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const activeEl = document.activeElement;
            if (activeEl && activeEl.closest('.website-nav__item')) {
                const parentItem = activeEl.closest('.website-nav__item');
                const trigger = parentItem?.querySelector('.website-nav__link');
                trigger?.focus();
                trigger?.setAttribute('aria-expanded', 'false');
            }
        }
    });

    // =========================================================================
    // 2. Simulated Outbound Contact Dialog
    // =========================================================================
    const contactDialog = document.getElementById('website-contact-dialog');
    const contactDialogClose = document.getElementById('website-contact-dialog-close');
    const contactDialogBackdrop = document.getElementById('website-contact-dialog-backdrop');
    let lastActiveTrigger = null;

    function openContactNotice(e) {
        if (!contactDialog) return;
        e.preventDefault();
        lastActiveTrigger = document.activeElement;
        contactDialog.classList.add('is-open');
        contactDialogClose?.focus();
        document.body.style.overflow = 'hidden';
    }

    function closeContactNotice() {
        if (!contactDialog) return;
        contactDialog.classList.remove('is-open');
        document.body.style.overflow = '';
        if (lastActiveTrigger && typeof lastActiveTrigger.focus === 'function') {
            lastActiveTrigger.focus();
        }
    }

    document.querySelectorAll('[data-website-outbound]').forEach(btn => {
        btn.addEventListener('click', openContactNotice);
    });

    contactDialogClose?.addEventListener('click', closeContactNotice);
    contactDialogBackdrop?.addEventListener('click', closeContactNotice);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && contactDialog?.classList.contains('is-open')) {
            closeContactNotice();
        }
    });

    // =========================================================================
    // 3. Shared Comparison State & Tray Engine (Phase 08)
    // =========================================================================
    const EATH_COMPARE_KEY = 'eath.website.v1.compare';
    const MAX_COMPARE_ITEMS = 3;

    // Read server-emitted trek whitelist
    function getTrekWhitelist() {
        try {
            const el = document.getElementById('website-trek-whitelist');
            if (!el) return {};
            const b64 = el.getAttribute('data-whitelist');
            if (b64) {
                return JSON.parse(atob(b64));
            }
            return el.textContent ? JSON.parse(el.textContent) : {};
        } catch {
            return {};
        }
    }

    const trekWhitelist = getTrekWhitelist();
    let inMemoryIds = [];

    // Storage access with quota & private-mode safety
    function readStoredIds() {
        try {
            const raw = localStorage.getItem(EATH_COMPARE_KEY);
            if (!raw) return inMemoryIds;
            const parsed = JSON.parse(raw);
            if (!Array.isArray(parsed)) return [];
            // Normalize: unique, known in whitelist, max 3
            const valid = [];
            for (const id of parsed) {
                if (typeof id === 'string' && trekWhitelist[id] && !valid.includes(id)) {
                    valid.push(id);
                    if (valid.length === MAX_COMPARE_ITEMS) break;
                }
            }
            inMemoryIds = valid;
            return valid;
        } catch {
            return inMemoryIds;
        }
    }

    function writeStoredIds(ids) {
        // Normalize
        const valid = [];
        for (const id of ids) {
            if (typeof id === 'string' && trekWhitelist[id] && !valid.includes(id)) {
                valid.push(id);
                if (valid.length === MAX_COMPARE_ITEMS) break;
            }
        }
        inMemoryIds = valid;
        try {
            localStorage.setItem(EATH_COMPARE_KEY, JSON.stringify(valid));
        } catch {
            // Graceful in-memory fallback
        }
    }

    function buildCompareUrl(ids) {
        const baseUrl = window.__WEBSITE_COMPARE_URL__ || '/compare-treks';
        if (!ids || ids.length === 0) return baseUrl;
        const params = new URLSearchParams();
        ids.forEach(id => params.append('treks[]', id));
        return `${baseUrl}?${params.toString()}`;
    }

    // Modal elements for 4th trek replacement
    const replaceModal = document.getElementById('website-compare-replace-modal');
    const replaceBackdrop = document.getElementById('website-compare-replace-backdrop');
    const replaceNewName = document.getElementById('website-replace-new-name');
    const replaceOptionsContainer = document.getElementById('website-replace-options');
    const replaceCancelBtn = document.getElementById('website-replace-cancel');
    let replaceTriggerElement = null;

    function openReplaceModal(newTrekId) {
        if (!replaceModal) return;
        replaceTriggerElement = document.activeElement;
        const incomingTrek = trekWhitelist[newTrekId] || { name: 'New Trek' };
        if (replaceNewName) replaceNewName.textContent = incomingTrek.name;

        if (replaceOptionsContainer) {
            replaceOptionsContainer.innerHTML = '';
            const currentIds = readStoredIds();

            currentIds.forEach((oldId, index) => {
                const oldTrek = trekWhitelist[oldId] || { name: oldId, duration: '' };
                const optionBtn = document.createElement('button');
                optionBtn.type = 'button';
                optionBtn.className = 'website-replace-option';
                optionBtn.setAttribute('data-old-id', oldId);
                optionBtn.setAttribute('aria-label', `Replace ${oldTrek.name} with ${incomingTrek.name}`);
                optionBtn.innerHTML = `
                    <div>
                        <span class="website-replace-option__name">Replace ${oldTrek.name}</span>
                        <span class="website-replace-option__meta">${oldTrek.duration || ''} · ${oldTrek.price || ''} USD</span>
                    </div>
                    <span class="website-btn website-btn--outline website-btn--compact" style="pointer-events: none;">Replace &rarr;</span>
                `;

                optionBtn.addEventListener('click', () => {
                    WebsiteCompare.replace(oldId, newTrekId);
                    closeReplaceModal();
                });

                replaceOptionsContainer.appendChild(optionBtn);
            });
        }

        replaceModal.style.display = 'flex';
        replaceModal.classList.add('is-open');
        document.body.style.overflow = 'hidden';

        // Focus first option
        const firstBtn = replaceOptionsContainer?.querySelector('button');
        if (firstBtn) {
            firstBtn.focus();
        } else {
            replaceCancelBtn?.focus();
        }
    }

    function closeReplaceModal() {
        if (!replaceModal) return;
        replaceModal.style.display = 'none';
        replaceModal.classList.remove('is-open');
        document.body.style.overflow = '';
        if (replaceTriggerElement && typeof replaceTriggerElement.focus === 'function') {
            replaceTriggerElement.focus();
        }
    }

    replaceCancelBtn?.addEventListener('click', closeReplaceModal);
    replaceBackdrop?.addEventListener('click', closeReplaceModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && replaceModal?.classList.contains('is-open')) {
            closeReplaceModal();
        }
    });

    // Comparison Engine Public API
    window.WebsiteCompare = {
        getIds: readStoredIds,
        setIds: (ids) => {
            writeStoredIds(ids);
            reconcileCompareUI();
        },
        has: (id) => readStoredIds().includes(id),
        add: (id) => {
            if (!trekWhitelist[id]) return false;
            const current = readStoredIds();
            if (current.includes(id)) return true;
            if (current.length >= MAX_COMPARE_ITEMS) {
                openReplaceModal(id);
                return false;
            }
            current.push(id);
            writeStoredIds(current);
            reconcileCompareUI();
            return true;
        },
        remove: (id, focusTargetSelector) => {
            const current = readStoredIds().filter(existing => existing !== id);
            writeStoredIds(current);
            reconcileCompareUI(focusTargetSelector);
        },
        replace: (oldId, newId) => {
            if (!trekWhitelist[newId]) return;
            const current = readStoredIds();
            const index = current.indexOf(oldId);
            if (index !== -1) {
                current[index] = newId;
            } else if (current.length < MAX_COMPARE_ITEMS) {
                current.push(newId);
            }
            writeStoredIds(current);
            reconcileCompareUI();
        },
        clear: () => {
            writeStoredIds([]);
            reconcileCompareUI();
        },
        buildCompareUrl: buildCompareUrl,
        reconcile: reconcileCompareUI
    };

    // Reconcile DOM elements (Buttons, Tray, Badges, Links)
    function reconcileCompareUI(focusTargetSelector) {
        const ids = readStoredIds();
        const count = ids.length;

        // 1. Reconcile all Compare toggle buttons
        document.querySelectorAll('.website-compare-btn[data-trek-id]').forEach(btn => {
            const id = btn.getAttribute('data-trek-id');
            const trek = trekWhitelist[id];
            const trekName = trek ? trek.name : 'this trek';
            const inCompare = ids.includes(id);

            btn.setAttribute('aria-pressed', inCompare ? 'true' : 'false');

            const compareSvg = `<svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="18"></rect><rect x="14" y="3" width="7" height="18"></rect></svg>`;
            const checkSvg = `<svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg>`;

            if (inCompare) {
                btn.classList.add('is-in-compare');
                btn.setAttribute('aria-label', `Remove ${trekName} from comparison`);
                btn.innerHTML = `${checkSvg}<span>In Compare</span>`;
            } else {
                btn.classList.remove('is-in-compare');
                btn.setAttribute('aria-label', `Add ${trekName} to comparison`);
                const isDetail = btn.closest('.website-detail-sidebar') || btn.closest('.website-hero-detail') || btn.getAttribute('data-compare-long') !== null;
                const label = isDetail ? 'Add to Compare' : 'Compare';
                btn.innerHTML = `${compareSvg}<span>${label}</span>`;
            }
        });

        // 2. Reconcile Header and Mobile Bar Count Badges and Links
        document.querySelectorAll('.website-compare-count').forEach(badge => {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'inline-flex' : 'none';
        });

        document.querySelectorAll('a[href*="/compare-treks"], a[aria-label*="Compare"]').forEach(link => {
            // Avoid modifying internal tray compare links or card compare buttons
            if (link.id !== 'website-compare-tray-cta' && !link.classList.contains('website-compare-btn')) {
                link.href = buildCompareUrl(ids);
            }
        });

        // 3. Reconcile Bottom Comparison Tray
        const tray = document.getElementById('website-compare-tray');
        const trayCount = document.getElementById('website-compare-tray-count');
        const trayGuidance = document.getElementById('website-compare-tray-guidance');
        const trayCta = document.getElementById('website-compare-tray-cta');
        const trayItems = document.getElementById('website-compare-tray-items');

        if (tray) {
            if (count === 0) {
                tray.style.display = 'none';
                document.body.classList.remove('has-compare-tray');
            } else {
                tray.style.display = 'block';
                document.body.classList.add('has-compare-tray');

                if (trayCount) trayCount.textContent = count;

                if (trayGuidance) {
                    if (count === 1) {
                        trayGuidance.textContent = 'Select at least 2 treks to compare side-by-side';
                    } else {
                        trayGuidance.textContent = 'Ready to compare side-by-side';
                    }
                }

                if (trayCta) {
                    trayCta.href = buildCompareUrl(ids);
                    if (count === 1) {
                        trayCta.textContent = 'Compare (1 Selected)';
                        trayCta.setAttribute('title', 'View comparison page and explore additional treks to add');
                    } else {
                        trayCta.textContent = `Compare ${count} Treks`;
                        trayCta.removeAttribute('title');
                    }
                }

                if (trayItems) {
                    trayItems.innerHTML = '';
                    ids.forEach(id => {
                        const trek = trekWhitelist[id] || { name: id, duration: '' };
                        const chip = document.createElement('div');
                        chip.className = 'website-compare-tray__chip';
                        chip.setAttribute('role', 'listitem');
                        chip.innerHTML = `
                            <strong>${trek.name}</strong>
                            <span>(${trek.duration || ''})</span>
                            <button type="button"
                                    class="website-compare-tray__remove"
                                    data-remove-id="${id}"
                                    aria-label="Remove ${trek.name} from comparison">
                                &times;
                            </button>
                        `;

                        chip.querySelector('.website-compare-tray__remove')?.addEventListener('click', (e) => {
                            e.preventDefault();
                            WebsiteCompare.remove(id, '#website-compare-clear-btn');
                        });

                        trayItems.appendChild(chip);
                    });
                }
            }
        }

        // Focus restoration if specified
        if (focusTargetSelector) {
            const target = document.querySelector(focusTargetSelector);
            if (target && typeof target.focus === 'function') {
                target.focus();
            }
        }
    }

    // Attach delegated click listener for compare buttons
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.website-compare-btn[data-trek-id]');
        if (btn) {
            e.preventDefault();
            const id = btn.getAttribute('data-trek-id');
            if (WebsiteCompare.has(id)) {
                WebsiteCompare.remove(id);
            } else {
                WebsiteCompare.add(id);
            }
        }
    });

    // Clear All button in tray
    document.getElementById('website-compare-clear-btn')?.addEventListener('click', (e) => {
        e.preventDefault();
        WebsiteCompare.clear();
    });

    // Multi-tab synchronization
    window.addEventListener('storage', (e) => {
        if (e.key === EATH_COMPARE_KEY) {
            reconcileCompareUI();
        }
    });

    // URL parameter synchronization when on compare page
    if (window.location.pathname.includes('/compare-treks') || window.location.pathname.endsWith('/compare')) {
        const urlParams = new URLSearchParams(window.location.search);
        const queryTreks = urlParams.getAll('treks[]').concat(urlParams.getAll('treks'));

        if (urlParams.get('clear') === '1') {
            writeStoredIds([]);
        } else if (queryTreks.length > 0) {
            // Authoritative query IDs synchronize storage
            const validQueryIds = [];
            for (const id of queryTreks) {
                if (trekWhitelist[id] && !validQueryIds.includes(id)) {
                    validQueryIds.push(id);
                    if (validQueryIds.length === MAX_COMPARE_ITEMS) break;
                }
            }
            writeStoredIds(validQueryIds);
        }
    }

    // Differences Toggle on Compare Page (Phase 09)
    const diffToggle = document.getElementById('website-toggle-diffs');
    const compareTable = document.getElementById('website-compare-table');
    const diffStatus = document.getElementById('website-diff-status');

    if (diffToggle && compareTable) {
        diffToggle.addEventListener('change', () => {
            if (diffToggle.checked) {
                compareTable.classList.add('show-diffs-only');
                if (diffStatus) {
                    const diffRows = compareTable.querySelectorAll('tbody tr[data-different="true"]').length;
                    diffStatus.textContent = `Showing ${diffRows} metrics with differences only`;
                }
            } else {
                compareTable.classList.remove('show-diffs-only');
                if (diffStatus) {
                    const allRows = compareTable.querySelectorAll('tbody tr[data-different]').length;
                    diffStatus.textContent = `Showing all ${allRows} comparison metrics`;
                }
            }
        });
    }

    // Compare Page Clear Action
    document.getElementById('website-compare-page-clear')?.addEventListener('click', () => {
        WebsiteCompare.clear();
    });

    // =========================================================================
    // 4. Homepage In-Place Travel by Month Tab Switcher
    // =========================================================================
    const monthTabs = document.querySelectorAll('.website-month-grid__btn[data-month-target]');
    monthTabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = tab.getAttribute('data-month-target');
            if (!targetId) return;

            // Update active states on tabs
            monthTabs.forEach(t => {
                t.classList.remove('is-selected');
                t.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('is-selected');
            tab.setAttribute('aria-selected', 'true');

            // Switch active panel in-place
            const allPanels = document.querySelectorAll('.website-month-panel');
            allPanels.forEach(panel => {
                panel.style.display = 'none';
                panel.classList.remove('is-active');
            });

            const targetPanel = document.getElementById(targetId);
            if (targetPanel) {
                targetPanel.style.display = 'block';
                targetPanel.classList.add('is-active');
            }
        });
    });

    // =========================================================================
    // 5. Seamless AJAX Region Filtering & Catalog Navigation (No Page Refresh)
    // =========================================================================
    let isCatalogFetching = false;

    async function loadTreksCatalog(url, pushState = true) {
        if (isCatalogFetching) return;
        const regionNav = document.getElementById('website-region-nav');
        const curatedSection = document.getElementById('website-curated-journeys-section') || document.querySelector('section[aria-labelledby="journey-list-heading"]');
        const summaryBar = document.getElementById('website-filter-sidebar');

        if (!curatedSection) {
            window.location.href = url;
            return;
        }

        isCatalogFetching = true;
        curatedSection.style.transition = 'opacity 0.18s ease';
        curatedSection.style.opacity = '0.45';
        curatedSection.style.pointerEvents = 'none';

        const preservedScrollY = window.scrollY;

        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                window.location.href = url;
                return;
            }

            const html = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            // 1. Update Region Navigation Tabs
            const newRegionNav = doc.getElementById('website-region-nav');
            if (regionNav && newRegionNav) {
                regionNav.innerHTML = newRegionNav.innerHTML;
            }

            // 2. Update Curated Journeys Section (Cards + Sorting + Pagination + Empty state)
            const newCuratedSection = doc.getElementById('website-curated-journeys-section') || doc.querySelector('section[aria-labelledby="journey-list-heading"]');
            if (curatedSection && newCuratedSection) {
                curatedSection.innerHTML = newCuratedSection.innerHTML;
            }

            // 3. Update Summary Bar if present
            const newSummaryBar = doc.getElementById('website-filter-sidebar');
            if (summaryBar && newSummaryBar) {
                summaryBar.innerHTML = newSummaryBar.innerHTML;
            }

            // 4. Update browser URL history without reloading
            if (pushState) {
                window.history.pushState({ catalogUrl: url }, '', url);
            }

            // 5. Reconcile comparison tray states for newly inserted trek cards
            if (window.WebsiteCompare && typeof window.WebsiteCompare.reconcile === 'function') {
                window.WebsiteCompare.reconcile();
            }

            // Guarantee zero page movement on tab click
            window.scrollTo({
                top: preservedScrollY,
                left: 0,
                behavior: 'instant'
            });

        } catch (err) {
            console.error('AJAX catalog filter error, falling back to direct navigation:', err);
            window.location.href = url;
        } finally {
            curatedSection.style.opacity = '1';
            curatedSection.style.pointerEvents = '';
            isCatalogFetching = false;
        }
    }

    // =========================================================================
    // 5.1 Seamless In-Place Travel Guide Tab Switching & Filtering (Zero Refresh, Zero Move)
    // =========================================================================
    let isTravelGuideFetching = false;

    async function loadTravelGuide(url, pushState = true) {
        if (isTravelGuideFetching) return;
        const filterWrap = document.getElementById('website-guide-filter-wrap');
        const featuredWrap = document.getElementById('website-guide-featured-wrap');
        const catalogSection = document.getElementById('website-guide-catalog-section');

        if (!catalogSection) {
            window.location.href = url;
            return;
        }

        // STRICT REQUIREMENT: Capture exact scroll position so the page NEVER moves
        const preservedScrollY = window.scrollY;
        isTravelGuideFetching = true;

        // Subtle opacity transition on content for instant visual responsiveness
        if (catalogSection) {
            catalogSection.style.transition = 'opacity 0.12s ease';
            catalogSection.style.opacity = '0.45';
            catalogSection.style.pointerEvents = 'none';
        }
        if (featuredWrap) {
            featuredWrap.style.transition = 'opacity 0.12s ease';
            featuredWrap.style.opacity = '0.45';
        }

        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                window.location.href = url;
                return;
            }

            const html = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            // 1. Update Topic Filter Hub (Search form + topic tabs)
            const newFilterWrap = doc.getElementById('website-guide-filter-wrap');
            if (filterWrap && newFilterWrap) {
                filterWrap.innerHTML = newFilterWrap.innerHTML;
            }

            // 2. Update Featured Dispatch
            const newFeaturedWrap = doc.getElementById('website-guide-featured-wrap');
            if (featuredWrap && newFeaturedWrap) {
                featuredWrap.innerHTML = newFeaturedWrap.innerHTML;
            }

            // 3. Update Guides Catalog Section (Count, filtered badge, cards grid, pagination, empty state)
            const newCatalogSection = doc.getElementById('website-guide-catalog-section');
            if (catalogSection && newCatalogSection) {
                catalogSection.innerHTML = newCatalogSection.innerHTML;
            }

            // 4. Update browser URL history without reloading
            if (pushState) {
                window.history.pushState({ travelGuideUrl: url }, '', url);
            }

            // 5. Enforce ZERO page movement: instantly restore preserved scroll position
            window.scrollTo({
                top: preservedScrollY,
                left: 0,
                behavior: 'instant'
            });

        } catch (err) {
            console.error('Travel guide tab filter error, falling back to direct navigation:', err);
            window.location.href = url;
        } finally {
            if (catalogSection) {
                catalogSection.style.opacity = '1';
                catalogSection.style.pointerEvents = '';
            }
            if (featuredWrap) {
                featuredWrap.style.opacity = '1';
            }
            isTravelGuideFetching = false;

            // Frame guard: Ensure no layout shift or scroll drift after repaint
            requestAnimationFrame(() => {
                if (Math.abs(window.scrollY - preservedScrollY) > 1) {
                    window.scrollTo({
                        top: preservedScrollY,
                        left: 0,
                        behavior: 'instant'
                    });
                }
            });
        }
    }

    // Delegated click handler for Region Tabs, Travel Guide Tabs, Pagination, and Filter Chips
    document.addEventListener('click', (e) => {
        // A. Travel Guide Topic Tab clicked (.website-guide-topic-btn)
        const topicBtn = e.target.closest('.website-guide-topic-btn');
        if (topicBtn && topicBtn.href) {
            e.preventDefault();
            const targetUrl = topicBtn.href;

            // Optimistic UI state: highlight clicked button immediately
            const allTopicBtns = document.querySelectorAll('.website-guide-topic-btn');
            allTopicBtns.forEach(btn => {
                btn.classList.remove('is-active');
                btn.setAttribute('aria-current', 'false');
                btn.setAttribute('aria-selected', 'false');
            });
            topicBtn.classList.add('is-active');
            topicBtn.setAttribute('aria-current', 'page');
            topicBtn.setAttribute('aria-selected', 'true');

            loadTravelGuide(targetUrl, true);
            return;
        }

        // B. Travel Guide Reset Filter or Clear Search link clicked
        const guideResetOrClear = e.target.closest('.website-guide-reset-link, .website-guide-clear-search');
        if (guideResetOrClear && guideResetOrClear.href) {
            e.preventDefault();
            loadTravelGuide(guideResetOrClear.href, true);
            return;
        }

        // C. Travel Guide Pillar card clicked (6 Pillars of Himalayan Trekking)
        const pillarCard = e.target.closest('.website-pillar-card');
        if (pillarCard && pillarCard.hasAttribute('href') && document.getElementById('website-guide-catalog-section')) {
            e.preventDefault();
            loadTravelGuide(pillarCard.href, true);
            return;
        }

        // D. Travel Guide Pagination link clicked
        const guidePaginationLink = e.target.closest('#website-guide-catalog-section nav a');
        if (guidePaginationLink && guidePaginationLink.href) {
            e.preventDefault();
            loadTravelGuide(guidePaginationLink.href, true);
            return;
        }

        // E. Catalog Region filter pill clicked
        const regionLink = e.target.closest('#website-region-nav a');
        if (regionLink) {
            e.preventDefault();
            const targetUrl = regionLink.href;

            // Optimistic UI state: highlight clicked button immediately
            const allPills = document.querySelectorAll('#website-region-nav .website-filter-pill');
            allPills.forEach(p => p.classList.remove('is-selected'));
            regionLink.classList.add('is-selected');

            loadTreksCatalog(targetUrl, true);
            return;
        }

        // F. Pagination link clicked inside catalog (zero jump)
        const paginationLink = e.target.closest('.website-pagination a');
        if (paginationLink) {
            e.preventDefault();
            loadTreksCatalog(paginationLink.href, true);
            return;
        }

        // G. Filter summary chips or Clear all clicked inside filter bar
        const filterChip = e.target.closest('#website-filter-sidebar a');
        if (filterChip) {
            e.preventDefault();
            loadTreksCatalog(filterChip.href, true);
            return;
        }
    });

    // Delegated change handler for Catalog Sort Select dropdown
    document.addEventListener('change', (e) => {
        if (e.target && e.target.id === 'listing-sort') {
            const form = e.target.closest('form');
            if (form) {
                e.preventDefault();
                const formData = new FormData(form);
                const params = new URLSearchParams(formData);
                const baseUrl = (form.getAttribute('action') || window.location.href).split('?')[0].split('#')[0];
                const newUrl = baseUrl + '?' + params.toString();
                loadTreksCatalog(newUrl, true);
            }
        }
    });

    // Delegated submit handler for catalog sorting and travel guide search forms
    document.addEventListener('submit', (e) => {
        // 1. Travel Guide search form
        const guideSearchForm = e.target.closest('.website-guide-search-form');
        if (guideSearchForm && document.getElementById('website-guide-catalog-section')) {
            e.preventDefault();
            const formData = new FormData(guideSearchForm);
            const params = new URLSearchParams();
            for (const [key, value] of formData.entries()) {
                if (value && typeof value === 'string' && value.trim()) {
                    params.append(key, value.trim());
                }
            }
            const baseUrl = (guideSearchForm.getAttribute('action') || window.location.pathname).split('?')[0];
            const targetUrl = baseUrl + (params.toString() ? ('?' + params.toString()) : '');
            loadTravelGuide(targetUrl, true);
            return;
        }

        // 2. Catalog sorting form
        const form = e.target.closest('#website-listing-sort-form');
        if (form) {
            e.preventDefault();
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);
            const baseUrl = (form.getAttribute('action') || window.location.href).split('?')[0].split('#')[0];
            const newUrl = baseUrl + '?' + params.toString();
            loadTreksCatalog(newUrl, true);
        }
    });

    // Handle browser Back and Forward navigation without reload
    window.addEventListener('popstate', () => {
        if (document.getElementById('website-region-nav')) {
            loadTreksCatalog(window.location.href, false);
        }
        if (document.getElementById('website-guide-catalog-section')) {
            loadTravelGuide(window.location.href, false);
        }
    });

    // =========================================================================
    // 6. Fixed Departure Planning Wizard Modal
    // =========================================================================
    const wizardModal = document.getElementById('website-departure-wizard-modal');
    const wizardBackdrop = document.getElementById('website-departure-wizard-backdrop');
    const wizardCloseBtn = document.getElementById('website-departure-wizard-close');
    const wizardCancelBtn = document.getElementById('wizard-btn-cancel');
    const wizardDoneBtn = document.getElementById('wizard-btn-done');
    const wizardPrevBtn = document.getElementById('wizard-btn-prev');
    const wizardNextBtn = document.getElementById('wizard-btn-next');
    const wizardProgressBar = document.getElementById('wizard-progress-bar');
    const wizardStepEyebrow = document.getElementById('wizard-step-eyebrow');
    const wizardErrorBanner = document.getElementById('wizard-error-banner');
    const wizardErrorText = document.getElementById('wizard-error-text');
    const wizardFooterActions = document.getElementById('wizard-footer-actions');
    const wizardFooterSuccess = document.getElementById('wizard-footer-success');
    const wizardBody = document.querySelector('.website-departure-wizard__body');

    let currentStep = 1;
    let activeDeparture = {
        id: '',
        trekId: '',
        trekName: 'Everest Base Camp Trek',
        trekSlug: '',
        startDate: '18 SEP 2026',
        duration: '15 Days',
        region: 'Everest',
        difficulty: 'Moderate',
        price: 1850,
        plannerUrl: ''
    };

    function formatUsd(amount) {
        return '$' + Number(amount).toLocaleString('en-US');
    }

    function calculateTotal() {
        const adults = parseInt(document.getElementById('wizard-adults')?.value, 10) || 1;
        const children = parseInt(document.getElementById('wizard-children')?.value, 10) || 0;
        const baseRate = activeDeparture.price || 1850;

        const rooming = document.querySelector('input[name="wizard_rooming"]:checked')?.value || 'twin';
        const roomingSupplement = rooming === 'private' ? (adults * 250) : 0;

        const porter = document.getElementById('wizard_addon_porter')?.checked ? 180 : 0;
        const gear = document.getElementById('wizard_addon_gear')?.checked ? (adults * 45) : 0;
        const tour = document.getElementById('wizard_addon_tour')?.checked ? ((adults + children) * 65) : 0;

        // Youth rate 75% of adult rate
        const youthRate = Math.round(baseRate * 0.75);
        const baseTotal = (adults * baseRate) + (children * youthRate);
        const grandTotal = baseTotal + roomingSupplement + porter + gear + tour;

        const subtotalEl = document.getElementById('wizard-step1-subtotal');
        if (subtotalEl) {
            subtotalEl.textContent = formatUsd(grandTotal) + ' USD';
        }

        const reviewTotalEl = document.getElementById('review-total-price');
        if (reviewTotalEl) {
            reviewTotalEl.textContent = formatUsd(grandTotal).replace('$', '');
        }

        return {
            adults,
            children,
            baseRate,
            rooming,
            roomingSupplement,
            porter,
            gear,
            tour,
            baseTotal,
            grandTotal
        };
    }

    function openDepartureWizard(depData) {
        if (!wizardModal) return;

        activeDeparture = {
            id: depData.departureId || '',
            trekId: depData.trekId || '',
            trekName: depData.trekName || 'Himalayan Trek',
            trekSlug: depData.trekSlug || '',
            startDate: depData.startDate || 'SEP 2026',
            duration: depData.duration || '15 Days',
            region: depData.region || 'Himalayas',
            difficulty: depData.difficulty || 'Moderate',
            price: parseInt(depData.price, 10) || 1850,
            plannerUrl: depData.plannerUrl || '#'
        };

        // Populate context banner
        const depTitleEl = document.getElementById('wizard-dep-title');
        const depDateEl = document.getElementById('wizard-dep-date');
        const depDurationEl = document.getElementById('wizard-dep-duration');
        const depRegionEl = document.getElementById('wizard-dep-region');
        const depRateEl = document.getElementById('wizard-dep-rate');
        const fullPlannerBtn = document.getElementById('wizard-btn-full-planner');

        if (depTitleEl) depTitleEl.textContent = activeDeparture.trekName;
        if (depDateEl) depDateEl.textContent = activeDeparture.startDate;
        if (depDurationEl) depDurationEl.textContent = activeDeparture.duration;
        if (depRegionEl) depRegionEl.textContent = activeDeparture.region;
        if (depRateEl) depRateEl.textContent = formatUsd(activeDeparture.price);
        if (fullPlannerBtn && activeDeparture.plannerUrl) {
            fullPlannerBtn.setAttribute('href', activeDeparture.plannerUrl);
        }

        // Reset wizard form fields
        const adultsInput = document.getElementById('wizard-adults');
        const childrenInput = document.getElementById('wizard-children');
        if (adultsInput) adultsInput.value = '2';
        if (childrenInput) childrenInput.value = '0';

        // Reset radio buttons
        const twinRadio = document.querySelector('input[name="wizard_rooming"][value="twin"]');
        if (twinRadio) {
            twinRadio.checked = true;
            document.querySelectorAll('input[name="wizard_rooming"]').forEach(radio => {
                const card = radio.closest('.website-wizard-option-card');
                if (card) card.classList.toggle('is-active', radio.value === 'twin');
            });
        }

        const firstExpRadio = document.querySelector('input[name="wizard_experience"][value="first_time"]');
        if (firstExpRadio) {
            firstExpRadio.checked = true;
            document.querySelectorAll('input[name="wizard_experience"]').forEach(radio => {
                const card = radio.closest('.website-wizard-option-card');
                if (card) card.classList.toggle('is-active', radio.value === 'first_time');
            });
        }

        // Uncheck addons
        ['wizard_addon_porter', 'wizard_addon_gear', 'wizard_addon_tour'].forEach(id => {
            const chk = document.getElementById(id);
            if (chk) {
                chk.checked = false;
                const card = chk.closest('.website-wizard-addon-card');
                if (card) card.classList.remove('is-active');
            }
        });

        // Reset contact fields
        ['wizard-contact-name', 'wizard-contact-email', 'wizard-contact-phone', 'wizard-contact-notes'].forEach(id => {
            const input = document.getElementById(id);
            if (input) input.value = '';
        });
        const countrySelect = document.getElementById('wizard-contact-country');
        if (countrySelect) countrySelect.selectedIndex = 0;

        hideError();
        calculateTotal();

        // Start at step 1
        setStep(1);

        wizardModal.style.display = 'flex';
        wizardModal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closeDepartureWizard() {
        if (!wizardModal) return;
        wizardModal.classList.remove('is-open');
        wizardModal.style.display = 'none';
        document.body.style.overflow = '';
        hideError();
    }

    function showError(msg) {
        if (!wizardErrorBanner || !wizardErrorText) return;
        wizardErrorText.textContent = msg;
        wizardErrorBanner.style.display = 'block';
        wizardBody?.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function hideError() {
        if (wizardErrorBanner) {
            wizardErrorBanner.style.display = 'none';
        }
    }

    function setStep(step) {
        currentStep = step;
        hideError();

        // Update Eyebrow according to Background-Free & Border-Free rule
        const stepLabels = {
            1: 'STEP 01 · PARTY & ROOMING',
            2: 'STEP 02 · TREKKING PREFERENCES',
            3: 'STEP 03 · LEAD CONTACT',
            4: 'STEP 04 · REVIEW & CONFIRMATION',
            5: 'PLANNING REQUEST CONFIRMED'
        };

        if (wizardStepEyebrow) {
            wizardStepEyebrow.textContent = stepLabels[step] || ('STEP ' + step);
        }

        if (wizardProgressBar) {
            const progressPercentages = { 1: '25%', 2: '50%', 3: '75%', 4: '100%', 5: '100%' };
            wizardProgressBar.style.width = progressPercentages[step] || '25%';
            if (step === 5) {
                wizardProgressBar.style.backgroundColor = '#16a34a';
            } else {
                wizardProgressBar.style.backgroundColor = 'var(--color-accent)';
            }
        }

        // Show corresponding step panel, hide others
        for (let i = 1; i <= 5; i++) {
            const stepEl = document.getElementById('wizard-step-' + i);
            if (stepEl) {
                stepEl.style.display = (i === step) ? 'block' : 'none';
            }
        }

        // Manage footer controls
        if (step <= 4) {
            if (wizardFooterActions) wizardFooterActions.style.display = 'flex';
            if (wizardFooterSuccess) wizardFooterSuccess.style.display = 'none';

            if (wizardPrevBtn) {
                wizardPrevBtn.style.display = (step > 1) ? 'inline-block' : 'none';
            }

            if (wizardNextBtn) {
                if (step === 1) wizardNextBtn.innerHTML = 'Continue to Preferences &rarr;';
                else if (step === 2) wizardNextBtn.innerHTML = 'Continue to Contact &rarr;';
                else if (step === 3) wizardNextBtn.innerHTML = 'Review Trip Summary &rarr;';
                else if (step === 4) wizardNextBtn.innerHTML = 'Submit Planning Request &check;';
            }
        } else {
            // Step 5 Confirmation
            if (wizardFooterActions) wizardFooterActions.style.display = 'none';
            if (wizardFooterSuccess) wizardFooterSuccess.style.display = 'flex';
        }

        wizardBody?.scrollTo({ top: 0, behavior: 'instant' });
    }

    function populateReviewStep() {
        const pricing = calculateTotal();
        const trekReviewName = document.getElementById('review-trek-name');
        const trekReviewDate = document.getElementById('review-trek-date');
        const partyReviewSize = document.getElementById('review-party-size');
        const roomingReviewChoice = document.getElementById('review-rooming-choice');
        const leadReviewName = document.getElementById('review-lead-name');
        const leadReviewContact = document.getElementById('review-lead-contact');
        const experienceReview = document.getElementById('review-experience');
        const dietReview = document.getElementById('review-diet');
        const addonsReviewList = document.getElementById('review-addons-list');

        if (trekReviewName) trekReviewName.textContent = activeDeparture.trekName;
        if (trekReviewDate) trekReviewDate.textContent = activeDeparture.startDate + ' · ' + activeDeparture.duration;

        let partyText = pricing.adults + ' Adult' + (pricing.adults > 1 ? 's' : '');
        if (pricing.children > 0) {
            partyText += ', ' + pricing.children + ' Youth (<18)';
        }
        if (partyReviewSize) partyReviewSize.textContent = partyText;

        if (roomingReviewChoice) {
            roomingReviewChoice.textContent = pricing.rooming === 'private'
                ? 'Private Single Room (+$250/pers)'
                : 'Twin Share Standard (Included)';
        }

        const nameVal = document.getElementById('wizard-contact-name')?.value.trim() || 'Alex Morgan';
        const emailVal = document.getElementById('wizard-contact-email')?.value.trim() || 'alex@example.com';
        const phoneVal = document.getElementById('wizard-contact-phone')?.value.trim() || '';
        const countryVal = document.getElementById('wizard-contact-country')?.value || 'International';

        if (leadReviewName) leadReviewName.textContent = nameVal;
        if (leadReviewContact) leadReviewContact.textContent = emailVal + (phoneVal ? ' · ' + phoneVal : '') + ' (' + countryVal + ')';

        const expRadio = document.querySelector('input[name="wizard_experience"]:checked');
        const expMap = {
            'first_time': 'First Time (Conservative Pace)',
            'moderate': 'Experienced Hiker (3,000m+)',
            'veteran': 'High Altitude Veteran (5,000m+)'
        };
        if (experienceReview) experienceReview.textContent = expMap[expRadio?.value] || 'First Time';

        const dietSelect = document.getElementById('wizard-diet');
        if (dietReview && dietSelect) {
            dietReview.textContent = dietSelect.options[dietSelect.selectedIndex]?.text.split('(')[0].trim() || 'Standard Fresh';
        }

        // Addons summary
        const selectedAddons = [];
        if (document.getElementById('wizard_addon_porter')?.checked) {
            selectedAddons.push('Dedicated Personal Porter (+$180 USD)');
        }
        if (document.getElementById('wizard_addon_gear')?.checked) {
            selectedAddons.push('Alpine Down Jacket & Sleeping Bag Rental (+$' + (pricing.adults * 45) + ' USD)');
        }
        if (document.getElementById('wizard_addon_tour')?.checked) {
            selectedAddons.push('Kathmandu Heritage & Sacred Temple Tour (+$' + ((pricing.adults + pricing.children) * 65) + ' USD)');
        }

        if (addonsReviewList) {
            if (selectedAddons.length > 0) {
                addonsReviewList.innerHTML = selectedAddons.map(item => '<div>&bull; ' + item + '</div>').join('');
            } else {
                addonsReviewList.textContent = 'No extra optional services selected (Standard trail team included)';
            }
        }
    }

    function submitDepartureWizard() {
        if (!wizardNextBtn) return;
        wizardNextBtn.disabled = true;
        wizardNextBtn.innerHTML = 'Securing Request...';

        setTimeout(() => {
            wizardNextBtn.disabled = false;

            // Generate unique reference code
            const randomDigits = Math.floor(1000 + Math.random() * 9000);
            const refCode = 'EATH-2026-SEP-' + randomDigits;

            const confirmRefCode = document.getElementById('confirm-ref-code');
            const confirmTrekName = document.getElementById('confirm-trek-name');
            const confirmTrekDate = document.getElementById('confirm-trek-date');
            const confirmEmailRecipient = document.getElementById('confirm-email-recipient');

            if (confirmRefCode) confirmRefCode.textContent = refCode;
            if (confirmTrekName) confirmTrekName.textContent = activeDeparture.trekName;
            if (confirmTrekDate) confirmTrekDate.textContent = activeDeparture.startDate;

            const emailVal = document.getElementById('wizard-contact-email')?.value.trim();
            if (confirmEmailRecipient) {
                confirmEmailRecipient.textContent = emailVal || 'your provided email address';
            }

            setStep(5);
        }, 450);
    }

    // Attach listeners for Plan This Date triggers
    document.querySelectorAll('[data-departure-wizard-trigger]').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const dataset = btn.dataset;
            openDepartureWizard({
                departureId: dataset.departureId,
                trekId: dataset.trekId,
                trekName: dataset.trekName,
                trekSlug: dataset.trekSlug,
                startDate: dataset.startDate,
                duration: dataset.duration,
                region: dataset.region,
                difficulty: dataset.difficulty,
                price: dataset.price,
                plannerUrl: dataset.plannerUrl
            });
        });
    });

    // Close buttons & modal controls
    wizardCloseBtn?.addEventListener('click', closeDepartureWizard);
    wizardCancelBtn?.addEventListener('click', closeDepartureWizard);
    wizardDoneBtn?.addEventListener('click', closeDepartureWizard);
    wizardBackdrop?.addEventListener('click', closeDepartureWizard);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && wizardModal?.classList.contains('is-open')) {
            closeDepartureWizard();
        }
    });

    // Quantity counter buttons
    document.querySelectorAll('.website-counter-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const action = btn.dataset.counterAction;
            const targetId = btn.dataset.counterTarget;
            const input = document.getElementById(targetId);
            if (!input) return;

            let val = parseInt(input.value, 10) || 0;
            const min = parseInt(input.min, 10) || 0;
            const max = parseInt(input.max, 10) || 10;

            if (action === 'inc' && val < max) {
                val++;
            } else if (action === 'dec' && val > min) {
                val--;
            }

            input.value = String(val);
            calculateTotal();
        });
    });

    // Radio option card selection
    document.querySelectorAll('.website-wizard-option-card').forEach(card => {
        card.addEventListener('click', () => {
            const radio = card.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
                const name = radio.name;
                document.querySelectorAll(`input[name="${name}"]`).forEach(otherRadio => {
                    const otherCard = otherRadio.closest('.website-wizard-option-card');
                    if (otherCard) {
                        otherCard.classList.toggle('is-active', otherRadio.checked);
                    }
                });
                calculateTotal();
            }
        });
    });

    // Addon checkbox cards
    document.querySelectorAll('.website-wizard-addon-card').forEach(card => {
        card.addEventListener('click', (e) => {
            const chk = card.querySelector('input[type="checkbox"]');
            if (chk && e.target !== chk) {
                chk.checked = !chk.checked;
            }
            card.classList.toggle('is-active', chk ? chk.checked : false);
            calculateTotal();
        });
    });

    // Navigation buttons
    wizardPrevBtn?.addEventListener('click', () => {
        if (currentStep > 1) {
            setStep(currentStep - 1);
        }
    });

    wizardNextBtn?.addEventListener('click', () => {
        if (currentStep === 1) {
            const adults = parseInt(document.getElementById('wizard-adults')?.value, 10) || 0;
            if (adults < 1) {
                showError('At least 1 adult trekker is required to plan a departure.');
                return;
            }
            setStep(2);
        } else if (currentStep === 2) {
            setStep(3);
        } else if (currentStep === 3) {
            const nameInput = document.getElementById('wizard-contact-name');
            const emailInput = document.getElementById('wizard-contact-email');
            const phoneInput = document.getElementById('wizard-contact-phone');
            const countrySelect = document.getElementById('wizard-contact-country');

            const name = nameInput?.value.trim();
            const email = emailInput?.value.trim();
            const phone = phoneInput?.value.trim();
            const country = countrySelect?.value;

            if (!name) {
                showError('Please enter the full name of the lead trekker.');
                nameInput?.focus();
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) {
                showError('Please enter a valid email address.');
                emailInput?.focus();
                return;
            }

            if (!phone) {
                showError('Please enter your WhatsApp or mobile phone number.');
                phoneInput?.focus();
                return;
            }

            if (!country) {
                showError('Please select your country of residence.');
                countrySelect?.focus();
                return;
            }

            hideError();
            populateReviewStep();
            setStep(4);
        } else if (currentStep === 4) {
            submitDepartureWizard();
        }
    });

    // =========================================================================
    // 7. Save Trek Bookmark Toggle
    // =========================================================================
    const saveTrekBtn = document.getElementById('website-save-trek-btn');
    if (saveTrekBtn) {
        const trekId = saveTrekBtn.dataset.trekId;
        const SAVED_KEY = 'eath.website.saved_treks';
        const getSaved = () => {
            try { return JSON.parse(localStorage.getItem(SAVED_KEY) || '[]'); }
            catch(e) { return []; }
        };

        const updateSaveButtonUI = (isSaved) => {
            if (isSaved) {
                saveTrekBtn.classList.add('is-saved');
                saveTrekBtn.innerHTML = '<i class="fa-solid fa-bookmark" aria-hidden="true"></i><span>Saved</span>';
            } else {
                saveTrekBtn.classList.remove('is-saved');
                saveTrekBtn.innerHTML = '<i class="fa-regular fa-bookmark" aria-hidden="true"></i><span>Save Trek</span>';
            }
        };

        let saved = getSaved();
        updateSaveButtonUI(saved.includes(trekId));

        saveTrekBtn.addEventListener('click', (e) => {
            e.preventDefault();
            saved = getSaved();
            if (saved.includes(trekId)) {
                saved = saved.filter(id => id !== trekId);
                updateSaveButtonUI(false);
            } else {
                saved.push(trekId);
                updateSaveButtonUI(true);
            }
            localStorage.setItem(SAVED_KEY, JSON.stringify(saved));
        });
    }

    // -------------------------------------------------------------------------
    // 8. Elevation & Acclimatization Profile Interactive Chart Controller
    // -------------------------------------------------------------------------
    window.initElevationProfile = function(rootEl = document) {
        let chartCards = [];
        if (rootEl.classList && rootEl.classList.contains('website-elevation-card')) {
            chartCards = [rootEl];
        } else if (rootEl.querySelectorAll) {
            chartCards = Array.from(rootEl.querySelectorAll('.website-elevation-card'));
        }

        chartCards.forEach(chartCard => {
            if (chartCard.dataset.elevationInitialized === 'true') return;
            chartCard.dataset.elevationInitialized = 'true';

            const tooltip = chartCard.querySelector('.website-elevation-tooltip');
            const tooltipDay = chartCard.querySelector('.website-elevation-tooltip__day');
            const tooltipTitle = chartCard.querySelector('.website-elevation-tooltip__title');
            const tooltipRoute = chartCard.querySelector('.website-elevation-tooltip__route');
            const tooltipAlt = chartCard.querySelector('.website-elevation-tooltip__alt');
            const tooltipBadge = chartCard.querySelector('.website-elevation-tooltip__badge');
            const triggers = chartCard.querySelectorAll('.website-elevation-trigger');
            const nodes = chartCard.querySelectorAll('.website-elevation-node');
            const dayLabels = chartCard.querySelectorAll('.website-elevation-day-label');
            const dayItems = chartCard.querySelectorAll('.website-elevation-day-item');
            const vGuides = chartCard.querySelectorAll('.website-elevation-vguide');
            const chartWrapper = chartCard.querySelector('.website-elevation-card__chart-wrapper');

            const hideTooltip = () => {
                if (tooltip) {
                    tooltip.classList.remove('is-visible');
                }
                nodes.forEach(n => n.classList.remove('is-active'));
                dayLabels.forEach(l => l.classList.remove('is-active'));
                dayItems.forEach(i => i.classList.remove('is-active'));
                vGuides.forEach(g => { g.style.opacity = '0'; });
            };

            triggers.forEach(target => {
                const day = target.getAttribute('data-day');
                const title = target.getAttribute('data-title');
                const route = target.getAttribute('data-route');
                const alt = target.getAttribute('data-alt');
                const hours = target.getAttribute('data-hours');
                const isAcclimatization = target.getAttribute('data-acclimatization') === '1';

                const showTooltipAtTarget = () => {
                    if (!tooltip || !chartWrapper) return;

                    if (tooltipDay) tooltipDay.textContent = `Day ${day}`;
                    if (tooltipTitle) tooltipTitle.textContent = title;
                    if (tooltipRoute) tooltipRoute.textContent = route || '';
                    if (tooltipAlt) tooltipAlt.textContent = alt;

                    if (tooltipBadge) {
                        if (isAcclimatization) {
                            tooltipBadge.textContent = 'Acclimatization Rest Day';
                            tooltipBadge.style.display = 'inline-block';
                        } else if (hours) {
                            tooltipBadge.textContent = `Walking: ~${hours}`;
                            tooltipBadge.style.display = 'inline-block';
                        } else {
                            tooltipBadge.textContent = '';
                            tooltipBadge.style.display = 'none';
                        }
                    }

                    // Locate the elevation node on the graph curve for this day
                    const targetNode = chartCard.querySelector(`.website-elevation-node[data-day="${day}"]`) || target;
                    const nodeRect = targetNode.getBoundingClientRect();
                    const wrapperRect = chartWrapper.getBoundingClientRect();

                    const left = nodeRect.left - wrapperRect.left + (nodeRect.width / 2);
                    const top = nodeRect.top - wrapperRect.top;

                    // Make visible to accurately measure rendered dimensions
                    tooltip.classList.add('is-visible');

                    const tooltipWidth = tooltip.offsetWidth || 240;

                    // Clamping tooltip within wrapper boundaries
                    const halfWidth = tooltipWidth / 2;
                    const minLeft = halfWidth + 10;
                    const maxLeft = Math.max(minLeft, wrapperRect.width - halfWidth - 10);
                    const clampedLeft = Math.max(minLeft, Math.min(maxLeft, left));

                    // Always position on top above the node
                    tooltip.style.left = `${clampedLeft}px`;
                    tooltip.style.top = `${top}px`;

                    // Highlight active node, day label, day item, and vertical guideline
                    nodes.forEach(n => {
                        if (n.getAttribute('data-day') === day) {
                            n.classList.add('is-active');
                        } else {
                            n.classList.remove('is-active');
                        }
                    });
                    dayLabels.forEach(l => {
                        if (l.getAttribute('data-day') === day) {
                            l.classList.add('is-active');
                        } else {
                            l.classList.remove('is-active');
                        }
                    });
                    dayItems.forEach(i => {
                        if (i.getAttribute('data-day') === day) {
                            i.classList.add('is-active');
                        } else {
                            i.classList.remove('is-active');
                        }
                    });
                    vGuides.forEach(g => {
                        if (g.getAttribute('data-day') === day) {
                            g.style.opacity = '1';
                        } else {
                            g.style.opacity = '0';
                        }
                    });
                };

                target.addEventListener('mouseenter', showTooltipAtTarget);
                target.addEventListener('focus', showTooltipAtTarget);

                target.addEventListener('mouseleave', hideTooltip);
                target.addEventListener('blur', hideTooltip);

                // Click node or day item to scroll to day in itinerary and open details
                const handleDayAction = (e) => {
                    e.preventDefault();
                    const scope = chartCard.closest('.modal-content') || document;
                    const card = scope.querySelector(`#itinerary-day-${day}`) || document.getElementById(`itinerary-day-${day}`);
                    if (card) {
                        if (card.tagName.toLowerCase() === 'details') {
                            card.open = true;
                        }
                        card.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        // Highlight card temporarily
                        card.style.transition = 'border-color 0.3s ease, background-color 0.3s ease';
                        const origBg = card.style.backgroundColor;
                        const origBorder = card.style.borderColor;
                        card.style.borderColor = 'var(--color-primary)';
                        card.style.backgroundColor = 'var(--color-primary-soft, #e0f2fe)';
                        setTimeout(() => {
                            card.style.borderColor = origBorder;
                            card.style.backgroundColor = origBg;
                        }, 1200);
                    }
                };

                target.addEventListener('click', handleDayAction);
                target.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        handleDayAction(e);
                    }
                });
            });

            // Hide on touch outside
            document.addEventListener('touchstart', (e) => {
                if (!chartCard.contains(e.target)) {
                    hideTooltip();
                }
            });
        });
    };

    // Initialize any page-level elevation charts
    window.initElevationProfile(document);

    // Initial reconciliation
    reconcileCompareUI();
});
