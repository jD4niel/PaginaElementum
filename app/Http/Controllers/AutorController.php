<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::where('id','<','999')->get();
        $sections = DB::table('clasificacion')->get();
        return view('blog.create-post',compact('autores', 'sections'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = Autor::find($id);
        return view('controller.editar-autor', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        try{
            $taller = DB::table('autors')
                ->where('id','=',$request->id)
                ->update([
                    'nombre'=>$request->nombre,
                    'apellido_p'=>$request->apa,
                    'apellido_m'=>$request->apm,
                    'breve_desc'=>$request->des,
                    'is_blog_writer'=>$request->is_blog_writer,
                    'show_in_page'=>$request->show_in_us_tab,
                    'facebook'=>$request->face_in,
                    'twitter'=>$request->twitter_in,
                    'instagram'=>$request->insta_in,
                    'semblanza'=>$request->sem,
                ]);
                if (($request->hasFile('file'))) {
                    $destinationPath = public_path() . '/images/fotos_autores/';
                    $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
                    copy($request->file('file'), $destinationPath1);
                    DB::table('autors')->where('id','=',$request->id)->update(['imagen'=>$request->file('file')->getClientOriginalName()]);
                    return "Image uploaded".$request;
                }else {
                    return "funciona \n\n".$taller;
                }
        }catch (Exception $e) {
            return "error".$e;   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = DB::table('autors')->where('id', $id)->delete();
        return response()->json($slider);
    }
}
