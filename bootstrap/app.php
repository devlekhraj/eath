<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\TokenMismatchException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $redirectUrl = '/admin/login';

        $exceptions->render(function (AuthenticationException $e, Request $request) use ($redirectUrl) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthenticated.',
                    'redirect' => url($redirectUrl),
                ], 401);
            }

            return redirect($redirectUrl);
        });

        $exceptions->render(function (TokenMismatchException $e, Request $request) use ($redirectUrl) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Session expired. Please login again.',
                    'redirect' => url($redirectUrl),
                ], 419);
            }

            return redirect($redirectUrl);
        });

        $exceptions->render(function (TokenExpiredException $e, Request $request) use ($redirectUrl) {
            return response()->json([
                'message' => 'Token has expired',
                'redirect' => url($redirectUrl),
            ], 401);
        });

        $exceptions->render(function (TokenInvalidException $e, Request $request) use ($redirectUrl) {
            return response()->json([
                'message' => 'Token is invalid',
                'redirect' => url($redirectUrl),
            ], 401);
        });

        $exceptions->render(function (JWTException $e, Request $request) use ($redirectUrl) {
            return response()->json([
                'message' => 'Authentication token error',
                'redirect' => url($redirectUrl),
            ], 401);
        });
    })->create();
