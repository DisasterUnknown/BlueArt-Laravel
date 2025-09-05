<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;

    protected $fillable = ['product_id','content','level'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
