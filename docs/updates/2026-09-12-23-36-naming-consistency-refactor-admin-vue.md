# Naming Consistency Refactor — Admin Vue Files

**Date**: 2026-09-12 23:36 NPT (UTC+05:45)
**Type**: Refactor
**Modules**: Journeys, Articles, Website Sections

---

## Summary

Renamed all legacy internal variable/method/component names across three admin modules to match their
current public-facing module names. No file filenames, API endpoints, or backend routes were changed.

---

## Detailed Changes

### Module A — `pages/journeys/` (20 files)

| Old Name | New Name |
|---|---|
| `addPackage` | `addJourney` |
| `fetchPackages` / `fetchPackage` | `fetchJourneys` / `fetchJourney` |
| `travelPackages` | `journeys` |
| `travelPackage` (prop & variable) | `journey` |
| `travelPackageId` (prop) | `journeyId` |
| `packageId` | `journeyId` |
| `packageData` | `journey` |
| `submitPackage` | `submitJourney` |
| `deleteItem` | `deleteJourney` |
| `packageTitle / packageUrl / packageImageUrl` | `journeyTitle / journeyUrl / journeyImageUrl` |
| `import PackageDelete/Add/PriceDelete/PriceForm/HighlightForm` (aliases) | `import JourneyDelete/Add/...` |

### Module B — `pages/articles/` (10 files)

| Old Name | New Name |
|---|---|
| `addBlog` | `addArticle` |
| `fetchBlogs` | `fetchArticles` |
| `blogList` | `articles` |
| `deleteBlog` | `deleteArticle` |
| `blogId` (prop) | `articleId` |
| `blog_id` | `articleId` |
| `blogCategories` | `articleCategories` |

### Module C — `pages/website-sections/` (3 files)

| Old Name | New Name |
|---|---|
| `bannerId` | `sectionId` |

---

## Verification Commands & Outputs

```bash
cd packages/admin && npm run build
# ✓ built in 18.73s (exit code 0, no errors or warnings)
```

Post-fix sanity scan of all 3 modules: `✓ All clear — no legacy naming found!`

---

## Out of Scope (Intentionally Unchanged)

- `pages/destinations/` modal files — "package" semantically correct there
- `pages/guides/tabs/modal/TripForm.vue` — `travelPackages` is a dropdown source list
- API endpoints / backend routes — frontend-only refactor
- Modal filenames (`PackageAdd.vue`, etc.) — import aliases updated instead

