<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Blog;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Entradas;

class ElementarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('elementario_controller.elementario');
    }

    public function indexController()
    {
        $range = DB::table('month_range')->get();
        $title = DB::table('programming_section')->where('id','=',1)->get();
        $section_obj = DB::table('section_obj')->get();
        return view('elementario_controller.elementario_controller',compact('range','title','section_obj'));
    }

    /**
    * Actualizar los datos de la lista de meses
    */
    public function updateMonth(Request $request)
    {
        $ps = DB::table('programming_section')
        ->where('id','=',1)
        ->update([
            'name'=>$request[1],
        ]);
        for ($i=0; $i < 12; ++$i) {
            if(isset($request[0]['meses'][$i])){
                $range = DB::table('month_range')
                ->where('id','=',1+(int)$i)
                ->update([
                    'month'=>$i,
                    'text'=>$request[0]['meses'][$i],
                    'year'=>$request[0]['nombres'][$i],
                    'view_month'=>1,
                ]);
             }else{
                $range = DB::table('month_range')
                ->where('id','=',1+(int)$i)
                ->update([
                    'month'=>$i,
                    'text'=>null,
                    'year'=>null,
                    'view_month'=>0,
                ]);
             }
        }
        return response()->json($ps);

    }
    /**
    * Actualizar la lista de secciones 
    */
    public function updateSection(Request $request){
        if (($request->hasFile('file'))) {
            $section = DB::table('section_obj')
                ->insertGetId([
                    'name'=>$request->name,
                    'img'=>$request->file('file')->getClientOriginalName(),
                ]);
            $destinationPath = public_path() . '/images/secciones/headers/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
        }else {
            $section = DB::table('section_obj')
                ->insertGetId([
                    'name'=>$request->name,
                ]);
        }
        $section_entradas = DB::table('entrada_sections')
            ->insertGetId([
                'section_obj_id'=>$section,
            ]);
    }
    /**
     Editor de secciones individuales
     */
    public function individualSection($id)
    {
        $seccion_id = $id;
        $section_obj = DB::table('section_obj')->where('id',$id)->first();
        $entradas=DB::table('entrada_sections')
            ->join('entradas', 'entradas.id', '=', 'entrada_sections.entradas_id')
            ->join('section_obj', 'section_obj.id', '=', 'entrada_sections.section_obj_id')
            ->where('section_obj.id','=',$seccion_id)
            ->get();
        return view('elementario_controller.section_entrada',compact('entradas','seccion_id','section_obj'));
    }
    /**
        Enntradas desde Elementario
    */
    public function entry($id){
        $autores = DB::table('autors')->get();
        $seccion_id = $id;
        $section_obj = DB::table('section_obj')->where('id','=',$id)->first();
        $sections = DB::table('clasificacion')->get();
        return view('blog.create-post',compact('autores','seccion_id','section_obj','sections'));
    }

    /**
     * Edita la sección
     
     */
    public function editSection(Request $request)
    {
        
        if (($request->hasFile('file'))) {
            $section = DB::table('section_obj')
                ->where('id','=',$request->id)
                ->update([
                    'name'=>$request->name,
                    'img'=>$request->file('file')->getClientOriginalName(),
                ]);
            $destinationPath = public_path() . '/images/secciones/headers/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
        }else {
            $section = DB::table('section_obj')
                ->where('id','=',$request->id)
                ->update([
                    'name'=>$request->name,
                ]);
            
        }
        return $section;
    }

    /**
     * Section tab
     */
    public function section($id)
    {
        $section_obj = DB::table('section_obj')->where('id','=',$id)->get();
        $entrada_sections = DB::table('entrada_sections')
             ->join('section_obj', 'section_obj.id', '=', 'entrada_sections.section_obj_id')
             ->join('entradas', 'entradas.id', '=', 'entrada_sections.entradas_id')
             ->where('section_obj.id','=',$id)
             ->paginate(9);
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.elementario_section',compact('entrada_sections','section_obj','entradas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section_obj = DB::table('section_obj')->where('id', $id)->delete();
        return response()->json($section_obj);
    }
     public function destroyService($id)
     {
        $servicios = DB::table('servicios')->where('id', $id)->delete();
        return response()->json($servicios);
     }
}
