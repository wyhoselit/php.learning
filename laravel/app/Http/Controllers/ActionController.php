<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Action;
use App\ActionLogs;
use DB;
class ActionController extends Controller
{

  public function getHome(){
    $actions = Action::orderby('vote','desc')->get();
    // $actions = DB::table('actions')->get();

    $logged_actions = ActionLogs::whereHas('action', function($query){
        $query->where('name','=','Blog');
        })
        ->paginate(5);
        // ->take(5)
        // ->get();
    // $query = DB::table('action_logs')
    //         ->join('actions','action_logs.action_id','=','actions.id')
    //         ->where('actions.name','=','Blog')
    //         ->get();
    //
    // $query = DB::table('action_logs')
    //         ->join('actions','action_logs.action_id','=','actions.id')
    //         // ->where('actions.name','=','Blog')
    //         ->count();
    //
    // $query = DB::table('action_logs')
    //         ->join('actions','action_logs.action_id','=','actions.id')
    //         // ->where('actions.name','=','Blog')
    //         ->max('action_id');
    // $query = DB::table('action_logs')
    //     ->insert([
    //       'action_id' => DB::table('actions')
    //                       ->select('id')
    //                       ->where('name','Blog')
    //                       ->first()
    //                       ->id
    //     ]);
    // $query = DB::table('action_logs')
    //     ->insertGetId([
    //       'action_id' => DB::table('actions')
    //                       ->select('id')
    //                       ->where('name','Blog')
    //                       ->first()
    //                       ->id
    //     ]);
    // $newaction = Action::where('name','like','newaction%')
    //     ->first();
    //     if($newaction){
    //       $newaction->name = $newaction->name.'-update';
    //       $newaction->update();
    //     }
    // $firstlogDel = ActionLogs::first();
    // if($firstlogDel){
    //   $firstlogDel->delete();
    // }
    // ,'query'=>$query
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
