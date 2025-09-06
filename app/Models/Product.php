<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'name', 'price', 'discount', 'description', 'category', 'status'];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'sellerID', 'sellerID');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'product_id', 'id');
    }
}
