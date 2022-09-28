<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkPlan extends Model
{
    protected $table = 'work_plans';

    public function projects(){
    	return $this->hasOne('App\Project','id','project_id');
    }
}
