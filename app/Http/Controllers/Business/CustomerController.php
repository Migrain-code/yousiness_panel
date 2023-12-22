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
    public function index(Request $request)
    {
        $genderList=[
            'Frau',
            'Mann'
        ];
        dd($request->filled('type'));
        $customers = auth('business')->user()->customers()
            ->when($request->filled('type'), function ($q) use ($request) {
               return $q->where('type', $request->input('type') == "registered" ? 1 : 0);
            });
        return view('business.customer.index', compact('genderList', 'customers'));
    }

    public function listView()
    {
        $genderList=[
            'Frau',
            'Mann'
        ];
        $bCustomerIds = [];
        $businessUser = auth('business')->user();

        $bCustomers = $businessUser->appointments()->with('customer')->get()->pluck('customer');

        return view('business.customer.list', compact('genderList', 'bCustomers', 'bCustomerIds'));
    }

    public function export()
    {
        $businessUser = auth('business')->user();

        $bCustomers = $businessUser->appointments()->with('customer')->get()->pluck('customer');

        return Excel::download(new BusinessCustomerExport($bCustomers), 'kundenliste.xlsx');

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
           'custom_email'=>"required|string|min:6",
           'password'=>"required|string|min:8",
           'gender'=>"required|string"
        ], [], [
            'name'=> "Name",
            'email'=> "Mobilnummer",
            'custom_email'=> "E-Mail-Adresse",
            'password'=> "Passwort",
            'gender'=> "Geschlecht",

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
                'message'=>"Kunde erfolgreich hinzugefügt. Sie können nun Transaktionen für diesen Kunden durchführen."
            ]);
        }


    }

    public function show(Customer $customer)
    {
        return view('business.customer.show', compact('customer'));
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
        $request->validate([
            'name'=>"required|string|min:3",
            'custom_email'=>"required|string|min:8",
            'gender'=>"required|string"
        ], [], [
            'name'=> "Müşteri Adı",
            'custom_email'=> "E-posta Adresi",
            'gender'=> "Cinsiyet",

        ]);
        if ($request->email == $customer->email){
            $customer->name=$request->input('name');
            $customer->email=$request->input('email');
            $customer->phone=$request->input('email');
            $customer->custom_email=$request->input('custom_email');
            if ($request->has('password'))
            {
                $customer->password= Hash::make($request->input('password'));
            }
            $customer->gender=$request->input('gender');
            $customer->status=1;
            if ($customer->save()){
                return to_route('business.customer.index')->with('response', [
                    'status'=>"success",
                    'message'=>"Kundeninformationen aktualisiert"
                ]);
            }
        }
        else{
            $findCustomer = Customer::where('email', $request->email)->first();
            if ($findCustomer){
                return to_route('business.customer.edit', $customer->id)->with('response', [
                    'status'=>"danger",
                    'message'=>"Es ist bereits ein Benutzer mit dieser Mobilnummer registriert."
                ]);
            }
            else{
                $customer->name=$request->input('name');
                $customer->email=$request->input('email');
                $customer->phone=$request->input('email');
                $customer->custom_email=$request->input('custom_email');
                if ($request->has('password'))
                {
                    $customer->password= Hash::make($request->input('password'));
                }
                $customer->gender=$request->input('gender');
                $customer->status=1;
                if ($customer->save()){
                    return to_route('business.customer.index')->with('response', [
                        'status'=>"success",
                        'message'=>"Kundeninformationen aktualisiert"
                    ]);
                }
            }
        }

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
               'messsage' => "Kunde gelöscht"
            ]);
        }
    }
}
