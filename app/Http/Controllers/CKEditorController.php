<?php

namespace App\Http\Controllers;

//use App\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $filenametostore = request()->file('upload')->store('/public/images/userfiles');

            //$request->file('upload')->storeAs('images/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = Storage::url($filenametostore);
            $msg = 'Dosya Yüklendi';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            /*
            $file = new files;
            $file->filename='images/uploads/'.$filenametostore;
            $file->user_id = Auth::id();
            $file->icerik_id = 0;
            $file->formToken = request('formToken');
            $file->save();
*/
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
