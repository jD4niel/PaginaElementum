<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagina = DB::table('slider')->get();
        $taller = DB::table('talleres')->get();
        $talleres=$taller;
        return view('controller.editpage',compact('pagina','talleres'));
    }
    public function slider(Request $request){
        $data=$request;
        return response()->json($data);
    }
    public function uploadImage(Request $request){
        try{

            $data = $request;
            $file = $data["file"];
            $filename_img = $file->getClientOriginalName();
            $mime = $file->getMimeType();
            if (($mime == 'image/jpeg' || $mime == 'image/jpg' )) {

                $destinationPath = public_path() . '/images/slider';
                $filename_img = "foto".$data->id.".jpg";
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $destinationPath1 = $destinationPath . '/' . $filename_img;
                DB::table('pdf')->insertGetId(['nombre'=>$filename_img]);
                copy($file, $destinationPath1);
                return $data;
            } else {
                return $mime."no agarro";
                abort(500);
            }
        }catch (\Exception $e){
            return $e . "mal";
        }
    }
    public function uploadNewImage(Request $request){
        $id =DB::table('slider')->max('id');

        if (($request->hasFile('file'))) {
            $new_id = $id+1;
            DB::table('slider')->insertGetId(['nombre'=>'foto'.$new_id.'.jpg']);
            $destinationPath = public_path() . '/images/slider';
            $destinationPath1 = $destinationPath . '/foto'.$new_id.'.jpg';
            copy($request->file('file'), $destinationPath1);
            return $id;
        }else {
            return 0;
        }
     /*   try{

            $data = $request;
            $file = $data["file"];
            $filename_img = $file->getClientOriginalName();
            $mime = $file->getMimeType();
            if (($mime == 'image/jpeg' || $mime == 'image/jpg' )) {

                $destinationPath = public_path() . '/images/slider';
                $filename_img = "foto".$data->id.".jpg";
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $destinationPath1 = $destinationPath . '/' . $filename_img;
                DB::table('pdf')->insertGetId(['nombre'=>$filename_img]);
                copy($file, $destinationPath1);
                return $data;
            } else {
                return $mime."no agarro";
                abort(500);
            }
        }catch (\Exception $e){
            //DB::rollBack();
            return $e . "mal";
        }*/
    }

    public function taller(){
        return view('controller.crear-taller');
    }
    public function EditarTaller($id){
        $taller = DB::table('talleres')->where('id','=',$id)->get();
        $item=$taller[0];
        return view('controller.edit-taller', compact('item'));
    }

    public function destroy($id)
    {
        $slider = DB::table('slider')->where('id', $id)->delete();
        return response()->json($slider);
    }
    public function destroyTaller($id){
        $taller = DB::table('talleres')->where('id', $id)->delete();
        return response()->json($taller);
    }
    public function EditarTallerSend(Request $request){
        $id =DB::table('talleres')->max('id');
        $taller = DB::table('talleres')
            ->where('id','=',$request->id)
            ->update([
                'titulo'=>$request->titulo,
                'descripcion'=>$request->descripcion,
                'duracion'=>$request->duracion,
                'sede'=>$request->sede,
                'persona'=>$request->imparte,
                'informes'=>$request->informes
             ]);
       if (($request->hasFile('file'))) {
            $destinationPath = public_path() . '/images/talleres/';
            $destinationPath1 = $destinationPath . $request->imagen_nombre;
            copy($request->file('file'), $destinationPath1);
            return $request;
        }else {
            return 0;
        }
    }
    public function AgregarTallerSend(Request $request){
        $id =DB::table('talleres')->max('id');
        $taller = DB::table('talleres')
            ->insertGetId([
                'titulo'=>$request->titulo,
                'descripcion'=>$request->descripcion,
                'duracion'=>$request->duracion,
                'sede'=>$request->sede,
                'persona'=>$request->imparte,
                'imagen'=>$request->file('file')->getClientOriginalName()
             ]);
       if (($request->hasFile('file'))) {
            $destinationPath = public_path() . '/images/talleres/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
            return $request;
        }else {
            return 0;
        }
    }
}
