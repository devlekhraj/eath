# Modal Architecture Rules Documentation

**Date:** 2026-09-14 15:02 NPT

## Summary

Added mandatory architectural rules for modal form components to `.agents/rules/modal.md` and a cross-reference section in `AGENTS.md`. All future modals must live under `modal-form/{entity}/` and be invoked via `useGlobalModal()`.

## Detailed Changes

### `.agents/rules/modal.md`
- Added new **Section 0: Architecture — File Location & Invocation Rules** before the existing template/styling sections.
- Subsection A: Modal form file location convention (`packages/admin/resources/admin/modal-form/{entity}/`).
- Subsection B: `useGlobalModal()` invocation-only rule with usage example.
- Subsection C: `<v-dialog>` prohibition — only `GlobalModalHost.vue` may contain `<v-dialog>`.
- Subsection D: New modal creation checklist.
- Documented prohibited locations: `pages/{entity}/modal/`, `components/`, inline in `.vue` files.

### `AGENTS.md`
- Added **Admin Modal & Dialog Architecture** section referencing `.agents/rules/modal.md`.
- Summarizes the key rules inline for quick enforcement.

## Verification Commands & Outputs

Documentation-only change — no build or test verification required.

```bash
cat .agents/rules/modal.md | head -90
```

Confirmed new Section 0 present with all subsections.

## Next Steps

- None. Rules are active for all future agent sessions.
