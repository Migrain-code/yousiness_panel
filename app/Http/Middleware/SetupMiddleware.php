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
        if (auth('business')->check()) {
            $user = auth('business')->user();

            if ($user->is_setup == 0) {
                // Kullanıcı setup yapılmamışsa
                if ($request->routeIs('business.setup.*') || $request->routeIs('business.payment.*')) {
                    // Kullanıcı setup sayfalarına veya ödeme sayfalarına erişmeye çalışıyorsa
                    return $next($request);
                } else {
                    // Kullanıcı setup yapmamışsa ve diğer sayfalara erişmeye çalışıyorsa
                    return redirect()->route('business.setup.step1');
                }
            } else {
                // Kullanıcı setup yapmışsa
                if ($request->routeIs('business.setup.*') || $request->routeIs('business.payment.*')) {
                    // Kullanıcı setup sayfalarına veya ödeme sayfalarına erişmeye çalışıyorsa
                    return redirect()->route('business.home');
                } else {
                    // Kullanıcı setup yapmışsa ve diğer sayfalara erişmeye çalışıyorsa
                    return $next($request);
                }
            }
        } else {
            // Kullanıcı giriş yapmamışsa
            // İsterseniz bu durumda giriş yapma sayfasına yönlendirme yapabilirsiniz
            return redirect()->route('business.login');
        }
    }
}
