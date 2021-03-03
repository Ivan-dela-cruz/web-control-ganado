<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';

    
    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }
    
}
