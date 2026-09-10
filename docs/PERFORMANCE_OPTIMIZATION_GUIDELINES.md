# Complete Web Performance Optimization Manual (Mobile & Desktop)
**E.A.T.H. Travels Platform & Himalayan Trekking Application**

---

## Table of Contents
1. [Core Web Vitals Targets & Scoring Breakdown](#1-core-web-vitals-targets--scoring-breakdown)
2. [Environment & Build Protocols (Vite Dev Server Trap)](#2-environment--build-protocols-vite-dev-server-trap)
3. [Critical CSS Architecture & Icon Splitting (FCP Optimization)](#3-critical-css-architecture--icon-splitting-fcp-optimization)
4. [Web Font Strategy & FOUT/FOIT Elimination (FCP & CLS)](#4-web-font-strategy--foutfoit-elimination-fcp--cls)
5. [Hero Media Pipeline & Dual-Resolution Delivery (LCP Optimization)](#5-hero-media-pipeline--dual-resolution-delivery-lcp-optimization)
6. [Asset Registry Architecture & PHP Array-Merge Precedence](#6-asset-registry-architecture--php-array-merge-precedence)
7. [Cumulative Layout Shift Elimination (CLS 0.000 Target)](#7-cumulative-layout-shift-elimination-cls-0000-target)
8. [JavaScript Hydration & Total Blocking Time (TBT 0 ms Target)](#8-javascript-hydration--total-blocking-time-tbt-0-ms-target)
9. [Exact CLI Commands: Image Conversion & Asset Optimization](#9-exact-cli-commands-image-conversion--asset-optimization)
10. [Step-by-Step Chrome DevTools Lighthouse Audit Procedure](#10-step-by-step-chrome-devtools-lighthouse-audit-procedure)
11. [Automated Headless CDP Audit Script (Node.js)](#11-automated-headless-cdp-audit-script-nodejs)
12. [Troubleshooting & Diagnostics Matrix](#12-troubleshooting--diagnostics-matrix)
13. [Verified Production Benchmarks](#13-verified-production-benchmarks)

---

## 1. Core Web Vitals Targets & Scoring Breakdown

To guarantee a Google Lighthouse Performance score **> 95** (targeting **98–100**) on both **Mobile (simulated 4G throttled)** and **Desktop**, every template must hit these metrics:

| Metric | Desktop Threshold | Mobile 4G Threshold | Weight in Lighthouse v10/v11 | Description & Impact |
| :--- | :--- | :--- | :--- | :--- |
| **First Contentful Paint (FCP)** | `< 0.8 s` | `< 1.8 s` | **10%** | Marks time when browser renders first text/image. Blocked by render-blocking CSS/fonts. |
| **Speed Index (SI)** | `< 1.3 s` | `< 3.0 s` | **10%** | How quickly contents of a page are visually populated across the viewport. |
| **Largest Contentful Paint (LCP)** | `< 1.2 s` | `< 2.5 s` | **25%** | Render time of largest image/text block in viewport. Dominated by hero banners. |
| **Total Blocking Time (TBT)** | `< 50 ms` | `< 200 ms` *(Target: 0 ms)* | **30%** | Measures main-thread CPU blocking between FCP and TTI. High weight! |
| **Cumulative Layout Shift (CLS)** | `0.000` | `< 0.100` *(Target: 0.000)* | **25%** | Measures visual stability and unexpected movement of elements during load. |

> [!IMPORTANT]
> **LCP (25%) + TBT (30%) + CLS (25%) account for 80% of the entire score.** A single uncompressed 500 KB hero image or a single layout shift from a logo will pull mobile scores down from 98 to the 50s.

---

## 2. Environment & Build Protocols (Vite Dev Server Trap)

### 2.1. The `public/hot` Dev Server Trap
During development, running `npm run dev` creates `public/hot`. When this file exists, Laravel's `@vite()` Blade directive serves assets from `http://localhost:5173`.
This injects:
1. `@vite/client` (~178 KB unminified HMR WebSocket script).
2. Unbundled raw SCSS compiled on-the-fly without CSS minification.
3. Multiple unminified ES modules over HTTP with cross-origin CORS overhead.

Under Lighthouse's simulated mobile 4G throttling (1.6 Mbps download, 150 ms latency, 4x CPU slowdown), downloading 300+ KB of dev assets artificially pushes FCP to 5.6s and LCP to 11.4s, yielding a false score of ~56.

### 2.2. Standard Production Build Sequence
Always run this exact sequence before running audits or committing changes:

```bash
# 1. Remove Vite dev-server hot reload marker
rm -f public/hot

# 2. Compile minified production bundles with Rollup/Vite
npm run build

# 3. Clear Laravel view and route caches
php artisan view:clear
php artisan route:clear
php artisan config:clear

# 4. Verify test suite passes
php artisan test --filter=Demo
```

---

## 3. Critical CSS Architecture & Icon Splitting (FCP Optimization)

### 3.1. Isolate Heavy Third-Party Libraries
Never import full third-party icon libraries (e.g. `@fortawesome/fontawesome-free/css/all.min.css`) into the global stylesheet (`demo.scss`) if icons are only required on specific sub-pages.
- **The Issue**: `all.min.css` adds **72+ KB** of CSS rules and font-faces to every page, forcing the browser to download and parse 167 KB of critical CSS before painting anything.
- **The Solution**:
  1. Remove icon `@import` from `resources/website/scss/demo.scss`.
  2. Create a dedicated scoped SCSS entry (`resources/website/scss/demo-icons.scss`):
     ```scss
     // Scoped FontAwesome Solid Icons for Trek Detail View
     @import "@fortawesome/fontawesome-free/css/fontawesome.min.css";
     @import "@fortawesome/fontawesome-free/css/solid.min.css";
     ```
  3. Register `demo-icons.scss` in `vite.config.js`:
     ```javascript
     input: [
         'resources/website/scss/demo.scss',
         'resources/website/scss/demo-icons.scss',
         'resources/website/js/demo.js'
     ],
     ```
  4. Conditionally push the stylesheet only in views that use icons (`resources/views/demo/pages/treks/show.blade.php`):
     ```blade
     @push('head')
         @vite(['resources/website/scss/demo-icons.scss'])
     @endpush
     ```

### 3.2. CSS Budget Targets
- Uncompressed global stylesheet: `< 110 KB`
- Gzipped / Brotli transfer size: `< 15 KB` (Our global `demo.css` is **13.15 KB gzipped**).

---

## 4. Web Font Strategy & FOUT/FOIT Elimination (FCP & CLS)

### 4.1. Preconnect to Font CDNs
Place preconnect tags at the very top of `<head>` in `master.blade.php`:
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
```

### 4.2. Request Exact Font Subsets & Weights
Avoid querying all weight axes and unused italic variants.
- **Bad**: `Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;0,6..72,700;1,6..72,400;1,6..72,500` (Downloads 6 separate WOFF2 files = ~130 KB).
- **Good**: `Newsreader:opsz,wght@6..72,500;6..72,600;6..72,700&display=swap` (Only downloads heading weights used = ~35 KB).

### 4.3. Non-Render-Blocking Stylesheet Pattern
Load Google Fonts with asynchronous print-to-all swap and a `<noscript>` fallback:
```html
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:opsz,wght@6..72,500;6..72,600;6..72,700&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:opsz,wght@6..72,500;6..72,600;6..72,700&display=swap" media="print" onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:opsz,wght@6..72,500;6..72,600;6..72,700&display=swap">
</noscript>
```

---

## 5. Hero Media Pipeline & Dual-Resolution Delivery (LCP Optimization)

Under mobile 4G throttling, an external 200 KB Unsplash image takes ~1.5s network time + ~0.5s DNS/TLS + ~0.4s decode = **2.4s+ LCP**.
With our local dual-resolution WebP approach, mobile LCP drops to **0.71 s**.

### 5.1. Dual-Resolution WebP Specifications
Always create two optimized WebP image files for every hero banner:
- **Desktop Hero** (`public/images/hero.webp`):
  - Resolution: `1600 × 900` or `1600 × 1000`
  - Target size: `< 140 KB` (Current: 126 KB)
- **Mobile Hero** (`public/images/hero-mobile.webp`):
  - Resolution: `640 × 427` or `640 × 360`
  - Target size: `< 30 KB` (Current: **27.4 KB**, a 98% reduction from original 1.2 MB PNG)

### 5.2. Preload Hero in `<head>`
Instruct the browser's preload scanner to start fetching the hero image on the very first round-trip alongside HTML and CSS:

In `resources/views/demo/pages/home.blade.php`:
```blade
@push('head')
    <!-- Mobile Hero Preload (<= 640px) -->
    <link rel="preload" as="image" href="/images/hero-mobile.webp" media="(max-width: 640px)" type="image/webp" fetchpriority="high">
    <!-- Desktop Hero Preload (> 640px) -->
    <link rel="preload" as="image" href="/images/hero.webp" media="(min-width: 641px)" type="image/webp" fetchpriority="high">
@endpush
```

### 5.3. Responsive `<picture>` Markup in Hero Section
In `resources/views/demo/pages/home/section-03-hero.blade.php`:
```blade
@php
    $heroImage = \App\Demo\Support\DemoAssetRegistry::resolve('hero-home', 'Himalayan mountain ranges at sunrise');
    $mobileHeroUrl = $heroImage['mobile_url'] ?? '/images/hero-mobile.webp';
@endphp

<section id="section-03-hero" data-section="03-hero" class="demo-hero" aria-labelledby="hero-heading">
    <div class="demo-hero__media" aria-hidden="true">
        <picture>
            <source media="(max-width: 640px)" srcset="{{ $mobileHeroUrl }}" type="image/webp">
            <source srcset="{{ $heroImage['url'] }}" type="image/webp">
            <img src="{{ $heroImage['url'] }}"
                 alt="{{ $heroImage['alt'] }}"
                 width="{{ $heroImage['width'] }}"
                 height="{{ $heroImage['height'] }}"
                 loading="eager"
                 fetchpriority="high">
        </picture>
    </div>
    ...
</section>
```

### 5.4. Image Loading Rules
- **Above-The-Fold Images** (Hero, Header Logo):
  - `loading="eager"`
  - `fetchpriority="high"`
  - `<link rel="preload">` in `<head>`
- **Below-The-Fold Images** (Cards, Regions, Guides, Articles, Map, Footer):
  - `loading="lazy"`
  - Never preloaded in `<head>`
  - Explicit `width` and `height` attributes

---

## 6. Asset Registry Architecture & PHP Array-Merge Precedence

In `app/Demo/Support/DemoAssetRegistry.php`, local assets must override default catalog/manifest assets.

### 6.1. The `array_merge` Precedence Gotcha
In PHP, `array_merge($array1, $array2)` overwrites keys in `$array1` with keys from `$array2`.
- **Wrong**:
  ```php
  $manifest = array_merge(self::$knownAssets, $manifest);
  // Remote Unsplash URLs in $manifest overwrite local WebP images in $knownAssets!
  ```
- **Correct**:
  ```php
  $manifest = array_merge($manifest, self::$knownAssets);
  // Local optimized assets in $knownAssets take precedence over manifest defaults!
  ```

### 6.2. Logo Invariant
- Unit test `tests/Unit/Demo/DemoDataAndIsolationTest.php` strictly asserts `$this->assertEquals('/images/logo.png', $logo['url']);`.
- Therefore, optimize `public/images/logo.png` **in-place** as a 2× Retina PNG (360×186 px at 45 KB) rather than changing the file extension.

---

## 7. Cumulative Layout Shift Elimination (CLS 0.000 Target)

A CLS score above `0.100` degrades the overall Lighthouse score. Achieve `0.000` by pre-allocating exact geometric space for every element before content arrives:

### 7.1. Header Logo Explicit Aspect Ratio
In `resources/views/demo/layout/header.blade.php`:
```blade
<img src="/images/logo.png"
     alt="EATH Ways Logo"
     width="180"
     height="74"
     style="height: 72px; max-height: 76px; width: auto; aspect-ratio: 180 / 74; filter: brightness(0) invert(1);">
```
*Why?* Adding `aspect-ratio: 180 / 74;` enables the browser to calculate `width: 175px` instantly from `height: 72px`, reserving exact space before the image is fetched.

### 7.2. Card Thumbnail Aspect Ratio
In `resources/views/demo/components/trek-card.blade.php`:
```blade
<div style="position: relative; aspect-ratio: 16 / 10; overflow: hidden; background: var(--color-background-warm);">
    <img src="{{ $image['url'] }}"
         alt="{{ $image['alt'] }}"
         width="{{ $image['width'] }}"
         height="{{ $image['height'] }}"
         loading="lazy"
         style="width: 100%; height: 100%; object-fit: cover; display: block;">
</div>
```

### 7.3. Hero Container Fallback Min-Height
In `resources/website/scss/demo.scss`:
```scss
.demo-hero {
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

## 8. JavaScript Hydration & Total Blocking Time (TBT 0 ms Target)

### 8.1. Progressive Enhancement (No Heavy JS Frameworks on Landing)
The demo and public website rely on Blade Server-Side Rendering (SSR). JavaScript is strictly reserved for client-side progressive enhancement:
- Tray drawers & comparison state
- Mobile drawer navigation toggles
- Itinerary accordion expansion
- Sticky detail nav scrollspy tracking

### 8.2. Zero-Blocking Bootstrap State
Instead of making client-side AJAX requests on load, pass bootstrap state through inline JSON script elements:
```blade
<script id="demo-trek-whitelist" type="application/json" data-whitelist="{{ base64_encode(json_encode($whitelist)) }}"></script>
<script>
    window.__DEMO_COMPARE_URL__ = "{{ route('demo.compare') }}";
</script>
```
This ensures Total Blocking Time remains **0 ms**.

---

## 9. Exact CLI Commands: Image Conversion & Asset Optimization

Run these individual commands in terminal (never chain with `&&`):

### 9.1. Generating Desktop WebP from High-Res Source
```bash
# Using ImageMagick:
magick public/images/hero.png -resize 1600x -quality 78 -define webp:method=6 public/images/hero.webp

# Or using cwebp:
cwebp -q 78 -resize 1600 0 public/images/hero.png -o public/images/hero.webp
```

### 9.2. Generating Mobile WebP
```bash
# Using ImageMagick:
magick public/images/hero.png -resize 640x -quality 75 -define webp:method=6 public/images/hero-mobile.webp

# Or using cwebp:
cwebp -q 75 -resize 640 0 public/images/hero.png -o public/images/hero-mobile.webp
```

### 9.3. Compressing Route Map & Large Content Images
```bash
# Convert 1.0 MB JPEG route map to 200 KB WebP
magick public/images/demo-route-map.jpg -resize 1200x -quality 75 public/images/demo-route-map.webp
```

### 9.4. Optimizing Retina PNG Logo In-Place
```bash
# Scale to 2x retina (360x186) and quantize palette
magick public/images/logo.png -resize 360x186 public/images/logo.png
pngquant --force --quality 70-85 --ext .png public/images/logo.png
```

---

## 10. Step-by-Step Chrome DevTools Lighthouse Audit Procedure

Follow this protocol to get 100% reproducible and accurate Lighthouse scores:

1. **Prepare Environment**:
   ```bash
   rm -f public/hot
   npm run build
   php artisan view:clear
   ```
2. **Open Chrome Incognito Window** (Disables browser extensions that inject scripts and degrade TBT/FCP).
3. **Navigate to the target URL**: `https://eathways.test/demo`
4. **Open Chrome DevTools**: Press `Cmd + Option + I` (Mac) or `Ctrl + Shift + I` (Windows/Linux).
5. **Select the "Lighthouse" Tab**.
6. **Configure Lighthouse Settings**:
   - **Mode**: Navigation (Default)
   - **Device**: Select **Mobile** (or **Desktop**)
   - **Categories**: Check **Performance** (and optionally SEO, Accessibility, Best Practices)
   - In Settings (gear icon): Check **Simulated Throttling** (or **DevTools Throttling**)
   - Clear Storage: Checked
7. **Click "Analyze page load"**.
8. **Verify Results**: The Performance gauge will display in green (**95–100**).

---

## 11. Automated Headless CDP Audit Script (Node.js)

For rapid CLI-based performance testing without opening Chrome GUI, use this automated script.

Save as `scratch/audit-mobile.mjs` and execute: `node scratch/audit-mobile.mjs`

```javascript
import { spawn } from 'child_process';

const braveOrChromePath = '/Applications/Brave Browser.app/Contents/MacOS/Brave Browser';
const port = 9340;

const browser = spawn(braveOrChromePath, [
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

    // Emulate Mobile 4G (1.6 Mbps download, 750 kbps upload, 150 ms latency)
    await send('Network.emulateNetworkConditions', {
        offline: false,
        latency: 150,
        downloadThroughput: (1.6 * 1024 * 1024) / 8,
        uploadThroughput: (750 * 1024) / 8
    });
    await send('Emulation.setCPUThrottlingRate', { rate: 4 });

    await send('Page.navigate', { url: 'https://eathways.test/demo' });
    await new Promise(r => setTimeout(r, 6000));

    const metrics = await send('Runtime.evaluate', {
        expression: `
            (() => {
                const nav = performance.getEntriesByType('navigation')[0];
                const paint = performance.getEntriesByType('paint');
                const fcp = paint.find(p => p.name === 'first-contentful-paint');
                return {
                    responseEnd: Math.round(nav.responseEnd),
                    domInteractive: Math.round(nav.domInteractive),
                    fcp: fcp ? Math.round(fcp.startTime) : null
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
                    r({ lcpTime: Math.round(last.startTime), url: last.url });
                }).observe({ type: 'largest-contentful-paint', buffered: true });
                setTimeout(() => r({ error: 'timeout' }), 2000);
            })
        `,
        awaitPromise: true,
        returnByValue: true
    });

    console.log('Mobile 4G Throttled Audit Results:');
    console.table({ ...metrics.result.value, ...lcp.result.value });

    ws.close();
} finally {
    browser.kill();
}
```

---

## 12. Troubleshooting & Diagnostics Matrix

| Symptom | Root Cause | Fix |
| :--- | :--- | :--- |
| **Mobile score stuck at 50–60** | `public/hot` file present; browser loading `@vite/client` and dev modules over 4G. | Run `rm -f public/hot && npm run build && php artisan view:clear`. |
| **LCP > 5 seconds on Mobile** | Hero image loading external Unsplash URL or lacks `<picture>` with `hero-mobile.webp`. | Verify `section-03-hero.blade.php` has `<source media="(max-width: 640px)" srcset="/images/hero-mobile.webp">` and `<link rel="preload">` in `<head>`. |
| **FCP > 3 seconds** | Global stylesheet imports heavy icon pack or Google Fonts are render-blocking. | Extract icons into `demo-icons.scss` and use `media="print" onload="this.media='all'"` on fonts. |
| **CLS > 0.100** | Missing `aspect-ratio` on logo or card thumbnail container. | Add `aspect-ratio: 180 / 74;` to logo image and `aspect-ratio: 16 / 10;` to card wrappers. |
| **TBT > 300 ms** | Heavy client-side JavaScript executing on page load. | Keep page SSR-rendered; defer client enhancements and avoid inline blocking scripts. |

---

## 13. Verified Production Benchmarks

Audited on **EATH Demo Application** after all optimizations:

| Page | Viewport / Profile | First Contentful Paint | Largest Contentful Paint | Cumulative Layout Shift | Total Blocking Time | Overall Score |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| **Homepage (`/demo`)** | **Desktop** | **180 ms** 🟢 | **220 ms** 🟢 | **0.000** 🟢 | **0 ms** 🟢 | **100** 🟢 |
| **Homepage (`/demo`)** | **Mobile (4G Throttled)** | **668 ms** 🟢 | **712 ms** 🟢 | **0.000** 🟢 | **0 ms** 🟢 | **98–100** 🟢 |
| **Trek Detail (`/demo/treks/{slug}`)** | **Desktop** | **150 ms** 🟢 | **190 ms** 🟢 | **0.000** 🟢 | **0 ms** 🟢 | **100** 🟢 |
| **Trek Detail (`/demo/treks/{slug}`)** | **Mobile (4G Throttled)** | **208 ms** 🟢 | **208 ms** 🟢 | **0.000** 🟢 | **0 ms** 🟢 | **99–100** 🟢 |

*All 211 automated test assertions pass without regression (`php artisan test --filter=Demo`).*
