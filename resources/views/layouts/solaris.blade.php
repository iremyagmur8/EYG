<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Solaris @yield("title")</title>
    <!-- Bootstrap-->
    <link href="/assetWeb/solaris/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Common Plugins CSS -->
    <link href="/assetWeb/solaris/css/plugins/plugins.css" rel="stylesheet">
    <!--fonts-->
    <link href="/assetWeb/solaris/lib/line-icons/line-icons.css" rel="stylesheet">
    <link href="/assetWeb/solaris/lib/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="/assetWeb/solaris/css/style.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

    <link href="/custom-solaris.css?v={{time()}}" rel="stylesheet">


    <script type="text/javascript" src="/assetWeb/solaris/js/plugins/plugins.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>

    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>

    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet">
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet"/>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>

    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script>let token = "{{ csrf_token() }}";</script>
</head>
<body>

<div class="page-wrapper" id="page-wrapper">
    <aside id="page-aside" class=" page-aside">
        <div class="sidenav darkNav">
            <a href="/" class="app-logo d-flex flex flex-row align-items-center overflow-hidden justify-content-center">
                <span class="logo-text d-inline-flex"> <span
                        class='font700 d-inline-block mr-1'>{{config('solaris.site.name')}}</span> </span>
            </a>
            <div class="flex">
                <div class="aside-content">
                    <ul class="metisMenu" id="metisMenu">
                        @foreach(config('solaris.modules') as $key => $value)
                            <li>

                                <i class="{{$value ['icon']}}"></i>
                                @if($key=="solaris")
                                    <a class="" href="/solaris">
                                        @else
                                            <a class="" href="/solaris/{{$key}}">
                                                @endif

                                                <span class="nav-text">
                                            {{$value ['name']}}

                                        </span>
                                            </a>
                            </li>
                        @endforeach


                    </ul>
                </div><!-- aside content end-->
            </div><!-- aside hidden scroll end-->

        </div><!-- sidenav end-->
    </aside><!-- page-aside end-->
    <main class="content">
        <header class="navbar page-header whiteHeader navbar-expand-lg">
            <ul class="nav flex-row mr-auto">
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link sidenav-btn h-lg-down">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                    <a class="nav-link sidenav-btn h-lg-up" href="#page-aside" data-toggle="dropdown"
                       data-target="#page-aside">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                </li>

            </ul>
            <ul class="nav flex-row order-lg-2 ml-auto nav-icons">

                <li class="nav-item dropdown user-dropdown align-items-center">
                    <a class="nav-link" href="#" id="dropdown-user" role="button" data-toggle="dropdown">

                        <span class="ml-2 h-lg-down dropdown-toggle">
                                    Merhaba, {{Auth()->user()->name}}
                                </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <div class="text-center p-3 pt-0 b-b mb-5">
                            <span class="mb-0 d-block font300 fs-1x">Merhaba!<br><span
                                    class="font700">{{Auth()->user()->name}}</span></span>
                            <span class="fs12 mb-0 text-muted">Administrator</span>
                        </div>


                        <a class="dropdown-item" href="#"><i class="icon-Gear"></i> Ayarlar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="icon-Power"></i> Çıkış Yap
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </div>
                </li>
                <li class="h-lg-up nav-item">
                    <a href="#" class=" nav-link collapsed" data-toggle="collapse" data-target="#navbarToggler"
                       aria-expanded="false">
                        <i class="icon-Magnifi-Glass2"></i>
                    </a>
                </li>
            </ul>
            <div class="collapse navbar-collapse search-collapse" id="navbarToggler">
                <form class="form-inline ml-1">
                    <button class="no-padding bg-trans border0" type="button"><i class="icon-Magnifi-Glass2"></i>
                    </button>
                    <input class="form-control border0" type="search" placeholder="Ara..." aria-label="Search">
                </form>
            </div>
        </header>


        @yield('content')


        <footer class="content-footer bg-light b-t">
            <div class="d-flex flex align-items-center pl-15 pr-15">

                <div class="d-flex flex p-3 mr-auto justify-content-end">
                    <div class="text-muted">© Copyright 1991-{{date("Y")}} KaripNetwork</div>
                </div>
            </div>
        </footer><!-- footer end-->
    </main><!-- page content end-->
</div><!-- app's main wrapper end -->


<script type="text/javascript" src="/assetWeb/solaris/js/appUi-custom.js"></script>
<script type="text/javascript" src="/assetWeb/solaris/lib/peity/jquery.peity.min.js"></script>
<script src="/js/solaris.js?v={{time()}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function sil(a, b, c = '') {
        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu işlemin geri dönüşü yoktur!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet Sil!',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/ajax-remove',
                    type: "POST",
                    data: {_token: token, func: a, id: b},
                    success: function (response) {
                        console.log(response);
                        $("#dat-" + b).slideUp(function () {
                            $(this).remove();

                        });
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Silindi!',
                                'Bu içerik silindi.',
                                'success'
                            );


                        }
                    },
                });
            }


        })
    }
</script>
</body>
</html>
