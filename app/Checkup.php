<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $table = "checkups";

    protected $fillable = [
        'animal_id',
        'estate_id',
        'veterinarie_id',
        'topic',
        'description',
        'date',
        'disease',     
        'next_date',   
        'status'];
    
    public function estate()
    {
        return $this->belongsTo( Estate::class , 'estate_id');
      
    }
}
