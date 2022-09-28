<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringSetting extends Model
{
    protected $table="monitoring_settings";

    public function projects()
    {
        return $this->belongsTo('App\Project','project_id','id');
    }
    public function product_owners()
    {
        return $this->belongsTo('App\User','product_owner','id');
    }
    public function team_leads()
    {
        return $this->belongsTo('App\User','team_lead','id');
    }
    public function cluster_heads()
    {
        return $this->belongsTo('App\User','cluster_head','id');
    }
    public function managements_id()
    {
        return $this->belongsTo('App\User','management','id');
    }
}
