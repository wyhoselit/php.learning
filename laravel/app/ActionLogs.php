<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionLogs extends Model
{
    //
    //define relation
    public function action(){
      return $this->belongsTo('App\Action'); //one to many relation
    }
}
