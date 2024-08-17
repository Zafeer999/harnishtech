<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    public function uploadCKImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = 'upload_' . time() . '.' . $extension;

            $request->file('upload')->move(asset('../../upload/product_desc'), $fileName);
            // $request->file('upload')->move(storage_path('../../upload/product_desc'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            // $url =  "http://www.firmingle.com/beta/attach/public/upload/blog/".$fileName;
            $url =  asset('upload/product_desc/') . $fileName;
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
