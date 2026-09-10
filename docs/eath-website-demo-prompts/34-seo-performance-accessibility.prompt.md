# 34 — Cross-site accessibility, SEO foundations and performance

## Read first

Master, 03, route map, asset reference and acceptance matrix. This is a measured correction pass across all implemented pages, not a new design direction.

## 1. Demo indexing vs future SEO

All preview HTML responses must have demo-only `noindex` metadata or equivalent X-Robots-Tag. Check disabled routes remain gated. Noindex is not a privacy/security boundary; don't publish this demo simply because the tag exists. Google must be able to crawl a public page to see its noindex directive, so robots.txt blocking is not a substitute. Do not edit production robots/sitemap settings for this preview. [Google noindex documentation](https://developers.google.com/search/docs/crawling-indexing/block-indexing)

Despite noindex, build sound templates: unique page titles/descriptions, one H1, semantic hierarchy, truthful descriptive internal links, crawlable initial HTML, canonical helper restricted to the actual preview origin/path and safe Open Graph assets. Do not point every detail canonical to homepage. Draft/review/confirmation/contact data must not leak into metadata. Search/filter canonical strategy for a future public site is a later decision; noindex remains active here.

Suppress Product/Offer/Review/AggregateRating/FAQ rich-result payloads from fictional fixtures. Breadcrumb/WebPage markup is optional only if it truthfully represents preview navigation. Structured data must reflect actual page content and not misrepresent fictional reviews or business claims; correct syntax does not guarantee search features. [Google structured-data policies](https://developers.google.com/search/docs/appearance/structured-data/sd-policies)

## 2. Accessibility review

Target usable WCAG AA-oriented implementation, but do not claim formal conformance from one automated scan. Normal text contrast minimum 4.5:1; qualifying large text3:1. Test actual foreground/background combinations without rounding a failing result upward. The old muted-gray/original-rust combinations require care;03 provides safer alternatives. [W3C contrast guidance](https://www.w3.org/WAI/WCAG22/Understanding/contrast-minimum.html)

Manually check skip link, landmarks, one H1, logical headings, form labels/descriptions/errors, keyboard order, visible outline focus, menu/dialog focus return/Escape, expanded states, comparison table headers, horizontal scroll access, live-region announcements, image alt and reduced motion. Site control target is44px where practical; this is a design target, not a blanket statement of every WCAG minimum. Test200% zoom and text reflow at 320px. Check dark surfaces have contrasting focus outlines. Never remove a focus indicator to satisfy the no-shadow request.

## 3. Performance review

Optimize actual production-built preview assets, not dev-server network payloads. Check likely LCP image: appropriate dimensions, responsive variants if real, no lazy load, selective priority. Lazy-load below-fold imagery; reserve sizes to prevent movement. Do not preload every image/font or fabricate srcset paths. Load only used font weights; fallback doesn't block content. No redundant CSS frameworks, SPA runtime or animation/carousel package for simple features. Existing admin dependencies stay untouched and must not be loaded by the demo unnecessarily.

Core Web Vitals reference goals are LCP<=2.5s, INP<=200ms and CLS<=0.1 at the 75th percentile of actual visits, separated by device category. A local lab run is diagnostic, not proof of field performance or an SEO ranking guarantee. [Web Vitals definitions](https://web.dev/articles/vitals)

Project-specific starting budgets (not official standards): incremental demo JS<=100KB compressed, initial demo CSS<=100KB compressed, mobile hero roughly<=300KB where acceptable quality permits, initial viewport media/font transfer around<=1MB. Measure, document and adjust only with a reason; don't destroy photography quality or accessibility to hit a number. No paid third-party analysis service needed.

## 4. Security and isolation review

Check template escaping, safe attribute/JSON serialization using existing Laravel conventions, no raw untrusted HTML, query/ID enums, no open redirects, CSRF on POST, draft ownership/session TTL, idempotent simulated submit, no PII in persistent storage/logs/URLs, no production DB/mail/job/HTTP side effects. Validate money/IDs server-side. Don't accept hidden fields as price authority. Demo-only environment gate also protects POSTs and fixtures.

## 5. Required evidence

Use installed tests/linters/build tools and available browser tooling. Do not run an installation via npx or change dependency versions to obtain a score without task-relevant justification/approval. Record measured pages, viewports, test configuration and failures; do not invent Lighthouse, accessibility or field metrics.

Inspect home/listing/detail/compare/planner plus every distinct editorial template at 320, 375, 640, 768, 1024, 1280, 1440px with representative samples. Record screenshots for at least home, detail, compare, planner desktop/mobile. Fix in-scope regressions, update log and stop.
