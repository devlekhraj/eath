# Prompt 06 — Implement Homepage Sections 03–10

Read Prompts 00, 02, 04 and 05, plus the approved audit. Implement only the discovery and decision half of the homepage.

## Scope

Implement in this exact order:

3. Hero
4. Trek Discovery / Search
5. Experience Discovery
6. Featured Treks
7. Destination Explorer
8. Find My Trek
9. Travel By Month
10. Compare Treks

Do not implement sections 11–19 yet.

## Required workflow

1. Map current data variables and routes to each section.
2. Refactor existing partials in place when appropriate.
3. Create missing partials using the mapping in Prompt 04.
4. Preserve current departure/search/custom data behavior even if its presentation moves.
5. Add only the minimal SCSS and JS needed for this phase.
6. Use reusable patterns for cards, metadata, section headings and buttons.
7. Keep JavaScript progressive and section-scoped.
8. Compose sections 03–10 in `resources/views/website/index.blade.php` in exact order.
9. Leave safe placeholders/comments for later approved sections rather than inventing content.

## Dynamic-data requirements

- Do not rename view variables unless every producer and consumer is updated safely.
- Do not introduce avoidable database queries in Blade.
- Do not trigger N+1 queries; use controller/service eager loading when genuinely required.
- Do not hardcode names, prices, months or availability already supplied by Laravel.
- Render optional metadata conditionally.
- Prefer route helpers over literal URLs.

## Interaction requirements

- Search must perform a real action.
- Interactive filters/tabs must use correct buttons, labels and states.
- Carousels are not the default. Prefer CSS grid or scroll-snap; if a library is already used, do not initialize duplicates.
- No autoplay.
- All content remains reachable by keyboard and without drag gestures.

## Visual acceptance criteria

- Hero and Search are separate full sections.
- There is clear rhythm between functional search, card grids, editorial imagery and guided decision tools.
- Desktop, tablet and mobile layouts follow Prompt 05.
- No horizontal page overflow at 320px.
- Images do not visibly distort.
- Cards share a coherent design without becoming identical.
- CTA hierarchy is clear.

## Verification

Run the project's relevant formatter/linter/build and Laravel view-related checks that are safe in the environment. Inspect for broken includes, undefined variables, invalid routes, missing assets and JavaScript errors.

Report:

- files created/changed;
- data and routes preserved;
- checks run and results;
- any missing content/backend capability;
- screenshots or precise viewport observations if available.

Stop after sections 03–10.

