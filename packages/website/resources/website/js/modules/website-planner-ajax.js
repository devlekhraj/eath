/**
 * Website Planner AJAX Module (SPA-style dynamic transitions for /plan-my-trek)
 *
 * Provides completely seamless AJAX-driven transitions for the interactive trek planner:
 * - Intercepts all form submissions within #planner-app (capturing submit buttons)
 * - Intercepts internal navigation links (/plan-my-trek*)
 * - Maintains browser history with history.pushState and popstate
 * - Smooth container swapping and scroll restoration
 * - Reinitializes step controls (timing mode, children age bands, accessibility focus)
 */

export function initWebsitePlannerAjax() {
    const rootId = 'planner-app';

    function getContainer() {
        return document.getElementById(rootId);
    }

    // If not currently on planner page and no container, return
    if (!getContainer() && !window.location.pathname.startsWith('/plan-my-trek')) {
        return;
    }

    let isFetching = false;

    function setContainerLoading(isLoading) {
        const container = getContainer();
        if (!container) return;
        if (isLoading) {
            container.style.opacity = '0.6';
            container.style.pointerEvents = 'none';
            container.style.transition = 'opacity 0.15s ease-in-out';
        } else {
            container.style.opacity = '1';
            container.style.pointerEvents = 'auto';
        }
    }

    function reinitializeStep(container) {
        if (!container) return;

        // 1. Reinitialize timing mode if radio buttons present
        const checkedTiming = container.querySelector('input[name="timing_mode"]:checked');
        if (checkedTiming && typeof window.updateTimingMode === 'function') {
            window.updateTimingMode(checkedTiming.value);
        }

        // 2. Reinitialize children age bands if children input present
        const childrenInput = container.querySelector('#field-children');
        if (childrenInput && typeof window.updateChildrenUI === 'function') {
            window.updateChildrenUI();
        }

        // 3. Accessibility focus management
        const errorSummary = container.querySelector('#planner-error-summary');
        if (errorSummary) {
            errorSummary.focus();
        } else {
            const stepHeading = container.querySelector('#planner-step-heading, h1');
            if (stepHeading) {
                stepHeading.focus();
            }
        }

        // 4. Trigger modal plugins if any (e.g. compare buttons or phone inputs)
        if (typeof window.reconcileCompareUI === 'function') {
            window.reconcileCompareUI();
        }
        if (typeof window.initModalPlugins === 'function') {
            window.initModalPlugins(container);
        }
    }

    async function swapContent(newHtml, newUrl, newTitle, pushState = true) {
        const currentContainer = getContainer();
        if (!currentContainer) return;

        // Parse HTML
        const parser = new DOMParser();
        const doc = parser.parseFromString(newHtml, 'text/html');
        const incomingContainer = doc.getElementById(rootId) || doc.querySelector('[data-planner-root]') || doc.querySelector('.website-container');

        if (!incomingContainer) {
            currentContainer.innerHTML = newHtml;
        } else {
            currentContainer.innerHTML = incomingContainer.innerHTML;
        }

        // Update title
        const incomingTitle = newTitle || (doc.querySelector('title') ? doc.querySelector('title').textContent : null);
        if (incomingTitle) {
            document.title = incomingTitle;
        }

        // Update URL
        if (newUrl && pushState && newUrl !== window.location.href) {
            window.history.pushState({ url: newUrl }, '', newUrl);
        }

        setContainerLoading(false);
        reinitializeStep(currentContainer);

        // Smooth scroll to container top
        const rect = currentContainer.getBoundingClientRect();
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const targetY = rect.top + scrollTop - 70;
        window.scrollTo({
            top: Math.max(0, targetY),
            behavior: 'smooth'
        });
    }

    async function fetchUrl(url, options = {}, pushState = true) {
        if (isFetching) return;
        isFetching = true;
        setContainerLoading(true);

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const headers = {
            'X-Requested-With': 'XMLHttpRequest',
            'X-Planner-Ajax': '1',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json, text/html',
            ...(options.headers || {})
        };

        try {
            const resp = await fetch(url, {
                ...options,
                headers,
                credentials: 'same-origin'
            });

            const contentType = resp.headers.get('content-type') || '';
            let data = null;

            if (contentType.includes('application/json')) {
                data = await resp.json();
            }

            if (!resp.ok) {
                // Check for 422 validation errors
                if (resp.status === 422 && data && data.errors) {
                    renderValidationErrors(data.errors);
                    setContainerLoading(false);
                    isFetching = false;
                    return;
                }

                // If error has redirect (e.g. session expired)
                if (data && data.redirect) {
                    isFetching = false;
                    await fetchUrl(data.redirect, { method: 'GET' }, true);
                    return;
                }

                throw new Error(data?.message || `Server responded with status ${resp.status}`);
            }

            if (data && data.redirect) {
                // Follow JSON redirect seamlessly via AJAX
                isFetching = false;
                await fetchUrl(data.redirect, { method: 'GET' }, true);
                return;
            }

            const html = data && data.html ? data.html : await resp.text();
            const targetUrl = data && data.url ? data.url : resp.url || url;
            const targetTitle = data && data.title ? data.title : null;

            await swapContent(html, targetUrl, targetTitle, pushState);
        } catch (err) {
            console.error('[Planner AJAX] Request failed:', err);
            showNotice('Failed to update plan. Please check your connection and try again.', 'error');
            setContainerLoading(false);
        } finally {
            isFetching = false;
        }
    }

    function renderValidationErrors(errors) {
        const container = getContainer();
        if (!container) return;

        // Remove old error summary
        const oldSummary = container.querySelector('#planner-error-summary');
        if (oldSummary) oldSummary.remove();

        // Clear previous input error classes
        container.querySelectorAll('.website-input--error, .is-invalid').forEach(el => {
            el.classList.remove('website-input--error', 'is-invalid');
        });

        // Build new summary
        const summary = document.createElement('div');
        summary.id = 'planner-error-summary';
        summary.className = 'website-notice website-notice--error';
        summary.setAttribute('role', 'alert');
        summary.setAttribute('tabindex', '-1');
        summary.style.marginBottom = 'var(--space-6)';
        summary.style.borderRadius = '0 !important';

        let listItems = '';
        Object.entries(errors).forEach(([field, msgs]) => {
            const msg = Array.isArray(msgs) ? msgs[0] : msgs;
            listItems += `<li><a href="#field-${field}" style="color: var(--color-error); text-decoration: underline;">${msg}</a></li>`;

            // Highlight field
            const input = container.querySelector(`[name="${field}"], #${field}_input, #contact-${field}, #field-${field}`);
            if (input) {
                input.classList.add('website-input--error', 'is-invalid');
            }
        });

        summary.innerHTML = `
            <h2 class="website-h4" style="color: var(--color-error); margin-bottom: var(--space-2);">Please correct the following:</h2>
            <ul style="margin: 0; padding-left: var(--space-4);">${listItems}</ul>
        `;

        const form = container.querySelector('form');
        if (form) {
            form.parentNode.insertBefore(summary, form);
        } else {
            container.prepend(summary);
        }

        summary.focus();
        summary.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function showNotice(msg, type = 'info') {
        const container = getContainer();
        if (!container) return;
        const notice = document.createElement('div');
        notice.className = `website-notice website-notice--${type}`;
        notice.style.marginBottom = 'var(--space-4)';
        notice.style.borderRadius = '0 !important';
        notice.textContent = msg;
        container.prepend(notice);
        setTimeout(() => notice.remove(), 6000);
    }

    // Delegated click handler on document for any planner links
    document.addEventListener('click', (e) => {
        const link = e.target.closest('a');
        if (!link) return;

        const href = link.getAttribute('href');
        if (!href || href.startsWith('#') || href.startsWith('javascript:')) return;

        // Check if inside #planner-app
        const isInsidePlanner = Boolean(link.closest(`#${rootId}`));
        let url;
        try {
            url = new URL(link.href, window.location.origin);
        } catch {
            return;
        }

        // Intercept if inside planner and navigating to planner routes
        if (isInsidePlanner && url.origin === window.location.origin && url.pathname.startsWith('/plan-my-trek')) {
            // Allow cmd/ctrl + click to open in new tab
            if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

            e.preventDefault();
            fetchUrl(url.href, { method: 'GET' }, true);
        }
    });

    // Delegated submit handler on document for planner forms
    document.addEventListener('submit', (e) => {
        const form = e.target.closest('form');
        if (!form) return;

        const isInsidePlanner = Boolean(form.closest(`#${rootId}`));
        let actionUrl;
        try {
            actionUrl = new URL(form.action, window.location.origin);
        } catch {
            return;
        }

        if (isInsidePlanner && actionUrl.origin === window.location.origin && actionUrl.pathname.startsWith('/plan-my-trek')) {
            e.preventDefault();

            // Capture submitter button if any
            const submitter = e.submitter;
            const formData = new FormData(form);

            if (submitter && submitter.name && !formData.has(submitter.name)) {
                formData.append(submitter.name, submitter.value);
            }

            // Disable submitter button with loading state
            if (submitter) {
                submitter.disabled = true;
                submitter.dataset.origText = submitter.innerHTML;
                submitter.style.opacity = '0.7';
            }

            fetchUrl(form.action, {
                method: (form.method || 'POST').toUpperCase(),
                body: formData
            }, true).finally(() => {
                if (submitter) {
                    submitter.disabled = false;
                    if (submitter.dataset.origText) {
                        submitter.innerHTML = submitter.dataset.origText;
                    }
                    submitter.style.opacity = '1';
                }
            });
        }
    });

    // Handle browser Back / Forward buttons
    window.addEventListener('popstate', () => {
        if (window.location.pathname.startsWith('/plan-my-trek')) {
            fetchUrl(window.location.href, { method: 'GET' }, false);
        }
    });

    // Initial check on load
    const initialContainer = getContainer();
    if (initialContainer) {
        reinitializeStep(initialContainer);
    }
}
