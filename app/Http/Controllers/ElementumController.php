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
}
