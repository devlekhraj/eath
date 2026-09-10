<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureWebsiteAllowed
{
    /**
     * Handle an incoming request for website preview routes.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!config('website.enabled', false)) {
            abort(404);
        }

        /** @var Response $response */
        $response = $next($request);

        return $response;
    }
}
