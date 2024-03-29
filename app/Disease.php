<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Disease extends Model
{
    //

    use SoftDeletes;
    protected $table = 'diseases';
    protected $fillable = [
        'name',
        'description',
        'time_diseases',
        'status'
    ];
}