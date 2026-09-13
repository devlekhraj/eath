# Media Management & Attachment Standards

This standard defines the universal media architecture, API conventions, and UI patterns for managing entity media (Destinations, Journeys, Articles, Guides, etc.) across the E.A.T.H. application.

---

## 1. Architectural Principles

1. **Decoupled Asset Storage**:
   - Entities never store binary files or direct file paths in their own tables.
   - Files are uploaded to `media_assets` with metadata (`path`, `disk`, `mime_type`, `size_bytes`, `width`, `height`).
   - URLs are generated dynamically via Laravel's Filesystem adapter (`Storage::disk($this->disk)->url($this->path)`).

2. **Polymorphic Media Attachments (`media_attachments`)**:
   - Entities link to `media_assets` through the `media_attachments` table:
     - `attachable_type`: Model class (e.g., `Admin\Models\Destination`, `Admin\Models\Journey`).
     - `attachable_id`: Entity primary key.
     - `media_asset_id`: Foreign key referencing `media_assets.id`.
     - `collection`: Logical group (`hero`, `card`, `gallery`, `itinerary`, etc.).
     - `alt_text`: Accessible description for SEO and screen readers.
     - `title`: Optional asset title.
     - `caption`: Optional editorial caption/notes.
     - `sort_order`: Display sequence integer (`0`-indexed).

3. **Eloquent Model Integration (`HasMediaAttachments`)**:
   - Models use the `Admin\Models\Concerns\HasMediaAttachments` trait.
   - Standard relationships:
     - `mediaAttachments()`: Polymorphic `MorphMany` relationship ordered by `sort_order`.
     - `heroAttachment()`: `MorphOne` filtered by `collection = 'hero'`.
     - `cardAttachment()`: `MorphOne` filtered by `collection = 'card'`.
     - `galleryAttachments()`: `MorphMany` filtered by `collection = 'gallery'`.
   - Core helper methods:
     - `syncMediaAttachment(int $mediaAssetId, string $collection, array $meta = [])`: Atomically detaches prior item (if single-item collection like hero/card) and attaches the new asset.
     - `attachMedia(int $mediaAssetId, string $collection, array $meta = [])`: Idempotent attachment preventing duplicates in multi-item collections like `gallery`.
     - `detachMediaCollection(string $collection)`: Removes all attachments for a specific collection.

---

## 2. Backend API Standards

Every entity with media management must implement uniform API endpoints:

| Method | Endpoint | Purpose |
|---|---|---|
| `POST` | `/api/admin/{entities}/{id}/media-attachments` | Attach an asset to a collection (`media_asset_id`, `collection`, `alt_text`, `title`, `caption`). |
| `PATCH` | `/api/admin/{entities}/{id}/media-attachments/{attachmentId}` | Update metadata (`alt_text`, `title`, `caption`, `sort_order`) for an attached image. |
| `DELETE` | `/api/admin/{entities}/{id}/media-attachments/{attachmentId}` | Detach an image from the entity's collection. |
| `PUT/PATCH`| `/api/admin/{entities}/{id}` | Accepts `{hero_image_id, card_image_id}` to sync primary single-item collections. |

### API Controller Contract
- Validation rules for `media-attachments`:
  ```php
  'media_asset_id' => ['required', 'integer', 'exists:media_assets,id'],
  'collection'     => ['required', 'string', 'max:50'],
  'alt_text'       => ['nullable', 'string', 'max:255'],
  'title'          => ['nullable', 'string', 'max:255'],
  'caption'        => ['nullable', 'string', 'max:500'],
  'sort_order'     => ['nullable', 'integer', 'min:0'],
  ```
- Validation rules for metadata update:
  ```php
  'alt_text'   => ['nullable', 'string', 'max:255'],
  'title'      => ['nullable', 'string', 'max:255'],
  'caption'    => ['nullable', 'string', 'max:500'],
  'sort_order' => ['nullable', 'integer', 'min:0'],
  ```
- Responses always return a refreshed resource with relations loaded:
  ```php
  'data' => new EntityResource($entity->fresh()->load([
      'heroAttachment.mediaAsset',
      'cardAttachment.mediaAsset',
      'galleryAttachments.mediaAsset',
  ])),
  ```

### API Resource Transformation
The entity's API resource must expose:
- `hero_image_id`: Integer ID or null.
- `card_image_id`: Integer ID or null.
- `hero_image`:
  ```json
  {
    "id": 12,
    "attachment_id": 45,
    "url": "http://eath.test/cdn/media/...",
    "filename": "everest-panorama.webp",
    "mime_type": "image/webp",
    "size_bytes": 451200,
    "width": 1920,
    "height": 1080,
    "alt_text": "Panoramic view of Mount Everest",
    "title": "Everest Base Camp View",
    "caption": "Taken from Kala Patthar"
  }
  ```
- `card_image`: Similar object structure for catalog card thumbnail.
- `gallery`: Array of similar objects representing additional photo attachments.

---

## 3. UI Implementation Standards (`TabMedia.vue`)

### Card Layout Architecture
1. **Hero Banner Section**:
   - Displayed in dedicated card (`v-col cols="12" md="6"`).
   - High-resolution panoramic preview (`height="200" cover`).
   - Visible metadata: Filename, dimensions (`width x height`), and active `Alt: <alt_text>` display.
   - Actions: `Remove` (`variant="outlined" color="error"`), `Edit Alt Text` (`variant="outlined" color="primary"`), `Media Library` (`variant="outlined" color="secondary"`), and `Upload Image` / `Replace Image` (`variant="flat" color="primary"`).

