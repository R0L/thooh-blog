@extends('layouts.blog')

@section('head')
<style type="text/css">
    .panel {
        padding: 80px 20px 0px;
        min-height: 400px;
        cursor: default;
    }

    .text-center {
        margin: 0 auto;
        text-align: center;
        border-radius: 10px;
        max-width: 900px;
        -moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, .3);
        -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, .3);
        box-shadow: 0px 0px 5px rgba(0, 0, 0, .1);
    }

    .float-left {
        float: left !important;
    }

    .float-right {
        float: right !important;
    }

    img {
        border: 0;
        vertical-align: bottom;
    }

    h2 {
        padding-top: 20px;
        font-size: 20px;
    }

    .padding-big {
        padding: 20px;
    }

    .alert {
        border-radius: 5px;
        padding: 15px;
        border: solid 1px #ddd;
        background-color: #f5f5f5;
    }
</style>
@endsection

@section('content')
<section class="container">
    <div class="panel">
        <div class="text-center">
            <h2>
                <stong>404错误！很抱歉，您要找的页面不存在</stong>
            </h2>
            <div class="padding-big"><a href="http://www.muzhuangnet.com/index.html" class="btn btn-primary">返回首页</a>
            </div>
            <div class="padding-big"><a href="http://www.muzhuangnet.com/show/269.html" title="用DTcms做一个独立博客网站（响应式模板）">用DTcms做一个独立博客网站（响应式模板）</a>
            </div>
            <div class="padding-big"><a href="http://www.muzhuangnet.com/list/mznetblog/" title="MZ-NetBolg主题">MZ-NetBolg主题栏目</a>
            </div>
        </div>
    </div>
</section>
@endsection
