<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'seller';
    protected $primaryKey = 'SellerID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['UserID','Address','Contact'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'SellerID', 'SellerID');
    }
}
