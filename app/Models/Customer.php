<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customerID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['userID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'customerID', 'customerID');
    }
}
