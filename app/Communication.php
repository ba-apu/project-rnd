<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $table='communications';
    protected $fillable=['project_id','division_id','district_id','upazila_id','union_id','total_citizen','total_citizen_reached_through_hdm','total_citizen_reached_through_aci','data','provided_date'];
}
