<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PackagePayment;
use App\Models\PackageSale;
use App\Models\PackageUsage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class PackageSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $package_types=[
            'Seans',
            'Minute'
        ];
        $customers = Customer::all();

        return view('business.package.index', compact('package_types', 'customers'));
    }

    public function payments(Request $request)
    {
        $findPayments=PackagePayment::where('package_id', $request->package_id)->latest()->get();
        return $findPayments;
    }
    public function usages(Request $request)
    {
        $findUsages=PackageUsage::where('package_id', $request->package_id)->with('personel')->latest()->get();

        return $findUsages;
    }
    public function usagesAdd(Request $request)
    {
        $findPackage=PackageSale::find($request->package_id);
        if ($findPackage->amount >= $request->amount)
        {
            $usage=new PackageUsage();
            $usage->package_id=$request->package_id;
            $usage->personel_id=$request->personel_id;
            $usage->amount=$request->amount;
            $usage->created_at=$request->operation_date;
            if ($usage->save()){
                return response()->json([
                    'status'=>"success",
                    'data'=>$usage
                ]);
            }
        }
        else{
            $message="Beim Hinzufügen der Nutzung können Sie keinen Wert eingeben, der größer ist als die im Paket definierte Nutzungsmenge. Maximale Nutzungsmenge des Pakets: ".$findPackage->amount;
            return response()->json([
                'status'=>"warning",
                'message'=>$message
            ]);
        }

    }
    public function paymentsAdd(Request $request)
    {
        $payment=new PackagePayment();
        $payment->package_id=$request->package_id;
        $payment->price=$request->price;
        $payment->amount=$request->amount;
        if ($payment->save()){
            return response()->json([
                'status'=>"success",
                'data'=>$payment
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=> "required",
            'service_id' => "required",
            'amount' => "required",
            'total' => "required",
            'personel_id' => "required",
            'package_type' => "required",
        ], [], [
            'customer_id'=> "Kunde",
            'service_id' => "Dienstleistung",
            'amount' => "Preis",
            'total' => "Betrag",
            'personel_id' => "Mitarbeiter",
            'package_type' => "Art",
        ]);
        $translate_date=Carbon::parse($request->seller_date)->format('Y-m-d');

        $packageSale=new PackageSale();
        $packageSale->business_id=auth('business')->id();
        $packageSale->seller_date=$translate_date;
        $packageSale->customer_id=$request->input('customer_id');
        $packageSale->service_id=$request->input('service_id');
        $packageSale->type=$request->input('package_type');
        $packageSale->personel_id=$request->input('personel_id');
        $packageSale->amount=$request->input('amount');
        $packageSale->total=$this->sayiDuzenle($request->total);
        if ($packageSale->save()) {
            return to_route('business.packageSale.index')->with('response', [
                'status' => "success",
                'message' => "Verkaufsprozess hinzugefügt"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PackageSale $packageSale
     * @return Response
     */
    public function edit(PackageSale $packageSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PackageSale $packageSale
     * @return Response
     */
    public function update(Request $request, PackageSale $packageSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PackageSale $packageSale
     * @return Response
     */
    public function destroy(PackageSale $packageSale)
    {
        //
    }

    function sayiDuzenle($sayi){
        $sayi = str_replace('.','',$sayi);
        $sayi = str_replace(',','.',$sayi);
        $sonuc = floatval($sayi);
        return $sonuc;
    }
}
