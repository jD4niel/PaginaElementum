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

Route::get('/', 'LibroController@index')->name('index');
Route::get('/descarga_manual','LibroController@descarga')->name('libros.manual');
Route::get('/colecciones','LibroController@colecciones')->name('libros.colecciones');
Route::get('/colecciones/buscar','LibroController@buscar')->name('buscar.libros');
Route::get('/colecciones/libros','LibroController@ver')->name('ver.libros');
Route::get('/contacto','LibroController@contacto')->name('contacto.elementum');
Route::get('/nosotros','LibroController@nosotros')->name('nosotros.elementum');
Route::get('/blog','EntradasController@blog')->name('blog.elementum');
Route::get('/blog/entrada/{id}','EntradasController@entrada')->name('blog.entrada.elementum');

Route::get('/colecciones/{id}','LibroController@detalle')->name('detalle.libros');

Route::get('/autores','LibroController@autors')->name('autores.libros');
Route::get('/autores/{id}','LibroController@autors_details')->name('autores.detalle');

Route::get('/ir','LibroController@ir')->name('det.libros');
/*Módulo de blog*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/entradas', 'EntradasController@index')->name('entradas')->middleware('auth');


//Usuario CRUD
Route::get('/usuarios', 'UserController@index')->name('users');
Route::delete('/usuario/borrar/{id}', 'UserController@destroy')->name('user.delete')->middleware('auth','admin');
Route::put('/usuario/modificar/{id}', 'UserController@update')->name('user.update')->middleware('auth','admin');
Route::get('/usuario/crear', 'UserController@createView')->name('user.crear')->middleware('auth','admin');

//Post
Route::get('/crear/entrada', 'EntradasController@go')->name('entrada')->middleware('auth');
Route::post('/crear/entrada/post', 'EntradasController@store')->name('crear.entrada')->middleware('auth');
Route::post('/alumno/subirfoto','EntradasController@uploadImg')->name('imagenes.up')->middleware('auth');

