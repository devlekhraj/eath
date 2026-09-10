# 02 — Build shared demo data and isolation

## Read first

Master rules, approved audit, and all of `references/route-and-cta-map.md`, `references/demo-catalog.md`, `references/demo-content.md`, `references/asset-manifest.md`, `references/state-and-scoring-contract.md`.

## Goal

Make the demo independent of production records and external services while preserving the existing Laravel application. Do not implement page designs in this phase.

## Implementation

1. Create `WORK-LOG.md` from the template and record the approved audit. Record the actual installation path of this pack.
2. Add a demo feature flag via configuration and an example local configuration entry. Do not silently overwrite `.env`, production settings or secrets. Enable only in the approved local/testing environment. No global route replacement.
3. Add the `/demo` group and `demo.` route prefix following actual Laravel routing conventions. Gate GET and POST actions server-side; disabled demo requests return 404 or the agreed denial response. Production routes and model bindings stay unchanged.
4. Choose a compact architecture: fixture files + demo repository + focused controllers/services + Blade views + minimal website JS modules. Suggested locations are `app/Support/WebsiteDemo/`, `resources/demo/website/`, `resources/views/website/demo/`, and `resources/website/js/demo/`; adapt to established conventions. No forced 30-class abstraction hierarchy.
5. Import the two canonical JSON seeds. Hydrate all eight detail records, 24 departure rows and editorial relationships according to the reference rules. Validate every FK and unique ID/slug.
6. Expose repository methods for catalog filters, lookup by ID/slug, regions, experiences, months, departures, articles, guides, stories and FAQ. Return consistent arrays/DTOs; never half Eloquent and half fixtures.
7. Use integer cents for arithmetic. Derive display strings centrally. Use injected sample calendar `2030-09-01` for departures and date validation, and real clock for session TTL. Clearly disclose the sample calendar in UI later.
8. Resolve local image/font assets through one registry. Missing assets get labeled local fallbacks, not network calls.
9. Prevent the demo layout from inheriting outbound analytics/contact/payment modules. Do not disable those modules globally on existing production pages.
10. Prepare the approved isolated local demo session mechanism and CSRF boundary for future phases. Do not bypass middleware to hide configuration problems.
11. Add a demo-only noindex response rule. No production robots/sitemap change. Confirm unknown preview slugs fail correctly.

## Required interfaces (names may adapt)

- `DemoCatalogRepository`: authoritative records and derived relationships.
- `DemoCatalogValidator`: schema/range/link integrity checks used in tests.
- `DemoMoneyFormatter`: USD display from integer minor units.
- `DemoClock`: date-only sample clock, separate from real state expiry.
- `DemoAssetRegistry`: image attributes and fallback selection.

Use shared services for business-like demo calculations, not Blade or duplicated browser logic. Keep future real-data replacement possible without building that integration now.

## Tests

- Exactly 8 treks, 5 regions, 6 experiences, 12 months, 24 generated departures, 6 articles, 3 guides and 3 stories.
- Itinerary length equals trek duration for every trek; sequential day numbers.
- Departure end = start + duration - 1; closed departures have zero seats; IDs unique.
- Prices coherent across catalog and departures; no unknown references.
- Empty list and unknown ID behavior is safe.
- Preview disabled gate blocks GET and POST; no production-route collision.
- Demo repository calls use zero business database queries and zero HTTP/mail/job integrations.
- No side-effect scripts in the isolated demo shell.

Run repository-appropriate tests without destructive database traits/commands. Finish using the master phase report contract and stop.

