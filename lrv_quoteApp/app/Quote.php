<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function author(){
      return $this->belongTo('App\Author');
    }
}
