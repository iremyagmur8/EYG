@php
    use App\Http\Controllers\HomepageController
@endphp

<div class="col-md-4">
    <div class="widget clearfix widget-archive">
        <div class="post-item border">
            <div class="post-item-wrap" style="padding: 10px">
                <h4 class="widget-title">Top Hits</h4>

                <div class="post-thumbnail-list">
                    @foreach($vars->hits as $key=>$val)
                        <div class="post-thumbnail-entry">
                            <div
                                style="background:url('{{HomepageController::webps($val->files[0]->file,"s")}}') center center; background-size:cover; height: 70px; width: 80px; display: inline-block; float:left;  margin-right:10px"></div>
                            <div class="post-thumbnail-content">
                                <a href="/{{str_slug($val->title,"-")}}/{{$val->id}}.html">{{$val->title}}</a>
                                <span class="post-date"><i class="icon-clock"></i> {{$val->date}}</span>

                            </div>
                        </div>
                    @endforeach

                </div>
                <hr>

                <h4 class="widget-title">Letzte Nachrichten</h4>

                <div class="post-thumbnail-list">
                    @foreach($vars->recent as $key=>$val)
                        <div class="post-thumbnail-entry">
                            <div
                                style="background:url('{{HomepageController::webps($val->files[0]->file,"s")}}') center center; background-size:cover; height: 70px; width: 80px; display: inline-block; float:left;  margin-right:10px"></div>
                            <div class="post-thumbnail-content">
                                <a href="/{{str_slug($val->title,"-")}}/{{$val->id}}.html">{{$val->title}}</a>
                                <span class="post-date"><i class="icon-clock"></i> {{$val->date}}</span>
                            </div>
                        </div>
                    @endforeach

                </div>

                <br style="clear: both">
            </div>
        </div>
    </div>
</div>
