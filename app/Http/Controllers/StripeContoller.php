<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BussinessPackage;
use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripeContoller extends Controller
{
    public function stripeForm(Request $request)
    {
        $request->validate([
            'package_id' => "required",
        ], [], [
            'package_id' => "Paket Seçimi"
        ]);

        $businessPackage = BussinessPackage::find($request->input('package_id'));
        $business = auth('business')->user();

        Stripe::setApiKey('sk_test_51NvSDhIHb2EidFuBWjFrNdghtNgToZOLbvopsjlNHfeiyNqw3hcZVNJo96iLJJXFhnJizZ5UXxVn8gLA7Kj268bI00vqpbTIOx');

        $stripeCustomer = $this->getOrCreateStripeCustomer($business);

        $productname = $businessPackage->slug;
        $totalprice = $businessPackage->price;
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'customer' => $stripeCustomer->id,
            'line_items' => [
                [
                    'price' => $businessPackage->stripe_key, // Stripe Dashboard'da oluşturduğunuz ürünün ID'sini buraya ekleyin
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('business.setup.step5'),
            'cancel_url' => route('business.setup.step4'),
            'metadata' => [
                'product_info' => $businessPackage->id, // Ürün veya hizmeti tanımlayan benzersiz bir kimlik
            ],
        ]);

        return redirect()->away($session->url);
    }
    public function handleWebhook(Request $request)
    {
        $payload = json_decode($request->getContent());
        Stripe::setApiKey('sk_test_51NvSDhIHb2EidFuBWjFrNdghtNgToZOLbvopsjlNHfeiyNqw3hcZVNJo96iLJJXFhnJizZ5UXxVn8gLA7Kj268bI00vqpbTIOx');

        if ($payload->type === 'payment_intent.succeeded') {
            $paymentIntentId = $payload->data->object->id; // Payment Intent ID'sini alın
            $productInfo = $payload->data->object;
            return $productInfo;
            $stripePaymentIntent = PaymentIntent::retrieve($paymentIntentId);

            $customerId = $stripePaymentIntent->customer;

            $stripeCustomer = Customer::retrieve($customerId);

            return $productInfo;
            $business = Business::where('stripe_customer_id', $stripeCustomer->id)->first();
            $business->package_id = "paket id si gelecek";
            $business->save();

            return $stripeCustomer;
            // İşletme bilgilerini güncelleme işlemlerini burada yapabilirsiniz.

        }

        // Webhook işlemini Stripe'a yanıt verin
        return response()->json(['message' => 'Webhook Received']);
    }
    private function getOrCreateStripeCustomer($business)
    {
        if ($business->stripe_customer_id) {
            // İşletmenin zaten bir Stripe Müşteri ID'si varsa bu müşteriyi al
            return Customer::retrieve($business->stripe_customer_id);
        } else {
            // İşletme için yeni bir Stripe Müşteri oluştur
            $stripeCustomer = Customer::create([
                'email' => $business->owner_email, // İşletmenin e-posta adresi
                'name' => $business->name, // İşletme adı
                'description' => $business->about, // İşletme ile ilgili açıklama
                'phone' => $business->phone, // İşletme telefon numarası
                'address' => [
                    'line1' => $business->address, // İşletme adresi - Satır 1
                    'city' => $business->cities->name, // İşletme şehir
                    'postal_code' => $business->cities->post_code, // İşletme posta kodu
                    'country' => $business->cities->country->name, // İşletme ülkesi
                ],
                // Diğer işletme ile ilgili bilgileri eklemek için gerekli alanları burada kullanabilirsiniz.
            ]);

            // Stripe Müşteri ID'sini işletme kaydına kaydet
            $business->stripe_customer_id = $stripeCustomer->id;
            $business->save();

            return $stripeCustomer;
        }
    }
}
