@extends('solaris.module')
@section('title',' - İçerikler')
@section('modulecontent')


    <div class="portlet-box">

        <div class="portlet-body no-padding">
            <table class="table table-striped mb-0 table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Başlık</th>
                    <th>Kategorisi</th>
                    <th>Zaman</th>
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
