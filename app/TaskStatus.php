<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
	protected $table = 'status_tasks';
    protected $fillable = [
        'tasks_id', 'status'
    ];

 
}
