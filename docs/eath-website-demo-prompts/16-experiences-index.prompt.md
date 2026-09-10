# 16 — Experience discovery listing

## Read first

Master, 03, 04, route/CTA, catalog and asset references. Implements P06.

## Page sequence

1. Breadcrumb Home / Experiences.
2. H1 and an introduction explaining interest-based discovery.
3. Six experience tiles.
4. Example trips using shared TrekCard.
5. Help Me Choose CTA.

## Content and design

Use the six actual fixture categories: Mountain Scenery, Cultural Trails, Quieter Trail Ideas, Short Trek Ideas, Photography Journeys, Iconic Route Ideas. Do not add wildlife/climbing/family categories with no supporting sample records. Category labels describe interests, not accessibility, crowd or safety guarantees.

Each tile has consistent image ratio, name, short unique intro, derived sample trek count and one accessible link. Desktop3 columns, tablet2, mobile1 or 2 based on readable text. A hover may alter border/text but not cast shadow or reveal otherwise hidden content. Example trips max 3 curated diversified records; no new card component.

## Interactions

Open experience detail. View associated treks. Add example trek to compare. Start planner with no interest forced from index; source=experience. Each detail page will preselect its own interest in17.

## States and tests

Every category in catalog has at least one associated trek. Derive counts, don't hardcode them in views. Unknown categories not shown. Empty fixtures → explain no sample categories and offer generic planner. Verify all links stay in demo, no nested interactive controls, missing-image fallback, keyboard focus and 320px layout. Final view must not be a generic Coming Soon page.
