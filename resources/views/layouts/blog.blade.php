<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'blog') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/css/nprogress.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog/css/font-awesome.min.css') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('blog/images/icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('blog/images/favicon.ico') }}">
    <script src="{{ asset('blog/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('blog/js/nprogress.js') }}"></script>
    <script src="{{ asset('blog/js/jquery.lazyload.min.js') }}"></script>
    <!--[if gte IE 9]>
    <script src="{{ asset('blog/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('blog/js/html5shiv.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('blog/js/respond.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('blog/js/selectivizr-min.js') }}" type="text/javascript"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script>window.location.href = 'upgrade-browser.html';</script>
    <![endif]-->
    @yield('head')
</head>
<body class="user-select">
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="header-topbar hidden-xs link-border">
                <ul class="site-nav topmenu">
                    <!--                    <li><a href="http://www.muzhuangnet.com/tags/" >标签云</a></li>-->
                    <!--                    <li><a href="http://www.muzhuangnet.com/readers/" rel="nofollow" >读者墙</a></li>-->
                    <!--                    <li><a href="http://www.muzhuangnet.com/rss.html" title="RSS订阅" >-->
                    <!--                            <i class="fa fa-rss">-->
                    <!--                            </i> RSS订阅-->
                    <!--                        </a></li>-->
                </ul>
                立常志,常立志
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#header-navbar" aria-expanded="false"><span class="sr-only"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <h1 class="logo hvr-bounce-in"><a href="http://blog.thooh.com/" title="速虎前沿"><img
                                src="{{ asset('blog/images/logo.png') }}" alt="速虎前沿"></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <form class="navbar-form visible-xs" action="/Search" method="post">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20"
                               autocomplete="off">
                        <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span></div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a data-cont="速虎前沿" title="速虎前沿" href="{{route('blog.index')}}">速虎前沿</a></li>
                    <li><a data-cont="列表页" title="列表页" href="{{route('blog.list')}}">列表页</a></li>
                    <li><a data-cont="详细页" title="详细页" href="{{route('blog.show')}}">详细页</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
@yield('content')
<footer class="footer">
    <div class="container">
        <p>本站[<a href="http://blog.thooh.com/">速虎前沿</a>]的部分内容来源于网络，若侵犯到您的利益，请联系站长删除！谢谢！Powered By [<a
                    href="http://www.dtcms.net/" target="_blank" rel="nofollow">DTcms</a>] Version 4.0</p>
    </div>
    <div id="gotop" style="display: block;"><a class="gotop"></a>
    </div>
</footer>
<script src="{{ asset('blog/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('blog/js/jquery.ias.js') }}"></script>
<!--<script src="{{ asset('blog/js/scripts.js') }}"></script>-->
</body>
</html>
