<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSale extends Model
{
    protected $table = 'detail_sales';
    protected $fillable = [
        'sale_id',
        'description',
        'quanity',
        'price_unit',
        'price_total',
        'status',
    ];
    public function sale(){
        return $this->belongsTo(Sale::class,'sale_id');
    }
}
