# Laravel Web Performance Master Guideline (Mobile & Desktop)
**A Universal Architectural Blueprint for Achieving 95–100 Core Web Vitals & Lighthouse Scores on Any Laravel Application**

---

## 1. Executive Summary & Core Web Vitals Target Standards

Modern web performance is governed by Google's Core Web Vitals and Lighthouse v10/v11 scoring algorithms. Any Laravel project—regardless of size or UI stack—can consistently achieve **95–100 on Desktop** and **90–100 on Mobile (simulated 4G throttled)** by following this master guideline.

### 1.1. Core Web Vitals Target Thresholds

| Metric | Target (Desktop) | Target (Mobile 4G Throttled) | Lighthouse Weight | Impact on User Experience |
| :--- | :--- | :--- | :--- | :--- |
| **First Contentful Paint (FCP)** | `< 0.8 s` | `< 1.8 s` | **10%** | Marks when the browser paints the first text, image, or non-white canvas. |
| **Speed Index (SI)** | `< 1.2 s` | `< 3.0 s` | **10%** | How quickly contents of a page are visually populated across the viewport. |
| **Largest Contentful Paint (LCP)** | `< 1.2 s` | `< 2.5 s` *(Target: < 1.5s)* | **25%** | Render time of the largest content block in the initial viewport (hero banner). |
| **Total Blocking Time (TBT)** | `< 50 ms` | `< 200 ms` *(Target: 0 ms)* | **30%** | Total time main thread is blocked between FCP and Time to Interactive. |
| **Cumulative Layout Shift (CLS)** | `0.000` | `< 0.100` *(Target: 0.000)* | **25%** | Measures visual stability and unexpected movement of elements during load. |

> [!IMPORTANT]
> **The 80% Rule of Lighthouse:**
> **LCP (25%) + TBT (30%) + CLS (25%) = 80%** of your entire Lighthouse performance score. A single unoptimized hero image or an unreserved image aspect ratio will drag an otherwise well-built Laravel app from a 98 down into the 50s.

---

## 2. Environment & Asset Pipeline Protocols (Vite + Laravel)

### 2.1. The `public/hot` Dev Server Trap
During development, running `npm run dev` creates a file named `public/hot` containing the local dev server URL (e.g. `http://localhost:5173`).
When `public/hot` exists, Laravel's `@vite()` Blade directive automatically bypasses compiled production assets in `public/build` and injects:
1. `@vite/client` (~178 KB unminified HMR WebSocket client).
2. Raw, unbundled SCSS/CSS compiled on the fly.
3. Unminified ES modules over separate HTTP connections with cross-origin CORS overhead.

**If you run Lighthouse while `public/hot` exists, the audit simulates 4G throttling over 300+ KB of unminified development code, giving a false performance score of 50–65.**

### 2.2. Standard Production Build & Audit Protocol
Always run this terminal sequence before auditing or deploying:

