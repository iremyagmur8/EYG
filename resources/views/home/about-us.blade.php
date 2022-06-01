@extends('layouts.app')
@section('title', $cData->data[0]->title." - ")
@section('desc',$cData->data[0]->shortdescription)
@section('content')


    <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">
        <div class="slide kenburns"
             @isset($cData->category->files[0]->file) style="background-image:url('{{Storage::url("images/userfiles/". $cData->category->files[0]->file)}}'); @endisset">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    @isset($cData->category->shortdescription) <span
                        class="strong">{{$cData->category->shortdescription}}</span> @endisset
                    @isset($cData->category->title) <h1>{{$cData->category->title}}</h1> @endisset
                </div>
            </div>
        </div>
    </div>
    <section class="box-fancy section-fullwidth text-light no-padding">
        <div class="row">
            @isset($cData->mission)
                <div class="col-lg-6 text-right" style="background-color: #ab7d57">
                    <h2>{{$cData->mission->title}}</h2>
                    <span class="lead">{!! $cData->mission->description !!} </span>
                </div>

            @endisset
            @isset($cData->vission)
                <div class="col-lg-6 text-left" style="background-color: #ba885f">
                    <h2>{{$cData->vission->title}}</h2>
                    <span class="lead"> {!! $cData->vission->description !!} </span>
                </div>
            @endisset
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                @isset($cData->category->shortdescription)
                    <div class="col-lg-3">
                        <div class="heading-text heading-section">
                            <h2 style="font-size: 57px;">{{ $cData->category->shortdescription}}</h2>
                        </div>
                    </div>
                @endisset
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($cData->data as $key=>$val)
                            @if($loop->iteration > 0 and $loop->iteration < 3)
                                @isset($val->description)
                                    <div class="col-lg-6">{!! $val->description !!}
                                    </div>
                                @endisset
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @isset($cData->kalite)

        <section class="box-fancy section-fullwidth text-light ">
            <div class="row">
                <div class="col-lg-12 text-center" style="background-color: #ab7d57">
                    <h2>{{$cData->kalite->title}}</h2>
                    <span class="lead text-left">{!! $cData->kalite->description !!} </span>
                </div>
            </div>
        </section>

    @endisset
    @foreach($cData->data as $key=>$val)
        @if($loop->last)
            <section class="p-b-0">
                <div class="container">
                    <div class="row align-items-center">
                        @isset($val->files[0]->file)
                            <div class="col-lg-5"><img alt="" width="100%"
                                                       src="{{Storage::url("images/userfiles/" . $val->files[0]->file)}}">
                            </div>
                        @endisset
                        <div class="col-lg-7">
                            <div class="heading-text heading-section mt-5 baskanMesaj">
                                @isset($val->title)<h4>{{$val->title}}</h4>@endisset
                                @isset($val->description){!! $val->description !!}@endisset
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    @isset($cData->cevre)
        <div class="card p-0 m-0">
            @isset($cData->cevre->files[0]->file)
                <div data-bg-image="{{Storage::url('/images/userfiles/' . $cData->cevre->files[0]->file)}}"
                     style="height: 500px; display: flex;align-items: center; background-image: url(&quot;{{Storage::url('/images/userfiles/' . $cData->cevre->files[0]->file)}}&quot;);"
                     class="lazy-bg bg-loaded"
                     data-bg="{{Storage::url('/images/userfiles/' . $cData->cevre->files[0]->file)}}"
                     data-ll-status="loaded"> @endisset
                    <div class="bg-overlay" data-style="10"></div>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            @isset($cData->cevre->title)
                                <div class="heading-text heading-section text-light text-center">
                                    <h4>{{$cData->cevre->title}}</h4>
                                </div>
                            @endisset
                            <div class="text-light text-left">
                                @isset($cData->cevre->description) <h3>{!! $cData->cevre->description !!}</h3> @endisset
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endisset
@endsection
