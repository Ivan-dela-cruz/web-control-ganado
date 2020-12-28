<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employ extends Model
{
    use SoftDeletes;
    protected $table = 'students';
   
    protected $fillable = [
        'user_id',
        'estate_id',
        'name',
        'last_name',
        'url_image',
        'phone',
        'address',
        'email',
        'start_date',
        'end_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }
}
