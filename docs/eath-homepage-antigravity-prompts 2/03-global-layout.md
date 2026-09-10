# Prompt 03 — Global Layout, Header and Footer

Read Prompts 00–02 and the audit. Improve shared website layout elements while preserving navigation routes and dynamic menus.

## 01 Top Trust Bar

Purpose: establish local credibility before the primary navigation.

- Compact height, approximately 32–38px on desktop.
- Use only verified content, such as Nepal-based expertise, support availability or an existing contact channel.
- Keep copy short; no promotional ticker.
- Mobile may show one concise trust statement plus contact/WhatsApp action.
- Do not overload it with social icons.

## 02 Main Header

Desktop layout:

- brand/logo at left;
- clear primary navigation centered or balanced after logo;
- utility actions at right;
- one visually dominant planning CTA;
- header height approximately 72–84px;
- optional transparent-over-hero state only if contrast remains reliable;
- sticky behavior may activate after scroll if it does not cause layout shift.

Navigation content should use existing routes. Prefer clear labels such as Treks, Destinations, Experiences, Travel Guide and About; do not invent unavailable pages.

Mobile:

- compact logo;
- clear menu button with accessible name and expanded state;
- off-canvas/drawer or disclosure navigation;
- keyboard-operable close behavior;
- focus is managed and background interaction is prevented while open;
- preserve a visible planning/contact action without crowding.

Mega menus are allowed only when supported by real hierarchy and routes. Otherwise use a simple dropdown.

## Shared elements

Implement/reuse:

- content container;
- section heading pattern with optional eyebrow, title, summary and action;
- breadcrumbs for inner pages if the shared layout already supports them;
- floating WhatsApp control only when the number/action already exists;
- mobile sticky CTA only if it does not cover content, cookie controls or form actions.

## 20 Footer

Create a useful information architecture using existing routes and verified contact details:

- EATH identity and concise positioning;
- Treks;
- Plan;
- Travel Guide;
- Company;
- location/contact/WhatsApp;
- social links only when real;
- Privacy, Terms and Cancellation Policy when routes exist;
- dynamic current year.

Desktop may use four link columns. Tablet may use two columns. Mobile should use stacked groups or accessible disclosures, keeping legal/contact details visible.

## Accessibility and behavior

- one skip link to main content;
- semantic `header`, `nav`, `main`, `footer` landmarks;
- logo link has a useful accessible name;
- current page state is exposed where appropriate;
- menus work with keyboard and Escape;
- focus rings are never removed;
- all labels remain visible at 200% zoom;
- header does not obscure anchor targets.

## Acceptance criteria

- all existing links and menus still use real Laravel routes;
- no dynamic navigation data is hardcoded unnecessarily;
- desktop and mobile navigation work without console errors;
- header/footer styles use design tokens;
- homepage section work is not started in this phase;
- build relevant assets, report changes and stop.

