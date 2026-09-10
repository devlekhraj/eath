# Lighthouse Production Guidelines

Use this guide for every public website page before release. The target is 100 for SEO, Accessibility, Best Practices, and the highest practical Performance score without breaking design or functionality.

These rules apply to the website package, Blade views, controllers, database content, assets, middleware, and deployment configuration.

## Global production rules

Every public website page must return a real `200` response, render meaningful server-side HTML, and be crawlable unless the page is intentionally private. Public pages must not depend on JavaScript to expose the main title, description, links, product/trip content, or crawlable navigation.

Use one canonical URL per page. Avoid duplicate routes that show the same page with different URLs unless one redirects permanently to the canonical route.

Public website pages must never send these directives:

```html
<meta name="robots" content="noindex">
<meta name="robots" content="nofollow">
```

Public website responses must also never send this header:

```http
X-Robots-Tag: noindex, nofollow
```

Preview, admin, auth, dashboard, temporary, internal, and utility pages may use `noindex`, but never on production landing pages, destination pages, trek detail pages, blog pages, guide pages, contact pages, or planner entry pages.

## SEO rules

Every public page must include a complete head section:

```blade
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="{{ $seoCanonical }}">
<link rel="alternate" hreflang="en-np" href="{{ $seoCanonical }}">
<link rel="alternate" hreflang="x-default" href="{{ $seoCanonical }}">
```

Title rules:

- Must be unique per page.
- Must describe the exact page content.
- Keep the most important keyword near the start.
- Avoid generic titles such as `Home`, `Detail`, `Website`, or `Untitled`.
- Production titles should not contain words like `sample`, `preview`, `test`, or `demo`.

Meta description rules:

- Must be unique per page.
- Should be human-readable and specific.
- Prefer 120 to 160 characters where possible.
- Must match visible page content.
- Do not stuff keywords.
- Do not use placeholder text.

Canonical URL rules:

- Must use the final production URL.
- Must not include unnecessary query strings.
- Filter/search pages should either use a clean canonical URL or be intentionally controlled by robots rules.
- Pagination must use self-canonical URLs unless there is a deliberate canonical strategy.

OpenGraph and Twitter rules:

```blade
<meta property="og:type" content="website">
<meta property="og:site_name" content="EATH Ways">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $seoCanonical }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:image:alt" content="{{ $seoImageAlt }}">
<meta property="og:locale" content="en_NP">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">
```

Social image rules:

- Use an absolute URL.
- Use a real production image.
- Prefer 1200x630 for sharing images.
- Add meaningful alt text.
- Avoid broken image URLs.

Structured data rules:

All public pages should include valid JSON-LD when the content supports it. Use only facts that are visible on the page or stored in the database.

Global website schema:

- `TravelAgency`
- `WebSite`

Trek detail page schema:

- `TouristTrip`
- `Offer` if price is shown
- `ItemList` for itinerary if itinerary is shown
- `BreadcrumbList` if breadcrumbs are shown

Article/blog page schema:

- `Article` or `BlogPosting`
- `BreadcrumbList`

FAQ page schema:

- `FAQPage` only when the questions and answers are visible on the page.

Do not add fake ratings, fake reviews, fake availability, fake license numbers, or fake organization credentials. Schema must match real database content.

## Production database content rules

Every real database-backed public record must include SEO-ready fields or safe fallbacks.

Treks/packages should have:

- Unique slug
- Public title/name
- Meta title
- Meta description
- Canonical route
- Main image
- Main image alt text
- Region/destination
- Duration
- Difficulty
- Maximum altitude when relevant
- Price if shown publicly
- Itinerary summary or day-by-day content
- Included/excluded information when shown
- FAQs when available

Destinations should have:

- Unique slug
- Meta title
- Meta description
- Main image with alt text
- Intro copy
- Related treks
- Best season or useful planning content

Blogs/articles should have:

- Unique slug
- Meta title
- Meta description
- Main image with alt text
- Author or organization attribution
- Published date
- Updated date if edited
- Real body content with headings

