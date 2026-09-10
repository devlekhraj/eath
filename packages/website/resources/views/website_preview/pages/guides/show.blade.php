@extends('website_preview.layout.master')

@section('title', $guide['name'] . ' | Mountain Guide Profile | EATH Trekking Website')
@section('meta_description', 'Sample mountain guide profile for ' . $guide['name'] . ' (' . $guide['role'] . ') illustrating route leadership and expedition pacing for EATH.')


@section('content')
<div class="website-container" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    {{-- 2. Header & Split Overview: Portrait & Profile Identity --}}
    <div style="display: grid; grid-template-columns: 1fr; gap: var(--space-8); margin-bottom: var(--space-12); align-items: start;" class="website-guide-header-layout">
        {{-- Portrait Placeholder --}}
        <div style="max-width: 340px; width: 100%;">
            <div style="aspect-ratio: 1 / 1; border-radius: var(--radius-lg); overflow: hidden; background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <img src="{{ $guide['image']['url'] }}"
                     alt="{{ $guide['name'] }} — Fictional website guide profile placeholder"
                     width="400"
                     height="400"
                     style="width: 100%; height: 100%; object-fit: cover; display: block;" />
            </div>
            <div class="website-micro website-text-muted" style="text-align: center; margin-top: var(--space-2); font-style: italic;">
                Safe illustrated placeholder (non-photographic website asset)
            </div>
        </div>

        {{-- Guide Identity & Summary --}}
        <div>
            <div style="display: flex; gap: var(--space-2); align-items: center; margin-bottom: var(--space-2); flex-wrap: wrap;">
                <span class="website-badge website-badge--neutral">{{ $guide['role'] }}</span>
                <span class="website-badge website-badge--accent">Sample Profile</span>
            </div>

            <h1 class="website-h1" style="margin: 0 0 var(--space-2) 0;">
                {{ $guide['name'] }}
            </h1>

            <p class="website-lead website-text-secondary" style="margin: 0 0 var(--space-5) 0;">
                Fictional guide profile modeling trail pacing, personalized route leadership, and mountain communication.
            </p>

            {{-- Fictional Profile Notice Banner --}}
            <div class="website-card" style="padding: var(--space-4) var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: var(--radius-md); margin-bottom: var(--space-5); box-shadow: none !important;">
                <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                    <span style="font-size: 1.15rem; line-height: 1;" aria-hidden="true">ℹ️</span>
                    <div>
                        <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                            Fictional Website Profile Notice
                        </strong>
                        <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                            {{ $guide['disclosure'] }} This entry exists exclusively to illustrate editorial layout and route associations for this prototype. It does not represent a real employee, verified certification, or available commercial booking.
                        </p>
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: var(--space-3); flex-wrap: wrap;">
                <a href="#linked-treks" class="website-btn website-btn--outline">
                    View Associated Routes &darr;
                </a>
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary">
                    Plan a Sample Journey &rarr;
                </a>
            </div>
        </div>
    </div>

    <style>
        @media (min-width: 768px) {
            .website-guide-header-layout {
                grid-template-columns: 320px 1fr !important;
            }
        }
    </style>

    <div style="max-width: 820px;">
        {{-- 3. Complete Sample Biography --}}
        <section aria-labelledby="heading-guide-bio" style="margin-bottom: var(--space-12);">
            <h2 id="heading-guide-bio" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                About {{ $guide['name'] }}
            </h2>
            <div class="website-body website-text-secondary" style="line-height: 1.7; margin-bottom: var(--space-4);">
                <p style="margin-top: 0;">
                    {{ $guide['biography'] }}
                </p>
                <p>
                    On mountain expeditions, our leadership philosophy emphasizes listening closely to each traveler&rsquo;s physical condition, monitoring altitude response with daily pulse oximetry, and structuring realistic daily trekking hours. Rather than treating routes as endurance contests, days are organized to accommodate photography, teahouse rest stops, and thoughtful acclimatization.
                </p>
            </div>
        </section>

        {{-- 4. Languages & Qualifications Information (Honest Unavailable State) --}}
        <section aria-labelledby="heading-guide-qualifications" style="margin-bottom: var(--space-12);">
            <h2 id="heading-guide-qualifications" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Qualifications &amp; Languages
            </h2>

            <div class="website-card" style="padding: var(--space-5); background: var(--color-background-warm); border: 1px solid var(--color-border); box-shadow: none !important;">
                <div style="display: flex; gap: var(--space-3); align-items: flex-start;">
                    <div style="flex-grow: 1;">
                        <strong class="website-body" style="display: block; margin-bottom: var(--space-2); color: var(--color-text);">
                            Verified Credential Status
                        </strong>
                        <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-3) 0; font-weight: 500;">
                            No verified qualifications are supplied in this website.
                        </p>
                        <p class="website-small website-text-muted" style="margin: 0; line-height: 1.55; font-style: italic;">
                            To maintain complete transparency and avoid misleading claims, this preview catalog does not display fabricated government license numbers, NMA/TAAN credentials, false star ratings, or simulated years of experience. In live commercial operations, all expedition staff hold verifiable government licenses and certified Wilderness First Aid credentials.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- 5. Associated Sample Trekking Interests --}}
        <section aria-labelledby="heading-guide-specialties" style="margin-bottom: var(--space-12);">
            <h2 id="heading-guide-specialties" class="website-h3" style="margin: 0 0 var(--space-3) 0;">
                Sample Route Focus &amp; Trail Specialties
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 0 var(--space-4) 0; line-height: 1.6;">
                In our platform architecture, guide profiles can be associated with specific regional ecosystems and pacing requirements. This sample profile is categorized with the following trail characteristics:
            </p>

            <div style="display: flex; flex-wrap: wrap; gap: var(--space-2); margin-bottom: var(--space-4);">
                @if(in_array('t-ebc', $guide['trek_ids'] ?? []) || in_array('t-gokyo', $guide['trek_ids'] ?? []))
                    <span class="website-badge website-badge--neutral">High-Altitude Acclimatization</span>
                    <span class="website-badge website-badge--neutral">Khumbu Valley Logistics</span>
                @endif
                @if(in_array('t-abc', $guide['trek_ids'] ?? []) || in_array('t-mardi', $guide['trek_ids'] ?? []) || in_array('t-khopra', $guide['trek_ids'] ?? []))
                    <span class="website-badge website-badge--neutral">Annapurna Ridge Trails</span>
                    <span class="website-badge website-badge--neutral">Rhododendron Forest Pacing</span>
                @endif
                @if(in_array('t-langtang', $guide['trek_ids'] ?? []) || in_array('t-manaslu', $guide['trek_ids'] ?? []) || in_array('t-mustang', $guide['trek_ids'] ?? []))
                    <span class="website-badge website-badge--neutral">Restricted Area Protocols</span>
                    <span class="website-badge website-badge--neutral">Tibetan Cultural Etiquette</span>
                @endif
                <span class="website-badge website-badge--neutral">Flexible Daily Pacing</span>
            </div>
        </section>
    </div>

    {{-- 6. Linked Sample Treks --}}
    <section id="linked-treks" aria-labelledby="heading-linked-treks" style="margin-bottom: var(--space-14);">
        <div style="margin-bottom: var(--space-6);">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-1);">Associated Itineraries</span>
            <h2 id="heading-linked-treks" class="website-h3" style="margin: 0 0 var(--space-2) 0;">
                Sample Routes Associated with {{ $guide['name'] }}
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0; max-width: 760px;">
                These sample itineraries illustrate the mountain regions and trail styles represented by this profile in our website catalog:
            </p>
        </div>

        @if(!empty($guide['treks']) && count($guide['treks']) > 0)
            <div class="website-listing-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
                @foreach($guide['treks'] as $trek)
                    @include('website_preview.components.trek-card', ['trek' => $trek])
                @endforeach
            </div>
        @else
            <div class="website-card" style="padding: var(--space-6); background: var(--color-background-warm); border: 1px solid var(--color-border); text-align: center;">
                <p class="website-small website-text-secondary" style="margin: 0;">
                    No specific sample routes currently linked to this profile.
                </p>
            </div>
        @endif
    </section>

    {{-- 7. Planning CTA --}}
    <section aria-labelledby="heading-guide-cta">
        <div class="website-card" style="padding: var(--space-8); background: var(--color-surface); border: 1px solid var(--color-border); text-align: center; box-shadow: none !important;">
            <span class="website-badge website-badge--neutral" style="margin-bottom: var(--space-2);">Custom Trip Planning</span>
            <h2 id="heading-guide-cta" class="website-h2" style="margin: 0 0 var(--space-3) 0;">
                Plan a Sample Journey
            </h2>
            <p class="website-body website-text-secondary" style="margin: 0 auto var(--space-4) auto; max-width: 640px; line-height: 1.6;">
                Interested in exploring the Himalayas with an itinerary tailored to your physical pace and seasonal preferences? Use our interactive planner to receive a customized route proposal.
            </p>
            <p class="website-small website-text-muted" style="margin: 0 auto var(--space-6) auto; max-width: 600px; font-style: italic;">
                Note: The journey planner does not guarantee or book a specific guide. If you appreciate this profile style, you may mention it as a fictional guide preference during initial consultation.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary">
                    Plan a Sample Journey &rarr;
                </a>
                <a href="{{ route('website.guides.index') }}" class="website-btn website-btn--outline">
                    Back to All Guides
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
