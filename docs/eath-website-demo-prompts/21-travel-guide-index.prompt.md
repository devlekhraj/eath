# 21 — Travel-guide/article listing

## Read first

Master, 03, 04 and route/content/catalog/asset references. Implements P16.

## Page order

1. Breadcrumb Home / Travel Guide.
2. H1 and editorial introduction.
3. Article search.
4. Category links/filter.
5. Featured sample article.
6. ArticleCard grid with count.
7. Pagination.
8. Planning CTA.

## Data and controls

Use6 canonical articles. Categories: seasons, packing, preparation, planning, culture, logistics. Derive counts. GET q (max 120) searches title/summary/section headings, category validates enum, page size4 to exercise pagination. Featured article appears as a highlight; don't duplicate it confusingly in the same result count—either include it in the normal list clearly or exclude and calculate count consistently. Search mode may omit the standalone feature to avoid unrelated results.

Card: image16:10, category, title, short summary, labeled sample date/editorial attribution and descriptive Read link. Keep text crisp; do not rely on a hover overlay.3→2→1 grid, no card shadows. Show this is educational sample content.

## Connections

Article→detail. Category→filtered listing. Planner CTA discover. Related trek teasers only if useful and sourced from shared IDs; not another unrelated homepage section.

## States/tests

Clear q/category independently; back/refresh/pagination preserve filters. No results→clear and category choices. Unknown article category handled safely. Check all 6 article routes, repeated categories, unique metadata, no future-looking fake Recent badge from2030 dates. No newsletter collection, email delivery or new CMS required.
