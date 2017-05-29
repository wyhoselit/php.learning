<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;

class ActionController extends Controller
{
  public function getAction($action, $myname = null){
    return view('actions.'.$action, ['myname' => $myname]);
  }

  public function postAction(Request $request){
    if(isset($request['action']) && $request['myname']){
      if(strlen($request['myname'])>0){

        return view('actions.'.$request['action'],['myname' =>$this->changeName($request['myname'])]);
      }
      return redirect()->back();
    }
    return redirect()->back();
  }

  private function changeName($myname){
    $postfix = ' osElite';
    return strtoupper($myname) . $postfix;
  }
}
