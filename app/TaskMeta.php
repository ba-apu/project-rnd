<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskMeta extends Model
{
    protected $fillable=['task_id','event_id','key','value'];

    public function projects(){
    	return $this->hasOne('App\Project','id','project_id');
    }

    public function tasks(){
    	return $this->hasOne('App\Task','id','task_id');
    }
    public function events(){
    	return $this->hasOne('App\Event','id','event_id');
    }
}
