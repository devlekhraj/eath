# Admin Panel: Remove py-0 from All v-col Elements

## Summary
Completely removed `class="py-0"` from all `<v-col>` elements across the Admin Panel. Standard Vuetify column vertical padding is preserved naturally, and spacing between fields is consistently maintained using `<div class="mb-2">` wrappers around input components.

## Detailed Changes

### 1. `packages/admin/resources/admin/pages/destinations/detail_tabs/TabOverview.vue`
- Removed `class="py-0"` from Name field `<v-col cols="12" md="12">`.
- Removed `class="py-0"` from Slug field `<v-col cols="12" md="12">`.
- Removed `class="py-0"` from Best Season field `<v-col cols="12" md="12">`.
- Removed `class="py-0"` from Highlights textarea field `<v-col cols="12" md="12">`.

### 2. `packages/admin/resources/admin/pages/destinations/detail_tabs/TabSeo.vue`
- Removed `class="py-0"` from Meta Title field `<v-col cols="12" md="12">`.
- Removed `class="py-0"` from Meta Keywords field `<v-col cols="12" md="12">`.
- Removed `class="py-0"` from Meta Description field `<v-col cols="12" md="12">`.
- Removed `class="py-0"` from Canonical URL field `<v-col cols="12" md="12">`.

## Verification Commands & Outputs

### 1. Python AST/Regex Scan for `<v-col>` with `py-0`
```bash
python3 -c "
import os, re
admin_dir = '/Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin'
col_pattern = re.compile(r'<v-col\b[^>]*>', re.DOTALL)
remaining = []
for root, dirs, files in os.walk(admin_dir):
    for f in files:
        if f.endswith('.vue'):
            path = os.path.join(root, f)
            with open(path, 'r', encoding='utf-8') as file:
                content = file.read()
            for col in col_pattern.findall(content):
                if 'py-0' in col:
                    remaining.append((os.path.relpath(path, admin_dir), col.replace('\n', ' ')))
print(f'Total remaining <v-col> elements with py-0: {len(remaining)}')
"
```
**Output:**
```text
Total remaining <v-col> elements with py-0: 0
```

### 2. Vite Production Build Check
```bash
cd packages/admin && npm run build
```
**Output:**
```text
✓ built in 17.91s
Status: 0 errors
```

## Next Steps
- Maintain natural Vuetify `<v-col>` padding without adding manual `py-0` classes in any future components.
