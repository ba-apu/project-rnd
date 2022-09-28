<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table = 'project_categories';

	public function projects()
	{
		return $this->belongsTo('App\Project','id','project_category_id');
	}
}
