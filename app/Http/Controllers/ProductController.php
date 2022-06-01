<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\files;
use App\Models\product;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    static function index()
    {
        $cData = new \ArrayObject();
        $cData->data = product::orderByDesc('id')->get();

        return view('solaris.products', ['cData' => $cData, 'module' => "products"]);


    }


    public function create()
    {

        $cData = new \ArrayObject();
        // type 1 : Ürünler
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 1)->orderBy('sort')->get();
        $cData->color = Category::where('parent_id', '=', 21)->orderBy('sort')->get();

        return view('solaris.create-products', ['cData' => $cData,  'module' => 'products']);
    }


    public function store(Request $request)
    {


        if (request('degisID')) $cData = product::find(request('degisID'));
        else $cData = new product();


        $cData->title = request('title');
        $cData->category_id = request('category');
        $cData->price = request('price');
        $cData->price2 = request('price2');
        $cData->stockcode = request('stockcode');
        $cData->stock = request('stock');
        $cData->sort = request('sort');
        $cData->active = request('active');
        $cData->description = request('description');
        $cData->shortdescription = request('shortdescription');
        $cData->seconddescription = request('seconddescription');
        $cData->sex = request('sex');
        $cData->color = request('color');
        $cData->material = request('material');
        $cData->productcode = request('productcode');

        $cData->theme = request('theme');
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
                    $file->type = 5;
                    $file->sort = 10;
                    $file->user_id = Auth::id();
                    $file->type_id = $cData->id;
                    $file->save();
                }
            }
        }

        return redirect('/solaris/products')->with('status', 'success')->with('msg', 'Ürün eklendi!');
    }


    public function show(product $product)
    {
        //
    }

    static function sex( $var)
    {
        if ($var==1) $don="Woman" ; else if ($var==2) $don="Man"; else if ($var==3) $don="Unisex";
        return $don;
    }


    public function edit(product $product)
    {

        $cData = new \ArrayObject();
        $cData->data = product::find(request("id"));
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 1)->orderBy('sort')->get();
        $cData->color = Category::where('parent_id', '=', 21)->orderBy('sort')->get();
        return view('solaris.create-products', ['cData' => $cData, 'module' => 'products']);


    }


    public function update(Request $request, product $product)
    {
        //
    }


    public function destroy(product $product)
    {
        //
    }
}
