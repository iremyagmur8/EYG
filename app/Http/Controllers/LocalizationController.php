<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;


class LocalizationController extends Controller
{
    public function lang($locale)
    {

        App::setLocale($locale);
        session()->put('locale', $locale);
        //return view("homeEski.index");
        return redirect()->back();
    }
}
