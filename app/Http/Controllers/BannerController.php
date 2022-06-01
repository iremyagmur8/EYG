<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;
use App\Models\category;

use Auth;
use Illuminate\Support\Str;
use App\Models\files;


class BannerController extends Controller
{

    public function index()
    {
        $cData = new \ArrayObject();
        $cData->data = banner::orderByDesc('id')->get();
        return view('solaris.banners', ['cData' => $cData, 'module' => "banners"]);
    }


    public function create()
    {
        $cData = new \ArrayObject();
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 2)->orderBy('sort')->get();

        return view('solaris.create-banners', ['cData' => $cData,  'module' => 'banners']);
    }


    public function store(Request $request)
    {
        if (request('degisID')) $cData = banner::find(request('degisID'));
        else $cData = new banner();


        $cData->title = request('title');
        $cData->shortdescription = request('shortdescription');
        $cData->sort = request('sort');
        $cData->place = request('place');
        $cData->buttontext = request('buttontext');

        $cData->link = request('link');
        $cData->video = request('video');
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
                    $file->type = 3;
                    $file->sort = 10;
                    $file->user_id = Auth::id();
                    $file->type_id = $cData->id;
                    $file->save();
                }
            }
        }

        return redirect('/solaris/banners')->with('status', 'success')->with('msg', 'Banner eklendi!');
    }


    public function show(banner $banner)
    {
        //
    }


    public function edit(banner $banner)
    {
        $cData = new \ArrayObject();
        $cData->data = banner::find(request("id"));
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 2)->orderBy('sort')->get();


        return view('solaris.create-banners', ['cData' => $cData, 'module' => 'banners']);
    }

    static function getIletisim()
    {
        return banner::find(3);

    }


    public function update(Request $request, banner $banner)
    {
        //
    }


    public function destroy(banner $banner)
    {
        //
    }
}
