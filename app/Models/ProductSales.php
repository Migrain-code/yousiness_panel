<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSales extends Model
{
    use HasFactory;

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
    public function product()
    {
        return $this->hasOne(Product::class,'id', 'product_id');
    }

}
