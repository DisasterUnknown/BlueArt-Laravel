<?php

namespace App\Models\Mongo;

use MongoDB\Laravel\Eloquent\Model;

class UserCart extends Model
{   
    protected $connection = 'mongodb';

    protected $collection = 'user_carts';

    protected $fillable = [
        'user_id',
        'product_id', 
    ];

    protected $casts = [
        'product_id' => 'array',
    ];
}
