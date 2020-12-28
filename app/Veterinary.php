<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Veterinary extends Model
{
    
    use SoftDeletes;
    
    protected $table = 'veterinaries';
    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'email',
        'phone1',
        'phone2',
        'direction',
        'status'
    ];
}
