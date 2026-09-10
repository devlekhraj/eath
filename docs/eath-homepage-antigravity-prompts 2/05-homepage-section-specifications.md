# Prompt 05 — Authoritative Homepage UI Specifications

Read Prompts 00, 02 and 04. This specification controls layout, hierarchy and behavior. Use real project data and routes.

## Shared section rules

- Every section needs one clear purpose and one dominant visual idea.
- Use alternating white, warm and image-led backgrounds to create rhythm.
- Do not wrap every section in a rounded container.
- Section headings should generally include an optional eyebrow, concise title and a maximum two-line introduction.
- Prefer descriptive link text over repeated `Learn more` where context is unclear.
- Keep body copy scannable; do not invent long marketing paragraphs.
- Use authentic, optimized images and consistent aspect ratios.

## 03 — Hero

Purpose: inspire confidence and provide the fastest path into trip discovery.

- Full-width cinematic Nepal image with a safe focal point across breakpoints.
- Content aligned within the main container; desktop copy width about 620–720px.
- Short eyebrow, emotionally clear headline, one supporting sentence.
- Primary CTA: planning/discovery action.
- Secondary CTA: explore treks or talk to an expert.
- Add only a restrained trust cue supported by real information.
- Use a controlled overlay for text contrast; do not make the entire image muddy.
- Desktop height approximately 680–780px including header context; mobile roughly 560–680px depending on content.
- Do not place the full multi-field search inside a floating hero card. Search has its own section immediately below.

## 04 — Trek Discovery / Search

Purpose: let visitors express intent quickly.

- A full-width functional section, visually connected to but separate from the Hero.
- Suggested fields only when supported: destination/region, duration, difficulty, travel month or experience.
- One strong `Search Treks` action and an optional `View all treks` link.
- Labels must remain visible; placeholders do not replace labels.
- Desktop fields may form one horizontal row; tablet wraps; mobile stacks.
- Preserve query parameter and route conventions from the current system.
- Validation and empty results must be understandable.
- Do not create a fake search that submits nowhere.

## 05 — Experience Discovery

Purpose: browse by traveler motivation rather than geographic knowledge.

- Use 4–6 real experience categories such as trekking, cultural journey, wildlife, peak/climbing or family/private only when routes/data exist.
- Image-led tiles with readable title and concise cue.
- Desktop 3–4 columns depending on count; tablet 2; mobile horizontal snap or 1–2 columns.
- Entire card may be clickable with one accessible link; avoid nested competing links.

## 06 — Featured Treks

Purpose: present the strongest products early.

- Section heading plus `View all treks` action.
- Desktop 3 cards; tablet 2; mobile 1 or accessible horizontal snap.
- Card order: image, verified badge if applicable, region, title, duration/difficulty/key metric, price semantics if valid, CTA.
- Preserve existing trek route, image and pricing helpers.
- Use at most 3–4 compact metadata items.
- Avoid equal visual weight for every fact.
- Fixed departures may appear as a verified availability cue when existing logic supports it.

## 07 — Destination Explorer

Purpose: provide visual geographic discovery.

- Use larger editorial image tiles rather than duplicating TrekCard.
- Prioritize destinations/regions supported by current data.
- Desktop may use a deliberate asymmetric grid; tablet 2 columns; mobile vertical or snap layout.
- Show destination name and a truthful count/summary only when data exists.
- Maintain consistent overlay readability.

## 08 — Find My Trek

Purpose: high-priority guided conversion for visitors unsure what to choose.

- Distinct split layout: strong visual on one side, concise interactive proposition on the other.
- Explain that a short set of preferences leads to suitable trips.
- Surface preference cues such as dates, duration, fitness, interests and comfort without pretending the full engine exists if it does not.
- Primary CTA starts an existing quiz/planner/inquiry flow.
- If no guided tool exists, route to a well-structured inquiry instead of implementing a nonfunctional mock tool.

## 09 — Travel By Month

Purpose: help visitors answer seasonality questions visually.

- Accessible month selector with 12 months or season grouping based on real content.
- Selected state must not rely on color alone.
- Update a concise panel of suitable regions/treks and conditions only from real data/content.
- Use buttons/tabs with keyboard behavior where interaction is present.
- Without structured month data, provide route-based cards or links rather than fabricated suitability scores.

