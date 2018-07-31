<div class="relates">
    <div class="title">
        <h3>相关推荐</h3>
    </div>
    <ul>
        @forelse($rArticles as $article)
        <li><a href="{{route('blog.show', ['id'=>$article->id])}}"
               title="{{$article->article_title}}">{{$article->article_title}}</a></li>
        @empty
        暂无数据
        @endforelse
    </ul>
</div>