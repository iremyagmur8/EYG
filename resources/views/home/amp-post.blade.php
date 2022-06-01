@extends('layouts.app-amp')
@section('title', $cData->posts->title." - ")
@section('desc',$cData->posts->shortdescription)
@section('content')
    @php use App\Http\Controllers\HomepageController @endphp
<main id="content" role="main" class="">
    <article class="recipe-article">
        <header>
            <span class="ampstart-subtitle block pt2 mb2">{{$cData->posts->category->title}}</span>
            <h1 class="mb1 ampstart-title-md mb4">{{$cData->posts->title}}</h1>

            <!-- Start byline -->
            <address class="ampstart-byline clearfix">
                <time style="font-size: 1em;"
                    class="ampstart-byline-pubdate block bold"
                    datetime="{{date("Y-m-d H:i",strtotime($cData->posts->updated_at))}}"
                >{{date("Y-m-d H:i",strtotime($cData->posts->updated_at))}}</time
                >
            </address>
            <!-- End byline -->
            <amp-img
                src="{{HomepageController::webps($cData->posts->files[0]->file,"m")}}"
                width="1280"
                height="853"
                layout="responsive"
                alt="{{$cData->posts->title}}"
                class="mb4"
            ></amp-img>
        </header>
        {!! str_replace('width="560"','width="100%"',$cData->posts->description) !!}







        @if(count($cData->posts->tags)>1)
            <section>
                <h2 class="mb3">Categories</h2>
                <ul class="list-reset p0 m0 mb4">
                @foreach($cData->posts->tags as $key=>$val)
                        <li class="mb2">
                            <a href="#" class="text-decoration-none h3">{{$val}}</a>
                        </li>
                @endforeach
                </ul>
            </section>
            </section>
        @endif




    </article>
</main>
@endsection
