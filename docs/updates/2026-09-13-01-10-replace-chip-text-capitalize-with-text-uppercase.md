# Admin Panel: Replace text-capitalize with text-uppercase on v-chip Elements

## Summary
Replaced `class="text-capitalize"` with `class="text-uppercase"` across all `<v-chip>` elements in the Admin Panel to adhere to the standardized typography standard used across views like `ExperiencePage.vue`, `DestinationPage.vue`, and `TravelMonthPage.vue`. A comprehensive scan confirmed zero remaining occurrences of `text-capitalize` within `<v-chip>` tags across the admin codebase.

## Detailed Changes

### 1. `packages/admin/resources/admin/pages/journeys/JourneyPage.vue`
- Updated active status chip from `class="text-capitalize"` to `class="text-uppercase"`.
- Updated featured status chip from `class="text-capitalize"` to `class="text-uppercase"`.

### 2. `packages/admin/resources/admin/pages/guides/GuidePage.vue`
- Updated language spoken chips from `class="text-capitalize"` to `class="text-uppercase"`.
- Updated guide status chip from `class="text-capitalize"` to `class="text-uppercase"`.

### 3. `packages/admin/resources/admin/pages/guides/GuideDetailPage.vue`
- Updated header guide status chip from `class="text-capitalize mt-2"` to `class="text-uppercase mt-2"`.

### 4. `packages/admin/resources/admin/pages/inquiries/InquiryPage.vue`
- Updated inquiry type chip from `class="text-capitalize"` to `class="text-uppercase"`.
- Updated inquiry status chip from `class="text-capitalize"` to `class="text-uppercase"`.

### 5. `packages/admin/resources/admin/pages/inquiries/modal/InquiryDetailModal.vue`
- Updated inquiry type chip from `class="text-capitalize ml-2"` to `class="text-uppercase ml-2"`.

### 6. `packages/admin/resources/admin/pages/planner-submissions/PlannerSubmissionPage.vue`
- Updated planner submission status chip from `class="text-capitalize"` to `class="text-uppercase"`.

### 7. `packages/admin/resources/admin/pages/articles/ArticlePage.vue`
- Updated article status chip from `class="text-capitalize"` to `class="text-uppercase"`.

### 8. `packages/admin/resources/admin/pages/traveler-stories/TravelerStoryPage.vue`
- Updated traveler story status chip from `class="text-capitalize"` to `class="text-uppercase"`.

### 9. `packages/admin/resources/admin/pages/dashboard/DashboardPage.vue`
- Updated upcoming departure status chip from `class="text-capitalize"` to `class="text-uppercase"`.
- Updated planner request status chip from `class="text-capitalize"` to `class="text-uppercase"`.
- Updated recent inquiry type chip from `class="text-capitalize"` to `class="text-uppercase"`.
- Updated recent inquiry status chip from `class="text-capitalize"` to `class="text-uppercase"`.

## Verification Commands & Outputs

### 1. Python AST/Regex Scan for `<v-chip>` containing `text-capitalize`
```bash
python3 -c "
import os, re
admin_dir = '/Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin'
chip_pattern = re.compile(r'<v-chip\b[^>]*>', re.DOTALL)
remaining = []
for root, dirs, files in os.walk(admin_dir):
    for f in files:
        if f.endswith('.vue'):
            path = os.path.join(root, f)
            with open(path, 'r', encoding='utf-8') as file:
                content = file.read()
            chips = chip_pattern.findall(content)
            for c in chips:
                if 'text-capitalize' in c:
                    remaining.append((path, c))
print(f'Total remaining <v-chip> with text-capitalize: {len(remaining)}')
"
```
**Output:**
```text
Total remaining <v-chip> with text-capitalize: 0
```

### 2. Vite Production Build
```bash
cd packages/admin && npm run build
```
**Output:**
```text
✓ built in 19.00s
Status: 0 errors
```

## Next Steps
- Maintain `class="text-uppercase"` consistency on all status, badge, and taxonomy chips created in the future.