Images in the database must never rely on filename-only meaning. Store an explicit alt text field for every public image.

## Crawlability rules

Links must be real crawlable anchors:

```html
<a href="/website/treks/everest-base-camp">Everest Base Camp Trek</a>
```

Avoid using buttons or JavaScript-only navigation for important pages. If JavaScript enhances a link, keep a valid `href` fallback.

Do not use these for crawlable navigation:

```html
<a href="#">...</a>
<a href="javascript:void(0)">...</a>
<button onclick="location.href='...'">...</button>
```

Hash links are allowed only for same-page sections, such as table of contents links.

Every important page must be reachable through internal links from the homepage, listing pages, sitemap, or navigation.

## Accessibility rules

Every page must have exactly one main `<h1>` that describes the page. Follow a logical heading order after that: `h2`, then `h3`, and so on.

Images:

- Every `<img>` must have an `alt` attribute.
- Decorative images must use `alt=""`.
- Informative images must describe the image content, not repeat generic text.
- The main hero image should use meaningful alt text.
- Set `width` and `height` to reduce layout shift.

Forms:

- Every input, select, and textarea must have a visible label or accessible label.
- Validation errors must be connected with `aria-describedby` where possible.
- Required fields must be communicated visually and programmatically.
- Do not rely on placeholder text as the only label.

Buttons and links:

- Links must describe their destination.
- Icon-only buttons must have `aria-label`.
- Avoid empty `aria-label` values.
- Avoid duplicate ambiguous link text such as many repeated `Read more` links without extra context.

Keyboard support:

- All navigation, dropdowns, modals, drawers, forms, and interactive cards must be keyboard reachable.
- Focus must be visible.
- Skip-to-content link must be available near the start of the page.
- Modals and drawers must trap focus while open and return focus when closed.

Color and contrast:

- Text must meet WCAG AA contrast.
- Do not communicate meaning by color alone.
- Focus states must be visible against the background.

## Best Practices rules

Production must use HTTPS.

Avoid browser console errors. Lighthouse Best Practices can fail because of JavaScript runtime errors, missing assets, failed network requests, or invalid source maps.

All external links that open in a new tab must include:

```html
rel="noopener noreferrer"
```

Avoid deprecated browser APIs. Avoid mixed content. Avoid loading insecure HTTP assets on HTTPS pages.

Security headers should be configured in production where possible:

```http
Strict-Transport-Security
X-Content-Type-Options: nosniff
Referrer-Policy
Permissions-Policy
Content-Security-Policy
```

Do not expose sensitive debug data in production:

- Disable debug mode.
- Hide stack traces.
- Disable public debugbar.
- Do not expose environment values.
- Do not expose admin-only API data in public pages.

## Performance rules

Performance must be handled at the page, asset, image, database, and server level.

Images:

- Use WebP or AVIF where possible.
- Compress all public images.
- Use responsive image sizes for large banners and cards.
- Add `width` and `height` attributes.
- Use `loading="lazy"` for below-the-fold images.
- Use `loading="eager"` and `fetchpriority="high"` only for the main hero/LCP image.
- Avoid loading full-size images into small cards.

CSS and JavaScript:

- Only load the Vite entries needed by the page/package.
- Do not load admin assets on public website pages.
- Do not load website preview assets on admin pages.
- Keep shared layout assets stable.
- Avoid duplicate CSS entries in `vite.config.js`.
- Avoid heavy JavaScript for content that can be rendered by Blade.

Fonts:

- Preconnect to font origins when using external fonts.
- Preload only critical font styles when necessary.
- Use `font-display: swap` when self-hosting fonts.
- Avoid too many font weights.

Laravel and database:

- Prevent N+1 queries with eager loading.
- Cache stable navigation data, settings, destinations, and featured records.
- Paginate large listings.
- Avoid loading full content for cards if summaries are enough.
- Use indexed columns for slugs, status, publish flags, and foreign keys.
- Use route, config, and view caches in production.

Production cache commands:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

