<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable =[
        'estate_id',
        'title',
        'description',
        'date',
        'hour',
        'status'
    ];
    public function taskeable(){
        return $this->morphTo();
    }
}
