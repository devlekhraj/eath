# Annotate FilesystemAdapter in MediaAsset to Fix Intelephense Warning

## Summary
Added a PHPDoc `@var \Illuminate\Filesystem\FilesystemAdapter $storage` annotation to `MediaAsset::getUrlAttribute()` in [`packages/admin/src/Models/MediaAsset.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/MediaAsset.php). This informs Intelephense and static analysis tools that the instance returned by `Storage::disk()` implements `url()`, resolving the `intelephense(P1013)` warning.

## Detailed Changes
- In [`packages/admin/src/Models/MediaAsset.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/MediaAsset.php):
  ```php
  /** @var \Illuminate\Filesystem\FilesystemAdapter $storage */
  $storage = Storage::disk($disk);

  return $storage->url($this->path);
  ```

## Verification Commands & Outputs
- **PHP Lint Check**:
  ```bash
  php -l packages/admin/src/Models/MediaAsset.php
  # No syntax errors detected
  ```
