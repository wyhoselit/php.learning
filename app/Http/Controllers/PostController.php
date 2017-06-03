<?php

namespace App\Http\Controllers;


class PostController extends Controller
{
  public function getBlogIndex(){
    //fetch posts and paginate
    return view('frontend.blog.index');
  }

  public function getSingleBlog($post_id,$end='frontend'){

    //fetch $post_id
    return view($end . '.blog.single');
  }
  
}
