@extends('layouts.app')
@section('title','Hitit Arabuluculuk')
@section('desc','')
@section('content')



    <section id="page-content" class="background-grey">
        <div class="container container-fullscreen">
            <div class="text-middle">

                <div class="row">
                    <div class="col-lg-6 center p-50 background-white b-r-6" style="padding-top: 20px !important;">


                        <form class="form-transparent-grey" method="POST" action="{{ route('register') }}">
                            @if($errors->any())
                                <div class="alert alert-danger text-center">
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="1"/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Yeni Hesap Aç</h4>

                                </div>

                                <div class="col-lg-12 form-group">
                                    <label class="sr-only">Adınız Soyadınız</label>
                                    <input type="text" value="" name="name" placeholder="Adınız Soyadınız"
                                           class="form-control  @error('name') is-invalid @enderror">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label class="sr-only">Email</label>
                                    <input type="text" value="" name="email" placeholder="Email"
                                           class="form-control  @error('email') is-invalid @enderror">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label class="sr-only">Şifre</label>
                                    <input id="password" type="password" placeholder="Şifre"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label class="sr-only">Şifre Tekrar</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           placeholder="Şifre Tekrar" name="password_confirmation" required
                                           autocomplete="new-password">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <button class="btn" type="submit">Kayıt Ol</button>

                                </div>

                            </div>
                        </form>
                        <p class="small">Zaten üye misiniz? <a href="/login">Giriş Yap</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
