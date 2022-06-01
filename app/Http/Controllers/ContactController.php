<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Models\category;
use Auth;
use Illuminate\Support\Str;
use App\Models\files;

class ContactController extends Controller
{

    public function index()
    {
        $cData = new \ArrayObject();
        $cData->data = contact::orderByDesc('id')->get();
        return view('solaris.contact', ['cData' => $cData, 'module' => "contact"]);
    }


    public function create()
    {
        $cData = new \ArrayObject();
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 3)->orderBy('sort')->get();

        return view('solaris.create-contact', ['cData' => $cData,  'module' => 'contact']);
    }


    public function store(Request $request)
    {
        if (request('degisID')) $cData = contact::find(request('degisID'));
        else $cData = new contact();

        $cData->title = request('title');
        $cData->slogan = request('slogan');
        $cData->country = request('country');
        $cData->city = request('city');
        $cData->district = request('district');
        $cData->address = request('address');
        $cData->phone = request('phone');
        $cData->fax = request('fax');
        $cData->mail = request('mail');
        $cData->mail2 = request('mail2');
        $cData->googlemap = request('googlemap');
        $cData->facebook = request('facebook');
        $cData->twitter = request('twitter');
        $cData->instagram = request('instagram');
        $cData->linkedin = request('linkedin');
        $cData->youtube = request('youtube');
        $cData->description = request('description');



        $cData->user_id = Auth::id();
        $cData->save();

        if (request('file')) {
            foreach (request('file') as $key => $val) {
                if (substr_count($val, "http") == 0) {
                    $filepond = app(\Sopamo\LaravelFilepond\Filepond::class);
                    $path = $filepond->getPathFromServerId($val);

                    $pathArr = explode('.', $path);
                    $imageExt = '';
                    if (is_array($pathArr)) {
                        $imageExt = end($pathArr);
                    }
                    $fileName = Str::random(30) . "." . $imageExt;

                    $finalLocation = storage_path('app/public/images/userfiles/' . $fileName);
                    \File::move($path, $finalLocation);

                    $file = new files;
                    $file->file = $fileName;
                    $file->mime_type = $imageExt;
                    $file->type = 7;
                    $file->sort = 10;
                    $file->user_id = Auth::id();
                    $file->type_id = $cData->id;
                    $file->save();
                }
            }
        }

        return redirect('/solaris/contact')->with('status', 'success')->with('msg', 'bilgiler eklendi!');
    }


    public function show(contact $contact)
    {
        //
    }


    public function edit(contact $contact)
    {
        $cData = new \ArrayObject();
        $cData->data = contact::find(request("id"));
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 3)->orderBy('sort')->get();


        return view('solaris.create-contact', ['cData' => $cData, 'module' => 'contact']);
    }


    public function update(Request $request, contact $contact)
    {
        //
    }


    public function destroy(contact $contact)
    {
        //
    }
}
