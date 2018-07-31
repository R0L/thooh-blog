<div id="focusslide" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#focusslide" data-slide-to="0" class="active"></li>
        <li data-target="#focusslide" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="{{ route('blog.index') }}" target="_blank" title="测试轮播图A">
                <img src="/images/a.jpg" alt="测试轮播图A"
                     class="img-responsive"></a>
        </div>
        <div class="item">
            <a href="{{ route('blog.index') }}" target="_blank" title="测试轮播图B">
                <img src="/images/b.jpg" alt="专业网站建设"
                     class="img-responsive"></a>
        </div>
    </div>
    <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span
                class="sr-only">上一个</span> </a> <a class="right carousel-control" href="#focusslide"
                                                   role="button" data-slide="next" rel="nofollow"> <span
                class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span>
    </a>
</div>