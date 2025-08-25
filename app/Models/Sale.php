<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'salesID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['productID','customerID','salesDateTime','amount','phoneNumber','address','shippingMethod'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID', 'customerID');
    }
}
