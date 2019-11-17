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
    return view('welcome');
});

// This route is to return a view to the browser.
/*Route::get ('about', function () {
    return view('about');
});*/

// This route is to return a controller to the browser.
// Route::get ('about', 'AboutController@index');

Route::get('todos', 'ToDosController@index');
