<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estate extends Model
{

    use SoftDeletes;
    protected $table = 'estates';
    
    protected $fillable = [
        'name',
        'ruc',
        'owner',
        'url_image',
        'phone',
        'address',
        'email',
        'status'
    ];

   
}
