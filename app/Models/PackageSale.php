<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSale extends Model
{
    use HasFactory;
    protected $dates=["seller_date"];
    public function customer()
    {
        return $this->hasOne(Customer::class,'id', 'customer_id')->withDefault([
            'name' => "Kunden",
            'image' => "Kunden",
            'custom_email' => "Kunden",
            'phone' => "Kunden",
            'created_at' => Carbon::now(),
            'email' => "Kunden",
            'status' => "Kunden",
        ]);
    }
    public function personel()
    {
        return $this->hasOne(Personel::class,'id', 'personel_id')->withDefault([
            'name' => "Mitarbeiter"
        ]);
    }
    public function service()
    {
        return $this->hasOne(BusinessService::class,'id', 'service_id');
    }

    public function usages()
    {
        return $this->hasMany(PackageUsage::class,'package_id', 'id');
    }

    public function payeds()
    {
        return $this->hasMany(PackagePayment::class,'package_id', 'id');
    }
}
