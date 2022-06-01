@extends('layouts.app-mobile')
@section('title','')
@section('desc','')
@section('content')
    @foreach($cData->posts as $key=>$val)
        @include("inc.mobil-postBox",['bVal'=>$val,"title"=>1,"height"=>200])
    @endforeach
@endsection
