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
        'description',
        'status'
    ];
}
