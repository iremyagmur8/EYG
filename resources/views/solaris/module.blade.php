@extends('layouts.solaris')
@section('content')
    <div class="page-subheader mb-30">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="list">
                        <div class="list-item pl-0">
                            <div class="list-thumb ml-0 mr-3 pr-3  b-r text-muted">
                                <i class="{{config('solaris.modules') [$module]['icon'] }}"></i>
                            </div>
                            <div class="list-body">
                                <div class="list-title fs-2x">
                                    <h3> {{config('solaris.modules') [$module]['name'] }}  </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 d-flex justify-content-end h-md-down">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-padding bg-trans mb-0">

                            <li class="breadcrumb-item"><a href="/solaris/solaris">Solaris</a></li>
                            <li class="breadcrumb-item active">{{config('solaris.modules') [$module]['name'] }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content d-flex flex">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12 mb-30">
                @yield('modulecontent')
            </div>
            </div>
        </div>
    </div>
@endsection