```bash
# 1. Remove Vite dev-server hot-reload marker
rm -f public/hot

# 2. Build minified, fingerprinted production assets
npm run build

# 3. Clear Laravel view, route, and config caches
php artisan optimize:clear

# 4. (Optional in production) Pre-cache compiled views & config
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 3. Critical CSS Architecture & Stylesheet Splitting

### 3.1. The Monolithic Stylesheet Anti-Pattern
Never bundle full third-party icon libraries (e.g. `@fortawesome/fontawesome-free/css/all.min.css`, full icon suites, heavy charting CSS) into your primary global stylesheet.
- **Problem**: Global `app.css` or `theme.scss` balloons to 150–250 KB. Because CSS is render-blocking, the browser refuses to render **any** text or layout until this entire file is downloaded and parsed. On throttled mobile (1.6 Mbps), this delays FCP by 3–5 seconds.
- **Solution**: Keep the global stylesheet strictly focused on base design tokens, reset, typography, cards, and shared layout components. Split heavy or page-specific libraries into scoped stylesheets.

### 3.2. Universal Page-Scoped Stylesheet Pattern in Laravel
1. **Define separate SCSS/CSS entries** in your project (e.g. `resources/css/icons.scss` or `resources/css/pages/checkout.scss`).
2. **Register the entry points in `vite.config.js`**:
   ```javascript
   export default defineConfig({
       plugins: [
           laravel({
               input: [
                   'resources/scss/app.scss',         // Global styles only (< 15 KB gzipped)
                   'resources/scss/icons.scss',       // Heavy icon library
                   'resources/js/app.js'
               ],
               refresh: true,
           }),
       ],
   });
   ```
3. **In your master layout (`resources/views/layouts/app.blade.php`)**:
   ```blade
   <head>
       <!-- Global Stylesheet -->
       @vite(['resources/scss/app.scss', 'resources/js/app.js'])

       <!-- Page-Specific Styles Stack -->
       @stack('head')
   </head>
   ```
4. **In the specific Blade template that requires the library**:
   ```blade
   @push('head')
       @vite(['resources/scss/icons.scss'])
   @endpush
   ```

### 3.3. Target CSS Budget
- **Uncompressed global CSS**: `< 110 KB`
- **Gzipped / Brotli transfer size**: `< 15 KB`

---

## 4. Web Font Strategy & FOUT/FOIT Elimination (FCP & CLS)

Web fonts can block rendering (FOIT) or cause massive layout shifts when text swaps (FOUT). Follow this 3-step font loading architecture:

### 4.1. Preconnect to Font Origins
Establish DNS and TLS handshakes early in `<head>`:
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
```

### 4.2. Request Only Used Weights & Glyphs
Never request full italic variants or all weights if they are not actively styled in CSS.
- **Bad**: `family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900` (Downloads 10+ font files = ~250 KB).
- **Good**: `family=Inter:wght@400;500;600;700&display=swap` (Downloads only the 4 weights used = ~45 KB).

### 4.3. Non-Render-Blocking Font Loading Pattern
Load web fonts asynchronously so First Contentful Paint is never delayed waiting for font stylesheets:
```html
<!-- Preload the font stylesheet -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap">

<!-- Apply asynchronously via print media swap -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" media="print" onload="this.media='all'">

<!-- Fallback for JavaScript-disabled clients -->
<noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap">
</noscript>
```

---

## 5. Hero Media Pipeline & Dual-Resolution Delivery (LCP Optimization)

On mobile, the hero image is virtually always the **Largest Contentful Paint (LCP)** element. An uncompressed 1–2 MB hero image over a 1.6 Mbps mobile connection guarantees an LCP of **8–12 seconds** (Score: 0/100).

### 5.1. The Dual-Resolution WebP Standard
For any prominent hero or above-the-fold banner, generate two distinct optimized WebP files:

| Variant | Viewport Query | Recommended Dimensions | Target File Size |
| :--- | :--- | :--- | :--- |
| **Desktop Hero** | `(min-width: 641px)` | `1600 × 900` or `1600 × 1000` | `< 140 KB` |
| **Mobile Hero** | `(max-width: 640px)` | `640 × 427` or `640 × 360` | `< 30 KB` (Current: **27.4 KB**) |

### 5.2. Preload High-Priority Hero Media in `<head>`
Instruct the browser's preload scanner to start downloading the hero image immediately in the initial HTML payload:

In the child page template (e.g. `home.blade.php`):
```blade
@push('head')
    <!-- Mobile Hero Preload (<= 640px) -->
    <link rel="preload" as="image" href="{{ asset('images/hero-mobile.webp') }}" media="(max-width: 640px)" type="image/webp" fetchpriority="high">

    <!-- Desktop Hero Preload (> 640px) -->
    <link rel="preload" as="image" href="{{ asset('images/hero.webp') }}" media="(min-width: 641px)" type="image/webp" fetchpriority="high">
@endpush
```

