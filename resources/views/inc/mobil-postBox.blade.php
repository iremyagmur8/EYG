@php
    use App\Http\Controllers\HomepageController
@endphp
<div class="post-item border">
    <div class="post-item-wrap">
        <div class="post-image">
            <a href="/{{str_slug($bVal->title,"-")}}/{{$bVal->id}}.html">
                <div class="mansetright" style="background:url('{{HomepageController::webps($bVal->files[0]->file,"l")}}') center center; background-size:cover; height: {{$height}}px"></div>
            </a>
        </div>
        <div class="post-item-description">
            @isset($bVal->category->title)
                <small class="badge badge-danger "><a
                        href="/{{$bVal->category->link}}">{{$bVal->category->title}}</a></small>
            @endisset

            @if(isset($title) and $title==1)
                <h3 class="boxtitle1"><a href="/{{str_slug($bVal->title,"-")}}/{{$bVal->id}}.html">{{$bVal->title}}</a></h3>
            @elseif(isset($title) and $title==2)
                <h3 class="boxtitle2"><a href="/{{str_slug($bVal->title,"-")}}/{{$bVal->id}}.html">{{$bVal->title}}</a></h3>
            @elseif(isset($title) and $title==3)
                <h3 class="boxtitle3"><a href="/{{str_slug($bVal->title,"-")}}/{{$bVal->id}}.html">{{$bVal->title}}</a></h3>
            @else
                <h2><a href="/{{str_slug($bVal->title,"-")}}/{{$bVal->id}}.html">{{$bVal->title}}</a></h2>
            @endif
            @if(!isset($desc))
                <p>{{$bVal->shortdescription}}</p>
            @endif
                @if(!isset($date))
                    <small class="post-meta-date"><i class="fa fa-calendar-o"></i>{{$bVal->date}}</small>
                @endif
        </div>
    </div>
</div>
