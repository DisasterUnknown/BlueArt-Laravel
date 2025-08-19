<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdCounter extends Model
{
    protected $table = 'id_counter';
    protected $primaryKey = 'TableName';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['LastID'];
}
