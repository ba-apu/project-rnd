<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManualData extends Model
{
    protected $guarded=[];
    public function projects(){
    	return $this->hasOne('App\Project','id','project_id');
    }
    public function indicators(){
    	return $this->hasOne('App\Indicator','id','indicator_id');
    }
}
