# CDN Filesystem Configuration for Media Storage & Retrieval

## Summary
Configured the `'cdn'` disk in `config/filesystems.php` as the primary storage and retrieval layer for media assets. Updated `MediaAssetController` to store uploaded files directly into the `'cdn'` disk (`public/cdn/media/...`), and updated `MediaAsset::getUrlAttribute()` to resolve image URLs via `Storage::disk('cdn')->url()`, ensuring fast, static HTTP/2 serving with root-relative `/cdn/` paths.

## Detailed Changes
1. **Filesystem Configuration Defaults (`config/filesystems.php`)**:
   - Added robust defaults to the `'cdn'` disk:
     - `'root' => env('CDN_ROOT', public_path('cdn'))`
     - `'url' => env('CDN_URL', '/cdn')`

2. **Environment Synchronization (`.env`)**:
   - Set `CDN_ROOT=/Volumes/TOSHIBA/Herd/eath/public/cdn`.
   - Set `CDN_URL=/cdn` to ensure root-relative static asset resolution without cross-domain or port mismatch issues.

3. **Controller Upload Disk (`packages/admin/src/Http/Controllers/Media/MediaAssetController.php`)**:
   - Updated the upload logic to use `$disk = 'cdn';`, saving files directly into `public/cdn/media/{hash-prefix}/{filename}`.
   - Preserved `'disk' => 'cdn'` on newly created `MediaAsset` records.

4. **Model URL Resolution (`packages/admin/src/Models/MediaAsset.php`)**:
   - Updated `getUrlAttribute()` to dynamically query `Storage::disk($this->disk ?: 'cdn')->url($this->path)`, with a reliable fallback to `/cdn/...`.

## Verification Commands & Outputs
- **Tinker CDN URL Test**:
  ```bash
  php artisan tinker --execute="echo Storage::disk('cdn')->url('media/test.jpg');"
  # Output: /cdn/media/test.jpg
  ```

- **Nginx Static File Response**:
  ```bash
  curl -I -k -s https://eath.test/cdn/images/64f3058204/master.jpg
  # HTTP/2 200 (content-type: image/jpeg)
  ```

- **PHP Feature Tests**:
  ```bash
  php artisan test --filter=AdminDestinationCrudTest
  # PASS Tests\Feature\AdminDestinationCrudTest (5 passed, 25 assertions)
  ```
