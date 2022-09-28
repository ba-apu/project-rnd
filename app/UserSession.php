<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    protected $fillable=['user_id','page','value'];
}
