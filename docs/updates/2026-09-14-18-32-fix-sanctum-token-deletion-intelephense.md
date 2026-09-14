# Update: Resolve Sanctum Token Deletion Static Analysis Undefined Method

**Timestamp**: 2026-09-14 18:32:00 NPT (UTC+05:45)  
**Author**: Antigravity  
**Status**: Completed & Verified  

---

## 1. Summary & Root Cause

### The Problem
Static analysis / IDE language servers (such as PHP Intelephense / PhpStorm / PHPStan) flagged an error at `packages/admin/src/Services/AuthService.php:76`:
```text
Undefined method 'delete'.
```

### Root Cause
1. In Laravel Sanctum's `Laravel\Sanctum\HasApiTokens` trait, the return type for `currentAccessToken()` is annotated as:
   ```php
   /**
    * @return TToken
    */
   public function currentAccessToken()
   ```
   where `@template TToken of \Laravel\Sanctum\Contracts\HasAbilities`.
2. The contract `\Laravel\Sanctum\Contracts\HasAbilities` only defines `can($ability)` and `cant($ability)`. It does **not** declare the Eloquent `delete()` method.
3. At runtime, Sanctum populates `currentAccessToken()` with an Eloquent model instance (`Laravel\Sanctum\PersonalAccessToken`), which possesses the `delete()` method. However, static analyzers only see the `HasAbilities` contract and flag `delete()` as an undefined method.
4. Furthermore, in non-token authenticated requests (e.g. cookie sessions or transient test tokens), `currentAccessToken()` returns `TransientToken`, which lacks `delete()` and would throw a runtime fatal error if called directly.

---

## 2. Detailed Technical Changes

### A. Modified `packages/admin/src/Services/AuthService.php`
- Imported `Laravel\Sanctum\PersonalAccessToken`.
- Updated `logout()` to guard token deletion with an `instanceof PersonalAccessToken` check:
  ```php
  public function logout(): bool
  {
      $token = $this->user()?->currentAccessToken();

      if ($token instanceof PersonalAccessToken) {
          return (bool) $token->delete();
      }

      return false;
  }
  ```
- This narrows the type to `PersonalAccessToken` for static analyzers (satisfying Intelephense) and guarantees runtime safety against non-model tokens.

### B. Modified `packages/admin/src/Models/Admin.php`
- Added `@use HasApiTokens<PersonalAccessToken>` and `@method PersonalAccessToken|null currentAccessToken()` PHPDoc annotations to `Admin` model.
- Imported `Laravel\Sanctum\PersonalAccessToken`.

---

## 3. Verification & Testing

### Syntax Verification
```bash
php -l packages/admin/src/Services/AuthService.php
php -l packages/admin/src/Models/Admin.php
```
**Output**:
```text
No syntax errors detected in packages/admin/src/Services/AuthService.php
No syntax errors detected in packages/admin/src/Models/Admin.php
```

### Test Suite Execution
```bash
php artisan test tests/Feature/AdminAuthControllerTest.php
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
  Duration: 14.64s
```

---

## 4. Next Steps
- The IDE warning is resolved and runtime safety is guaranteed for all token states.
