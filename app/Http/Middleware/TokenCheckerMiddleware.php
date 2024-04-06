<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenCheckerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get token in env variables
        $token=env('TOKEN');
        // Header Key = Authorization Value = TOKEN, if not authorized cannot pass to routes and status 404 not authorized
        if($request->header('Authorization') !== $token){
            return response()->json(['Unauthorized' => 'You are not authorized!'], 404);
        }
        return $next($request);
    }
    
}
