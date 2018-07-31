<div class="widget widget_hot">
    <h3>最新评论文章</h3>
    <ul>
        @forelse($cArticles as $key=>$article)
        <li><a title="{{$article->article_title}}" href="{{route('blog.show',['id'=>$article->id])}}" ><span class="thumbnail">
    <img class="thumb" data-original="{{$article->article_image_url}}" src="{{$article->article_image_url}}" alt="{{$article->article_title}}"  style="display: block;">
</span><span class="text">{{$article->article_title}}</span><span class="muted"><i class="glyphicon glyphicon-time"></i>
    {{$article->article_create_time}}
</span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i>{{$article->click or 0}}</span></a></li>
        @empty
        暂无数据
        @endforelse
    </ul>
</div>