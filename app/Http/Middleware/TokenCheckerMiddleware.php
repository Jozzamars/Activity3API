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
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Unauthorized. Token missing.'], 401);
        }

        if ($token !== env('BEARER_TOKEN')) {
            return response()->json(['error' => 'Unauthorized. Invalid token.'], 403);
        }

        return $next($request);
    }
}
