# Update: Implement Admin AuthService and Constructor Injection

**Timestamp**: 2026-09-14 18:28:00 NPT (UTC+05:45)  
**Author**: Antigravity  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- Created a dedicated `AuthService` under `packages/admin/src/Services/AuthService.php` to encapsulate authenticated admin operations.
- Replaced direct, untyped `auth()->user()?->name` and `$request->user()` calls with typed, dependency-injected `$this->authService` methods.
- Refactored `GuideController` to inject `AuthService` and retrieve the authenticated admin's display name via `$this->authService->name('Anonymous Explorer')`.
- Refactored `AdminAuthController` to delegate `profile()` and `logout()` token revocation directly to `AuthService`.
- Updated `tests/Feature/AdminAuthControllerTest.php` to test Sanctum authentication and verify `AuthService` methods (`user()`, `name()`, `id()`, `check()`, `profile()`, `logout()`).

---

## 2. Detailed Technical Changes

### A. Files Created
- `packages/admin/src/Services/AuthService.php`:
  - `user(): ?Admin`: Returns typed `Admin\Models\Admin` instance resolving from Sanctum guard or request.
  - `id(): ?int`: Returns the authenticated admin ID.
  - `name(string $fallback = 'Anonymous Explorer'): string`: Returns the full name (`fname . ' ' . $lname`) via `Admin::getNameAttribute()` accessor.
  - `check(): bool`: Returns whether an admin is authenticated.
  - `profile(): array`: Returns structured profile payload (`['data' => $admin, 'notification_count' => int]`) for frontend consumption.
  - `logout(): bool`: Revokes the current Sanctum personal access token.

### B. Files Modified
- `packages/admin/src/Http/Controllers/Guide/GuideController.php`:
  - Injected `AuthService` in `__construct()`.
  - Replaced inline `auth()->user()?->name ?? 'Anonymous Explorer'` with `$this->authService->name('Anonymous Explorer')`.
- `packages/admin/src/Http/Controllers/Auth/AdminAuthController.php`:
  - Injected `AuthService` in `__construct()`.
  - Simplified `profile()` to return `response()->json($this->authService->profile())`.
  - Simplified `logout()` to call `$this->authService->logout()`.
- `tests/Feature/AdminAuthControllerTest.php`:
  - Updated legacy JWT tests to modern Sanctum authentication.
  - Added dedicated test assertions for `AuthService` methods.

---

## 3. Verification & Testing

### Auth Controller & Service Test
```bash
php artisan test --filter=AdminAuthControllerTest
```
**Output**:
```text
   PASS  Tests\Feature\AdminAuthControllerTest
  ✓ admin login succeeds with valid username password and active account
  ✓ admin login returns 422 for missing fields
  ✓ admin login returns 422 for unknown username
  ✓ admin login returns 422 for wrong password
  ✓ admin login fails for inactive account
  ✓ admin profile returns authenticated admin via auth service
  ✓ admin logout revokes token successfully
  ✓ auth service methods resolve correctly

  Tests:    8 passed (31 assertions)
  Duration: 14.89s
```

### Guide CRUD Test
```bash
php artisan test --filter=AdminGuideCrudTest
```
**Output**:
```text
   PASS  Tests\Feature\AdminGuideCrudTest
  ✓ can list guides with filters
  ✓ can create guide with modern payload and avatar
  ✓ can get guide details with relations
  ✓ can update guide with legacy payload
  ✓ can update guide bio
  ✓ can create and update guide review
  ✓ can assign guide to journey
  ✓ can delete guide

  Tests:    8 passed (58 assertions)
  Duration: 14.50s
```

---

## 4. Next Steps & Handoff Notes
- `AuthService` is available for injection in any admin controller across `packages/admin`.
- All admin authentication and profile methods are strictly typed and fully covered by unit and feature tests.
