<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    public function projects(){
    	return $this->hasOne('App\Project','id','project_id');
    }
}
