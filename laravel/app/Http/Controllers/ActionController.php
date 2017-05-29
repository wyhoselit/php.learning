<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;

class ActionController extends Controller
{
  public function getAction($action, $myname = null){
    return view('actions.'.$action, ['myname' => $myname]);
  }

  public function postAction(Request $request){
// https://laravel.com/docs/5.4/validation
    $this->validate($request,[
        'action' => 'required',
        'myname' => 'required|alpha'
    ]);
    //actual validation
    return view('actions.'.$request['action'],['myname' =>$this->changeName($request['myname'])]);

  }

  private function changeName($myname){
    $postfix = ' osElite';
    return strtoupper($myname) . $postfix;
  }
}
