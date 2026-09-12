# Update: Standardize Journey And Planner Column Names

**Timestamp**: 2026-09-12 14:40:46 NPT (UTC+05:45)  
**Author**: Codex  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- Standardized fresh website schema naming to follow Laravel conventions.
- Replaced prefixed database names such as `primary_guide_id`, `selected_journey_id`, and `selected_departure_id`.
- Kept the schema fresh-database oriented with meaningful create migrations only.

---

## 2. Detailed Technical Changes

### A. Files Created
- `docs/updates/2026-09-12-14-40-standardize-journey-planner-column-names.md`: Chronological update log for this task.

### B. Files Modified
- `database/migrations/2025_07_18_165611_create_journeys_table.php`: Renamed `primary_guide_id` to `guide_id` and made it a standard nullable foreign key to `guides`.
- `database/migrations/2026_04_05_120000_create_planner_submissions_table.php`: Renamed `selected_journey_id` to `journey_id` and `selected_departure_id` to `departure_id`; `departure_id` now references `journey_departures`.
- `packages/admin/src/Models/Journey.php`: Updated fillable field and relationship from `primaryGuide()` to standard `guide()`.
- `packages/admin/src/Models/PlannerSubmission.php`: Updated fillable fields to `journey_id` and `departure_id`; added standard relationships for journey, departure, destination, experience, and travel month.
- `database/seeders/WebsiteDemoSeeder.php`: Updated journey seed data to write `guide_id`.
- `packages/website/src/Services/WebsiteCatalogRepository.php`: Updated DB-to-array mapping to read `guide_id`.
- `packages/website/src/Services/WebsitePlannerDraftService.php`: Renamed planner draft state from `selected_departure_id` to `departure_id`.
- `packages/website/routes/route_website.php`: Updated planner route glue to use `departure_id` draft state.
- `docs/WEBSITE_DATABASE_REDESIGN_HANDOFF.md`: Updated handoff wording to use `departure_id`.

### C. Files Deleted / Renamed
- `database/migrations/2025_07_30_054913_create_guides_table.php` -> `database/migrations/2025_07_18_165609_create_guides_table.php`: Moved guide creation before journeys so `journeys.guide_id` can be a normal foreign key.

### D. Database & Schema Changes
- `journeys.guide_id`: Standard nullable guide foreign key.
- `planner_submissions.journey_id`: Standard nullable journey foreign key.
- `planner_submissions.departure_id`: Standard nullable journey departure foreign key.
- Confirmed no no-op migration files remain in `database/migrations`.

---

## 3. Verification & Testing

```bash
rg "primary_guide_id|primaryGuide|selected_journey_id|selected_departure_id" database packages docs/WEBSITE_DATABASE_REDESIGN_HANDOFF.md -n
```

- **Test Results**: No matches in active database/code handoff scope.

```bash
rg "No-op|Fresh schema|already includes|already creates|No-op for fresh schema" database/migrations -n
```

- **Test Results**: No no-op migration content found.

```bash
for f in database/migrations/*.php database/seeders/*.php packages/admin/src/Models/*.php packages/website/src/Services/WebsiteCatalogRepository.php packages/website/src/Services/WebsitePlannerDraftService.php; do php -l "$f" >/dev/null || exit 1; done
```

- **Test Results**: PHP syntax passed.

```bash
DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan migrate --seed --force
```

- **Test Results**: Fresh migration and seed passed.

```bash
DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_standard_names.sqlite php artisan migrate:fresh --seed --force
```

- **Test Results**: Fresh temporary database rebuild and seed passed.

```bash
DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_standard_names.sqlite php -r 'require "vendor/autoload.php"; $app = require "bootstrap/app.php"; $kernel = $app->make("Illuminate\\Contracts\\Http\\Kernel"); $requestClass = "Illuminate\\Http\\Request"; foreach (["/", "/treks", "/treks/everest-base-camp", "/departures", "/guides", "/faqs"] as $path) { $request = $requestClass::create($path, "GET"); $response = $kernel->handle($request); echo $path.":".$response->getStatusCode().PHP_EOL; $kernel->terminate($request, $response); }'
```

- **Test Results**:
  - `/`: 200
  - `/treks`: 200
  - `/treks/everest-base-camp`: 200
  - `/departures`: 200
  - `/guides`: 200
  - `/faqs`: 200

---

## 4. Next Steps & Handoff Notes
- Continue refactoring old website/admin code that still references legacy models such as `TravelPackage`, `TrekDeparture`, `Blog`, or `Gallery`.
- Keep public `/treks` URLs stable while using the internal `Journey` domain.
- If planner submissions are wired to persistence next, use `planner_submissions.journey_id` and `planner_submissions.departure_id`.