Run `php artisan optimize:clear` during development after changing routes, config, service providers, or views.

## Vite and manifest rules

Every `@vite()` entry used in Blade must exist in `vite.config.js` input and in the generated `public/build/manifest.json` after build.

If a file is renamed, update all of these together:

- Blade `@vite()` reference
- `vite.config.js` input
- Actual asset file path
- Any imports inside JS/SCSS
- Production manifest by running `npm run build`

Example:

```blade
@vite(['packages/website/resources/website/scss/website-preview.scss'])
```

must match:

```js
'packages/website/resources/website/scss/website-preview.scss'
```

in `vite.config.js`.

## Middleware rules

Public website middleware must not block indexing. Do not add `X-Robots-Tag: noindex, nofollow` to public pages.

Feature-gate middleware may return `404` when a feature is disabled, but production public pages must be enabled before launch.

Admin routes, auth routes, internal APIs, staging previews, and private tools may use noindex headers.

## Sitemap and robots rules

Production should have a real `robots.txt`:

```txt
User-agent: *
Allow: /
Disallow: /admin
Disallow: /api
Sitemap: https://example.com/sitemap.xml
```

Production should have a dynamic sitemap generated from real database records:

- Homepage
- Trek/package detail pages
- Destination pages
- Experience/category pages
- Blog/article pages
- Static pages

Only include canonical, published, indexable URLs in the sitemap.

Do not include unpublished drafts, disabled records, duplicate filtered URLs, admin URLs, API URLs, or private pages.

## Pre-launch Lighthouse checklist

Before launch, test the main templates:

- Homepage
- Trek/package listing
- Trek/package detail
- Destination listing
- Destination detail
- Blog listing
- Blog detail
- Guide listing/detail
- Contact page
- Planner entry page

For each page, confirm:

- HTTP status is `200`.
- Page has one `<title>`.
- Page has one meta description.
- Page has one canonical URL.
- Page has `index, follow` unless intentionally private.
- Page does not send `X-Robots-Tag: noindex`.
- Page has one clear `<h1>`.
- Images have alt text, width, and height.
- Links are crawlable.
- Structured data is valid.
- No browser console errors.
- No missing Vite manifest files.
- No broken images.
- No mixed-content HTTP assets.
- Main content is visible without waiting for client JavaScript.

## Local audit process

Build production assets:

```bash
npm run build
php artisan optimize:clear
```

Open the page in an incognito Chrome window with extensions disabled. Browser extensions can affect Lighthouse scores.

Run Lighthouse against the final URL, for example:

```text
https://eath.test/website/treks/everest-base-camp
```

If SEO is below 100, check first:

- `noindex` meta tag
- `X-Robots-Tag` header
- missing title
- missing meta description
- non-crawlable links
- unsuccessful HTTP status
- blocked robots rules
- invalid canonical URL

If Accessibility is below 100, check first:

- missing image alt text
- missing form labels
- low contrast text
- skipped heading levels
- unlabeled buttons
- focus visibility
- keyboard navigation

If Best Practices is below 100, check first:

- console errors
- HTTPS issues
- mixed content
- vulnerable dependencies surfaced by Lighthouse
- deprecated browser APIs
- unsafe target blank links
- broken source maps or failed assets

If Performance is below target, check first:

- LCP image size and priority
- render-blocking CSS/JS
- unused JavaScript
- image dimensions
- slow database queries
- heavy third-party scripts
- missing cache headers

## Production rule

Do not publish a public page until the database content, Blade output, routes, middleware, assets, sitemap, and robots rules all satisfy this guide.

## Seeder and database production rules

When the website stops reading fixture arrays and starts reading from seeded or live database records, every public record must carry complete SEO, accessibility, and performance metadata. Do not rely on Blade defaults except as a safety fallback.

Every public database-backed page model must support these fields, either directly on the table or through a related SEO table:

```text
title
slug
meta_title
meta_description
canonical_url nullable
og_title nullable
og_description nullable
og_image_id nullable
image_alt
is_published
published_at
updated_at
deleted_at nullable
```

