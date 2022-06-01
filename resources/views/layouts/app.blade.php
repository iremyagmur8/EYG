<?php

function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

//ob_start("sanitize_output");

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="@yield('desc')">
    <link rel="icon" href="/favicon.png" type="image/x-icon" />
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>@yield('title') {{config()->get("solaris.site.name")}}</title>
    <!-- Stylesheets & Fonts -->
    <link href="/assetWeb/polo/css/plugins.css" rel="stylesheet">
    <link href="/assetWeb/polo/css/style.css" rel="stylesheet">

    <!-- Template color -->
    <link href="/assetWeb/polo/css/color-variations/purple.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/custom.css?v={{rand(0,999)}}" rel="stylesheet">
    <script src="/assetWeb/polo/js/jquery.js"></script>
    @isset($amp)
        <link rel="amphtml" href="{{$amp}}"/> @endisset
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{config()->get("solaris.site.google")}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{config()->get("solaris.site.google")}}');
    </script>
</head>

<body>


<!-- Body Inner -->
<div class="body-inner">

    <header id="header" class="header-modern submenu-light header-disable-fixed">
        <div class="header-inner">
            <div class="container">

                <div id="logo">
                    <a href="/">
                        <span class="logo-default"><img src="/images/logo.jpg"></span>
                        <span class="logo-dark"><img src="/images/logo.jpg"></span>
                    </a>
                </div>



                <div id="mainMenu-trigger">
                    <a class="lines-button x"><span class="lines"></span></a>
                </div>


                <div id="mainMenu">
                    <div class="container">
                        <nav>
                            <ul>
                                @foreach($vars->menu as $key=>$val)

                                    <li @if(count($val->childs)>0) class="dropdown"
                                        @endif @if (request("page") and request("page")==$val->id) class="current" @endif>
                                        <a
                                            href="@if($val->link){{$val->link}}@else{{"/".str_slug($val->title,"-")."/".$val->id.".html"}}@endif ">
                                            {{$val->title}}
                                        </a>
                                        @if(count($val->childs)>0)
                                            <ul class="dropdown-menu">
                                                @foreach($val->childs as $key2=>$val2)
                                                    <li>
                                                        <a href="@if($val2->link){{$val2->link}}@else{{"/".str_slug($val2->title,"-")."/".$val2->id.".htm"}}@endif">{{$val2->title}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>



@yield("content")

<!-- Footer -->
    <footer id="footer">

        <div class="copyright-content">
            <div class="container">
                <div class="copyright-text text-center">&copy; {{date("Y")}} {{config()->get("solaris.site.name")}}<a href="#"
                                                                                        target="_blank"
                                                                                        rel="noopener"> </a></div>
            </div>
        </div>
    </footer>
    <!-- end: Footer -->

</div>
<!-- end: Body Inner -->

<div id="cookieNotify" class="modal-strip cookie-notify background-dark" data-delay="1000" data-expire="1"
     data-cookie-name="cookiebar2020_1" data-cookie-enabled="true">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-sm-center sm-center sm-m-b-10 m-t-5">
                {{config()->get("solaris.site.cookiedesc")}}
            </div>
            <div class="col-lg-4 text-right sm-text-center sm-center">

                <button type="button" class="btn btn-rounded btn-light btn-sm modal-confirm">
                    {{config()->get("solaris.site.cookiebutton")}}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->

<script src="/assetWeb/polo/js/plugins.js"></script>

<!--Template functions-->
<script src="/assetWeb/polo/js/functions.js"></script>

<!--Template functions-->
<script src="/js/solaris.js"></script>

</body>

</html><?php //ob_end_flush();?>
