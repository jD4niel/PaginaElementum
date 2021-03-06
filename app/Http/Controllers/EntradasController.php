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
        $entrada_sections = DB::table('entrada_sections')->where('entradas_id','>',0)->pluck('entradas_id')->all();
        $entradas = Entradas::whereNotIn('id',$entrada_sections)->get();
        $elementum = DB::table('elementum_info')->where('id', '=', 1)->first();

        return view('blog.entrada', compact('entradas', 'entradas'));
    }

    public function go()
    {
        $sections = DB::table('clasificacion')->all();
        return view('blog.create-post', compact('sections'));
    }

    public function entrada($id)
    {
        $entrada = Entradas::findOrFail($id);
        $elementum = DB::table('elementum_info')->where('id', '=', 1)->first();

        $autor = Autor::findOrFail($entrada->user_id);
        $entrada['fecha'] = $entrada->created_at->format('d M');
        $entrada['autor'] = $autor->nombre . ' ' . $autor->apellido_p;


        $ep = Entradas::orderBy('visitas', 'DESC')->take(4)->get();
        foreach ($ep as $item) {
            $autor_e = Autor::findOrFail($item->user_id);
            $item['autor'] = $autor_e->nombre . ' ' . $autor_e->apellido_p;
            $item['fecha'] = $item->created_at->format('d M');
        }

        return view('blog.entrada-blog', compact('entrada', 'ep', 'autor'));
    }

    public function blog()
    {
        $entrada = Entradas::all();
        $elementum = DB::table('elementum_info')->where('id', '=', 1)->first();
        return view('blog.blog', compact('entradas'));
    }

    public function uploadImg(Request $request)
    {

        //DB::beginTransaction();
        try {

            $data = $request;
            $file = $data["file"];
            $filename_img = $file->getClientOriginalName();
            $mime = $file->getMimeType();

            if (($mime == 'image/jpeg') || ($mime == 'image/jpg') || ($mime == 'image/png') || ($mime == 'image/PNG')) {

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
        } catch (\Exception $e) {
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
        try {
            if ($request->hasFile('file')) {
                $mime = $request->file->getMimeType();
                if (($mime == 'image/jpeg') || ($mime == 'image/jpg') || ($mime == 'image/png') || ($mime == 'image/PNG')) {
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
                $entrada->visitas = 0;
                $entrada->clasificacion_id = $request['clasificacion_id'];
                $entrada->autor_externo = $request['autor_externo'];
                $entrada->save();

                if ($request['seccion_id'] != 0) {
                    try {
                        $entrada_sections = DB::table('entrada_sections')
                            ->insertGetId([
                                'section_obj_id' => $request['seccion_id'],
                                'entradas_id' => $entrada->id,
                            ]);
                    } catch (\Exception $e) {
                        return abort(403, 'Unauthorized action.');
                    }
                }
                return $entrada;
            }
        } catch (\Exception $e) {
            return abort(403, 'Unauthorized action.');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada = new Entradas();
        $entrada->intro = $request['intro'];
        $entrada->imagen = $request['imagen'];
        $entrada->nombre = $request['titulo'];
        $entrada->texto = $request['texto'];
        $entrada->user_id = $request['autor'];
        $entrada->etiquetas = $request['etiquetas'];
        $entrada->save();
        return response()->json($entrada);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entradas $entradas
     * @return \Illuminate\Http\Response
     */
    public function show(Entradas $entradas)
    {
        //
    }

    /**
     * use Illuminate\Support\Facades\DB;
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entradas $entradas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada = Entradas::findOrFail($id);
        $autor = Autor::findOrFail($entrada->user_id);
        $autores = Autor::all();
        $sections = DB::table('clasificacion')->get();
        $elementum = DB::table('elementum_info')->where('id', '=', 1)->first();

        return view('blog.edit-post', compact('entrada', 'autores', 'autor', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Entradas $entradas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            if ($request->hasFile('file')) {
                $mime = $request->file->getMimeType();
                if (($mime == 'image/jpeg') || ($mime == 'image/jpg') || ($mime == 'image/png') || ($mime == 'image/PNG')) {
                    $destinationPath = public_path() . '/images/entradas';
                    $fileName = $request->file->getClientOriginalName();
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true);
                    }
                    $finalPath = $destinationPath . '/' . $fileName;
                    copy($request->file, $finalPath);

                    $entrada = Entradas::where('id', $request->id)->update([
                        'intro' => $request['intro'],
                        'imagen' => $fileName,
                        'nombre' => $request['nombre'],
                        'texto' => $request['texto'],
                        'user_id' => $request['user_id'],
                        'etiquetas' => $request['etiquetas'],
                        'clasificacion_id' => $request['clasificacion_id'],
                        'autor_externo' => $request['autor_externo']
                    ]);
                    return response()->json($entrada);
                }
            } else {
                $fileName = $request['imagen'];

                $entrada = Entradas::where('id', $request->id)->update([
                    'intro' => $request['intro'],
                    'imagen' => $fileName,
                    'nombre' => $request['nombre'],
                    'texto' => $request['texto'],
                    'user_id' => $request['user_id'],
                    'etiquetas' => $request['etiquetas'],
                    'clasificacion_id' => $request['clasificacion_id'],
                    'autor_externo' => $request['autor_externo']
                ]);
                return response()->json($entrada);
            }

        } catch (\Exception $e) {
            return abort(403, 'Unauthorized action.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entradas $entradas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entradas::destroy($id);
	$entrada_sections = DB::table('entrada_sections')->where('entradas_id','=',$id)->get();
        if(isset($entrada_sections)){
		return redirect()->route('elementario.index.controller')->with('status', '¡Entrada eliminada con éxito!');
	}
        return redirect()->route('entradas')->with('status', '¡Entrada eliminada con éxito!');
    }
}
