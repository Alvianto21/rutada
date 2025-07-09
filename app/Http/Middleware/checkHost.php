<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkHost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // get  the list of allowed hosts Ips
        $allowedIps = array_map('trim', explode(',', config('app.allowed_ips')));

        // check if the request IP is in the allowed list
        if (!in_array($request->ip(), $allowedIps)) {
            // if not in the allowed list, return a 403 Forbidden response
            return response()->json([
                'error' => 'Forbidden',
                'message' => 'Your IP address is not allowed to access this resource'
            ], 403);
        }
        
        return $next($request);
    }
}
