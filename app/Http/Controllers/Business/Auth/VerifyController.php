<?php

namespace App\Http\Controllers\Business\Auth;

use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\Models\Business;
use App\Models\BusinessNotificationPermission;
use App\Models\SmsConfirmation;
use App\Providers\RouteServiceProvider;
use App\Services\SendMail;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VerifyController extends Controller
{
    public function index()
    {
        return view('business.auth.verify');
    }

    public function verify(Request $request)
    {
        $registerBusiness = Session::get('registerBusiness');

        $request->validate([
            'verification_code' => ['required', 'numeric', 'digits:6'],
        ]);
        $code = SmsConfirmation::where("code", $request->verification_code)->where('action', 'BUSINESS-REGISTER')->first();
        if ($code) {
            if ($code->expire_at < now()) {

                $this->createVerifyCode($code->phone);

                return to_route('business.verify')->with('response', [
                    'status' => "warning",
                    'message' => "Verifizierungscode ist nicht mehr gültig. "
                ]);
            } else {
                $code->delete();
                $user = $registerBusiness;
                $generatePassword = rand(100000, 999999);
                $user->password = Hash::make($generatePassword);
                $user->verification_code = null;
                $user->password_status = 1;
                $user->verify_phone = 1;
                $user->save();

                $this->addPermission($user->id);

                SendMail::send('Ihre E-mail Überprüfung war erfolgreich', "Ihr Passwort für die Anmeldung bei " . config('settings.appy_site_title') . " lautet :", $user->email, $generatePassword);

                return to_route('business.login')->with('response', [
                    'status' => "success",
                    'message' => "Ihre E-mail Überprüfung war erfolgreich .Für die Anmeldung in das System wurde Ihnen Ihr Passwort zugesendet."
                ]);
            }
        } else {
            return to_route('business.verify')->with('response', [
                'status' => "danger",
                'message' => "Verifizierungscode ist fehlerhaft."
            ]);
        }


    }
    function addPermission($id)
    {
        $businessPermission = new BusinessNotificationPermission();
        $businessPermission->business_id = $id;
        $businessPermission->save();
        return true;
    }
    function createVerifyCode($phone)
    {
        $generateCode = rand(100000, 999999);
        $smsConfirmation = new SmsConfirmation();
        $smsConfirmation->phone = $phone;
        $smsConfirmation->action = "BUSINESS-REGISTER";
        $smsConfirmation->code = $generateCode;
        $smsConfirmation->expire_at = now()->addMinute(3);
        $smsConfirmation->save();

        SendMail::send('SALON REGISTRIERUNG', "Für die Registrierung bei " . setting('appy_site_title') . " ist der Verifizierungscode anzugeben ", $phone, $generateCode);

        return $generateCode;
    }

    public function showForgotView()
    {
        return view('business.auth.passwords.confirm');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => "required",
        ], [], [
            'email' => "E-mail"
        ]);
        $business = Business::where('email', $request->email)->first();
        if (!$business) {
            return to_route('business.showForgotView')->with('response', [
                'status' => "danger",
                'message' => "Es ist bereits ein Benutzer mit dieser E-mail registriert."
            ]);
        } else {
            $generatePassword = rand(100000, 999999);

            SendMail::send('Ihr Passwort für die Anmeldung bei', "Ihr Passwort für die Anmeldung bei " . config('settings.appy_site_title') . " lautet ",  $business->email, $generatePassword);
            $business->password = Hash::make($generatePassword);
            $business->password_status = 1;
            $business->save();
            return to_route('business.login')->with('response', [
                'status' => "success",
                'message' => "Ihre E-mail Überprüfung war erfolgreich. Für die Anmeldung in das System wurde Ihnen Ihr Passwort zugesendet.",
            ]);

        }
    }

}
