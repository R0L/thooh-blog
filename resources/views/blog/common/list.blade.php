<div class="title">
    <h3 style="line-height: 1.3">
        @if (strpos(url()->current(), 'source') !== false)
        {{$articles['list'][0]->source_name}}
        @else
        {{ $articles['list'][0]->label_name or '全部标签'}}
        @endif
        </h3>
</div>
@forelse  ($articles['list'] as $key=>$article)
<article class="excerpt excerpt-1"><a class="focus" href="{{route('blog.show',['id'=>$article->id])}}"
                                      title="{{$article->article_title}}" target="_blank"><img class="thumb"
                                                                                               data-original="{{$article->article_image_url}}"
                                                                                               src="{{$article->article_image_url}}"
                                                                                               alt="{{$article->article_title}}"
                                                                                               style="display: inline;"></a>
    <header><a class="cat" href="{{route('blog.source',['id'=>$article->source_id])}}"
               title="{{$article->source_name}}">{{$article->source_name}}<i></i></a>
        <h2><a href="{{route('blog.show',['id'=>$article->id])}}" title="{{$article->article_title}}" target="_blank">{{$article->article_title}}</a>
        </h2>
    </header>
    <p class="meta">
        <time class="time"><i class="glyphicon glyphicon-time"></i> {{$article->article_create_time}}</time>
        <span class="views"><i class="glyphicon glyphicon-eye-open"></i> {{$article->clicks or 0}}</span> <a
                class="comment" href="http://www.muzhuangnet.com/show/269.html#comment" title="评论" target="_blank"><i
                    class="glyphicon glyphicon-comment"></i> {{$article->comment or 0}}</a></p>
    <p class="note">{{$article->article_title}}</p>
</article>
@empty
暂无数据
@endforelse
<nav class="pagination">
    <ul>
        @if ($articles['page'] > 0)
        <li class="prev-page"><a href="?page={{$articles['page']-1}}">上一页</a></li>
        @endif

        <li class="active"><span>{{$articles['page']+1}}</span></li>

        @if ($articles['page']+1 < $articles['pageTotal'])
        <li class="next-page"><a href="?page={{$articles['page']+1}}">下一页</a></li>
        @endif
        <li><span>共 {{$articles['pageTotal']}} 页</span></li>
    </ul>
</nav>