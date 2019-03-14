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
        $colecciones = DB::table('tabs_images')->where('tab_name','=','colecciones')->first();
        return view('tabs_controller.colecciones_tab',compact('colecciones'));
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
         try{
            if (($request->hasFile('file'))) {
            $data = $request;
            $file = $data["file"];
            $filename_img = $file->getClientOriginalName();
            $mime = $file->getMimeType();
            if (($mime == 'image/jpeg' || $mime == 'image/jpg' )) {

                $destinationPath = public_path() . '/images/tabs_banners';
                $filename_img = "foto_".$data->tab_name.".jpg";
                $destinationPath1 = $destinationPath . '/' . $filename_img;
                DB::table('tabs_images')->where('tab_name','=',$data->tab_name)->update(['image'=>$filename_img]);
                copy($file, $destinationPath1);
                return $data;
            } else {
                return $mime."Error";
                abort(500);
            }
        }
        }catch (\Exception $e){
            return $e . "mal";
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
        for ($i=0; $i < count($autors); $i++) {
            if (isset($request->ids[$i])) {
                DB::table('autors')->where('id','=',$i+1)->update(['order_num'=>$request->ids[$i]]);
             }
        }
        
        return response()->json($request->ids);
    }
}