Field rules:

- `title` is the visible page title or record name.
- `slug` is unique inside its content type and used in the public URL.
- `meta_title` is required for every published record.
- `meta_description` is required for every published record.
- `canonical_url` is nullable. If empty, generate the canonical URL from the canonical route.
- `og_title` is nullable. If empty, use `meta_title`.
- `og_description` is nullable. If empty, use `meta_description`.
- `og_image_id` is nullable. If empty, use the main image. If no main image exists, use the production fallback social image.
- `image_alt` is required for every published record with a visible image.
- `is_published` controls whether the record appears publicly.
- `published_at` must be set before a record enters the sitemap.
- `updated_at` must reflect meaningful edits for article and package freshness.
- `deleted_at` should be respected by every public query.

Seeder rules:

- Seeders must create production-shaped records, not thin placeholder rows.
- Every seeded public record must include a valid slug, meta title, meta description, image alt text, and publish status.
- Seeders must create valid relationships: trek to region, trek to category, trek to images, blog to author/category, guide to trips where relevant.
- Seeders must avoid duplicate slugs.
- Seeders must avoid fake reviews, fake ratings, fake license numbers, fake awards, fake availability, and fake legal claims.
- Seeders should include realistic content length so Lighthouse and search crawlers see complete page content.
- Seeder images must point to existing files and include width, height, MIME type, and alt text where the media table supports them.

Public query rules:

- Public controllers must only query records where `is_published = true` and `published_at <= now()`.
- Public controllers must ignore soft-deleted records.
- Slug detail pages must return `404` for unpublished, future, missing, or deleted records.
- Listing pages must not expose unpublished records through filters, search, relation counts, JSON responses, or hidden markup.
- Query scopes should be added for repeated rules, for example `published()` and `publiclyVisible()`.

Recommended model scope:

```php
public function scopePublished($query)
{
    return $query
        ->where('is_published', true)
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now());
}
```

Recommended SEO accessors:

```php
public function getSeoTitleAttribute(): string
{
    return $this->meta_title ?: $this->title;
}

public function getSeoDescriptionAttribute(): string
{
    return $this->meta_description ?: str($this->excerpt ?? $this->title)->limit(155);
}
```

## Database fields by content type

Treks and travel packages must include:

```text
title/name
slug
meta_title
meta_description
canonical_url nullable
og_title nullable
og_description nullable
og_image_id nullable
main_image_id
image_alt
is_published
published_at
updated_at
deleted_at nullable
region_id
category_id nullable
duration_days
difficulty
max_altitude_m
price_minor
currency
overview
short_summary
highlights
itinerary
inclusions
exclusions
best_season
starting_point
ending_point
activity_level
accommodation_type
meals_summary
permits_summary
map_image_id nullable
```

Destinations must include:

```text
title/name
slug
meta_title
meta_description
canonical_url nullable
og_title nullable
og_description nullable
og_image_id nullable
main_image_id
image_alt
is_published
published_at
updated_at
deleted_at nullable
intro
overview
best_season
maximum_altitude nullable
related_region
```

Blogs/articles must include:

```text
title
slug
meta_title
meta_description
canonical_url nullable
og_title nullable
og_description nullable
og_image_id nullable
main_image_id
image_alt
is_published
published_at
updated_at
deleted_at nullable
excerpt
body
author_name
author_id nullable
category_id nullable
reading_time_minutes nullable
```

Guides/team profiles must include:

```text
name
slug
meta_title
meta_description
canonical_url nullable
og_title nullable
og_description nullable
og_image_id nullable
main_image_id
image_alt
is_published
published_at
updated_at
deleted_at nullable
role
bio
languages nullable
specialties nullable
```

Static pages must include:

```text
title
slug
meta_title
meta_description
canonical_url nullable
og_title nullable
og_description nullable
og_image_id nullable
main_image_id nullable
image_alt nullable
is_published
published_at
updated_at
deleted_at nullable
body
```

## SEO 100% production checklist

