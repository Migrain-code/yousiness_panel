<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BusinessCustomerExport;
use App\Http\Controllers\Controller;
use App\Models\BusinessCustomer;
use App\Models\Customer;
use App\Models\CustomerNotificationMobile;
use App\Models\Device;
use Google\Service\Monitoring\Custom;
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
        $allCustomer = Customer::all();
        return view('admin.customer.index', compact('allCustomer'));
    }

    public function sendNotify(Request $request)
    {
        if (in_array('all', $request->customers)) {
            $customers = Customer::whereNotNull('email')->get();
        } else {
            $customers = Customer::whereNotNull('email')->whereIn('id', $request->customers)->get();
        }

        foreach ($customers as $customer) {
            if ($customer->permissions->is_notification == 1) {
                $notification = new CustomerNotificationMobile();
                $notification->customer_id = $customer->id;
                $notification->title = $request->input('title');
                $notification->content = $request->input('description');
                $notification->save();

                if ($customer->device){
                    $deviceToken = $customer->device->token;
                    $title = $customer->name;
                    $body = 'Herzlich willkommen!';
                    $notification = new \App\Services\Notification();
                    $notification->sendPushNotification($deviceToken, $title, $body);
                }
            }
        }
        return back()->with('response', [
            'status' => "success",
            'message' => "Bildirimler Gönderildi",
        ]);
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
            'name' => "required|string|min:3",
            'email' => "required|string|min:11|unique:customers",
            'custom_email' => "required|string|min:8",
            'password' => "required|string|min:8",
            'gender' => "required|string"
        ], [], [
            'name' => "Müşteri Adı",
            'email' => "Telefon Numarası",
            'custom_email' => "E-posta Adresi",
            'password' => "Şifre",
            'gender' => "Cinsiyet",

        ]);
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('email');
        $customer->custom_email = $request->input('custom_email');
        $customer->password = Hash::make($request->input('password'));
        $customer->gender = $request->input('gender');
        $customer->status = 1;
        if ($customer->save()) {
            return to_route('admin.customer.index')->with('response', [
                'status' => "success",
                'message' => "Müşteri Eklendi. Artık bu müşteriler için işlem yapabilirsiniz."
            ]);
        }


    }

    public function export()
    {
        $bCustomers = Customer::all();

        return Excel::download(new BusinessCustomerExport($bCustomers), 'kundenliste.xlsx');

    }

    public function delete($id)
    {
        if (BusinessCustomer::find($id)->delete()) {
            return response()->json([
                'status' => "success"
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
        return view('admin.customer.edit', compact('customer'));
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
            'name' => "required|string|min:3",
            'custom_email' => "required|string|min:8",
            'gender' => "required|string"
        ], [], [
            'name' => "Müşteri Adı",
            'custom_email' => "E-posta Adresi",
            'gender' => "Cinsiyet",

        ]);
        if ($request->email == $customer->email) {
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->phone = $request->input('email');
            $customer->custom_email = $request->input('custom_email');
            if ($request->has('password')) {
                $customer->password = Hash::make($request->input('password'));
            }
            $customer->gender = $request->input('gender');
            $customer->status = 1;
            if ($customer->save()) {
                return to_route('admin.customer.index')->with('response', [
                    'status' => "success",
                    'message' => "Müşteri Bilgileri Güncellendi"
                ]);
            }
        } else {
            $findCustomer = Customer::where('email', $request->email)->first();
            if ($findCustomer) {
                return to_route('admin.customer.edit', $customer->id)->with('response', [
                    'status' => "danger",
                    'message' => "Bu telefon numarası ile kayıtlı kullanıcı bulunmakta lütfen başka bir telefon numarası deneyin."
                ]);
            } else {
                $customer->name = $request->input('name');
                $customer->email = $request->input('email');
                $customer->phone = $request->input('email');
                $customer->custom_email = $request->input('custom_email');
                if ($request->has('password')) {
                    $customer->password = Hash::make($request->input('password'));
                }
                $customer->gender = $request->input('gender');
                $customer->status = 1;
                if ($customer->save()) {
                    return to_route('admin.customer.index')->with('response', [
                        'status' => "success",
                        'message' => "Müşteri Bilgileri Güncellendi"
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
        BusinessCustomer::where('customer_id', $customer->id)->delete();
        if ($customer->delete()) {
            return response()->json([
                'status' => "success",
                'message' => "Müşteri Kaydı Silindi"
            ]);
        }
    }
}
