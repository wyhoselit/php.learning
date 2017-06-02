<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function logged_actions(){
      return $this->hasMany('App\ActionLogs');
    }

    public function categories(){
      return $this->belongsToMany('App\Category','categories_actions');
    }

}
