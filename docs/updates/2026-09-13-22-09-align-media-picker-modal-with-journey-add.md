# 2026-09-13-22-09 - Align MediaAssetPickerModal with JourneyAdd Modal Style

## Summary
Aligned `packages/admin/resources/admin/components/media/MediaAssetPickerModal.vue`'s `<v-card-title>` and `<v-card-actions>` to exactly match the pattern used in `packages/admin/resources/admin/pages/journeys/modal/JourneyAdd.vue`.

## Detailed Changes
- **`packages/admin/resources/admin/components/media/MediaAssetPickerModal.vue`**:
  - Updated `<v-card-title>`:
    ```html
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Media Asset Library</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="$emit('close')">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    ```
  - Updated `<v-card-actions>`:
    ```html
    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="$emit('close')">Cancel</v-btn>
      <v-btn
        color="primary"
        :disabled="!selectedAsset"
        @click="confirmSelection(selectedAsset)"
      >
        Select Image
      </v-btn>
    </v-card-actions>
    ```

## Verification Commands & Outputs
- `npm run build`
  - Output: `built in 14.70s` (0 errors)

## Next Steps
- Continue implementing next feature tasks.
