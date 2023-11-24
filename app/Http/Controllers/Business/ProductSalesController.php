<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductSales;
use Illuminate\Http\Request;

class ProductSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_types = [
            'Barzahlung',
            'Lastschrift/Kreditkarte',
            'EFT/Geldtransfer',
            'Andere',
        ];
        $customers = Customer::all();
        return view('business.sales.index', compact('customers', 'payment_types'));
    }


    public function productPrice(Request $request)
    {
        $findProduct=Product::find($request->product_id);
       return $findProduct;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$request->dd();
        $productSale = new ProductSales();
        $productSale->business_id = auth('business')->id();
        $productSale->customer_id = $request->input('customer_id');
        $productSale->product_id = $request->input('product_id');
        $productSale->personel_id = $request->input('personel_id');
        $productSale->payment_type = $request->input('payment_type');
        $productSale->piece=$request->input('piece');
        $productSale->total=$this->sayiDuzenle($request->input('price')) * $request->input('piece');
        if ($productSale->save()) {
            $productFind=Product::find($request->input('product_id'));
            $productFind->piece=$productFind->piece - $productSale->piece;
            $productFind->save();
            return to_route('business.productSale.index')->with('response', [
                'status' => "success",
                'message' => "Die Verkaufstransaktion wurde aufgezeichnet"
            ]);
        }
    }
    function sayiDuzenle($sayi){
        $sayi = str_replace('.','',$sayi);
        $sayi = str_replace(',','.',$sayi);
        $sonuc = floatval($sayi);
        return $sonuc;
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProductSales $productSale
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSales $productSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProductSales $productSale
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSales $productSale)
    {
        $payment_types = [
            'Barzahlung',
            'Lastschrift/Kreditkarte',
            'EFT/Geldtransfer',
            'Andere',
        ];
        $customers = Customer::all();
        return view('business.sales.edit', compact('productSale', 'payment_types', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductSales $productSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSales $productSale)
    {
        $productSale->business_id = auth('business')->id();
        $productSale->customer_id = $request->input('customer_id');
        $productSale->product_id = $request->input('product_id');
        $productSale->personel_id = $request->input('personel_id');
        $productSale->payment_type = $request->input('payment_type');
        $productSale->piece=$request->input('piece');
        $productSale->total=$request->input('price')* $request->input('piece');
        if ($productSale->save()) {
            return to_route('business.productSale.index')->with('response', [
                'status' => "success",
                'message' => "Verkaufsprozess aktualisiert"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductSales $productSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSales $productSale)
    {
        if ($productSale->delete()){
            return response()->json([
                'status'=>"success",
                'message'=>"Verkaufstransaktion gelöscht"
            ]);
        }
    }
}
