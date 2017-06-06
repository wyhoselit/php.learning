<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Post;
use App\Category;

class PostController extends Controller
{
  public function getBlogIndex(){
    //fetch posts and paginate
    $posts = Post::paginate(5);
    foreach ($posts as $post) {
      $post->body = $this->shortenText($post->body, 20);
    }
    return view('frontend.blog.index',['posts'=> $posts]);
  }

  public function getAdminPost(){
    //fetch posts and paginate
    $posts = Post::paginate(5);
    foreach ($posts as $post) {
      $post->body = $this->shortenText($post->body, 20);
    }
    return view('admin.blog.index',['posts'=> $posts]);
  }


  public function getSingleBlog($post_id,$end='frontend'){

    //fetch $post_id
    return view($end . '.blog.single');
  }

  public function getCreatePost()
  {

    return view('admin.blog.create_post');
  }

  public function postCreatePost(Request $request){
    $this->validate($request,[
      'title'=> 'required|max:120|unique:posts',
      'author'=> 'required|max:80',
      'body'=> 'required'
    ]);
    $post = new Post();
    $post->title = $request->title;
    $post->author = $request->author;
    $post->body = $request->body;
    $post->save();
    //Attach Categories;


    return redirect()
          ->route('admin.index')
          ->with(['success'=> 'Post successfuly created']);
  }

  private function shortenText($text, $limit_char){
    if(str_word_count($text,0)> $limit_char){
      $word = str_word_count($text,2); //get Array
      $pos = array_keys($word);
      $text = substr($text,0, $pos[$limit_char]) . '...';
    }
    return $text;
  }
}