### 5.3. Universal Responsive `<picture>` Hero Markup
In your hero Blade component (`resources/views/components/hero.blade.php`):
```blade
@props([
    'desktopUrl' => asset('images/hero.webp'),
    'mobileUrl' => asset('images/hero-mobile.webp'),
    'alt' => 'Hero Banner Image',
    'width' => 1600,
    'height' => 900,
])

<div class="hero-media-container" aria-hidden="true">
    <picture>
        <source media="(max-width: 640px)" srcset="{{ $mobileUrl }}" type="image/webp">
        <source srcset="{{ $desktopUrl }}" type="image/webp">
        <img src="{{ $desktopUrl }}"
             alt="{{ $alt }}"
             width="{{ $width }}"
             height="{{ $height }}"
             loading="eager"
             fetchpriority="high"
             decoding="async"
             class="hero-img">
    </picture>
</div>
```

### 5.4. Above-the-Fold vs. Below-the-Fold Media Law
- **Above-The-Fold (Hero banner, Navbar logo)**:
  - `loading="eager"`
  - `fetchpriority="high"`
  - Preloaded in `<head>` via `<link rel="preload">`
- **Below-The-Fold (Cards, galleries, guides, regional grids, footers)**:
  - `loading="lazy"`
  - Never preloaded in `<head>`
  - Must include explicit `width` and `height` HTML attributes

### 5.5. Local Storage vs. Third-Party CDNs for Critical Assets
Serve above-the-fold hero images from local storage or same-domain CDN (`/images/hero.webp`).
- **Why?** Third-party image URLs (e.g., Unsplash, Cloudinary, AWS S3 on different domain) introduce external DNS resolution, TCP handshake, and TLS negotiation before the download can even begin, adding 400–800 ms of latency on mobile.

---

## 6. Asset Registry Architecture & PHP Array-Merge Precedence

When building Laravel applications with fallback or demo datasets, store asset metadata in a centralized registry class.

### 6.1. The PHP `array_merge` Precedence Rule
In PHP, `array_merge($array1, $array2)` overwrites keys in `$array1` with matching keys from `$array2`.
- **The Critical Bug**:
  ```php
  // DANGEROUS: If $manifest has external Unsplash URLs, they overwrite your local WebP assets!
  $assets = array_merge(self::$localOptimizedAssets, $externalManifest);
  ```
- **The Correct Pattern**:
  ```php
  // SAFE: Local audited/optimized assets override external or manifest defaults
  $assets = array_merge($externalManifest, self::$localOptimizedAssets);
  ```

### 6.2. Logo & Retina Asset Invariants
- When an asset URL is referenced in unit/feature tests (e.g. `$this->assertEquals('/images/logo.png', $logo['url']);`), do **not** rename the file extension to `.webp`.
- Instead, optimize the file **in-place** as a 2× Retina PNG (e.g. 360×186 px downscaled to 45 KB) using `magick` and `pngquant`.

---

## 7. Cumulative Layout Shift Elimination (CLS = 0.000 Target)

A CLS score above `0.100` triggers an orange or red penalty in Lighthouse. Achieve `0.000` by ensuring the browser reserves exact geometric space for every element before content is downloaded.

### 7.1. Header Logo Explicit Aspect Ratio
Never apply `height: ...; width: auto;` to an image without also defining `aspect-ratio`:
```blade
<!-- Header Logo -->
<img src="{{ asset('images/logo.png') }}"
     alt="{{ config('app.name') }} Logo"
     width="180"
     height="74"
     style="height: 72px; width: auto; aspect-ratio: 180 / 74; display: block;">
```
*Why this works:* The browser uses `aspect-ratio: 180 / 74` and `height: 72px` to calculate `width: 175.13px` instantly, preventing navbar jump when the image arrives.

### 7.2. Card Thumbnail Container Aspect Ratios
Wrap card thumbnails in containers with fixed CSS aspect-ratios:
```html
<article class="card">
    <div style="position: relative; aspect-ratio: 16 / 10; overflow: hidden; background: #f1f5f9;">
        <img src="{{ $item['image_url'] }}"
             alt="{{ $item['title'] }}"
             width="800"
             height="500"
             loading="lazy"
             style="width: 100%; height: 100%; object-fit: cover; display: block;">
    </div>
    <div class="card-body">...</div>
</article>
```

