@php
    $formattedDate = date('d M Y', strtotime($departure['start_date']));
    $spaces = max(1, (int) ($departure['sample_seats'] ?? 8));
    $maxSpaces = min(12, $spaces);
@endphp

<header class="website-join__header">
    <div class="website-join__header-main">
        <h2 id="website-global-modal-title" class="website-join__title">Join this departure</h2>
        <div class="website-join__subtitle">
            <span id="trek-join-trek-name">{{ $trek['name'] }}</span>
            <span class="website-join__dot">&middot;</span>
            <span id="trek-join-date">{{ $formattedDate }}</span>
        </div>
    </div>
    <button type="button" class="website-join__close" data-bs-dismiss="modal" aria-label="Close departure form">&times;</button>
</header>

<div class="website-join__body">
    <form id="trek-join-form" action="{{ route('website.departures.inquire') }}" method="post" data-ajax-form>
        @csrf
        <input type="hidden" name="departure_id" id="trek-join-departure" value="{{ $departure['id'] }}">

        <!-- Primary Contact Details (2x2 Grid) -->
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="website-join__field">
                    <label class="website-join__label" for="trek-join-name">
                        Full name <span class="website-join__required">*</span>
                    </label>
                    <input id="trek-join-name" name="name" type="text" autocomplete="name" maxlength="120" placeholder="" required class="website-join__input">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field">
                    <label class="website-join__label" for="trek-join-email">
                        Email <span class="website-join__required">*</span>
                    </label>
                    <input id="trek-join-email" name="email" type="email" autocomplete="email" maxlength="254" placeholder="" required class="website-join__input">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field">
                    <label class="website-join__label" for="trek-join-phone">
                        WhatsApp / Phone
                    </label>
                    <div class="website-join__phone-wrap">
                        <input type="tel" name="phone" id="trek-join-phone" class="website-join__input website-join__phone-input" autocomplete="tel" maxlength="32" placeholder="">
                        <input type="hidden" name="dial_code" id="trek-join-dial" value="+1">
                        <input type="hidden" name="country" id="trek-join-country" value="United States">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <!-- Travelers * -->
                <div class="website-join__field">
                    <label class="website-join__label" for="trek-join-travelers">
                        Travelers <span class="website-join__required">*</span>
                    </label>
                    <select id="trek-join-travelers" name="travelers" required class="website-join__select">
                        @for ($i = 1; $i <= $maxSpaces; $i++)
                            <option value="{{ $i }}" {{ $i === 1 ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <div id="trek-join-seats" class="website-join__seats" style="margin-top: 6px;">{{ $spaces }} seats remaining</div>
                </div>
            </div>
        </div>

        <!-- Trekking experience & How ready are you? (Row Column Grid) -->
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="website-join__group">
                    <span class="website-join__group-label">Trekking experience</span>
                    <div class="website-join__radios">
                        @foreach (['First trek', 'Some experience', 'Experienced'] as $opt)
                            <label class="website-join__radio-item">
                                <input type="radio" name="experience" value="{{ $opt }}" class="website-join__radio" {{ $loop->first ? 'checked' : '' }}>
                                <span>{{ $opt }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__group">
                    <span class="website-join__group-label">How ready are you?</span>
                    <div class="website-join__radios">
                        @foreach (['Ready to book', 'Need more information', 'Comparing options'] as $opt)
                            <label class="website-join__radio-item">
                                <input type="radio" name="readiness" value="{{ $opt }}" class="website-join__radio" {{ $loop->first ? 'checked' : '' }}>
                                <span>{{ $opt }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Anything you'd like to ask? -->
        <div class="website-join__field">
            <label class="website-join__label" for="trek-join-notes">
                Anything you'd like to ask?
            </label>
            <textarea id="trek-join-notes" name="notes" rows="3" maxlength="1000" class="website-join__textarea" placeholder=""></textarea>
        </div>

        <p id="trek-join-error" class="website-join__error" role="alert" hidden></p>

        <!-- Send My Interest -->
        <div style="margin-top: 20px;">
            <button type="submit" id="trek-join-submit" class="website-btn website-btn--accent website-btn--block" style="width: 100%; justify-content: center; font-size: 1rem; font-weight: 700; padding: 13px 20px; border-radius: 0 !important; box-shadow: none !important;">
                Send My Interest
            </button>
        </div>

        <!-- Trust Note -->
        <p class="website-join__trust-note">
            No payment required. Our trip specialist will contact you with availability/details.
        </p>
    </form>

    <!-- Success Confirmation State -->
    <div id="trek-join-success" class="website-join__success" role="status" hidden>
        <div class="website-join__success-icon">
            <i class="fa-solid fa-check" aria-hidden="true"></i>
        </div>
        <h3>Your Interest Has Been Received</h3>
        <p>
            Thank you! We have logged your interest for <strong>the {{ $formattedDate }} departure</strong> of <strong>{{ $trek['name'] }}</strong>. Our Himalayan expedition specialist will get back to you with confirmed availability and ground logistics.
        </p>
        <button type="button" class="website-btn website-btn--primary" data-bs-dismiss="modal" style="min-width: 140px; justify-content: center; border-radius: 0 !important;">
            Done
        </button>
    </div>
</div>
