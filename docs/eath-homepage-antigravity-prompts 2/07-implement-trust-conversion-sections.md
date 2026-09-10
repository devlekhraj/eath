# Prompt 07 — Implement Homepage Sections 11–20

Read Prompts 00, 02, 03, 04 and 05, plus the approved results of Prompt 06. Implement the trust, personalization, human, education and conversion half.

## Scope and exact order

11. Why EATH
12. Reviews / Traveler Stories
13. Safety & Support
14. Custom Trip
15. How It Works
16. Meet Your Guides
17. Responsible Travel
18. Nepal Travel Guide
19. Final Conversion CTA
20. Footer

Maintain sections 01–10 exactly in their approved positions.

## Required workflow

1. Reuse/refactor current `landing-why-choose-us`, `landing-custom-trek`, `landing-how-we-work` and `landing-responsible-tourism` partials.
2. Create missing partials according to Prompt 04.
3. Preserve useful gallery/tagline content by moving it into an approved section before retiring a standalone include.
4. Use only real reviews, guides, articles, safety claims, contact details and links.
5. Build graceful conditional states for absent collections.
6. Keep repeated UI patterns reusable and consistent with Phase 06.
7. Finish `index.blade.php` with all homepage partials in the exact locked sequence.

## Section differentiation

- Why EATH: concise proof, minimal ornament.
- Reviews: human voice and photography.
- Safety: authoritative editorial split.
- Custom Trip: personalized conversion.
- How It Works: simple process.
- Guides: real people.
- Responsible Travel: operating values and impact.
- Travel Guide: educational/SEO content.
- Final CTA: one decisive action.

Do not solve all sections with the same three-card pattern.

## Content requirements

- Preserve factual meaning when rewriting copy.
- Mark any missing content need in the report, not as invented public-facing text.
- Do not show fake star ratings, review platforms, years of experience or certifications.
- WhatsApp, phone and email actions must use verified existing values/config.
- Avoid absolute claims such as `100% safe` or `best in Nepal` without substantiation.

## Verification

Run relevant build and application checks. Test Blade conditionals with populated and empty data where practical. Check that removed/absorbed old includes no longer leave unused homepage-only styles or JavaScript; remove only code proven unused and limited to this redesign.

Report files changed, preserved behaviors, checks, missing real content and any intentionally deferred work. Stop after this phase.

