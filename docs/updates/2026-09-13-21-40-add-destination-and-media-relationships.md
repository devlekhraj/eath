# 2026-09-13-21-40 - Add Destination and Media Relationships

## Summary
Added explicit domain relationships (`travelerStories`, `faqs`) to the `Destination` model and direct polymorphic many-to-many relationships (`mediaAssets`, `galleryAssets`) to the `HasMediaAttachments` trait. Verified runtime resolution of all relationships against the seeded database and ran automated tests.

## Detailed Changes
- **Trait `Admin\Models\Concerns\HasMediaAttachments`**:
  - Added `mediaAssets()`: `morphToMany(MediaAsset::class, 'attachable', 'media_attachments')` with pivot fields (`id`, `collection`, `title`, `alt_text`, `caption`, `custom_attributes`, `sort_order`) and timestamps.
  - Added `galleryAssets()`: `morphToMany(MediaAsset::class, 'attachable', 'media_attachments')` filtered by `collection = 'gallery'`.
- **Model `Admin\Models\Destination`**:
  - Added `travelerStories()`: `hasMany(TravelerStory::class)`.
  - Added `faqs()`: `hasMany(Faq::class)`.
  - Maintained existing `journeys()`: `hasMany(Journey::class)->orderBy('sort_order')`.

## Verification Commands & Outputs
- Tested runtime relation resolution on seeded database:
  - Output:
    ```
    Testing relations on Destination: Everest
    - journeys: 2
    - travelerStories: 0
    - faqs: 0
    - mediaAttachments: 0
    - mediaAssets: 0
    - galleryAssets: 0
    All relations resolved successfully!
    ```
- `php artisan test --filter=AdminDestinationCrudTest`
  - Output: `PASS Tests\Feature\AdminDestinationCrudTest (7 passed, 35 assertions, 0.77s)`

## Next Steps
- Implement the next phase of admin panel CRUD synchronization (e.g., Journeys/Trips child tables: highlights, itinerary days, prices, inclusions/exclusions, departures).
