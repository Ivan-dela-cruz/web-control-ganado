<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Treatment extends Model
{
    //
    use SoftDeletes;
    protected $table = 'treatments';
    protected $fillable = [
        'name',
        'description',
        'status'
    ];
}
