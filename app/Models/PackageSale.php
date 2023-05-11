<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSale extends Model
{
    use HasFactory;
    protected $dates=["seller_date"];
    public function customer()
    {
        return $this->hasOne(Customer::class,'id', 'customer_id');
    }
    public function personel()
    {
        return $this->hasOne(Personel::class,'id', 'personel_id');
    }
    public function service()
    {
        return $this->hasOne(BusinessService::class,'id', 'service_id');
    }
}
