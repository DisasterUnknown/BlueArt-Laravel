<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'customerID',
        'salesDateTime',
        'amount',
        'phoneNumber',
        'address',
        'shippingMethod'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID', 'id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

