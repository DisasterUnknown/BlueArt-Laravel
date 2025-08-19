<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'SalesID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['ProductID','CustomerID','SalesDateTime','Amount','PhoneNumber','Address','ShippingMethod'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID', 'CustomerID');
    }
}
