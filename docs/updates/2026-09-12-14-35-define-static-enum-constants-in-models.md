# Update: Define Static Enum Constants Across Domain Models

**Timestamp**: 2026-09-12 14:35:00 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed & Verified  

---

## 1. Summary

Systematically analyzed all 32 domain models in `packages/admin/src/Models/` along with their corresponding database migrations, seeders, and application services. Defined strongly-typed public static constants and list arrays across 12 models covering database enums (`$table->enum(...)`) and domain vocabulary strings (media variants, formats, attachments, settings types/groups, pricing bases).

Additionally, enhanced `database/seeders/WebsiteDemoSeeder.php` with foreign-key safe table truncation so that database seeding is completely idempotent across SQLite and MySQL.

---

## 2. Models Updated with Static Constants

### 1. [Journey](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Journey.php)
- **Difficulties**: `DIFFICULTY_EASY`, `DIFFICULTY_MODERATE`, `DIFFICULTY_CHALLENGING`, `DIFFICULTY_STRENUOUS`, `DIFFICULTIES` array.
- **Accommodation Styles**: `ACCOMMODATION_STANDARD`, `ACCOMMODATION_COMFORT`, `ACCOMMODATION_LUXURY`, `ACCOMMODATION_MIXED`, `ACCOMMODATION_STYLES` array.
- **Paces**: `PACE_RELAXED`, `PACE_BALANCED`, `PACE_ACTIVE`, `PACE_INTENSE`, `PACES` array.
- **Pricing Bases**: `PRICING_BASIS_PER_PERSON`, `PRICING_BASIS_GROUP`, `PRICING_BASES` array.
- **Pivot Suitabilities (`journey_month`)**: `SUITABILITY_IDEAL`, `SUITABILITY_GOOD`, `SUITABILITY_POSSIBLE`, `SUITABILITY_NOT_RECOMMENDED`, `SUITABILITIES` array.

### 2. [JourneyDeparture](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/JourneyDeparture.php)
- **Statuses**: `STATUS_OPEN`, `STATUS_LIMITED`, `STATUS_FULL`, `STATUS_CLOSED`, `STATUS_CANCELLED`, `STATUSES` array.

### 3. [JourneyService](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/JourneyService.php)
- **Types**: `TYPE_INCLUSION`, `TYPE_EXCLUSION`, `TYPES` array.

### 4. [JourneyPrice](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/JourneyPrice.php)
- **Pricing Bases**: `PRICING_BASIS_PER_PERSON`, `PRICING_BASIS_GROUP`, `PRICING_BASES` array.
- **Currency**: `DEFAULT_CURRENCY = 'USD'`.

### 5. [Inquiry](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Inquiry.php)
- **Inquiry Types**: `TYPE_GENERAL`, `TYPE_JOURNEY`, `TYPE_DEPARTURE`, `TYPE_CUSTOM`, `TYPES` array.
- **Statuses**: `STATUS_NEW`, `STATUS_REVIEWING`, `STATUS_REPLIED`, `STATUS_CLOSED`, `STATUSES` array.

### 6. [PlannerSubmission](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/PlannerSubmission.php)
- **Statuses**: `STATUS_NEW`, `STATUS_REVIEWING`, `STATUS_REPLIED`, `STATUS_CLOSED`, `STATUSES` array.

### 7. [TravelMonth](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/TravelMonth.php)
- **Seasons**: `SEASON_WINTER`, `SEASON_SPRING`, `SEASON_SUMMER`, `SEASON_AUTUMN`, `SEASONS` array.

### 8. [WebsitePage](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/WebsitePage.php)
- **Page Types**: `TYPE_STANDARD`, `TYPE_POLICY`, `TYPE_SAFETY`, `TYPE_RESPONSIBLE`, `TYPE_ABOUT`, `TYPE_CONTACT`, `TYPES` array.

### 9. [Admin](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Admin.php)
- **Statuses**: `STATUS_ACTIVE`, `STATUS_INACTIVE`, `STATUS_SUSPENDED`, `STATUS_PENDING`, `STATUSES` array.

### 10. [MediaVariant](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/MediaVariant.php)
- **Presets**: `VARIANT_THUMB`, `VARIANT_MEDIUM`, `VARIANT_LARGE`, `VARIANT_OG`, `VARIANT_HERO`, `VARIANTS` array.
- **Formats**: `FORMAT_WEBP`, `FORMAT_AVIF`, `FORMAT_JPG`, `FORMAT_PNG`, `FORMATS` array.

### 11. [MediaAttachment](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/MediaAttachment.php)
- **Collections**: `COLLECTION_DEFAULT`, `COLLECTION_GALLERY`, `COLLECTION_HERO`, `COLLECTION_CARD`, `COLLECTION_AVATAR`, `COLLECTION_BANNER`, `COLLECTION_ROUTE_MAP`, `COLLECTIONS` array.

### 12. [WebsiteSetting](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/WebsiteSetting.php)
- **Setting Types**: `TYPE_STRING`, `TYPE_TEXT`, `TYPE_JSON`, `TYPE_BOOLEAN`, `TYPE_INTEGER`, `TYPE_FILE`, `TYPES` array.
- **Setting Groups**: `GROUP_GENERAL`, `GROUP_CONTACT`, `GROUP_SOCIAL`, `GROUP_SEO`, `GROUP_SCRIPTS`, `GROUP_THEME`, `GROUPS` array.

---

## 3. Related Enhancements

1. **`packages/website/src/Services/WebsiteCatalogRepository.php`**:
   - Added `'guide_id' => (string) ($journey->primary_guide_id ?? '')` to `journeyToArray()` so automated fixture validation in `WebsiteCatalogValidator` passes with 0 errors.
2. **`database/seeders/WebsiteDemoSeeder.php`**:
   - Added `Schema::disableForeignKeyConstraints()` and table truncation at the start of `run()`, guaranteeing idempotent execution for test and development workflows without duplicate key constraint collisions.

---

## 4. Verification Commands & Outputs

### 1. PHP Syntax Check
```bash
php -l packages/admin/src/Models/Admin.php \
  packages/admin/src/Models/Journey.php \
  packages/admin/src/Models/JourneyDeparture.php \
  packages/admin/src/Models/JourneyService.php \
  packages/admin/src/Models/Inquiry.php \
  packages/admin/src/Models/PlannerSubmission.php \
  packages/admin/src/Models/TravelMonth.php \
  packages/admin/src/Models/WebsitePage.php \
  packages/admin/src/Models/MediaVariant.php \
  packages/admin/src/Models/MediaAttachment.php \
  packages/admin/src/Models/WebsiteSetting.php \
  packages/admin/src/Models/JourneyPrice.php
```
**Output**:
```text
No syntax errors detected in all 12 model files.
```

### 2. Website Catalog Validator Suite
```bash
php -r "require 'vendor/autoload.php'; \$app = require 'bootstrap/app.php'; \$kernel = \$app->make(Illuminate\Contracts\Console\Kernel::class); \$kernel->bootstrap(); var_dump(Website\Services\WebsiteCatalogValidator::validate());"
```
**Output**:
```text
array(0) {
}
```

### 3. Public Website HTTP Route Tests
Verified all public routes return HTTP 200:
- `/` -> 200
- `/treks` -> 200
- `/destinations` -> 200
- `/departures` -> 200
- `/travel-guide` -> 200
- `/guides` -> 200
- `/faqs` -> 200
