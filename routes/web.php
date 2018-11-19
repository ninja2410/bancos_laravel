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


/*RUTAS CRUD BANCOS*/
Route::get('banks', 'BankController@index');
Route::get('banks/create', 'BankController@create');
Route::post('banks/save', 'BankController@save');
Route::get('banks/edit/{id}', 'BankController@edit');
Route::post('banks/update/{id}', 'BankController@update');
Route::get('banks/delete/{id}', 'BankController@delete');


/*RUTAS CRUD CUENTAS*/
Route::get('accounts', 'AccountController@index');
Route::get('accounts/create', 'AccountController@create');
Route::post('accounts/save', 'AccountController@save');
Route::get('accounts/edit/{id}', 'AccountController@edit');
Route::post('accounts/update/{id}', 'AccountController@update');
Route::get('accounts/delete/{id}', 'AccountController@delete');
