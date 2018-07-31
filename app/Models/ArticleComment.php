<?php

namespace App\Models;

class ArticleComment extends BaseModel
{
    protected $table = 'article_comments';

    public $timestamps = false;
    protected $casts = [
        'article_id' => 'int',
        'user_id' => 'int',
        ];

    protected $dates = ['create_time'];

    protected $fillable = ['article_id', 'user_id', 'comment_id', 'content', 'create_time'];

    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'article_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo('App\Models\ArticleComment', 'comment_id', 'id');
    }
}
