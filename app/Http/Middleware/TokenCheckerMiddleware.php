<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenCheckerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the bearer token from the request headers
        $token = $request->bearerToken();

        // Check if the bearer token is missing
        if (!$token) {
            return response()->json(['error' => 'Unauthorized. Token missing.'], 401);
        }

        // Check if the bearer token matches the expected token
        if ($token !== env('BEARER_TOKEN')) {
            return response()->json(['error' => 'Unauthorized. Invalid token.'], 401);
        }

        // Token is valid, proceed with the request
        return $next($request);
    }
}
