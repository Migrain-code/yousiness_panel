<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('business.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //$request->dd();
        $product=new Product();
        $product->business_id=auth('business')->id();
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->piece=$request->input('piece');
        $product->barcode=$request->input('barcode');
        if ($product->save()){
            return to_route('business.product.index')->with('response', [
                'status'=>"success",
                'message'=>"Produkt erfolgreich hinzugefügt"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        return view('business.product.edit', compact('product'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->piece=$request->input('piece');
        $product->barcode=$request->input('barcode');
        if ($product->save()){
            return to_route('business.product.store')->with('response', [
                'status'=>"success",
                'message'=>"Produkt erfolgreich aktualisiert"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        if ($product->delete()){
            return response()->json([
                'status'=>"success",
            ]);
        }
    }
}
