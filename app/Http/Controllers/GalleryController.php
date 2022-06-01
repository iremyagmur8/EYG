<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Models\category;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\files;

class GalleryController extends Controller
{

    public function index()
    {
        $cData = new \ArrayObject();
        $cData->data = gallery::orderByDesc('id')->get();
        return view('solaris.galleries', ['cData' => $cData, 'module' => "galleries"]);
    }


    public function create()
    {
        $cData = new \ArrayObject();
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 2)->orderBy('sort')->get();

        return view('solaris.create-galleries', ['cData' => $cData,  'module' => 'galleries']);
    }


    public function store(Request $request)
    {
        if (request('degisID')) $cData = gallery::find(request('degisID'));
        else $cData = new gallery();


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
                    $file->type = 6;
                    $file->sort = 10;
                    $file->user_id = Auth::id();
                    $file->type_id = $cData->id;
                    $file->save();
                }
            }
        }

        return redirect('/solaris/galleries')->with('status', 'success')->with('msg', 'Galeri eklendi!');

    }


    public function show(gallery $gallery)
    {
        //
    }


    public function edit(gallery $gallery)
    {
        $cData = new \ArrayObject();
        $cData->data = gallery::find(request("id"));
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 2)->orderBy('sort')->get();


        return view('solaris.create-galleries', ['cData' => $cData, 'module' => 'galleries']);
    }


    public function update(Request $request, gallery $gallery)
    {
        //
    }


    public function destroy(gallery $gallery)
    {
        //
    }
}
