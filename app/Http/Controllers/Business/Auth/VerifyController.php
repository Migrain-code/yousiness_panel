<?php

namespace App\Http\Controllers\Business\Auth;

use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\Models\Business;
use App\Models\SmsConfirmation;
use App\Providers\RouteServiceProvider;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VerifyController extends Controller
{
    public function index()
    {
        return view('business.auth.verify');
    }
    public function verify(Request $request)
    {
        $request->validate([
            'verification_code' => ['required', 'numeric', 'digits:6'],
        ]);
        $code = SmsConfirmation::where("code", $request->verification_code)->where('action','BUSINESS-REGISTER')->first();
        if ($code){
            $user = Business::where('email', $code->phone)->first();
            $generatePassword=rand(100000, 999999);
            $user->password=Hash::make($generatePassword);
            $user->verification_code=null;
            $user->password_status=1;
            $user->verify_phone=1;
            $user->save();

            $phone=$user->email;
            Sms::send($phone, "Ihr Passwort für die Anmeldung bei ".config('settings.appy_site_title')." lautet :". $generatePassword);

            return to_route('business.login')->with('response', [
                'status'=>"success",
                'message'=>"Ihre Mobilnummer Überprüfung war erfolgreich.Für die Anmeldung in das System wurde Ihnen Ihr Passwort zugesendet."
            ]);
        }
        else{
            return to_route('business.verify')->with('response', [
                'status'=>"danger",
                'message'=>"Verifizierungscode ist fehlerhaft."
            ]);
        }


    }
    public function showForgotView()
    {
        return view('business.auth.passwords.confirm');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email'=>"required",
        ], [], [
            'email'=>"MobileNummer"
        ]);
        $business=Business::where('email',clearPhone($request->email))->first();
        if (!$business){
            return to_route('business.showForgotView')->with('response', [
               'status'=>"error",
               'message'=>"Es ist bereits ein Benutzer mit dieser Mobilnummer registriert."
            ]);
        }
        else{
            $generatePassword=rand(100000, 999999);

            $phone=$business->email;

            Sms::send($phone, "Ihr Passwort für die Anmeldung bei ".config('settings.appy_site_title')." lautet ".$generatePassword);

            $business->password=Hash::make($generatePassword);
            $business->password_status=1;
            $business->save();
            return to_route('business.login')->with('response', [
                'status'=>"success",
                'message'=>"Ihre Mobilnummer Überprüfung war erfolgreich. Für die Anmeldung in das System wurde Ihnen Ihr Passwort zugesendet.",
            ]);

        }
    }

}
