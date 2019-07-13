<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Collection;
use App\Libro;
use View;
use Illuminate\Support\Facades\DB;
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
        $libros= Libro::latest('fecha')->orderBy('fecha')->take(8)->get();
        //dd($libros->imagen);
        $slider = DB::table('slider')->get();
        $first =DB::table('slider')->min('id');
        $talleres = DB::table('talleres')->get();
        $servicios = DB::table('servicios')->get();
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.home',compact('libros','slider','first','talleres','servicios','elementum'));
    }
    public function elementario(){
        $month_range = DB::table('month_range')->where('view_month','=',1)->get();
        $title = DB::table('programming_section')->where('id','=',1)->get();
        $section_obj = DB::table('section_obj')->get();
        $entrada_sections = DB::table('entrada_sections')
             ->join('section_obj', 'section_obj.id', '=', 'entrada_sections.section_obj_id')
             ->join('entradas', 'entradas.id', '=', 'entrada_sections.entradas_id')
             ->take(7)
             ->get();
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.elementario',compact('month_range','title','section_obj','entrada_sections','elementum'));
    }
    public function libroInd($id){
        $coleccion = Collection::all();
        $autor = Autor::all();
        $libro= Libro::find($id);
        return view('controller.editar-libro',compact('libro','coleccion','autor'));
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
    public function update(Request $request)
    {
        $libro = DB::table('libros')
            ->where('id','=',$request->id)
            ->update([
                'nombre'=>$request->nombre,
                'subtitulo'=>$request->subtitulo,
                'autor_id'=>$request->autor,
                'rol_id'=>$request->rol,
                'collection_id'=>$request->collection,
                'isbn'=>$request->isbn,
                'tamaño'=>$request->tamano,
                'precio'=>$request->precio,
                'semblanza'=>$request->des,
                'fecha'=>$request->fecha,
                'url'=>$request->url
            ]);
        if (($request->hasFile('file'))) {
            $destinationPath = public_path() . '/images/libros/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            DB::table('libros')->where('id',$request->id)->update(['imagen'=>$request->file('file')->getClientOriginalName()]);
            copy($request->file('file'), $destinationPath1);
            return $request;
        }else {
            return $libro;
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = DB::table('libros')->where('id', $id)->delete();
        return response()->json($slider);
    }
    public function descarga(){
        return response()->download(public_path('descarga.pdf'));
    }
    public function colecciones(){
        $colecciones = DB::table('tabs_images')->where('tab_name','=','colecciones')->first();
        //$libros= Libro::orderBy('fecha', 'ASC')->get();
	$libros = DB::table('libros')->latest('fecha')->orderBy('fecha')->get();
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        $collection = DB::table('collections')->get();
        //dd($libros->imagen);
        return view('Elementum.collection',compact('libros','elementum','collection','colecciones'));
    }
    public function buscar(Request $request){
        $data = $request;
        $libros= Libro::where('nombre','like','%'.$data->nombre.'%')->get();
        return response()->json($libros);
    }
    public function buscarAutores(Request $request){
        $data = $request;
        $libros= Autor::where('nombre','like','%'.$data->nombre.'%')->get();
        return response()->json($libros);
    }
    public function ver(Request $request){
        $data = $request;
        $libros= Libro::where('collection_id',$data->coleccion)->orderBy('fecha', 'desc')->get();
        return  response()->json($libros);
    }
    public function detalle($id){
        $libros= Libro::find($id);
        $recomendados = Libro::where('collection_id',$libros->collection_id)->where('id','!=',$id)->get();

        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('libro',compact('libros','recomendados','elementum'));
    }
    public function ir(){
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('libro','elementum');
    }
    public function autors(){

        $autores = DB::table('tabs_images')->where('tab_name','=','autores')->first();
        $autors = DB::table('autors')->orderBy('order_num')->where('show_in_page',1)->get();
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.autors',compact('autors','elementum','autores'));
    }
    public function autors_details($id){
        $autor=Autor::findOrFail($id);
        $libros=Libro::where('autor_id','=',$id)->get();
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.autor_detalle',compact('autor','libros','elementum'));
    }
    public function contacto(){

        $contacto = DB::table('tabs_images')->where('tab_name','=','contacto')->first();
        $politicaSimplificada = DB::table('politica')->where('id', 2)->get();
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.contacto',compact('elementum', 'politicaSimplificada','contacto'));

    }
    public function nosotros(){ 
        $users = DB::table('users')->where('show_in_us_tab','=',1)->get();
        $nosotros = DB::table('tabs_images')->where('tab_name','=','nosotros')->first();
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.nosotros',compact('users','nosotros','elementum'));
    }

}
