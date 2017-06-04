<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
  public function getIndex(){
    //fetch posts and paginate
    return view('admin.index');
  }


}
