# EATH Demo — Luxury UI Refinement, Responsive Repair and Verified Images

You are working inside my existing Laravel project. This is a visual refinement phase for the fixture-based demo website. Do not convert the application to React, Vue, Next.js or another frontend stack.

Read the existing instructions in `docs/eath-website-demo-prompts/` before changing code, especially the master rules, design system, shared components, homepage, listing, detail, comparison, planner, asset manifest and acceptance references. Inspect the repository and current git diff first. Preserve unrelated user changes.

## Objective

Make the complete demo website feel like a clean, premium Himalayan travel brand:

- luxury travel presentation without excessive decoration;
- editorial typography and generous whitespace;
- strong, authentic-looking Himalayan imagery;
- visually guided discovery rather than ecommerce shopping;
- excellent desktop, tablet and mobile behavior;
- clear journey from discovery to comparison to Plan My Trek;
- consistent visual language across every demo page;
- no ordinary box-shadow-heavy interface;
- every image URL verified and working.

Do not redesign only one page in isolation. The refinement must cover the homepage and every demo page using the shared components and image manifest.

## Scope of pages

Inspect and refine all available demo routes, including:

```text
/demo
/demo/treks
/demo/treks/{slug}
/demo/destinations
/demo/destinations/{slug}
/demo/experiences
/demo/experiences/{slug}
/demo/when-to-go
/demo/when-to-go/{month}
/demo/compare-treks
/demo/plan-my-trek
/demo/departures
/demo/travel-guide
/demo/travel-guide/{slug}
/demo/about
/demo/guides
/demo/guides/{slug}
/demo/traveler-stories
/demo/traveler-stories/{slug}
/demo/safety
/demo/responsible-travel
/demo/contact
/demo/faqs
/demo/privacy
/demo/terms
/demo/booking-conditions
/demo/cancellation
/demo/cookies
```

Use the actual audited paths if they differ. Do not create duplicate routes or alter production routes.

## Phase 1 — Audit before editing

Inspect:

1. All demo Blade views and partials.
2. Existing homepage and trek listing/detail layouts.
3. Existing SCSS imports, breakpoints, variables and framework usage.
4. Existing JavaScript modules and event listeners.
5. All image references in Blade, PHP, SCSS, JavaScript and fixture files.
6. Existing production images accidentally used by demo pages.
7. Existing placeholder, broken, duplicated or stretched images.
8. Existing route and CTA behavior for search, compare and planning.
9. Header, footer, filters, cards, buttons, planner steps and detail-page side panels.
10. Current behavior at 320px, 375px, 768px, 1024px, 1280px and 1440px if browser inspection is available.

Before implementation, return an audit table:

| Page/section | Current layout problem | Current image source | Responsive problem | Planned refinement |
| --- | --- | --- | --- | --- |

Then continue with implementation in this same phase unless a required project decision is genuinely blocked.

## Phase 2 — Apply the luxury visual system

Use the existing design-system tokens. Keep the following visual decisions consistent everywhere:

### Typography

- Newsreader for editorial/display headings.
- Inter for body text, forms, buttons, navigation and metadata.
- Use 400, 500 and 600 weights only where needed.
- Use fluid `clamp()` typography rather than separate arbitrary sizes.
- One semantic H1 per page.
- H2/H3 hierarchy must be meaningful even when the visual size changes.
- Do not make every heading uppercase.
- Keep article/detail reading width close to 760–820px.

### Color

Use the authentic E.A.T.H. Travels logo tokens:
- Himalayan Mountain Peak Azure (`#0284c7`, `#2FB8FF`): Primary brand color for headings, interactive links, active states, and alpine borders.
- Expedition Airplane & Backpack Crimson (`#ff0048`, `#e11d48`): High-contrast accent color for CTA buttons, promotional chips, and badges.
- Deep Alpine Navy (`#0c4a6e`): Secondary tone for dark footers, hero gradient scrims, and dark structural accents.
- Trekker Silhouette Deep Charcoal (`#0f172a`): Body and heading typography.
- Alpine Snow & Stone (`#ffffff`, `#f8fafc`, `#f1f5f9`): Clean, luminous surfaces and canvas.
Do not introduce random colors in individual views. Verify real foreground/background combinations for readable contrast.

### Spacing

Use the established 4px-derived scale and consistent containers. Align major page content to the same maximum width and horizontal gutters. Use section whitespace to create luxury and calm. Remove arbitrary margins that compensate for inconsistent component structure.

### Shape & Global Zero Border-Radius

