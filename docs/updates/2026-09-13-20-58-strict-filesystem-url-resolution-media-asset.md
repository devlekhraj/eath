# Strict Filesystem URL Resolution in MediaAsset

## Summary
Simplified `MediaAsset::getUrlAttribute()` in [`packages/admin/src/Models/MediaAsset.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/MediaAsset.php) to be strictly filesystem-driven. Removed the external URL check (`str_starts_with`), so every asset path is resolved directly through Laravel's configured storage disk.

## Detailed Changes
1. **Model URL Simplification (`packages/admin/src/Models/MediaAsset.php`)**:
   - Removed the `str_starts_with('http://')` / `str_starts_with('https://')` conditional check.
   - `getUrlAttribute()` now directly delegates to `Storage::disk($disk)->url($this->path)` (where `$disk = $this->disk ?: 'cdn'`).

## Verification Commands & Outputs
- **PHP Lint Check**:
  ```bash
  php -l packages/admin/src/Models/MediaAsset.php
  # No syntax errors detected
  ```

- **Tinker Output**:
  ```bash
  php artisan tinker --execute="\$a = new \Admin\Models\MediaAsset(['disk' => 'cdn', 'path' => 'media/c3/sample.jpg']); echo \$a->url;"
  # Output: /cdn/media/c3/sample.jpg
  ```

- **Feature Tests**:
  ```bash
  php artisan test --filter=AdminDestinationCrudTest
  # PASS Tests\Feature\AdminDestinationCrudTest (5 passed, 25 assertions)
  ```
