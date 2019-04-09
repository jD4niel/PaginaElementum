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
Route::get('/colecciones/buscar/autores','LibroController@buscarAutores')->name('buscar.autores');
Route::get('/colecciones/libroInds','LibroController@ver')->name('ver.libros');
Route::get('/contacto','LibroController@contacto')->name('contacto.elementum');
Route::get('/nosotros','LibroController@nosotros')->name('nosotros.elementum');
Route::get('/actividades','LibroController@elementario')->name('elementario.elementum');
Route::get('/blog','BlogController@index')->name('blog.elementum');
Route::get('/control/entrada/{id}','EntradasController@entrada')->name('control.entrada.elementum');
Route::get('/blog/entrada/{id}','BlogController@show')->name('blog.entrada.elementum');
Route::get('/blog/{tipo}','BlogController@indexPorSeccion')->name('blog.secciones');
Route::post('/blog/busqueda', 'BlogController@search')->name('blog.search');
Route::get('/blog/entradas/{etiquetas}', 'BlogController@searchTag')->name('blog.search.tag');


Route::get('/info','PDFController@info')->name('info');
Route::get('/colecciones/{id}','LibroController@detalle')->name('detalle.libros');
Route::get('/autores','LibroController@autors')->name('autores.libros');
Route::get('/autores/{id}','LibroController@autors_details')->name('autores.detalle');
Route::get('/ir','LibroController@ir')->name('det.libros');
/*Módulo de blog*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/entradas', 'EntradasController@index')->name('entradas')->middleware('auth');
Route::post('/crear/banner', 'BlogController@upBanner')->name('up.banner')->middleware('auth');
Route::get('/admin-portada', 'BlogController@adminPortada')->name('admin.portada')->middleware('auth');
Route::post('/posiciones/portada', 'BlogController@portadaPos')->name('pos.portada')->middleware('auth');
Route::post('/add/blog-section', 'BlogController@newSection')->name('add.section')->middleware('auth');
Route::post('/edit/blog-section', 'BlogController@editSection')->name('edit.section')->middleware('auth');
Route::post('/delete/blog-section', 'BlogController@deleteSection')->name('delete.section')->middleware('auth');




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
//Editar pestañas Elementum
Route::get('/editar/pestañas', 'ControlController@editPageTabs')->name('editarPestañasPagina')->middleware('auth');
Route::post('/editar/subir/imagen', 'TabsController@uploadTabImage')->name('uploadTabImage')->middleware('auth');
Route::get('/editar/nosotros', 'TabsController@nosotrosTab')->name('nosotrosTab')->middleware('auth');
Route::post('/editar/nosotros/save', 'TabsController@saveUsTab')->name('saveUsTab')->middleware('auth');
Route::get('/editar/autores', 'TabsController@autoresTab')->name('autoresTab')->middleware('auth');
Route::get('/editar/contacto', 'TabsController@contactoTab')->name('contactoTab')->middleware('auth');
Route::get('/editar/colecciones', 'TabsController@coleccionesTab')->name('coleccionesTab')->middleware('auth');
Route::get('/integrantes', 'TabsController@integrantesTab')->name('integrantesTab')->middleware('auth');
Route::get('/integrantes/editar/{id}', 'TabsController@editUser')->name('modifica.usuario')->middleware('auth');
Route::post('/integrantes/borrar/{id}', 'TabsController@deleteUser')->name('elimina.usuario')->middleware('auth');
Route::post('/home/userimg', 'TabsController@changeUserImage')->name('imagen.usuario')->middleware('auth');
//Vista previa edición
Route::post('/editar/{name}/preview', 'TabsController@preview')->name('preview')->middleware('auth');

//Editar portada elementum
Route::get('/editar', 'ControlController@index')->name('editarpagina')->middleware('auth');
Route::post('/editar/slider', 'ControlController@slider')->name('editar.slider')->middleware('auth');
Route::post('/editar/slider/imagen','ControlController@uploadImage')->name('slide.up')->middleware('auth');
Route::post('/editar/slider/nueva','ControlController@uploadNewImage')->name('new.slide.up')->middleware('auth');
Route::post('/editar/slider/borrar/{id}', 'ControlController@destroy')->name('slider.delete')->middleware('auth');
Route::get('/editar/nuevo/taller', 'ControlController@taller')->name('new.taller')->middleware('auth');
Route::get('/editar/taller/{id}', 'ControlController@EditarTaller')->name('edit.taller')->middleware('auth');
Route::post('/editar/taller/data/{id}', 'TallerController@edit')->name('edit.taller.data')->middleware('auth');
Route::post('/editar/taller/editar', 'ControlController@EditarTallerSend')->name('edit.taller.send')->middleware('auth');
Route::post('/agregar/taller/nuevo', 'TallerController@create')->name('new.taller.send')->middleware('auth');
Route::delete('/editar/taller/borrar/{id}', 'ControlController@destroyTaller')->name('taller.delete')->middleware('auth');
Route::post('/editar/pdf','ControlController@uploadPDF')->name('new.pdf.up')->middleware('auth');
Route::get('/editar/entrada/{id}', 'EntradasController@edit')->name('edit.post')->middleware('auth');
Route::post('/actualizar/entrada/', 'EntradasController@update')->name('update.post')->middleware('auth');
Route::get('/borrar/entrada/{id}', 'EntradasController@destroy')->name('delete.post')->middleware('auth');
Route::post('/editar/servicio/nuevo','ControlController@uploadNewService')->name('new.service')->middleware('auth');
Route::post('/editar/servicio/{id}','ControlController@editService')->name('edit.service')->middleware('auth');
Route::post('/editar/borrar/servicio/{id}','ControlController@deleteService')->name('delete.service')->middleware('auth');

//Editar Libros y autores
Route::get('/crear/libro', 'ControlController@createBook')->name('crear.libro')->middleware('auth');
Route::get('/crear/autor', 'ControlController@createAutor')->name('crear.autor')->middleware('auth');
Route::post('/guardar/autor', 'IntegrantesController@store')->name('save.autor')->middleware('auth');
Route::put('/control/order/save', 'TabsController@orderAutorSave')->name('change_autor_order_save')->middleware('auth');
Route::get('/control', 'ControlController@control')->name('control.gral')->middleware('auth');
Route::post('/crear/libro/data', 'ControlController@AgregarLibro')->name('guardar.libro')->middleware('auth');
Route::post('/crear/autor/data', 'ControlController@AgregarAutor')->name('guardar.autor')->middleware('auth');
Route::post('/editar/usuario/{id}', 'IntegrantesController@edit')->name('edit.user')->middleware('auth');
Route::post('/editar/libro/', 'LibroController@update')->name('editar.libro')->middleware('auth');
Route::post('/editar/autor/', 'AutorController@update')->name('editar.autor')->middleware('auth');
Route::post('/control/autor/borrar/{id}', 'AutorController@destroy')->name('borra.autor')->middleware('auth');
Route::post('/control/libro/borrar/{id}', 'LibroController@destroy')->name('borra.libro')->middleware('auth');
Route::get('/control/autor/{id}', 'AutorController@edit')->name('modifica.autor')->middleware('auth');
Route::get('/control/libro/{id}', 'LibroController@libroInd')->name('modifica.libro')->middleware('auth');

Route::post('/upload_image','CkeditorController@uploadImage')->name('upload.ck');


//Elementario
Route::get('/actividades/controlador', 'ElementarioController@indexController')->name('elementario.index.controller')->middleware('auth');
Route::post('/actividades/controlador/mes/', 'ElementarioController@updateMonth')->name('elementario.update.month')->middleware('auth');
Route::post('/actividades/controlador/seccion/', 'ElementarioController@updateSection')->name('elementario.update.section')->middleware('auth');
Route::get('/actividades/controlador/seccion/{id}', 'ElementarioController@individualSection')->name('elementario.individual.section')->middleware('auth');
Route::post('/actividades/controlador/borrar/seccion/{id}', 'ElementarioController@destroy')->name('section.delete')->middleware('auth');
Route::post('/actividades/controlador/borrar/servicio/{id}', 'ElementarioController@destroyService')->name('service.delete')->middleware('auth');
Route::post('/actividades/controlador/editar/seccion/{id}', 'ElementarioController@editSection')->name('section.edit')->middleware('auth');
//Elementum
Route::get('/elementum/info', 'ElementumController@info')->name('elementum.info')->middleware('auth');
Route::post('/elementum/info/save', 'ElementumController@infoSave')->name('elementum.info.save')->middleware('auth');
Route::post('/editar/colecciones/add', 'ElementumController@collectionAdd')->name('elementum.collection.save')->middleware('auth');
Route::post('/editar/colecciones/borrar/coleccion/{id}', 'ElementumController@destroy')->name('elementum.collection.delete')->middleware('auth');
Route::post('/editar/colecciones/coleccion/{id}', 'ElementumController@editCollection')->name('elementum.collection.edit')->middleware('auth');
Route::get('/elementum/footer', 'ElementumController@footer')->name('elementum.footer')->middleware('auth');


//Entradas para Elementario
Route::get('/actividades/controlador/entrada/{id}', 'ElementarioController@entry')->name('section.entry')->middleware('auth');
Route::get('/actividades/seccion/{id}', 'ElementarioController@section')->name('section.tab');



//Aviso de Privacidad
Route::get('/aviso-de-privacidad', 'ControlController@politicaCompleta')->name('politica');
Route::post('/politica/editar/{id}', 'ControlController@editarPolitica')->name('politica.edit')->middleware('auth');
