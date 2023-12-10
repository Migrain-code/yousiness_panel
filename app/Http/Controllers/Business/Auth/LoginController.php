<?php

namespace App\Http\Controllers\Business\Auth;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest:business')->except('logout');
    }

    public function showLoginForm()
    {
        return view('business.auth.login');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], [], [
            'phone' => 'Mobilennummer',
            'password' => 'Passwort'
        ]);
    }
    public function login(Request $request)
    {
        $email = clearPhone($request->input('email'));

        $user = Business::where('email', $email)->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            dd("authed");
            Auth::loginUsingId($user->id);
            return to_route('business.home');
        } else {
            return to_route('business.login')->with('response', [
                'status' => "danger",
                'message' => "Ihre Mobilnummer oder Ihr Passwort ist falsch"
            ]);
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    protected function guard()
    {
        return Auth::guard('business');
    }


}
