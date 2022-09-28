<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	// Where user role is or is
	public function scopeWhereRoleIs($query, $role = '', $boolean = 'and') {
		$method = $boolean == 'and' ? 'whereHas' : 'orWhereHas';
		return $query->$method('roles', function ($roleQuery) use ($role) {
			$roleQuery->where('name', $role);
		});
	}

    public function user_role() {
        return $this->hasOne('App\Role', 'id', 'role');
    }

    /*public function user_team(){
	    $teams = $this->team;
        $team_display = array();
        $json_team = json_decode($teams);

        foreach ( $json_team as $team){
            $acl_team = $this->getTeamName($team);
            $team_display[] .= $acl_team->display_name;
        }

	    return implode(", ", $team_display);
    }*/

    public function getTeamName($team){
        return Team::find($team);
    }

	public function roleUpdate($new_roles){
		$roles = Role::all();

		$this->detachRoles($roles);
		$this->attachRole($new_roles);

		return $this;
	}

	public function teamUpdate($role, $team){
        $this->detachRoles($role, json_decode($team));
        $this->attachRole($role, $team);
    }

//    public function hasPermission($project_teams){
//        $team = Project::find($project_teams);
//	    foreach (json_decode($team->teams) as $project_team){
//            if($this->hasRole('admin', $project_team)){
//                dd('here');
//            }
//        }
//    }
}
