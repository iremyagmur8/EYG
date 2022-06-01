@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    @php
        use App\Http\Controllers\HomepageController
    @endphp


    <section id="page-content" class="background-grey" style="padding: 10px 0;">
        <div class="container">
            <div class="row">

                <div class="content col-md-8">
                    <div class="row">
                        @foreach($cData->posts as $key=>$val)
                                <div class="col-md-6">
                                    @include("inc.postBox",['bVal'=>$val,"title"=>1,"height"=>200])
                                </div>
                        @endforeach
                    </div>
                </div>
                @include("home.sidebar")
            </div>
        </div>
    </section>


@endsection
