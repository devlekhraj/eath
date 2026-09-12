# Project Update Logging Standards & Guidelines

This directory (`docs/updates/`) contains the chronological change logs for all development work, database migrations, refactoring, and feature implementations performed on this project.

Every developer and AI assistant **MUST** adhere to the following standard for every single update performed.

---

## 1. Universal Logging Rule

> **Mandatory Rule**: Every time an update, task, bug fix, or refactor is completed, a new timestamped markdown file MUST be created inside `docs/updates/`.
>
> - **Never overwrite or edit older update files**: Older files serve as an immutable historical record.
> - **Always create a new file** for each working session or completed task.

---

## 2. File Naming Convention

Every update log file must strictly follow this naming structure:

```text
docs/updates/YYYY-MM-DD-HH-MM-<short-descriptive-slug>.md
```

### Format Breakdown:
- `YYYY`: 4-digit year (e.g., `2026`)
- `MM`: 2-digit month (`01`–`12`)
- `DD`: 2-digit day of the month (`01`–`31`)
- `HH`: 2-digit hour in 24-hour format (`00`–`23`)
- `MM`: 2-digit minute (`00`–`59`)
- `<short-descriptive-slug>`: Kebab-case description of the work performed (e.g., `database-migrations-cleanup-and-table-sync`, `refactor-website-routes-to-controllers`).

### Examples:
- `2026-09-12-14-08-database-migrations-cleanup-and-table-sync.md`
- `2026-09-12-15-30-refactor-route-website-to-journey-controller.md`
- `2026-09-13-10-15-update-planner-submission-flow.md`

---

## 3. Timezone Standard

All timestamps must use the official local project timezone:
- **Timezone**: **Nepal Time (NPT)**
- **Offset**: **UTC+05:45**
- **Format**: `YYYY-MM-DD HH:MM:SS NPT (UTC+05:45)`

---

## 4. Required File Structure Template

Every update document must follow this standardized template:

```markdown
# Update: [Clear, Descriptive Title of Work Done]

**Timestamp**: YYYY-MM-DD HH:MM:SS NPT (UTC+05:45)  
**Author**: [Your Name or Agent Name]  
**Status**: [Completed & Verified | In Progress | Blocked]  

---

## 1. Summary & Objective
- High-level overview of what was accomplished and why.
- Background context or user instructions driving this change.

---

## 2. Detailed Technical Changes

### A. Files Created
- `path/to/file1.php`: Purpose of file.

### B. Files Modified
- `path/to/file2.php`: Summary of specific modifications.

### C. Files Deleted / Renamed
- `path/to/old.php` -> `path/to/new.php`: Reason for rename/deletion.

### D. Database & Schema Changes (if applicable)
- Tables created, columns added/modified, indexes, foreign keys.

---

## 3. Verification & Testing
Document the exact commands executed to verify the integrity of the code:

\`\`\`bash
# Example:
DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan migrate:fresh --seed --force
\`\`\`

- **Test Results**: Output summary, HTTP status codes, passed unit tests, or smoke test output.

---

## 4. Next Steps & Handoff Notes
- Immediate next tasks to be picked up by the next session/agent.
- Any open items or caveats.
```

---

## 5. Checklist Before Finalizing Any Task

Before completing your response or concluding a task:
- [ ] Have all code changes been tested and verified?
- [ ] Is `php artisan migrate:fresh --seed` passing without errors (if schema was touched)?
- [ ] Has a new markdown file been written to `docs/updates/` with current date and time?
- [ ] Does the log provide file links and exact descriptions of what changed?
