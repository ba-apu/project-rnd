<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QprTarget extends Model
{
    public function indicators(){
        return $this->hasOne('App\Indicator', 'id', 'indicator_id');
    }
}
