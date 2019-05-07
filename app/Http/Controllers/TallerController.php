<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Redirect;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try { 
            $input = Input::all();
            $talleres = DB::table('talleres')->insertGetId([
                'titulo' => $input['title'],
                'descripcion'=> $input['description'],
                'duracion'=> $input['duration'],
                'sede'=> $input['sede'],
                'persona'=> $input['imparte'],
                'informes'=> $input['info'],
            ]);
            if(Input::hasFile('file')){
                $file = Input::file('file');
                $destinationPath = public_path() . '/images/talleres/';
                $destinationPath1 = $destinationPath . $file->getClientOriginalName();
                copy($file, $destinationPath1);
                DB::table('talleres')->where('id',$talleres)->update([
                    'imagen'=> $file->getClientOriginalName(),
                ]);  
            }
            return Redirect::back()->with('message','Operation Successful !');
        } catch (Exception $e) {
            return $e;
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
        $input = Input::all();
        try { 
            $talleres = DB::table('talleres')->where('id',$id)->update([
                'titulo' => $input['title'],
                'descripcion'=> $input['description'],
                'duracion'=> $input['duration'],
                'sede'=> $input['sede'],
                'persona'=> $input['imparte'],
                'informes'=> $input['info'],
            ]);
            if(Input::hasFile('file')){
                $file = Input::file('file');
                $destinationPath = public_path() . '/images/talleres/';
                $destinationPath1 = $destinationPath . $file->getClientOriginalName();
                copy($file, $destinationPath1);
                DB::table('talleres')->where('id',$id)->update([
                    'imagen'=> $file->getClientOriginalName(),
                ]);  
            }
            return Redirect::back()->with('message','Operation Successful !');
        } catch (Exception $e) {
            return $e;
        }
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
