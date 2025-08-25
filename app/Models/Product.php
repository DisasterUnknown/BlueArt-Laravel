<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'productID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['sellerID','productName','price','discount','description','category','status'];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'sellerID', 'sellerID');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'productID', 'productID');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'productID', 'productID');
    }
}
