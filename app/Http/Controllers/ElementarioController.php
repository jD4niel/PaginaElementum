<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('elementario_controller.elementario_controller',compact('range','title'));
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
        //
    }
}
