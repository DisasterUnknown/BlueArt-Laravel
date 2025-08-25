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

    // Custom primary key and non-incrementing ID
    protected $primaryKey = 'userID';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    // ✅ Mass assignable fields
    protected $fillable = [
        'userID',
        'name',
        'email',
        'password',
        'status',
        'pFPdata',
        'OAUTH'
    ];

    // ✅ Hidden fields for serialization
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    // Append profile photo URL
    protected $appends = [
        'profile_photo_url',
    ];

    //  Attribute casts
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getAuthIdentifierName()
    {
        return 'userID';
    }

    public function getAuthIdentifier()
    {
        return $this->userID;
    }

    //  Relationships to your other tables
    public function admin()
    {
        return $this->hasOne(Admin::class, 'userID', 'userID');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'userID', 'userID');
    }

    public function seller()
    {
        return $this->hasOne(Seller::class, 'userID', 'userID');
    }
}
