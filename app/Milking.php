<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milking extends Model
{
    protected $table = 'milkings';

    public function production()
    {
       return $this->belongsTo(Animal_production::class, 'animalproduction_id');
    }
}
