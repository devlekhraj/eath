# Remove Hardcoded CDN URL from MediaAsset

## Summary
Refactored `MediaAsset::getUrlAttribute()` in [`packages/admin/src/Models/MediaAsset.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/MediaAsset.php) to remove the manual hardcoded `'/cdn/'` string. The model now relies entirely on Laravel's standard `Storage::disk($disk)->url($this->path)`, dynamically resolving whatever `url` is configured in `config/filesystems.php` and `.env` (`CDN_URL`).

## Detailed Changes
1. **Model URL Resolution (`packages/admin/src/Models/MediaAsset.php`)**:
   - Removed the manual `'/cdn/' . ltrim($this->path, '/')` fallback.
   - Replaced with standard `Storage::disk($disk)->url($this->path)` (where `$disk = $this->disk ?: 'cdn'`).
   - If `CDN_URL` changes in `.env` (e.g., to a cloud CDN domain or `/cdn`), the model reflects it automatically without code changes.

## Verification Commands & Outputs
- **Tinker Output Verification**:
  ```bash
  php artisan tinker --execute="\$a = new \Admin\Models\MediaAsset(['disk' => 'cdn', 'path' => 'media/c3/sample.jpg']); echo \$a->url;"
  # Output: /cdn/media/c3/sample.jpg
  ```

- **Feature Test Suite**:
  ```bash
  php artisan test --filter=AdminDestinationCrudTest
  # PASS Tests\Feature\AdminDestinationCrudTest (5 passed, 25 assertions)
  ```
