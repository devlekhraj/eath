# 03 — Design tokens, typography and minimal-shadow system

## Read first

Master, approved audit/work log, `references/asset-manifest.md`. Implement shared visual primitives, not complete pages.

## 1. Scope

Use `.eath-demo` as a preview theme boundary or an equivalent audited wrapper. Do not change admin globals or unapproved live website styling. Reuse existing SCSS organization; keep Vite admin entries and required plugins. Inspect Bootstrap/framework dependencies instead of assuming installation. Keep required existing JS until references prove it unused.

## 2. Font contract

Display/editorial: `Newsreader, Georgia, serif`. Body/UI: `Inter, system-ui, sans-serif`. Font weights: 400, 500, 600 only where actually used. Existing licensed/local font files first; do not block implementation on external font services. Use swap/fallback behavior and do not preload every weight.

| Token | Mobile / desktop | Font | Line height |
| --- | --- | --- | --- |
| --type-display | 40 / 64px | Newsreader 500 | 1.08 |
| --type-h1 | 34 / 48px | Newsreader 500 | 1.10 |
| --type-h2 | 30 / 40px | Newsreader 500 | 1.15 |
| --type-h3 | 24 / 32px | Newsreader 500 | 1.20 |
| --type-h4 | 21 / 24px | Inter 500 | 1.25 |
| --type-card-title | 20 / 24px | Inter 500 | 1.30 |
| --type-body-large | 17 / 18px | Inter 400 | 1.65 |
| --type-body | 16px | Inter 400 | 1.65 |
| --type-small | 14px | Inter 400 | 1.55 |
| --type-caption | 13px | Inter 400 | 1.45 |
| --type-micro | 12px | Inter 500 | 1.40 |

Use rem units; never shrink the root font size to fit content. Use semantic heading levels independently of visual classes. One H1 per page. Body copy should not exceed about 65–75 characters per line. Micro is for nonessential metadata, not important form instructions.

Suggested fluid tokens (375–1280px design range; use the caps, not new arbitrary per-section sizes):

```scss
.eath-demo {
  --font-display: 'Newsreader', Georgia, serif;
  --font-body: 'Inter', system-ui, sans-serif;
  --type-display: clamp(2.5rem, 1.878rem + 2.652vw, 4rem);
  --type-h1: clamp(2.125rem, 1.762rem + 1.547vw, 3rem);
  --type-h2: clamp(1.875rem, 1.616rem + 1.105vw, 2.5rem);
  --type-h3: clamp(1.5rem, 1.293rem + 0.884vw, 2rem);
}
```

## 3. Color tokens (E.A.T.H. Logo Color Palette)

```scss
.eath-demo {
  --color-primary: #0284c7;           // Himalayan Azure Blue (Logo Mountain Peaks)
  --color-primary-hover: #0369a1;     // Deep Peak Azure
  --color-primary-soft: #f0f9ff;      // Soft Glacial Sky Tint
  --color-secondary: #0c4a6e;        // Deep Alpine Navy
  --color-accent: #ff0048;           // Logo Airplane & Backpack Crimson Red
  --color-accent-action: #e11d48;    // Accessible Expedition Crimson
  --color-background: #f8fafc;       // Snow / Alpine Canvas
  --color-background-warm: #f1f5f9;  // Cool Glacier Stone
  --color-surface: #ffffff;          // Pure Snow White
  --color-text: #0f172a;             // Trekker Silhouette Deep Charcoal
  --color-text-secondary: #475569;   // Slate 600
  --color-text-muted: #64748b;       // Slate 500
  --color-border: #e2e8f0;           // Clean Alpine Border
  --color-control-border: #64748b;   // Slate 500
  --color-error: #ff0048;            // Logo Crimson Red
  --color-focus: #0284c7;            // Azure Mountain Focus
  --color-on-primary: #ffffff;
}
```

Color usage guidelines:
- Mountain Azure (`#0284c7`, `#2FB8FF`) represents brand identity, active routes, and primary actions. Meets WCAG AA contrast against white surfaces.
- Expedition Crimson (`#ff0048`, `#e11d48`) provides selective high-visibility emphasis for urgent CTAs, key status chips, and promotional tags.
- Alpine Snow & Stone (`#ffffff`, `#f8fafc`, `#f1f5f9`) establish crisp, airy backgrounds.
- Deep Charcoal (`#0f172a`) ensures maximum readability for typography, matching the trekker silhouette.

## 4. Spacing and geometry

Scale in pixels: 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 96, 120. Express reusable rem tokens. No arbitrary negative margins to hide alignment errors.

- Main content max: 1280px including consistent inner gutters.
- Wide editorial imagery: 1440px max when deliberately used.
- Reading column: max 800px and comfortable character measure.
- Gutters: mobile 20px, tablet 24px, desktop 32–40px.
- Normal sections: mobile 56px, tablet 80px, desktop 96px block padding.
- Major editorial section: up to 120px desktop. Compact related sections: 64–72px desktop.
- Content determines height. Do not clip headings or fix all cards to a text-height that truncates essential content.

**Universal Zero Border-Radius Policy**:
- Strict `border-radius: 0 !important` across all components.
- Controls: 0px; cards: 0px; photos: 0px; badges/chips: 0px; pills: 0px (all rounded corners completely eliminated).
- Button min-height: 48px default, 52px prominent, 44px compact interactive.
- Icon sizes: 16/20/24px; choose one installed icon system or small reusable inline SVGs.

## 5. No-shadow policy

Normal cards, filter panels, planner sections, sticky booking panels and standard header use **box-shadow: none** within their owned component styles. Depth comes from whitespace, border, surface and image composition. Do not add filter drop-shadow, text glow or hover elevation.

Only functional overlay dropdown/dialog/drawer may use one shared token: `0 8px 24px rgb(29 36 33 / 0.10)`, if a border is insufficient. Document each exception. Focus uses `outline: 2px solid` with offset; on dark backgrounds use a contrasting light outline. Do not globally disable shadow-based focus from unrelated components.

## 6. Components and states

Build theme-level patterns for buttons (primary/outline/ghost/text/icon), links, badges, persistent labels, inputs/selects/textareas, checkboxes/radios, errors, section headings, dividers, facts/metadata and banners.

Each interactive control has hover, active, focus-visible, disabled and busy states. Link vs button semantics follow actual navigation vs action. No nested links/buttons in clickable cards. Card hover can adjust border or text color; no hover-only content.

## 7. Responsive and motion

Test320/375/640/768/1024/1280/1440px. Usual grids3→2→1; editorial splits stack; drawer replaces desktop menu; comparison scroll stays inside its region. Respect content order and min-width:0 in grids. Reduced-motion disables nonessential transitions; ordinary transitions150–200ms. No content-hidden reveal animations.

## Acceptance

Create a local demo style review view if useful, gated with preview. Inspect long titles, multiple-line buttons, validation, 200% zoom and dark focus. Check no shadow outside allowed overlays, no font/icon duplicates and no admin regressions. Compile the existing Vite pipeline and report actual results.
