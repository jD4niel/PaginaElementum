<?php

namespace App\Http\Controllers;

use App\Entradas;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas=Entradas::all();
        return view('blog.entrada',compact('entradas'));
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
     * @param  \App\Entradas  $entradas
     * @return \Illuminate\Http\Response
     */
    public function show(Entradas $entradas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entradas  $entradas
     * @return \Illuminate\Http\Response
     */
    public function edit(Entradas $entradas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entradas  $entradas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entradas $entradas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entradas  $entradas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entradas $entradas)
    {
        //
    }
}
