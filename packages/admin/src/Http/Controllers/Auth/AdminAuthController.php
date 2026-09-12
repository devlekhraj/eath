<?php

namespace Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Admin\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|string',
                'password' => 'required|string|min:6',
            ],
            [
                'username.required' => 'Please enter your username.',
                'password.required' => 'Please enter your password.',
                'password.min' => 'Password must be at least 6 characters.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }
        $admin = Admin::query()
            ->where('username', $request->string('username')->toString())
            ->first();

        if (
            !$admin ||
            !Hash::check($request->string('password')->toString(), $admin->password) ||
            !$admin->is_active ||
            $admin->status !== Admin::STATUS_ACTIVE
        ) {
            return response()->json([
                'errors' => [
                    'password' => ['Invalid username or password.'],
                ],
            ], 422);
        }

        $token = $admin->createToken('admin-panel')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'admin' => $admin,
        ]);
    }

    public function profile(Request $request): JsonResponse
    {
        $user = $request->user();

        try {
            $notificationCount = $user ? $user->unreadNotifications()->count() : 0;
        } catch (\Throwable) {
            $notificationCount = 0;
        }

        return response()->json([
            'data' => $user,
            'notification_count' => $notificationCount,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()?->currentAccessToken()?->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
