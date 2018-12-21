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
    return redirect('/w');
});
Route::post('register-store','UserController@registerstore');
Route::post('login-store','UserController@loginstore');
//Route::get('/','UserController@login');
Route::get('login','UserController@login');
Route::get('register','UserController@register');

Route::group(['middleware' => 'checkloggedin'], function(){




Route::get('logout', 'UserController@logout');
Route::get('/w', 'TableController@home');
Route::get('/user', 'TableController@user');

Route::post('insert','TableController@insert');
Route::get('edit/{id}','TableController@edit');
Route::post('update/{id}','TableController@update');

Route::get('delete/{id}','TableController@delete');

});