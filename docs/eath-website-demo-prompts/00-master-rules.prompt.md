# 00 — Binding master rules

Read this file fully before every phase. You are implementing the approved EATH traveler-facing **demo**, not building an admin panel or migrating frameworks.

## 1. Precedence and phase discipline

1. Follow the user's current request and applicable repository/security instructions.
2. This master file and shared references define the full-site demo contract.
3. The requested numbered file defines this phase's scope.
4. The work log records evidence and approved adaptations, not permission to ignore newer instructions.
5. The old homepage-only pack is historical; do not mix its production-data requirement with this pack.

Read referenced files completely before task actions. Inspect relevant repository files before editing. Use the existing package manager/lockfile and installed versions. Do not upgrade dependencies, rename unrelated routes, bulk format the repository, create commits, deploy, send messages or reset the worktree unless specifically requested. Preserve uncommitted user work. Do not delegate to parallel agents unless explicitly authorized separately.

## 2. Known project clues, not guaranteed facts

The supplied screenshot showed `resources/views/website/index.blade.php` extending `website.layout.master`, modular includes under `resources/views/website/pages/home/`, and frontend assets under `resources/website/`.

Visible SCSS included `website.scss`, `home-page.scss`, `package-page.scss`, `overrides.scss`, `tiptap-viewer.scss`. The Vite entry shown was `resources/website/scss/tiptap-viewer.scss`, not a CSS-directory path. It also showed admin entries and the Vue plugin. Do not remove these: Vue may belong to the admin while the public website uses Blade. Bootstrap has **not** been confirmed; inspect before deciding.

## 3. Hard demo isolation

- All demo content comes through a shared fixture repository. No live fallback for missing data.
- Default preview prefix: `/demo`; route-name prefix: `demo.`. Original website behavior stays intact.
- Do not rewrite existing production controllers to return fixtures.
- Preview middleware/feature gating must deny demo routes in unintended environments. A flag alone must not silently make demo accessible in production.
- Do not add tables, run migrations/seeders or change production session/cache drivers. If the existing bootstrap requires a database, report that environmental blocker or use an approved isolated local configuration; never silently point at a live database.
- Use a demo-only file/memory state mechanism or scoped browser session state per the state contract. Do not depend on a live database session table.
- All demo POSTs must target new simulated handlers or intercepted demo-only forms, never existing inquiry/checkout endpoints.
- Suppress analytics, live chat widgets, real map embeds, payment SDKs, mailers, jobs, notifications and outbound contact navigation in the demo layout.
- No automatic deployment, new external service account or live purchase flow.

## 4. Demo content and disclosure

Persistent notice: `Demo website — sample trips, prices and availability. No booking or inquiry will be sent.` Price blocks also say `Illustrative USD price`. Guide/story samples carry local `Fictional demo profile/story` labels even when viewed outside the homepage. No fake verification marks, star-rating aggregates, legal terms, safety guarantees or real-world suitability claims.

Use fictional email `traveler@example.test` and sample contact values. Do not encourage real passport, health, payment or contact details. Do not store contact/free-text fields in browser persistent storage, application logs, analytics or URLs. Clear ephemeral submission data after demo confirmation.

All demo HTML responses receive demo-only `noindex` metadata/header. Never apply this to existing production responses. This is index control, not access control. No rich-result review/offer/FAQ claims from fixtures. Preserve infrastructure for later editorially approved content; do not promise rankings or rich results.

## 5. Visual direction

Premium outdoor/editorial travel, authentic photography where available, warm breathing room, restrained borders, clearly usable controls. Newsreader headings + Inter UI/body with fallbacks. Use approved tokens and responsive scales from 03. Do not imitate another company's branding.

### Global Design Standards:
1. **Universal Zero Border-Radius**: Complete removal of `border-radius` across every component (`border-radius: 0 !important`). All cards, buttons, inputs, dialogs, drawers, badges, chips, tags, pills, search bars, and images must have crisp, architectural 0px corners.
2. **E.A.T.H. Travels Brand Logo Color Palette**:
   - Primary: Himalayan Mountain Peak Azure (`--color-primary: #0284c7;`, vivid highlight: `#2FB8FF`)
   - Accent: Expedition Airplane & Backpack Crimson (`--color-accent: #ff0048;`, action: `#e11d48`)
   - Secondary: Deep Alpine Navy (`--color-secondary: #0c4a6e;`)
   - Text & Silhouette: Peak Charcoal (`--color-text: #0f172a;`, secondary: `#475569`, muted: `#64748b`)
   - Canvas & Surfaces: Alpine Snow (`--color-surface: #ffffff;`, `--color-background: #f8fafc;`, `--color-background-warm: #f1f5f9;`)
3. **Minimal Elevation**: Zero ordinary card/input/sidebar shadows (`box-shadow: none`). Use hairline borders and tonal surfaces. One subtle overlay shadow is permitted only for a functional dropdown/dialog/drawer and recorded as an exception. No decorative `filter: drop-shadow`, text-shadow, glow, glassmorphism, autoplay hero video, scroll-jacking or animation-dependent content.

## 6. Delivery scope

Build all page families in `references/route-and-cta-map.md`, the exact 20-section homepage, complete comparison, three-mode planner, explainable matching, review/contact/demo confirmation, listing filters, editorial pages and recovery states. Custom Trip and Find My Trek are modes, not duplicate apps.

Use server-rendered Blade for important content, GET forms and links for discovery, semantic accessible HTML, progressive enhancement and minimal client JS. Local demo fixtures can populate the page even though real backend integration is deferred. No React/Next/Vuetify conversion and no new CSS framework.

## 7. Universal phase completion contract

Every implementation prompt inherits this checklist:

1. Read this master, relevant reference contracts, requested phase and approved work log.
2. Identify changed files and dependencies; adapt to real paths, not imaginary ones.
3. Implement the phase only; reuse shared components and data contracts.
4. Verify default, empty, invalid, long-content, mobile and keyboard states relevant to it.
5. Run available safe checks and report their real results; never claim browser inspection or scores not measured.
6. Update `WORK-LOG.md` with actual files, route adaptations, checks, screenshots, blockers and the next phase.
7. Stop. Wait for the next user-requested phase. Never mark a stub, fake link or click handler that does nothing as complete.

If an in-scope visual asset is unavailable, use a local labeled fallback and log the need. Do not stop the whole project over routine demo copy choices. Stop for permission failures, protected workflows or a required expansion into live services.

