<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSales extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->hasOne(Customer::class,'id', 'customer_id');
    }

    public function personel()
    {
        return $this->hasOne(Personel::class,'id', 'personel_id');
    }
    public function product()
    {
        return $this->hasOne(Product::class,'id', 'product_id');
    }

}