## 10 — Compare Treks

Purpose: reduce decision friction among popular alternatives.

- Compare 2–3 real treks using consistent fields.
- Useful fields: duration, difficulty, maximum altitude, region, best months, accommodation and price only when available.
- Desktop: compact comparison table or aligned columns.
- Mobile: horizontally scrollable table with clear affordance or stacked comparison cards.
- Mark differences visually but accessibly.
- CTA: open full comparison or select/view a trek.
- Never invent missing metrics.

## 11 — Why EATH

Purpose: communicate credible differentiation.

- 3–5 concise proof points, not generic slogans.
- Examples only if verified: local specialists, private/custom planning, transparent support, experienced guides, responsible practice.
- Use minimal icons or small editorial details, not a heavy card grid.
- Absorb useful verified content from `landing-tag-lines` here when appropriate.

## 12 — Reviews / Traveler Stories

Purpose: provide human social proof.

- Use real review/story content and attribution.
- Prefer one featured story plus two supporting stories or a simple 3-card composition.
- Show rating/source only if verifiable.
- Quote excerpts should be short and escaped safely.
- Avoid auto-rotating carousels. Manual controls must be keyboard accessible.
- If no valid reviews exist, use a photo-led traveler-story path or omit dependent cards gracefully.

## 13 — Safety & Support

Purpose: resolve risk concerns before custom-trip conversion.

- Editorial split section with a strong authentic image and structured content.
- Group content under preparation, on-trek support and emergency response.
- Mention acclimatization, monitoring, trained guidance, communication or rescue coordination only when operationally true.
- Link to a real safety page or planning contact.
- Do not promise absolute safety or guaranteed rescue outcomes.

## 14 — Custom Trip

Purpose: convert visitors whose ideal itinerary is not a standard package.

- Large visual plus focused copy.
- Explain customization around dates, pace, interests, budget and comfort.
- Primary CTA: `Build My Trip` or the actual existing custom-trek action.
- Preserve current custom-trek form/modal/route behavior.
- Keep the section distinct from Find My Trek: Find My Trek helps choose; Custom Trip helps tailor.

## 15 — How It Works

Purpose: make the next steps feel simple.

- Four steps: Discover, Plan Together, Book, Arrive/Trek.
- Use numbered steps and concise explanations.
- Desktop horizontal progression; mobile vertical progression.
- Use CSS flow cues without inaccessible decorative complexity.
- CTA: start planning.

## 16 — Meet Your Guides

Purpose: humanize the company and demonstrate local expertise.

- Use 3 real guide/team profiles when available.
- Consistent portrait crop, name, role and one useful credential/experience line if verified.
- Link to team/guide details if routes exist.
- Do not fabricate guide identities or credentials.
- Mobile may use an accessible snap row.

## 17 — Responsible Travel

Purpose: explain the positive impact and operating values.

- Three themes: local communities, mountain environment and porter/team welfare, only with accurate copy.
- Prefer editorial columns or image/text modules over generic icon cards.
- Link to deeper policy/content where available.
- Preserve useful content and routes from the current responsible-tourism partial.

## 18 — Nepal Travel Guide

Purpose: support SEO, education and trip confidence.

- Use 3 recent or strategically important real articles.
- Card: optimized image, category/date if useful, title, short excerpt and descriptive link.
- Suggested topics: best time, packing, altitude, visa/permits—but only use actual articles/routes.
- Use correct heading hierarchy and structured links.
- CTA: explore the complete Nepal travel guide.

## 19 — Final Conversion CTA

Purpose: one decisive next step after the visitor has enough information.

- Emotionally strong but concise closing section.
- Headline such as `Ready for Nepal?` if consistent with brand voice.
- One sentence: the journey begins with a conversation/planning step.
- Primary CTA: `Plan My Trek`.
- Secondary assisted CTA: WhatsApp/contact using a verified action.
- Use a strong forest or photographic background with accessible contrast.
- Do not add another complex form here.

## 01, 02 and 20

Implement Top Trust Bar, Main Header and Footer according to `03-global-layout.md` and keep them in the overall numbered journey.