2. **Card Thumbnail Section**:
   - Displayed in dedicated card (`v-col cols="12" md="6"`).
   - Thumbnail preview (`height="200" cover`).
   - Visible metadata and same uniform action buttons.

3. **Gallery Section**:
   - Full-width card (`v-col cols="12"`).
   - Header with count badge: `Entity Gallery (N)`.
   - Grid layout: `v-row` with `v-col cols="12" sm="6" md="4" lg="3"`.
   - Image cards include image preview (`height="160" cover`), filename, alt text / caption preview, and compact action buttons (`Edit` and `Remove`).
   - Top action buttons: `Add from Library` (`variant="outlined" color="secondary"`) and `Upload Photos` (`variant="flat" color="primary"` with `multiple` file input).

---

## 4. Modal & Dialog Rules for Media Operations

All media-related dialogs must strictly comply with project modal standards:

### Rule 1: Header Structure
- Must use `<v-card-title class="d-flex align-center justify-space-between py-0">`.
- Title on the left, close button on the right:
  ```html
  <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="dialog.open = false">
    <v-icon>mdi-close</v-icon>
  </v-btn>
  ```
- Followed immediately by `<v-divider />`.

### Rule 2: Input Container Standard
- **Every form field (`v-text-field`, `v-textarea`, `v-select`) MUST be wrapped inside a `<div class="mb-2">`**.
- Never place form fields as direct children of `<v-col>` or `<v-form>` without the `<div class="mb-2">` wrapper.

### Rule 3: Actions Footer Structure
- Must use `<v-card-actions class="justify-end">`.
- **Never use `<v-spacer />`**.
- Cancel button: `<v-btn variant="text" @click="...">Cancel</v-btn>`.
- Submit / Save button: `<v-btn color="primary" variant="flat" :loading="...">Save</v-btn>`.
- Delete / Remove button: `<v-btn color="error" variant="flat" :loading="...">Remove</v-btn>`.

### Rule 4: Button Variant Rule
- **NEVER use `variant="elevated"` on `<v-btn>`. Strictly use `variant="flat"` for filled action and submit buttons.**

### Rule 5: Removal Confirmation Mandatory
- **Never remove or detach any image immediately upon clicking "Remove".**
- Must prompt a confirmation modal (`v-dialog max-width="440px"`) displaying:
  - Image preview thumbnail.
  - Descriptive confirmation prompt specifying which image and collection will be affected.
  - Confirmation actions: Cancel (`variant="text"`) and Remove (`variant="flat" color="error"`).

---

## 5. Standard Dialog Templates

### A. Edit Image Details (Alt Text & Metadata) Modal
```vue
<v-dialog v-model="editDialog.open" max-width="540px" persistent>
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Edit Image Details</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="editDialog.open = false">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text class="pa-4">
      <div v-if="editDialog.item?.url" class="d-flex align-center ga-3 mb-4 pa-2 bg-slate-50 border rounded">
        <v-img :src="editDialog.item.url" width="70" height="50" cover class="rounded flex-shrink-0" />
        <div class="overflow-hidden">
          <div class="text-body-2 font-weight-medium text-truncate">{{ editDialog.item.filename || 'Image Asset' }}</div>
          <div class="text-caption text-medium-emphasis text-capitalize">{{ editDialog.targetLabel }}</div>
        </div>
      </div>

      <v-form @submit.prevent="handleSaveEdit">
        <v-row dense>
          <v-col cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="editDialog.form.alt_text"
                label="Alt Text (SEO & Accessibility) *"
                placeholder="Descriptive explanation for screen readers and SEO"
                hint="Important for search engine ranking and accessibility"
                persistent-hint
              />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
              <v-text-field
                v-model="editDialog.form.title"
                label="Title (optional)"
                placeholder="e.g. Scenic mountain vista"
              />
            </div>
          </v-col>

          <v-col cols="12">
            <div class="mb-2">
              <v-textarea
                v-model="editDialog.form.caption"
                label="Caption / Description (optional)"
                placeholder="Optional editorial context"
                rows="3"
              />
            </div>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>

    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="editDialog.open = false">Cancel</v-btn>
      <v-btn
        color="primary"
        variant="flat"
        :loading="editDialog.saving"
        @click="handleSaveEdit"
      >
        Save Changes
      </v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>
```

### B. Confirmation Removal Modal
```vue
<v-dialog v-model="deleteDialog.open" max-width="440px">
  <v-card>
    <v-card-title class="d-flex align-center justify-space-between py-0">
      <span>Confirm Removal</span>
      <v-btn icon variant="text" size="small" aria-label="Close dialog" @click="deleteDialog.open = false">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>
    <v-divider />

    <v-card-text class="pt-4 text-center">
      <div v-if="deleteDialog.item?.url" class="mb-3 d-flex justify-center">
        <v-img :src="deleteDialog.item.url" max-width="180" height="110" cover class="border rounded" />
      </div>

      <div class="text-subtitle-1 font-weight-medium">
        Remove {{ deleteDialog.targetLabel }}?
      </div>
      <div class="text-caption text-grey mt-2">
        Are you sure you want to remove this image? This will unlink it from this collection.
      </div>
    </v-card-text>

    <v-card-actions class="justify-end">
      <v-btn variant="text" @click="deleteDialog.open = false">Cancel</v-btn>
      <v-btn
        color="error"
        variant="flat"
        :loading="deleteDialog.loading"
        @click="executeRemove"
      >
        Remove
      </v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>
```
