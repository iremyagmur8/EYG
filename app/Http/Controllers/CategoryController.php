<?php


namespace App\Http\Controllers;


use App\Models\files;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\category;
use Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    public function index() {

        $cData = new \ArrayObject();

        $cData->all=category::where('parent_id', '=', 0)->orderBy('sort')->get();
        $allCategories = new \ArrayObject();
        foreach (Config::get('solaris.catTypes') as $key => $val) {
            $allCategories[$val["id"]] = Category::where('parent_id', '=', 0)->where('type', '=', $val["id"])->orderBy('sort')->get();
        }
        return view ('solaris.categories.categoryTreeview',['allCategories'=>$allCategories,'cData'=>$cData,'module'=>"categories"]);

    }



    public function edit($val)
    {
        $cData = Category::find($val);

        $type = 0;
        if (request('type')) $type = request('type');
        $catTypes = Config::get('solaris.catTypes');

        $user = auth()->user();

        $allCategories = new \ArrayObject();
        $cData = new \ArrayObject();

        foreach (Config::get('solaris.catTypes') as $key => $val) {
            $allCategories[$val["id"]] = Category::where('parent_id', '=', 0)->where('type', '=', $val["id"])->orderBy('sort')->get();
        }
        $cData->data = category::find(request('id'));

        return view('solaris.categories.categoryTreeview', ['allCategories' => $allCategories, 'cData' => $cData]);
        // return view('categories.categoryTreeview', compact('categories', 'allCategories', 'catTypes','type'))->with('cData', $cData);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {


        $this->validate($request, [
            'title' => 'required',
        ]);

        if (request('degisID')) {

            $cData = Category::find(request('degisID'));
            $cData->title = request('title');
            $cData->description = request('description');
            $cData->shortdescription = request('shortdescription');
            $cData->sort = request('sort');
            $cData->link = request('link');
            $cData->openlink = request('openlink');
            $cData->parent_id = request('parent_id');
            $cData->type = request('type');
            $cData->active = request('active');
            $cData->theme = request('theme');
            $cData->user_id = Auth::id();

            $cData->save();

            // dd(request('file'));
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
                        $file->type = 1;
                        $file->sort = 10;
                        $file->user_id = Auth::id();
                        $file->type_id = $cData->id;
                        $file->save();
                    }
                }
            }

            return redirect('/solaris/categories')->with('status', 'info')->with('msg', 'Kategori değitirildi!')->with('type', request('type'));


        } else {

            $cData = new Category;
            $cData->title = request('title');
            $cData->description = request('description');
            $cData->shortdescription = request('shortdescription');
            $cData->sort = request('sort');
            $cData->link = request('link');
            $cData->openlink = request('openlink');
            $cData->parent_id = request('parent_id');
            $cData->type = request('type');
            $cData->active = request('active');
            $cData->theme = request('theme');
            $cData->user_id = Auth::id();
            $cData->save();

            if (request('file')) {
                foreach (request('file') as $key => $val) {
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
                    $file->type = 1;
                    $file->sort = 10;
                    $file->user_id = Auth::id();
                    $file->type_id = $cData->id;
                    $file->save();
                }
            }

            return redirect('/solaris/categories')->with('status', 'success')->with('msg', 'Kategori eklendi!')->with('type', request('type'));

        }
    }


}
