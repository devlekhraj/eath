# Consolidated Extra Migrations into Main Create-Table Files

**Date:** 2026-09-14 15:05 NPT

## Summary

Merged 4 separate `alter table` migrations into their corresponding main `create table` migration files and deleted the redundant files. This keeps the schema definition in one place per table.

## Detailed Changes

### Merged & Deleted

| Extra Migration (deleted) | Merged Into |
|---|---|
| `2026_09_14_110000_add_cta_and_notice_to_destinations_table.php` | `2025_07_18_165610_create_destinations_table.php` |
| `2026_09_14_114000_add_detail_content_fields_to_journeys_table.php` | `2025_07_18_165611_create_journeys_table.php` |
| `2026_09_14_122000_add_detail_content_fields_to_experiences_table.php` | `2025_07_18_165731_create_experiences_table.php` |
| `2026_09_14_124000_add_detail_fields_to_website_pages_table.php` | `2025_08_07_174726_create_website_pages_table.php` |

### Columns Added to Each Main Migration

- **destinations**: `operational_notice`, `cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, `cta_secondary_btn_url`
- **journeys**: `preparation_note`, `packing_note`, `operational_notice`, `cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, `cta_secondary_btn_url`
- **experiences**: `emphasis`, `cues`, `cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, `cta_secondary_btn_url`
- **website_pages**: `notice_title`, `notice_body`, `cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, `cta_secondary_btn_url`

## Verification Commands & Outputs

```bash
php artisan migrate:fresh --seed
```

All 47 migrations ran successfully. All 3 seeders completed without errors.

## Next Steps

- None.
