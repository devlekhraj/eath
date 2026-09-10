# 18 — Travel-by-month overview

## Read first

Master, 03, 04, route/CTA, catalog and content references. Implements P08.

## Page sequence

1. Breadcrumb Home / When to Go.
2. H1 and explicit sample-seasonality note.
3. Twelve-month selector/grid.
4. Four labeled sample season groups.
5. Selected month overview.
6. Relevant sample trek results.
7. Planner CTA carrying selected month.

## Interaction contract

Use native links to month detail for no-JS operation. A GET query month may select an inline panel on overview; if tabs are used, implement full tab keyboard semantics and keep link fallback. Do not use aria role=tab just for visual styling. All 12 months visible and operable, chosen state conveyed through label/border plus color.

Default selected month is demo calendar September, visibly identified as sample default, not a prediction of current season. Visitor choice persists in URL. Month data derives from catalog suitable_months; winter empty results are deliberate. Season wording stays an illustrative organizational label, not current weather guidance.

Grid4 columns desktop/3 tablet/2 mobile; controls comfortably sized. Supporting panel uses background contrast, not box-shadow. No large weather icons with invented temperature/rainfall numbers.

## Connections

Month tile → P09. Result trek → detail/compare. View All → listing with month integer. Plan month → discover planner with month prefilled and source=month. Clear selection returns overview, no stale hidden month.

## Tests

All 12 months/unique slugs, keyboard sequence, invalid month normalized, January0 matches honest, October matches catalog, month changes results consistently, URLs and back navigation. No weather API or fake live-condition badge; no-JS navigation remains functional. Record phase results.
