# 15 — Destination detail page

## Read first

Master, 03, 04, 14, route/CTA, catalog/content/asset references. Implements P05 for everest, annapurna, langtang, manaslu and mustang.

## Page sequence

1. Breadcrumb Home / Destinations / Region.
2. Landscape hero, H1 region name, short fixture intro.
3. Region overview with sample-content note.
4. Experience highlights derived from associated trek categories.
5. Treks in this destination with duration/difficulty/month controls.
6. Sample best-month overview.
7. Difficulty and planning questions.
8. Access/logistics information awaiting verification.
9. Relevant sample articles.
10. Regional FAQs.
11. Plan This Region CTA.

## Design and behavior

Hero uses H1 token, not homepage display size. Overview is a reading-width column; highlights use editorial text, not repeated shadow boxes. Trek grid reuses listing cards and filters only within this region. Apply filtering through canonical listing query or region-detail GET parameters with region fixed server-side; do not duplicate search algorithms. Preserve region when clearing optional filters.

Sample-month display is derived from union of associated trek months and explicitly says some routes differ; each month links to month detail or filtered treks with both month and region. It is not a weather forecast or an operational guarantee. Difficulty summary describes fixture ranges only. Do not invent transport timetables, permit fees or geographical access facts.

Related articles derive from linked trek IDs and deduplicate, max 3. Regional FAQ uses original demo wording, not invented policies. Whole page contains substantive local sample content; a missing specific detail uses an honest compact note.

## Connections

Plan region → discover planner with region ID, source=destination. Trek cards → detail/compare. Month chips → demo month/listing routes. Articles → demo article. Ask a question → demo contact.

## Acceptance

Render all five slugs with distinct headings/content and correct counts. Unknown slug404. Empty regional list yields filter reset or custom plan; no silent records from another region. Test current region persists through search/back and planner entry; unique H1 and titles; responsive hero crop and no page overflow. No real-world claims inferred from sample relationships.
