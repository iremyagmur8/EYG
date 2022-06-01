<option value="0">
    Lütfen Seçin
</option>

@isset($allCategories )
    @foreach($allCategories as $category)
        <option value="{{$category->id}}"
                @if(!empty($cData->data) && $cData->data->parent_id == $category->id) selected @endif>{{$category->title}}</option>

        @if(count($category->childs))
            @php $padding = " "; @endphp

            @if(!empty($cData)) @include('solaris.categories.subCategories',['childs' => $category->childs,'padding'=> $padding,'cData'=>$cData])
            @else @include('solaris.categories.subCategories',['childs' => $category->childs,'padding'=> $padding])
            @endif

        @endif

    @endforeach
@endisset