A page cannot be considered production-ready for SEO unless all of these are true:

- HTTP response status is `200`.
- Page is not blocked by `robots.txt`.
- Page does not contain `noindex`.
- Page does not contain `nofollow` on the global robots directive.
- Response does not send `X-Robots-Tag: noindex`.
- Page has exactly one `<title>`.
- Page has a non-empty meta description.
- Title and meta description are unique for the page.
- Page has a canonical URL.
- Canonical URL is absolute and points to the indexable production URL.
- Page has crawlable internal links.
- Main content is rendered in HTML.
- Page has a clear visible `<h1>`.
- Links do not depend on JavaScript to become crawlable.
- Images have `alt` attributes.
- Structured data is valid JSON-LD.
- Structured data matches visible/database content.
- Sitemap includes the URL if the page is published.
- Sitemap excludes the URL if the page is unpublished, deleted, private, or redirected.
- Old duplicate URLs redirect to the canonical URL.
- Query/filter URLs have a deliberate canonical/indexing rule.
- Production content does not contain placeholder words such as `sample`, `preview`, `demo`, `test`, or `lorem ipsum` unless the actual public page is about those terms.

## Performance target rules for 95+

A 95+ Performance score requires the page to be light, cacheable, and stable. Performance should be optimized in this order: server response, LCP image, render-blocking assets, JavaScript weight, layout shift, and third-party code.

Server response:

- Use production caches: `config:cache`, `route:cache`, and `view:cache`.
- Cache stable navigation, settings, featured destinations, and footer data.
- Eager load relationships used on the page.
- Avoid N+1 queries.
- Paginate large lists.
- Add database indexes for public filters.
- Keep Time to First Byte low on production hosting.

Recommended indexes:

```text
slug
is_published
published_at
status
category_id
region_id
destination_id
created_at
updated_at
```

Images:

- Hero image must be compressed WebP or AVIF.
- Hero image must have explicit `width` and `height`.
- Hero image should use `loading="eager"` and `fetchpriority="high"` only when it is the LCP image.
- Below-the-fold images must use `loading="lazy"`.
- Use thumbnails for cards, not full hero images.
- Do not serve images larger than their displayed size.
- Store image dimensions in the database or media table.
- Generate responsive variants during upload.

CSS and JavaScript:

- Public website pages must not load admin bundles.
- Admin pages must not load website bundles.
- Avoid duplicate Vite entries.
- Split large interactive features when they are not needed on every page.
- Avoid loading sliders, editors, maps, or modal code globally unless they are used globally.
- Remove unused CSS from package-specific entries where practical.
- Keep inline scripts small.

Fonts:

- Use only required font families and weights.
- Preconnect to external font hosts if external fonts are used.
- Prefer self-hosted fonts for production if performance is critical.
- Use `font-display: swap` for self-hosted fonts.

Layout stability:

- Every image, video, iframe, and ad-like container must reserve dimensions.
- Do not inject banners above existing content after load.
- Avoid late-loading fonts that shift headings.
- Avoid client-rendering the hero title or primary CTA.

Third-party scripts:

- Do not load analytics, chat widgets, tracking pixels, or maps before consent and need.
- Load third-party scripts after the main content where possible.
- Review every third-party script in Lighthouse before production.

## Accessibility target rules for 100%

Current Accessibility score was around 92, so production must be stricter.

Required rules:

- Every page has exactly one descriptive `<h1>`.
- Headings follow a logical order.
- Every image has an `alt` attribute.
- Decorative images use `alt=""`.
- Every form field has a visible label or correct accessible label.
- Placeholder text is not the only label.
- Every icon-only button has a meaningful `aria-label`.
- No empty `aria-label` values.
- Every interactive element is keyboard reachable.
- Focus is visible on links, buttons, form fields, dropdown controls, cards, and modals.
- Dropdowns can be opened and closed with keyboard.
- Modals and drawers trap focus and restore focus on close.
- Color contrast passes WCAG AA.
- Error messages are visible and programmatically connected to fields.
- Required fields are announced to assistive tech.
- Link text describes the destination.
- Repeated links like `Read more` include hidden context or unique labels.
- Tables use proper headings when displaying tabular data.
- ARIA is not used where native HTML is enough.
- ARIA roles must match actual behavior.

