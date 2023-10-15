<?php

namespace App\Http\Controllers\Business;

use App\Exports\BusinessCustomerExport;
use App\Http\Controllers\Controller;
use App\Models\BusinessCustomer;
use App\Models\Customer;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $genderList=[
            'Kadın',
            'Erkek'
        ];
        $bCustomerIds = [];
        $businessUser = auth('business')->user();

        $bCustomers = $businessUser->appointments()->with('customer')->get()->pluck('customer');

        return view('business.customer.index', compact('genderList', 'bCustomers', 'bCustomerIds'));
    }

    public function export()
    {
        $businessUser = auth('business')->user();

        $bCustomers = $businessUser->appointments()->with('customer')->get()->pluck('customer');

        return Excel::download(new BusinessCustomerExport($bCustomers), 'customers.xlsx');

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
           'name'=>"required|string|min:3",
           'email'=>"required|string|min:11|unique:customers",
           'custom_email'=>"required|string|min:8",
           'password'=>"required|string|min:8",
           'gender'=>"required|string"
        ], [], [
            'name'=> "Müşteri Adı",
            'email'=> "Telefon Numarası",
            'custom_email'=> "E-posta Adresi",
            'password'=> "Şifre",
            'gender'=> "Cinsiyet",

        ]);
        $customer=new Customer();
        $customer->name=$request->input('name');
        $customer->email=$request->input('email');
        $customer->phone=$request->input('email');
        $customer->custom_email=$request->input('custom_email');
        $customer->password= Hash::make($request->input('password'));
        $customer->gender=$request->input('gender');
        $customer->status=1;
        if ($customer->save()){
            $businessCustomer=new BusinessCustomer();
            $businessCustomer->business_id=auth('business')->id();
            $businessCustomer->customer_id=$customer->id;
            $businessCustomer->save();
            return to_route('business.customer.index')->with('response', [
                'status'=>"success",
                'message'=>"Müşteri Eklendi. Artık bu müşteriler için işlem yapabilirsiniz."
            ]);
        }


    }

    public function show()
    {
        $businessUser = auth('business')->user();

        $bCustomers = $businessUser->appointments()->with('customer')->get()->pluck('customer');

        return Excel::download(new BusinessCustomerExport($bCustomers), 'customers.xlsx');

    }
    public function delete($id)
    {
        if (BusinessCustomer::find($id)->delete()){
            return response()->json([
                'status'=>"success"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function edit(Customer $customer)
    {
        dd($customer);
        return view('business.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return Response
     */
    public function destroy(Customer $customer)
    {
        BusinessCustomer::where('customer_id', $customer->id)->where('business_id', auth('business')->id())->delete();
        if ($customer->delete()){
            return \response()->json([
               'status' => "success",
               'messsage' => "Müşteri Silindi"
            ]);
        }
    }
}
