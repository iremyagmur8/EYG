@php
    $padding = $padding + 40;
@endphp
    @foreach($childs as $child)

            <tr  id="dat-{{$child->id}}">
        <td style="padding-left: {{$padding}}px">
            {{ $child->title }}</td>
                <td>{{$child->order}}</td>
                <td>{{$child->id}}</td>
               <td>
                   <a  href="/solaris/categories/edit/{{$child->id}}"  class="btn btn-primary btn-sm ikonButton"><i class="fas fa-edit"></i></a>

                    <a style="float: right" onclick="sil('{{Crypt::encryptString(json_encode(array("sID"=>$child->id,"func"=>"category","method"=>"destroy")))}}',{{$child->id}})" class="btn btn-danger btn-sm ikonButton"><i class="fas fa-times"></i></a>
                   </td>
</tr>
            @if(count($child->childs))

                @include('solaris.categories.manageChild',['childs' => $child->childs])
            @endif

    @endforeach


