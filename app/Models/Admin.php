<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';           // exact table name
    protected $primaryKey = 'adminID';    // custom primary key
    public $incrementing = false;         // IDs are varchar
    public $timestamps = false;           // your table has no timestamps

    protected $fillable = [
        'userID', 'NIC'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }
}

