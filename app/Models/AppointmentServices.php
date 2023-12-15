<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentServices extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->hasOne(BusinessService::class, 'id', 'service_id')->withDefault([
            'name' => "Dienstleistung nich gefunden"
        ]);
    }

    public function personel()
    {
        return $this->hasOne(Personel::class, 'id', 'personel_id')->withDefault([
            'name' => "Mitarbeiter gelöscht",
            'image' => "Mitarbeiter gelöscht",
            'email' => "Mitarbeiter gelöscht",
            'phone' => "Mitarbeiter gelöscht",
            'start_time' => "Mitarbeiter gelöscht",
            'end_time' => "Mitarbeiter gelöscht",
        ]);
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class, 'id', 'appointment_id');
    }
}
