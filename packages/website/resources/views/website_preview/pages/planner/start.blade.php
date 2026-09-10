@extends('website_preview.layout.master')

@section('title', 'Plan My Himalayan Trek — Interactive Planner (Website)')
@section('meta_description', 'Plan your personalized Himalayan trek in Nepal with our interactive trip planner. Tailored pace, altitude guidance, and ground pricing.')

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12); max-width: 960px;">

    <!-- 1. Header & Website Disclosure -->
    <div style="margin-bottom: var(--space-6);">
        <div style="display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-2); flex-wrap: wrap;">
            <span class="website-badge website-badge--accent">Interactive Website Planner</span>
            <span class="website-micro website-text-muted">Pure Session State · No Payment or PII Required</span>
        </div>
        <h1 class="website-h1" style="margin-bottom: var(--space-2);">Plan My Himalayan Trek</h1>
        <p class="website-body website-text-secondary" style="line-height: 1.6; max-width: 760px;">
            Tell us about your target travel dates, physical walking ceiling, group composition, and trip style. Our recommendation engine will match your preferences to compatible Himalayan trails with transparent ground package rates.
        </p>

        @if(!empty($context['departure_warning']))
            <div class="website-notice website-notice--warning" style="margin-top: var(--space-4);">
                <p class="website-small">
                    <strong>Sample Departure Update:</strong> {{ $context['departure_warning'] }}
                </p>
            </div>
        @endif
    </div>

    @if($existingDraft)
        <!-- 2. Existing Draft Resume / Replace / Reset State -->
        <div class="website-card" style="padding: var(--space-6); margin-bottom: var(--space-8); background: var(--color-background-warm);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-4); flex-wrap: wrap; gap: var(--space-2);">
                <div>
                    <span class="website-badge website-badge--warm" style="margin-bottom: var(--space-1);">Active Trip Draft Found</span>
                    <h2 class="website-h3" style="margin: 0;">You have a saved trip plan in progress</h2>
                </div>
                <span class="website-micro website-text-muted">
                    Last updated {{ \Carbon\CarbonImmutable::createFromTimestamp($existingDraft['updated_at'])->diffForHumans() }}
                </span>
            </div>

            <!-- Summary of current answers -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: var(--space-3); padding: var(--space-4); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md); margin-bottom: var(--space-6);">
                <div>
                    <span class="website-micro website-text-secondary" style="display: block;">Planning Mode</span>
                    <strong style="text-transform: capitalize;">{{ $existingDraft['mode'] }}</strong>
                </div>
                <div>
                    <span class="website-micro website-text-secondary" style="display: block;">Selected Trek</span>
                    <strong>
                        @if($existingDraft['selected_trek_id'] && isset($treksKeyed[$existingDraft['selected_trek_id']]))
                            {{ $treksKeyed[$existingDraft['selected_trek_id']]['name'] }}
                        @else
                            Open Discovery
                        @endif
                    </strong>
                </div>
                <div>
                    <span class="website-micro website-text-secondary" style="display: block;">Travelers</span>
                    <strong>{{ $existingDraft['adults'] }} Adults{{ $existingDraft['children'] > 0 ? ', ' . $existingDraft['children'] . ' Children' : '' }}</strong>
                </div>
                <div>
                    <span class="website-micro website-text-secondary" style="display: block;">Next Step</span>
                    <strong style="text-transform: capitalize;">{{ $nextStep }}</strong>
                </div>
            </div>

            <!-- Decision Actions -->
            <div style="display: flex; gap: var(--space-3); flex-wrap: wrap; align-items: center;">
                <a href="{{ route('website.planner.step', ['step' => $nextStep]) }}" class="website-btn website-btn--primary">
                    Resume Current Plan &rarr;
                </a>

                <form method="POST" action="{{ route('website.planner.begin') }}" style="display: inline;">
                    @csrf
                    <input type="hidden" name="mode" value="{{ $context['mode'] }}">
                    <input type="hidden" name="source" value="{{ $context['source'] }}">
                    @if($context['trek_id'])
                        <input type="hidden" name="trek" value="{{ $context['trek_id'] }}">
                    @endif
                    @if($context['departure_id'])
                        <input type="hidden" name="departure" value="{{ $context['departure_id'] }}">
                    @endif
                    <button type="submit" class="website-btn website-btn--outline">
                        Start New Plan With Current Selection
                    </button>
                </form>

                <form method="POST" action="{{ route('website.planner.reset') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="website-btn website-btn--ghost" style="color: var(--color-accent);" onclick="return confirm('Clear your saved website trip plan?');">
                        Reset Saved Plan
                    </button>
                </form>
            </div>
        </div>

    @else
        <!-- 3. Fresh Entry Form & Mode Selection -->
        <div class="website-card" style="padding: var(--space-6); margin-bottom: var(--space-8);">
            <h2 class="website-h3" style="margin-bottom: var(--space-4);">Choose Your Planning Approach</h2>

            <form method="POST" action="{{ route('website.planner.begin') }}">
                @csrf
                <input type="hidden" name="source" value="{{ $context['source'] }}">
                @if($context['trek_id'])
                    <input type="hidden" name="trek" value="{{ $context['trek_id'] }}">
                @endif
                @if($context['departure_id'])
                    <input type="hidden" name="departure" value="{{ $context['departure_id'] }}">
                @endif

                <div style="display: flex; flex-direction: column; gap: var(--space-4); margin-bottom: var(--space-6);">
                    <!-- Discover Mode Option -->
                    <label class="website-mode-choice" style="display: flex; align-items: flex-start; gap: var(--space-3); padding: var(--space-4); border: 1px solid var(--color-border); border-radius: var(--radius-md); cursor: pointer; background: var(--color-surface);">
                        <input type="radio" name="mode" value="discover" {{ $context['mode'] === 'discover' ? 'checked' : '' }} style="margin-top: 4px; accent-color: var(--color-primary);">
                        <div>
                            <strong style="display: block; margin-bottom: var(--space-1); font-size: 1.05rem;">
                                Discover &amp; Match
                            </strong>
                            <span class="website-small website-text-secondary" style="line-height: 1.5; display: block;">
                                Tell us your season, walking fitness, party size, and interests. We will rank suitable Himalayan routes tailored to your schedule.
                            </span>
                        </div>
                    </label>

                    <!-- Selected Trek Mode Option -->
                    <label class="website-mode-choice" style="display: flex; align-items: flex-start; gap: var(--space-3); padding: var(--space-4); border: 1px solid var(--color-border); border-radius: var(--radius-md); cursor: pointer; background: var(--color-surface);">
                        <input type="radio" name="mode" value="selected" {{ $context['mode'] === 'selected' ? 'checked' : '' }} style="margin-top: 4px; accent-color: var(--color-primary);">
                        <div>
                            <strong style="display: block; margin-bottom: var(--space-1); font-size: 1.05rem;">
                                Plan Specific Trek
                                @if($context['trek_id'] && isset($treksKeyed[$context['trek_id']]))
                                    <span class="website-badge website-badge--warm" style="margin-left: var(--space-2);">{{ $treksKeyed[$context['trek_id']]['name'] }}</span>
                                @endif
                            </strong>
                            <span class="website-small website-text-secondary" style="line-height: 1.5; display: block;">
                                Lock in a chosen Himalayan route and configure group sizing, accommodation style, and sample departure timing.
                            </span>
                        </div>
                    </label>

                    <!-- Custom Trip Mode Option -->
                    <label class="website-mode-choice" style="display: flex; align-items: flex-start; gap: var(--space-3); padding: var(--space-4); border: 1px solid var(--color-border); border-radius: var(--radius-md); cursor: pointer; background: var(--color-surface);">
                        <input type="radio" name="mode" value="custom" {{ $context['mode'] === 'custom' ? 'checked' : '' }} style="margin-top: 4px; accent-color: var(--color-primary);">
                        <div>
                            <strong style="display: block; margin-bottom: var(--space-1); font-size: 1.05rem;">
                                Custom Private Journey
                            </strong>
                            <span class="website-small website-text-secondary" style="line-height: 1.5; display: block;">
                                Build a bespoke itinerary with tailored daily distances, rest day pacing, and specialized requests.
                            </span>
                        </div>
                    </label>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--color-border); padding-top: var(--space-4);">
                    <a href="{{ route('website.home') }}" class="website-btn website-btn--ghost">
                        &larr; Back to Home
                    </a>
                    <button type="submit" class="website-btn website-btn--primary">
                        Begin Planning &rarr;
                    </button>
                </div>
            </form>
        </div>
    @endif

    <!-- Trust & Website Notice Card -->
    <div style="padding: var(--space-4); background: var(--color-background-warm); border: 1px solid var(--color-border); border-radius: var(--radius-md);">
        <div style="display: flex; gap: var(--space-3); align-items: center;">
            <div style="font-size: 1.5rem;" aria-hidden="true">&bigstar;</div>
            <div class="website-small website-text-secondary">
                <strong>Transparent Himalayan Planning:</strong> All routes are paced for safety-first acclimatization. Pricing estimates are ground package guidelines; final arrangements are confirmed with licensed local mountain leaders.
            </div>
        </div>
    </div>
</div>
@endsection
