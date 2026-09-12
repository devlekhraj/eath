# Agent Rules & Coding Guidelines

## Instruction Precedence

* Project-specific rules in this `AGENTS.md` take precedence over generic agent rules.
* Follow `.agents/rules/ponytail.md` for coding simplicity, reuse, minimal implementation, and root-cause fixes unless it conflicts with an explicit rule in this file.
* Never simplify, remove, bypass, or weaken behavior required by this project's:

  * design standards
  * admin standards
  * accessibility requirements
  * security requirements
  * validation requirements
  * performance requirements
  * data integrity requirements
  * change-logging requirements
* When instructions conflict, follow this priority:

  1. Explicit task requirements
  2. `AGENTS.md`
  3. `.agents/rules/ponytail.md`
  4. Existing project conventions
* Do not create a new project convention when an existing convention already covers the requirement.

---

## Scope Discipline

Before modifying code:

* Read and understand the requested task fully.
* Inspect the existing implementation before creating anything new.
* Inspect related:

  * components
  * models
  * services
  * helpers
  * utilities
  * composables/hooks
  * styles
  * configuration
  * existing shared patterns
* Trace the real flow affected by the requested change.
* Search for an existing implementation before introducing a new one.
* Reuse existing project patterns whenever possible.
* Prefer extending an existing implementation over creating a parallel implementation.
* Do not modify unrelated files.
* Do not redesign unrelated sections while completing a focused task.
* Do not perform unrelated refactors unless they are necessary to complete the requested change correctly.
* Avoid creating new files when an existing file is the appropriate location.
* Avoid new dependencies unless the existing stack cannot reasonably handle the requirement.
* Fix the root cause instead of patching only the visible symptom.
* Preserve existing behavior unless the task explicitly requires changing it.
* Keep changes focused, minimal, readable, and easy to review.

---

## Ponytail Coding Principles

Follow `.agents/rules/ponytail.md`.

In particular:

1. Ask whether the requested functionality needs to exist at all.
2. Check whether it already exists in the codebase.
3. Prefer standard library functionality where appropriate.
4. Prefer native platform functionality where appropriate.
5. Reuse already-installed dependencies.
6. Prefer the simplest correct implementation.
7. Only create new abstractions when they are actually required.

Additional rules:

* No unnecessary abstractions.
* No unnecessary wrappers.
* No unnecessary boilerplate.
* No unnecessary dependencies.
* No duplicate implementations.
* Prefer deletion over unnecessary addition.
* Prefer boring, maintainable code over clever code.
* Prefer the smallest correct diff after understanding the actual flow.
* Do not sacrifice:

  * correctness
  * security
  * accessibility
  * validation
  * data integrity
  * error handling
  * explicitly requested functionality

---

## Completion Rules

Before considering any task complete:

* Verify that the requested behavior actually works.
* Verify that the implementation follows this `AGENTS.md`.
* Verify that the implementation follows `.agents/rules/ponytail.md`.
* Check whether an existing implementation could have been reused instead.
* Remove duplicate or unnecessary implementation.
* Remove unused imports introduced by the change.
* Remove dead code introduced by the change.
* Verify no unrelated files were modified unnecessarily.
* Run the smallest relevant verification available for the change.
* Run relevant linting, type checking, tests, or build checks when appropriate.
* Do not claim successful verification unless the relevant command actually succeeded.
* Create the required timestamped project change log under `docs/updates/`.

---

# Website & Demo Global Design Standards

## 1. Universal Zero Border-Radius Policy

**Completely remove border-radius from every component without exception.**

The following public website and demo components must use:

```css
border-radius: 0;
```

or when necessary:

```css
border-radius: 0 !important;
```

This applies to:

* cards
* buttons
* inputs
* search bars
* selects
* textareas
* checkboxes
* radios
* badges
* chips
* tags
* pills
* dialogs
* drawers
* modals
* dropdowns
* images
* avatars
* status indicators

Never introduce curved or rounded edges such as:

```text
rounded
rounded-sm
rounded-md
rounded-lg
rounded-xl
rounded-2xl
rounded-full
border-radius: 4px
border-radius: 8px
border-radius: 12px
border-radius: 999px
border-radius: 50%
```

in public website or demo views.

Avatars and status indicators must also use sharp, architectural square geometry instead of circular geometry.

### Important Scope

This zero-radius policy applies strictly to:

* public website views
* demo views

It does **not** apply to the Admin Panel.

The Admin Panel follows its own standards defined later in this document.

---

## 2. E.A.T.H. Travels Brand Logo Color Palette

Strictly adhere to the brand colors extracted from the official E.A.T.H. Travels (P) Ltd logo.

### Himalayan Mountain Peak Azure

```css
--color-primary: #0284c7;
```

Vivid accent:

```css
#2FB8FF
```

Use for:

* headings
* interactive links
* navigation active states
* alpine borders
* informational accents

Use accessible combinations that maintain sufficient contrast.

---

