<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $fillable = [
        'id',
        'estate_id',
        'date',
        'total',
        'description',
        'status',
    ];

    public function details()
    {
        return $this->hasMany(DetailSale::class,'sale_id');
    }

    public function estate(){
        return $this->belongsTo(Estate::class,'estate_id');
    }
}
