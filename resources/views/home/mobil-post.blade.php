@extends('layouts.app-mobile')
@section('title', $cData->posts->title." - ")
@section('desc',$cData->posts->shortdescription)
@section('content')
    @php use App\Http\Controllers\HomepageController @endphp

    @isset($cData->posts->files[0]->file)
        <div class="post-image">
            <a href="#">
                <img width="100%" height="240" alt="{!! $cData->posts->title !!}"
                     src="{{HomepageController::webps($cData->posts->files[0]->file,"m")}}">
            </a>
        </div>
    @endisset

    <div class="container">
        <h2 class="title">{{$cData->posts->title}}</h2>
        <p style="margin-top: 20px">{{$cData->posts->shortdescription}}</p>
        <div class="post-meta">
            <span>{{$cData->posts->created_at}}</span><br>
            <span>{{$cData->posts->hit}} Hit</span><br>
            <span>{{$cData->posts->category->title}}</span><br>
        </div>
        {!! str_replace('width="560"','width="100%"',$cData->posts->description) !!}
        @if(count($cData->posts->tags)>1)
            <div class="post-tags">
                @foreach($cData->posts->tags as $key=>$val)
                    <a href="#">{{$val}}</a>
                @endforeach
            </div>
        @endif
        @if(count($cData->brands)>0)
            <h3>Verwandte Artikel</h3>
            @foreach($cData->brands as $key=>$val)
                @include("inc.mobil-postBox",['bVal'=>$val,"title"=>1,"height"=>200])
            @endforeach
        @endif
    </div>


@endsection
