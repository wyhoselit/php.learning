<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
  'uses' => 'PostController@getBlogIndex',
  'as' => 'blog.index'
]);

Route::get('/blog', [
  'uses' => 'PostController@getBlogIndex',
  'as' => 'blog.index'
]);
Route::get('/blog/{post_id}&{end}', [
  'uses' => 'PostController@getSingleBlog',
  'as' => 'blog.single'
]);

/*other Routes*/

Route::get('/about', function(){
  return view('frontend/other.about');
  }
)->name('about');
Route::get('/contact', [
  'uses' => 'ContactMessageController@getContactIndex',
  'as' => 'contact.index'
]);

Route::group([
  'prefix' => '/admin'
],function(){

  Route::get('/',[
    'uses' => 'AdminController@getIndex',
    'as' =>'admin.index'
  ]);
  Route::get('blog/categories', [
    'uses' =>'CategoryController@getCategoryIndex',
    'as'=> 'admin.blog.categories'
  ]);
  Route::get('/blog/posts',[
    'uses' => 'PostController@getAdminPost',
    'as' =>'admin.blog.post.index'
  ]);

  Route::get('/blog/posts/{postid}&{end}',[
    'uses' => 'PostController@getSingleBlog',
    'as' =>'admin.blog.post'
  ]);
  Route::get('/blog/post/create',[
    'uses' => 'PostController@getCreatePost',
    'as' =>'admin.blog.create.post'
  ]);

  Route::post('/blog/post/create',[
    'uses' => 'PostController@postCreatePost',
    'as' =>'admin.blog.create.post'
  ]);

  Route::get('/blog/category/create',[
    'uses' => 'CategoryController@getCreateCategory',
    'as' =>'admin.blog.create.category'
  ]);

  Route::post('/blog/category/create',[
    'uses' => 'CategoryController@postCreateCategory',
    'as' =>'admin.blog.create.category'
  ]);

  Route::get('/blog/posts/{post_id}/edit',[
    'uses' => 'PostController@getUpdatePost',
    'as' =>'admin.blog.post.edit'
  ]);

  Route::post('/blog/posts/update',[
    'uses' => 'PostController@postUpdatePost',
    'as' =>'admin.blog.post.update'
  ]);

    Route::get('/blog/posts/{post_id}/delete',[
      'uses' => 'PostController@getDeletePost',
      'as' =>'admin.blog.post.delete'
    ]);

});
