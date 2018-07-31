@extends('layouts.blog')

@section('head')
@endsection

@section('content')
<section class="container">
    <div class="content-wrap">
        <div class="content">
            @include('blog.common.list')
        </div>
    </div>
    <aside class="sidebar">
        <div class="fixed">
            <div class="widget widget_search">
                <form class="navbar-form" action="/Search" method="post">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
                        <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
                </form>
            </div>
            <div class="widget widget_sentence">
                <h3>标签云</h3>
                <div class="widget-sentence-content">
                    <ul class="plinks ptags">
                        @forelse($labels as $label)
                        <li><a href="{{route('blog.list',['label_id'=>$label->label_id])}}" title="{{$label->label_name}}" draggable="false">{{$label->label_name}} <span class="badge">{{$label->label_use_num}}</span></a></li>
                        @empty
                        暂无数据
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        @include('blog.common.comment.list')
        <div class="widget widget_sentence">

            <a href="http://www.muzhuangnet.com/show/269.html" target="_blank" rel="nofollow" title="MZ-NetBlog主题" >
                <img style="width: 100%" src="images/ad.jpg" alt="MZ-NetBlog主题" ></a>

        </div>
        <div class="widget widget_sentence">

            <a href="http://web.muzhuangnet.com/" target="_blank" rel="nofollow" title="专业网站建设" >
                <img style="width: 100%" src="http://www.muzhuangnet.com/upload/201610/24/201610241224221511.jpg" alt="专业网站建设" ></a>

        </div>
    </aside>
</section>
@endsection
