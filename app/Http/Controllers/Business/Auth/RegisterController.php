<?php

namespace App\Http\Controllers\Business\Auth;

use App\Http\Controllers\Controller;
use App\Mail\BasicMail;
use App\Models\Business;
use App\Models\SmsConfirmation;
use App\Providers\RouteServiceProvider;
use App\Services\SendMail;
use App\Services\Sms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

        $this->middleware('guest:business');
    }

    public function showRegistrationForm()
    {

        return view('business.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data["slug"] = Str::slug($data["name"]);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'unique:businesses'],
            'owner' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:businesses'],
            'conditions' => ['accepted'],
            'contact_info' => ['accepted'],
        ], [], [
            'name' => 'Salonname',
            'slug' => 'Salonname',
            'email' => 'E-mail',
            'owner' => 'Salonbesitzer',
            'conditions' => "Geschäftsbedingungen",
            'contact_info' => "Kommunikationsberechtigungen",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Model|Business
     */
    protected function create(array $data)
    {
        $generateCode = rand(100000, 999999);

        $phone = $data["email"];
        $smsConfirmation = new SmsConfirmation();
        $smsConfirmation->phone = $phone;
        $smsConfirmation->action = "BUSINESS-REGISTER";
        $smsConfirmation->code = $generateCode;
        $smsConfirmation->expire_at = now()->addMinute(3);
        $smsConfirmation->save();
        SendMail::send('SALON REGISTRIERUNG', "Für die Registrierung bei " . setting('appy_site_title') . " ist der Verifizierungscode anzugeben ", $phone,  $generateCode);

        $business = new Business();
        $business->name = $data['name'];
        $business->slug = Str::slug($data['name']);
        $business->owner = $data['owner'];
        $business->email = $phone;
        $business->status = 1;
        $business->password = Hash::make(Str::random(8));
        $business->package_id = 1;
        $business->verification_code = $generateCode;
        \Session::put('registerBusiness', $business);

        return $business;
    }

    protected function registered(Request $request, $user)
    {
        return to_route('business.verify');

    }
}
