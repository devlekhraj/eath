{{-- Booking modal fragment (HTML only) --}}
@php($countries = isset($countries) ? $countries : collect())
<div id="fd-book-now-overlay" class="fixed inset-0 z-40 bg-slate-600/30 backdrop-blur-[1px]"></div>
<div id="fd-book-now-modal" class="fixed inset-0 z-50 flex items-center justify-center px-4 py-10" role="dialog"
    aria-modal="true" aria-labelledby="fd-book-now-title">
    <div class="w-full max-w-5xl max-h-[90vh] overflow-hidden bg-white rounded flex flex-col">
        <div class="bg-slate-900 relative flex items-center justify-center px-6 py-4 text-white sticky top-0 z-10">
            <div class="text-center">
                <h3 class="text-2xl font-semibold" id="fd-book-now-title">{{ $package->name ?? 'Book this trek' }}</h3>
                <p class="mt-2 text-sm text-white/80">
                    @php($start = $departure->start_date ?? $package->start_date ?? null)
                    @php($end = $departure->end_date ?? $package->end_date ?? null)
                    {{ $start ? format_date($start) : '' }}
                    @if($start || $end)
                        to
                    @endif
                    {{ $end ? format_date($end) : '' }} |
                    {{ $package->duration_days ?? '' }} days
                </p>
            </div>
            <button type="button" class="absolute right-4 top-4 rounded-full p-2 text-white hover:bg-white/10"
                data-fd-close aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <div class="grid gap-0 lg:grid-cols-[2fr_1fr] flex-1 overflow-y-auto">
            <div class="space-y-5 px-6 py-6" data-fd-form-wrap>
                <form class="space-y-5" data-fd-form>
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                @if($departure)
                    <input type="hidden" name="departure_id" value="{{ $departure->id }}">
                @endif

                <div class="space-y-3 rounded-xl border border-slate-200 bg-white p-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Contact Information</p>
                    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="space-y-1 sm:col-span-2 lg:col-span-1">
                            <label class="text-sm font-medium text-slate-700">Full Name*</label>
                            <input name="contact_name" type="text" required
                                class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-700">Email*</label>
                            <input name="contact_email" type="email" required
                                class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-slate-700">Phone*</label>
                            <input name="contact_phone" type="tel" required
                                class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                        </div>
                    </div>
                </div>
                <div class="space-y-4 rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">How many are travelling?</p>
                            <p class="text-sm text-slate-700">Add one section per traveller.</p>
                        </div>
                        <button type="button" class="text-sm font-semibold text-sky-700 hover:text-sky-900" data-add-traveller>
                            + Add Traveller
                        </button>
                    </div>

                    <div class="space-y-4" data-traveller-list>
                        <div class="rounded-lg border border-slate-200 bg-white p-4" data-traveller data-index="0">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-semibold text-slate-800">Traveller #1</p>
                                <button type="button" class="text-sm text-red-600 hover:text-red-700 hidden" data-remove-traveller>Remove</button>
                            </div>
                            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Full Name*</label>
                                    <input name="travellers[0][name]" type="text" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Email*</label>
                                    <input name="travellers[0][email]" type="email" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Phone*</label>
                                    <input name="travellers[0][phone]" type="tel" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Date of Birth*</label>
                                    <input name="travellers[0][dob]" type="date" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Passport Number*</label>
                                    <input name="travellers[0][passport]" type="text" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Country*</label>
                                    <select name="travellers[0][country]" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
                                        <option value="" disabled selected>Select country</option>
                                        @foreach ($countries as $country)
                                            @php($code = is_object($country) ? ($country->country_code ?? $country->code ?? $country->id) : ($country['country_code'] ?? $country['code'] ?? $country))
                                            @php($name = is_object($country) ? ($country->name ?? $country->country_code ?? $country->id) : ($country['name'] ?? $country))
                                            <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <template id="traveller-template">
                        <div class="rounded-lg border border-slate-200 bg-white p-4" data-traveller data-index="__INDEX__">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-semibold text-slate-800">Traveller #__NUM__</p>
                                <button type="button" class="text-sm text-red-600 hover:text-red-700" data-remove-traveller>Remove</button>
                            </div>
                            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Full Name*</label>
                                    <input name="travellers[__INDEX__][name]" type="text" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Email*</label>
                                    <input name="travellers[__INDEX__][email]" type="email" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Phone*</label>
                                    <input name="travellers[__INDEX__][phone]" type="tel" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Date of Birth*</label>
                                    <input name="travellers[__INDEX__][dob]" type="date" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Passport Number*</label>
                                    <input name="travellers[__INDEX__][passport]" type="text" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200" />
                                </div>
                                <div class="space-y-1">
                                    <label class="text-sm font-medium text-slate-700">Country*</label>
                                    <select name="travellers[__INDEX__][country]" required
                                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
                                        <option value="" disabled selected>Select country</option>
                                        @foreach ($countries as $country)
                                            @php($code = is_object($country) ? ($country->country_code ?? $country->code ?? $country->id) : ($country['country_code'] ?? $country['code'] ?? $country))
                                            @php($name = is_object($country) ? ($country->name ?? $country->country_code ?? $country->id) : ($country['name'] ?? $country))
                                            <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="space-y-3 rounded-xl border border-slate-200 bg-white p-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Flight Details</p>
                    <label class="flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="flight" value="booked" class="text-sky-600" />
                        I have already booked my flight
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="flight" value="not_booked" class="text-sky-600" checked />
                        Flight is not booked yet. I will send the flight itinerary by email once it is confirmed.
                    </label>
                </div>

                <div class="space-y-3 rounded-xl border border-slate-200 bg-white p-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Other Information</p>
                    <p class="text-sm font-medium text-slate-800">Travel Insurance</p>
                    <p class="text-xs text-slate-600">Travel insurance is mandatory and must include medical, evacuation, and high-altitude coverage.</p>
                    <label class="flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="insurance" value="have" class="text-sky-600" />
                        I have full coverage of Insurance
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="insurance" value="will_buy" class="text-sky-600" />
                        Not yet bought (I will buy insurance later)
                    </label>
                    <p class="text-xs text-slate-600">Please email us a copy of your insurance before your trek begins.</p>
                </div>

                <div class="space-y-3 rounded-xl border border-slate-200 bg-white p-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Special Requirements</p>
                    <label class="text-sm font-medium text-slate-700">Special Requirement? Please tell us more to help you better.*</label>
                    <textarea name="special_requirements" required rows="3"
                        class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-sky-500 focus:ring-2 focus:ring-sky-200"
                        placeholder="Dietary needs, medical considerations, preferences..."></textarea>
                </div>


                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" class="text-sm font-semibold text-slate-600 hover:text-slate-800"
                        data-fd-close>Cancel</button>
                    <button type="submit"
                        class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-xs font-semibold text-white hover:bg-slate-800">
                        Confirm & Submit
                    </button>
                </div>
                </form>
            </div>

            <div class="px-6 py-6 hidden" data-fd-success>
                <div class="h-full rounded-xl border border-slate-200 bg-white p-6 text-center shadow-sm flex flex-col items-center justify-center gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-emerald-50 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-slate-900">Request received</h3>
                        <p class="mt-2 text-sm text-slate-600">Thanks! We’ll email payment instructions and next steps soon.</p>
                    </div>
                    <div class="flex flex-wrap items-center justify-center gap-3">
                        <button type="button" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-xs font-semibold text-white hover:bg-slate-800" data-fd-close>
                            Close
                        </button>
                        <button type="button" class="inline-flex items-center rounded-md border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-700 hover:border-slate-300" data-fd-new>
                            New Booking
                        </button>
                    </div>
                </div>
            </div>

            <aside class="border-t border-slate-200 bg-slate-50 p-6 lg:border-l lg:border-t-0">
                <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm space-y-3">
                    @php($price = $departure->cost ?? $package->price ?? null)
                    <p class="text-sm font-semibold text-slate-900">Departure Cost</p>
                    <p class="text-xl font-bold text-slate-900">
                        {{ is_numeric($price) ? '$ '.number_format($price, 2) : '$ —' }}
                    </p>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Deposit amount and payment instructions will be sent to your email after you submit this form. No payment is collected on this step.
                    </p>
                </div>
            </aside>
        </div>
    </div>
</div>
