@extends('layouts.app')
@section('title', "")
@section('desc',"")
@section('content')

    <section class="no-padding">
        <!-- Google Map -->
        <div class="maps">
            <iframe src="{{$cData->contact->googlemap}}" height="500" style="border:0;" allowfullscreen=""
                    loading="lazy"></iframe>
        </div>
        <!-- end: Google Map -->
    </section>
    <!-- end: Page title -->
    <!-- CONTENT -->
    <section>
        <div class="container contact-page mt-3">
            <div class="row">
                <div class="col-lg-6">
                    <h3>İLETİŞİM</h3>
                    <p>{!! $cData->contact->description !!}</p>
                    <div class="row my-4 ml-0">
                        <div class="col-lg-6 pl-0">
                            <address>
                                <strong>Adres</strong><br>
                                {{$cData->contact->address}}
                            </address>
                        </div>
                        <div class="col-lg-6 pl-0">
                            <strong>İletişim</strong><br>
                            <a href="tel:{{$cData->contact->phone}}" title="Phone"><strong>Tel:</strong></h4> {{$cData->contact->phone}} </a>
                            <br>
                            <a title="Phone"><strong>Fax:</strong></h4> {{$cData->contact->fax}} </a>
                            <br>
                            <a href="mailto:{{$cData->contact->mail}}" title="Phone"><strong>Mail:</strong></h4> {{$cData->contact->mail}} </a>
                        </div>
                    </div>
                    <div class="social-icons m-t-30 social-icons-colored">
                        <ul>
                            <li class="social-facebook"><a href="{{$cData->contact->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-linkedin"><a href="{{$cData->contact->linkedin}}"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="widget-contact-form"  action="/iletisim"   method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Ad-Soyad</label>
                                <input type="text" aria-required="true" required name="name"
                                       class="form-control required name" placeholder="Ad ve Soyad giriniz">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" aria-required="true" required name="email"
                                       class="form-control required email" placeholder="Email adresinizi giriniz">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Telefon</label>
                                <input type="text" aria-required="true" required name="phone"
                                       class="form-control required name" placeholder="Telefon numaranızı giriniz">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subject">Konu</label>
                                <input type="text" name="subject" required
                                       class="form-control required" placeholder="Konu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Mesajınız</label>
                            <textarea type="text" name="message" required rows="5"
                                      class="form-control required" placeholder="Mesajınızı giriniz"></textarea>
                        </div>

                        <button class="btn" type="submit" id="form-submit"><i class="fas fa-paper-plane"></i>&nbsp;Gönder
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section> <!-- end: Content -->
@endsection
