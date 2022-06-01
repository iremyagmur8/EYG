<?php

namespace App\Http\Controllers;

use App\Models\files;
use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function delete()
    {

        $bol = explode("/", request("file"));
        $sil = end($bol);

        files::where("file", "=", $sil)->delete();
        // dd(request("file"));
        return;

    }


    public function sort()
    {
        foreach (request("file") as $key=>$val) {
            files::where("file", "=", $val)->update(["sort"=>$key]);
        }

    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\files $files
     * @return \Illuminate\Http\Response
     */
    public function show(files $files)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\files $files
     * @return \Illuminate\Http\Response
     */
    public function edit(files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\files $files
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\files $files
     * @return \Illuminate\Http\Response
     */
    public function destroy(files $files)
    {
        //
    }
}
