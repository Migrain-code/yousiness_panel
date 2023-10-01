<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BussinessPackage;
use App\Models\BussinessPackagePaypalSaller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Omnipay\Omnipay;

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
        $monthPart = $parts[0];
        $yearPart = $parts[1];
        $holder_name = $request->holder_name;
        $card_number = $request->card_number;
        $month = $monthPart;
        $year = $yearPart;
        $cvc = $request->cvc;

        // örnek olarak karttan 1$ çekeceğiz. stripe dokümanında belirtildiği üzere karttan çekilecek değeri 100 ile çarpmamız gerekiyor.
        $currency = 'USD';
        $price = 1 * 100;

        // stripe secret_key bilgisini config'den alıyoruz.
        $stripe = new \Stripe\StripeClient(config('stripe.secret_key'));

        try {
            // kart bilgilerini kullanarak stripe tarafında bir token elde ediyoruz.
            $stripeToken = $stripe->tokens->create([
                'card' => [
                    'number' => $card_number,
                    'exp_month' => $month,
                    'exp_year' => $year,
                    'cvc' => $cvc
                ]
            ]);

            // müşteri adını ve kart bilgisini stripe tarafında kaydediyoruz.
            $customer = $stripe->customers->create([
                'name' => $holder_name,
                'source' => $stripeToken['id']
            ]);

            // stripe tarafında bir setupIntent oluşturuyoruz.
            // setupIntent işlemi sonucunda stripe, girilen kartın 3ds gerektirip gerektirmediğiyle ilgili bir doğrulama yapıyor.
            // stripe'ın ödeme sonucunu iletmesi için 'return_url' parametresini belirtiyoruz.
            // 3ds ekranı sonrası para çekme işleminde kullanmak için 'metadata' kısmında fiyat ve para birimi değerlerini gönderiyoruz.
            $setupIntent = $stripe->setupIntents->create([
                'customer' => $customer['id'],
                'description' => 'test',
                'payment_method' => $stripeToken['card']['id'],
                'payment_method_types' => ['card'],
                'payment_method_options' => [
                    'card' => [
                        'request_three_d_secure' => 'any'
                    ]
                ],
                'confirm' => true,
                'return_url' => config('stripe.merchant_url') .'/stripe-3ds-result',
                'metadata' => [
                    'price' => $price,
                    'currency' => $currency
                ]
            ]);
        }
            // hata oluşması durumunda hata mesajını json olarak ekrana yazdırıyoruz.
        catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json($e->getMessage(), 500);
        }

        // eğer doğrulama sonucunda ödeme normal (3ds olmadan) gerçekleşecekse direkt olarak para çekme işlemini yapıyoruz.
        if ($setupIntent['status'] == 'succeeded') {
            try {
                $charge = $stripe->charges->create([
                    'customer' => $setupIntent['customer'],
                    'amount' => $price,
                    'currency' => $currency,
                    'description' => 'test',
                    'source' => $stripeToken['card']['id']
                ]);
            }
                // hata oluşması durumunda hata mesajını json olarak ekrana yazdırıyoruz.
            catch (\Stripe\Exception\ApiErrorException $e) {
                return response()->json($e->getMessage(), 500);
            }

            // para çekme işleminde bir sorun olursa ekrana hata yazdırıyoruz.
            if ($charge['status'] != 'succeeded') {
                return response()->json('Payment error!', 500);
            } else {
                // para çekme işlemi başarılı sonuçlanırsa stripe'dan dönen veriyi ekrana basıyoruz.
                return response()->json($charge, 200);
            }
        }

        // eğer doğrulama sonucunda ödeme 3ds ile gerçekleşecekse kullanıcıyı stripe'ın gönderdiği 3ds ekranına yönlendiriyoruz.
        if ($setupIntent['status'] == 'requires_action') {
            return Redirect::to($setupIntent['next_action']['redirect_to_url']['url']);
        } else {
            // setupIntent işleminde bir sorun olursa ekrana hata yazdırıyoruz.
            return response()->json('3ds payment error!', 500);
        }
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