Form example:

```blade
<label for="email">Email address</label>
<input id="email" name="email" type="email" autocomplete="email" required aria-describedby="email-error">
@error('email')
    <p id="email-error">{{ $message }}</p>
@enderror
```

Icon button example:

```blade
<button type="button" aria-label="Open navigation menu">
    <svg aria-hidden="true" focusable="false">...</svg>
</button>
```

Ambiguous link fix:

```blade
<a href="{{ $url }}" aria-label="Read more about {{ $title }}">Read more</a>
```

## Best Practices 100% rules

Best Practices must stay at 100 in production.

Required rules:

- Production runs on HTTPS.
- No browser console errors.
- No missing assets.
- No mixed-content HTTP assets.
- No deprecated browser APIs.
- No source map 404s.
- No JavaScript errors from missing DOM elements.
- No vulnerable front-end dependencies flagged by Lighthouse.
- All `target="_blank"` links use `rel="noopener noreferrer"`.
- Images use correct aspect ratio and natural dimensions.
- Inputs use appropriate `type` and `autocomplete` attributes.
- Production has `APP_DEBUG=false`.
- Debugbar and development tools are disabled publicly.
- Cookies use secure production settings.

Production environment rules:

```env
APP_ENV=production
APP_DEBUG=false
SESSION_SECURE_COOKIE=true
```

Recommended headers:

```http
Strict-Transport-Security: max-age=31536000; includeSubDomains
X-Content-Type-Options: nosniff
Referrer-Policy: strict-origin-when-cross-origin
Permissions-Policy: camera=(), microphone=(), geolocation=()
```

## Admin requirements for production content quality

Admin forms that create public website content must enforce Lighthouse-safe content before publish.

Required admin validations for published records:

```text
title required
slug required unique
meta_title required
meta_description required
main image required when template expects image
image_alt required when image exists
is_published boolean
published_at required when is_published is true
```

Recommended validation lengths:

```text
meta_title: 30-65 characters
meta_description: 120-160 characters
slug: lowercase, URL-safe, unique
image_alt: 8-140 characters
```

The admin publish action should block publishing if required SEO/accessibility fields are missing.

Do not allow published public records with:

- Empty meta title.
- Empty meta description.
- Empty slug.
- Missing image alt text.
- Broken image reference.
- Duplicate canonical URL.
- Unpublished parent relation.
- Soft-deleted parent relation.

## Migration checklist for real database SEO fields

When adding the production SEO fields to existing tables, use nullable fields only where the rule allows them. Backfill existing records before making strict publish validation active.

Migration pattern:

```php
$table->string('slug')->unique();
$table->string('meta_title');
$table->text('meta_description');
$table->string('canonical_url')->nullable();
$table->string('og_title')->nullable();
$table->text('og_description')->nullable();
$table->foreignId('og_image_id')->nullable()->constrained('galleries')->nullOnDelete();
$table->string('image_alt');
$table->boolean('is_published')->default(false)->index();
$table->timestamp('published_at')->nullable()->index();
$table->softDeletes();
```

If a table already has `created_at` and `updated_at`, do not add `updated_at` again. Laravel timestamps already provide it.

For existing slug columns, make sure they are unique and indexed.

## Final production acceptance rule

A public page is production-ready only when all four Lighthouse areas are satisfied together:

```text
Performance: 95+
Accessibility: 100
Best Practices: 100
SEO: 100
```

If one category drops after database integration, do not patch only the template. Check the full chain: database fields, admin validation, controller query, Blade rendering, middleware headers, Vite manifest, image files, sitemap, robots rules, and production cache.

## Mobile Lighthouse performance lessons from trek detail pages

Mobile Lighthouse is stricter than desktop because it simulates slower CPU and network conditions. A page can score high on desktop and still score low on mobile when First Contentful Paint or Largest Contentful Paint is delayed.

