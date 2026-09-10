# 26 — Traveler stories and review-style demo listing

## Read first

Master, 03, 04, route/CTA, demo-content, catalog and asset references. Implements P21.

## Page order

1. Breadcrumb Home / Traveler Stories.
2. H1 with unmistakable sample-story notice.
3. One featured fictional narrative.
4. Trek/region filters.
5. Story cards with count.
6. Planning CTA.

## Content and design

Use3 supplied fictional narratives. Header says these are demo stories, not real testimonials. Each card repeats a concise fictional label because cards may appear on other pages. Show title, summary, sample traveler label, associated trek and safe non-identifying image/fallback.

No star averages, verified badges, platform logos, recommendation percentages, scraped reviews or fake external sources. source_url and rating are null by design. Do not replace them with invented data to fill layout.

Photo-led editorial composition with one feature and supporting cards, no auto-rotating carousel. Filters GET by trek/region; derive region through associated trek. Avoid double-counting the featured item; default can show featured +2 others.

## Connections/states

Story→detail; linked trek→trek detail; planning→discover. Empty filter→clear controls and view all; no dummy extra testimonials. Unknown filter IDs safe. Check every sample label, derivations, filter URL/back behavior, responsive hierarchy and no box-shadows.
