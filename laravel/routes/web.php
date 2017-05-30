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
  'uses' => 'ActionController@getHome',
  'as' => 'home'
]);

Route::Group(['prefix' => 'do'], function(){
  Route::get('/{action}/{myname?}', [
      'uses' => 'ActionController@getAction',
      'as' => 'action'
    ]);
  Route::post('/add_action', [
     'uses' => 'ActionController@postInsertAction',
     'as' => 'add_action'
  ]);
});


Route::group(['middleware' =>['web']], function(){


});
