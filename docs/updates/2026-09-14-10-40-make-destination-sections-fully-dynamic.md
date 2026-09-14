# Make All Sections on Destination Detail Page Dynamic with Zero Breakage

**Timestamp:** 2026-09-14 10:40 (Nepal Time / NPT / UTC+05:45)

## Summary
- Upgraded the public destination detail page (`/destinations/{slug}`) and admin destination manager (`/admin/destinations/:id`) so that every section is fully dynamic and editable in the Admin Panel without breaking existing pages.
- Connected Hero Banner image resolution so that images attached via Admin `TabMedia.vue` take immediate effect on the public destination page, while falling back gracefully to the audited static registry manifest when unassigned.
- Connected Regional FAQs to the database via a dedicated new `TabFaqs.vue` tab in Destination Admin (`DestinationDetailPage.vue`), allowing destination-specific FAQs to be added, edited, reordered, and deleted. Automatically falls back to the 4 default regional FAQs when no custom FAQs exist.
- Made the Logistics Operational Notice and the Bottom Call-To-Action (CTA) banner completely dynamic by adding nullable columns to the `destinations` table, exposing them in `DestinationResource`, adding input controls in `TabLogistics.vue` and `TabOverview.vue`, and preserving existing defaults whenever fields are left blank.

## Detailed Changes

### Database & Models
- **[`database/migrations/2026_09_14_110000_add_cta_and_notice_to_destinations_table.php`](file:///Volumes/TOSHIBA/Herd/eath/database/migrations/2026_09_14_110000_add_cta_and_notice_to_destinations_table.php)**:
  - Added nullable columns `operational_notice`, `cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, and `cta_secondary_btn_url` to `destinations`.
- **[`packages/admin/src/Models/Destination.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Destination.php)**:
  - Added new attributes to `$fillable`.

### Backend API & Resources
- **[`app/Http/Resources/DestinationResource.php`](file:///Volumes/TOSHIBA/Herd/eath/app/Http/Resources/DestinationResource.php)**:
  - Exposed `operational_notice`, `cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, and `cta_secondary_btn_url`.
- **[`packages/admin/src/Http/Controllers/Destination/DestinationController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/Destination/DestinationController.php)**:
  - Added validation and persistence for the new fields in `storeDestination` and `updateDestination`.

### Website Frontend & Catalog Repository
- **[`packages/website/src/Services/WebsiteCatalogRepository.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/website/src/Services/WebsiteCatalogRepository.php)**:
  - Eager loaded `heroAttachment.mediaAsset` in `getRegions()`.
  - Dynamically resolved the hero image from `heroAttachment` if present, otherwise falling back to `WebsiteAssetRegistry`.
  - Mapped `operational_notice` and all CTA attributes to the region array.
- **[`packages/website/src/Http/Controllers/DestinationController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/website/src/Http/Controllers/DestinationController.php)**:
  - In `show()`, dynamically queried `Faq` where `destination_id = $region['db_id']` and `is_active = true`.
  - Mapped database FAQs when present; fell back to the 4 default regional questions when empty.
- **[`packages/website/resources/views/website_preview/pages/destinations/show.blade.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/website/resources/views/website_preview/pages/destinations/show.blade.php)**:
  - Rendered `$region['operational_notice']` with fallback to default advisory notice.
  - Rendered `$region['cta_title']`, `$region['cta_description']`, `$region['cta_primary_btn_text']`, `$region['cta_primary_btn_url']`, `$region['cta_secondary_btn_text']`, and `$region['cta_secondary_btn_url']` with current default fallbacks.

### Admin Panel UI
- **[`packages/admin/resources/admin/pages/destinations/detail_tabs/TabFaqs.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/detail_tabs/TabFaqs.vue)**:
  - Created a dedicated FAQ management tab adhering to Vuetify standards:
    - Lists FAQs filtered by `destination_id`.
    - Create / Edit modal dialog with question, answer, category, sort order, and active toggle.
    - Active status quick-toggle chip.
    - Delete confirmation dialog.
- **[`packages/admin/resources/admin/pages/destinations/DestinationDetailPage.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/DestinationDetailPage.vue)**:
  - Registered `TabFaqs` (`tab_faqs`) in the tabs navigation bar.
- **[`packages/admin/resources/admin/pages/destinations/detail_tabs/TabLogistics.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/detail_tabs/TabLogistics.vue)**:
  - Added `Operational Notice / Advisory Banner` textarea with placeholder and persistence.
- **[`packages/admin/resources/admin/pages/destinations/detail_tabs/TabOverview.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/detail_tabs/TabOverview.vue)**:
  - Added `Bottom Call-To-Action (CTA) Banner` customization card with title, description, and button links/labels.

### Tests
- **[`tests/Feature/AdminDestinationCrudTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminDestinationCrudTest.php)**:
  - Added automated test `test_can_update_destination_cta_and_operational_notice`.

## Verification Commands & Outputs

```bash
php artisan migrate
```
Output:
```text
   INFO  Running migrations.  

  2026_09_14_110000_add_cta_and_notice_to_destinations_table .... 67.63ms DONE
```

```bash
npm run build
```
Output:
```text
vite v6.3.5 building for production...
public/build/assets/DestinationDetailPage-B834JY7e.js                51.69 kB │ gzip:  13.31 kB
✓ built in 20.32s
```

```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```text
   PASS  Tests\Feature\AdminDestinationCrudTest
  ✓ can list destinations                                                0.75s  
  ✓ can create destination with full logistics and seo                   0.02s  
  ✓ can update destination and associate images                          0.03s  
  ✓ can show destination with eager loaded images                        0.02s  
  ✓ can delete destination                                               0.02s  
  ✓ destination update creates polymorphic media attachments             0.02s  
  ✓ can attach and detach gallery media to destination                   0.02s  
  ✓ cannot attach duplicate media to gallery                             0.02s  
  ✓ can update media attachment alt text and meta                        0.02s  
  ✓ can update destination cta and operational notice                    0.02s  

  Tests:    10 passed (56 assertions)
  Duration: 0.95s
```

## Next Steps
- Admin users can now go to `/admin/destinations/:id` to manage regional FAQs in the new **Regional FAQs** tab, configure custom CTA banners in **Overview & Content**, and customize operational notices in **Logistics & Guide**.
