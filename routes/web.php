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

Route::get('todos/{todo}', 'ToDosController@show');

//Route for create To Do page
Route::get('new-todo', 'ToDosController@create');

//Route for saving To Do page
Route::post('save-todo', 'ToDosController@store');

//Route for getting To Do
Route::get('/todos/{todo}/edit', 'ToDosController@edit');

//Route for updating To Do deatils
Route::post('todos/{todo}/update-todos', 'TodosController@update');

//Route for deleting To Do
Route::get('todos/{todo}/delete', 'TodosController@destory');
