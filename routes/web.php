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
/*RUTAS DE CRUD CLIENTE*/
Route::get('customers', 'CustomerController@index');
Route::get('customers/create', 'CustomerController@create');
Route::post('customers/save', 'CustomerController@save');
Route::get('customers/edit/{id}', 'CustomerController@edit');
Route::post('customers/update/{id}', 'CustomerController@update');
Route::get('customers/delete/{id}', 'CustomerController@delete');
