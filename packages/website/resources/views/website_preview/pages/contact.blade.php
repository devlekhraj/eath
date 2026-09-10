@extends('website_preview.layout.master')

@section('title', 'Contact Our Trekking Team (Website) | EATH Trekking Website')
@section('meta_description', 'Simulate sending an expedition inquiry or route planning question to our Himalayan trekking team in this preview preview.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    <div style="max-width: 860px; margin: 0 auto;">
        <img src="{{ $heroImage['url'] }}" alt="{{ $heroImage['alt'] }}" width="{{ $heroImage['width'] }}" height="{{ $heroImage['height'] }}" loading="eager" decoding="async" style="width:100%; height:auto; aspect-ratio:16/9; object-fit:cover; margin-bottom:var(--space-8);">
        {{-- 2. H1 & Website Communication Notice --}}
        <header style="margin-bottom: var(--space-10);">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Inquiry Center</span>
            <h1 class="website-h1" style="margin: 0 0 var(--space-4) 0;">
                Contact Our Team (Website)
            </h1>
            <p class="website-lead website-text-secondary" style="margin: 0 0 var(--space-5) 0; line-height: 1.6;">
                Have questions about route feasibility, seasonal timing, or physical preparation? Test our simulated inquiry workflow below.
            </p>

            {{-- Website Communication Notice Banner --}}
            <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md); box-shadow: none !important;">
                <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                    <span style="font-size: 1.25rem; line-height: 1;" aria-hidden="true">ℹ️</span>
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                            Simulated Contact Notice — No Live Messages Sent
                        </strong>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                            This form models customer inquiry intake for the EATH platform. In this preview environment, submissions are processed locally: no emails are transmitted, no CRM leads or database records are created, and no real-world phone calls or WhatsApp messages are dispatched. Please use the prefilled sample traveler credentials and do not submit private personal information.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        {{-- Success State Alert --}}
        @if(session('contact_success'))
            <div role="alert" class="website-card" style="padding: var(--space-5); background: #f0fdf4; border: 1px solid #bbf7d0; border-left: 4px solid #16a34a; border-radius: var(--radius-md); margin-bottom: var(--space-8); box-shadow: none !important;">
                <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                    <span style="font-size: 1.25rem; line-height: 1;" aria-hidden="true">✅</span>
                    <div>
                        <strong class="website-body" style="display: block; color: #166534; margin-bottom: var(--space-1);">
                            Simulated Message Received
                        </strong>
                        <p class="website-small" style="color: #15803d; margin: 0; line-height: 1.55;">
                            Your preview inquiry has been processed successfully. In accordance with this prototype&rsquo;s privacy standards, no live emails were transmitted, no leads were saved to a database, and no sensitive personal data was retained.
                        </p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Error Summary --}}
        @if($errors->any())
            <div role="alert" tabindex="-1" class="website-card" style="padding: var(--space-4) var(--space-5); background: #fef2f2; border: 1px solid #fecaca; border-left: 4px solid var(--color-danger); border-radius: var(--radius-md); margin-bottom: var(--space-8); box-shadow: none !important;">
                <strong class="website-small" style="color: #991b1b; display: block; margin-bottom: var(--space-1);">
                    Please correct the following issues:
                </strong>
                <ul class="website-small" style="color: #b91c1c; margin: 0; padding-left: var(--space-5); line-height: 1.5;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- 3. Sample Contact-Method Area --}}
        <section aria-labelledby="heading-contact-methods" style="margin-bottom: var(--space-10);">
            <h2 id="heading-contact-methods" class="website-h3" style="margin: 0 0 var(--space-4) 0;">
                Direct Inquiry Channels (Simulated)
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                In a live deployment, travelers can connect via real-time messaging, telephone consultations, or email. In this website, all direct outbound links are safely intercepted:
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: var(--space-4);">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align: -3px; margin-right: var(--space-1);">
                            <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"></path>
                        </svg>
                        WhatsApp Inquiry
                    </strong>
                    <span class="website-micro website-text-muted" style="margin-bottom: var(--space-3); display: block;">
                        Simulated Instant Messaging
                    </span>
                    <button type="button" class="website-btn website-btn--outline website-btn--compact" data-website-outbound style="margin-top: auto;">
                        Open Website WhatsApp &rarr;
                    </button>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align: -3px; margin-right: var(--space-1);">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.91.33 1.8.62 2.65a2 2 0 0 1-.45 2.11L8 9.76a16 16 0 0 0 6.24 6.24l1.28-1.28a2 2 0 0 1 2.11-.45c.85.29 1.74.5 2.65.62A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        Phone Consultation
                    </strong>
                    <span class="website-micro website-text-muted" style="margin-bottom: var(--space-3); display: block;">
                        Simulated Expedition Desk
                    </span>
                    <button type="button" class="website-btn website-btn--outline website-btn--compact" data-website-outbound style="margin-top: auto;">
                        Call Desk (Website) &rarr;
                    </button>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important; display: flex; flex-direction: column;">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: var(--space-1);">
                        ✉️ Email Inquiries
                    </strong>
                    <span class="website-micro website-text-muted" style="margin-bottom: var(--space-3); display: block;">
                        Simulated General Desk
                    </span>
                    <button type="button" class="website-btn website-btn--outline website-btn--compact" data-website-outbound style="margin-top: auto;">
                        Email Team (Website) &rarr;
                    </button>
                </div>
            </div>
        </section>

        {{-- 4. Short General Inquiry Form --}}
        <section aria-labelledby="heading-inquiry-form" style="margin-bottom: var(--space-12);">
            <div class="website-card" style="padding: var(--space-6) var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                <h2 id="heading-inquiry-form" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Send a Simulated Planning Message
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-6) 0; line-height: 1.6;">
                    Fill in this preview form to test validation, topic assignment, and post-submission confirmation states.
                </p>

                <form method="POST" action="{{ route('website.contact.submit') }}" novalidate>
                    @csrf

                    <div style="display: grid; grid-template-columns: 1fr; gap: var(--space-5);">
                        {{-- Name --}}
                        <div>
                            <label for="contact-name" class="website-small website-text-secondary" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                Your Name (Sample) <span class="text-danger" aria-hidden="true">*</span>
                            </label>
                            <input type="text"
                                   id="contact-name"
                                   name="name"
                                   value="{{ old('name', 'Website Traveler') }}"
                                   required
                                   maxlength="100"
                                   aria-required="true"
                                   class="website-input @error('name') website-input--invalid @enderror"
                                   style="width: 100%;"
                                   @error('name') aria-invalid="true" aria-describedby="error-name" @enderror />
                            @error('name')
                                <span id="error-name" class="website-micro text-danger" style="display: block; margin-top: 4px;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="contact-email" class="website-small website-text-secondary" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                Your Email Address (Sample) <span class="text-danger" aria-hidden="true">*</span>
                            </label>
                            <input type="email"
                                   id="contact-email"
                                   name="email"
                                   value="{{ old('email', 'traveler@example.test') }}"
                                   required
                                   maxlength="120"
                                   aria-required="true"
                                   class="website-input @error('email') website-input--invalid @enderror"
                                   style="width: 100%;"
                                   @error('email') aria-invalid="true" aria-describedby="error-email" @enderror />
                            <span class="website-micro website-text-muted" style="display: block; margin-top: 2px;">
                                Prefilled sample address — no emails will be transmitted.
                            </span>
                            @error('email')
                                <span id="error-email" class="website-micro text-danger" style="display: block; margin-top: 4px;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Topic Selector --}}
                        <div>
                            <label for="contact-topic" class="website-small website-text-secondary" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                Inquiry Topic <span class="text-danger" aria-hidden="true">*</span>
                            </label>
                            <select id="contact-topic"
                                    name="topic"
                                    required
                                    aria-required="true"
                                    class="website-input @error('topic') website-input--invalid @enderror"
                                    style="width: 100%;"
                                    @error('topic') aria-invalid="true" aria-describedby="error-topic" @enderror>
                                @foreach($topics as $tKey => $tLabel)
                                    <option value="{{ $tKey }}" {{ old('topic', 'general') === $tKey ? 'selected' : '' }}>
                                        {{ $tLabel }}
                                    </option>
                                @endforeach
                            </select>
                            @error('topic')
                                <span id="error-topic" class="website-micro text-danger" style="display: block; margin-top: 4px;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Optional Trek Context --}}
                        <div>
                            <label for="contact-trek" class="website-small website-text-secondary" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                Related Sample Trek (Optional)
                            </label>
                            <select id="contact-trek"
                                    name="trek"
                                    class="website-input @error('trek') website-input--invalid @enderror"
                                    style="width: 100%;"
                                    @error('trek') aria-invalid="true" aria-describedby="error-trek" @enderror>
                                <option value="">None / General Himalayan Itinerary</option>
                                @foreach($treks as $trk)
                                    <option value="{{ $trk['slug'] }}" {{ old('trek', $preselectedTrek) === $trk['slug'] || old('trek', $preselectedTrek) === $trk['id'] ? 'selected' : '' }}>
                                        {{ $trk['name'] }} ({{ $trk['duration_days'] }} Days &bull; {{ $trk['region']['name'] ?? 'Nepal' }})
                                    </option>
                                @endforeach
                            </select>
                            <span class="website-micro website-text-muted" style="display: block; margin-top: 2px;">
                                Optional selector linking your inquiry to a specific route fixture.
                            </span>
                            @error('trek')
                                <span id="error-trek" class="website-micro text-danger" style="display: block; margin-top: 4px;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Message --}}
                        <div>
                            <label for="contact-message" class="website-small website-text-secondary" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                Message &amp; Questions <span class="text-danger" aria-hidden="true">*</span>
                            </label>
                            <textarea id="contact-message"
                                      name="message"
                                      rows="5"
                                      required
                                      maxlength="1000"
                                      aria-required="true"
                                      placeholder="Ask about daily walking hours, lodge heating, or altitude pacing..."
                                      class="website-input @error('message') website-input--invalid @enderror"
                                      style="width: 100%; resize: vertical;"
                                      @error('message') aria-invalid="true" aria-describedby="error-message" @enderror>{{ old('message', request()->query('subject') ? 'Inquiry regarding ' . request()->query('subject') . ': We are interested in learning more about this itinerary.' : 'This is a preview message testing the EATH contact form. We are interested in understanding pacing and acclimatization for sample autumn treks.') }}</textarea>
                            <div style="display: flex; justify-content: space-between; margin-top: 4px; gap: var(--space-2); flex-wrap: wrap;">
                                <span class="website-micro website-text-muted" style="font-weight: 500; color: #b45309;">
                                    ⚠️ Please do not enter real credit card numbers, passport information, or sensitive private data.
                                </span>
                                <span class="website-micro website-text-muted">Max 1,000 characters</span>
                            </div>
                            @error('message')
                                <span id="error-message" class="website-micro text-danger" style="display: block; margin-top: 4px;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div style="padding-top: var(--space-2);">
                            <button type="submit" class="website-btn website-btn--primary" style="width: 100%; justify-content: center;">
                                Simulate message &rarr;
                            </button>
                            <span class="website-micro website-text-muted" style="text-align: center; display: block; margin-top: var(--space-2); font-style: italic;">
                                Local preview submit — no emails sent, no database records created.
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        {{-- 5. Office-Information Unavailable/Sample State --}}
        <section aria-labelledby="heading-office-info" style="margin-bottom: var(--space-12);">
            <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Base of Operations</span>
                <h2 id="heading-office-info" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Kathmandu Operations Base &amp; Physical Office
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.6;">
                    In real commercial expeditions, our team operates from an established operations office in Kathmandu, handling flight logistics, trekking permits, and luggage storage.
                </p>
                <div style="padding: var(--space-3) var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border-light); border-radius: var(--radius-sm);">
                    <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                        Prototype Credential Status:
                    </strong>
                    <p class="website-small website-text-muted" style="margin: 0; font-style: italic; line-height: 1.55;">
                        Physical office address &amp; operational registration details: <em>Not supplied for this prototype (no fabricated street addresses or simulated Google Map pins).</em>
                    </p>
                </div>
            </div>
        </section>

        {{-- 6. Relevant FAQ Links --}}
        <section aria-labelledby="heading-contact-faqs" style="margin-bottom: var(--space-12);">
            <div style="margin-bottom: var(--space-4);">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Common Inquiries</span>
                <h2 id="heading-contact-faqs" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                    Frequently Asked Inquiry Questions
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0;">
                    Quick answers to common questions about planning, custom trips, and prototype functionality:
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-4);">
                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        Will someone receive my website inquiry?
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.55;">
                        No. Website forms process submissions locally without creating CRM leads or dispatching emails.
                    </p>
                    <a href="{{ route('website.faqs') }}" class="website-link website-small text-primary text-decoration-underline">
                        Read FAQ details &rarr;
                    </a>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        Can I customize these sample routes?
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.55;">
                        Yes. Every itinerary can be tailored with flexible daily distances, rest days, and personal pace.
                    </p>
                    <a href="{{ route('website.faqs') }}" class="website-link website-small text-primary text-decoration-underline">
                        Learn about customization &rarr;
                    </a>
                </div>

                <div class="website-card" style="padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); box-shadow: none !important;">
                    <h3 class="website-h4" style="margin: 0 0 var(--space-2) 0; font-size: 1.05rem;">
                        How are package prices estimated?
                    </h3>
                    <p class="website-small website-text-secondary" style="margin: 0 0 var(--space-3) 0; line-height: 1.55;">
                        All displayed USD rates represent illustrative ground package estimates per traveler.
                    </p>
                    <a href="{{ route('website.faqs') }}" class="website-link website-small text-primary text-decoration-underline">
                        Explore pricing guide &rarr;
                    </a>
                </div>
            </div>
        </section>

        {{-- 7. Plan My Trek Alternative --}}
        <section aria-labelledby="heading-planner-alternative">
            <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); text-align: center; box-shadow: none !important;">
                <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Interactive Alternative</span>
                <h2 id="heading-planner-alternative" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                    Looking for a Tailored Route Proposal?
                </h2>
                <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 620px; line-height: 1.6;">
                    Instead of composing a free-form message, our interactive Journey Planner walks through travel timing, party size, altitude preferences, and fitness profiles to generate a tailored proposal.
                </p>
                <p class="website-small website-text-muted" style="margin: 0 auto var(--space-6) auto; max-width: 560px; font-style: italic;">
                    Note: Launching the planner preserves any existing session draft you may have created.
                </p>

                <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                    <a href="{{ route('website.planner.start', ['source' => 'contact']) }}" class="website-btn website-btn--primary">
                        Launch Guided Journey Planner &rarr;
                    </a>
                    <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline">
                        Browse All Treks
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