### Expedition Airplane & Backpack Crimson

```css
--color-accent: #ff0048;
```

Primary action tone:

```css
#e11d48
```

Use for:

* primary CTA buttons
* promotional tags
* urgency highlights
* important actions
* error states when appropriate

Do not overuse the accent color.

---

### Deep Alpine Navy

```css
--color-secondary: #0c4a6e;
```

Use for:

* dark footers
* hero gradient scrims
* dark structural accents
* supporting branded surfaces

---

### Trekker Silhouette & Logotype Charcoal

Primary text:

```css
--color-text: #0f172a;
```

Secondary text:

```css
#475569
```

Muted text:

```css
#64748b
```

Use these colors for primary and supporting content.

---

### Alpine Snow & Glacier Canvas

Surface:

```css
--color-surface: #ffffff;
```

Background:

```css
--color-background: #f8fafc;
```

Warm/light secondary background:

```css
--color-background-warm: #f1f5f9;
```

Use these for clean, luminous backgrounds reflecting snow, glacier, and alpine environments.

### Color Restrictions

* Never introduce arbitrary green or forest-themed palettes.
* Never introduce arbitrary brand colors.
* Always use existing project brand tokens before introducing a new color.
* Do not create one-off colors when an existing project token already serves the purpose.

---

## 3. Zero Ordinary Drop-Shadows

Never apply ordinary drop shadows or box shadows to standard:

* cards
* rows
* inputs
* tables
* sections
* content containers

Use:

```css
box-shadow: none;
```

Create visual depth through:

* whitespace
* spacing
* typography
* hierarchy
* tonal background contrast
* hairline borders

Standard hairline border:

```css
1px solid #e2e8f0
```

A single subtle shadow is permitted only for floating overlay elements such as:

* menus
* dropdown overlays
* drawers
* floating dialogs

and only when needed for separation from the underlying content.

---

## 4. Background-Free & Border-Free Step and Eyebrow Labels

Never wrap structural step indicators, section kickers, or eyebrow labels inside boxed badges.

Examples include:

```text
STEP 01 · LISTEN
STEP 02 · EVALUATE
STEP 03 · REFINE
PROPOSED PLANNING APPROACH
INTERACTIVE ROUTE MATCHING
```

These elements must use:

```css
background: transparent !important;
border: none !important;
padding: 0 !important;
```

Preferred presentation:

```css
color: var(--color-primary);
font-weight: 600;
text-transform: uppercase;
letter-spacing: 0.08em;
```

`var(--color-accent)` may be used when appropriate.

Do not use:

* pill backgrounds
* badge backgrounds
* boxed outlines
* unnecessary containers

for structural heading labels or step indicators.

---

# UI & Vuetify Component Standards — Admin Panel Only

> **IMPORTANT:** The Universal Zero Border-Radius Policy applies strictly to public website and demo views. It does **not** apply to the Admin Panel.

The Admin Panel strictly follows:

```text
admin-style.md
```

and global defaults configured in:

```text
packages/admin/resources/admin/plugins/vuetify.ts
```

and:

```text
admin.scss
```

Do not duplicate globally configured behavior inside individual Vue components.

Never add:

```text
rounded-0
rounded="0"
```

to admin Vue templates simply to override the global Admin Panel design.

Never create unnecessary scoped overrides such as:

```vue
<style scoped>
:deep(.v-btn) {
  border-radius: 0 !important;
}

:deep(.v-card) {
  border-radius: 0 !important;
}

:deep(.v-chip) {
  border-radius: 0 !important;
}
</style>
```

when styling is already controlled globally.

---

## 1. Cards (`<v-card>`)

### Standard Card Styling

Never add unnecessary custom styles to cards.

Do not apply custom borders such as:

```text
border
border-slate-200
border-slate-100
```

Do not create card-specific custom classes such as:

```text
.kpi-card
.custom-card
.dashboard-card
```

for styling that should come from global Vuetify configuration.

Do not add custom:

* hover transitions
* box shadows
* border radii
* card borders

unless explicitly required.

Cards must rely on the project's globally configured `VCard` defaults in:

```text
resources/admin/plugins/vuetify.ts
```

including:

```text
flat: true
elevation: 0
border: 0
rounded: 'lg'
```

Only use standard Vuetify utility classes when needed, for example:

```html
<v-card class="pa-4 h-100">
```

---

### Card Structure with `<v-card-title>`

When using `<v-card-title>`, use the standard structure:

```html
<v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
  ...
</v-card-title>

<v-divider />

<v-card-text>
  ...
</v-card-text>
```

Rules:

* Always place `<v-divider />` directly below `<v-card-title>`.
* Wrap card body content inside `<v-card-text>`.
* Do not add unnecessary classes to `<v-card-text>`.

---

### Card Header Titles and Icons

Card header title text inside `<v-card-title>` should use:

```html
class="text-uppercase font-weight-medium text-slate-800"
```

Do not add subtitles unless explicitly required.

When pairing an icon with a card title, use a compact avatar:

