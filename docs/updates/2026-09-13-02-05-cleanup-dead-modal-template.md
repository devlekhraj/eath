# Admin Panel: Remove Unused ModalTemplate & $modal Registration

## Summary
Cleaned up legacy dead code in [`packages/admin/resources/admin/main.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/main.ts) and removed the unused [`ModalTemplate.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/components/ModalTemplate.vue) component.

## Detailed Changes

### 1. `packages/admin/resources/admin/main.ts`
- Removed unused import of `ModalTemplate` and `useGlobalModal`.
- Removed unused `app.component('ModalTemplate', ModalTemplate)` registration.
- Removed unused `app.config.globalProperties.$modal = modal`.
- All modals across the application use the `useGlobalModal()` composable with `<GlobalModalHost />` mounted in `App.vue`.

### 2. Removed Dead File
- Deleted `packages/admin/resources/admin/components/ModalTemplate.vue`.

## Verification Commands & Outputs

### 1. Vite Build Check
```bash
npm run build
```
**Output:**
```text
✓ 907 modules transformed.
✓ built in 23.50s
Status: Exited with code 0 (0 errors)
```
