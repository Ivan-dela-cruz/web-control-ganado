<?php

namespace App;

use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purcharses';
    protected $fillable = [
        'id',
        'estate_id',
        'date',
        'total',
        'description',
        'status',
    ];

    /*protected static function booted()
    {
        static::addGlobalScope(new StatusScope());
    }*/

    public function details()
    {
        return $this->hasMany(DetailPurchase::class,'purcharse_id');
    }

    public function estate(){
        return $this->belongsTo(Estate::class,'estate_id');
    }
}
