# 27 — Traveler story detail

## Read first

Master, 03, 04, 26 and route/content/catalog/asset references. Implements P22.

## Page order

1. Breadcrumb Home / Traveler Stories / Story.
2. H1, fictional traveler attribution and local demo disclosure.
3. Related sample trek context.
4. Image/fallback.
5. Complete narrative body.
6. Optional safe gallery from existing sample trek assets.
7. Related trek card.
8. Other sample stories.
9. Plan a Similar Trip CTA.

## Content

Use the canonical story body; may expand with original clearly fictional narrative about using the planning demo, not invented factual praise for real services. No alleged quotation from a real traveler, fabricated date of travel, rating, country/identity details or real-person portrait.

The story must still be useful as a visual demo: clear paragraphs, optional subheads about preferences/choice, image caption and a connection to the selected sample trek. It must not be a Coming Soon block.

## Actions and validation

Plan similar → planner selected mode with story trek ID and source=story. This source is part of the shared allowlist, not a token invented only by this page. Other story links exclude current; unknown slug404. All IDs from fixtures.

## Tests

Render3 stories; fictional warning on each page; related trek price consistent; privacy no real names/contact; no Review/AggregateRating schema; mobile reading measure and image fallback. Keep current planner draft when opening story from a detour.
