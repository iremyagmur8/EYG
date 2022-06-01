<?php

namespace App\Http\Controllers;

use App\Models\videogallery;
use Illuminate\Http\Request;
use App\Models\category;
use Auth;
use Illuminate\Support\Str;
use App\Models\files;

class VideogalleryController extends Controller
{

    public function index()
    {
        $cData = new \ArrayObject();
        $cData->data = videogallery::orderByDesc('id')->get();
        return view('solaris.videogalleries', ['cData' => $cData, 'module' => "videogalleries"]);
    }


    public function create()
    {
        $cData = new \ArrayObject();
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 3)->orderBy('sort')->get();

        return view('solaris.create-videogalleries', ['cData' => $cData,  'module' => 'videogalleries']);
    }


    public function store(Request $request)
    {
        if (request('degisID')) $cData = videogallery::find(request('degisID'));
         else $cData = new videogallery();


        $cData->title = request('title');
        $cData->category_id = request('category');
        $cData->shortdescription = request('shortdescription');
        $cData->sort = request('sort');
        $cData->theme = request('theme');
        $cData->link = request('link');
        $cData->tag = request('tag');
        $cData->description = request('description');
        $cData->publishtime = request('publishtime');


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

        return redirect('/solaris/videogalleries')->with('status', 'success')->with('msg', 'Video eklendi!');
    }


    public function show(videogallery $videogallery)
    {
        //
    }


    public function edit(videogallery $videogallery)
    {
        $cData = new \ArrayObject();
        $cData->data = videogallery::find(request("id"));
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 3)->orderBy('sort')->get();


        return view('solaris.create-videogalleries', ['cData' => $cData, 'module' => 'videogalleries']);
    }


    public function update(Request $request, videogallery $videogallery)
    {
        //
    }


    public function destroy(videogallery $videogallery)
    {
        //
    }
}