### 7.3. Hero Container Fallback Min-Height
Define a minimum height on the hero section so content below does not jump while the hero image mounts:
```scss
.hero-section {
    position: relative;
    min-height: 400px;

    @media (min-width: 768px) {
        min-height: 440px;
    }
    @media (min-width: 1024px) {
        min-height: 480px;
    }
}
```

---

## 8. JavaScript Hydration & Total Blocking Time (TBT = 0 ms)

Total Blocking Time (TBT) accounts for **30%** of the Lighthouse score. A high TBT means the browser's main thread is locked executing JavaScript, preventing user interaction.

### 8.1. Server-Side Rendering (SSR) First with Blade
- Render all core layout, cards, navigation, and text entirely via Blade.
- Use JavaScript exclusively for progressive enhancement (dropdowns, mobile drawer toggle, modal popups, tab switching).

### 8.2. Zero-Blocking Server State Serialization
Never make an AJAX or `fetch()` call on initial page load to retrieve static catalog data, configuration, or filter options.
Instead, embed the data into the initial HTML using an inert JSON script:
```blade
<script id="catalog-state" type="application/json" data-state="{{ base64_encode(json_encode($serverState)) }}"></script>
```
In your client JavaScript:
```javascript
const stateEl = document.getElementById('catalog-state');
const initialState = stateEl ? JSON.parse(atob(stateEl.dataset.state)) : {};
```
*Result:* Zero network waterfall hops, zero initial load blocking, **0 ms TBT**.

---

## 9. Exact Terminal Commands: Asset Conversion & Optimization

Run these individual commands in terminal (never chain with `&&`):

### 9.1. Generating Desktop WebP from High-Res Source
```bash
# Using ImageMagick:
magick public/images/hero.png -resize 1600x -quality 78 -define webp:method=6 public/images/hero.webp

# Or using cwebp:
cwebp -q 78 -resize 1600 0 public/images/hero.png -o public/images/hero.webp
```

### 9.2. Generating Mobile WebP Variant
```bash
# Using ImageMagick:
magick public/images/hero.png -resize 640x -quality 75 -define webp:method=6 public/images/hero-mobile.webp

# Or using cwebp:
cwebp -q 75 -resize 640 0 public/images/hero.png -o public/images/hero-mobile.webp
```

### 9.3. Compressing Heavy JPEG Content Images
```bash
# Convert 1+ MB JPEG route maps or photos to compact WebP (< 200 KB)
magick public/images/route-map.jpg -resize 1200x -quality 75 public/images/route-map.webp
```

### 9.4. Optimizing Retina PNG Logo In-Place
```bash
# Scale to 2x retina (360x186) and quantize color palette
magick public/images/logo.png -resize 360x186 public/images/logo.png
pngquant --force --quality 70-85 --ext .png public/images/logo.png
```

---

## 10. Web Server Caching & Compression Configuration

To ensure maximum performance in production environments, configure your web server (Nginx or Apache) to serve modern compression and caching headers.

### 10.1. Nginx Configuration Snippet
```nginx
# Enable Gzip and Brotli compression
gzip on;
gzip_types text/plain text/css application/json application/javascript text/xml application/xml image/svg+xml;
gzip_min_length 1024;

# Immutable long-term caching for hashed Vite production assets
location ^~ /build/assets/ {
    expires 1y;
    add_header Cache-Control "public, max-age=31536000, immutable";
    access_log off;
}

# Standard caching for static images and web fonts
location ~* \.(webp|avif|png|jpg|jpeg|svg|woff2)$ {
    expires 30d;
    add_header Cache-Control "public, max-age=2592000, no-transform";
    access_log off;
}
```

### 10.2. Apache (`.htaccess`) Snippet
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/webp "access plus 1 month"
    ExpiresByType font/woff2 "access plus 1 year"
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
</IfModule>

<IfModule mod_headers.c>
    <FilesMatch "^.*(css|js)$">
        Header set Cache-Control "public, max-age=31536000, immutable"
    </FilesMatch>
