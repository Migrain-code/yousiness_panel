<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        if (auth('business')->check() && auth('business')->user()->verify_phone != 1) {
            Auth::guard('business')->logout();
            return redirect('/')->with('response', [
                'status'=>"danger",
                'message'=>"Telefon Numaranızı doğrulamadan sisteme giriş yapamazsınız doğrulamak için ",
                'link'=>route('business.verify'),
            ]);

        }
        return $next($request);
    }
}
