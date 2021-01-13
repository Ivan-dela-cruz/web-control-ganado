<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPurchase extends Model
{
    protected $table = 'detail_purcharses';
    protected $fillable = [
        'purcharse_id',
        'description',
        'quanity',
        'price_unit',
        'price_total',
        'status',
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class,'purcharse_id');
    }
}
