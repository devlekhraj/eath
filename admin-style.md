# Admin Panel UI & Vuetify Style Guidelines

This document defines the definitive styling architecture and component standards for the **E.A.T.H. Admin Panel** (`packages/admin/resources/admin/`).

---

## 1. Core Architecture & Philosophy

1. **Vuetify 3 + Scss First**:
   - The admin panel relies on global defaults defined in [`packages/admin/resources/admin/plugins/vuetify.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/plugins/vuetify.ts) and [`packages/admin/resources/admin/admin.scss`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/admin.scss).
   - **Never duplicate attributes in `.vue` templates that are already configured in global defaults.**
2. **Distinct Admin vs. Website Scope**:
   - **Website & Demo Scope**: Universal Zero Border-Radius (`border-radius: 0 !important`) applies **exclusively** to the public-facing website and demo views (`packages/website/` and `resources/views/website_preview/`).
   - **Admin Panel Scope**: Strictly uses native Vuetify theme geometry:
     - Cards: `rounded: 'lg'` (configured globally in `vuetify.ts`).
     - Tables: `border-radius: 4px !important` (configured globally in `admin.scss`).
     - Avatars: `rounded: true` (compact tonal rounded avatars).
     - Chips & Buttons: Native Vuetify curvature.
   - **Never inject `rounded-0`, `rounded="0"`, or `rounded-0 !important` into admin panel Vue templates.**
3. **Zero Scoped CSS Overrides on Vuetify Components**:
   - **Never ever use `<style scoped>` to override global Vuetify component styles** (e.g. `:deep(.v-btn)`, `:deep(.v-card)`, `:deep(.v-chip)`, `:deep(.v-field) { border-radius: 0 !important; }`).
   - Component styles must strictly inherit from `vuetify.ts` and `admin.scss`. Scoped style blocks must never fight or override global theme definitions.

---

## 2. Global Vuetify Defaults in `vuetify.ts` (Never Duplicate)

The following defaults are set globally in [`vuetify.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/plugins/vuetify.ts). **Do NOT add these attributes to individual template tags:**

| Component | Globally Configured Defaults | Attributes to NEVER write in templates |
| :--- | :--- | :--- |
| `<v-card>` | `flat: true`, `elevation: 0`, `border: 0`, `rounded: 'lg'` | `flat`, `elevation="0"`, `class="elevation-0"`, `border`, `class="border"`, `rounded="lg"`, `rounded="0"`, `class="rounded-0"` |
| `<v-text-field>` | `density: 'compact'`, `variant: 'outlined'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `variant="outlined"`, `color="primary"`, `hide-details="auto"` |
| `<v-select>` | `density: 'compact'`, `variant: 'outlined'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `variant="outlined"`, `color="primary"`, `hide-details="auto"` |
| `<v-autocomplete>` | `density: 'compact'`, `variant: 'outlined'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `variant="outlined"`, `color="primary"`, `hide-details="auto"` |
| `<v-combobox>` | `density: 'compact'`, `variant: 'outlined'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `variant="outlined"`, `color="primary"`, `hide-details="auto"` |
| `<v-textarea>` | `density: 'compact'`, `variant: 'outlined'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `variant="outlined"`, `color="primary"`, `hide-details="auto"` |
| `<v-file-input>` | `density: 'compact'`, `variant: 'outlined'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `variant="outlined"`, `color="primary"`, `hide-details="auto"` |
| `<v-date-input>` | `density: 'compact'`, `variant: 'outlined'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `variant="outlined"`, `color="primary"`, `hide-details="auto"` |
| `<v-checkbox>` | `density: 'compact'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `color="primary"`, `hide-details="auto"` |
| `<v-radio>` | `density: 'compact'`, `color: 'primary'`, `hideDetails: 'auto'` | `density="compact"`, `color="primary"`, `hide-details="auto"` |
| `<v-switch>` | `density: 'compact'`, `color: 'primary'`, `inset: true`, `hideDetails: 'auto'` | `density="compact"`, `color="primary"`, `inset`, `hide-details="auto"` |
| `<v-avatar>` | `rounded: true`, `variant: 'tonal'` | `rounded`, `rounded="0"`, `variant="tonal"` |
| `<v-chip>` | `size: 'small'`, `variant: 'tonal'`, `label: true`, `class: 'text-capitalize'` | `size="small"`, `label`, `class="text-capitalize"`, `rounded-0` |
| `<v-btn>` | `elevation: 0` | `elevation="0"`, `rounded-0` |
| `<v-progress-linear>` | `height: 6`, `rounded: true` | `height="6"`, `rounded`, `rounded="0"` |
| `<v-alert>` | `density: 'comfortable'`, `variant: 'tonal'` | `density="comfortable"`, `variant="tonal"` |
| `<v-table>`, `<v-data-table>`, `<v-data-table-server>` | `density: 'comfortable'`, `hover: true` | `density="comfortable"`, `hover`, `class="border"`, `class="rounded-lg"` |

