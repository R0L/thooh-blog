@extends('layouts.blog')

@section('head')
@endsection

@section('content')
<section class="container">
    <div class="content-wrap">
        <div class="content">
            @include('blog.common.carousel')
            @include('blog.common.recommend')
            @include('blog.common.list')
        </div>
    </div>
    <aside class="sidebar">
        <div class="fixed">
            @include('blog.common.statistics')
            @include('blog.common.search')
        </div>
        @include('blog.common.comment.list')
        @include('blog.common.ad')
        @include('blog.common.friendship')
    </aside>
</section>
@endsection
