<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ElementumController extends Controller
{
    public function info()
    {
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('controller.elementum',compact('elementum'));
    }
    public function infoSave()
    {
    	$input = Input::only('telefono','correo','face','twitter','insta','direccion');
    	$elementum_update = DB::table('elementum_info')->where('id','=',1)
    		->update([
    			'telefono'=>$input['telefono'],
    			'correo'=>$input['correo'],
    			'facebook'=>$input['face'],
    			'twitter'=>$input['twitter'],
    			'insta'=>$input['insta'],
    			'direccion'=>$input['direccion'],
    		]);  
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
    	return view('controller.elementum',compact('elementum'));
    }
    public function footer()
    {
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.footer',compact('elementum'));
    }
    public function collectionAdd(Request $request)
    {
        if (($request->hasFile('file'))) {
            $file = $request["file"];
            $filename_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/colecciones';
            $destinationPath1 = $destinationPath . '/' . $filename_img;
            try {
                DB::table('collections')->insertGetId([
                    'nombre'=> $filename_img,
                    'imagen'=> $filename_img
                    ]);
                    copy($file, $destinationPath1);
            } catch (Exception $e) {
                return "no se guardo la base";
            }
            return $filename_img;
        }else{
            return 0;
        }
    }
    public function editCollection($id, Request $request)
    {
        if (($request->hasFile('file'))) {
            $file = $request["file"];
            $filename_img = $file->getClientOriginalName();
            $destinationPath = public_path() . '/images/colecciones';
            $destinationPath1 = $destinationPath . '/' . $filename_img;
            try{
                $coleccion = DB::table('collections')->where('id',$id)->update([
                    'nombre'=> $filename_img,
                    'imagen'=> $filename_img
                    ]);
                copy($file, $destinationPath1);
                return 1;
            } catch (Exception $e) {
                return "no se guardo la base";
            }
        }else{
            return 0;
        }
    }
    public function destroy($id)
    {
        $collections = DB::table('collections')->where('id', $id)->delete();
        return response()->json($collections);
    }
}
