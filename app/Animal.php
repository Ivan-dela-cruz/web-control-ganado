<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Animal extends Model
{
    //
    use SoftDeletes;
    protected $table = 'animals';
    protected $fillable = [
        'name',
        'code',
        'url_image',
        'start_date',
        'end_date',
        'status',
        'estate_id',
    ];
    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }

}