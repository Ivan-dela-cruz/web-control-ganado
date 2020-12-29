<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Animal_production extends Model
{
    //
    use SoftDeletes;
    protected $table = 'animal_production';
    protected $fillable = [
        'name',
        'code',
        'url_image',
        'start_date',
        'end_date',
        'status',
        'animal_id',
    ];
    public function animal()
    {
        return $this->belongsTo(Estate::class, 'animal_id');
    }

}

