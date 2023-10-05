<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BussinessPackage;
use App\Models\BussinessPackagePaypalSaller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Omnipay\Omnipay;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function paymentForm($slug)
    {
        $package = BussinessPackage::where('slug', $slug)->first();
        return view('business.setup.payment.form', compact('package'));
    }

    public function pay(Request $request)
    {
        $parts = explode('/', $request->expiry);

        $holder_name = $request->holder_name;
        $cardNumber = $request->card_number;
        $expMonth = $parts[0];
        $expYear = $parts[1];
        $cvc = $request->cvc;
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(env('STRIPE_KEY'));
        $token = \Stripe\Token::create([
            'card' => [
                'number' => $cardNumber,
                'exp_month' => $expMonth,
                'exp_year' => $expYear,
                'cvc' => $cvc,
            ],
        ]);

        dd($token);
    }

    public function stripe3dsResult(Request $request)
    {
        $stripe = new \Stripe\StripeClient(
            config('stripe.secret_key')
        );

        // stripe tarafından gönderilen setupIntent id'yi kullanarak setupIntent'e ulaşıyoruz.
        $setupIntent = $stripe->setupIntents->retrieve(
            request()->setup_intent
        );

        // 'metadata' ile gönderdiğimiz fiyat ve para birimi değerlerine ulaşıyoruz.
        $price = $setupIntent['metadata']['price'];
        $currency = $setupIntent['metadata']['currency'];

        // setupIntent'in sonucu başarılı ise para çekme işlemini yapıyoruz.
        if ($setupIntent['status'] == 'succeeded') {
            try {
                $charge = $stripe->charges->create([
                    'customer' => $setupIntent['customer'],
                    'amount' => $price,
                    'currency' => $currency,
                    'description' => 'test',
                    'source' => $setupIntent['payment_method']
                ]);
            }
                // hata oluşması durumunda hata mesajını json olarak ekrana yazdırıyoruz.
            catch (\Stripe\Exception\ApiErrorException $e) {
                return response()->json($e->getMessage(), 500);
            }

            // para çekme işleminde bir sorun olursa ekrana hata yazdırıyoruz.
            if ($charge['status'] != 'succeeded') {
                return response()->json('3ds payment error!', 500);
            } else {
                // para çekme işlemi başarılı sonuçlanırsa stripe'dan dönen veriyi ekrana basıyoruz.
                return response()->json($charge, 200);
            }
        } else {
            // setupIntent işleminde bir sorun olursa ekrana hata yazdırıyoruz.
            return response()->json('3ds payment error!', 500);
        }

    }

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
