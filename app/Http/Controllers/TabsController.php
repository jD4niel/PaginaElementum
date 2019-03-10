<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class TabsController extends Controller
{
    public function nosotrosTab()
    {

        $nosotros = DB::table('tabs_images')->where('tab_name','=','nosotros')->first();
        return view('tabs_controller.nosotros_tab',compact('nosotros'));
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
    
}
