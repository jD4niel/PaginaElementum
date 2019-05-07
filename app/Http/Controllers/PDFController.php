<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PDFController extends Controller
{
    public function info(){
        $pdf=DB::table('pdf')->get();
        return view('controller.verpdf',compact('pdf'));
    }

    public function uploadPDF(Request $request){
        try{

            $data = $request;
            $file = $data["file"];
            $filename_img = $file->getClientOriginalName();
            $mime = $file->getMimeType();
            if (($mime == 'application/pdf')) {

                $destinationPath = public_path() . '/images/pdf';
                $filename_img = $file->getClientOriginalName();
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $destinationPath1 = $destinationPath . '/' . $filename_img;
                DB::table('pdf')->insertGetId(['nombre'=>$filename_img]);
                copy($file, $destinationPath1);
                return $data;
            } else {
                return $mime;
                abort(500);
            }
        }catch (\Exception $e){
            //DB::rollBack();
            return $e . "mal";
        }
    }
}
