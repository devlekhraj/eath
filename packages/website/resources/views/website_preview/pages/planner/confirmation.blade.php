@extends('website_preview.layout.master')

@section('title', 'Website Request Completed &middot; ' . ($receipt['reference'] ?? 'Website Confirmation'))
@section('meta_description', 'Simulated website request confirmation. Review your non-PII website reference and summary.')

@section('content')
<div class="website-container" style="padding-top: var(--space-8); padding-bottom: var(--space-12); max-width: 820px;">

    <!-- Completed Status Card -->
    <div class="website-card" style="padding: var(--space-6); text-align: center; margin-bottom: var(--space-6); border: 2px solid var(--color-primary-light); background: var(--color-background-warm);">
        <div style="display: inline-flex; align-items: center; justify-content: center; width: 64px; height: 64px; border-radius: 0; background: var(--color-primary); color: #fff; font-size: 2rem; margin-bottom: var(--space-3);">
            &#10003;
        </div>

        <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-2); text-transform: uppercase;">
            Simulation Complete
        </span>

        <h1 class="website-h1" style="margin: 0 0 var(--space-2) 0;">Website Request Completed</h1>
        
        <div style="margin-bottom: var(--space-4);">
            <span class="website-small website-text-secondary" style="display: block; margin-bottom: var(--space-1);">
                Website Reference Number
            </span>
            <span class="website-badge website-badge--primary" style="font-family: monospace; font-size: 1.25rem; padding: var(--space-2) var(--space-4); letter-spacing: 0.08em;">
                {{ $receipt['reference'] }}
            </span>
        </div>

        <!-- Prominent Explanation -->
        <div class="website-notice website-notice--info" style="text-align: left; margin: 0 auto; max-width: 680px; padding: var(--space-4);">
            <strong style="display: block; margin-bottom: var(--space-1); color: var(--color-primary-dark);">
                Simulation Safeguards &amp; Disclaimers
            </strong>
            <ul style="margin: 0; padding-left: var(--space-4); font-size: var(--type-small); line-height: 1.5; color: var(--color-primary-dark);">
                <li><strong>No inquiry sent:</strong> No communication was dispatched to any mountain guide, team member, or operator.</li>
                <li><strong>No booking made:</strong> No reservation or permit slot was registered in any database.</li>
                <li><strong>No payment taken:</strong> No credit card was charged, and no financial balance is due.</li>
                <li><strong>No follow-up will occur:</strong> No team member will call, message, or email you.</li>
            </ul>
        </div>
    </div>

    <!-- Summary of Plan (Non-PII only) -->
    <div class="website-card" style="padding: var(--space-6); margin-bottom: var(--space-6);">
        <h2 class="website-h3" style="margin: 0 0 var(--space-4) 0; border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-2);">
            Request Summary (Non-PII Record)
        </h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: var(--space-4); margin-bottom: var(--space-5);">
            <div>
                <span class="website-micro website-text-muted" style="display: block;">Selected Journey</span>
                <strong style="font-size: var(--type-body); color: var(--color-primary-dark);">
                    {{ $receipt['trek_name'] ?? 'Custom Private Himalayan Journey' }}
                </strong>
                @if(!empty($receipt['trek_slug']))
                    <div style="margin-top: var(--space-1);">
                        <a href="{{ route('website.treks.show', $receipt['trek_slug']) }}" class="website-micro text-primary text-decoration-underline">
                            View trek itinerary details &rarr;
                        </a>
                    </div>
                @endif
            </div>

            <div>
                <span class="website-micro website-text-muted" style="display: block;">Timing &amp; Departure</span>
                <strong style="font-size: var(--type-body);">
                    {{ $receipt['timing_summary'] }}
                </strong>
                @if(!empty($receipt['departure_id']))
                    <span class="website-micro website-text-secondary" style="display: block; margin-top: 2px;">
                        Attached departure ID: {{ $receipt['departure_id'] }}
                    </span>
                @endif
            </div>

            <div>
                <span class="website-micro website-text-muted" style="display: block;">Traveler Party</span>
                <strong style="font-size: var(--type-body);">
                    {{ $receipt['total_travelers'] }} Travelers
                </strong>
                <span class="website-micro website-text-secondary" style="display: block; margin-top: 2px;">
                    ({{ $receipt['party_adults'] }} Adults{{ $receipt['party_children'] > 0 ? ', ' . $receipt['party_children'] . ' Children' : '' }})
                </span>
            </div>

            <div>
                <span class="website-micro website-text-muted" style="display: block;">Illustrative Subtotal</span>
                @if(($receipt['illustrative_total_price'] ?? 0) > 0)
                    <strong style="font-size: var(--type-body); color: var(--color-primary-dark);">
                        ${{ number_format($receipt['illustrative_total_price'] / 100) }} USD
                    </strong>
                    <span class="website-micro website-text-secondary" style="display: block; margin-top: 2px;">
                        (${{ number_format(($receipt['illustrative_unit_price'] ?? 0) / 100) }} USD &times; {{ $receipt['total_travelers'] }})
                    </span>
                @else
                    <strong class="website-small website-text-secondary">No sample price selected</strong>
                    <span class="website-micro website-text-muted" style="display: block; margin-top: 2px;">Custom journey request</span>
                @endif
            </div>
        </div>

        <div style="padding: var(--space-3); background: var(--color-background-warm); border-radius: var(--radius-md); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-2);">
            <span class="website-micro website-text-muted">
                Receipt Generated: {{ \Carbon\CarbonImmutable::createFromTimestamp($receipt['submitted_at'])->format('M j, Y - H:i:s') }} UTC
            </span>
            <span class="website-micro website-badge website-badge--neutral">
                Session TTL: 2 Hours
            </span>
        </div>
    </div>

    <!-- Data Privacy & Discard Disclosure -->
    <div class="website-notice website-notice--neutral" style="margin-bottom: var(--space-6); padding: var(--space-4);">
        <strong style="display: block; margin-bottom: var(--space-1); font-size: var(--type-small);">
            <svg class="website-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align: -2px; margin-right: var(--space-1);">
                <rect x="3" y="11" width="18" height="11"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            Zero PII Retention Verification
        </strong>
        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.4;">
            As mandated by the website specification, traveler contact names, emails, phone numbers, and free-text notes entered during the simulation were <strong>purged immediately upon generation of this receipt</strong>. They were not recorded into logs, cookies, or browser storage.
        </p>
    </div>

    <!-- Actions: Edit Plan, Explore Treks, Reset Website -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3); border-top: 1px solid var(--color-border); padding-top: var(--space-5);">
        <div style="display: flex; gap: var(--space-3); align-items: center; flex-wrap: wrap;">
            <a href="{{ route('website.planner.review') }}" class="website-btn website-btn--outline" id="btn-edit-plan">
                &larr; Edit Plan
            </a>
            <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--ghost" id="btn-explore-treks">
                <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m2 20 7-10 5 6 4-3 4 7H2z"></path>
                </svg>
                <span>Explore Treks</span>
            </a>
        </div>

        <form method="POST" action="{{ route('website.planner.reset') }}" style="display: inline;">
            @csrf
            <button type="submit" class="website-btn website-btn--ghost" style="color: var(--color-error); font-size: var(--type-small);" id="btn-reset-website" onclick="return confirm('Reset this website journey and start fresh?');">
                Reset Website
            </button>
        </form>
    </div>
</div>
@endsection
