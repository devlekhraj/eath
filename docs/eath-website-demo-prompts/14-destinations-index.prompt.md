# 14 — Destination listing page

## Read first

Master, 03, 04, route/CTA, catalog and asset references. Implements P04 using all five regions.

## Page sequence

1. Breadcrumb Home / Destinations.
2. H1 and two-line geographic-discovery introduction.
3. Editorial destination grid.
4. Compact region-orientation text/list.
5. Featured sample treks across regions.
6. Discover-mode planning CTA.

## Detailed UI

Use portrait destination imagery with a name, concise intro, derived trek count and Explore Destination link. Desktop can give the first two tiles larger spans and the remaining three equal spans; tablet2 columns; mobile1 column or 2 when titles remain readable. Do not copy the product-card visual with prices, difficulty and too many badges. All tiles align to the shared container and use border-free photography or a light border, no shadow.

Show all five fixture regions, not real database destination records. A count means the number of demo treks in that region; label it as sample trek count. Avoid claiming the catalog covers all of Nepal. The orientation area may explain that visitors can choose a region or compare trip preferences; no invented interactive map, coordinates or boundaries.

Featured trek block uses shared TrekCard and comparison actions, max 3 curated records. Main conversion action remains Plan My Trek, not a nonfunctional region booking action.

## Connections

Tile → region detail. Trek → trek detail. Compare action → shared selection. Help choose → planner discover with source=destination. Breadcrumb/logo remain inside preview.

## Empty and QA states

If a test removes all regional treks, show the region with0 sample treks and an honest planning alternative or an explicit empty region state; no fake count. Validate counts against fixture relationships, all slugs resolve, all five intros distinct, missing image fallback, long name, 320px and keyboard. Check that no production destination route is used. Report and stop.
