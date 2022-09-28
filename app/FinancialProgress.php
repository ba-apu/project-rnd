<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialProgress extends Model
{
    public function projects(){
    	return $this->hasOne('App\Project','id','project_id');
    }
}
