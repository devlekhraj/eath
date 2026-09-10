# Prompt 04 — Locked Homepage Architecture and Blade Mapping

Read `00-master-context.md`. Treat this file as the authoritative order for the homepage.

## Exact approved sequence

1. Top Trust Bar
2. Main Header
3. Hero
4. Trek Discovery / Search
5. Experience Discovery
6. Featured Treks
7. Destination Explorer
8. Find My Trek
9. Travel By Month
10. Compare Treks
11. Why EATH
12. Reviews / Traveler Stories
13. Safety & Support
14. Custom Trip
15. How It Works
16. Meet Your Guides
17. Responsible Travel
18. Nepal Travel Guide
19. Final Conversion CTA
20. Footer

DO NOT reorder, merge, omit or add unrelated sections without explicit approval.

## Journey logic

| Stage | Sections | Visitor outcome |
| --- | --- | --- |
| Inspire | 03 | Wants to experience Nepal |
| Discover | 04–07 | Finds relevant trips, experiences and regions |
| Decide | 08–10 | Narrows fit by preferences, month and comparison |
| Trust | 11–13 | Understands expertise, proof and safety |
| Personalize | 14–15 | Sees a clear route to a tailored trip |
| Humanize | 16–17 | Meets local people and responsible values |
| Educate | 18 | Resolves planning questions |
| Convert | 19 | Starts planning or opens a conversation |

## Recommended Blade mapping

Use existing files when suitable and preserve their dynamic behavior:

| No. | Section | Blade include |
| ---: | --- | --- |
| 03 | Hero | `website.pages.home.landing-hero` |
| 04 | Trek Discovery / Search | `website.pages.home.landing-trek-search` |
| 05 | Experience Discovery | `website.pages.home.landing-experiences` |
| 06 | Featured Treks | `website.pages.home.landing-featured-treks` |
| 07 | Destination Explorer | `website.pages.home.landing-destinations` |
| 08 | Find My Trek | `website.pages.home.landing-find-my-trek` |
| 09 | Travel By Month | `website.pages.home.landing-travel-month` |
| 10 | Compare Treks | `website.pages.home.landing-compare-treks` |
| 11 | Why EATH | `website.pages.home.landing-why-choose-us` |
| 12 | Reviews / Stories | `website.pages.home.landing-reviews` |
| 13 | Safety & Support | `website.pages.home.landing-safety` |
| 14 | Custom Trip | `website.pages.home.landing-custom-trek` |
| 15 | How It Works | `website.pages.home.landing-how-we-work` |
| 16 | Meet Your Guides | `website.pages.home.landing-guides` |
| 17 | Responsible Travel | `website.pages.home.landing-responsible-tourism` |
| 18 | Nepal Travel Guide | `website.pages.home.landing-travel-guide` |
| 19 | Final CTA | `website.pages.home.landing-final-cta` |

Sections 01, 02 and 20 belong to the shared layout unless the actual architecture proves otherwise.

## Treatment of current sections

- `landing-tag-lines`: preserve valuable verified content by absorbing it into Hero or Why EATH; remove its include only after this is confirmed.
- `landing-departures`: preserve existing fixed-departure logic. Integrate it into Featured Treks or expose it conditionally in the most relevant approved section. Do not lose the feature.
- `landing-gallery`: reuse genuine photos as destination/story imagery. Retire the standalone include only after its value has been preserved.
- Any currently commented search partial: inspect its data and behavior before replacing or reactivating it.

## Homepage composition requirement

`resources/views/website/index.blade.php` should remain a clean composition file. It should not contain the full markup for every section. Add concise numbered comments and include partials in the locked order.

Example shape only—adapt the layout directive to the real project:

```blade
@extends('website.layout.master')

@section('content')
    {{-- 03 Hero --}}
    @include('website.pages.home.landing-hero')

    {{-- 04 Trek Discovery / Search --}}
    @include('website.pages.home.landing-trek-search')

    {{-- Continue in the exact approved order. --}}
@endsection
```

Do not implement from this example blindly. Use the real layout, sections, variables and conventions.

## Empty-state rule

If dynamic data for a section is missing:

- do not fabricate records;
- do not render an empty heading and blank grid;
- either render an honest alternate CTA/empty state or conditionally hide the dependent list;
- preserve the section's intended place for later activation when feasible.

