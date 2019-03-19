<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Autor;
use App\Collection;
use App\Libro;

class IntegrantesController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    	//dd(Input::all());
    	$input = Input::all();

    	# Si es autor
		$blog_writer = 0;
		if(isset($input['is_blog_writer'])){
            if ($input['is_blog_writer']=='on') {
                $blog_writer = 1;
            }
        }
        $show_in_us_tab = 0;
        if(isset($input['show_in_us_tab'])){
            if($input['show_in_us_tab'] == 'on'){
                $show_in_us_tab = 1;
            }
        }
    	if ($input['select_type'] == 1) {
    		try {
	    		$autors = DB::table('autors')
	            ->insertGetId([
	                'nombre'=>$input['name'],
	                'apellido_p'=>$input['last_name'],
	                'apellido_m'=>$input['second_last_name'],
	                'breve_desc'=>$input['description'],
	                'is_blog_writer'=>$blog_writer,
	                'facebook'=>$input['face_txt'],
	                'twitter'=>$input['twitter_txt'],
	                'instagram'=>$input['insta_txt'],
	                'semblanza'=>$input['long_description'],
                    'show_in_tab'=>$show_in_us_tab,
		            ]);
                DB::table('autors')->where('id',$autors)->update(['order_num'=>$autors]);
		        if(Input::hasFile('file')){
		        	$file = Input::file('file');
		            $destinationPath = public_path() . '/images/fotos_autores/';
		            $destinationPath1 = $destinationPath . $file->getClientOriginalName();
		            copy($file, $destinationPath1);
		            DB::table('autors')->where('id',$autors)->update([
		            	'imagen'=> $file->getClientOriginalName(),
		            ]);  
		        }
		        return Redirect::back()->with('message','Operation Successful !');
    			
    		} catch (Exception $e) {
    			return Redirect::back()->withErrors($validator);
    		}
    	} #fin si es autor
    	# Si es un usuario de Elementum
    	elseif ($input['select_type'] == 2) {
    		try {
	    		$users = DB::table('users')
	            ->insertGetId([
	                'name'=>$input['name'],
	                'last_name'=>$input['last_name'],
	                'second_last_name'=>$input['second_last_name'],
	                'email'=>$input['email'],
	                'password'=>Hash::make($input['password']),
	                'role_id'=>$input['role_id'],
	                'puesto'=>$input['puesto'],
	                'text'=>$input['description'],
	                'is_blog_writer'=>$blog_writer,
	                'show_in_us_tab'=>$show_in_us_tab,
		            ]);
		        if(Input::hasFile('file')){
		        	$file = Input::file('file');
		            $destinationPath = public_path() . '/images/fotos_usuarios/';
		            $destinationPath1 = $destinationPath . $file->getClientOriginalName();
		            copy($file, $destinationPath1);
		            DB::table('users')->where('id',$users)->update([
		            	'imagen'=> $file->getClientOriginalName(),
		            ]);  
		        }
		        $users = DB::table('users')->get();
        		return view('tabs_controller.integrantes',compact('users'));
    			
    		} catch (Exception $e) {
    			return Redirect::back()->withErrors($validator);
    		}
    	}
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
        $blog_writer = 0;
        if(isset($input['is_blog_writer'])){
            if ($input['is_blog_writer']=='on') {
                $blog_writer = 1;
            }
        }
        $show_in_us_tab = 0;
        if(isset($input['show_in_us_tab'])){
            if($input['show_in_us_tab'] == 'on'){
                $show_in_us_tab = 1;
            }
        }
        try {
            $users = DB::table('users')->where('id',$id)
            ->update([
                'name'=>$input['name'],
                'last_name'=>$input['last_name'],
                'second_last_name'=>$input['second_last_name'],
                'email'=>$input['email'],
                'role_id'=>$input['role_id'],
                'puesto'=>$input['puesto'],
                'text'=>$input['description'],
                'is_blog_writer'=>$blog_writer,
                'show_in_us_tab'=>$show_in_us_tab,
                ]);
            if(isset($input['password'])){
                DB::table('users')->where('id',$id)->update(['password'=>Hash::make($input['password'])]);
            }            
            if(Input::hasFile('file')){
                $file = Input::file('file');
                $destinationPath = public_path() . '/images/fotos_usuarios/';
                $destinationPath1 = $destinationPath . $file->getClientOriginalName();
                copy($file, $destinationPath1);
                DB::table('users')->where('id',$id)->update([
                    'imagen'=> $file->getClientOriginalName(),
                ]);  
            }
            $users = DB::table('users')->get();
            return view('tabs_controller.integrantes',compact('users'));
            
        } catch (Exception $e) {
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
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
