<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MongoModel extends Eloquent
{
    protected $connection = 'mongodb';
    protected $dates = ['date'];
    protected $collection;
    public $timestamps = false;

    public function  __construct($table='drrs'){
        $this->collection=$table;
    }

    public static function setCollection($collection)
    {
        return new self($collection);
    }
}
