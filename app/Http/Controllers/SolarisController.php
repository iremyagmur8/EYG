<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\product;
use App\Models\solaris;
use Illuminate\Http\Request;
use Config;


class SolarisController extends Controller
{

    public function index()
    {
        $cData = new \ArrayObject();
        return view ('solaris.index',['cData'=>$cData,'module'=>"solaris"]);
    }

    public function login()
    {
        return view ('auth.solarislogin');
    }

    public function openmodule()
    {
        $cData = new \ArrayObject();



      if (request("module")=="posts")  {
          $cData->categories=category::all();
          $cData->data=post::all();

      }

        if (request("module")=="products")  {
            ProductController::index();

        }

        if (request("module")=="orders")  {
            $cData->categories=category::all();
            $cData->data=post::all();
        }

        if (request("module")=="banners")  {
            $cData->categories=category::all();
            $cData->data=post::all();
        }

        if (request("module")=="admin")  {
            $cData->categories=category::all();
            $cData->data=post::all();
        }

        if (request("module")=="settings")  {
            $cData->categories=category::all();
            $cData->data=post::all();
        }

        if (request("module")=="contact")  {
            $cData->categories=category::all();
            $cData->data=post::all();
        }

        if (request("module")=="galleries")  {
            $cData->categories=category::all();
            $cData->data=post::all();
        }

        if (request("module")=="videogalleries")  {
            $cData->categories=category::all();
            $cData->data=post::all();
        }
        if (request("module")=="categories")  {
            $cData->all=category::where('parent_id', '=', 0)->orderBy('sort')->get();

            $allCategories = new \ArrayObject();

            foreach (Config::get('solaris.catTypes') as $key => $val) {
                $allCategories[$val["id"]] = Category::where('parent_id', '=', 0)->where('type', '=', $val["id"])->orderBy('sort')->get();
            }


            return view ('solaris.categories.categoryTreeview',['allCategories'=>$allCategories,'cData'=>$cData,'module'=>request('module')]);
        }

        return view ('solaris.'.request("module"),['cData'=>$cData,'module'=>request('module')]);
    }


    public function create()
    {
        $cData = new \ArrayObject();

        return view ('solaris.create-'.request("module"),['cData'=>$cData,'module'=>request('module')]);

    }





    public function store(Request $request)
    {
        //
    }


    public function show(solaris $solaris)
    {
        //
    }


    public function edit(solaris $solaris)
    {
        //
    }


    public function update(Request $request, solaris $solaris)
    {
        //
    }


    public function destroy(solaris $solaris)
    {
        //
    }
}
