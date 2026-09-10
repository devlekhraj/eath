# EATH — Complete Laravel Demo Website Prompt Pack

Edition: full-site demo, 8 September 2026. For Codex and Antigravity.

## 1. What this pack does

Builds a connected traveler-facing Laravel Blade website: homepage, search, trek detail, comparison, guided planner, recommendations, request review, simulated confirmation, destinations, experiences, months, departures, articles, company/team/stories, safety, responsibility, contact, FAQ, policies and recovery states.

Everything shown in the demo reads from shared fixtures. This is a specification and executable instruction pack, not finished Laravel source code. Do not interpret possession of these files as evidence that the website was implemented or tested.

## 2. Installation

1. Extract this archive.
2. Copy the `eath-website-demo-prompts` folder to your existing Laravel project's `docs/` directory.
3. The final path must be `docs/eath-website-demo-prompts/README.md`.
4. Open the actual Laravel project root in Codex or Antigravity.
5. Start with [START-CODEX.md](START-CODEX.md) or [START-ANTIGRAVITY.md](START-ANTIGRAVITY.md).
6. After reviewing the read-only audit, use [RUN-SEQUENCE.md](RUN-SEQUENCE.md), one phase at a time.

Do not overwrite the project-root `AGENTS.md` or existing editor rules. These are task documents, not an installable skill or a framework-specific agent configuration.

## 3. Relationship to the previous pack

This pack supersedes the earlier homepage-only instructions **for this demo task only**. Leave `docs/eath-homepage-antigravity-prompts/` and completed work intact, but do not ask an agent to obey both packs. The old rule requiring production database data is intentionally replaced by this pack's fixture-only demo boundary. The original homepage's 20-section order and Laravel architecture remain binding.

## 4. Important scope decisions

- Use the existing Laravel + Blade + Vite + SCSS stack. Detect installed versions; do not upgrade.
- In an existing website, mount this preview under `/demo` with route names prefixed `demo.`. Existing public routes continue unchanged. Do not switch the real homepage to fixtures or publish the demo without a separate request.
- Enable preview routes only in local/testing or an explicitly authorized isolated demo environment. The feature flag must default off outside the intended environment.
- Fixtures are local PHP/JSON data, never production Eloquent records. Do not seed or migrate the application database.
- English UI, one currency: USD. Amounts, itineraries, conditions and dates are illustrative, not quotes or advice.
- Reviews, guide biographies and traveler stories are conspicuously fictional samples. Never imply verified social proof.
- No payment gateway, login, CRM, actual availability reservation, email, WhatsApp delivery, marketing pixels or live map service.
- No box-shadow for ordinary cards, sections, inputs or side panels. Preserve focus indicators using CSS outline.

## 5. How to execute safely

`00` is the master reference. `01` is a read-only audit. `02`–`35` are implementation/verification phases. Execute one requested file, read its references, verify the result, update `WORK-LOG.md`, then stop. Do not automatically run the next phase. Do not repeat completed implementation when switching tools.

Create `WORK-LOG.md` from [WORK-LOG.template.md](WORK-LOG.template.md) only after the audit when implementation is approved. Initially the audit can be returned in chat; subsequent agents should read the approved report in the log. Save this log beside these instructions, not inside public assets.

The route map and data schemas are authoritative contracts. Page prompts may add presentation details, not independently redefine IDs, filters, prices or planner behavior.

## 6. Completion means

All named pages render from fixtures; all internal CTAs lead to real demo destinations; search, comparison and planner work end-to-end; sample submissions stay local; direct access and empty states are handled; build and automated checks are honestly reported; mobile and keyboard journeys have been inspected. Missing project dependencies or protected operations are reported, not bypassed.

Only the prompt archive has been created in this conversation. Website implementation happens when you execute these prompts in your Laravel repository.

