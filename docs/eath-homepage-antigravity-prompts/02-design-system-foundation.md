# Prompt 02 — Implement the Homepage Design-System Foundation

Read `00-master-context.md` and the approved audit from Prompt 01. Implement the visual foundation without yet rebuilding all homepage sections.

## Typography

Preferred font pairing:

- Display/editorial headings: `Newsreader`.
- Body, UI, labels, forms and navigation: `Inter`.

Use the project's existing font-loading convention. Prefer performant self-hosting or the established project mechanism. Do not add duplicate font requests. Define sensible fallbacks.

Font weights:

- 400 regular;
- 500 medium;
- 600 semibold.

Avoid 700–900 unless an existing logo/brand asset requires it.

Use fluid values with `clamp()`:

| Token | Mobile | Desktop | Line height |
| --- | ---: | ---: | ---: |
| Display XL | 40px | 64px | 1.05–1.08 |
| H1 | 34px | 48px | 1.10 |
| H2 | 30px | 40px | 1.15 |
| H3 | 24px | 32px | 1.20 |
| H4 | 21px | 24px | 1.25 |
| H5 | 18px | 20px | 1.30 |
| Body large | 17px | 18px | 1.65 |
| Body | 16px | 16px | 1.65 |
| Body small | 14px | 14px | 1.55 |
| Caption | 13px | 13px | 1.45 |
| Micro | 12px | 12px | 1.40 |

Use letter spacing sparingly. Uppercase eyebrow labels may use 0.08em–0.12em.

## Color tokens (E.A.T.H. Travels Logo Theme)

Define semantic CSS custom properties in the existing global SCSS foundation:

```scss
--color-primary: #0284c7;           /* Himalayan Mountain Peak Azure (Logo Peaks) */
--color-primary-hover: #0369a1;     /* Deep Peak Azure */
--color-primary-soft: #f0f9ff;      /* Glacial Sky Tint */
--color-secondary: #0c4a6e;        /* Deep Alpine Navy */
--color-accent: #ff0048;           /* Logo Airplane & Backpack Crimson */
--color-accent-hover: #be123c;     /* Deep Crimson Hover */
--color-background: #f8fafc;       /* Crisp Snow Alpine Canvas */
--color-background-warm: #f1f5f9;  /* Cool Alpine Stone Surface */
--color-surface: #ffffff;          /* Pure White */
--color-text: #0f172a;             /* Peak Charcoal / Trekker Silhouette Black */
--color-text-secondary: #475569;   /* Slate 600 */
--color-text-muted: #64748b;       /* Slate 500 */
--color-border: #e2e8f0;           /* Clean Alpine Border */
--color-success: #059669;          /* Alpine Emerald */
--color-warning: #d97706;          /* Amber */
--color-error: #ff0048;            /* Logo Crimson */
--color-focus: #0284c7;            /* Azure Focus Ring */
```

Validate text/background combinations for WCAG AA. Adjust only when necessary and document the adjustment.

Usage:

- Himalayan azure: brand identity and primary actions;
- Crimson accent: selective emphasis for key CTAs and status highlights, never every element;
- Alpine stone/snow: editorial rhythm and clean visual breathing room;
- White: primary card and container surfaces;
- Peak charcoal: long-form readability and headings.

## Spacing and layout tokens

Use a 4px-derived scale: `4, 8, 12, 16, 20, 24, 32, 40, 48, 64, 80, 96, 120`.

Define reusable tokens for:

- content container: max 1280px;
- wide visual container: max 1440px only where justified;
- editorial measure: 760–820px;
- desktop gutters: 32–40px;
- tablet gutters: 24px;
- mobile gutters: 20px;
- regular section block spacing: mobile 56–64px, tablet 72–80px, desktop 96px;
- major editorial spacing: desktop up to 120px.

Avoid arbitrary one-off gaps unless required for optical alignment.

## Shape and elevation (Global Zero Border-Radius Policy)

- **Strict universal zero border-radius**: `border-radius: 0 !important` across all components;
- controls & inputs: 0px;
- buttons: 0px;
- standard cards: 0px;
- large image cards: 0px;
- editorial visuals: 0px;
- tags, chips, badges, and pills: 0px;
- avatars and status dots: sharp square geometry (0px);
- prefer borders (`1px solid #e2e8f0`) and background contrast over shadows;
- use `box-shadow: none` for ordinary cards and sections. One subtle overlay shadow is allowed only on dropdowns/drawers.

## Buttons and links

Implement or normalize these variants using existing conventions:

- primary;
- secondary/outline;
- ghost;
- text link with directional cue;
- icon button.

Default height 44–48px; large height 48–52px; small height 36–40px. All need hover, active, focus-visible and disabled states. Touch targets must be at least 44×44px where practical.

## Images

Establish consistent aspect ratios:

- trek card: 4:3;
- destination: 4:5 or 3:4;
- editorial: 16:10;
- hero: full-width cinematic crop;
- guide/avatar: 1:1 or consistent portrait crop;
- article: 16:10.

Use authentic Nepal imagery, natural color, meaningful alt text, correct dimensions and responsive delivery. Avoid fake luxury styling, excessive HDR, extreme overlays and decorative images that compete with content.

## Motion

- micro-interactions: roughly 150–220ms;
- larger reveals: maximum roughly 300–400ms;
- animate opacity/transform rather than layout properties;
- obey `prefers-reduced-motion: reduce`;
- content must remain complete if JavaScript or animation fails.

## Implementation boundaries

Integrate tokens into the current SCSS architecture. Possible partials are `_variables.scss`, `_typography.scss`, `_buttons.scss`, and `_utilities.scss`, but do not create needless fragmentation. Keep `website.scss` as the authoritative entry and preserve current imports.

Do not globally override unrelated admin styles. Scope website-only styles correctly.

## Acceptance criteria

- tokens are defined once and reusable;
- headings/body use the approved typography consistently;
- buttons have complete interaction states;
- no existing page becomes visibly broken;
- no duplicate framework/font/icon dependency is introduced;
- Vite compiles successfully;
- report exact files changed and checks run, then stop.

