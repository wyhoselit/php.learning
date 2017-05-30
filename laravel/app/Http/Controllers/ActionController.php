<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Action;
use App\ActionLogs;

class ActionController extends Controller
{

  public function getHome(){
    $actions = Action::all();
    $logged_actions = ActionLogs::all();
    return view('home',['actions' => $actions,'logged_actions'=>$logged_actions]);
  }

  public function getAction($actionName, $myname = null){

    if($myname === null){
      $myname = 'osElit';
    }

    $action = Action::where('name',$actionName)->first();
    $action_log = new ActionLogs();
    $action->logged_actions()->save($action_log);

    return view('actions.action', ['action' => $actionName,'myname' => $myname]);
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
