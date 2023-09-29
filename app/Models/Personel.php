<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->hasOne(BusinnessType::class, 'id', 'gender');
    }

    public function services()
    {
        return $this->hasMany(PersonelService::class, 'personel_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(PersonelNotification::class, 'personel_id', 'id')->orderBy('created_at')->take(5);
    }

    public function appointments()
    {
        return $this->hasMany(AppointmentServices::class, 'personel_id', 'id');
    }
    public function restDay()
    {
        return $this->hasOne(DayList::class, 'id', 'rest_day');
    }

    public function packageSales()
    {
        return $this->hasMany(PackageSale::class, 'personel_id', 'id');
    }
    public function productSales()
    {
        return $this->hasMany(ProductSales::class, 'personel_id', 'id');
    }
}
