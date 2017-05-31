<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function actions(){
      return $this->belongsToMany('App\Action','categories_actions');
    }
}
