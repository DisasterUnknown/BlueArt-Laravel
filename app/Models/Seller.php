<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'sellers';
    protected $primaryKey = 'sellerID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['sellerID', 'userID','address','contact'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sellerID', 'sellerID');
    }
}