</IfModule>
```

---

## 11. Step-by-Step Chrome DevTools Lighthouse Audit Procedure

Follow this protocol to obtain clean, reliable, and reproducible Lighthouse audit scores:

1. **Build Production Assets & Clear Caches**:
   ```bash
   rm -f public/hot
   npm run build
   php artisan optimize:clear
   ```
2. **Open an Incognito / Private Window**:
   - Disables all browser extensions (password managers, ad blockers, translation tools) that inject scripts into the DOM and artificially inflate Total Blocking Time.
3. **Navigate to the target URL**: `https://your-laravel-domain.test/`
4. **Open Chrome DevTools**: Press `Cmd + Option + I` (Mac) or `F12` / `Ctrl + Shift + I` (Windows).
5. **Click the "Lighthouse" Tab**.
6. **Configure Lighthouse Settings**:
   - **Mode**: Navigation
   - **Device**: Choose **Mobile** (to test throttled mobile performance) or **Desktop**
   - **Categories**: Check **Performance** (and optionally SEO, Accessibility, Best Practices)
   - Click the gear icon: Ensure **Simulated Throttling** (or **DevTools Throttling**) is active
   - Check **Clear storage**
7. **Click "Analyze page load"**.
8. **Target Result**: A green gauge displaying **95–100**.

---

## 12. Automated Headless CDP Audit Script (Node.js)

For rapid CLI-based performance testing without opening the browser GUI, save this script as `scripts/audit-mobile.mjs` and run `node scripts/audit-mobile.mjs`:

