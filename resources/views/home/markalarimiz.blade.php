@extends('layouts.app')
@section('title', "")
@section('desc',"")
@section('content')

    @isset($cData->projeler)
        <section id="page-content" class="background-grey">
            <div class="container">
                <div class="row">
                    <div class="heading-text heading-section text-left mt-5">
                        <h2>Markalarımız</h2>
                        <p class="lead">Evdeki Fırsat, Kentsel Yönetim ve Narlı Bahçe Evleri markalarını çatısı altında
                            toplayan EYG, gayrimenkul sektöründe proje üretiminden satışa ve satış sonrası hizmetlere
                            kadar geniş bir yelpazede faaliyet gösteren Türkiye’nin Konut Uzmanı’dır.
                        </p>
                    </div>
                    @foreach( $cData->projeler as $key=>$val)
                        @isset($val->files[0]->file)
                            <div class="col-md-6 pl-0" style="margin-bottom: 30px">
                                <div class="project-images">
                                    <a href="#"><img alt="" width="100%" class="img-responsive br-10"
                                                     src="{{Storage::url("images/userfiles/".$val->files[0]->file)}}">
                                    </a>
                                </div>
                                <h4 class="text-center mt-2 mb-0">{{$val->title}}</h4>
                                <p class="p-2">{!! $val->shortdescription !!}</p>
                            </div>
                        @endisset
                    @endforeach
                </div>
            </div>
        </section>
    @endisset

@endsection
