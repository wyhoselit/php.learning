<?php

namespace App\Http\Controllers;

use App\Post;


class AdminController extends Controller
{
  public function getIndex(){
    //fetch posts and paginate
    $post = Post::orderby('created_at','desc')->take(5)->get();
    return view('admin.index',['posts'=> $post]);
  }


}
