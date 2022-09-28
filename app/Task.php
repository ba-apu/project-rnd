<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function projects(){
    	return $this->hasOne('App\Project','id','project_id');
    }

    public function sectors(){
    	return $this->hasOne('App\Sector','id','sector_id');
    }

    public function task_metas(){
    	return $this->hasMany('App\TaskMeta','task_id','id');
    }
}
