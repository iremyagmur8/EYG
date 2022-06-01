@extends('solaris.module')
@section('title',' - İçerikler')
@section('modulecontent')


    <div class="portlet-box">
        <div class="portlet-header flex-row flex d-flex align-items-center">
            <a href="/solaris/add/{{request("module")}}" class="btn btn-rounded btn-primary btn-sm">Yeni Ekle</a>

        </div>
        <div class="portlet-body no-padding">
            <table class="table table-striped mb-0 table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Tarih</th>
                    <th>Seçenekler</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cData->data as $key=>$val)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$val->title}}</td>
                        <td>{{$val->category}}</td>
                        <td>{{$val->cretaed_at}}</td>
                        <td>{{$val->title}}</td>
                        <td>{{$val->category}}</td>
                        <td>{{$val->cretaed_at}}</td>
                    </tr>
                @endforeach
                @if(count($cData->data)==0)
                    <tr>
                        <th scope="row" colspan="8" class="text-center">Kayıtlı veri yok</th>

                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>


@endsection
