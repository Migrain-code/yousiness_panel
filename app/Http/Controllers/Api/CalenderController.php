<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Business;
use App\Services\GoogleCalender;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function getEvents(Request $request,$businessKey)
    {
        $business = Business::where('key', $businessKey)->first();
        if ($business) {

            $appointments = $business->appointments; // Etkinlik verilerini veritabanından alın (örnek olarak tüm randevuları aldık)

            $events = [];
            foreach ($appointments as $appointment) {
                $event = [
                    'title' => $appointment->customer->name,
                    'start' => $appointment->start_time->toIso8601String(),
                    'end' => $appointment->end_time->toIso8601String(),
                    'customer' => 'Muhammet Türkmen', // Sabit bir müşteri adı veya farklı bir kaynaktan alınabilir
                    'clockRange' => $appointment->start_time->format('H:i') . '-' . $appointment->end_time->format('H:i'),
                    'statusText' => $appointment->status('text'),
                    'statusCode' => $appointment->status('code'),
                    'services' => [],
                ];

                foreach ($appointment->services as $service) {
                    $event['services'][] = [
                        'image' => asset('storage/' . $service->personel->image), // Eğer resimler storage klasöründe ise
                        'personel' => $service->personel->name,
                        'hizmet' => $service->service->subCategory->name,
                    ];
                }

                $events[] = $event;
            }
            return response()->json($events);
        } else {
            return response()->json([
                'status' => "error",
                'message' => "İşletme kaydı bulunamadı"
            ], 404);
        }
    }

    public function exportGoogle()
    {
        GoogleCalender::setCalendar(auth('business')->user()->appointments);
        return back()->with('response', [
            'status' => "success",
            'message' => "Takvime Eklendi",
        ]);
    }
}