```text
size="24"
rounded
variant="tonal"
```

with icon size:

```text
size="14"
```

---

## 2. Buttons (`<v-btn>`)

Always use standard Vuetify theme colors.

Allowed standard colors include:

```text
primary
secondary
success
warning
error
info
```

Do not use arbitrary color strings such as:

```text
color="slate-600"
color="indigo-darken-1"
```

unless the project explicitly defines and requires them.

Standard action buttons should generally use:

```text
color="primary"
variant="outlined"
variant="tonal"
variant="text"
```

Prefer existing global button defaults before adding local styles.

---

## 3. Layouts & Grids (`<v-row>` / `<v-col>`)

Prefer Vuetify's grid system:

```text
<v-row>
<v-col>
```

over:

```css
display: grid;
```

or Tailwind grid utilities inside the Admin Panel.

Use Vuetify responsive breakpoints wherever practical.

### Top Summary / Dashboard Cards

On mobile screens, summary cards should normally render two per row.

Use:

```html
<v-col cols="6" sm="6" md="4" lg="2">
  <v-card class="pa-4 h-100" :to="{ name: '...' }">
    ...
  </v-card>
</v-col>
```

Do not change these cards to full-width mobile layout unless explicitly required.

---

## 4. Tables (`<v-table>` / `<v-data-table>`)

### No Extra Table Styling

Never add unnecessary custom styles or classes to:

```text
<v-table>
<v-data-table>
<v-data-table-server>
```

Do not add:

```text
border
rounded-lg
custom box-shadow
custom border
custom table wrapper styling
```

when those concerns are already handled globally.

All tables rely on styles configured in:

```text
resources/admin/admin.scss
resources/admin/plugins/vuetify.ts
```

---

### One Data Point Per Column

Never display unrelated pieces of information inside the same table column.

Do not stack combinations such as:

```text
name + email
name + country
email + phone
```

inside one column.

Each column must represent a dedicated data point.

Example:

```text
Traveller
Email
Country
Phone
Status
Actions
```

---

### Table Cell Typography

Do not add unnecessary font-weight utility classes to regular table cells.

Avoid:

```text
font-weight-medium
font-weight-bold
```

and custom inline font-weight styles.

Keep regular table content at its default weight.

If distinction is required, prefer:

* text color
* Vuetify chips
* status colors
* icons

instead of arbitrary font weight.

---

### Links Inside Table Cells

When a table cell contains a link using:

```text
<router-link>
<a>
```

use:

```html
class="text-primary text-decoration-underline"
```

---

### Sticky Right Action Column

When a table contains an `actions` column:

* it must be the final column
* it must remain sticky/pinned to the right during horizontal scrolling
* the header must be center aligned
* the action contents must be center aligned

This behavior is handled globally in:

```text
resources/admin/admin.scss
```

for:

```text
.v-data-table
.v-data-table-server
```

Do not reimplement sticky-action behavior in individual components.

---

### Table Header Styling

Table headers across:

```text
.v-table
.v-data-table
.v-data-table-server
```

use:

```css
font-weight: 600;
```

and a light primary-tinted background based on:

```css
rgba(var(--v-theme-primary), 0.06)
```

blended over the surface.

This is configured globally in:

```text
resources/admin/admin.scss
```

Do not duplicate this styling locally.

---

# Mandatory Project Change Logging (`docs/updates/`)

Every meaningful change must create a new timestamped documentation file.

This includes:

* features
* updates
* bug fixes
* UI changes
* refactors
* API changes
* behavior changes
* configuration changes

Use:

```text
docs/updates/YYYY-MM-DD-HH-MM-<short-descriptive-slug>.md
```

Example:

```text
docs/updates/2026-09-13-00-20-fixed-departure-layout.md
```

## Timezone

All timestamps must use:

```text
Nepal Time (NPT / UTC+05:45)
```

Do not use UTC timestamps for project update filenames.

---

## Change Log Rules

* Never overwrite an existing update file.
* Every task/session that makes code changes must create its own update record.
* Keep filenames short and descriptive.
* Follow:

```text
docs/updates/README.md
```

Use the required sections:

```text
Summary
Detailed Changes
Verification Commands & Outputs
Next Steps
```

Do not state that verification passed unless the listed commands actually ran successfully.

---

# Final Agent Checklist

Before finishing any implementation:

1. Did you inspect the existing implementation first?
2. Did you reuse existing project code where possible?
3. Did you follow `AGENTS.md`?
4. Did you follow `.agents/rules/ponytail.md`?
5. Did you avoid unnecessary abstractions?
6. Did you avoid unnecessary dependencies?
7. Did you avoid unrelated changes?
8. Did you preserve existing behavior unless change was requested?
9. Did you follow the correct public-site or Admin Panel design rules?
10. Did you remove unused imports and dead code?
11. Did you run the smallest relevant verification?
12. Did you create the required `docs/updates/` change log?

If any applicable item is missing, the task is not complete.
