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

Route::get('/', function () {
    return view('home');
});


Route::get('/blog', function () {
    return view('actions.blog');
})->name('blog');
Route::get('/contact', function () {
    return view('actions.contact');
})->name('contact');
Route::get('/about', function () {
    return view('actions.about');
})->name('about');
