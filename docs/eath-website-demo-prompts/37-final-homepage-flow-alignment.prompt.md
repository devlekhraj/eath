# PROMPT 37 — Final Homepage Flow Alignment and Interaction Verification

You are continuing the existing EATH Nepal trekking website implementation.

Prompts 01–36 have already been completed. Read the current project state, the
existing work log, and all approved EATH prompt/reference files before editing.
Do not restart the project, repeat completed work, or replace working features
without evidence.

## Objective

Perform a final frontend-only alignment pass so the homepage and its connected
demo journeys follow the approved user flow exactly. The result must feel like
a premium, calm Himalayan travel website that makes discovery, comparison,
custom planning and inquiry easy.

Use demo data only. Do not connect to a real database, payment provider, email
service, WhatsApp API, analytics platform or production lead system.

## Approved homepage order

The homepage must render these sections in this exact order:

1. Top Trust Bar
2. Main Header
3. Hero
4. Trek Discovery / Search
5. Upcoming Fixed Departures
6. Experience Discovery
7. Featured Journeys
8. Destination Explorer
9. Find My Trek
10. Travel By Month
11. Compare Treks
12. Why EATH
13. Traveler Stories / Reviews
14. Safety & Support
15. Custom Journey
16. How It Works
17. Meet Your Guides
18. Responsible Travel
19. Nepal Travel Guide
20. Final Conversion CTA
21. Footer

Do not reorder, remove, merge or add unrelated homepage sections.

## Required behavior by section

### 1–2. Trust bar and header

- Preserve accessible navigation, active states and keyboard operation.
- Desktop navigation may use a restrained dropdown or mega menu.
- Mobile navigation must use a usable drawer/dialog with focus handling.
- Keep the primary actions visible: Find My Trek, Compare and Plan My Trek.

### 3. Hero

- Use one clear H1 and one supporting message.
- Keep the primary action focused on discovering a journey.
- Secondary action may open Plan My Trek.
- Use a verified Himalayan image with readable overlay contrast.
- Do not use fake urgency, countdowns or unsupported claims.

### 4. Trek Discovery / Search

- Search, region, duration, difficulty and month controls must work with demo
  fixtures.
- Submit must lead to the filtered trek listing while preserving query state.
- Provide a visible Find My Trek path for visitors who do not know the trek
  name.
- On mobile, controls must stack cleanly and remain usable at 320px width.

### 5. Upcoming Fixed Departures

- Show relevant sample departures with trek, region, date, duration and sample
  status/price.
- Keep the presentation planning-oriented, not ecommerce-oriented.
- Future/current sample dates may use Plan This Date or Inquire Now.
- Past dates must show View Trek only.
- Never imply real availability, scarcity or a live booking reservation.

### 6–8. Experiences, featured journeys and destinations

- Use editorial tiles, rows or image-led compositions; do not force every item
  into a shopping grid.
- Every card/row must have a working detail link and a consistent Add to
  Compare action where appropriate.
- Keep price secondary to route, pace, duration, difficulty and experience.
- Use only centralized, verified image-manifest entries.

### 9. Find My Trek

- Open the existing planner in discover mode with a clear progress state.
- Preserve selected preferences when the visitor returns to the homepage or
  listing.
- Recommendations must use the existing deterministic demo scoring contract.

### 10. Travel By Month

- Do not navigate to a separate page when a month tab is selected on the
  homepage.
- Update the table below the tabs in place.
- Table fields: journey, region, duration, difficulty, relevant sample date or
  season, and action.
- Past month: View Trek only.
- Current month: View Trek plus Inquire Now when a sample date remains;
  otherwise show Ask About Future Dates.
- Future month: View Trek plus Inquire Now, prefilled with the selected month.
- Label all dates and prices as demo/sample data.

### 11. Compare Treks

- Add/remove/replace/clear must use the shared comparison state.
- Enforce the approved maximum of three journeys.
- The comparison tray must work from homepage, listing and detail pages.
- Explain the limit accessibly; never silently discard a selected journey.
- Continue to the full comparison page and then Plan My Trek with selected
  journeys preserved.

### 12–14. Trust, reviews and safety

- Why EATH should use concise trust points supported by available demo copy.
- Reviews must show traveler name, country, journey and clearly labeled demo
  testimonial content. Do not invent external review-platform verification.
- Safety content must be reassuring and factual, with a link to the full safety
  page and a clear contact/planning action.

### 15–20. Planning, human proof and conversion

- Custom Journey opens Plan My Trek in custom mode.
- How It Works must explain Discover → Plan Together → Confirm → Trek.
- Guides and responsible-travel sections must link to their detail pages.
- Travel Guide cards must open the correct article route.
- Final CTA must offer Plan My Trek and the demo inquiry/contact path.
- Do not claim that a demo inquiry has been sent to a real team.

### 21. Footer

- Verify every link, including legal/policy, contact, guide, travel-guide,
  destination and trek routes.
- Keep the footer clean and readable on mobile.
- Preserve existing route names and Laravel conventions.

## Cross-page flow checks

Verify these journeys end to end using demo data:

1. Homepage search → filtered treks → trek detail → Plan My Trek → review →
   simulated confirmation.
2. Homepage fixed departure → prefilled planning date → edit preferences →
   review → simulated confirmation.
3. Homepage month tab → in-place table update → View Trek or Inquire Now.
4. Homepage featured journey → Add to Compare → second journey → comparison
   page → Plan My Trek.
5. Find My Trek → preferences → deterministic recommendations → compare or
   custom planning → simulated confirmation.
6. Direct deep links, browser back/forward, refresh and empty results must
   preserve or recover state predictably.

## Visual quality requirements

- Preserve the approved Newsreader + Inter typography system and design tokens.
- Keep the existing container, spacing, breakpoint and image-ratio standards.
- Use borders, whitespace, surface changes and alignment for hierarchy.
- Ordinary cards, rows, tables, forms, inputs and sections must have no
  box-shadow.
- A subtle shadow is allowed only for a functional modal, dropdown or mobile
  drawer when a border is insufficient.
- Do not use glow, glassmorphism, text-shadow, hover elevation or drop-shadow.
- Keep visible focus outlines and support reduced motion.
- Validate at 320px, 375px, 768px, 1024px, 1280px and 1440px widths.

## Image verification

- Audit every homepage image URL and all connected page images.
- Use the central image manifest and verified direct URLs only.
- Every image needs meaningful alt text, explicit dimensions or aspect-ratio
  handling, lazy loading below the fold and a graceful fallback.
- Do not label a generic Himalayan image as an exact trek location.

## Laravel and demo-data constraints

- Preserve Blade partials/components, existing controllers and route names.
- Do not convert the frontend to React, Vue or another stack.
- Keep demo routes isolated from production routes.
- Do not replace dynamic existing values with unrelated hardcoded markup.
- Use the existing fixture/repository layer for demo content.

## Verification and handoff

Run only safe, project-approved checks. Verify:

- no Blade errors or undefined variables;
- no broken routes, href="#" links or fake buttons;
- no console errors;
- no broken image requests;
- no ordinary box-shadow usage;
- responsive layout and keyboard access;
- comparison and planner state persistence;
- preview/demo isolation from production behavior.

Update the work log with the files changed, checks run, remaining limitations
and the exact demo preview URL. Stop after this prompt; do not begin a new
feature or deploy automatically.
