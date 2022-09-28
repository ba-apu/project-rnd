<?php

namespace App;

use Doctrine\Common\Inflector\Inflector;
use Illuminate\Support\Facades\Schema;
use Mockery\Exception;
use DB;
use App\MongoModel;
use App\Service;
use App\Project;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    public static function get_project_status($project_id,$date)
    {

    }
}
