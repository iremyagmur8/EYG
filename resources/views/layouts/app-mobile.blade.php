<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content="@yield('desc')">
    <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')  {{Config.get("solaris.site.name")}}</title>
    <script async src="https://www.googletagmanager.com/gtag/js?id={{Config.get("solaris.site.google")}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{Config.get("solaris.site.google")}}');
    </script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f4f4f4;
            font-size: 16px;
            font-family: Verdana;
        }

        #main-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .title {
            color: #333333;
            font-size: 18px;
        }

        .container {
            margin: 10px;
            background-color: #fff;
            padding: 10px;
        }

        #btn {
            position: fixed;
            z-index: 5;
            top: 15px;
            left: 15px;
            cursor: pointer;
            -webkit-transition: left 500ms cubic-bezier(0.6, 0.05, 0.28, 0.91);
            transition: left 500ms cubic-bezier(0.6, 0.05, 0.28, 0.91);
        }

        #btn div {
            width: 35px;
            height: 2px;
            margin-bottom: 8px;
            background-color: #333;
            -webkit-transition: -webkit-transform 500ms cubic-bezier(0.6, 0.05, 0.28, 0.91), opacity 500ms, box-shadow 250ms, background-color 500ms;
            transition: transform 500ms cubic-bezier(0.6, 0.05, 0.28, 0.91), opacity 500ms, box-shadow 250ms, background-color 500ms;
        }

        #btn:hover > div {
            box-shadow: 0 0 1px #333;
        }

        #btn.active {
            left: 230px;
        }

        #btn.active div {
            background-color: #343838;
        }

        #btn.active:hover > div {
            box-shadow: 0 0 1px #343838;
        }

        #btn.active #top {
            -webkit-transform: translateY(10px) rotate(-135deg);
            -ms-transform: translateY(10px) rotate(-135deg);
            transform: translateY(10px) rotate(-135deg);
        }

        #btn.active #middle {
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
        }

        #btn.active #bottom {
            -webkit-transform: translateY(-10px) rotate(-45deg);
            -ms-transform: translateY(-10px) rotate(-45deg);
            transform: translateY(-10px) rotate(-45deg);
        }

        #box {
            position: fixed;
            z-index: 4;
            overflow: auto;
            top: 0px;
            left: -275px;
            width: 275px;
            opacity: 0;
            padding: 20px 0px;
            height: 100%;
            background-color: #f6f6f6;
            color: #343838;
            -webkit-transition: all 350ms cubic-bezier(0.6, 0.05, 0.28, 0.91);
            transition: all 350ms cubic-bezier(0.6, 0.05, 0.28, 0.91);
        }

        #box.active {
            left: 0px;
            opacity: 1;
        }

        #items {
            position: relative;
            top: 30%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        #items .item a {
            text-decoration: none;
            color: #000
        }

        #items .item {
            position: relative;
            cursor: pointer;
            font-size: 1em;
            padding: 15px 30px;
            -webkit-transition: all 250ms;
            transition: all 250ms;
        }

        #items .item:hover {
            padding: 15px 45px;
            background-color: rgba(52, 56, 56, 0.2);
        }

        .post-meta span {
            color: #888;
            font-size: 0.8em;
        }

        .header {
            position: fixed;
            z-index: 4;
            top: 0px;
            left: 0px;
            right: 0;
            background-color: #fff;
            font-size: 20px;
            text-align: center;
            min-height: 55px;
            line-height: 50px;
        }

        .post-tags a{
            padding: 8px 24px;
            border-radius: 100px;
            background: #f7f7f7;
            color: #999;
            font-size: 11px;
            -webkit-transition: all .3s;
            transition: all .3s;
            display: inline-block;
            margin: 1px;
        }

        .post-item {

        }

        a {
            text-decoration: none;
            color: #000
        }

        .boxtitle1 {
            font-size: 16px;
        }

        .post-item-description {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
        }

        .post-item-description p {
            font-size: 13px;
        }
        .post-item-description small {
            font-size: 11px;
            color: #6B7983;
        }
        .content {padding-top: 60px; padding-bottom: 150px}
    </style>
</head>

<body>
<div id="main-content">
    <div class="header"><a href="/">{{$vars->sitename}}</a></div>
    <div class="content">
    @yield("content")
    </div>
</div>
<div id="btn">
    <div id='top'></div>
    <div id='middle'></div>
    <div id='bottom'></div>
</div>
<div id="box">
    <div id="items">
        @foreach($vars->menu as $key=>$val)
            <div class="item"><a
                    href="@if($val->link){{$val->link}}@else{{"/".str_slug($val->title,"-")."/".$val->id.".html"}}@endif">{{$val->title}}</a>
            </div>
        @endforeach

    </div>
</div>
<script>
    var sidebarBox = document.querySelector('#box');
    var sidebarBtn = document.querySelector('#btn');
    var pageWrapper = document.querySelector('#main-content');

    sidebarBtn.addEventListener('click', function (event) {

        if (this.classList.contains('active')) {
            this.classList.remove('active');
            sidebarBox.classList.remove('active');
        } else {
            this.classList.add('active');
            sidebarBox.classList.add('active');
        }
    });

    pageWrapper.addEventListener('click', function (event) {

        if (sidebarBox.classList.contains('active')) {
            sidebarBtn.classList.remove('active');
            sidebarBox.classList.remove('active');
        }
    });

    window.addEventListener('keydown', function (event) {

        if (sidebarBox.classList.contains('active') && event.keyCode === 27) {
            sidebarBtn.classList.remove('active');
            sidebarBox.classList.remove('active');
        }
    });
</script>

</body>
</html>
