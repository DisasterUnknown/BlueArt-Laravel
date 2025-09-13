<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestUnbanProduct extends Model
{
    use HasFactory;

    protected $table = 'unban_product_requests';

    protected $fillable = [
        'product_id',
        'user_id',
        'message',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
