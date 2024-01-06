<?php

namespace App\Http\Controllers\Business;

use App\Exports\BusinessAppointmentExport;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentServices;
use App\Models\BusinessService;
use App\Models\CustomerNotificationMobile;
use App\Models\Personel;
use App\Models\PersonelService;
use Faker\Provider\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $todayAppointments= Appointment::where('business_id',auth('business')->id())
            ->where('status', 1)
            ->whereRaw("STR_TO_DATE(date, '%d.%m.%Y') = ?", [Carbon::now()->format('Y-m-d')])
            ->orderByRaw("STR_TO_DATE(date, '%d.%m.%Y %H:%i')")
            ->get();
        $appointments = Appointment::where('business_id',auth('business')->id())->whereNotIn('status', [8])->get();

        return view('business.appointment.index', compact('todayAppointments', 'appointments'));
    }

    public function listView()
    {
        $todayAppointments= Appointment::where('business_id',auth('business')->id())
            ->where('status', 1)
            ->whereRaw("STR_TO_DATE(date, '%d.%m.%Y') = ?", [Carbon::now()->format('Y-m-d')])
            ->orderByRaw("STR_TO_DATE(date, '%d.%m.%Y')")
            ->get();
        $appointments = Appointment::where('business_id',auth('business')->id())->get();

        return view('business.appointment.list', compact('todayAppointments', 'appointments'));
    }
    public function reject($id)
    {
        $findAppointment = Appointment::find($id);
        $findAppointment->status = 8;
        $findAppointment->customer->sendSms($findAppointment->business->name. ' İşletmesine '. $findAppointment->start_time .' Tarihindeki Radevunuz İşletme Tarafından İptal Edildi');

        $title = 'Ihr Termin wurde abgesagt.';
        $body = "Ihr Termin für ".$findAppointment->business->name." wurde zur den ".$findAppointment->services->first()->start_time." absagen.";

        $notification =new CustomerNotificationMobile();
        $notification->customer_id = $findAppointment->customer->id;
        $notification->title = $title;
        $notification->content = $body;
        $notification->save();
        if ($findAppointment->customer && $findAppointment->customer->device) {
            $deviceToken = $findAppointment->customer->device->token;
            $notification = new \App\Services\Notification();
            $notification->sendPushNotification($deviceToken, $title, $body);
        }
        if ($findAppointment->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => "Ihr Termin wurde abgesagt."
            ]);
        }
    }

    public function accept($id)
    {
        $findAppointment = Appointment::find($id);
        $findAppointment->status = 1;
        $findAppointment->customer->sendSms("Ihr Termin zum ".$findAppointment->business->name." am ". $findAppointment->date." wurde bestätigt.");
        if ($findAppointment->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => "Termin bestätigt."
            ]);
        }
    }

    public function complete($id)
    {
        $findAppointment = Appointment::find($id);
        $findAppointment->status = 4;
        if ($findAppointment->save()) {
            return back()->with('response', [
                'status' => "success",
                'message' => "Termin bestätigt."
            ]);
        }
    }
    public function personel(Request $request)
    {
        $personel = PersonelService::find($request->personel_id);
        $services = $personel->service;

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
        $appointment = new Appointment();
        $appointment->business_id = auth('business')->id();
        $appointment->customer_id = $request->customer_id;
        $appointment->start_time = $request->start_time;
        $appointment->status = 1;
        if ($appointment->save()) {
            $appointmentService = new AppointmentServices();
            $appointmentService->appointment_id = $appointment->id;
            $appointmentService->personel_id = $request->personel_id;
            $appointmentService->service_id = $request->service_id;
            $findService = BusinessService::find($request->service_id);
            $appointmentService->start_time = Carbon::parse($request->start_time)->format("d.m.Y H:i");
            $appointmentService->end_time = Carbon::parse($request->start_time)->addMinute(intval($findService->time))->format('d.m.Y H:i');
            $appointmentService->save();
            $appointment->end_time = $appointmentService->end_time;
            $appointment->save();
            return back()->with('response', [
                'status' => "success",
                'message' => "Termin erstellt."
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function show(Appointment $appointment)
    {
        return view('business.appointment.show', compact('appointment'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Appointment $appointment
     * @return Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function export()
    {
        $businessUser = auth('business')->user();

        $appointments = $businessUser->appointments;

        return Excel::download(new BusinessAppointmentExport($appointments), 'appointments.xlsx');
    }
}
