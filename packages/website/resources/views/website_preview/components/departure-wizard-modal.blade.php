<header class="website-join__header">
    <div class="website-join__header-main">
        <h2 id="website-global-modal-title" class="website-join__title">Plan This Date</h2>
       
    </div>
    <button type="button" class="website-join__close" data-bs-dismiss="modal" aria-label="Close departure form">&times;</button>
</header>
<div class="website-join__body" style="padding:24px;">
    <p class="website-text-secondary" style="line-height:1.6;">Tell us the essentials and we’ll shape this departure around
        your group.</p>
    <form method="POST" action="{{ route('website.planner.begin') }}">
        @csrf
        <input type="hidden" name="mode" value="selected"><input type="hidden" name="source" value="departure-modal">
        @if (!empty($departure['trek_id']))
            <input type="hidden" name="trek" value="{{ $departure['trek_id'] }}">
        @endif
        @if (!empty($departure['id']))
            <input type="hidden" name="departure" value="{{ $departure['id'] }}">
        @endif
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="website-join__field"><label class="website-join__label"
                        for="departure-travelers">Travelers</label><input class="website-join__input"
                        id="departure-travelers" name="adults" type="number" min="1" max="12"
                        value="2" required></div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field"><label class="website-join__label" for="departure-month">Preferred
                        month</label><select class="website-join__input" id="departure-month" name="month" required>
                        <option value="">Choose a month</option>
                        @foreach (range(1, 12) as $month)
                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                        @endforeach
                    </select></div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field"><label class="website-join__label" for="departure-days">Available
                        days</label><input class="website-join__input" id="departure-days" name="available_days"
                        type="number" min="3" max="60" placeholder="e.g. 14" required></div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field"><label class="website-join__label" for="departure-experience">High-altitude
                        experience</label><select class="website-join__input" id="departure-experience" name="experience"
                        required>
                        <option value="first_time">First time above 3,000m</option>
                        <option value="moderate">Some high-altitude experience</option>
                        <option value="veteran">Experienced at altitude</option>
                    </select></div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field"><label class="website-join__label" for="departure-diet">Dietary
                        preference</label><select class="website-join__input" id="departure-diet" name="diet">
                        <option value="standard">Standard menu</option>
                        <option value="vegetarian">Vegetarian</option>
                        <option value="vegan">Vegan</option>
                    </select></div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field"><label class="website-join__label" for="departure-name">Lead traveler
                        name</label><input class="website-join__input" id="departure-name" name="name" type="text"
                        autocomplete="name" maxlength="120" required></div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field"><label class="website-join__label" for="departure-email">Email
                        address</label><input class="website-join__input" id="departure-email" name="email"
                        type="email" autocomplete="email" maxlength="254" required></div>
            </div>
            <div class="col-12 col-md-6">
                <div class="website-join__field"><label class="website-join__label" for="departure-phone">Phone / WhatsApp
                        <span class="website-text-muted">(optional)</span></label><input class="website-join__input"
                        id="departure-phone" name="phone" type="tel" autocomplete="tel" maxlength="32"></div>
            </div>
            <div class="col-12">
                <div class="website-join__field"><label class="website-join__label" for="departure-notes">Anything we
                        should know? <span class="website-text-muted">(optional)</span></label>
                    <textarea class="website-join__input" id="departure-notes" name="special_requests" rows="3" maxlength="1000"
                        placeholder="Pace, interests, or concerns"></textarea>
                </div>
            </div>
        </div>
        <button class="website-btn website-btn--primary website-btn--block" type="submit"
            style="margin-top:20px; min-height:46px;">Continue planning &rarr;</button>
    </form>
</div>
