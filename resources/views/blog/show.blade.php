@extends('layouts.blog')

@section('head')
@endsection

@section('content')
<section class="container">
    <div class="content-wrap">
        <div class="content">
            @include('blog.common.article-header')
            <article class="article-content">
                <p>
                    {!!$article->content!!}
                </p>
                @include('blog.common.share')
            </article>
            @include('blog.common.article-tags')
            @include('blog.common.relates')
            @include('blog.common.comment.comment')
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
