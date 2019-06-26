<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BD;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Auth;

class TabsController extends Controller
{
    public function nosotrosTab()
    {

        $nosotros = DB::table('tabs_images')->where('tab_name','=','nosotros')->first();
        return view('tabs_controller.nosotros_tab',compact('nosotros'));
    }
    public function saveUsTab(Request $request)
    {
        $tabs = DB::table('tabs_images')->where('tab_name','=',$request->tab_name)
            ->update(['text_content'=>$request->text]);
        return response()->json($tabs); 
    }
    public function autoresTab()
    {
        $autores = DB::table('tabs_images')->where('tab_name','=','autores')->first();
        return view('tabs_controller.autores_tab',compact('autores'));
    }
    
    public function contactoTab()
    {
        $contacto = DB::table('tabs_images')->where('tab_name','=','contacto')->first();
        return view('tabs_controller.contacto_tab',compact('contacto'));
    }
    
    public function coleccionesTab()
    {
        $collections = DB::table('collections')->get();
        $colecciones = DB::table('tabs_images')->where('tab_name','=','colecciones')->first();
        return view('tabs_controller.colecciones_tab',compact('colecciones','collections'));
    }    
    public function integrantesTab()
    {
        $users = DB::table('users')->get();
        return view('tabs_controller.integrantes',compact('users'));
    }

    public function editUser($id)
    {
        $usuario = DB::table('users')->where('id','=',$id)->first();
        return view('tabs_controller.editar-usuario', compact('usuario'));
    }
    public function deleteUser($id)
    {
        $users = DB::table('users')->where('id', $id)->delete();
        return response()->json($users);
    }

    public function changeUserImage(Request $request)
    {
        if (($request->hasFile('file'))) {
            $file = $request["file"];
            $filename_img = $file->getClientOriginalName();
            DB::table('users')->where('id','=',Auth::id())->update(['imagen'=>$filename_img]);
            $destinationPath = public_path() . '/images/fotos_usuarios';
            $destinationPath1 = $destinationPath . '/' . $filename_img;
            copy($file, $destinationPath1);
            return $filename_img;
        }else{
            return "Error en subir imagen";
        }
    }

    public function uploadTabImage(Request $request){
        if(!isset($request)){
            return "Error!\n El servidor no pudo obtener los datos enviados";
        }
        $data = $request;
         try{
            if (($request->hasFile('file'))) {
                $file = $data["file"];
                $filename_img = $file->getClientOriginalName();
                $mime = $file->getMimeType();
                if (($mime == 'image/jpeg' || $mime == 'image/jpg' || $mime == 'image/JPG' || $mime == 'image/JPEG' || $mime == 'image/png' || $mime == 'image/PNG')) {
                    $destinationPath = public_path() . '/images/tabs_banners';
                    $filename_img = "foto_".$data->tab_name.".jpg";
                    $destinationPath1 = $destinationPath . '/' . $filename_img;
                    DB::table('tabs_images')->where('tab_name','=',$data->tab_name)
                        ->update(['image'=>$filename_img,
                            'url'=>$data->url
                        ]);
                    try{
			if(file_exists($destinationPath1)){
             		   unlink($destinationPath1);
                	   if(!copy($file,$destinationPath1)){
				return "Error al copiar  la imagen \n 2512: server error";
			   }
			   copy($file, $destinationPath1);
			}else{
			return "El archivo no existe";
			}
                    }
                    catch (\Exception $e){
                        return "Error on function 'copy': \n".$e;
                    }
                    return 1;
                } else {
                    return "Formato incorrecto (".$mime.")";
                    abort(500);
                }
        }else{
            DB::table('tabs_images')->where('tab_name','=',$data->tab_name)
                ->update(['url'=>$data->url
                ]);
            return 2;
        }
        }catch (\Exception $e){
            return "Error! \n server error, catch error: \n".$e;
        }
    }
    public function preview($name,Request $request)
    {
        $users = DB::table('users')->get();
        $tab_name = DB::table('tabs_images')->where('tab_name','=',$name)->first();
        $text = $request->text;
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.preview',compact('users','tab_name','text','elementum'));
    }

    public function orderAutorSave(Request $request)
    {
        $autors =  DB::table('autors')->get();
        foreach ($request->ids as $key => $row) {
            DB::table('autors')->where('id',(int)$row)->update(['order_num'=>$key+1]);
        }
        
        return response()->json($request->ids);
    }
}
