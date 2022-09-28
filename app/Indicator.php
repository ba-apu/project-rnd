<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = 'indicators';
    protected $guarded = ['id'];
    public function projects(){
    	return $this->hasOne('App\Project','id','project_id');
    }
}
