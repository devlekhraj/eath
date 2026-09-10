# 01 — Read-only audit and implementation map

## Read first

- `00-master-rules.prompt.md`
- `references/route-and-cta-map.md`
- `references/demo-catalog.md`
- `references/state-and-scoring-contract.md`

## Task

Inspect only. Do not change source files, create an environment file, install dependencies, start sending requests to production, run seeds/migrations or submit existing forms.

1. Read applicable repository instructions and git status. Preserve unrelated edits.
2. Inspect composer/package manifests, lockfiles and build configuration for actual versions and scripts. Do not reveal environment secrets.
3. Locate the actual homepage route, detail/listing routes, route model binding, controllers and views. Map Eloquent access, view composers and service providers that might still query a database even if controllers use fixtures.
4. Inspect the website layout and all homepage partials, existing detail-page itinerary/gallery/inquiry modules, menus, footer, styles and JS. Identify production side effects from shared layout scripts and event listeners.
5. Inspect session/cache/queue configuration **structure and required services**, not secret values. Determine a safe demo-only state path that does not mutate live state.
6. Confirm CSS framework, icon system, fonts, SCSS import conventions and admin entry dependencies. Do not assume Bootstrap because SCSS exists.
7. Inventory reusable assets by path, dimensions/ratio if practical, rights provenance if known, and missing slots. No copying private or unlicensed external imagery.
8. Propose an isolated `/demo` route group, namespace and view/layout reuse strategy; do not duplicate route names or catch-all bindings.
9. Identify tests/build/browser capabilities that can run safely with fixtures and no database. Read-only route listing may boot providers; inspect bootstrap prerequisites first.

## Required report

Return numbered sections:

1. Actual stack and project layout.
2. Existing route/controller/view/data-source table.
3. Proposed demo route/template table covering every route family.
4. Components/assets to reuse, clone selectively or keep untouched.
5. Side-effect and database-dependency risks.
6. CSS/JS regression risks including admin.
7. Recommended file organization and demo gate.
8. Test plan and exact safe commands supported by this repository.
9. Blockers requiring user authority vs routine implementation decisions.
10. Proposed start of phase 02.

Stop after the report. This phase produces no application changes. After approval, carry the report into the work log during phase 02.

