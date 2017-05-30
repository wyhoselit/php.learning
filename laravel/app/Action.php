<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function logged_actions(){
      return $this->hasMany('App\ActionLogs');
    }
}
