<div class="title" id="comment">
    <h3>评论</h3>
</div>
<div id="respond">
    <form id="comment-form" name="comment-form" action="{{route('blog.comment')}}" method="POST">
        <div class="comment">
            {{ csrf_field() }}
            <input name="aId" value="{{$article->id}}" type="hidden"/>
            <input name="name" id="name" class="form-control" size="22" placeholder="您的昵称（必填）" maxlength="15"
                   autocomplete="off" tabindex="1" type="text">
            <input name="email" id="email" class="form-control" size="22" placeholder="您的邮箱（必填）" maxlength="58"
                   autocomplete="off" tabindex="2" type="email">
            <div class="comment-box">
                            <textarea placeholder="您的评论或留言（必填）" name="comment" id="comment"
                                      cols="100%" rows="3" tabindex="3"></textarea>
                <div class="comment-ctrl">
                    <div class="comment-prompt" style="display: none;"><i
                            class="fa fa-spin fa-circle-o-notch"></i> <span class="comment-prompt-text">评论正在提交中...请稍后</span>
                    </div>
                    <div class="comment-success" style="display: none;"><i class="fa fa-check"></i> <span
                            class="comment-prompt-text">评论提交成功...</span></div>
                    <button type="submit" name="comment-submit" id="comment-submit" tabindex="4">评论</button>
                </div>
            </div>
        </div>
    </form>

</div>
<div id="postcomments">
    <ol id="comment_list" class="commentlist">
        @forelse ($article->comments as $comment)
        <li class="comment-content"><span class="comment-f">#2</span>
            <div class="comment-main"><p><a class="address" href="http://www.muzhuangnet.com/"
                                            rel="nofollow" target="_blank">{{$comment->user->name}}</a><span class="time">({{$comment->create_time}})</span><br>{{$comment->content}}
                </p></div>
        </li>
        @empty
        暂无数据
        @endforelse
    </ol>
</div>