# Prompt 08 — Responsive, Accessibility, SEO and Performance Pass

Read all earlier prompts and inspect the implemented homepage. This is a correction phase, not a visual redesign.

## Responsive standards

Use the project's existing breakpoint system where possible. Validate behavior at least at:

- 320px and 375px mobile;
- 640px large mobile;
- 768px tablet;
- 1024px laptop;
- 1280px desktop;
- 1440px wide desktop.

Expected transformations:

- three-column grids → two columns → one column or intentional scroll-snap;
- two-column editorial layouts → stacked content with purposeful order;
- desktop navigation → accessible mobile menu;
- comparison table → understandable horizontal scroll or cards;
- horizontal process → vertical steps;
- hero type and spacing scale fluidly;
- controls remain at least comfortable touch size;
- no clipped content, overlap or accidental horizontal page scroll.

## Accessibility checklist

- exactly one meaningful page H1;
- logical H2/H3 order;
- semantic landmarks and lists;
- skip link works;
- all interactive elements are keyboard accessible;
- visible `:focus-visible` state;
- menu/dialog focus behavior is correct;
- buttons are buttons and navigation is links;
- fields have persistent labels, errors and instructions;
- images have useful alt text; decorative images use empty alt;
- icons do not carry meaning without accessible text;
- color contrast meets WCAG AA;
- selected/error/success states do not rely on color alone;
- reduced-motion preference is honored;
- 200% zoom remains usable;
- manual carousel/slider controls have names and state.

## SEO checklist

- preserve title, description, canonical and Open Graph behavior;
- preserve or improve meaningful internal links;
- do not duplicate H1;
- article/trek links use descriptive anchor text;
- structured data is retained and factual;
- no hidden keyword stuffing;
- lazy-loaded content remains crawlable in rendered HTML where important;
- search forms use appropriate method/query parameters and index behavior.

## Performance checklist

- hero image is correctly sized and prioritized without blocking everything else;
- below-fold images use native lazy loading where appropriate;
- explicit width/height or aspect ratio prevents layout shift;
- responsive images/srcset mechanisms are used if supported by project helpers;
- modern image formats are preferred when available;
- no duplicate font or icon payload;
- avoid loading large libraries for trivial interactions;
- JS initialization is guarded when an element is absent;
- event listeners are not duplicated;
- CSS selectors remain reasonably scoped and maintainable;
- remove only proven-unused homepage assets after verifying references.

## Quality tools

Use available project checks and, when the environment supports it, browser testing/Lighthouse-like inspection. Do not claim a score you did not measure.

Fix issues found within homepage/shared-layout scope. Report unresolved issues with cause and suggested action.

