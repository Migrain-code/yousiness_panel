<?php

namespace App\Http\Controllers\Business\Auth;

use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\Models\Business;
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

        $user = Business::where('verification_code', $request->input('verification_code'))->first();
        if ($user){
            $generatePassword=rand(100000, 999999);
            $user->password=Hash::make($generatePassword);
            $user->verification_code=null;
            $user->password_status=1;
            $user->verify_phone=1;
            $user->save();

            $phone=str_replace(array('(', ')', '-', ' '), '', $user->email);
            Sms::send($phone,config('settings.bussiness_site_title'). "Sistemine giriş için şifreniz ".$generatePassword);

            return to_route('business.login')->with('response', [
                'status'=>"success",
                'message'=>"Telefon Numaranız doğrulandı. Sisteme giriş için şifreniz gönderildi."
            ]);
        }
        else{
            return to_route('business.verify')->with('response', [
                'status'=>"danger",
                'message'=>"Doğrulama Kodu Hatalı."
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
            'email'=>"Telefon Numarası"
        ]);
        $business=Business::whereEmail($request->email)->first();
        if (!$business){
            return to_route('business.showForgotView')->with('response', [
               'status'=>"error",
               'message'=>"Bu telefon numarası sistemde kayıtlı değil",
            ]);
        }
        else{
            $generatePassword=rand(1000000, 9999999);

            $phone=str_replace(array('(', ')', '-', ' '), '', $business->email);
            Sms::send($phone,config('settings.bussiness_site_title'). " Sistemine giriş için yeni şifreniz ".$generatePassword." olarak güncellendi. Panelinize girerek şifrenizi size uygun bir şifre ile değiştirebilirsiniz.");

            $business->password=Hash::make($generatePassword);
            $business->password_status=1;
            $business->save();
            return to_route('business.login')->with('response', [
                'status'=>"success",
                'message'=>"Yeni şifreniz sms olarak gönderildi. Gelen şifreyi girerek sistemi kullanmaya devam edebilirsiniz",
            ]);

        }
    }

}
