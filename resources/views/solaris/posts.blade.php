@extends('solaris.module')
@section('title',' - İçerikler')
@section('modulecontent')


    <div class="portlet-box">
        <div class="portlet-header flex-row flex d-flex align-items-center">
                <a href="/solaris/add/{{$module}}" class="btn btn-rounded btn-primary btn-sm">Yeni Ekle</a>

        </div>
        <div class="portlet-body no-padding">
            <table class="table table-striped mb-0 table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Başlık</th>
                    <th>Kategorisi</th>
                    <th>Admin</th>
                    <th>Yayın Tarihi</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php($f=0)
                @foreach($cData->data as $key=>$val)
                    @php($f++)
                <tr id="dat-{{$val->id}}">
                    <th scope="row">{{$f}}</th>
                    <td>{{$val->title}}</td>
                    <td>@isset($val->category->title){{$val->category->title}}@endisset</td>
                    <td>{{$val->user->name}}</td>
                    <td>{{$val->publish_time}}</td>
                    <td>
                        <a href="/solaris/posts/edit/{{$val->id}}"  class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a style="float: right;" onclick="sil('{{Crypt::encryptString(json_encode(array("sID"=>$val->id,"func"=>"post","method"=>"destroy")))}}',{{$val->id}})" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                @endforeach
                @if(count($cData->data)==0)
                    <tr>
                        <th scope="row" colspan="5" class="text-center">Kayıtlı veri yok</th>

                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>


@endsection
