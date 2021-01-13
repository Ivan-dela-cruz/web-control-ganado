<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $fillable = [
        'id',
        'estate_id',
        'date',
        'total',
        'description',
        'status',
    ];
}
