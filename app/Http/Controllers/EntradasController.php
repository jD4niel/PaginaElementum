<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Blog;
use App\Entradas;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\DatesTranslator;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

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
    public function go(){
        return view('blog.create-post');
    }
    public function entrada($id){
        Date::setLocale('es');
        $entrada=Entradas::findOrFail($id);
        $fecha=$entrada->created_at->format('d M');
        $autor = Autor::find($entrada->user_id);
        return view('blog.entrada-blog',compact('entrada','fecha','autor'));
    }

    public function blog(){
        $entrada= Entradas::all();
        return view('blog.blog');
    }

    public function uploadImg(Request $request){

        //DB::beginTransaction();
        try{

            $data = $request;
            $file = $data["file"];
                $filename_img = $file->getClientOriginalName();
                $mime = $file->getMimeType();

                if (($mime == 'image/jpeg') || ($mime == 'image/jpg' ) || ($mime == 'image/png') || ($mime == 'image/PNG')) {

                    $destinationPath = public_path() . '/images/entradas';
                    $filename_img = $file->getClientOriginalName();
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true);
                    }
                    $destinationPath1 = $destinationPath . '/' . $filename_img;

                    copy($file, $destinationPath1);
                    return $data;
                } else {
                    return $mime;
                    abort(500);
                }
        }catch (\Exception $e){
            //DB::rollBack();
            return $e . "mal we";
        }
       // DB::commit();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearEntradaFinal(Request $request)
    {
        try{
            if($request->hasFile('file')){
                $mime = $request->file->getMimeType();
                if (($mime == 'image/jpeg') || ($mime == 'image/jpg' ) || ($mime == 'image/png') || ($mime == 'image/PNG')) {
                    $destinationPath = public_path() . '/images/entradas';
                    $fileName = $request->file->getClientOriginalName();
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true);
                    }
                    $finalPath = $destinationPath . '/' . $fileName;
                    copy($request->file, $finalPath);
                }
                $entrada = new Entradas();
                $entrada->intro = $request['intro'];
                $entrada->imagen = $fileName;
                $entrada->nombre = $request['nombre'];
                $entrada->texto = $request['texto'];
                $entrada->user_id = $request['user_id'];
                $entrada->etiquetas = $request['etiquetas'];
                $entrada->save();
                return $entrada;
            }
        }catch (\Exception $e){
            return abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada = new Entradas();
        $entrada->intro=$request['intro'];
        $entrada->imagen=$request['imagen'];
        $entrada->nombre=$request['titulo'];
        $entrada->texto=$request['texto'];
        $entrada->user_id=$request['autor'];
        $entrada->etiquetas=$request['etiquetas'];
        $entrada->save();
        return response()->json($entrada);
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
use Illuminate\Support\Facades\DB;
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entradas  $entradas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada = Entradas::findOrFail($id);
        $autor = Autor::findOrFail($entrada->user_id);
        $autores = Autor::all();

        return view('blog.edit-post', compact('entrada', 'autores', 'autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entradas  $entradas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        try{
            if($request->hasFile('file')){
                $mime = $request->file->getMimeType();
                if (($mime == 'image/jpeg') || ($mime == 'image/jpg' ) || ($mime == 'image/png') || ($mime == 'image/PNG')) {
                    $destinationPath = public_path() . '/images/entradas';
                    $fileName = $request->file->getClientOriginalName();
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true);
                    }
                    $finalPath = $destinationPath . '/' . $fileName;
                    copy($request->file, $finalPath);

                    $entrada = Entradas::where('id',$request->id)->update([
                        'intro' => $request['intro'],
                        'imagen' => $fileName,
                        'nombre' => $request['nombre'],
                        'texto' => $request['texto'],
                        'user_id' => $request['user_id'],
                        'etiquetas' => $request['etiquetas'],
                    ]);
                    return $entrada;
                }
            } else {
                $fileName = $request['imagen'];

                $entrada = Entradas::where('id',$request->id)->update([
                    'intro' => $request['intro'],
                    'imagen' => $fileName,
                    'nombre' => $request['nombre'],
                    'texto' => $request['texto'],
                    'user_id' => $request['user_id'],
                    'etiquetas' => $request['etiquetas'],
                ]);
                return $entrada;
            }
//        }catch (\Exception $e){
//            return abort(403, 'Unauthorized action.');
//        }
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
