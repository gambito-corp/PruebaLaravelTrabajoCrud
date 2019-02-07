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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('/gestion', 'ContactoController@index')->name('contacto.gestion');
route::get('/contactanos', 'ContactoController@create')->name('contacto.contactanos');
route::post('/guardar', 'ContactoController@store')->name('contacto.guardar');
route::get('/perfil/{id}', 'ContactoController@show')->name('contacto.perfil');
route::get('/editar/{id}', 'ContactoController@edit')->name('contacto.editar');
route::post('/actualizar', 'ContactoController@update')->name('contacto.actualizar');
route::get('/eliminar/{id}', 'ContactoController@destroy')->name('contacto.eliminar');
