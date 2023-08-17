<?php

namespace App\Http\Middleware;
use Torann\GeoIP\Facades\GeoIP;

use Closure;
use Illuminate\Http\Request;

class IsraelAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = $request->ip();
        $country = GeoIP::getLocation($ipAddress)->country;

        if ($country === 'Israel') {
            return $next($request);
        }else {;
            return response('Access denied.', 403);
        }
    }
}
