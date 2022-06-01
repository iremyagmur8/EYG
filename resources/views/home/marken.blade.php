@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp


    <section id="page-content" class="background-grey" style="padding: 10px 0;">
        <div class="container">
            <div class="row">

                <div class="content col-md-8">
                    <div class="row">
                        @foreach($cData->category as $key=>$val)
                            <div class="col-md-3">
                                <div class="post-item border">
                                    <div class="post-item-wrap" style="padding: 10px">
                                        <div class="post-image">
                                            <a href="/auto/{{str_slug($val->title,"-")}}/{{$val->id}}">
                                                <img src="{{HomepageController::webps($val->files[0]->file,"l")}}">

                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @include("home.sidebar")
            </div>
        </div>
    </section>


@endsection
