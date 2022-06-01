@extends('layouts.app')
@section('title', "")
@section('desc',"")
@section('content')
    @php
        use Carbon\Carbon;
        $dt = Carbon::now();
        setlocale(LC_TIME, 'tr_TR.UTF-8');
    @endphp
    @isset($cData->haberler)
        <section id="page-content" class="background-grey p-t-50">
            <div class="container">
                <div class="heading-text heading-line">
                    <h4>{{$cData->haberler[0]->category->title}}</h4>
                </div>
                <div id="blog" class="post-thumbnails">
                    @foreach($cData->haberler as $key=>$val)
                        <div class="post-item">
                            <div class="post-item-wrap">
                                @if($val->link)
                                    <div class="post-audio">
                                        <iframe  src="https://www.youtube.com/embed/{{$val->link}}" title="YouTube video player"
                                                 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                @else
                                    <div class="post-image">
                                        <a href="/haberler/{{str_slug($val->title,"-")}}/{{$val->id}}">
                                            @isset($val->files[0]->file)
                                                <div class="img" style="background:url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}') center center no-repeat; background-size: contain; height:350px">
                                                </div>
                                            @endisset
                                        </a>
                                    </div>
                                @endif
                                <div class="post-item-description m-t-40"><span class="post-meta-date"><i
                                            class="fa fa-calendar-o"></i>{{$dt->formatLocalized('%d %B %Y')}}</span>
                                    <h2>
                                        @isset($val->title) <a href="/haberler/{{str_slug($val->title,"-")}}/{{$val->id}}">{{$val->title}}</a> @endisset
                                    </h2>
                                    @isset($val->description) <p>{!! $val->description !!}</p> @endisset
                                    <a href="/haberler/{{str_slug($val->title,"-")}}/{{$val->id}}" class="item-link">Devamını
                                        Oku <i class="icon-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset
@endsection
