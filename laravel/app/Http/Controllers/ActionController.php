<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Action;
class ActionController extends Controller
{

  public function getHome(){
    $actions = Action::all();
    return view('home',['actions' => $actions]);
  }

  public function getAction($action, $myname = null){

    if($myname === null){
      $myname = 'osElit';
    }
    return view('actions.action', ['action' => $action,'myname' => $myname]);
  }

  public function postInsertAction(Request $request){
// https://laravel.com/docs/5.4/validation
    $this->validate($request,[
        'actionVote' => 'required|numeric',
        'name' => 'required|unique:actions'
    ]);
    $action = new Action();
    $action->name =ucfirst(strtolower($request->name));
    $action->vote = $request->actionVote;
    $action->save();
    return redirect()->route('home');
  }

  private function changeName($myname){
    $postfix = ' osElite';
    return strtoupper($myname) . $postfix;
  }
}
