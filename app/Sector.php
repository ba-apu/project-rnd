<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectors';

    public function projects(){
    	return $this->hasOne('App\Project','id','project_id');
    }
}