---

## 3. Card Standards (`<v-card>`)

### Rules:
1. **Never use extra or custom styles on cards**:
   - Do NOT apply custom borders (`border`, `border-slate-200`, `border-slate-100`).
   - Do NOT add custom CSS classes (`.kpi-card`, custom hover transitions, custom box-shadows).
   - Only use standard Vuetify padding and sizing utilities (e.g. `class="pa-4 h-100"`).
2. **Standard Card Header Title & Structure**:
   ```html
   <v-card>
     <v-card-title class="d-flex align-center justify-space-between pa-3 text-primary">
       <div class="d-flex align-center ga-2">
         <v-avatar size="24" color="primary">
           <v-icon size="14">mdi-icon-name</v-icon>
         </v-avatar>
         <span class="text-uppercase font-weight-medium text-slate-800" style="font-size: 0.82rem; letter-spacing: 0.03em;">
           Section Title
         </span>
       </div>
       <!-- Optional Top Right Action Button -->
       <v-btn variant="text" color="primary" size="small" :to="{ name: 'targetRoute' }">
         View All &rarr;
       </v-btn>
     </v-card-title>
     <v-divider />
     <v-card-text>
       <!-- Card Body Content -->
     </v-card-text>
   </v-card>
   ```
   - **Always place `<v-divider />` directly below `<v-card-title>`.**
   - Title text uses: `class="text-uppercase font-weight-medium text-slate-800"`.
   - Title icon avatar uses: `size="24"` with an icon size of `size="14"`.
   - Do not add custom class attributes to `<v-card-text>` (except standard padding helpers like `pa-0` for flush tables).

---

## 4. Tables (`<v-table>`, `<v-data-table>`, `<v-data-table-server>`)

### Rules:
1. **Never add custom classes or styles to tables**:
   - Do NOT add `class="border"`, `class="rounded-lg"`, custom box-shadows, or custom borders.
   - All tables are globally styled in [`admin.scss`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/admin.scss):
     - Headers: Semi-bold (`font-weight: 600`) with light primary tint background (`rgba(var(--v-theme-primary), 0.06)`).
     - Cell typography: `0.82rem` font size.
     - Table container: `border-radius: 4px !important`, `overflow: hidden`.
2. **One Data Point Per Column**:
   - **Never stack multiple attributes into a single table cell** (e.g. do not combine Name + Email or Name + Country).
   - Each column must strictly represent a single, dedicated data point.
3. **No Custom Font Weight Classes**:
   - Keep default normal font weight in all table cells. Do NOT add `font-weight-medium`, `font-weight-bold`, or inline bold styles.
   - Use color or tonal chips (`<v-chip color="success">`) for status or distinction.
4. **Links in Table Columns**:
   - All links inside table cells must use: `class="text-primary text-decoration-underline"`.
5. **Sticky Right & Center-Aligned Actions Column**:
   - When a table has an action column (`key: 'actions'`), it must be the **last column**.
   - It is pinned sticky to the right edge during horizontal scrolling and centered automatically via global CSS.

---

## 5. Buttons (`<v-btn>`)

### Rules:
1. **Always use standard Vuetify theme colors**:
   - Permitted: `primary`, `secondary`, `success`, `warning`, `error`, `info`.
   - **Never** use arbitrary Tailwind strings (e.g. `color="slate-600"`, `color="indigo-darken-1"`).
2. **Standard Action Variants**:
   - Primary submit / call-to-action: `color="primary" variant="flat"` (**CRITICAL: Never use `elevated`; use `variant="flat"` instead of `elevated` for `<v-btn>`**).
   - Secondary / filter / action: `color="primary" variant="outlined"` or `variant="tonal"`
   - Cancel / close: `variant="text"`
3. **No `size="small"` for Action Buttons**:
   - Action buttons (page header actions, toolbar actions, card action bars, form submit/save buttons, modal/drawer action buttons) must use **standard default Vuetify button sizing**.
   - **Never apply `size="small"` or `size="x-small"` to action buttons.**
   - Only compact inline table-row actions or modal header close icon buttons may use compact/small sizing where space constraints require it.

---

## 6. Layouts & Grids (`<v-row>` / `<v-col>`)

