<?php

namespace App;

use App\Scopes\ProjectScope;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ProjectScope);
    }
    public function user_team(){
        $team_display = array();
        $array_team = json_decode($this->teams);

        foreach ( $array_team as $team){
            $acl_team = $this->getTeamName($team);
            $team_display[] .= $acl_team->display_name;
        }

        return implode(", ", $team_display);
    }

    public function getTeamName($team){
        return Team::find($team);
    }

    public function projectcategories()
	{
		return $this->belongsTo('App\ProjectCategory','project_category_id');
	}

}
