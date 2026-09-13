# Media Management Standard Rule Specification

**Timestamp:** 2026-09-13 22:35 (Nepal Time / NPT / UTC+05:45)

## Summary
- Established formal instructions and architectural standards for media attachments and UI operations in [`docs/media-management.md`](file:///Volumes/TOSHIBA/Herd/eath/docs/media-management.md) and [`.agents/rules/media-management.md`](file:///Volumes/TOSHIBA/Herd/eath/.agents/rules/media-management.md).
- Documents the end-to-end media lifecycle established during the Destination CRUD rebuild before applying it to Journeys and other models.

## Detailed Changes

### Documentation & Rule Creation
- **[`docs/media-management.md`](file:///Volumes/TOSHIBA/Herd/eath/docs/media-management.md)** and **[`.agents/rules/media-management.md`](file:///Volumes/TOSHIBA/Herd/eath/.agents/rules/media-management.md)**:
  1. **Architectural Principles**: Decoupled asset storage in `media_assets`, polymorphic linking via `media_attachments`, and Eloquent integration through `HasMediaAttachments` trait (`syncMediaAttachment`, `attachMedia`, `detachMediaCollection`).
  2. **Backend API Standards**: RESTful contracts for `POST /media-attachments`, `PATCH /media-attachments/{id}` (updating alt text/title/caption), `DELETE /media-attachments/{id}`, and payload synchronization on primary models.
  3. **UI Implementation Standards**: Card layout architecture for Hero Banner, Card Thumbnail, and responsive Gallery grids.
  4. **Modal & Dialog Standards**:
     - Strict modal header with `py-0`.
     - Wrapping each input inside `<div class="mb-2">`.
     - Actions right-aligned (`justify-end`) with no `<v-spacer />`.
     - Strict enforcement of `variant="flat"` for filled `<v-btn>` action/submit buttons (never `elevated`).
     - Mandatory confirmation modals before removing or unlinking any image.
  5. **Reusable Component Templates**: Copy-pasteable Vue dialog templates for the Edit Image Details Modal and Confirmation Removal Modal.

## Verification Commands & Outputs
- Validated rule file existence and syntax.
- Documentation reviewed against `admin-style.md` and `AGENTS.md`.

## Next Steps
- Apply this standardized pattern to the Journey media workflow (e.g. `JourneyMediaForm.vue` / `TabMedia.vue`, `JourneyController`, `JourneyResource`).
