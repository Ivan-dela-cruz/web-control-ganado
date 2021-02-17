<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_production extends Model
{
    //

    protected $table = 'animal_production';
    protected $fillable = [
        'name',
        'code',
        'url_image',
        'start_date',
        'end_date',
        'status',
        'animal_id',
        'estate_id',
    ];
    
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

}

