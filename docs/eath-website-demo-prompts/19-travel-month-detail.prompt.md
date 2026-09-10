# 19 — Month detail page

## Read first

Master, 03, 04, 18, route/CTA and catalog/content references. Implements P09 for all 12 month slugs.

## Page sequence

1. Breadcrumb Home / When to Go / Month.
2. H1 `Planning a sample trip in [Month]`.
3. Demo seasonality summary and disclaimer.
4. Reasons to explore this sample month.
5. Questions/limitations to verify.
6. Matching destinations.
7. Matching trek cards.
8. Relevant packing/preparation articles.
9. Month FAQs.
10. Plan This Month CTA.
11. Previous/next month navigation, wrapping December/January safely.

## Content

Derive matches from catalog, not duplicated arrays. Destinations shown only when they contain a matching sample trek. For a month with no records, retain informative demo summary and a compact no-match alternative: change month or create custom request. Do not manufacture suitability or seasonal facts to fill an empty panel.

Use concise, nonfactual question-based copy: date flexibility, available days, what to confirm with an operator. Do not invent temperatures, precipitation percentages, trail openings or transport schedules. A visible statement explains this is not a live forecast or verified seasonal guide.

## Actions/layout

Editorial header with a modest contextual image, readable summary, 3→2→1 trek grid, simple month navigation. Plan action preselects month. View All Matches sends month to listing. Compare continues shared state. Guide links use sample preparation and packing content.

## Tests

Render all 12 routes; invalid slug404; month ID/slug mapping exact; January empty state; previous/next wrap; links correctly encode integer month for filters and slug for details; no forced selection overriding an active draft. Verify no indexable claim/schema and no fake weather data. Check mobile headings, links and no shadow.
