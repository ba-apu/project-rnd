<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoleMapping extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user_role_mapping';
    protected $guarded = ['id'];

}
