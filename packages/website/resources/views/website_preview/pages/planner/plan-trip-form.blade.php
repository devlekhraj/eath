<style>
    .website-panel-form {
        padding: 28px 24px;
    }

    .website-panel-form label {
        display: block;
        margin: 18px 0 7px;
        color: #0f172a;
        font-size: .78rem;
        font-weight: 600;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .website-panel-form input,
    .website-panel-form select,
    .website-panel-form textarea {
        display: block;
        width: 100%;
        box-sizing: border-box;
        min-height: 44px;
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 0 !important;
        background: #fff;
        color: #0f172a;
        font: inherit;
    }

    .website-panel-form textarea {
        min-height: 88px;
        resize: vertical;
    }

    .website-panel-form input:focus,
    .website-panel-form select:focus,
    .website-panel-form textarea:focus {
        border-color: #0284c7;
        outline: 2px solid rgba(2, 132, 199, .2);
    }

    .website-panel-form button {
        margin-top: 22px;
        min-height: 46px;
    }
</style>
<div class="website-panel-form">
    <p class="website-text-secondary" style="line-height:1.6;">Tell us the essentials and we’ll shape a route around your
        group.</p>
    <form method="POST" action="{{ route('website.planner.begin') }}">@csrf<input type="hidden" name="mode"
            value="{{ $context['mode'] ?? 'custom' }}"><input type="hidden" name="source"
            value="{{ $context['source'] ?? 'detail-panel' }}">
        @if (!empty($context['trek_id']))
            <input type="hidden" name="trek" value="{{ $context['trek_id'] }}">
        @endif
        <label for="panel-travelers">
            Travelers</label><input id="panel-travelers" name="adults" type="number" min="1" max="12"
            value="{{ $existingDraft['adults'] ?? 2 }}" required><label for="panel-month">Preferred month</label><select
            id="panel-month" name="month" required>
            <option value="">Choose a month</option>
            @foreach (range(1, 12) as $month)
                <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
            @endforeach
        </select><label for="panel-days">Available days</label><input id="panel-days" name="available_days"
            type="number" min="3" max="60" required><label for="panel-notes">Anything we should know?
            (optional)</label>
        <textarea id="panel-notes" name="special_requests" rows="3" maxlength="1000"></textarea><button class="website-btn website-btn--primary website-btn--block" type="submit">Continue
            planning &rarr;</button>
    </form>
</div>
