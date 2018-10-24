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

Route::get('/colecciones/{id}','LibroController@detalle')->name('detalle.libros');

Route::get('/autores','LibroController@autors')->name('autores.libros');

Route::get('/ir','LibroController@ir')->name('det.libros');