When mobile Performance is below target and Total Blocking Time is low, the issue is usually not JavaScript execution. Check the critical rendering path first:

```text
First Contentful Paint
Largest Contentful Paint
LCP image request timing
render-blocking CSS
font loading
server response time
```

For trek detail pages, the hero image is usually the LCP element. It must follow these rules:

- Do not use remote Unsplash, Wikimedia, or third-party URLs for the LCP image in production.
- Use local/CDN-controlled WebP or AVIF images.
- Provide mobile and desktop variants.
- Preload the exact mobile image for mobile screens.
- Preload the exact desktop image for desktop screens.
- Use `<picture>` or `srcset` so the browser does not download an oversized desktop image on mobile.
- Add `width` and `height`.
- Use `fetchpriority="high"` only on the LCP image.
- Use `loading="eager"` only on the LCP image.
- Use `loading="lazy"` on below-the-fold images.

Recommended trek detail LCP pattern:

```blade
@push('preload')
<link rel="preload" as="image" href="{{ $heroImage['mobile_url'] }}" media="(max-width: 768px)" fetchpriority="high">
<link rel="preload" as="image" href="{{ $heroImage['url'] }}" media="(min-width: 769px)" fetchpriority="high">
@endpush

<picture>
    <source media="(max-width: 768px)" srcset="{{ $heroImage['mobile_url'] }}">
    <source srcset="{{ $heroImage['srcset'] }}" sizes="100vw">
    <img
        src="{{ $heroImage['url'] }}"
        alt="{{ $heroImage['alt'] }}"
        width="{{ $heroImage['width'] }}"
        height="{{ $heroImage['height'] }}"
        loading="eager"
        decoding="async"
        fetchpriority="high">
</picture>
```

The `@stack('preload')` output must appear inside `<head>` before main CSS and scripts. Never let preload tags render before `<!doctype html>` or outside `<head>`.

Font rules for mobile performance:

- Avoid remote Google Fonts on production pages when chasing 95+ mobile scores.
- Prefer system fonts or self-hosted fonts.
- If custom fonts are required, self-host them, subset them, preload only the critical file, and use `font-display: swap`.
- Do not load many font families or many weights.
- Do not block first paint on decorative display fonts.

Large bundle rules:

If mobile Performance stays below 95 after LCP image and font fixes, split large global assets by page type.

Do not load one large public bundle for every website page if it contains unused code for:

- planner wizard
- comparison tray
- modals
- sliders
- maps
- charts
- admin behavior
- forms not present on the current page

Preferred production asset structure:

```text
website-base.scss
website-home.scss
website-trek-detail.scss
website-listing.scss
website-planner.scss
website-base.js
website-trek-detail.js
website-planner.js
website-compare.js
```

Then each Blade template should load only what it needs:

```blade
@vite([
    'packages/website/resources/website/scss/website-base.scss',
    'packages/website/resources/website/scss/website-trek-detail.scss',
    'packages/website/resources/website/js/website-trek-detail.js',
])
```

Local audit rules:

- Run Lighthouse in Incognito mode or a clean Chrome profile.
- Disable extensions before measuring.
- Do not judge production performance while Vite dev server/HMR is active.
- Run `npm run build` before measuring production assets.
- Confirm `public/hot` is not forcing dev-server assets during production-like audits.

If Lighthouse shows this warning, rerun the audit in a clean profile before making final decisions:

```text
Chrome extensions negatively affected this page's load performance.
```

Mobile performance triage order:

1. Check whether the page is using production built assets.
2. Check whether the LCP image is local, preloaded, and responsive.
3. Check whether remote fonts are delaying paint.
4. Check whether CSS is too large or duplicated.
5. Check whether JavaScript is loaded globally but unused.
6. Check server response time and database query count.
7. Check image dimensions and layout shift.

For production, a trek detail page should not ship with remote LCP image URLs, remote render-blocking fonts, or one large global script that contains every website interaction.
