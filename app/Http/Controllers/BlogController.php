<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Banner;
use App\Blog;
use App\Entradas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function index()
    {
        //------- Portada -------//

        $portada = DB::select('select * from portada_blogs');

        //------- Entradas Recientes -------//

        $ue = Entradas::orderBy('id', 'DESC')->first();
        $ue_autor = Autor::findOrFail($ue->user_id);
        $ue['autor'] = $ue_autor->nombre.' '.$ue_autor->apellido_p;
        $ue['fecha'] = $ue->created_at->format('d M');
        $pe = Entradas::orderBy('id', 'DESC')->skip(1)->take(3)->get();
        foreach ($pe as $item){
            $autor = Autor::findOrFail($item->user_id);
            $item['autor'] = $autor->nombre.' '.$autor->apellido_p;
            $item['fecha'] = $item->created_at->format('d M');
        }
        //------- Banner -------//

        $fecha_hoy = Carbon::now();
        $fecha_hoy->subHour(6)->toDateString();
        $banner = Banner::orderBy('id', 'DESC')->first();
        if($banner['fecha_final'] < $fecha_hoy){
            $banner['estado'] = 0;
            $banner->save();
        }
        //------- Nuestros Colaboradores -------//

        $nc = Entradas::orderBy('id', 'DESC')->get();
        $autores = Autor::all();
        $uea = [];

        foreach ($autores as $autor) {
            array_push($uea, $nc->where('user_id',$autor->id)->first());
        }
        $n = count($uea);
        for($i = 0; $i < $n; $i++){
            if($uea[$i] === null){
                unset($uea[$i]);
            }
        }
        foreach ($uea as $item){
            $autor = Autor::findOrFail($item->user_id);
            $item['autor'] = $autor->nombre.' '.$autor->apellido_p;
            $item['fecha'] = $item->created_at->format('d M');
        }
        if(count($uea) > 2){
            $uea = array_slice($uea, 0, 4);
        }

        //------- Populares Elementum -------//

        $ep = Entradas::orderBy('visitas', 'DESC')->take(4)->get();
        foreach ($ep as $item){
            $autor = Autor::findOrFail($item->user_id);
            $item['autor'] = $autor->nombre.' '.$autor->apellido_p;
            $item['fecha'] = $item->created_at->format('d M');
        }

        //------- Leido en Elementario -------//

        $le = Entradas::where('clasificacion_id',2)->get();
        foreach ($le as $item){
            $autor = Autor::findOrFail($item->user_id);
            $item['autor'] = $autor->nombre.' '.$autor->apellido_p;
            $item['fecha'] = $item->created_at->format('d M');
        }

        return view('blog.blog', compact('ue', 'pe', 'uea', 'ep', 'le', 'portada', 'banner'));
    }

    public function indexPorSeccion($tipo){

        switch($tipo){
            case "entradas":
                $entradas = Entradas::orderBy('id','DESC')->paginate(15);
                foreach ($entradas as $item){
                    $autor = Autor::findOrFail($item->user_id);
                    $item['autor'] = $autor->nombre.' '.$autor->apellido_p;
                    $item['fecha'] = $item->created_at->format('d M');
                }
                return view('blog.index-secciones', compact('entradas', 'tipo'));
                break;

            case "nuestros-colaboradores":
                $nc = Entradas::orderBy('id', 'DESC')->get();
                $autores = Autor::all();
                $entradas = [];
                foreach ($autores as $autor) {
                    array_push($entradas, $nc->where('user_id',$autor->id)->first());
                }
                $n = count($entradas);
                for($i = 0; $i < $n; $i++){
                    if($entradas[$i] === null){
                        unset($entradas[$i]);
                    }
                }
                foreach ($entradas as $item){
                    $autor = Autor::findOrFail($item->user_id);
                    $item['autor'] = $autor->nombre.' '.$autor->apellido_p;
                    $item['fecha'] = $item->created_at->format('d M');
                }
                if(count($entradas) > 2){
                    $entradas = array_slice($entradas, 0, 4);
                }
                return view('blog.index-secciones', compact('entradas', 'tipo'));
                break;

            case "leido-en-elementario":
                $entradas = Entradas::where('clasificacion_id',2)->get();
                foreach ($entradas as $item){
                    $autor = Autor::findOrFail($item->user_id);
                    $item['autor'] = $autor->nombre.' '.$autor->apellido_p;
                    $item['fecha'] = $item->created_at->format('d M');
                }
                return view('blog.index-secciones', compact('entradas', 'tipo'));
                break;

        }

    }

    public function adminPortada(){
        $banner = Banner::orderBy('id','DESC')->first();
        // Dias restantes del banner
        $fecha = Carbon::now()->subHour(6);
        $fechaFinal = Carbon::parse($banner->fecha_final);
        $dias_restantes = $fechaFinal->diffInDays($fecha);

        //Posiciones de portada

        $portada = DB::table('portada_blogs')->first();

        return view('blog.admin-portada-blog', compact('banner', 'dias_restantes', 'portada'));
    }

    public function portadaPos(Request $request)
    {
        $posiciones = DB::table('portada_blogs')
            ->where('id', 1)
            ->update($request->all());
        return $posiciones;
    }

    public function upBanner(Request $request)
    {
        try{
            if($request->hasFile('file')){
                $mime = $request->file->getMimeType();
                if (($mime == 'image/jpeg') || ($mime == 'image/jpg' ) || ($mime == 'image/png') || ($mime == 'image/PNG')) {
                    $destinationPath = public_path() . '/images/banners';
                    $fileName = rand(1000,9999).$request->file->getClientOriginalName();
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true);
                    }
                    $finalPath = $destinationPath . '/' . $fileName;
                    copy($request->file, $finalPath);
                }
                $banner = new Banner();
                $banner->asunto = $request['asunto'];
                $banner->imagen = $fileName;
                $banner->fecha_inicio = $request['fecha_inicio'];
                $banner->fecha_final = $request['fecha_final'];
                $banner->estado = 1;
                $banner->save();
                return $banner;
            }
        }catch (\Exception $e){
            return abort(403, 'Unauthorized action.');
        }
    }

    public function show($id)
    {
        $entrada = Entradas::findOrFail($id);
        $entrada->visitas = $entrada->visitas + 1;
        $entrada->save();

        $autor = Autor::findOrFail($entrada->user_id);
        $entrada['fecha'] = $entrada->created_at->format('d M');
        $entrada['autor'] = $autor->nombre.' '.$autor->apellido_p;


        $ep = Entradas::orderBy('visitas', 'DESC')->take(4)->get();
        foreach ($ep as $item){
            $autor_e = Autor::findOrFail($item->user_id);
            $item['autor'] = $autor_e->nombre.' '.$autor_e->apellido_p;
            $item['fecha'] = $item->created_at->format('d M');
        }

        return view ('blog.entrada-blog', compact('entrada','ep', 'autor'));
    }


}