```javascript
import { spawn } from 'child_process';

const chromePath = '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome';
const port = 9345;
const targetUrl = process.argv[2] || 'https://eathways.test/demo';

const browser = spawn(chromePath, [
    `--remote-debugging-port=${port}`,
    '--headless=new',
    '--disable-gpu',
    '--no-sandbox',
    '--window-size=390,844',
    '--ignore-certificate-errors',
    'about:blank'
]);

await new Promise(r => setTimeout(r, 1500));

try {
    const listRes = await fetch(`http://127.0.0.1:${port}/json/list`);
    const pages = await listRes.json();
    const ws = new WebSocket(pages[0].webSocketDebuggerUrl);
    await new Promise(r => ws.onopen = r);

    let id = 1;
    const send = (method, params = {}) => new Promise((resolve, reject) => {
        const msgId = id++;
        const handler = (evt) => {
            const data = JSON.parse(evt.data);
            if (data.id === msgId) {
                ws.removeEventListener('message', handler);
                if (data.error) reject(data.error);
                else resolve(data.result);
            }
        };
        ws.addEventListener('message', handler);
        ws.send(JSON.stringify({ id: msgId, method, params }));
    });

    await send('Page.enable');
    await send('Network.enable');
    await send('Emulation.setDeviceMetricsOverride', {
        width: 390,
        height: 844,
        deviceScaleFactor: 3,
        mobile: true
    });

    // Emulate Mobile 4G Throttling: 1.6 Mbps download, 750 kbps upload, 150ms latency
    await send('Network.emulateNetworkConditions', {
        offline: false,
        latency: 150,
        downloadThroughput: (1.6 * 1024 * 1024) / 8,
        uploadThroughput: (750 * 1024) / 8
    });
    await send('Emulation.setCPUThrottlingRate', { rate: 4 });

    console.log(`Navigating to ${targetUrl} with Mobile 4G throttling...`);
    await send('Page.navigate', { url: targetUrl });
    await new Promise(r => setTimeout(r, 6000));

    const metrics = await send('Runtime.evaluate', {
        expression: `
            (() => {
                const nav = performance.getEntriesByType('navigation')[0];
                const paint = performance.getEntriesByType('paint');
                const fcp = paint.find(p => p.name === 'first-contentful-paint');
                return {
                    responseEndMs: Math.round(nav.responseEnd),
                    domInteractiveMs: Math.round(nav.domInteractive),
                    fcpMs: fcp ? Math.round(fcp.startTime) : null
                };
            })()
        `,
        returnByValue: true
    });

    const lcp = await send('Runtime.evaluate', {
        expression: `
            new Promise(r => {
                new PerformanceObserver(list => {
                    const last = list.getEntries().pop();
                    r({ lcpTimeMs: Math.round(last.startTime), url: last.url });
                }).observe({ type: 'largest-contentful-paint', buffered: true });
                setTimeout(() => r({ error: 'timeout' }), 2000);
            })
        `,
        awaitPromise: true,
        returnByValue: true
    });

    const cls = await send('Runtime.evaluate', {
        expression: `
            new Promise(r => {
                let score = 0;
                new PerformanceObserver(list => {
                    for (const entry of list.getEntries()) {
                        if (!entry.hadRecentInput) score += entry.value;
                    }
                }).observe({ type: 'layout-shift', buffered: true });
                setTimeout(() => r({ clsScore: Math.round(score * 1000) / 1000 }), 1000);
            })
        `,
        awaitPromise: true,
        returnByValue: true
    });

    console.log('\n--- Mobile 4G Performance Audit Results ---');
    console.table({ ...metrics.result.value, ...lcp.result.value, ...cls.result.value });

    ws.close();
} finally {
    browser.kill();
}
```

---

## 13. Universal Troubleshooting & Diagnostics Matrix

| Symptom | Root Cause | Immediate Diagnostic & Fix |
| :--- | :--- | :--- |
| **Mobile score stuck at 50–60** | `public/hot` file present; browser downloading `@vite/client` (178 KB) & unminified modules over throttled 4G. | Delete `public/hot`, run `npm run build`, and clear view cache (`php artisan view:clear`). |
| **LCP > 4 seconds on Mobile** | Hero image is an external URL, uncompressed (> 100 KB), or lacks `<link rel="preload">` in `<head>`. | Generate a 640px WebP mobile variant (< 30 KB), implement `<picture>` with media queries, and preload in `<head>` with `fetchpriority="high"`. |
| **FCP > 2.5 seconds** | Global stylesheet imports heavy icon packs (`all.min.css`) or Google Fonts stylesheet is render-blocking. | Extract icons into a page-scoped stylesheet. Load fonts asynchronously using `media="print" onload="this.media='all'"`. |
| **CLS > 0.100 (Layout shifts)** | Header logo or thumbnail container lacks explicit aspect-ratio or min-height. | Add `aspect-ratio: 180 / 74;` (matching natural image dimensions) and define container `aspect-ratio` on all cards. |
| **TBT > 300 ms** | Heavy client-side JavaScript executing during initial load. | Use SSR Blade rendering; defer interactive scripts (`<script type="module">`); avoid initial-load AJAX calls by embedding bootstrap JSON. |

---

## 14. Universal Production Readiness Checklist for Any Laravel Project

Before opening a pull request or deploying to production, verify each requirement:

- [ ] **1. Environment**: Ensure `public/hot` is removed and production assets are compiled (`npm run build`).
- [ ] **2. Critical CSS**: Global CSS transfer size is `< 15 KB` gzipped. No monolithic icon suites imported globally.
- [ ] **3. Web Fonts**: Google Fonts uses `preconnect`, subsets only active weights, and loads asynchronously via `<link rel="preload">` + `onload="this.media='all'"`.
- [ ] **4. Above-the-Fold Media**: Hero image has dual resolutions (`1600px` desktop / `640px` mobile WebP), responsive `<picture>` tags, and `<link rel="preload" as="image" ... fetchpriority="high">` in `<head>`.
- [ ] **5. Below-the-Fold Media**: All gallery, card, and secondary images have `loading="lazy"` with explicit `width` and `height` attributes.
- [ ] **6. Zero CLS**: Brand logo and card thumbnail containers declare explicit CSS `aspect-ratio` to reserve space before image download.
- [ ] **7. Zero TBT**: Page is server-rendered via Blade; bootstrap state is passed via `<script type="application/json">` without initial blocking AJAX requests.
- [ ] **8. Server Headers**: Static assets in `public/build/assets/` have immutable caching headers (`max-age=31536000`).
- [ ] **9. Automated Audit**: Run `node scripts/audit-mobile.mjs` or Chrome DevTools Incognito Lighthouse and verify score **> 95**.
- [ ] **10. Tests Pass**: Ensure all automated test suites pass without regression (`php artisan test`).
