<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Controller User
Route::resource('user', 'UserController');
Route::get('user/{user}/restore', ['as' => 'user.restore','uses' => 'UserController@restore']);
Route::get('user/{user}/delete', ['as' => 'user.delete','uses' => 'UserController@delete']);

// Controller Karyawan
Route::resource('karyawan', 'KaryawanController');
Route::get('karyawan/{karyawan}/restore', ['as' => 'karyawan.restore','uses' => 'KaryawanController@restore']);
Route::get('karyawan/{karyawan}/delete', ['as' => 'karyawan.delete','uses' => 'KaryawanController@delete']);

// Controller Pelanggan
Route::resource('pelanggan', 'PelangganController');
Route::get('pelanggan/{pelanggan}/restore', ['as' => 'pelanggan.restore','uses' => 'PelangganController@restore']);
Route::get('pelanggan/{pelanggan}/delete', ['as' => 'pelanggan.delete','uses' => 'PelangganController@delete']);

// Controller BTS
Route::resource('bts', 'BtsController');
Route::get('bts/{bts}/restore', ['as' => 'bts.restore','uses' => 'BtsController@restore']);
Route::get('bts/{bts}/delete', ['as' => 'bts.delete','uses' => 'BtsController@delete']);

// Controller Invoice
Route::resource('invoice', 'InvoiceController');
Route::get('invoice/{invoice}/restore', ['as' => 'invoice.restore','uses' => 'InvoiceController@restore']);
Route::get('invoice/{invoice}/delete', ['as' => 'invoice.delete','uses' => 'InvoiceController@delete']);
Route::get('invoice/{invoice}/bayar', ['as' => 'invoice.bayar','uses' => 'InvoiceController@bayar']);