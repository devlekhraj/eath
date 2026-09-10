@extends('website_preview.layout.master')

@section('title', "Plan My Trek — {$stepDetails['title']} (Website)")
@section('meta_description', 'Interactive Himalayan trip planner step: ' . $stepDetails['title'])

@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-12);">

    <!-- 1. Top Mode & Progress Navigation -->
    <div style="margin-bottom: var(--space-6);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-3); flex-wrap: wrap; gap: var(--space-2);">
            <div style="display: flex; gap: var(--space-2); align-items: center; flex-wrap: wrap;">
                <span class="website-badge website-badge--accent" style="text-transform: uppercase;">
                    Mode: {{ ucfirst($draft['mode']) }}
                </span>
                @if(!empty($draft['selected_trek_id']) && isset($treksKeyed[$draft['selected_trek_id']]))
                    <span class="website-badge website-badge--warm">
                        Trek: {{ $treksKeyed[$draft['selected_trek_id']]['name'] }}
                    </span>
                @endif
                <span class="website-micro website-text-muted">Pure Session State · No Booking, Payment or PII Required</span>
            </div>

            <form method="POST" action="{{ route('website.planner.reset') }}" style="display: inline;">
                @csrf
                <button type="submit" class="website-btn website-btn--ghost website-btn--compact" style="color: var(--color-text-muted); font-size: var(--type-micro);" onclick="return confirm('Clear your website draft and return to start?');">
                    Reset Plan
                </button>
            </form>
        </div>

        <!-- Ordered Progress Stepper -->
        <nav aria-label="Planner progress" class="website-planner-nav">
            <ol class="website-planner-steps">
                @foreach($allSteps as $stepKey => $stepMeta)
                    @php
                        $isActive = $currentStep === $stepKey;
                        $isCompleted = in_array($stepKey, $draft['completed_steps'] ?? [], true);
                        $isAccessible = in_array($stepKey, $accessibleSteps, true);
                    @endphp
                    <li class="website-planner-step {{ $isActive ? 'is-active' : '' }} {{ $isCompleted ? 'is-completed' : '' }}"
                        {{ $isActive ? 'aria-current="step"' : '' }}>
                        @if($isAccessible && !$isActive)
                            <a href="{{ route('website.planner.step', ['step' => $stepKey]) }}" class="website-planner-step__link">
                                <span class="website-planner-step__num">{{ $loop->iteration }}</span>
                                <span class="website-planner-step__label">{{ $stepMeta['short'] }}</span>
                            </a>
                        @else
                            <span class="website-planner-step__content">
                                <span class="website-planner-step__num">{{ $loop->iteration }}</span>
                                <span class="website-planner-step__label">{{ $stepMeta['short'] }}</span>
                            </span>
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    </div>

    <!-- 2. Planner Main Grid: Form Body & Summary Sidebar -->
    <div class="website-planner-layout">
        <!-- Main Form Column -->
        <div class="website-planner-main">
            <div class="website-card" style="padding: var(--space-6);">
                <div style="margin-bottom: var(--space-6); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-4);">
                    <span class="website-micro website-text-secondary" style="text-transform: uppercase; letter-spacing: 0.05em;">
                        Step {{ $stepIndex + 1 }} of {{ count($allSteps) }} &middot; {{ $stepDetails['short'] }}
                    </span>
                    <h1 id="planner-step-heading" class="website-h2" style="margin-top: var(--space-1); margin-bottom: var(--space-2);" tabindex="-1">
                        {{ $stepDetails['title'] }}
                    </h1>
                    <p class="website-body website-text-secondary" style="margin: 0; line-height: 1.5;">
                        {{ $stepDetails['description'] }}
                    </p>
                </div>

                <!-- Error Summary Linked to Fields -->
                @if($errors->any())
                    <div id="planner-error-summary" class="website-notice website-notice--error" role="alert" tabindex="-1" style="margin-bottom: var(--space-6);">
                        <h2 class="website-h4" style="color: var(--color-error); margin-bottom: var(--space-2);">Please correct the following:</h2>
                        <ul style="margin: 0; padding-left: var(--space-4);">
                            @foreach($errors->getMessages() as $field => $messages)
                                @foreach($messages as $msg)
                                    <li><a href="#field-{{ $field }}" style="color: var(--color-error); text-decoration: underline;">{{ $msg }}</a></li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Flash Warnings (e.g. departure cleared) -->
                @if(session('warning'))
                    <div class="website-notice website-notice--warning" role="alert" style="margin-bottom: var(--space-6);">
                        <p class="website-body" style="margin: 0;"><strong>Departure Notice:</strong> {{ session('warning') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('website.planner.save_step') }}" id="planner-form" novalidate>
                    @csrf
                    <input type="hidden" name="step" value="{{ $currentStep }}">

                    <!-- ======================================================= -->
                    <!-- STEP 1: TIMING -->
                    <!-- ======================================================= -->
                    @if($currentStep === 'timing')
                        <div style="display: flex; flex-direction: column; gap: var(--space-6); margin-bottom: var(--space-8);">
                            <!-- Fieldset 1: Timing Mode -->
                            <fieldset style="border: none; padding: 0; margin: 0;" id="field-timing_mode">
                                <legend style="font-weight: 600; font-size: 1rem; margin-bottom: var(--space-2); display: block;">
                                    How would you like to choose your travel window? <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </legend>
                                <p class="website-small website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Choose whether you have a locked calendar target, a preferred trekking month, or flexible seasonal dates.
                                </p>
                                @error('timing_mode')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $currentTimingMode = old('timing_mode', $draft['timing_mode'] ?? 'dates');
                                @endphp
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--space-3);">
                                    <label class="website-option-card">
                                        <input type="radio" name="timing_mode" value="dates" {{ $currentTimingMode === 'dates' ? 'checked' : '' }} onchange="updateTimingMode(this.value)">
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Specific Target Dates</strong>
                                            <span class="website-micro website-text-secondary">I have exact arrival dates in mind</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="timing_mode" value="month" {{ $currentTimingMode === 'month' ? 'checked' : '' }} onchange="updateTimingMode(this.value)">
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Preferred Month</strong>
                                            <span class="website-micro website-text-secondary">I know my target travel month</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="timing_mode" value="unsure" {{ $currentTimingMode === 'unsure' ? 'checked' : '' }} onchange="updateTimingMode(this.value)">
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Flexible / Not Sure</strong>
                                            <span class="website-micro website-text-secondary">Explore best seasons to visit</span>
                                        </div>
                                    </label>
                                </div>
                            </fieldset>

                            <!-- Conditional Group A: Exact Target Date -->
                            <div id="timing-dates-container" style="{{ $currentTimingMode === 'dates' ? 'display: block;' : 'display: none;' }} padding: var(--space-4); background: var(--color-background-warm); border-radius: var(--radius-md); border: 1px solid var(--color-border);">
                                <label for="field-start_date" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Target Start Date <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-2);">
                                    Website calendar baseline: September 2030. Earliest allowed website date is September 1, 2030.
                                </p>
                                @error('start_date')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror
                                <input type="date"
                                       id="field-start_date"
                                       name="start_date"
                                       class="website-input @error('start_date') is-invalid @enderror"
                                       min="{{ $minDate }}"
                                       value="{{ old('start_date', $draft['start_date'] ?? '') }}"
                                       style="max-width: 260px;"
                                       aria-describedby="start_date_help">
                                <span id="start_date_help" class="website-micro website-text-muted" style="display: block; margin-top: 4px;">
                                    Format: YYYY-MM-DD (Minimum: {{ $minDate }})
                                </span>
                            </div>

                            <!-- Conditional Group B: Month Selector -->
                            <div id="timing-month-container" style="{{ $currentTimingMode === 'month' ? 'display: block;' : 'display: none;' }} padding: var(--space-4); background: var(--color-background-warm); border-radius: var(--radius-md); border: 1px solid var(--color-border);">
                                <label style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Select Preferred Travel Month <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Autumn (Oct-Nov) and Spring (Mar-Apr) offer peak visibility; winter and monsoon offer quiet uncrowded trails.
                                </p>
                                @error('month')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $selectedMonth = old('month', $draft['month'] ?? '');
                                    $monthNames = [
                                        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
                                        5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
                                        9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
                                    ];
                                @endphp
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(90px, 1fr)); gap: var(--space-2);" id="field-month">
                                    @foreach($monthNames as $num => $abbr)
                                        <label class="website-option-card website-option-card--compact" style="justify-content: center; text-align: center;">
                                            <input type="radio" name="month" value="{{ $num }}" id="field-month-{{ $num }}" {{ (string)$selectedMonth === (string)$num ? 'checked' : '' }}>
                                            <span style="font-weight: 500;">{{ $abbr }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Field 3: Available Duration Days -->
                            <div>
                                <label for="field-available_days" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Available trip duration (Days in Nepal)
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-2);">
                                    Optional: 3 to 30 days. Leave blank if you are completely flexible.
                                </p>
                                @error('available_days')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror
                                <div style="display: flex; align-items: center; gap: var(--space-2);">
                                    <input type="number"
                                           id="field-available_days"
                                           name="available_days"
                                           class="website-input @error('available_days') is-invalid @enderror"
                                           min="3"
                                           max="30"
                                           placeholder="e.g. 14"
                                           value="{{ old('available_days', $draft['available_days'] ?? '') }}"
                                           style="max-width: 160px;">
                                    <span class="website-body website-text-secondary">Days</span>
                                </div>
                            </div>

                            <!-- Field 4: Flexibility -->
                            <div>
                                <label class="website-option-card website-option-card--compact" style="max-width: 420px;">
                                    <input type="checkbox" name="flexible_dates" value="1" {{ old('flexible_dates', $draft['flexible_dates'] ?? true) ? 'checked' : '' }}>
                                    <div>
                                        <span style="font-weight: 500;">My dates have &plusmn;3 days flexibility</span>
                                        <span class="website-micro website-text-muted" style="display: block;">Helps optimize flight connections and acclimatization schedules</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                    <!-- ======================================================= -->
                    <!-- STEP 2: TRAVELERS AND EXPERIENCE -->
                    <!-- ======================================================= -->
                    @elseif($currentStep === 'travelers')
                        <div style="display: flex; flex-direction: column; gap: var(--space-6); margin-bottom: var(--space-8);">
                            <!-- Field 1: Adults -->
                            <div>
                                <label for="field-adults" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Adult Travelers (Ages 18+) <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-2);">
                                    Standard guided party capacity: 1 to 12 adults.
                                </p>
                                @error('adults')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror
                                <input type="number"
                                       id="field-adults"
                                       name="adults"
                                       class="website-input @error('adults') is-invalid @enderror"
                                       min="1"
                                       max="12"
                                       value="{{ old('adults', $draft['adults'] ?? 2) }}"
                                       style="max-width: 160px;"
                                       required
                                       oninput="updateChildrenUI()">
                            </div>

                            <!-- Field 2: Children -->
                            <div>
                                <label for="field-children" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Accompanying Children (Under 18)
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-2);">
                                    Optional: 0 to 6 accompanying minor travelers.
                                </p>
                                @error('children')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror
                                <input type="number"
                                       id="field-children"
                                       name="children"
                                       class="website-input @error('children') is-invalid @enderror"
                                       min="0"
                                       max="6"
                                       value="{{ old('children', $draft['children'] ?? 0) }}"
                                       style="max-width: 160px;"
                                       oninput="updateChildrenUI()">
                            </div>

                            <!-- Child Age Bands Container -->
                            @php
                                $childCount = (int) old('children', $draft['children'] ?? 0);
                                $bands = old('child_age_bands', $draft['child_age_bands'] ?? []);
                            @endphp
                            <div id="child-age-bands-wrapper" style="{{ $childCount > 0 ? 'display: block;' : 'display: none;' }} padding: var(--space-4); background: var(--color-background-warm); border-radius: var(--radius-md); border: 1px solid var(--color-border);" id="field-child_age_bands">
                                <label style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Child Age Categories
                                </label>
                                <div class="website-notice website-notice--info" style="margin-bottom: var(--space-3); padding: var(--space-3);">
                                    <p class="website-micro" style="margin: 0; line-height: 1.4;">
                                        <strong>Logistics Note:</strong> Child age bands are requested solely for sample room configurations, porter loads, and safety planning. We do not infer physical endurance, altitude fitness, or medical capability from age, gender, or nationality.
                                    </p>
                                </div>
                                @error('child_age_bands')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                <div id="child-age-bands-list" style="display: flex; flex-direction: column; gap: var(--space-3);">
                                    @for($i = 0; $i < max(1, min(6, $childCount)); $i++)
                                        <div class="child-band-row" style="display: flex; align-items: center; gap: var(--space-3); flex-wrap: wrap;">
                                            <span style="font-weight: 500; min-width: 90px; font-size: var(--type-small);">Child {{ $i + 1 }}:</span>
                                            <select name="child_age_bands[]" class="website-input" style="max-width: 320px;">
                                                <option value="under_6" {{ ($bands[$i] ?? '') === 'under_6' ? 'selected' : '' }}>Under 6 years (Low-altitude cultural trail)</option>
                                                <option value="6_11" {{ ($bands[$i] ?? '6_11') === '6_11' ? 'selected' : '' }}>6 to 11 years (Family-paced alpine trail)</option>
                                                <option value="12_17" {{ ($bands[$i] ?? '') === '12_17' ? 'selected' : '' }}>12 to 17 years (Standard teahouse trekking)</option>
                                            </select>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <!-- Field 3: Trekking Experience -->
                            <fieldset style="border: none; padding: 0; margin: 0;" id="field-trekking_experience">
                                <legend style="font-weight: 600; font-size: 1rem; margin-bottom: var(--space-1); display: block;">
                                    Alpine Hiking Experience Level <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </legend>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Calibrates acclimatization suggestions and trail steepness. This is a personal preference, never a medical or fitness clearance.
                                </p>
                                @error('trekking_experience')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $expVal = old('trekking_experience', $draft['trekking_experience'] ?? 'some');
                                @endphp
                                <div style="display: flex; flex-direction: column; gap: var(--space-2);">
                                    <label class="website-option-card">
                                        <input type="radio" name="trekking_experience" value="new" {{ $expVal === 'new' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">First time in alpine terrain</strong>
                                            <span class="website-micro website-text-secondary">Comfortable on day walks; looking for well-graded trails up to 2,500m</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="trekking_experience" value="some" {{ $expVal === 'some' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Moderate hiking experience</strong>
                                            <span class="website-micro website-text-secondary">Have walked multiple consecutive days; comfortable up to 3,000m - 3,500m</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="trekking_experience" value="experienced" {{ $expVal === 'experienced' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Experienced high-altitude trekker</strong>
                                            <span class="website-micro website-text-secondary">Prior high-altitude experience above 4,000m; comfortable with steep passes</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="trekking_experience" value="unsure" {{ $expVal === 'unsure' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Varied group experience / Not sure</strong>
                                            <span class="website-micro website-text-secondary">We will suggest balanced routes with built-in acclimatization cushions</span>
                                        </div>
                                    </label>
                                </div>
                            </fieldset>

                            <!-- Field 4: Max Difficulty Ceiling (Optional) -->
                            <div id="field-max_difficulty">
                                <label for="max_difficulty_select" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Maximum Trail Difficulty Ceiling (Optional)
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-2);">
                                    Traveler's explicit preference ceiling. Routes above this rating will be excluded from recommendations.
                                </p>
                                @error('max_difficulty')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror
                                @php
                                    $diffVal = old('max_difficulty', $draft['max_difficulty'] ?? '');
                                @endphp
                                <select id="max_difficulty_select" name="max_difficulty" class="website-input" style="max-width: 360px;">
                                    <option value="" {{ $diffVal === '' || $diffVal === null ? 'selected' : '' }}>No difficulty ceiling (Show all matching routes)</option>
                                    <option value="easy" {{ $diffVal === 'easy' ? 'selected' : '' }}>Easy only (Gentle ascents, lower elevations)</option>
                                    <option value="moderate" {{ $diffVal === 'moderate' ? 'selected' : '' }}>Up to Moderate (Standard trails, passes up to ~4,500m)</option>
                                    <option value="challenging" {{ $diffVal === 'challenging' ? 'selected' : '' }}>Up to Challenging (High passes, remote trails over 5,000m)</option>
                                </select>
                            </div>

                            <!-- Field 5: Daily Walking Hours Comfort Ceiling (Optional) -->
                            <div id="field-walking_hours_max">
                                <label for="walking_hours_max_input" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Daily Walking Hours Ceiling (Optional)
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-2);">
                                    Optional maximum hours of walking per day (2 to 10 hours). Leave blank for standard route staging.
                                </p>
                                @error('walking_hours_max')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror
                                <div style="display: flex; align-items: center; gap: var(--space-2);">
                                    <input type="number"
                                           id="walking_hours_max_input"
                                           name="walking_hours_max"
                                           class="website-input @error('walking_hours_max') is-invalid @enderror"
                                           min="2"
                                           max="10"
                                           placeholder="e.g. 6"
                                           value="{{ old('walking_hours_max', $draft['walking_hours_max'] ?? '') }}"
                                           style="max-width: 160px;">
                                    <span class="website-body website-text-secondary">Hours / day</span>
                                </div>
                            </div>
                        </div>

                    <!-- ======================================================= -->
                    <!-- STEP 3: INTERESTS, COMFORT AND STYLE -->
                    <!-- ======================================================= -->
                    @elseif($currentStep === 'preferences')
                        <div style="display: flex; flex-direction: column; gap: var(--space-6); margin-bottom: var(--space-8);">
                            <!-- Field 1: Experience & Landscape Interests -->
                            <fieldset style="border: none; padding: 0; margin: 0;" id="field-interests">
                                <legend style="font-weight: 600; font-size: 1rem; margin-bottom: var(--space-1); display: block;">
                                    Himalayan Landscape &amp; Cultural Interests (Select up to 6)
                                </legend>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Interests influence sample itinerary ranking. Preferences do not guarantee specific weather, lodge vacancy, or wildlife encounters.
                                </p>
                                @error('interests')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $selectedInterests = old('interests', $draft['interests'] ?? []);
                                @endphp
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: var(--space-3);">
                                    @foreach($experiences as $exp)
                                        @php
                                            $isChecked = in_array($exp['id'], $selectedInterests, true);
                                        @endphp
                                        <label class="website-option-card">
                                            <input type="checkbox" name="interests[]" value="{{ $exp['id'] }}" id="field-exp-{{ $exp['id'] }}" {{ $isChecked ? 'checked' : '' }}>
                                            <div>
                                                <strong style="display: block; font-size: var(--type-body);">{{ $exp['name'] }}</strong>
                                                <span class="website-micro website-text-secondary" style="display: block; margin-top: 2px;">
                                                    {{ $exp['short_description'] ?? 'Curated Himalayan experience highlight' }}
                                                </span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>

                            <!-- Field 2: Accommodation Comfort Level -->
                            <fieldset style="border: none; padding: 0; margin: 0;" id="field-accommodation">
                                <legend style="font-weight: 600; font-size: 1rem; margin-bottom: var(--space-1); display: block;">
                                    Teahouse &amp; Lodge Comfort Preference <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </legend>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Himalayan teahouse standards vary by altitude and valley. We prioritize verified hygienic lodges with local hosting.
                                </p>
                                @error('accommodation')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $accomVal = old('accommodation', $draft['accommodation'] ?? 'standard');
                                @endphp
                                <div style="display: flex; flex-direction: column; gap: var(--space-2);">
                                    <label class="website-option-card">
                                        <input type="radio" name="accommodation" value="standard" {{ $accomVal === 'standard' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Standard Himalayan Teahouses</strong>
                                            <span class="website-micro website-text-secondary">Authentic family-run mountain lodges, twin-share bedrooms, common dining room stove</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="accommodation" value="upgraded" {{ $accomVal === 'upgraded' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Comfort / Upgraded Lodges (Where available)</strong>
                                            <span class="website-micro website-text-secondary">En-suite bathrooms and electric blankets where trail infrastructure permits</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="accommodation" value="no_preference" {{ $accomVal === 'no_preference' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">No specific preference</strong>
                                            <span class="website-micro website-text-secondary">Open to whatever best fits the itinerary and altitude zone</span>
                                        </div>
                                    </label>
                                </div>
                            </fieldset>

                            <!-- Field 3: Trekking Pace -->
                            <fieldset style="border: none; padding: 0; margin: 0;" id="field-pace">
                                <legend style="font-weight: 600; font-size: 1rem; margin-bottom: var(--space-1); display: block;">
                                    Daily Trail Pace &amp; Acclimatization Rhythm <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </legend>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Determines stage distances and rest pauses between mountain villages.
                                </p>
                                @error('pace')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $paceVal = old('pace', $draft['pace'] ?? 'balanced');
                                @endphp
                                <div style="display: flex; flex-direction: column; gap: var(--space-2);">
                                    <label class="website-option-card">
                                        <input type="radio" name="pace" value="relaxed" {{ $paceVal === 'relaxed' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Relaxed Pace</strong>
                                            <span class="website-micro website-text-secondary">Shorter daily walking stages (4-5 hrs), extra rest breaks, conservative acclimatization</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="pace" value="balanced" {{ $paceVal === 'balanced' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Balanced Pace (Standard Himalayan)</strong>
                                            <span class="website-micro website-text-secondary">Standard daily stages (5-6 hrs), proven altitude acclimatization schedule</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="pace" value="active" {{ $paceVal === 'active' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Active Pace</strong>
                                            <span class="website-micro website-text-secondary">Longer trekking days (6-8+ hrs), higher passes, dynamic mountain pacing</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="pace" value="no_preference" {{ $paceVal === 'no_preference' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">No specific preference</strong>
                                            <span class="website-micro website-text-secondary">Recommend based on regional terrain norms</span>
                                        </div>
                                    </label>
                                </div>
                            </fieldset>

                            <!-- Field 4: Trip Style -->
                            <fieldset style="border: none; padding: 0; margin: 0;" id="field-trip_style">
                                <legend style="font-weight: 600; font-size: 1rem; margin-bottom: var(--space-1); display: block;">
                                    Guided Trip Style Preference <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </legend>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Operational style request. In this website preview, scheduled departure seats are sample values.
                                </p>
                                @error('trip_style')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $styleVal = old('trip_style', $draft['trip_style'] ?? 'private');
                                @endphp
                                <div style="display: flex; flex-direction: column; gap: var(--space-2);">
                                    <label class="website-option-card">
                                        <input type="radio" name="trip_style" value="private" {{ $styleVal === 'private' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Private Guided Journey</strong>
                                            <span class="website-micro website-text-secondary">Dedicated licensed guide and porter crew exclusively for your party</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="trip_style" value="group" {{ $styleVal === 'group' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Small Group Departure</strong>
                                            <span class="website-micro website-text-secondary">Join fellow international hikers on scheduled fixed departure dates</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="trip_style" value="no_preference" {{ $styleVal === 'no_preference' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">No specific preference</strong>
                                            <span class="website-micro website-text-secondary">Compare private vs group options during recommendations</span>
                                        </div>
                                    </label>
                                </div>
                            </fieldset>
                        </div>

                    <!-- ======================================================= -->
                    <!-- STEP 4: BUDGET AND REQUESTED CHANGES -->
                    <!-- ======================================================= -->
                    @elseif($currentStep === 'budget')
                        <div style="display: flex; flex-direction: column; gap: var(--space-6); margin-bottom: var(--space-8);">
                            <!-- Field 1: Target Ground Package Budget (USD) -->
                            <div id="field-budget_max_usd">
                                <label for="budget_max_usd_input" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Target Ground Package Budget per person (USD)
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-2);">
                                    Optional guideline ($100 &ndash; $10,000 USD per person). Covers guide, porters, national park permits, all teahouse lodging, and meals on the trail.
                                </p>
                                @error('budget_max_usd')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror
                                <div style="display: flex; align-items: center; gap: var(--space-2);">
                                    <span style="font-weight: 600; color: var(--color-primary); font-size: 1.1rem;">$</span>
                                    <input type="number"
                                           id="budget_max_usd_input"
                                           name="budget_max_usd"
                                           class="website-input @error('budget_max_usd') is-invalid @enderror"
                                           min="100"
                                           max="10000"
                                           step="50"
                                           placeholder="e.g. 1500"
                                           value="{{ old('budget_max_usd', $draft['budget_max_usd'] ?? '') }}"
                                           style="max-width: 200px;">
                                    <span class="website-body website-text-secondary">USD / person</span>
                                </div>
                            </div>

                            <!-- Field 2: Does Budget Include Flights? -->
                            <fieldset style="border: none; padding: 0; margin: 0;" id="field-budget_includes_flights">
                                <legend style="font-weight: 600; font-size: 1rem; margin-bottom: var(--space-1); display: block;">
                                    Does this budget guideline include international flights? <span style="color: var(--color-error);" aria-hidden="true">*</span>
                                </legend>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Our packages cover ground operations in Nepal. If flights are included or unsure, we cannot deduce total affordability without knowing your origin city; we will rank routes using base ground package pricing.
                                </p>
                                @error('budget_includes_flights')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $flightVal = old('budget_includes_flights', $draft['budget_includes_flights'] ?? 'no');
                                @endphp
                                <div style="display: flex; flex-direction: column; gap: var(--space-2);">
                                    <label class="website-option-card">
                                        <input type="radio" name="budget_includes_flights" value="no" {{ $flightVal === 'no' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">No &mdash; Ground package in Nepal only</strong>
                                            <span class="website-micro website-text-secondary">Recommended: best matches published Nepal package rates</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="budget_includes_flights" value="yes" {{ $flightVal === 'yes' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Yes &mdash; Total trip budget including airfare</strong>
                                            <span class="website-micro website-text-secondary">We will exclude budget from strict scoring and explain required airfare estimates</span>
                                        </div>
                                    </label>
                                    <label class="website-option-card">
                                        <input type="radio" name="budget_includes_flights" value="unsure" {{ $flightVal === 'unsure' ? 'checked' : '' }}>
                                        <div>
                                            <strong style="display: block; font-size: var(--type-body);">Unsure at this stage</strong>
                                            <span class="website-micro website-text-secondary">You can evaluate routes on transparent ground package pricing</span>
                                        </div>
                                    </label>
                                </div>
                            </fieldset>

                            <!-- Field 3: Known Add-ons -->
                            <fieldset style="border: none; padding: 0; margin: 0;" id="field-addons">
                                <legend style="font-weight: 600; font-size: 1rem; margin-bottom: var(--space-1); display: block;">
                                    Indicative Trip Add-on Requests (Optional)
                                </legend>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                    Select optional enhancements. Add-ons are custom requests and are unpriced in this sample preview.
                                </p>
                                @error('addons')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror

                                @php
                                    $selectedAddons = old('addons', $draft['addons'] ?? []);
                                @endphp
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: var(--space-3);">
                                    @foreach($addons as $addon)
                                        @php
                                            $isAddonChecked = in_array($addon['id'], $selectedAddons, true);
                                        @endphp
                                        <label class="website-option-card">
                                            <input type="checkbox" name="addons[]" value="{{ $addon['id'] }}" id="field-addon-{{ $addon['id'] }}" {{ $isAddonChecked ? 'checked' : '' }}>
                                            <div>
                                                <strong style="display: block; font-size: var(--type-body);">{{ $addon['label'] }}</strong>
                                                <span class="website-micro website-text-muted">Unpriced Custom Request</span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>

                            <!-- Field 4: Special Requests / Traveler Notes -->
                            <div id="field-special_requests">
                                <label for="special_requests_input" style="display: block; font-weight: 600; margin-bottom: var(--space-1);">
                                    Special Requests or Dietary Notes (Max 1,000 characters)
                                </label>
                                <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-2);">
                                    Share dietary preferences, specific viewpoints of interest, or party requirements.
                                </p>
                                @error('special_requests')
                                    <p class="website-small" style="color: var(--color-error); margin-bottom: var(--space-2);" role="alert">{{ $message }}</p>
                                @enderror
                                <textarea id="special_requests_input"
                                          name="special_requests"
                                          rows="4"
                                          maxlength="1000"
                                          class="website-input @error('special_requests') is-invalid @enderror"
                                          placeholder="e.g. Vegetarian meals preferred, interested in photography sunrise viewpoint at sunrise..."
                                          style="width: 100%; resize: vertical;">{{ old('special_requests', $draft['special_requests'] ?? '') }}</textarea>

                                <div class="website-notice website-notice--warning" style="margin-top: var(--space-2); padding: var(--space-3);">
                                    <p class="website-micro" style="margin: 0; line-height: 1.4;">
                                        <strong>Website Privacy Disclosure:</strong> Do NOT enter personal contact details, passport information, medical history, or payment card numbers here. All entered notes are safely escaped and saved exclusively in this local website session draft.
                                    </p>
                                </div>
                            </div>
                        </div>

                    <!-- ======================================================= -->
                    <!-- STEP 5: RECOMMENDATIONS -->
                    <!-- ======================================================= -->
                    @elseif($currentStep === 'recommendations')
                        <div style="margin-bottom: var(--space-8);">
                            <!-- Top Website Scoring Explanation -->
                            <div class="website-notice website-notice--info" style="margin-bottom: var(--space-6); padding: var(--space-4);">
                                <h3 class="website-h4" style="margin-top: 0; margin-bottom: var(--space-1); font-size: 0.95rem;">
                                    Sample suggestions based on your preferences &mdash; not a safety assessment or quote
                                </h3>
                                <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.5;">
                                    Rankings are deterministically calculated against your stated travel window, alpine experience, comfort pacing, and ground budget. Mountain suitability requires individual consultation before real travel.
                                </p>
                            </div>

                            <!-- Selected Trek Status (If mode was 'selected' or a trek is already chosen) -->
                            @if(!empty($recommendationResult['selected_evaluation']))
                                @php
                                    $sel = $recommendationResult['selected_evaluation'];
                                    $selTrek = $sel['trek'];
                                @endphp
                                @if(!$sel['is_eligible'])
                                    <!-- Selection Conflict Banner -->
                                    <div class="website-notice website-notice--warning" style="margin-bottom: var(--space-6); padding: var(--space-4);">
                                        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: var(--space-2); margin-bottom: var(--space-2); flex-wrap: wrap;">
                                            <div>
                                                <span class="website-badge website-badge--warm" style="margin-bottom: var(--space-1);">Selection Conflict</span>
                                                <h3 class="website-h4" style="margin: 0;">{{ $selTrek['name'] }} does not match your current preferences</h3>
                                            </div>
                                            <span class="website-micro website-text-secondary">{{ $selTrek['duration_days'] }} Days &middot; {{ ucfirst($selTrek['difficulty']) }}</span>
                                        </div>
                                        <ul style="margin: 0 0 var(--space-3) 0; padding-left: var(--space-4); color: var(--color-warning-dark); font-size: var(--type-small);">
                                            @foreach($sel['hard_filter_conflicts'] as $conflict)
                                                <li>{{ $conflict }}</li>
                                            @endforeach
                                        </ul>
                                        <p class="website-micro website-text-secondary" style="margin-bottom: var(--space-3);">
                                            You may adjust your duration or difficulty ceiling, choose an eligible matching route below, or continue this journey as a custom private request.
                                        </p>
                                        <div style="display: flex; gap: var(--space-2); flex-wrap: wrap;">
                                            <a href="{{ route('website.planner.step', ['step' => 'timing']) }}" class="website-btn website-btn--outline website-btn--compact">
                                                Edit Preferences
                                            </a>
                                            <button type="submit" name="action" value="custom_request" class="website-btn website-btn--ghost website-btn--compact">
                                                Continue as Custom Request
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <!-- Selected Trek Confirmed Fit -->
                                    <div class="website-card" style="padding: var(--space-4); margin-bottom: var(--space-6); background: var(--color-background-warm); border: 2px solid var(--color-primary-light);">
                                        <div style="display: flex; justify-content: space-between; align-items: center; gap: var(--space-2); flex-wrap: wrap; margin-bottom: var(--space-2);">
                                            <span class="website-badge website-badge--primary">Your Selected Journey</span>
                                            <span class="website-micro website-text-secondary">Confirmed Fit with Hard Preferences</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; gap: var(--space-3); flex-wrap: wrap;">
                                            <div>
                                                <h3 class="website-h3" style="margin: 0;">{{ $selTrek['name'] }}</h3>
                                                <span class="website-small website-text-secondary">
                                                    {{ $selTrek['duration_days'] }} Days &middot; {{ ucfirst($selTrek['difficulty']) }} &middot; Max {{ number_format($selTrek['max_altitude_m']) }}m &middot; Ground Rate: ${{ number_format($selTrek['price_usd']) }} USD
                                                </span>
                                            </div>
                                            <button type="submit" name="selected_trek_id" value="{{ $sel['trek_id'] }}" class="website-btn website-btn--primary">
                                                Proceed with {{ $selTrek['name'] }} &rarr;
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            <!-- Recommendations List -->
                            <div style="margin-bottom: var(--space-4);">
                                <h2 class="website-h3" style="margin-bottom: var(--space-3);">
                                    @if($recommendationResult['has_eligible'])
                                        Top Recommended Himalayan Routes
                                    @else
                                        Catalog Match Results
                                    @endif
                                </h2>

                                @if($recommendationResult['has_eligible'])
                                    <div style="display: flex; flex-direction: column; gap: var(--space-4);">
                                        @foreach($recommendationResult['top_recommendations'] as $cand)
                                            @php
                                                $trek = $cand['trek'];
                                                $isSelectedThis = ($draft['selected_trek_id'] ?? '') === $cand['trek_id'];
                                            @endphp
                                            <article class="website-recommendation-card {{ $isSelectedThis ? 'is-selected' : '' }}" id="candidate-{{ $cand['trek_id'] }}">
                                                <div class="website-recommendation-card__media">
                                                    @if(!empty($trek['hero_image']['url']))
                                                        <img src="{{ $trek['hero_image']['url'] }}" alt="{{ $trek['name'] }}" loading="lazy">
                                                    @endif
                                                </div>

                                                <div class="website-recommendation-card__content">
                                                    <div class="website-recommendation-card__header">
                                                        <div>
                                                            <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-1); flex-wrap: wrap;">
                                                                <span class="website-badge website-badge--{{ $cand['badge_variant'] }}">
                                                                    {{ $cand['label'] }}
                                                                </span>
                                                                <span class="website-micro website-text-secondary">
                                                                    {{ $trek['region']['name'] }} Region
                                                                </span>
                                                            </div>
                                                            <h3 class="website-h3" style="margin: 0;">
                                                                <a href="{{ route('website.treks.show', $trek['slug']) }}?from=planner" class="text-primary" style="text-decoration: none;">
                                                                    {{ $trek['name'] }}
                                                                </a>
                                                            </h3>
                                                        </div>

                                                        <div style="text-align: right;">
                                                            <span class="website-micro website-text-muted" style="display: block;">Ground package from</span>
                                                            <strong style="font-size: var(--type-h3); color: var(--color-primary-dark);">${{ number_format($trek['price_usd']) }}</strong>
                                                            <span class="website-micro website-text-secondary"> USD</span>
                                                        </div>
                                                    </div>

                                                    <!-- Key Facts Strip -->
                                                    <div style="display: flex; gap: var(--space-4); font-size: var(--type-small); color: var(--color-text-secondary); border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border); padding: var(--space-2) 0; flex-wrap: wrap;">
                                                        <span><strong>{{ $trek['duration_days'] }}</strong> Days</span>
                                                        <span><strong>{{ ucfirst($trek['difficulty']) }}</strong> Grade</span>
                                                        <span>Max <strong>{{ number_format($trek['max_altitude_m']) }}m</strong></span>
                                                        <span>Daily <strong>{{ $trek['walking_hours_max'] ?? '5-6' }} hrs</strong></span>
                                                    </div>

                                                    <!-- Why it fits (Matched Signals) -->
                                                    @if(!empty($cand['matched_signals']))
                                                        <div class="website-recommendation-card__reasons">
                                                            <strong style="color: var(--color-primary-dark); display: block;">Why this journey fits your preferences:</strong>
                                                            <ul>
                                                                @foreach($cand['matched_signals'] as $sig)
                                                                    <li>{{ $sig }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    <!-- Trade-offs and unknowns -->
                                                    @if(!empty($cand['tradeoffs']))
                                                        <div class="website-recommendation-card__tradeoffs">
                                                            <strong style="color: var(--color-warm-dark); display: block;">Trade-offs &amp; Planning Considerations:</strong>
                                                            <ul>
                                                                @foreach($cand['tradeoffs'] as $tradeoff)
                                                                    <li>{{ $tradeoff }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if(!empty($cand['children_note']))
                                                        <div class="website-notice website-notice--info" style="padding: var(--space-2) var(--space-3); margin: 0;">
                                                            <p class="website-micro" style="margin: 0;">
                                                                <strong>Family Planning Note:</strong> {{ $cand['children_note'] }}
                                                            </p>
                                                        </div>
                                                    @endif

                                                    <!-- Card Actions -->
                                                    <div class="website-recommendation-card__actions">
                                                        <button type="submit" name="selected_trek_id" value="{{ $cand['trek_id'] }}" class="website-btn {{ $isSelectedThis ? 'website-btn--outline' : 'website-btn--primary' }}">
                                                            {{ $isSelectedThis ? 'Keep Selected Trek &rarr;' : 'Choose This Trek &rarr;' }}
                                                        </button>
                                                        <a href="{{ route('website.treks.show', $trek['slug']) }}?from=planner" class="website-btn website-btn--ghost">
                                                            View Trek Details
                                                        </a>
                                                        <button type="button"
                                                                class="website-btn website-btn--outline website-btn--compact"
                                                                data-compare-btn
                                                                data-trek-id="{{ $cand['trek_id'] }}"
                                                                aria-pressed="false">
                                                            <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                                <rect x="3" y="3" width="7" height="18"></rect>
                                                                <rect x="14" y="3" width="7" height="18"></rect>
                                                            </svg>
                                                            <span>Add to Compare</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                @else
                                    <!-- No Qualifying Treks (e.g. available_days = 5) -->
                                    <div class="website-notice website-notice--warning" style="padding: var(--space-6);">
                                        <h3 class="website-h3" style="margin-top: 0; margin-bottom: var(--space-2); color: var(--color-warning-dark);">
                                            No catalog treks match your hard preference ceiling
                                        </h3>
                                        <p class="website-body" style="margin-bottom: var(--space-3); line-height: 1.6;">
                                            None of our standard 8 Himalayan routes satisfy all of your specific criteria.
                                            @if(!empty($draft['available_days']))
                                                Your available duration of <strong>{{ $draft['available_days'] }} days</strong> is shorter than our shortest standard trek (Mardi Himal requires at least 7 days).
                                            @endif
                                            @if(!empty($draft['max_difficulty']))
                                                Your difficulty ceiling is set to <strong>{{ ucfirst($draft['max_difficulty']) }}</strong>.
                                            @endif
                                        </p>
                                        <p class="website-body website-text-secondary" style="margin-bottom: var(--space-4);">
                                            We offer two clear ways to proceed: you can adjust your travel duration or fitness ceiling, or request a completely bespoke custom private trek tailored to your available days.
                                        </p>
                                        <div style="display: flex; gap: var(--space-3); flex-wrap: wrap;">
                                            <a href="{{ route('website.planner.step', ['step' => 'timing']) }}" class="website-btn website-btn--outline">
                                                Adjust Duration &amp; Dates
                                            </a>
                                            <button type="submit" name="action" value="custom_request" class="website-btn website-btn--primary">
                                                Continue as Custom Private Request &rarr;
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    <!-- ======================================================= -->
                    <!-- REVIEW STEP PLACEHOLDER (Phase 13) -->
                    <!-- ======================================================= -->
                    @else
                        <div style="padding: var(--space-6); background: var(--color-background-warm); border-radius: var(--radius-md); margin-bottom: var(--space-6);">
                            <h2 class="website-h3" style="margin-bottom: var(--space-2);">Step Preview: {{ $stepDetails['title'] }}</h2>
                            <p class="website-body website-text-secondary">
                                Complete itinerary review, sample contact, and simulated booking confirmation are handled in Phase 13.
                            </p>
                        </div>
                    @endif

                    <!-- Accessible Mobile Disclosure (Rendered right above buttons on small screens) -->
                    <details class="website-planner-mobile-summary">
                        <summary>
                            <span>Trip Draft Summary</span>
                            <span class="website-badge website-badge--neutral">View Selections</span>
                        </summary>
                        <div class="website-planner-mobile-summary__body">
                            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-2); font-size: var(--type-small);">
                                <li style="display: flex; justify-content: space-between;">
                                    <span class="website-text-secondary">Mode:</span>
                                    <strong style="text-transform: capitalize;">{{ $draft['mode'] }}</strong>
                                </li>
                                @if(!empty($draft['selected_trek_id']) && isset($treksKeyed[$draft['selected_trek_id']]))
                                    <li style="display: flex; justify-content: space-between;">
                                        <span class="website-text-secondary">Trek:</span>
                                        <strong>{{ $treksKeyed[$draft['selected_trek_id']]['name'] }}</strong>
                                    </li>
                                @endif
                                <li style="display: flex; justify-content: space-between;">
                                    <span class="website-text-secondary">Party:</span>
                                    <strong>{{ $draft['adults'] ?? 2 }} Adults{{ ($draft['children'] ?? 0) > 0 ? ', ' . $draft['children'] . ' Kids' : '' }}</strong>
                                </li>
                                @if(!empty($draft['available_days']))
                                    <li style="display: flex; justify-content: space-between;">
                                        <span class="website-text-secondary">Duration:</span>
                                        <strong>{{ $draft['available_days'] }} Days</strong>
                                    </li>
                                @endif
                                @if(!empty($draft['pace']))
                                    <li style="display: flex; justify-content: space-between;">
                                        <span class="website-text-secondary">Pace:</span>
                                        <strong style="text-transform: capitalize;">{{ $draft['pace'] }}</strong>
                                    </li>
                                @endif
                                @if(!empty($draft['budget_max_usd']))
                                    <li style="display: flex; justify-content: space-between;">
                                        <span class="website-text-secondary">Budget:</span>
                                        <strong>${{ number_format($draft['budget_max_usd']) }} USD</strong>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </details>

                    <!-- Step Navigation Actions: Back & Continue -->
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--color-border); padding-top: var(--space-5); flex-wrap: wrap; gap: var(--space-3);">
                        @if($prevStep)
                            <a href="{{ route('website.planner.step', ['step' => $prevStep]) }}" class="website-btn website-btn--ghost">
                                &larr; Back to {{ $allSteps[$prevStep]['short'] }}
                            </a>
                        @else
                            <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--ghost">
                                &larr; Start Page
                            </a>
                        @endif

                        <div style="display: flex; gap: var(--space-3); flex-wrap: wrap; align-items: center;">
                            @if($currentStep === 'budget')
                                @if(($draft['mode'] ?? '') === 'custom')
                                    <button type="submit" name="action" value="custom_request" class="website-btn website-btn--outline">
                                        Continue as Custom Request &rarr;
                                    </button>
                                @endif
                                <button type="submit" name="action" value="suggestions" class="website-btn website-btn--primary">
                                    View Sample Suggestions &rarr;
                                </button>
                            @elseif($currentStep === 'recommendations')
                                <button type="submit" name="action" value="custom_request" class="website-btn website-btn--outline">
                                    Continue as Custom Request &rarr;
                                </button>
                                @if(!empty($draft['selected_trek_id']))
                                    <button type="submit" name="action" value="proceed" class="website-btn website-btn--primary">
                                        Review Itinerary &rarr;
                                    </button>
                                @endif
                            @else
                                <button type="submit" class="website-btn website-btn--primary">
                                    Continue &rarr;
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Summary Sidebar (Desktop Only) -->
        <aside class="website-planner-sidebar" aria-label="Trip draft summary">
            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm);">
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-2); margin-bottom: var(--space-3);">
                    <h2 class="website-h4" style="margin: 0; font-size: 1rem;">
                        Trip Draft Summary
                    </h2>
                    <span class="website-badge website-badge--accent" style="text-transform: uppercase; font-size: 0.7rem;">
                        {{ $draft['mode'] }}
                    </span>
                </div>

                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-3); font-size: var(--type-small);">
                    <!-- Trek selection -->
                    @if(!empty($draft['selected_trek_id']) && isset($treksKeyed[$draft['selected_trek_id']]))
                        <li style="border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: var(--space-2);">
                            <span class="website-micro website-text-secondary" style="display: block;">Selected Trek:</span>
                            <a href="{{ route('website.treks.show', $treksKeyed[$draft['selected_trek_id']]['slug']) }}" class="text-primary text-decoration-underline" style="font-weight: 600;">
                                {{ $treksKeyed[$draft['selected_trek_id']]['name'] }}
                            </a>
                            <span class="website-micro website-text-muted" style="display: block;">{{ $treksKeyed[$draft['selected_trek_id']]['duration_days'] }} Days &middot; {{ ucfirst($treksKeyed[$draft['selected_trek_id']]['difficulty']) }}</span>
                        </li>
                    @endif

                    <!-- Step 1 Summary: Timing -->
                    <li style="border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: var(--space-2);">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <span class="website-micro website-text-secondary">Dates &amp; Timing:</span>
                            @if(in_array('timing', $draft['completed_steps'] ?? [], true))
                                <a href="{{ route('website.planner.step', ['step' => 'timing']) }}" class="website-micro text-primary text-decoration-underline">Edit</a>
                            @endif
                        </div>
                        @if(!empty($draft['timing_mode']))
                            @if($draft['timing_mode'] === 'dates' && !empty($draft['start_date']))
                                <strong style="display: block;">{{ \Carbon\CarbonImmutable::parse($draft['start_date'])->format('M j, Y') }}</strong>
                            @elseif($draft['timing_mode'] === 'month' && !empty($draft['month']))
                                <strong style="display: block;">{{ \Carbon\CarbonImmutable::create(2030, $draft['month'], 1)->format('F') }} (Preferred)</strong>
                            @else
                                <strong style="display: block;">Flexible Dates</strong>
                            @endif
                        @else
                            <span class="website-micro website-text-muted">Not selected yet</span>
                        @endif
                        @if(!empty($draft['available_days']))
                            <span class="website-micro website-text-secondary" style="display: block;">Duration: {{ $draft['available_days'] }} Days in Nepal</span>
                        @endif
                    </li>

                    <!-- Step 2 Summary: Travelers & Experience -->
                    <li style="border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: var(--space-2);">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <span class="website-micro website-text-secondary">Party &amp; Experience:</span>
                            @if(in_array('travelers', $draft['completed_steps'] ?? [], true))
                                <a href="{{ route('website.planner.step', ['step' => 'travelers']) }}" class="website-micro text-primary text-decoration-underline">Edit</a>
                            @endif
                        </div>
                        <strong style="display: block;">
                            {{ $draft['adults'] ?? 2 }} Adults{{ ($draft['children'] ?? 0) > 0 ? ', ' . $draft['children'] . ' Children' : '' }}
                        </strong>
                        @if(!empty($draft['trekking_experience']))
                            <span class="website-micro website-text-secondary" style="display: block;">Experience: {{ ucfirst($draft['trekking_experience']) }}</span>
                        @endif
                        @if(!empty($draft['max_difficulty']))
                            <span class="website-micro website-text-secondary" style="display: block;">Ceiling: {{ ucfirst($draft['max_difficulty']) }}</span>
                        @endif
                    </li>

                    <!-- Step 3 Summary: Preferences -->
                    <li style="border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: var(--space-2);">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <span class="website-micro website-text-secondary">Preferences &amp; Pace:</span>
                            @if(in_array('preferences', $draft['completed_steps'] ?? [], true))
                                <a href="{{ route('website.planner.step', ['step' => 'preferences']) }}" class="website-micro text-primary text-decoration-underline">Edit</a>
                            @endif
                        </div>
                        @if(!empty($draft['pace']))
                            <strong style="display: block;">{{ ucfirst($draft['pace']) }} Pace &middot; {{ ucfirst($draft['trip_style'] ?? 'Private') }}</strong>
                        @else
                            <span class="website-micro website-text-muted">Not configured yet</span>
                        @endif
                        @if(!empty($draft['interests']))
                            <span class="website-micro website-text-secondary" style="display: block;">{{ count($draft['interests']) }} Interests Selected</span>
                        @endif
                    </li>

                    <!-- Step 4 Summary: Budget -->
                    <li>
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <span class="website-micro website-text-secondary">Budget Guideline:</span>
                            @if(in_array('budget', $draft['completed_steps'] ?? [], true))
                                <a href="{{ route('website.planner.step', ['step' => 'budget']) }}" class="website-micro text-primary text-decoration-underline">Edit</a>
                            @endif
                        </div>
                        @if(!empty($draft['budget_max_usd']))
                            <strong style="display: block;">${{ number_format($draft['budget_max_usd']) }} USD / person</strong>
                            <span class="website-micro website-text-muted" style="display: block;">Flights: {{ ucfirst($draft['budget_includes_flights'] ?? 'no') }}</span>
                        @else
                            <span class="website-micro website-text-muted">Standard ground rates</span>
                        @endif
                        @if(!empty($draft['addons']))
                            <span class="website-micro website-text-secondary" style="display: block;">{{ count($draft['addons']) }} Add-on Requests</span>
                        @endif
                    </li>
                </ul>

                <div style="margin-top: var(--space-4); border-top: 1px solid var(--color-border); padding-top: var(--space-3);">
                    <span class="website-micro website-text-muted" style="display: block; line-height: 1.4;">
                        Session draft expires after 2 hours of inactivity. Edits on earlier steps preserve downstream answers and safely invalidate conflicting choices.
                    </span>
                </div>
            </div>
        </aside>
    </div>
</div>

<script>
function updateTimingMode(mode) {
    const datesEl = document.getElementById('timing-dates-container');
    const monthEl = document.getElementById('timing-month-container');
    if (datesEl && monthEl) {
        datesEl.style.display = (mode === 'dates') ? 'block' : 'none';
        monthEl.style.display = (mode === 'month') ? 'block' : 'none';
    }
}

function updateChildrenUI() {
    const childrenInput = document.getElementById('field-children');
    const wrapper = document.getElementById('child-age-bands-wrapper');
    const list = document.getElementById('child-age-bands-list');
    if (!childrenInput || !wrapper || !list) return;

    const count = Math.max(0, Math.min(6, parseInt(childrenInput.value, 10) || 0));
    wrapper.style.display = count > 0 ? 'block' : 'none';

    // Existing rows
    let currentRows = list.querySelectorAll('.child-band-row');
    while (currentRows.length > count) {
        currentRows[currentRows.length - 1].remove();
        currentRows = list.querySelectorAll('.child-band-row');
    }
    while (currentRows.length < count) {
        const i = currentRows.length;
        const div = document.createElement('div');
        div.className = 'child-band-row';
        div.style.cssText = 'display: flex; align-items: center; gap: var(--space-3); flex-wrap: wrap;';
        div.innerHTML = `
            <span style="font-weight: 500; min-width: 90px; font-size: var(--type-small);">Child ${i + 1}:</span>
            <select name="child_age_bands[]" class="website-input" style="max-width: 320px;">
                <option value="under_6">Under 6 years (Low-altitude cultural trail)</option>
                <option value="6_11" selected>6 to 11 years (Family-paced alpine trail)</option>
                <option value="12_17">12 to 17 years (Standard teahouse trekking)</option>
            </select>
        `;
        list.appendChild(div);
        currentRows = list.querySelectorAll('.child-band-row');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Focus error summary if present
    const errSummary = document.getElementById('planner-error-summary');
    if (errSummary) {
        errSummary.focus();
    } else {
        const stepHeading = document.getElementById('planner-step-heading');
        if (stepHeading && window.location.search.includes('step=')) {
            stepHeading.focus();
        }
    }
});
</script>
@endsection