### Rules:
1. **Prefer Vuetify Grid**:
   - Always use `<v-row>` and `<v-col>` instead of custom CSS Grid (`display: grid`) or Tailwind grid utilities.
2. **Top Summary / Dashboard Metric Cards Mobile Sizing**:
   - Always use `cols="6"` for mobile so cards render **2 per row** on small devices:
   ```html
   <v-col cols="6" sm="6" md="4" lg="2">
     <v-card class="pa-4 h-100" :to="{ name: '...' }">
       ...
     </v-card>
   </v-col>
   ```

---

## 7. Modal & Dialog Standards (`<v-dialog>`)

### Rules:
1. Dialogs should wrap content in a clean `<v-card>` following `.agents/rules/modal.md`:
   ```html
   <v-dialog v-model="isOpen" max-width="600px">
     <v-card>
       <v-card-title class="d-flex align-center justify-space-between py-0">
         <span>Dialog Title</span>
         <v-btn icon size="small" variant="text" aria-label="Close dialog" @click="isOpen = false">
           <v-icon>mdi-close</v-icon>
         </v-btn>
       </v-card-title>
       <v-divider />
       <v-card-text>
         <v-form @submit.prevent="handleSubmit">
           <v-row>
             <v-col cols="12">
               <div class="mb-2">
                 <!-- Inputs inherit compact, outlined, and hideDetails automatically -->
                 <v-text-field v-model="form.name" label="Name *" required />
               </div>
             </v-col>
           </v-row>
         </v-form>
       </v-card-text>
       <v-card-actions class="justify-end">
         <v-btn variant="text" @click="isOpen = false">Cancel</v-btn>
         <v-btn color="primary" variant="flat" :loading="saving" @click="handleSubmit">
           Save
         </v-btn>
       </v-card-actions>
     </v-card>
   </v-dialog>
   ```
2. **Form inputs must be wrapped in `<div class="mb-2">`** inside `<v-card-text>`.
3. Modal header must use `class="d-flex align-center justify-space-between py-0"` with a simple `<span>` for the title.
4. Modal actions must use `class="justify-end"` with a `variant="text"` Cancel button and standard primary submit button (`variant="flat"`). Do NOT separate buttons with `<v-spacer />`.
5. Modal action buttons must use default standard sizing (do NOT use `size="small"`).

---

## 8. Anti-Patterns Checklist ("Do NOT Do This")

| ❌ Anti-Pattern / Mistake | ✅ Clean Global Standard | Reason |
| :--- | :--- | :--- |
| `<v-btn variant="elevated" color="primary">Save</v-btn>` | `<v-btn color="primary" variant="flat">Save</v-btn>` | Never use elevated; always use `variant="flat"` instead of elevated for `<v-btn>`. |
| `<v-btn size="small" color="primary">Add Item</v-btn>` | `<v-btn color="primary">Add Item</v-btn>` | Action buttons must use default standard Vuetify sizing, never `size="small"`. |
| `<v-card-actions class="justify-end"><v-btn>Cancel</v-btn><v-spacer /><v-btn>Save</v-btn></v-card-actions>` | `<v-card-actions class="justify-end"><v-btn variant="text">Cancel</v-btn><v-btn color="primary" variant="flat">Save</v-btn></v-card-actions>` | Action buttons must sit together right-aligned; `<v-spacer />` pushes them apart. |
| `<v-card class="rounded-0 elevation-0 border">` | `<v-card>` or `<v-card class="pa-4 h-100">` | `VCard` default is already flat, zero-elevation, borderless, and `rounded: 'lg'` in `vuetify.ts`. |
| `<v-avatar rounded="0">` | `<v-avatar size="24" color="primary">` | `VAvatar` default is already tonal & rounded. |
| `<v-text-field density="compact" variant="outlined" hide-details="auto">` | `<v-text-field label="Name">` | All text fields globally inherit compact outlined with auto details. |
| `<v-switch inset density="compact" hide-details color="primary">` | `<v-switch v-model="active" label="Status">` | `VSwitch` globally inherits compact, inset, primary, auto details. |
| `<v-chip size="small" label class="text-capitalize rounded-0">` | `<v-chip color="success">` | `VChip` globally inherits small, tonal, label, text-capitalize. |
| `<v-data-table class="border rounded-lg shadow-sm">` | `<v-data-table :headers="headers" :items="items">` | Tables already have 4px radius, borders, and sticky action headers via `admin.scss`. |
| `<td><b>{{ item.name }}</b><br>{{ item.email }}</td>` | Dedicated `name` and `email` columns | 1 column = 1 dedicated data point; keep default cell font weight. |
