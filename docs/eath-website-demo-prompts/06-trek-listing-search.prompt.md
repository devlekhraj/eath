# 06 — Trek listing, search, filters and sorting

## Read first

Master, 03, 04, route/CTA and demo-catalog references. Implements P02 and homepage search results.

## Page order

1. Breadcrumb Home / Treks.
2. H1 `Explore sample treks` with concise demo description.
3. Search input and filter controls.
4. Active filter chips, clear controls and result count.
5. Sort selector.
6. TrekCard grid.
7. Pagination.
8. `Not sure which fits?` planner CTA.

## Layout

Desktop: light left filter column about 260px and flexible result area with2–3 columns depending on actual card width; no cramped3 cards at 1024px. Tablet: filters above 2-column results. Mobile: accessible filter disclosure/dialog, result controls stack, 1-column cards. No shadows; boundaries and headings separate filters.

## Data and behavior

- GET-only filtering using repository collections, not database queries or a paid search service.
- Search q case-insensitively across trek name, summary, region name and experience names. Trim/max 120 characters; empty q means all.
- Region/experience: validated IDs. Month:1–12. Duration inclusive days_min/days_max. Difficulty exact selected enum. Budget max filters base USD price. No fabricated exchange rate/currency toggle.
- Intersection across different filters; match selected experiences using the explicitly implemented single experience param for this version. Do not invent multiselect semantics.
- Sort whitelist per route contract; recommended uses featured_rank; numeric sort uses raw values and ID tie-break. Never sort formatted currency strings.
- Page size6, so8 fixture treks exercise page2. Filter/sort change resets page1. Pagination retains normalized filters. Out-of-range page redirects/clamps to valid last page with documented behavior.
- Show `N sample treks` and descriptive filter chips. Chip removal preserves other filters. Clear all preserves no unwanted query state.
- Initial request renders matching results in Blade. JS can enhance form submission but is not the only route to content. Debounced live search is optional; if used, cancel stale requests and do not trap focus.

## Card contract

Image, region, linked name, concise summary, duration, difficulty, altitude, illustrative USD base price, View Trek, Compare action. Image/title link and compare button are siblings, not nested interactives. Card styles reuse04; no card-wide anchor containing a button. Never output ratings from demo samples.

## States

- No results: name relevant filters and offer clear filters + planner custom request.
- Invalid range: inline error by duration controls, values preserved, no exception or silent range swap.
- Unknown filter enum: ignore/normalize with a friendly notice according to route contract.
- Missing image/optional altitude: fallback / `Not provided`, not0m.
- Browser Back/refresh: URL restores results.

## Acceptance tests

All 8 treks across pages; query `Langtang`; regionannapurna returns3; experienceshort-treks returns1; month1 returns0; max days8 returns t-mardi only; max USD 700 returns t-mardi only. Sorting ties deterministic. Invalid huge/negative query and unknown enum safe. Compare works after 08; all detail links point to fixture slugs. No horizontal page overflow at 320px.
