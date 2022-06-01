<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\Models\files;




class PostController extends Controller
{

    public function index()
    {
        $cData = new \ArrayObject();
        $cData->data = post::orderByDesc('id')->get();
        return view('solaris.posts', ['cData' => $cData, 'module' => "posts"]);
    }


    public function create()
    {
        $cData = new \ArrayObject();
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 0)->orderBy('sort')->get();
        $cData->brand = Category::where('parent_id', '=', 43)->where('type', '=', 0)->orderBy('sort')->get();

        return view('solaris.create-posts', ['cData' => $cData,  'module' => 'posts']);
    }


    public function store(Request $request)
    {
        if (request('degisID')) $cData = post::find(request('degisID'));
        else $cData = new post();


        $cData->title = request('title');
        $cData->category_id = request('category');
        $cData->shortdescription = request('shortdescription');
        $cData->sort = request('sort');
        $cData->theme = request('theme');
        $cData->link = request('link');
        $cData->brand = request('brand');
        $cData->tag = request('tag');
        $cData->description = request('description');
        $cData->publish_time = request('publishtime');

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
                    $file->type = 2;
                    $file->sort = 10;
                    $file->user_id = Auth::id();
                    $file->type_id = $cData->id;
                    $file->save();




                  /*
                    $data = [
                        'name' => 'websolutionstuff',
                        'email' => 'websolutionstuff@gmail.com',
                    ];

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.cloudflare.com/client/v4/accounts/:account_id/images/v1/direct_upload",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30000,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                       // CURLOPT_POSTFIELDS => json_encode($data),
                        CURLOPT_HTTPHEADER => array(
                            "content-type: application/json",
                            "Authorization: Bearer DhLGwokORgoCqPQBp854PD4ILsNlaVGDi7FhqR1e"
                        ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        echo '<pre>';
                        print_r(json_decode($response));
                        echo '</pre>';
                    }
*/


                }







            }
        }

        return redirect('/solaris/posts')->with('status', 'success')->with('msg', 'İçerik eklendi!');
    }



    public function edit(post $post)
    {
        $cData = new \ArrayObject();
        $cData->data = post::find(request("id"));
        $cData->categories = Category::where('parent_id', '=', 0)->where('type', '=', 0)->orderBy('sort')->get();
        $cData->brand = Category::where('parent_id', '=', 43)->where('type', '=', 0)->orderBy('sort')->get();

        return view('solaris.create-posts', ['cData' => $cData, 'module' => 'posts']);
    }



}
