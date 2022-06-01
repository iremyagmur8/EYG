<div class="post-item">
    <div class="post-item-wrap">
        @isset($val->files[0]->file)
            <div class="post-image">
                <a href="#">
                    <img  style="float:left; margin: 20px; width:30%" alt="{!! $val->title !!}"
                         src="{{Storage::url("images/userfiles/".$val->files[0]->file)}}">
                </a>
            </div>
        @endisset

        <div class="post-item-description" style="padding: 15px">
            <h2 class="mt-0" style="height: auto;">{{$val->title}}</h2>
            <p style="margin-top: 20px"><b>{{$val->shortdescription}}</b></p>
            {!! str_replace('width="560"','width="100%"',$val->description) !!}
        </div>


    </div>
</div>

