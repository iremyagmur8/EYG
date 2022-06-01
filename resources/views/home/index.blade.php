@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
        @isset($cData->place[1])
            @foreach($cData->place[1] as $key=>$val)
                <div class="slide kenburns"

                     @isset($val->files[0]->file) @if(pathinfo($val->files[0]->file, PATHINFO_EXTENSION) == 'mp4')  data-bg-video="{{Storage::url("images/userfiles/". $val->files[0]->file)}}"
                     @else data-bg-image="{{Storage::url("images/userfiles/". $val->files[0]->file)}}" @endif @endisset>
                    <div class="bg-overlay"></div>

                    <div class="container">
                        <div class="slide-captions text-center text-light">

                            <h2>{{$val->title}}</h2>
                            {!! $val->description !!}
                            @if($val->buttontext)
                                <div><a href="{{$val->link}}"
                                        class="btn scroll-to text-capitalize"> {!! $val->buttontext !!}</a>
                                </div>@endif

                        </div>
                    </div>
                </div>

            @endforeach
        @endisset
    </div>

    <section class="text-left p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                <div class="heading-text heading-section text-left">
                    @isset($cData->home[0]->title)<h2>{{$cData->home[0]->title}}</h2>@endisset
                    @isset($cData->home[0]->description)<p class="lead">{!! $cData->home[0]->description !!} @endisset
                    </p>
                    @isset($cData->home[0]->link)
                        <br/>
                        <a href="{{route('hakkimizda')}}">
                            <button type="button" class="btn btn-rounded btn-red">{{$cData->home[0]->link}}</button>
                        </a>
                    @endisset
                </div>

            </div>
        </div>
    </section>
    @isset($cData->projeler)
        <section class="text-left p-t-40 p-b-40">
            <div class="container">
                <div class="row">
                    <div class="heading-text heading-section text-left">
                        <h2>Markalarımız</h2>
                        <p class="lead">Evdeki Fırsat, Kentsel Yönetim ve Narlı Bahçe Evleri markalarını çatısı altında
                            toplayan EYG, gayrimenkul sektöründe proje üretiminden satışa ve satış sonrası hizmetlere
                            kadar geniş bir yelpazede faaliyet gösteren Türkiye’nin Konut Uzmanı’dır.
                        </p>
                    </div>
                    @foreach( $cData->projeler as $key=>$val)
                        @isset($val->files[0]->file)
                            <div class="col-md-6">

                                <div class="project-images">
                                    <a href="#"><img alt="" class="img-responsive br-10"
                                                     src="{{Storage::url("images/userfiles/".$val->files[0]->file)}}">
                                    </a>
                                </div>

                                <h4 class="text-center" style="color:#bf8d63">{{$val->title}}</h4>
                                <p class="px-2 three-dots">{!! $val->shortdescription !!}</p>

                            </div>
                        @endisset
                    @endforeach
                </div>
            </div>
        </section>
    @endisset
    <section class="text-left p-t-40 p-b-40">
        <div class="container">
            <div class="heading-text heading-section text-left">
                <h2>Basında EYG</h2>
            </div>
            <div id="blog" class="grid-layout post-2-columns m-b-30 grid-loaded" data-item="post-item">
                @foreach($cData->haberler as $key=>$val)

                    <div class="post-item border">
                        <div class="post-item-wrap">
                            @if($val->link)
                            <div class="post-audio">
                                <iframe  src="https://www.youtube.com/embed/{{$val->link}}" title="YouTube video player"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @else
                                <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="{{Storage::url("/images/userfiles/". $val->files[0]->file)}}">
                                    </a>
                                </div>
                            @endif
                            <div class="post-item-description"><span class="post-meta-date"><i
                                        class="fa fa-calendar-o"></i>{{$val->date}}</span>
                                <h2><a href="#">{{$val->title}}</a></h2>
                                <p class="three-dots">{{$val->shortdescription}}</p>
                                <a href="#" class="item-link">Daha fazlası için<i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
