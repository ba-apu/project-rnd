<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageBroker extends Model
{
    protected $table='mq_config';
}
