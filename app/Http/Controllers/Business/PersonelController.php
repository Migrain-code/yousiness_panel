<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\BusinessService;
use App\Models\Customer;
use App\Models\DayList;
use App\Models\Personel;
use App\Models\PersonelNotification;
use App\Models\PersonelService;
use App\Models\ServiceShare;
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {

        $rates = ServiceShare::where('rate', "<>", null)->orderBy("rate")->get();
        $dayList = DayList::orderBy("id")->get();
        return view('business.personel.index', compact('rates', 'dayList'));
    }

    public function get(Request $request)
    {
        $perPage = 5;

        $data = PersonelNotification::where('personel_id', $request->personel_id)->skip(intval($request->last_id))->take($perPage)->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'title' => "required",
            'message' => "required",
        ]);
        $personelNotification = new PersonelNotification();
        $personelNotification->business_id = Auth::guard('business')->id();
        $personelNotification->personel_id = $request->input('personel_id');
        $personelNotification->title = $request->input('title');
        $personelNotification->message = $request->input('message');
        $personelNotification->link = $request->input('link');
        if ($personelNotification->save()) {
            return back()->with('response', [
                'status' => "success",
                'title' => "Erfolgreich",
                'message' => "Benachrichtigung an Mitarbeiter gesendet"
            ]);
        }
    }

    public function gender(Request $request)
    {
        if ($request->gender == 3) {
            $services = BusinessService::where('business_id', auth('business')->id())
                ->with('subCategory')
                ->with('gender')
                ->orderBy('type')
                ->get();
        } else {
            $services = BusinessService::where('business_id', auth('business')->id())
                ->where('type', $request->gender)
                ->with('subCategory')
                ->with('gender')
                ->orderBy('type')
                ->get();
        }
        return $services;
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
        $request->validate([
            'email' => "required",
            'phone' => "required|unique:personels",
            'name' => "required",
            'password' => "required",
            'off_day' => "required",
            'gender' => "required",
            'rate' => "required",
            'services' => "required",
        ], [], [
            'email' => "E-Mail",
            'phone' => "Mobilnummer",
            'name' => "Name",
            'password' => "Passwort",
            'off_day' => "Freier Tag",
            'gender' => "Geschlecht",
            'rate' => "Arbeitsanteil",
            'services' => "Dienstleistung",
        ]);
        $personel = new Personel();
        $personel->business_id = auth('business')->id();
        $personel->name = $request->input('name');
        $personel->image = "business/team.png";
        $personel->email = $request->email;
        $personel->password = Hash::make($request->password);
        $personel->phone = $request->phone;
        $personel->accept = $request->accept;
        $personel->rest_day = $request->off_day;
        $personel->start_time = $request->start_time;
        $personel->end_time = $request->end_time;
        $personel->food_start = $request->food_start_time;
        $personel->food_end = $request->food_end_time;
        $personel->gender = auth('business')->user()->type->id == 3 ? $request->gender : auth('business')->user()->type->id;
        $personel->rate = $request->rate;
        $personel->range = $request->range;
        $personel->description = $request->description;
        if ($request->hasFile('image')){
            $personel->image = 'storage/' . $request->file('image')->store('personalImage');
        }
        if ($personel->save()) {
            if (in_array('all', $request->services)) {
                $findBusinessService = auth('business')->user()->services;
                foreach ($findBusinessService as $service) {
                    $personelService = new PersonelService();
                    $personelService->service_id = $service->id;
                    $personelService->personel_id = $personel->id;
                    $personelService->save();
                }
            } else {
                foreach ($request->services as $service) {
                    $personelService = new PersonelService();
                    $personelService->service_id = $service;
                    $personelService->personel_id = $personel->id;
                    $personelService->save();
                }
            }
            return to_route('business.personel.index')->with('response', [
                'status' => "success",
                'title' => "Erfolgreich",
                'message' => "Personal hinzugefügt"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Personel $personel
     * @return Response
     */
    public function show(Personel $personel)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Personel $personel
     * @return Response
     */
    public function edit(Personel $personel)
    {
        $dayList = DayList::all();
        $rates = ServiceShare::where('rate', "<>", null)->orderBy("rate")->get();

        $services = [];
        $appointments = $personel->appointments()->paginate(10);

        $unCompletedAppointments = $personel->appointments()->where('status', 0)->get();
        $unPrice = 0;
        foreach($unCompletedAppointments as $row){
            if ($row->service){
                $unPrice+= $row->service->price;
            }
        }

        $businessServices = $personel->appointments->map(function ($appointment) {
            return $appointment->service;
        })->flatten();

        /*$theYearServices = $personel->appointments()->whereYear('created_at', now()->year)->get()->map(function ($appointment) {
            return $appointment->service;
        })->flatten();*/

        /*$theMonthServices = $personel->appointments()
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->get()
            ->map(function ($appointment) {
                return $appointment->service;
            })->flatten();*/

        $totalPrice = $this->appointmentTotalPrice($businessServices);

        $totalTime = $this->appointmentTotalTime($businessServices);

        foreach ($personel->services as $service) {
            $services[] = $service->service_id;
        }

        $packageSales = $personel->packageSales;// Paket satış listesi
        $productSales = $personel->productSales;// Ürün satışı listesi

        //$theYearPackageSale = $personel->packageSales()->whereYear('seller_date', now()->year)->sum('total');//bu yılki paket satış toplamı
        //$theYearProductSale = $personel->productSales()->whereYear('created_at', now()->year)->sum('total');//bu yılki ürün satışı toplamı
        //$theYearAppointmentTotal = $this->appointmentTotalPrice($theYearServices);

        //$theMonthPackageSale = $personel->packageSales()->whereYear('seller_date', now()->year)->whereMonth('seller_date', now()->month)->sum('total');
        //$theMonthProductSale = $personel->productSales()->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->sum('total');
        //$theMonthAppointmentTotal = $this->appointmentTotalPrice($theMonthServices);

        //$theMonthTotal = $theMonthPackageSale + $theMonthProductSale + $theMonthAppointmentTotal;
        //$theYearTotal = $theYearPackageSale + $theYearProductSale + $theYearAppointmentTotal;
        //$allTotal = $packageSales->sum('total') + $productSales->sum('total') + $totalPrice;

        $theMonthTotal = $personel->appointments()
            ->where('status', 7)
            ->whereRaw("STR_TO_DATE(start_time, '%Y-%m-%d') = ?", [Carbon::now()->format('Y-m-d')])
            ->count();

        $theYearTotal = $personel->appointments()
            ->where('status', 7)
            ->whereRaw("YEAR(STR_TO_DATE(start_time, '%Y-%m-%d %H:%i:%s')) = ?", [Carbon::now()->year])
            ->count();

        $allTotal = $personel->appointments()->where('status', 7)->count();
        $monthlyAppointmentCounts = [];
        for ($month = 1; $month <= 12; $month++) {

            $count = $personel->appointments()->where('status', 7)->whereMonth('created_at', $month)->count();

            $monthlyAppointmentCounts[] = $count;
        }

        $monthData = json_encode($monthlyAppointmentCounts);

        return view('business.personel.edit', compact('monthData','personel', 'dayList', 'rates', 'services', 'appointments', 'totalPrice', 'totalTime', 'packageSales', 'productSales', 'allTotal', 'theYearTotal', 'theMonthTotal', 'unPrice'));
    }

    function appointmentTotalPrice($businessServices)
    {
        $totalPrice = $businessServices->reduce(function ($total, $businessService) {
            return $total + $businessService->price;
        }, 0);
        return $totalPrice;
    }

    function appointmentTotalTime($businessServices)
    {
        $totalTime = $businessServices->reduce(function ($total, $businessService) {
            return $total + $businessService->price;
        }, 0);
        return $totalTime;
    }

    public function sendSms(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        if ($customer) {
            Sms::send($customer->phone, $request->input('content'));
            return back()->with('response', [
                'status' => "success",
                'message' => "Nachricht an den Kunden gesendet"
            ]);
        } else {
            return back()->with('response', [
                'status' => "danger",
                'message' => "Kundendatensatz nicht gefunden"
            ]);
        }

    }

    public function sendMail(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        if ($customer) {
            /*mail kodu buraya gelecek*/
            return back()->with('response', [
                'status' => "success",
                'message' => "E-Mail an den Kunden. Es wurde gesendet. Da der Mail-Dienst jedoch nicht hinzugefügt wurde, erhalten Sie keine E-Mail in Ihrem Posteingang.."
            ]);
        } else {
            return back()->with('response', [
                'status' => "danger",
                'message' => "Kundendatensatz nicht gefunden"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Personel $personel
     * @return Response
     */
    public function update(Request $request, Personel $personel)
    {

        $personel->business_id = auth('business')->id();
        $personel->name = $request->input('name');
        $personel->email = $request->email;
        if ($request->input('password') != null){
            $personel->password = Hash::make($request->password);
        }
        $personel->phone = $request->phone;
        $personel->accept = $request->accept;
        $personel->rest_day = $request->off_day;
        $personel->start_time = $request->start_time;
        $personel->end_time = $request->end_time;
        $personel->food_start = $request->food_start_time;
        $personel->food_end = $request->food_end_time;
        $personel->gender = auth('business')->user()->type->id == 3 ? $request->gender : auth('business')->user()->type->id;
        $personel->rate = $request->rate;
        $personel->range = $request->range;
        $personel->description = $request->description;
        if ($request->hasFile('image')) {
            $personel->image = 'storage/' . $request->file('image')->store('personalImage');
        }

        if ($personel->save()) {
            PersonelService::where('personel_id', $personel->id)->delete();
            if (in_array('all', $request->services)) {
                $findBusinessService = auth('business')->user()->services;
                foreach ($findBusinessService as $service) {
                    $personelService = new PersonelService();
                    $personelService->service_id = $service->id;
                    $personelService->personel_id = $personel->id;
                    $personelService->save();
                }
            } else {
                foreach ($request->services as $service) {
                    $personelService = new PersonelService();
                    $personelService->service_id = $service;
                    $personelService->personel_id = $personel->id;
                    $personelService->save();
                }
            }
            return to_route('business.personel.index')->with('response', [
                'status' => "success",
                'title' => "Erfolgreich",
                'message' => "Personalinformationen aktualisiert"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Personel $personel
     * @return Response
     */
    public function destroy(Personel $personel)
    {

        if ($personel->delete()) {
            return response()->json([
                'status' => "success",
            ]);
        }
    }
}
