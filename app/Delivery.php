<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use SoftDeletes;
    protected $table = 'deliveries';
    protected $fillable = [
        'estate_id',
        'company_id',
        'ruc',
        'driver',
        'year',
        'date',
        'hour',
        'total_liters',
        'description',
        'type',
        'status'
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    
}
