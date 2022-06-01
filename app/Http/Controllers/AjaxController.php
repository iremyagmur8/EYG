<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;


class AjaxController extends Controller
{
    public function subCats()
    {
        $allCategories = Category::where('parent_id', '=', 0)->where('type', '=', request('type'))->orderBy('sort')->get();
        return view('solaris.categories.ajaxSelect', compact('allCategories'));
    }

    public function destroy(Request $request)
    {


        $func = $request->input("func");
        $vars = json_decode(Crypt::decryptString($func), TRUE);

        if ($vars["method"] == "destroy") {
            call_user_func('App\Models\\' . $vars["func"] . '::destroy', $vars["sID"]);
        }

    }

}
