<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Mastitis extends Model
{
    //
    use SoftDeletes;
    protected $table = 'mastitis';
    protected $fillable = [
        'tipe_mastitis',
        'description',
        'level',
        'status',
        'animal_production_id',
        'treatment_id'
    ];

    public function animal_production()
    {
        return $this->belongsTo(Animal_production::class, 'animal_production_id');
    }
    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'treatment_id');
    }
}
