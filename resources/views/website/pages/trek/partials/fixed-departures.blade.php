<section>
    <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
        <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Fixed Departures</h2>
        <p class="mt-3 text-base text-slate-600">
            Join our fixed departure treks for a hassle-free adventure.
        </p>
        <div style="background: #fff;padding: 10px 30px;margin-top: 14px;">
            <div class="mt-4" id="trek-results">
                <div
                    class="hidden gap-3 border-b border-slate-200 pb-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 sm:grid sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr_auto]">

                    <span>Start Date</span>
                    <span>End Date</span>
                    <span>Seat</span>
                    <span>Cost</span>
                    <span class="text-right">Action</span>
                </div>
                <div class="divide-y divide-slate-200">

                    @foreach ($package->departures()->where('start_date', '>=', now()->toDateString())->where('status','active')->orderBy('start_date')->get() as $item)
                        <div class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr_auto] sm:items-center">

                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Start
                                    Date</span>
                                <p class="mt-1 text-sm font-semibold sm:mt-0">{{ format_date($item['start_date']) }}
                                </p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">End
                                    Date</span>
                                <p class="mt-1 text-sm font-semibold sm:mt-0">{{ format_date($item['end_date']) }}</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Available</span>
                                <p class="mt-1 text-sm font-semibold sm:mt-0">{{ $item['booked_seats'] }} /
                                    {{ $item['available_seats'] }}</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Cost</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">
                                    {{ $item['cost'] ?? 'n/a' }} USD</p>
                            </div>

                            <div class="flex sm:justify-end">
                                <a href="#"
                                    class="inline-flex items-center btn-book-now rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800"
                                    data-package-id="{{ $package->id }}" data-departure-id="{{ $item['id'] }}">
                                    Book Now</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<div id="fd-book-now-container"></div>

