# Admin Panel: Remove Local Table Density Overrides

## Summary
Removed all local `density` overrides from `<v-table>`, `<v-data-table>`, and `<v-data-table-server>` components across the admin panel, enforcing consistent reliance on the global table defaults (`density: 'comfortable'`, `hover: true`) configured in `packages/admin/resources/admin/plugins/vuetify.ts`.

## Detailed Changes

### 1. `packages/admin/resources/admin/pages/dashboard/DashboardPage.vue`
- Removed `density="compact"` from the Upcoming Departures `<v-table>`.
- Removed `density="compact"` from the Recent Planner Requests `<v-table>`.
- Removed `density="compact"` from the Recent Inquiries `<v-table>`.

### 2. `packages/admin/resources/admin/pages/journeys/form_section/JourneyPricingForm.vue`
- Removed `density="compact"` from the Journey Prices list `<v-table class="mt-2">`.

### 3. `packages/admin/resources/admin/pages/journeys/form_section/JourneyFixedDepartureForm.vue`
- Removed redundant `density="comfortable"` from the Expanded Booking Travelers `<v-table class="bg-transparent">`.

## Verification Commands & Outputs

### 1. Python AST/Regex Scan for Table Density Overrides
```bash
python3 -c "
import os, re
admin_dir = '/Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin'
remaining = []
for root, dirs, files in os.walk(admin_dir):
    for f in files:
        if f.endswith('.vue'):
            path = os.path.join(root, f)
            with open(path, 'r', encoding='utf-8') as file:
                content = file.read()
            for m in re.finditer(r'<(v-table|v-data-table|v-data-table-server|table)\b([^>]*)>', content, re.DOTALL):
                attrs = m.group(2)
                if 'density' in attrs:
                    remaining.append((os.path.relpath(path, admin_dir), m.group(1), m.group(0).replace('\n', ' ')))
print(f'Total table elements with density: {len(remaining)}')
"
```
**Output:**
```text
Total table elements with density: 0
```

### 2. Vite Production Build Check
```bash
cd packages/admin && npm run build
```
**Output:**
```text
✓ built in 19.57s
Status: 0 errors
```

## Next Steps
- Never add local `density` attributes to any table elements (`<v-table>`, `<v-data-table>`, `<v-data-table-server>`); always allow the global `vuetify.ts` defaults to control density.
