@extends('layouts.app')
@section('title', $cData->data[0]->title." - ")
@section('desc',$cData->data[0]->shortdescription)
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp

    @isset($cData->data[0]->category->files[0]->file)
        <section id="page-title"
                 data-bg-parallax="{{Storage::url("/images/userfiles/".$cData->data[0]->category->files[0]->file)}}">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1>{{$cData->data[0]->category->title}}</h1>
                    <span>{{$cData->data[0]->category->shortdescription}}</span>
                </div>
            </div>
        </section>
    @endisset
    <section id="page-content" style="padding: 10px 0;">
        <div class="container">
            <div class="row">

                <div class="content col-md-12">

                    <div id="blog" class="single-post">
                        @foreach($cData->data as $key=>$val)
                            @include("inc.theme".$val->theme)
                        @endforeach
                    </div>


                </div>

            </div>
        </div>
    </section>


@endsection
