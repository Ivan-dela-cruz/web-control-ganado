<?php

namespace App;

use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employ extends Model
{
    use SoftDeletes;
    protected $table = 'employs';
   
    protected $fillable = [
        'user_id',
        'estate_id',
        'name',
        'last_name',
        'dni',
        'url_image',
        'phone',
        'address',
        'email',
        'start_date',
        'end_date',
        'status'
    ];
    protected static function booted()
    {
        static::addGlobalScope(new StatusScope());
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }
}
