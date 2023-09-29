<?php

namespace App\Http\Controllers;

use App\Models\BussinessPackage;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentForm($slug)
    {
        $package = BussinessPackage::where('slug', $slug)->first();
        return view('business.setup.payment.form', compact('package'));
    }

    public function pay(Request $request)
    {
        $request->dd();
        $package = BussinessPackage::find(session('packet_id'));

    }
}
