# Prompt 01 — Audit the Current Homepage Before Editing

Read `00-master-context.md` first. This is an inspection-only phase. Do not modify application code.

## Objective

Produce an evidence-based implementation map of the current homepage so the redesign preserves backend behavior and valuable assets.

## Inspect

1. `resources/views/website/index.blade.php` and any alternate homepage files such as `index-1.blade.php` or `landing.blade.php`.
2. `resources/views/website/layout/` and shared website components.
3. Every partial in `resources/views/website/pages/home/`.
4. The route that renders the homepage and its controller/action.
5. Every variable passed to the homepage, including collections, conditional flags and pagination/limits.
6. `resources/website/scss/website.scss`, `home-page.scss`, `overrides.scss`, imports, variables and framework usage.
7. `resources/website/js/website.js`, related modules and existing homepage interactions.
8. `vite.config.js`, package dependencies and icon/font sources.
9. Existing image helpers, responsive image behavior, lazy loading and public assets.
10. Existing SEO metadata, schema markup, headings, canonical tags and analytics hooks.

## Build a mapping table

For each current homepage partial, report:

| Current file | Purpose | Data variables | Routes/actions | JS dependency | Keep / refactor / absorb / retire later | Target section |
| --- | --- | --- | --- | --- | --- | --- |

Explicitly investigate these visible current partials if present:

- `landing-hero.blade.php`
- `landing-tag-lines.blade.php`
- `landing-search-treks.blade.php`
- `landing-departures.blade.php`
- `landing-featured-treks.blade.php`
- `landing-custom-trek.blade.php`
- `landing-destinations.blade.php`
- `landing-why-choose-us.blade.php`
- `landing-gallery.blade.php`
- `landing-responsible-tourism.blade.php`
- `landing-how-we-work.blade.php`

## Decisions to make from evidence

- Which layout file is authoritative?
- Which current partials contain reusable dynamic behavior?
- What CSS framework and breakpoint system already exist?
- Which icon library is already installed?
- Are fonts self-hosted, bundled or fetched externally?
- Which approved sections already have suitable data?
- Which approved sections need new presentation only?
- Which sections require backend work that is outside a safe homepage UI pass?
- Can `landing-tag-lines` be absorbed into Hero or Why EATH?
- Can `landing-gallery` be repurposed for traveler stories using real content?
- Should fixed departures remain inside Featured Treks or appear conditionally elsewhere?

## Output only an audit report

Do not edit code. Return:

1. architecture summary;
2. current-to-target mapping table;
3. data contract for each target section;
4. reusable assets/components/styles;
5. risks and missing data;
6. exact files likely to change in later phases;
7. recommended verification commands based on the actual project.

Stop after the report and wait for approval.

