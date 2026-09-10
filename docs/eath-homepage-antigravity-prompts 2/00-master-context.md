# Prompt 00 — Master Context and Non-Negotiable Rules

You are redesigning the homepage of EATH Ways, a Nepal trekking and travel website. Work as a senior product designer, conversion strategist, Laravel Blade engineer, accessibility specialist, and front-end performance engineer.

Read this entire file before making any homepage decision. These rules remain active for every later phase.

## Product goal

Create a premium, credible and conversion-focused homepage that helps international visitors:

1. feel inspired to travel to Nepal;
2. discover suitable trekking experiences quickly;
3. compare options without information overload;
4. trust EATH's local expertise, guides and safety system;
5. begin a conversation, request a custom trip, or choose a trek.

The desired character is:

- premium, but not luxury-fashion;
- adventurous, but not chaotic;
- authentically Nepali, but internationally professional;
- editorial and photographic, but highly usable;
- conversion-focused, but never aggressive or sales-heavy.

Visual direction: National Geographic-style editorial clarity, premium outdoor-brand restraint, modern travel-booking usability, and genuine Nepal identity. Do not copy another brand.

## Existing technical context

- Framework: Laravel.
- Rendering: Blade.
- Asset pipeline: Vite.
- Styling: SCSS and any framework already present in the project.
- JavaScript: existing website JavaScript entry.
- Homepage composition: `resources/views/website/index.blade.php`.
- Existing homepage partials: `resources/views/website/pages/home/`.
- Website styles: `resources/website/scss/`, including `website.scss` and `home-page.scss`.
- Website JavaScript: `resources/website/js/website.js` and related existing modules.
- Vite already loads the website SCSS and JS entries. Inspect the real configuration before changing it.

Do not assume that the screenshot shows every file. Inspect the repository.

## Mandatory engineering rules

MUST:

- preserve the Laravel + Blade architecture;
- inspect the current route, controller, view data, models and partials before editing;
- preserve working route names, URLs, controllers, request flows and backend behavior;
- preserve dynamic database-backed treks, destinations, departures, reviews, guides, articles, prices and images wherever available;
- keep the homepage modular through existing Blade includes/components;
- reuse existing helpers, route generation, image helpers and localization conventions;
- use semantic HTML and progressively enhanced JavaScript;
- use the approved design tokens instead of arbitrary values;
- keep changes focused on the website homepage and truly shared website UI;
- make mobile, accessibility, SEO and performance first-class acceptance criteria;
- handle empty or missing datasets gracefully without broken grids or headings;
- escape untrusted content using normal Blade safety rules;
- retain analytics hooks, form actions and tracking attributes when present.

DO NOT:

- convert the website to React, Vue, Livewire or another framework;
- replace dynamic content with static demo content;
- rewrite business logic merely to support styling;
- invent routes, database fields, prices, ratings, certifications or reviews;
- rename or remove routes without proven necessity;
- add a new CSS framework or icon library when the project already has an appropriate one;
- put large scripts or styles inline in Blade files;
- create a separate card design for every section;
- turn every section into a bordered or shadowed card grid;
- use heavy gradients, glassmorphism, excessive animation or generic SaaS styling;
- add autoplay audio/video, scroll-jacking, or animation required to understand content;
- remove old files until their behavior and data usage are mapped and safely replaced.

## Conversion hierarchy

Use a clear CTA hierarchy:

1. Primary: `Plan My Trek` / `Find My Trek` / relevant trip-planning action.
2. Secondary: explore treks, destinations, compare, or view details.
3. Assisted conversion: WhatsApp or contact an expert.

Avoid showing several equally dominant CTAs in one viewport. CTA wording must match the route or action it actually performs.

## Content truthfulness

- Never fabricate claims, numbers, guide credentials, safety guarantees or social proof.
- If real content is unavailable, retain a clearly marked implementation placeholder in code or hide the dependent element gracefully.
- Use existing copy when accurate; improve wording only without changing its factual meaning.
- Use `From` pricing only if pricing semantics in existing data support it.
- Do not display ratings or review counts unless sourced from real data.

## Required working behavior

For every implementation phase:

1. read all required prompt files first;
2. inspect relevant current files;
3. state a short change plan;
4. implement only that phase;
5. run the most relevant available checks;
6. report files changed, behavior preserved, checks and blockers;
7. stop so the result can be reviewed before the next phase.

When the specification conflicts with established working project conventions, preserve working behavior and explain the smallest necessary adaptation. Do not silently ignore the specification.

## Definition of success

The completed homepage must:

- follow the exact 20-part sequence in `04-homepage-architecture.md`;
- express the visual system in `02-design-system-foundation.md`;
- implement section behavior in `05-homepage-section-specifications.md`;
- retain existing dynamic Laravel behavior;
- work at 320px through wide desktop sizes;
- support keyboard navigation, visible focus and reduced motion;
- avoid layout shift and oversized media payloads;
- pass the project's available build and automated checks;
- contain no obvious Blade, console, missing-route or missing-asset errors.

