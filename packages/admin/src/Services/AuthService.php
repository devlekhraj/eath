<?php

namespace Admin\Services;

use Admin\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthService
{
    public function __construct(
        protected ?Request $request = null
    ) {}

    /**
     * Get the currently authenticated admin model instance.
     */
    public function user(): ?Admin
    {
        $user = $this->request?->user('sanctum')
            ?? $this->request?->user()
            ?? Auth::guard('sanctum')->user()
            ?? Auth::user();

        return $user instanceof Admin ? $user : null;
    }

    /**
     * Get the authenticated admin's ID.
     */
    public function id(): ?int
    {
        return $this->user()?->id;
    }

    /**
     * Get the display name of the authenticated admin, with fallback.
     */
    public function name(string $fallback = 'Anonymous Explorer'): string
    {
        return $this->user()?->name ?? $fallback;
    }

    /**
     * Check if an admin is authenticated.
     */
    public function check(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Return user profile details with unread notification count.
     */
    public function profile(): array
    {
        $user = $this->user();

        try {
            $notificationCount = $user ? $user->unreadNotifications()->count() : 0;
        } catch (\Throwable) {
            $notificationCount = 0;
        }

        return [
            'data' => $user,
            'notification_count' => $notificationCount,
        ];
    }

    /**
     * Revoke the current access token for the authenticated admin.
     */
    public function logout(): bool
    {
        $token = $this->user()?->currentAccessToken();

        if ($token instanceof PersonalAccessToken) {
            return (bool) $token->delete();
        }

        return false;
    }
}
