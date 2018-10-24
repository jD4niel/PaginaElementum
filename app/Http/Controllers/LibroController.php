<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Libro;
use View;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros= Libro::orderBy('id', 'desc')->take(8)->get();
        //dd($libros->imagen);
        return view('Elementum.home',compact('libros'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
    }
    public function descarga(){
        return response()->download(public_path('descarga.pdf'));
    }
    public function colecciones(){
        $libros= Libro::orderBy('id', 'desc')->get();
        //dd($libros->imagen);
        return view('Elementum.collection',compact('libros'));
    }
    public function buscar(Request $request){
        $data = $request;
        $libros= Libro::where('nombre','like','%'.$data->nombre.'%')->get();
        return response()->json($libros);
    }
    public function ver(Request $request){
        $data = $request;
        $libros= Libro::where('collection_id',$data->coleccion)->get();
        return  response()->json($libros);
    }
    public function detalle($id){
        $libros= Libro::find($id);
        $recomendados = Libro::where('collection_id',$libros->collection_id)->get();
        return view('libro',compact('libros','recomendados'));
    }
    public function ir(){
        return view('libro');
    }
    public function autors(){
        return view('Elementum.autors');
    }
    public function contacto(){
        return view('Elementum.contacto');
    }
    public function nosotros(){
        return view('Elementum.nosotros');
    }

}
