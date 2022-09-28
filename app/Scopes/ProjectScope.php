<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;


class ProjectScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $project_access=Session::get('project_access');
        if($project_access == 'Limit')
        {
            $project_str=Session::get('project_ids');
            $arr=explode(',',$project_str);
            $builder->whereIn('id',$arr);
        }else{
            $user = auth('api')->user();
            if(!empty($user))
            {
                $project_owner=$user->project_owner;
                if($project_owner === "null" || $project_owner == "")
                {
                    $arr[0]=0;
                    $builder->whereNotIn('id', $arr);
                }else{
                    $project_owner=json_decode($project_owner,1);
                    $builder->whereIn('id',$project_owner);
                }
            }else{
                $arr[0]=0;
                $builder->whereNotIn('id', $arr);
            }
        }
        //$builder->where('id', '!=', 3);
    }
}