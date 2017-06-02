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
//
Route::get('/', [
  'uses' => 'QuoteController@getHome',
  'as' => 'home'
]);

Route::post('/new', [
 'uses' => 'QuoteController@postQuote',
 'as' => 'create'
]);

Route::get('/delte/{quote_id}', [
 'uses' => 'QuoteController@deleteQuote',
 'as' => 'delete'
]);
