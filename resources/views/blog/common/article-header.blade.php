<header class="article-header">
<h1 class="article-title"><a href="{{route('blog.show',['id'=>$article->id])}}"
                             title="{{$article->title}}">{{$article->title}}</a></h1>
<div class="article-meta"> <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title=""
                data-original-title="发表时间：{{$article->create_time}}"><i class="glyphicon glyphicon-time"></i> {{$article->create_time}}</time>
          </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title=""
                        data-original-title="来源：{{$article->source->info}}"><i class="glyphicon glyphicon-globe"></i> {{$article->source->name}}</span>
    <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title=""
          data-original-title="浏览量：{{$article->attribute->clicks or 0}}"><i class="glyphicon glyphicon-eye-open"></i> {{$article->attribute->clicks or 0}}</span> <span
        class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title=""
        data-original-title="评论量"><i class="glyphicon glyphicon-comment"></i> {{$article->attribute->comment or 0}}</span></div>
</header>