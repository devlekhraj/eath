# Admin Modal & Dialog Standards

This document establishes the mandatory structural and styling standards for all modal and dialog components in the Admin Panel (`packages/admin/resources/admin/`).

---

## 1. Standard Modal Template Structure

Every modal component rendered via `<v-dialog>` or `useGlobalModal()` must adhere to this exact `<v-card>` layout:

```html
<template>
  <v-card>
    <!-- 1. Modal Header -->
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Modal Title</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <!-- 2. Modal Body -->
    <v-card-text>
      <v-form ref="formRef" @submit.prevent="submitForm" lazy-validation>
        <v-row>
          <v-col cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="form.field"
                label="Field Label"
                :rules="[rules.required]"
              />
            </div>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>

    <!-- 3. Modal Actions / Footer -->
    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
      <v-btn color="primary" variant="flat" :loading="loading" @click="submitForm">Save</v-btn>
    </v-card-actions>
  </v-card>
</template>
```

---

## 2. Core Rules & Guidelines

### A. Modal Header (`<v-card-title>`)
* Use `class="d-flex align-center justify-space-between py-0"`.
* Wrap the title in a simple `<span>Modal Title</span>`.
* The close button must use:
  ```html
  <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="handleCancel">
    <v-icon>mdi-close</v-icon>
  </v-btn>
  ```
* Always place `<v-divider />` immediately below `<v-card-title>`.

### B. Form Inputs Wrapped in `<div class="mb-2">`
* **Every form field inside `<v-card-text>` must be wrapped inside a `<div class="mb-2">` container**:
  ```html
  <v-col cols="12" md="6">
    <div class="mb-2">
      <v-text-field v-model="form.name" label="Name" />
    </div>
  </v-col>
  ```
* This applies to:
  - `<v-text-field>`
  - `<v-textarea>`
  - `<v-select>`
  - `<v-autocomplete>`
  - `<v-combobox>`
  - `<v-file-input>`
  - Custom file / date / phone inputs

### C. Modal Actions (`<v-card-actions>`)
* Use `class="justify-end"`.
* Cancel button:
  ```html
  <v-btn variant="text" @click="handleCancel">Cancel</v-btn>
  ```
* Primary submit/confirmation button:
  ```html
  <v-btn color="primary" variant="flat" :loading="loading" @click="submitForm">Save</v-btn>
  ```
* **Never use `elevated`; use `variant="flat"` instead of `elevated` for `<v-btn>`.**
* Do not separate buttons with `<v-spacer />`.
* Action buttons must use default standard sizing (do NOT use `size="small"`).

### D. Anti-Patterns to Avoid
1. **Never add arbitrary custom heights**: Do not apply `style="max-height: 85vh;"` on `<v-card>` — `GlobalModalHost.vue` provides `<v-dialog scrollable>` automatically.
2. **Never place search or actions outside `<v-card-text>`**: Keep all intermediate controls inside `<v-card-text>` so body scrolling is uniform.
3. **Never duplicate global Vuetify defaults**: Omit `density="compact"`, `variant="outlined"`, and `hide-details="auto"` from form fields as they are configured globally in `vuetify.ts`.
4. **Never write scoped CSS for Vuetify cards or buttons**: Do not create card-specific classes or hover transforms.
