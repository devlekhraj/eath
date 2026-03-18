<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    // Login admin and return JWT token
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (!$token = auth('api_admin')->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return $this->respondWithToken($token);
    // }
   public function login(Request $request)
{
    $messages = [
        'username.required' => 'Please enter your username.',
        'password.required' => 'Please enter your password.',
        'password.min' => 'Password must be at least 6 characters.',
    ];

    $validator = Validator::make($request->all(), [
        'username' => 'required|string',
        'password' => 'required|string|min:6',
    ], $messages);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    // Manual credential check for specific feedback
    $user = \App\Models\Admin::where('username', $request->username)->first();

    if (!$user) {
        return response()->json([
            'errors' => [
                'username' => ['This username is not registered.']
            ]
        ], 422);
    }

    if (!Hash::check($request->password, $user->password)) {
        return response()->json([
            'errors' => [
                'password' => ['Incorrect password.']
            ]
        ], 422);
    }

    // Log in
    try {
        if (!$token = auth('api_admin')->login($user)) {
            return response()->json([
                'password' => 'Login failed. Please try again.'
            ], 500);
        }
    } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        // If an old token in the request is expired, we might need to skip detection or clear it.
        // However, fromUser avoids the request parsing as much.
        $token = auth('api_admin')->login($user); 
    }

    return $this->respondWithToken($token);
}

    // Get authenticated admin info
    public function profile()
    {
        $user = Auth::guard('api_admin')->user();

        return response()->json([
            "data" => $user,
        ]);
    }

    // Logout admin (invalidate token)
    public function logout()
    {
        Auth::guard('api_admin')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    // Refresh JWT token
    public function refresh()
    {
        $token = Auth::guard('api_admin')->refresh();

        return $this->respondWithToken($token);
    }

    // Format the token response
    protected function respondWithToken($token)
    {
        $ttl = Auth::guard('api_admin')->factory()->getTTL();
        
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $ttl ? $ttl * 60 : null,
        ]);
    }
}
