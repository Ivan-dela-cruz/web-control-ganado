<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Model
{
    use SoftDeletes;
    protected $table = 'companies';
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
