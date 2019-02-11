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
Route::get('/colecciones/libroInds','LibroController@ver')->name('ver.libros');
Route::get('/contacto','LibroController@contacto')->name('contacto.elementum');
Route::get('/nosotros','LibroController@nosotros')->name('nosotros.elementum');
Route::get('/elementario','LibroController@elementario')->name('elementario.elementum');
Route::get('/blog','BlogController@index')->name('blog.elementum');
Route::get('/blog/entrada/{id}','EntradasController@entrada')->name('blog.entrada.elementum');

Route::get('/info','PDFController@info')->name('info');
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
Route::post('/usuario/borrar/{id}', 'UserController@destroy')->name('user.delete')->middleware('auth','admin');
Route::put('/usuario/modificar/{id}', 'UserController@update')->name('user.update')->middleware('auth','admin');
Route::get('/usuario/crear', 'UserController@createView')->name('user.crear')->middleware('auth','admin');

//Post
Route::get('/crear/entrada', 'EntradasController@go')->name('entrada')->middleware('auth');
Route::get('/crear/entrada', 'AutorController@index')->name('autor-entradas')->middleware('auth');
Route::post('/crear/entrada/post', 'EntradasController@crearEntradaFinal')->name('crear.entrada')->middleware('auth');
Route::post('/alumno/subirfoto','EntradasController@uploadImg')->name('imagenes.up')->middleware('auth');
//Route::post('/crear/final','EntradasController@crearEntradaFinal')->name('entrada-final')->middleware('auth');

//Subir PDFs
Route::get('/info/subir',function (){return view('controller.subirpdf');})->name('subirpdf')->middleware('auth');
Route::post('/info/pdf','PDFController@uploadPDF')->name('pdf.up')->middleware('auth');


Route::get('/editar', 'ControlController@index')->name('editarpagina')->middleware('auth');
Route::post('/editar/slider', 'ControlController@slider')->name('editar.slider')->middleware('auth');
Route::post('/editar/slider/imagen','ControlController@uploadImage')->name('slide.up')->middleware('auth');
Route::post('/editar/slider/nueva','ControlController@uploadNewImage')->name('new.slide.up')->middleware('auth');
Route::post('/editar/slider/borrar/{id}', 'ControlController@destroy')->name('slider.delete')->middleware('auth');
Route::get('/editar/nuevo/taller', 'ControlController@taller')->name('new.taller')->middleware('auth');
Route::get('/editar/taller/{id}', 'ControlController@EditarTaller')->name('edit.taller')->middleware('auth');
Route::get('/editar/taller/data/{id}', 'ControlController@EditarTallerDatos')->name('edit.taller.data')->middleware('auth');
Route::post('/editar/taller/editar', 'ControlController@EditarTallerSend')->name('edit.taller.send')->middleware('auth');
Route::post('/agregar/taller/nuevo', 'ControlController@AgregarTallerSend')->name('new.taller.send')->middleware('auth');
Route::delete('/editar/taller/borrar/{id}', 'ControlController@destroyTaller')->name('taller.delete')->middleware('auth');
Route::post('/editar/pdf','ControlController@uploadPDF')->name('new.pdf.up')->middleware('auth');
Route::get('/editar/entrada/{id}', 'EntradasController@edit')->name('edit.post')->middleware('auth');
Route::post('/actualizar/entrada/', 'EntradasController@update')->name('update.post')->middleware('auth');


Route::get('/crear/libro', 'ControlController@createBook')->name('crear.libro')->middleware('auth');
Route::get('/crear/autor', 'ControlController@createAutor')->name('crear.autor')->middleware('auth');
Route::get('/control/', 'ControlController@control')->name('control.gral')->middleware('auth');
Route::post('/crear/libro/data', 'ControlController@AgregarLibro')->name('guardar.libro')->middleware('auth');
Route::post('/crear/autor/data', 'ControlController@AgregarAutor')->name('guardar.autor')->middleware('auth');
Route::post('/editar/libro/', 'LibroController@update')->name('editar.libro')->middleware('auth');
Route::post('/editar/autor/', 'AutorController@update')->name('editar.autor')->middleware('auth');
Route::post('/control/autor/borrar/{id}', 'AutorController@destroy')->name('borra.autor')->middleware('auth');
Route::post('/control/libro/borrar/{id}', 'LibroController@destroy')->name('borra.libro')->middleware('auth');
Route::get('/control/autor/{id}', 'AutorController@edit')->name('modifica.autor')->middleware('auth');
Route::get('/control/libro/{id}', 'LibroController@libroInd')->name('modifica.libro')->middleware('auth');

Route::post('/upload_image','CkeditorController@uploadImage')->name('upload.ck');





//Elementario
Route::get('/elementario/controlador', 'ElementarioController@indexController')->name('elementario.index.controller')->middleware('auth');
Route::post('/elementario/controlador/mes/', 'ElementarioController@updateMonth')->name('elementario.update.month')->middleware('auth');
Route::post('/elementario/controlador/seccion/', 'ElementarioController@updateSection')->name('elementario.update.section')->middleware('auth');
Route::get('/elementario/controlador/seccion/{id}', 'ElementarioController@individualSection')->name('elementario.individual.section')->middleware('auth');





