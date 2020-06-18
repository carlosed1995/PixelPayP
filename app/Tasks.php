<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function statusTask(){
    return $this->hasMany('App\TaskStatus');
    }
}
 