<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetupMiddleware
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
        if ($request->routeIs('business.setup.*')) {
            return $next($request);
        }

        if (auth('business')->check() && auth('business')->user()->is_setup == 0) {
            return redirect()->route('business.setup.step1');
        }
        return $next($request);
    }
}
