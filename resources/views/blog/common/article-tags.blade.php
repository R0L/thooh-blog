<div class="article-tags">标签：
    @forelse($article->labels as $label)
    <a href="{{route('blog.list', ['label_id'=>$label->id])}}" rel="tag">{{$label->name}}</a>
    @empty
    暂无数据
    @endforelse
</div>