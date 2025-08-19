<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    // ✅ Custom primary key and non-incrementing ID
    protected $primaryKey = 'UserID';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    // ✅ Mass assignable fields
    protected $fillable = [
        'UserID',
        'Name',
        'Email',
        'Password',
        'Status',
        'PFPdata',
        'OAUTH'
    ];

    // ✅ Hidden fields for serialization
    protected $hidden = [
        'Password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    // ✅ Append profile photo URL
    protected $appends = [
        'profile_photo_url',
    ];

    // ✅ Attribute casts
    protected function casts(): array
    {
        return [
            'Password' => 'hashed',
        ];
    }

    // ✅ Relationships to your other tables
    public function admin()
    {
        return $this->hasOne(Admin::class, 'UserID', 'UserID');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'UserID', 'UserID');
    }

    public function seller()
    {
        return $this->hasOne(Seller::class, 'UserID', 'UserID');
    }
}
