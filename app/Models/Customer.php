<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'CustomerID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['UserID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'CustomerID', 'CustomerID');
    }
}
