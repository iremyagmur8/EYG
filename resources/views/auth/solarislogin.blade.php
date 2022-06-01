<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Solaris</title>
    <!-- Bootstrap-->
    <link href="/assetWeb/solaris/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Common Plugins CSS -->
    <link href="/assetWeb/solaris/css/plugins/plugins.css" rel="stylesheet">
    <!--fonts-->
    <link href="/assetWeb/solaris/lib/line-icons/line-icons.css" rel="stylesheet">
    <link href="/assetWeb/solaris/lib/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="/assetWeb/solaris/css/style.css" rel="stylesheet">
</head>
<body class='' style="    background: #344258;">

<div class="page-wrapper" id="page-wrapper">

    <main class="content">

        <div class="container flex d-flex">
            <div class='row flex align-items-center'>

                <div class='col-lg-4 mt-60 mb-60 col-md-6 col-sm-12 ml-auto mr-auto'>
                    <div class="bg-white shadow-sm overflow-hidden rounded">
                        <div class="p-4 text-center bg-dark-active text-white">
                            <h4><a href="/" class=" ml-auto mr-auto">{{Config::get('solaris.site.name')}}</a></h4>
                           Lütfen Giriş Yapın
                        </div>
                        <div class="p-3 pt-30 pb-30">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-icon-group">
                                    <div class="d-flex flex flex-row">
                                        <label class="flex d-flex mr-auto" for='pass'>email</label>
                                    </div>
                                    <div class='input-icon-append'>
                                        <i class="fa fa-user"></i>
                                        <input placeholder="kullanıcı adı"  type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="input-icon-group">
                                    <div class="d-flex flex flex-row">
                                        <label class="flex d-flex mr-auto" for='pass'>şifre</label>

                                    </div>
                                    <div class='input-icon-append'>
                                        <i class="fa fa-lock"></i>
                                        <input id="pass" placeholder="şifre" type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="customUi-checkbox  pb-2">
                                    <input id="remember_me" type="checkbox" class="rounded" name="remember">

                                    <label for="remember_me">
                                        <span class="label-checkbox"></span>
                                        <span class="label-helper">Beni Hatırla</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-gradient-primary btn-block btn-lg">Giriş Yap</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- main end-->
        <footer class="content-footer" style="background-color: #262734; border:0; color:#fff">
            <div class="d-flex flex align-items-center pl-15 pr-15">
                <div class="d-flex flex p-3 mr-auto ml-auto justify-content-center">
                    <div class="text-muted">© Copyright 1991-{{date("Y")}}. KaripNetwork</div>
                </div>
            </div>
        </footer><!-- footer end-->
    </main><!-- page content end-->
</div><!-- app's main wrapper end -->
<!-- Common plugins -->
<script type="text/javascript" src="/assetWeb/solaris/js/plugins/plugins.js"></script>
<script type="text/javascript" src="/assetWeb/solaris/js/appUi-custom.js"></script>
</body>
</html>
