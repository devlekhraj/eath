# Admin Panel: Resolve v-phone-input Styles via Vite Alias

## Summary
Resolved Vite import resolution error `Missing "./styles" specifier in "v-phone-input" package` by adding an explicit Vite resolve alias for `v-phone-input/styles` in `vite.config.js` and purging the stale Vite dependency cache in `node_modules/.vite`.

## Detailed Changes

### 1. `vite.config.js`
- Added explicit resolve alias `'v-phone-input/styles': path.resolve(__dirname, 'node_modules/v-phone-input/dist/v-phone-input.css')` to directly map the stylesheet import to the physical CSS file, bypassing any in-memory or stale package export map caching.

### 2. Cache Invalidation
- Removed stale `node_modules/.vite` directory to force Vite to regenerate optimized dependencies matching `v-phone-input@6.0.1`.

## Verification Commands & Outputs

### 1. Vite Production Build Check
```bash
cd packages/admin && npm run build
```
**Output:**
```text
✓ built in 23.76s
Status: 0 errors
```

## Next Steps
- If running `npm run dev`, Vite will pick up the updated configuration and serve the new bundle without the missing specifier error.
