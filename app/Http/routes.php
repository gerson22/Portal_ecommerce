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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'LandingController@home');

Route::group(['middleware' => ['auth']], function () {
  Route::group(['prefix' => 'proveedores'], function () {
    Route::get('/','ProveedorController@home');
    Route::post('all','ProveedorController@all');
    Route::post('save','ProveedorController@save');
    Route::post('update','ProveedorController@update');
    Route::post('delete','ProveedorController@delete');
  });

  Route::group(['prefix' => 'categorias'], function () {
    Route::get('/','CategoriaController@home');
    Route::post('all','CategoriaController@all');
    Route::post('save','CategoriaController@save');
    Route::post('update','CategoriaController@update');
    Route::post('delete','CategoriaController@delete');
  });

  Route::group(['prefix' => 'productos'], function () {
    Route::get('/','ProductoController@home');
    Route::post('all','ProductoController@all');
    Route::post('save','ProductoController@save');
    Route::post('update','ProductoController@update');
    Route::post('delete','ProductoController@delete');
  });
});


Route::auth();

Route::get('/home', 'HomeController@index');
