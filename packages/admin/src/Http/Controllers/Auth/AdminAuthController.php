<?php

namespace Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTGuard;

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
        $credentials = $request->only('username','password');

        /** @var JWTGuard $guard */
        $guard = Auth::guard('api_admin');
        $token = $guard->attempt($credentials);
        if (!$token) {
            return response()->json([
                'errors' => [
                    'password' => ['Invalid username or password.'],
                ],
            ], 422);
        }

        return $this->respondWithToken($token);
    }

    public function profile(): JsonResponse
    {
        $user = Auth::guard('api_admin')->user();

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

    public function logout(): JsonResponse
    {
        Auth::guard('api_admin')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(): JsonResponse
    {
        /** @var JWTGuard $guard */
        $guard = Auth::guard('api_admin');
        $token = $guard->refresh();

        return $this->respondWithToken($token);
    }

    protected function respondWithToken(string $token): JsonResponse
    {
        /** @var JWTGuard $guard */
        $guard = Auth::guard('api_admin');
        $ttl = $guard->factory()->getTTL();

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $ttl ? $ttl * 60 : null,
        ]);
    }
}
