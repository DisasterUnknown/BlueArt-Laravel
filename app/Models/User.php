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

    // Enable timestamps (created_at & updated_at)
    public $timestamps = true;

    // Mass assignable fields
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'pFPdata',
        'OAUTH'
    ];

    // Hidden fields for serialization
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

    // Attribute casts
    protected $casts = [
        'password' => 'hashed',
    ];

    // Relationships
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }

    public function seller()
    {
        return $this->hasOne(Seller::class, 'user_id', 'id');
    }
}
