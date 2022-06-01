@extends('layouts.app')
@section('title', "")
@section('desc',"")
@section('content')


    <section id="page-content" class=" background-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Page title -->
                    <div class="heading-text heading-section text-left mt-5">
                        <h2>Referanslar</h2>
                        <div class="title-area">
                            <h5><a href=""></a></h5>
                        </div>
                    </div>
                    <div class="portfolio-wrap">
                        <div class="row">
                            @foreach($cData->data as $key=>$val)

                            <div class="col-md-6">
                                    <div class="portfolio-box  " >
<div class="refDiv"></div>
                                            <div style=" position: absolute; left: 50px; top: 50px; bottom:50px; right:50px; background:url('{{Storage::url("images/userfiles/".$val->files[0]->file)}}') no-repeat center center; background-size: 60% "></div>

                                            <figure class="effect-morley">
                                                <figcaption>
                                                    <p>{!! $val->description !!}</p>
                                                </figcaption>
                                            </figure>

                                    </div>
                                    <h5>{{$val->title}}</h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
