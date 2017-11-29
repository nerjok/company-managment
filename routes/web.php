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



Route::get('exit', function () {
    return view('home');
})->name('errors'); 

Route::post('/lang', 'SessionController@lang');


Route::get('', 'GuestController@index')->name('home');


Route::get('employees', 'UsersController@index');

Route::get('update/{user}', 'UsersController@edit');
Route::post('update/{user}', 'UsersController@update');

Route::get('delete/{user}', 'UsersController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index');


/********** Profesions links **********/

Route::post('posreg', 'ProfessionController@store');

Route::get('positions', 'ProfessionController@index');
Route::get('positions/new', 'ProfessionController@create')->middleware('auth');

Route::get('posupd/{profession}', 'ProfessionController@edit');

Route::post('posupd/{profession}', 'ProfessionController@update');




/***************** Create Tasks **************************/

Route::get('task/edit/{task}', 'TaskController@edit');

Route::get('task', 'TaskController@index')->middleware('dir');

Route::get('task/{user}', 'TaskController@create');

Route::put('task', 'TaskController@store');

Route::post('task/{task}', 'TaskController@update');



//********************* My tasks ***************
Route::get('mytask', 'MyTaskController@index');//tasks list

Route::get('mytask/{task}', 'MyTaskController@edit');//delete

Route::post('mytask/{task}', 'MyTaskController@update');


//*********** Get file ****

Route::get('testfiles/{file}', 'MyTaskController@retrieve');




/***** Settings *************/

Route::post('count', 'SessionController@entryCnt');