- **Strict universal zero border-radius**: `border-radius: 0 !important` across all elements.
- Controls, inputs, buttons, search bars: 0px.
- Standard cards, teaser cards, modal windows: 0px.
- Editorial images, banners, gallery cards: 0px.
- Tags, badges, status chips, pills: 0px.
- Avatars and indicator dots: square 0px geometry (no circular 50% radii).
- Architectural, sharp, luxury clean-cut edges only.

### Box-shadow rule

Use `box-shadow: none` for ordinary:

- trek rows;
- destination cards;
- experience tiles;
- article cards;
- guide cards;
- traveler-story cards;
- planner groups;
- comparison tables;
- filter sections;
- booking summaries;
- normal inputs;
- standard header/footer surfaces.

Create hierarchy using whitespace, borders, warm/white surface changes, typography, image composition and alignment.

A single subtle shadow is allowed only for a functional dropdown, modal, dialog or mobile navigation drawer when a border does not provide enough separation. Do not use glow, text-shadow, `filter: drop-shadow`, glassmorphism or hover elevation. Keep visible keyboard focus with an accessible `outline`; do not remove focus indicators to satisfy the no-shadow requirement.

## Phase 3 — Refine the trek listing specifically

The `/demo/treks` page must use the merged layout:

```text
Editorial introduction
        ↓
Journey-type selector
        ↓
Dynamic featured journey
        ↓
Region navigation
        ↓
Editorial journey list
        ↓
Compare Treks
        ↓
Plan My Trek
```

Do not use an ecommerce product grid as the primary experience.

### Editorial introduction

- Breadcrumbs.
- H1 such as `Find Your Nepal Journey`.
- Short explanation of choosing by time, pace and interests.
- `Find My Trek` action.
- Clear demo-data disclosure.

### Journey-type selector

Use the six fixture categories:

```text
Iconic Mountains
Quiet Trails
Cultural Journey
Short Escape
Photography
Custom Journey
```

Use accessible buttons or links with selected state. Selecting a category changes the featured journey and matching list deterministically using the shared repository. `Custom Journey` opens Plan My Trek in custom mode. The selector must work with keyboard and without color alone.

### Featured journey

Use a large image/content split. Show region, name, short description, duration, difficulty, maximum altitude, sample months and secondary illustrative price. Actions:

```text
Explore Journey
Add to Compare
```

Price must remain secondary. Do not use Add to Cart, Buy Now, Sale or Checkout language. If no matching trek exists, offer Adjust Preferences and Continue with Custom Trip.

### Journey list

Use large editorial rows rather than a dense shopping grid. Each row includes image, region, trek name, short description, duration, difficulty, altitude, sample months, illustrative price, View Journey and Add to Compare. Desktop rows may be horizontal; mobile rows stack. Preserve readable text and enough image area.

Filters should be a calm planning tool: region, duration, difficulty, month and budget. Use a compact horizontal/filter-drawer treatment rather than a heavy shopping sidebar. Recommended sorting is not price-first.

## Phase 4 — Refine all other pages consistently

Apply the same luxury system while preserving each page's role:

- Homepage: inspirational sequence with alternating image-led, functional and editorial sections.
- Trek detail: information-rich planning page with hero, facts, overview, itinerary, sample departures, logistics, safety, gallery, FAQs, related treks and planning CTA.
- Compare: readable aligned comparison, not product checkout.
- Plan My Trek: calm guided form with visible progress and transparent recommendations.
- Destinations: editorial regional exploration.
- Experiences: interest-based discovery.
- Months: seasonal planning structure.
- Departures: sample date planning, not real inventory urgency.
- Travel Guide/articles: high-quality reading layout.
- Guides/stories: human editorial content with sample disclosures.
- Safety/responsibility: restrained trustworthy information layout, no exaggerated claims.
- Contact/FAQ/policies: simple reading and form layouts.
- Error/empty states: useful recovery actions with no alarming visual overload.

Do not force every page into the same card grid. Use a mix of split layouts, rows, editorial columns, tables, accordions, image bands and whitespace.

## Phase 5 — Update all demo images

Create or update one central manifest at the audited project location, preferably:

```text
resources/demo/website/image-manifest.php
```

All demo image URLs must be defined there. Remove scattered image URLs from Blade, SCSS, JavaScript and fixture code where the manifest can replace them.

Use curated direct URLs from a publicly usable source such as Unsplash or Wikimedia Commons. Do not use random endpoints, unverified hotlinks or URLs copied without a source/license note. Do not invent a URL merely because it looks plausible.

Each manifest entry includes:

