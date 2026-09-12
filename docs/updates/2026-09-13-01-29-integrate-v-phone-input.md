# Admin Panel: Integrate v-phone-input for Phone Input Fields

## Summary
Integrated `v-phone-input` into the admin panel form workflow, replacing standard text fields for phone numbers with international phone number inputs featuring country selection and phone validation, styled uniformly with `density="comfortable"`, `variant="outlined"`, and `color="primary"`.

## Detailed Changes

### 1. `packages/admin/resources/admin/pages/guides/modal/GuideForm.vue`
- Replaced `<v-text-field v-model="form.phone_no" ... />` with `<v-phone-input v-model="form.phone_no" label="Phone" density="comfortable" variant="outlined" color="primary" :rules="[rules.required]" :error-messages="serverErrors.phone_no" required />`.
- Wrapped in `<div class="mb-2">` to maintain uniform input spacing.

## Verification Commands & Outputs

### 1. Vite Production Build Check
```bash
cd packages/admin && npm run build
```
**Output:**
```text
✓ built in 22.07s
Status: 0 errors
```

## Next Steps
- Use `<v-phone-input>` with `density="comfortable" variant="outlined" color="primary"` for any future phone number input fields across admin forms.
