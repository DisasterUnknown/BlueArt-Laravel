<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'ProductID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['SellerID','ProductName','Price','Discount','Description','Category','Status'];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'SellerID', 'SellerID');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'ProductID', 'ProductID');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'ProductID', 'ProductID');
    }
}
