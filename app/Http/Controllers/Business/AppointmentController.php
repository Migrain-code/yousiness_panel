<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentServices;
use App\Models\BusinessService;
use App\Models\Personel;
use App\Models\PersonelService;
use Faker\Provider\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

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
            ->whereRaw("STR_TO_DATE(start_time, '%d.%m.%Y') = ?", [Carbon::now()->format('Y-m-d')])
            ->orderByRaw("STR_TO_DATE(start_time, '%d.%m.%Y %H:%i')")
            ->get();
        return view('business.appointment.index', compact('todayAppointments'));
    }

    public function reject($id)
    {
        $findAppointment = Appointment::find($id);
        $findAppointment->status = 8;
        $findAppointment->customer->sendSms($findAppointment->business->name. ' İşletmesine '. $findAppointment->start_time .' Tarihindeki Radevunuz İşletme Tarafından İptal Edildi');

        if ($findAppointment->save()) {
            return to_route('business.appointment.index')->with('response', [
                'status' => "success",
                'message' => "Randevu İptal Edildi."
            ]);
        }
    }

    public function accept($id)
    {
        $findAppointment = Appointment::find($id);
        $findAppointment->status = 1;
        $findAppointment->customer->sendSms($findAppointment->business->name. ' İşletmesine '. $findAppointment->start_time .' Tarihindeki Radevunuz Onaylandı');
        if ($findAppointment->save()) {
            return to_route('business.appointment.index')->with('response', [
                'status' => "success",
                'message' => "Randevu Onaylandı."
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
            return to_route('business.appointment.index')->with('response', [
                'status' => "success",
                'message' => "Randvu Oluşturuldu."
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
}
