<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    //
    public function upload(Request $request)
    {
        if($request->has('upload')){
            $file = $request->file('upload');
            $ext = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $name = explode('.',$name);
            $name[0] = $name[0] . '_' . time();
            $name = implode('.',$name);
            $file->move('imgProducts/',$name);
            $ckFuncNum = $request->CKEditorFuncNum;
            $url = asset('imgProducts/'.$name);
            $respone = "<script>window.parent.CKEDITOR.tools.callFunction($ckFuncNum,'$url','Tải Hình Thành Công')</script>";
            @header('Content-type:text/html;charset-utf-8');
            echo $respone;
        }
        # code...
    }

    public function imgFile(Request $request)
    {
        $paths = glob(public_path('imgProducts/*'));
        $fileNames = [];
        foreach($paths as $path){
            if(is_dir($path)){
                continue;
            }
            $fileNames[] = basename($path);
        }
        return view('Admin.Helper.ck-image',compact('fileNames'));
        # code...
    }
}