```php
[
    'url' => 'https://images.unsplash.com/...',
    'alt' => 'Himalayan mountain landscape with a trekking trail',
    'width' => 1600,
    'height' => 1000,
    'aspect_ratio' => '16:10',
    'focal_point' => 'center',
    'source' => 'Unsplash',
    'license_note' => 'Public demo image under the source license',
    'is_demo' => true,
]
```

Create mappings for:

```text
hero-home
homepage-featured-journey
homepage-safety
homepage-custom-trip
homepage-responsible-travel
homepage-travel-guide
trek-t-ebc
trek-t-abc
trek-t-langtang
trek-t-mardi
trek-t-gokyo
trek-t-manaslu
trek-t-khopra
trek-t-mustang
region-everest
region-annapurna
region-langtang
region-manaslu
region-mustang
experience-mountain-scenery
experience-cultural-trails
experience-quiet-trails
experience-short-treks
experience-photography
experience-iconic-routes
guide-demo-01
guide-demo-02
guide-demo-03
story-demo-01
story-demo-02
story-demo-03
article-seasons
article-packing
article-altitude
article-compare
article-culture
article-logistics
about-hero
safety-hero
responsible-travel-hero
contact-hero
faq-hero
```

Use Himalayan landscapes, trails, mountain villages and culturally appropriate travel imagery. A generic image must have generic alt text. Do not label a generic Himalayan photograph as an exact Everest Base Camp or Annapurna Base Camp photograph. Do not use identifiable real people as fictional guides or fictional traveler testimonials; use neutral, silhouette or landscape placeholders.

### Mandatory URL verification

For every manifest entry:

1. Verify the URL returns a successful image response.
2. Verify the content type is an image.
3. Verify it is not a random image endpoint.
4. Verify the image loads in the demo page.
5. Verify it has dimensions and stable aspect ratio.
6. Verify it has correct alt text.
7. Record source and license note.
8. Keep a local fallback for failure.

If remote access is unavailable, do not claim verification. Record the URL as pending and use a local labeled fallback until it can be checked. Do not leave a broken image in the UI.

## Phase 6 — Image rendering and performance

Every image component must:

- read from the manifest;
- provide alt text;
- provide width and height or a stable aspect ratio;
- use the actual appropriate crop/focal point;
- prioritize only the above-the-fold hero image;
- lazy-load below-fold images;
- use responsive variants only when real variants exist;
- handle failed image loading without an infinite error loop;
- preserve layout when image loading fails;
- avoid loading a full-resolution image into a small card;
- avoid duplicate requests and duplicate image URLs where inappropriate.

Do not use JavaScript to make important image or content sections crawlable. Do not add a gallery/slider library only for decoration.

## Phase 7 — Responsive repair

Test and fix at:

```text
320px
375px
640px
768px
1024px
1280px
1440px
```

Check:

- no horizontal overflow;
- no clipped text or overlapping controls;
- long trek names and article titles wrap correctly;
- images preserve intentional crops;
- buttons do not become unreadable or overflow;
- filters become accessible drawers or stacked controls;
- comparison remains readable through contained horizontal scrolling;
- planner progress and form errors remain usable;
- sticky actions never cover content or footer links;
- header/mobile navigation opens, closes and returns focus correctly;
- 200% zoom and keyboard navigation work;
- reduced-motion preference is respected.

Use CSS Grid/Flexbox and content-driven heights. Avoid fixed heights that truncate content. Set `min-width: 0` where grid children need to shrink. Reserve safe-area space for mobile fixed actions.

## Phase 8 — Functional regression

Verify all important paths still work:

```text
Homepage search → trek listing
Journey category → matching journeys
Region/month → filtered results
Trek card → trek detail
Add to Compare → comparison tray/page
Compare → Plan This Trek
Find My Trek → planner
Custom Journey → custom planner
Sample departure → prefilled planner
Planner → recommendations
Recommendations → detail/compare
Planner → review → simulated confirmation
Article → trek/destination/planner
Contact → simulated local confirmation
```

No demo action may send an email, WhatsApp message, payment request, booking, lead or CRM record. Preserve the demo disclosure and existing `/demo` isolation.

## Phase 9 — Verification report

Run the actual available Laravel/Vite/lint/test checks. If browser inspection is available, inspect representative desktop and mobile pages. Do not invent performance scores or claim every URL works without checking.

Return:

1. Audit findings.
2. Files changed.
3. Final page/component image mapping.
4. Every image URL checked and its result.
5. Any pending URL or fallback.
6. Responsive viewports checked.
7. Box-shadow exceptions, if any.
8. Functional journeys verified.
9. Commands run and real results.
10. Remaining content or asset work.

Do not migrate to real database data in this phase. Do not deploy or alter production routes. Stop after the report.
