@extends('layouts.app')
@section('title', "")
@section('desc',"")
@section('content')
    @php
        use Carbon\Carbon;
        $dt = Carbon::now();
        setlocale(LC_TIME, 'tr_TR.UTF-8');
    @endphp
    <section id="page-title" class="page-title-center text-light p-t-100 p-b-100"
             @isset($cData->data->files[1]->file) style="background-image:url({{Storage::url("images/userfiles/". $cData->data->files[1]->file)}});"@endisset>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                @isset($cData->data->title)<h1>{{$cData->data->title}}</h1>@endisset
                <div class="small m-b-20">{{$dt->formatLocalized('%d %B %Y')}} | <a href="#">by EYG</a></div>
                <div class="align-center">
                    @if($vars->contact->facebook)  <a class="btn btn-xs btn-slide btn-facebook"
                                                      href="{{$vars->contact->facebook}}">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </a>
                    @endif
                    @if($vars->contact->twitter)
                        <a class="btn btn-xs btn-slide btn-twitter" href="{{$vars->contact->twitter}}" data-width="100">
                            <i class="fab fa-twitter"></i>
                            <span>Twitter</span>
                        </a>
                    @endif
                    @if($vars->contact->instagram)
                        <a class="btn btn-xs btn-slide btn-instagram" href="{{$vars->contact->instagram}}"
                           data-width="118">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    @endif
                    @if($vars->contact->mail)
                        <a class="btn btn-xs btn-slide btn-googleplus" href="mailto:{{$vars->contact->mail}}"
                           data-width="80">
                            <i class="icon-mail"></i>
                            <span>Mail</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="page-content" class="sidebar-right">
        <div class="container">
            <div id="blog" class="single-post col-lg-12 center">
                <div class="post-item">
                    <div class="post-item-wrap">
                        <div class="post-item-description">
                            <p>{!! $cData->data->description !!}</p>
                        </div>
                        <div class="post-navigation">
                            @if($cData->previous)

                                <a href="/haberler/{{str_slug($cData->previous->title,"-")}}/{{$cData->previous->id}}"
                                   class="post-prev">
                                    <div class="post-prev-title"><span>Önceki Haber</span></div>
                                </a>
                            @endif

                            @if($cData->next)

                                <a href="/haberler/{{str_slug($cData->next->title,"-")}}/{{$cData->next->id}}"
                                   class="post-next">
                                    <div class="post-next-title"><span>Sonraki Haber</span></div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
