<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BussinessPackage;
use App\Models\BussinessPackagePaypalSaller;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
class PaymentController extends Controller
{
    public function paymentForm($slug)
    {
        Stripe::setApiKey('sk_test_51NvSDhIHb2EidFuBWjFrNdghtNgToZOLbvopsjlNHfeiyNqw3hcZVNJo96iLJJXFhnJizZ5UXxVn8gLA7Kj268bI00vqpbTIOx');

        $amount = 1000; // Ödeme miktarını ayarlayın (örnekte 10.00 dolar)
        $currency = 'EUR';

        $paymentIntent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => $currency,
            'return_url' => route('business.setup.step5'),
        ]);

        if (!$paymentIntent) {
            return back()->with('response', [
                'status' => "warning",
                'message' => "Ödeme işlemi oluşturmadı"
            ]);
            //return redirect()->route('payment.failure')->with('error', 'Ödeme işlemi oluşturulamadı.');
        }
        $package = BussinessPackage::where('slug', $slug)->first();
        return view('business.setup.payment.form', compact('package', 'paymentIntent'));

    }

    /*stripe methods*/
    public function stripe()
    {
        return view('business.setup.payment.stripe');
    }

    public function stripeForm(Request $request)
    {
        /*$amount = 5;//5 eur
        $user = auth('business')->user();
        $package = "Test Paketi";
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Customer::create(array(
            "address" => [
                "line1" => $user->address,
                "postal_code" => $user->cities->post_code,
                "city" => $user->cities->name,
                "country" => $user->cities->country->name,
            ],
            "email" => $user->owner_email,
            "name" => $user->owner,
            "source" => $request->stripeToken
        ));
        Charge::create ([
            "amount" => $amount * 100,
            "currency" => "EUR",
            "customer" => $customer->id,
            "description" => $package,
            "shipping" => [
                "name" => $user->name,
                "address" => [
                    "line1" => $user->address,
                    "postal_code" => $user->cities->post_code,
                    "city" => $user->cities->name,
                    "country" => $user->cities->country->name,
                ],
            ]
        ]);*/
        Stripe::setApiKey('sk_test_51NvSDhIHb2EidFuBWjFrNdghtNgToZOLbvopsjlNHfeiyNqw3hcZVNJo96iLJJXFhnJizZ5UXxVn8gLA7Kj268bI00vqpbTIOx');

        $paymentIntentId = $request->input('paymentIntentId');
        $paymentMethodId = $request->input('paymentMethodId');

        $intent = PaymentIntent::retrieve($paymentIntentId);
        $intent->confirm(['payment_method' => $paymentMethodId]);
        dd($intent);
        if ($intent->status === 'succeeded') {
            // Ödeme başarılı oldu, başarı sayfasına yönlendirin
            return response()->json(['success' => true]);
        } else {
            // Ödeme başarısız oldu, başarısızlık sayfasına yönlendirin
            return response()->json(['success' => false]);
        }
    }

    /*paypal Methods*/
    public function paypalPayment(Request $request)
    {
        $packet = BussinessPackage::find($request->package_id);
        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->initialize(array(
            'clientId' => 'ARbfZPlxdeObg71cesjTUgV7FLh9w1nmTVeb0EPZsCFmjQAz5eui2iygG85s-yr22btFkawu9mJx7jNV',
            'secret' => 'EH778BLYSQ8lcs5x6tTBBbxDFEp6UzMmmIV0TwqMdqC9bZsGl4aN1bMrnys4aLYraiNsaahvNMyft6V4',
            'testMode' => true, // Test modu için true, canlı mod için false
        ));

        $response = $gateway->purchase(array(
            'amount' => '1.00',
            'currency' => 'EUR',
            'description' => $packet->name,
            'returnUrl' => route('business.payment.paypalCallBack'),
            'cancelUrl' => route('business.setup.step4'),
            'custom' => $packet->slug,
        ))->send();

        $paypal = new BussinessPackagePaypalSaller();
        $paypal->business_id = auth('business')->id();
        $paypal->payment_id = $response->getData()["id"];
        $paypal->package_id = $packet->id;
        $paypal->save();
        if ($response->isRedirect()) {
            $response->redirect();
        } else {
            echo $response->getMessage();
        }
    }

    public function paypalCallBack(Request $request)
    {

        $paymentResult = BussinessPackagePaypalSaller::where('payment_id', $request->input('paymentId'))
            ->where('status', 0)
            ->first();

        if ($paymentResult){
            $paymentResult->token = $request->input('token');
            $paymentResult->payer_id = $request->input('payer_id');
            $paymentResult->status = 1;
            $paymentResult->save();

            $business = auth('business')->user();
            $business->is_setup = 1;
            $business->package_id = $paymentResult->package_id;
            $business->package_start_date = now();
            $business->package_end_date = now()->addDays(30);
            $business->save();

            return to_route('business.setup.step5')->with('response', [
                'status' => "success",
                'message' => "Ödeme işleminiz başarılı bir şekilde gerçekleşti paketiniz sisteminize tanımlandı."
            ]);
        }
        else{
            return to_route('business.setup.step4')->with('response', [
                'status' => "warning",
                'message' => "Ödeme Bilgisi Bulunamadı Lütfen ödemenizi yaptıysanız bizimle iletişime geçiniz."
            ]);
        }
    }

}