<script>
    (function() {
        const container = document.getElementById('fd-book-now-container');

        async function fetchModal(pkgId, depId) {
            const params = new URLSearchParams({ package_id: pkgId });
            if (depId) params.append('departure_id', depId);
            const resp = await fetch(`/book-modal?${params.toString()}`);
            if (!resp.ok) throw new Error('Failed to load booking form');
            return resp.text();
        }

        function wireModal() {
            const overlay = container.querySelector('#fd-book-now-overlay');
            const modal = container.querySelector('#fd-book-now-modal');
            const form = container.querySelector('[data-fd-form]');
            const formWrap = container.querySelector('[data-fd-form-wrap]');
            const successWrap = container.querySelector('[data-fd-success]');
            const newBookingBtn = container.querySelector('[data-fd-new]');
            const closeBtns = container.querySelectorAll('[data-fd-close]');
            const addBtn = container.querySelector('[data-add-traveller]');
            const travellerList = container.querySelector('[data-traveller-list]');
            const template = container.querySelector('#traveller-template');
            let lastFocus = document.activeElement;

            if (!overlay || !modal || !form) return;

            const openModal = () => {
                overlay.classList.remove('hidden');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
                modal.querySelector('input[name="contact_name"]')?.focus();
            };

            const closeModal = () => {
                overlay.classList.add('hidden');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
                form.reset();
                resetTravellers();
                if (successWrap) successWrap.classList.add('hidden');
                if (formWrap) formWrap.classList.remove('hidden');
                lastFocus?.focus();
            };

            const resetTravellers = () => {
                if (!travellerList) return;
                const travellers = travellerList.querySelectorAll('[data-traveller]');
                travellers.forEach((card, idx) => {
                    if (idx === 0) {
                        card.querySelectorAll('input, select').forEach((el) => el.value = '');
                        const removeBtn = card.querySelector('[data-remove-traveller]');
                        if (removeBtn) removeBtn.classList.add('hidden');
                    } else {
                        card.remove();
                    }
                });
                renumber();
            };

            const renumber = () => {
                const cards = travellerList.querySelectorAll('[data-traveller]');
                cards.forEach((card, idx) => {
                    card.dataset.index = idx;
                    const title = card.querySelector('p');
                    if (title) title.textContent = `Traveller #${idx + 1}`;
                    card.querySelectorAll('input, select').forEach((input) => {
                        const name = input.getAttribute('name');
                        if (!name) return;
                        const updated = name.replace(/travellers\[\d+\]/, `travellers[${idx}]`);
                        input.setAttribute('name', updated);
                    });
                    const removeBtn = card.querySelector('[data-remove-traveller]');
                    if (removeBtn) removeBtn.classList.toggle('hidden', idx === 0);
                });
            };

            const addTraveller = () => {
                if (!template) return;
                const nextIndex = travellerList.querySelectorAll('[data-traveller]').length;
                const html = template.innerHTML
                    .replace(/__INDEX__/g, nextIndex)
                    .replace(/__NUM__/g, nextIndex + 1);
                const wrapper = document.createElement('div');
                wrapper.innerHTML = html.trim();
                const node = wrapper.firstElementChild;
                travellerList.appendChild(node);
                renumber();
                node.querySelector('input, select')?.focus();
            };

            travellerList?.addEventListener('click', (e) => {
                if (e.target.matches('[data-remove-traveller]')) {
                    e.preventDefault();
                    const card = e.target.closest('[data-traveller]');
                    if (!card) return;
                    if (travellerList.querySelectorAll('[data-traveller]').length === 1) return;
                    card.remove();
                    renumber();
                }
            });

            addBtn?.addEventListener('click', (e) => {
                e.preventDefault();
                addTraveller();
            });

            overlay.addEventListener('click', closeModal);
            closeBtns.forEach(btn => btn.addEventListener('click', closeModal));
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !overlay.classList.contains('hidden')) closeModal();
            });
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const submitBtn = form.querySelector('[data-fd-submit-btn]');
                const submitText = form.querySelector('[data-fd-submit-text]');
                const submitSpinner = form.querySelector('[data-fd-submit-spinner]');

                const setSubmitting = (isSubmitting) => {
                    if (submitBtn) submitBtn.disabled = isSubmitting;
                    if (submitText) submitText.textContent = isSubmitting ? 'Submitting...' : 'Confirm & Submit';
                    if (submitSpinner) submitSpinner.classList.toggle('hidden', !isSubmitting);
                };

                setSubmitting(true);

                const fd = new FormData(form);
                const payload = {};
                fd.forEach((value, key) => {
                    if (key.includes('[')) {
                        const match = key.match(/([^\[]+)\[(\d+)\]\[([^\]]+)\]/);
                        if (match) {
                            const [, group, idx, field] = match;
                            payload[group] = payload[group] || [];
                            payload[group][idx] = payload[group][idx] || {};
                            payload[group][idx][field] = value;
                            return;
                        }
                    }
                    payload[key] = value;
                });

                fetch('/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload),
                })
                    .then(async (resp) => {
                        if (!resp.ok) {
                            const err = await resp.json().catch(() => ({}));
                            throw new Error(err.message || 'Failed to submit booking');
                        }
                        return resp.json();
                    })
                    .then((data) => {
                        console.log('Booking submitted', data);
                        if (formWrap) formWrap.classList.add('hidden');
                        if (successWrap) successWrap.classList.remove('hidden');
                        modal.querySelector('.grid')?.scrollTo({ top: 0, behavior: 'smooth' });
                    })
                    .catch((err) => {
                        console.error(err);
                        alert(err.message || 'Unable to submit booking.');
                    })
                    .finally(() => {
                        setSubmitting(false);
                    });
            });

            newBookingBtn?.addEventListener('click', () => {
                form.reset();
                resetTravellers();
                if (successWrap) successWrap.classList.add('hidden');
                if (formWrap) formWrap.classList.remove('hidden');
                form.querySelector('input[name=\"contact_name\"]')?.focus();
            });

            openModal();
        }

        document.querySelectorAll('.btn-book-now').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault();
                const pkgId = btn.getAttribute('data-package-id');
                const depId = btn.getAttribute('data-departure-id');
                try {
                    const html = await fetchModal(pkgId, depId);
                    container.innerHTML = html;
                    wireModal();
                } catch (err) {
                    console.error(err);
                    alert('Unable to load booking form. Please try again.');
                }
            });
        });
    })();
</script>
