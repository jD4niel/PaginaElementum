<?php

namespace App\Http\Controllers;

use App\Libro;
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
        $libros= Libro::orderBy('id', 'desc')->take(6)->get();
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
        return view::make('collection',compact('libros'));
    }
    public function ver(Request $request){
        $data = $request;
        $libros= Libro::where('nombre','like','%'.$data->nombre.'%')->get();
        return view::make('collection',compact('libros'));
    }
}
