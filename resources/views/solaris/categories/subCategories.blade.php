@php
    $padding=$padding. "&nbsp;&nbsp;&nbsp;";
@endphp
@foreach($childs as $child)

    <option value="{{$child->id}}"
            @if(!empty($cData->data) && (isset($cData->data->category_id) and $cData->data->category_id == $child->id) or isset($cData->data->id) and $cData->data->category_id == $child->id)) selected @endif>{!!$padding!!}{{$child->title}}</option>

    @if(count($child->childs))


            @if(!empty($cData->data))
                @include('solaris.categories.subCategories',['childs' => $child->childs,'padding'=> $padding,'cData'=>$cData])
            @else
                @include('solaris.categories.subCategories',['childs' => $child->childs,'padding'=> $padding])
            @endif


    @endif

@endforeach


