# Agent Rules & Coding Guidelines

## Website & Demo Global Design Standards

### 1. Universal Zero Border-Radius Policy
- **Completely remove border-radius from every component without exception:**
  - All cards, buttons, inputs, search bars, selects, textareas, checkboxes, radios, badges, chips, tags, pills, dialogs, drawers, modals, dropdowns, and images must have `border-radius: 0` (`border-radius: 0 !important`).
  - Never introduce curved or rounded edges (`rounded`, `rounded-lg`, `rounded-full`, `border-radius: 4px/8px/12px/999px`) in website or demo views.
  - Avatars and status indicators must also use sharp, architectural square geometry instead of circular `50%` radius.

### 2. E.A.T.H. Travels Brand Logo Color Palette
- **Strictly adhere to the brand colors extracted from the official E.A.T.H. Travels (P) Ltd logo:**
  - **Himalayan Mountain Peak Azure (`--color-primary: #0284c7;`, vivid accent: `#2FB8FF`)**:
    - Primary brand color for headings, interactive links, navigation active states, and alpine borders. Meets WCAG AA contrast against white/light backgrounds.
  - **Expedition Airplane & Backpack Crimson (`--color-accent: #ff0048;`, action: `#e11d48`)**:
    - High-energy accent color for primary call-to-action buttons, promotional tags, urgency highlights, and error states.
  - **Deep Alpine Navy (`--color-secondary: #0c4a6e;`)**:
    - Secondary tone for dark footers, hero gradient scrims, and dark structural accents.
  - **Trekker Silhouette & Logotype Charcoal (`--color-text: #0f172a;`, secondary: `#475569`, muted: `#64748b`)**:
    - Primary and supporting body copy colors matching the hiker silhouette and brand logotype text.
  - **Alpine Snow & Glacier Canvas (`--color-surface: #ffffff;`, `--color-background: #f8fafc;`, `--color-background-warm: #f1f5f9;`)**:
    - Clean, luminous backgrounds reflecting pure snow and alpine rock.
  - Never use arbitrary green or forest themes. Always source from these brand tokens.

### 3. Zero Ordinary Drop-Shadows
- Never apply drop shadows or box-shadows to standard cards, rows, inputs, tables, or sections (`box-shadow: none`).
- Create depth and visual hierarchy exclusively through whitespace, hairline borders (`1px solid #e2e8f0`), tonal background contrast, and typography.
- A single subtle shadow is only permitted on floating overlay menus/drawers if needed for screen separation.

### 4. Background-Free & Border-Free Step & Eyebrow Labels
- **Never wrap step indicators, section kickers, or eyebrow labels in boxed badges:**
  - Elements like `STEP 01 · LISTEN`, `STEP 02 · EVALUATE`, `STEP 03 · REFINE`, `PROPOSED PLANNING APPROACH`, `INTERACTIVE ROUTE MATCHING`, etc., must have `background: transparent !important`, `border: none !important`, and `padding: 0 !important`.
  - Use brand-colored text (`color: var(--color-primary)` or `var(--color-accent)`) with semi-bold weight (`font-weight: 600`), uppercase formatting, and subtle tracking (`letter-spacing: 0.08em`).
  - Do not use boxed pill backgrounds or border outlines for structural heading labels or step indicators.

## UI & Vuetify Component Standards (Admin Panel Only)

### 1. Cards (`<v-card>`)
- **Never use extra or custom styles on cards:**
  - Do NOT apply custom borders (e.g., `border border-slate-200`, `border-slate-100`).
  - Do NOT add custom CSS classes (e.g., `.kpi-card`, custom hover transitions, custom box-shadows).
  - All cards must strictly rely on the project's default `VCard` styles defined in `resources/admin/plugins/vuetify.ts` (`flat: true`, `elevation: 0`, `border: 0`, `rounded: 'lg'`).
  - Only use standard Vuetify padding and sizing utilities (e.g., `class="pa-4 h-100"`).
- **Card Structure with `<v-card-title>`:**
  - Whenever using `<v-card-title>`, strictly use the standard:
    ```html
    <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
      ...
    </v-card-title>
    <v-divider />
    <v-card-text>
      ...
    </v-card-text>
    ```
  - Always place `<v-divider />` directly below `<v-card-title>`.
  - Wrap the card body content inside `<v-card-text>` without adding any class attributes to `<v-card-text>`.
- **Card Header Titles & Icons:**
  - Card header title text inside `<v-card-title>` should use `class="text-uppercase font-weight-medium text-slate-800"` without subtitles.
  - When pairing an icon with the title, use a compact avatar (`size="24"`, `rounded`, `variant="tonal"`) with a decreased icon size (`size="14"`).

### 2. Buttons (`<v-btn>`)
- **Always use standard colors on buttons:**
  - When using the `color` attribute, strictly use standard Vuetify theme colors (`primary`, `secondary`, `success`, `warning`, `error`, `info`).
  - Never use arbitrary or Tailwind-style color strings like `color="slate-600"`, `color="indigo-darken-1"`, etc.
  - Standard action buttons should use `color="primary"`, `variant="outlined"`, `variant="tonal"`, or `variant="text"`.

### 3. Layouts & Grids (`<v-row>` / `<v-col>`)
- **Prefer `<v-row>` and `<v-col>` over custom CSS grid:**
  - Use Vuetify's responsive grid system (`<v-row>` and `<v-col>`) rather than `display: grid` or Tailwind grid utilities.
- **Top summary/dashboard cards mobile sizing:**
  - Always use `cols="6"` for mobile screens so that cards render 2 per row on small devices instead of spanning full-width:
    ```html
    <v-col cols="6" sm="6" md="4" lg="2">
      <v-card class="pa-4 h-100" :to="{ name: '...' }">
        ...
      </v-card>
    </v-col>
    ```

### 4. Tables (`<v-table>` / `<v-data-table>`)
- **Never use extra styles or classes on tables:**
  - Do NOT add classes like `border`, `rounded-lg`, custom box-shadows, or custom borders to `<v-table>`, `<v-data-table>`, or `<v-data-table-server>`.
  - All tables already have global styles and defaults in `resources/admin/admin.scss` and `resources/admin/plugins/vuetify.ts`. Never ever use extra styling and classes.
- **Never display multiple pieces of information in the same table column:**
  - Do NOT stack two different attributes in a single cell (e.g., name + email, or name + country).
  - Each column must strictly represent a single, dedicated data point (e.g., separate columns for "Traveller", "Email", "Country").
- **Never use extra styles or font-weight classes in table columns:**
  - Do NOT add classes like `font-weight-medium`, `font-weight-bold`, or custom inline styles to table cells.
  - Always keep text with its normal default weight.
  - If emphasis or distinction is required, use color (e.g., text color or chips) instead of font-weight.
- **Links in table columns:**
  - When a table cell contains a link (`<router-link>` or `<a>`), always apply primary color and underline: `class="text-primary text-decoration-underline"`.
- **Sticky right & center-aligned action column:**
  - When a data table has an action column (`actions`), it must be placed as the last column so it stays pinned/sticky to the right edge during horizontal scrolling.
  - The action header label and action column contents are center-aligned.
  - This is globally handled via `resources/admin/admin.scss` on `.v-data-table` and `.v-data-table-server` (sticky right: 0, surface background, and center alignment).
- **Table header styling (Semi-bold & light primary background):**
  - All table headers across `.v-table`, `.v-data-table`, and `.v-data-table-server` have semi-bold text (`font-weight: 600`) and a very light primary tint background (`rgba(var(--v-theme-primary), 0.06)` blended over surface), configured globally in `resources/admin/admin.scss`.
