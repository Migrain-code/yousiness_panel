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
        $customer=new Customer();
        $customer->name=$request->input('name');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
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
        //
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
        //
    }
}
