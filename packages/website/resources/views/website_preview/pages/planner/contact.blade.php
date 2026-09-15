@extends('website_preview.layout.master')

@section('title', 'Sample Contact Details (Website)')
@section('meta_description', 'Provide sample traveler contact details for your simulated Himalayan trek request. No actual messages or bookings are sent.')

@php
    $hideTopBreadcrumbs = true;
@endphp

@section('content')
<div id="planner-app" data-planner-root class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12); max-width: 820px;">

    @if(!empty($breadcrumbs))
        <div style="margin-bottom: var(--space-4);">
            @include('website_preview.components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
        </div>
    @endif

    <!-- Breadcrumb / Stage indicator -->
    <div style="margin-bottom: var(--space-6);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-3); flex-wrap: wrap; gap: var(--space-2);">
            <div style="display: flex; gap: var(--space-2); align-items: center; flex-wrap: wrap;">
                <span class="website-badge website-badge--accent" style="text-transform: uppercase;">
                    Simulated Step &middot; Sample Contact
                </span>
                <span class="website-micro website-text-muted">No external communications &middot; Zero PII stored</span>
            </div>

            <a href="{{ route('website.planner.review') }}" class="website-small text-primary text-decoration-underline">
                &larr; Back to Plan Review
            </a>
        </div>

        <h1 class="website-h1" style="margin-bottom: var(--space-2);">Sample Contact Details</h1>
        <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.5;">
            In this interactive preview, request submission produces a simulated confirmation receipt. Contact inputs are discarded upon submission and are never saved to disk, database, or analytics.
        </p>
    </div>

    <!-- Notice: Sample data warning -->
    <div class="website-notice website-notice--warning" style="margin-bottom: var(--space-6); padding: var(--space-4);">
        <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
            <div>
                <strong style="color: var(--color-warning-dark); display: block; margin-bottom: var(--space-1);">
                    Sample Preview Mode Only
                </strong>
                <p class="website-small" style="margin: 0; color: var(--color-warning-dark); line-height: 1.4;">
                    Please use fictional or sample contact data below. We have pre-filled standard sample values. Submitting this request sends <strong>zero emails</strong>, dispatches <strong>zero SMS/WhatsApp messages</strong>, and creates <strong>no commercial booking</strong>.
                </p>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="website-notice website-notice--error" style="margin-bottom: var(--space-6); padding: var(--space-4);">
            <strong style="color: var(--color-error-dark); display: block; margin-bottom: var(--space-1);">
                Please check the following fields:
            </strong>
            <ul style="margin: 0; padding-left: var(--space-4); color: var(--color-error-dark); font-size: var(--type-small);">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="display: grid; grid-template-columns: 1fr; gap: var(--space-6);">
        <!-- Form Card -->
        <div class="website-card" style="padding: var(--space-6);">
            <form method="POST" action="{{ route('website.planner.submit') }}" novalidate>
                @csrf
                <input type="hidden" name="idempotency_token" value="{{ $idempotencyToken }}">

                <!-- Name Field -->
                <div style="margin-bottom: var(--space-5);">
                    <label for="contact-name" style="display: block; font-weight: 600; margin-bottom: var(--space-1); font-size: var(--type-small);">
                        Full Name <span style="color: var(--color-error);">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="contact-name" 
                        name="name" 
                        class="website-input @error('name') website-input--error @enderror" 
                        value="{{ old('name', 'Website Traveler') }}" 
                        maxlength="120" 
                        required 
                        style="width: 100%;"
                    >
                    @error('name')
                        <span class="website-micro" style="color: var(--color-error); display: block; margin-top: var(--space-1);">{{ $message }}</span>
                    @else
                        <span class="website-micro website-text-muted" style="display: block; margin-top: var(--space-1);">Pre-filled with fictional sample name. Maximum 120 characters.</span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div style="margin-bottom: var(--space-5);">
                    <label for="contact-email" style="display: block; font-weight: 600; margin-bottom: var(--space-1); font-size: var(--type-small);">
                        Email Address <span style="color: var(--color-error);">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="contact-email" 
                        name="email" 
                        class="website-input @error('email') website-input--error @enderror" 
                        value="{{ old('email', 'traveler@example.test') }}" 
                        maxlength="254" 
                        required 
                        style="width: 100%;"
                    >
                    @error('email')
                        <span class="website-micro" style="color: var(--color-error); display: block; margin-top: var(--space-1);">{{ $message }}</span>
                    @else
                        <span class="website-micro website-text-muted" style="display: block; margin-top: var(--space-1);">Uses RFC-compliant .test reservation domain. Zero messages will be dispatched.</span>
                    @enderror
                </div>

                <!-- Phone Field (Optional) -->
                <div style="margin-bottom: var(--space-5);">
                    <label for="contact-phone" style="display: block; font-weight: 600; margin-bottom: var(--space-1); font-size: var(--type-small);">
                        Phone Number <span class="website-text-muted font-weight-normal">(Optional)</span>
                    </label>
                    <input 
                        type="tel" 
                        id="contact-phone" 
                        name="phone" 
                        class="website-input @error('phone') website-input--error @enderror" 
                        value="{{ old('phone', '') }}" 
                        maxlength="32" 
                        placeholder="e.g. +1 555-0199" 
                        style="width: 100%;"
                    >
                    @error('phone')
                        <span class="website-micro" style="color: var(--color-error); display: block; margin-top: var(--space-1);">{{ $message }}</span>
                    @else
                        <span class="website-micro website-text-muted" style="display: block; margin-top: var(--space-1);">Left blank by default. Up to 32 characters.</span>
                    @enderror
                </div>

                <!-- Preferred Contact Method -->
                <div style="margin-bottom: var(--space-6);">
                    <label style="display: block; font-weight: 600; margin-bottom: var(--space-2); font-size: var(--type-small);">
                        Hypothetical Preferred Contact Method <span style="color: var(--color-error);">*</span>
                    </label>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(170px, 1fr)); gap: var(--space-2);">
                        @php
                            $selectedMethod = old('contact_method', 'email');
                            $methods = [
                                'email' => 'Email',
                                'phone' => 'Phone Call',
                                'whatsapp' => 'WhatsApp',
                                'unsure' => 'No Preference / Unsure',
                            ];
                        @endphp
                        @foreach($methods as $methodVal => $methodLabel)
                            <label style="display: flex; align-items: center; gap: var(--space-2); padding: var(--space-3); border: 1px solid var(--color-border); border-radius: 0 !important; cursor: pointer; @if($selectedMethod === $methodVal) background: var(--color-primary-subtle); @else background: var(--color-surface); @endif">
                                <input type="radio" name="contact_method" value="{{ $methodVal }}" {{ $selectedMethod === $methodVal ? 'checked' : '' }}>
                                <span class="website-small" style="font-weight: 500;">{{ $methodLabel }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('contact_method')
                        <span class="website-micro" style="color: var(--color-error); display: block; margin-top: var(--space-1);">{{ $message }}</span>
                    @else
                        <span class="website-micro website-text-muted" style="display: block; margin-top: var(--space-2);">
                            Specifies a hypothetical preference only. Selecting WhatsApp will never open external chat or share contact info.
                        </span>
                    @enderror
                </div>

                <!-- Journey Snapshot Recap inside form -->
                <div style="padding: var(--space-4); background: var(--color-background-warm); border-radius: 0 !important; margin-bottom: var(--space-6); border: 1px solid var(--color-border);">
                    <strong class="website-small" style="display: block; margin-bottom: var(--space-2); text-transform: uppercase; letter-spacing: 0.05em; color: var(--color-text-muted);">
                        Attached Request Summary
                    </strong>
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-2);">
                        <div>
                            <strong style="font-size: var(--type-body); color: var(--color-primary-dark);">
                                {{ !empty($selectedTrek) ? $selectedTrek['name'] : 'Custom Private Himalayan Journey' }}
                            </strong>
                            <div class="website-micro website-text-secondary" style="margin-top: 2px;">
                                Party of {{ ($draft['adults'] ?? 2) + ($draft['children'] ?? 0) }} travelers &middot; 
                                {{ !empty($draft['available_days']) ? $draft['available_days'] . ' Days' : 'Flexible duration' }}
                                @if(!empty($draft['start_date']))
                                    &middot; Starting {{ \Carbon\CarbonImmutable::parse($draft['start_date'])->format('M j, Y') }}
                                @elseif(!empty($draft['month']))
                                    &middot; Preferred Month: {{ \Carbon\CarbonImmutable::create(2030, $draft['month'], 1)->format('F') }}
                                @endif
                            </div>
                        </div>

                        <div style="text-align: right;">
                            @if(!empty($selectedTrek))
                                @php
                                    $unitRate = $unitPrice ?? $selectedTrek['price_usd'];
                                    $subtotal = $unitRate * (($draft['adults'] ?? 2) + ($draft['children'] ?? 0));
                                @endphp
                                <span class="website-micro website-text-muted" style="display: block;">Illustrative Subtotal</span>
                                <strong style="color: var(--color-primary-dark); font-size: var(--type-h4);">${{ number_format($subtotal) }} USD</strong>
                            @else
                                <span class="website-micro website-text-muted" style="display: block;">Illustrative Quote</span>
                                <strong class="website-small website-text-secondary">To be customized</strong>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Submit and Back Actions -->
                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: var(--space-4); border-top: 1px solid var(--color-border); padding-top: var(--space-5);">
                    <a href="{{ route('website.planner.review') }}" class="website-btn website-btn--ghost">
                        &larr; Back to Plan Review
                    </a>

                    <div style="display: flex; align-items: center; gap: var(--space-3); flex-wrap: wrap;">
                        <span class="website-micro website-text-muted" style="max-width: 220px; line-height: 1.3; text-align: right;">
                            This sends nothing and creates no booking.
                        </span>
                        <button type="submit" class="website-btn website-btn--primary" id="btn-submit-website-plan">
                            Submit Website Request &rarr;
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
