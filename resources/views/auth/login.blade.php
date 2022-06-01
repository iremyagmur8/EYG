@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')


    <section id="page-content" class="background-grey">
        <div class="container">

            <div class="row">

                <div class="col-lg-5 center p-50 background-white b-r-6" style="padding-top: 20px !important;">

                    @if($errors->any())
                        <div class="alert alert-danger text-center">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                    @endif
                    <h4>Lütfen Giriş Yapın</h4>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email adresinizi yazın">
                        </div>
                        <div class="form-group m-b-5">
                            <label class="sr-only">Şifre</label>
                            <input type="password" class="form-control" name="password"  placeholder="Şifrenizi yazın">
                        </div>
                        <div class="form-group form-inline text-left">
                            <div class="form-check">
                                <label>
                                    <input type="checkbox"><small class="m-l-10"> Beni Hatırla</small>
                                </label>
                            </div>
                        </div>
                        <div class="text-left form-group">
                            <button type="submit" class="btn">Giriş Yap</button>
                        </div>
                    </form>
                    <p class="small">Hesabınız yok mu? <a href="/register">Kayıt Olun</a><br><a href="/forgot-password">Şifremi Unuttum</a>

                    </p>
                </div>
            </div>
        </div>

        </div>
    </section>

@endsection
