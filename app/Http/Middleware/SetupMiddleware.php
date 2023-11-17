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
        if (($request->routeIs('business.setup.*') || $request->routeIs('business.payment.*')) && auth('business')->check()) {
            // Kullanıcı setup veya payment rotasına gidiyorsa ve giriş yapmışsa
            if (auth('business')->user()->is_setup == 0) {
                // Eğer kullanıcının is_setup değeri 0 ise, setup rotasına yönlendir
                return redirect()->route('business.setup.step1');
            } elseif (auth('business')->user()->is_setup == 1) {
                // Eğer kullanıcının is_setup değeri 1 ise, erişimi engelle
                return redirect()->route('business.home');
            }
            // Eğer is_setup değeri 0 değilse veya kullanıcı giriş yapmamışsa, normal işleyiş devam etsin
            return $next($request);
        }

        // Yukarıdaki koşullar sağlanmazsa, normal işleyiş devam etsin
        return $next($request);
    }
}
