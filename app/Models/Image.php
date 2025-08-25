<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'ImageID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['productID','content','level'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}
