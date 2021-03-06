<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Collection;
use App\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\response
     */
    public function index()
    {
        $pagina = DB::table('slider')->get();
        $taller = DB::table('talleres')->get();
        $servicios = DB::table('servicios')->get();
        $talleres=$taller;
        $politicaSimplificada = DB::table('politica')->where('id', 2)->get();
        $politicaCompleta = DB::table('politica')->where('id', 1)->get();
        return view('controller.editpage',compact('pagina','talleres','servicios','politicaSimplificada','politicaCompleta'));
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
        if ($request['foto'] != 'nothing') {
            $mime = $request['foto']->getMimeType();
            if (($mime == 'image/jpeg' || $mime == 'image/jpg' || $mime == 'image/JPG' || $mime == 'image/JPEG' || $mime == 'image/png' || $mime == 'image/PNG')) {
            $destinationPath = public_path() . '/images';
            $destinationPath1 = $destinationPath . '/img_ref.jpg';
            try{
                copy($request['foto'], $destinationPath1);
            }
            catch (\Exception $e){
                return "Error on function 'copy': \n".$e;
            }
	  }else{
		return "Formato de imagen incorrecto [".$mime."]";	
	}
        }
        if ($request['pdf'] != 'nothing') {
            $pdf_mime = $request['pdf']->getMimeType();
            if($pdf_mime != 'application/pdf'){
                 return "Formato de PDF incorrecto [".$pdf_mime."]";
            }
            $destinationPath = public_path();
            $destinationPath1 = $destinationPath . '/elementum.pdf';
            if(file_exists($destinationPath1)){
                unlink($destinationPath1);
            }
            try{
                copy($request['pdf'], $destinationPath1);
            }
            catch (\Exception $e){
                return "Error on function 'copy': \n".$e;
            }
        }
        return 1;
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
        $id =DB::table('talleres')->max('id');
        if (($request->hasFile('file'))) {
            $destinationPath = public_path() . '/images/talleres/';
            $destinationPath1 = $destinationPath . $request->imagen_nombre;
            copy($request->file('file'), $destinationPath1);
            if (isset($taller)) {
                DB::table('talleres')
                    ->where('id','=',$id)
                    ->update([
                        'imagen'=>$request->file('file')->getClientOriginalName()
                    ]);
            }
            return $request;
        }else {
            return 0;
        }
    }
    public function AgregarTallerSend(Request $request){
        $taller = DB::table('talleres')
            ->insertGetId([
                'titulo'=>$request->titulo,
                'descripcion'=>$request->descripcion,
                'duracion'=>$request->duracion,
                'sede'=>$request->sede,
                'persona'=>$request->imparte,
            ]);
        $id =DB::table('talleres')->max('id');
        if (($request->hasFile('file'))) {
            $destinationPath = public_path() . '/images/talleres/';
            $destinationPath1 = $destinationPath . $request->file('file')->getClientOriginalName();
            copy($request->file('file'), $destinationPath1);
            $new_taller = DB::table('talleres')
                ->where('id','=',$id)
                ->update([
                    'imagen'=>$request->file('file')->getClientOriginalName()
                ]);
            return $new_taller;

        }else {
            return $taller;
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
    //Agregar autor --- NO UTILIZADA CAMBIADA -> INTEGRANTESCONTROLLER
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
    // NO se utiliza utiliza -> IntegrantesController
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
        $autor = DB::table('autors')->orderBy('id')->get();
        $libro = Libro::all();
        return view('blog.elements-control',compact('autor','libro'));
    }
    public function borrarAutor($id){
        $autor = DB::table('autors')->where('id', $id)->delete();
        return response()->json("borrado");
    }
    public function editPageTabs(){
        $autores = DB::table('tabs_images')->where('tab_name','=','autores')->first();
        $contacto = DB::table('tabs_images')->where('tab_name','=','contacto')->first();
        $nosotros = DB::table('tabs_images')->where('tab_name','=','nosotros')->first();
        $colecciones = DB::table('tabs_images')->where('tab_name','=','colecciones')->first();
        //dd($nosotros->image);
        return view('controller.edit_tabs',compact('autores','contacto','nosotros','colecciones'));
    }
    public function politicaCompleta(){
        $politicaCompleta = DB::table('politica')->where('id', 1)->get();
        $elementum = DB::table('elementum_info')->where('id','=',1)->first();
        return view('Elementum.politica', compact('politicaCompleta','elementum'));
    }

    public function editarPolitica($id, Request $request)
    {
        if ($id == 1) {
            $politica = DB::table('politica')->where('id', $id);
            $politica->update([
                'content' => $request['completa']
            ]);
            return redirect()->to('/editar');
        }
        if ($id == 2) {
            $politica = DB::table('politica')->where('id', $id);
            $politica->update([
                'content' => $request['simplificada']
            ]);
            return redirect()->to('/editar');
        }
    }
    public function uploadBtnInfo(){
        $input = Input::all();
        $show_btn = 0;
        if(isset($input['show_btn'])){
            if ($input['show_btn']=='on') {
                $show_btn = 1;
            }
        }
        try{
            $slider = DB::table('slider')->where('id',$input['id'])->update([
                'show_btn' => $show_btn,
                'btn_color' => $input['btn_color'],
                'btn_url' => $input['btn_url'],
                'btn_text' => $input['btn_text'],
                'btn_text_color' => $input['btn_text_color'],
                'btn_text_size' => $input['btn_text_size'],
            ]);
            return redirect()->back();
        } catch (Exception $e) {
            return Redirect::back()->withErrors($validator);
        }

    }

}
