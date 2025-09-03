<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public $timestamps = false;

    protected $fillable = ['sellerID', 'user_id','address','contact'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sellerID', 'sellerID');
    }
}
