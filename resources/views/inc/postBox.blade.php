@php
    use App\Http\Controllers\HomepageController
@endphp
<div class="post-item border">
    <div class="post-item-wrap">
        <div class="post-image">
            <a href="/{{str_slug($bVal->title,"-")}}/{{$bVal->id}}.html">
                <div class="mansetright" style="background:url('{{HomepageController::webps($bVal->files[0]->file,"l")}}') center center; background-size:cover; height: {{$height}}px"></div>
            </a>
            @isset($bVal->category->title)
                <span class="badge badge-danger "><a
                        href="/{{$bVal->category->link}}">{{$bVal->category->title}}</a></span>
            @endisset
            @if(!isset($date))
                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{$bVal->date}}</span>
            @endif
        </div>
        <div class="post-item-description">
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
                <p style="height: 92px">{{$bVal->shortdescription}}</p>
            @endif
        </div>
    </div>
</div>
