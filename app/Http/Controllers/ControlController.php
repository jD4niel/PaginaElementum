<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Collection;
use App\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $servicios = DB::table('servicios')->get();
        $talleres=$taller;
        return view('controller.editpage',compact('pagina','talleres','servicios'));
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
    public function uploadPDF(Request $request){
        try{
            $data = $request;
            $file = $data["file"];
            $pdf = $data["pdf"];
            if ($pdf != 1){
                $destinationPathPDF = public_path() . '/descarga.pdf';
                copy($pdf, $destinationPathPDF);
            }else{
                return "pdf";
            }
            if ($file != 1){
                $mime = $file->getMimeType();
                if (($mime == 'image/jpeg' || $mime == 'image/jpg' )) {
                    $destinationPath = public_path() . '/images/img_ref.jpg';
                    copy($file, $destinationPath);
                    return $data;
                }
            }else {
                return "img";
            }
            return 0;
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
    }
    public function uploadNewService(Request $request){
        $id =DB::table('talleres')->max('id');
       if (($request->hasFile('file'))) {
        $servicio = DB::table('servicios')
            ->insertGetId([
                'name'=>$request->name,
                'text'=>$request->text,
                'image'=>$request->file('file')->getClientOriginalName()
             ]);
            $destinationPath = public_path() . '/images/servicios/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
            return $request;
        }else {
            $servicio = DB::table('servicios')
                ->insertGetId([
                    'name'=>$request->name,
                    'text'=>$request->text,
                 ]);
            return 0;
        }
    }
    public function editService($id, Request $request)
    {
        if (($request->hasFile('file'))) {
            $servicios = DB::table('servicios')->where('id','=', $id)
            ->update([
                'name'=>$request->name,
                'text'=>$request->text,
                'image'=>$request->file('file')->getClientOriginalName()
            ]);
            $destinationPath = public_path() . '/images/servicios/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
            return $request;
        }else {
            $servicios = DB::table('servicios')->where('id','=', $id)
            ->update([
                'name'=>$request->name,
                'text'=>$request->text,
            ]);
            return 0;
        }
    }
    /*
    ***Borrar servicio
    */
    public function deleteService($id)
    {
        $servicios = DB::table('servicios')->where('id', $id)->delete();
        return response()->json($servicios);
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

    public function AgregarLibro(Request $request){
        $libros = DB::table('libros')
            ->insertGetId([
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
                'url'=>$request->url,
                'imagen'=>$request->file('file')->getClientOriginalName()
            ]);
        if (($request->hasFile('file'))) {
            $destinationPath = public_path() . '/images/libros/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
                return $request;
        }else {
            return 0;
        }
    }
    public function AgregarAutor(Request $request){
        $libros = DB::table('autors')
            ->insertGetId([
                'nombre'=>$request->nombre,
                'apellido_p'=>$request->apa,
                'apellido_m'=>$request->apm,
                'breve_desc'=>$request->des,
                'is_blog_writer'=>$request->blog_writer,
                'facebook'=>$request->face_in,
                'twitter'=>$request->twitter_in,
                'instagram'=>$request->insta_in,
                'semblanza'=>$request->sem,
                'imagen'=>$request->file('file')->getClientOriginalName()
            ]);
        if (($request->hasFile('file'))) {
            $destinationPath = public_path() . '/images/fotos_autores/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
                return $request;
        }else {
            return 0;
        }
    }   
    public function AgregarUsuario(Request $request){
        $libros = DB::table('users')
            ->insertGetId([
                'name'=>$request->nombre,
                'last_name'=>$request->apa,
                'second_last_name'=>$request->apm,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role_id'=>$request->role_id,
                'is_blog_writer'=>$request->blog_writer,
                'puesto'=>$request->insta_in,
                'text'=>$request->sem,
                'imagen'=>$request->file('file')->getClientOriginalName()
            ]);
        if (($request->hasFile('file'))) {
            $destinationPath = public_path() . '/images/fotos_usuarios/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
                return $request;
        }else {
            return 0;
        }
    }

    public function createBook(){
        $coleccion = Collection::all();
        $autor = Autor::all();
        return view('controller.crear-libro',compact('coleccion','autor'));
    }
    public function createAutor(){
        return view('controller.crear-autor');
    }
    public function control(){
        $autor = Autor::all();
        $libro = Libro::all();
        return view('blog.elements-control',compact('autor','libro'));
    }
    public function borrarAutor($id){
        $autor = DB::table('autors')->where('id', $id)->delete();
        return response()->json("borrado");
    }
}
