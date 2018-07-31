<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Article extends BaseModel
{
    protected $table = 'articles';

    protected $casts = ['user_id' => 'int',];

    protected $fillable = ['title', 'user_id', 'content', 'source_id', 'image_url'];

    public function getContentAttribute($value)
    {
        $result = $value;
        if($value === base64_encode(base64_decode($value))){
            $result = base64_decode($value);
        }
        return $result;
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = base64_encode($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function attribute()
    {
        return $this->hasOne(ArticleAttribute::class, 'article_id', 'id');
    }

    public function click()
    {
        return $this->hasOne(ArticleClick::class, 'article_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(ArticleComment::class, 'article_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, (new LabelRelation())->getTable(), 'relation_id', 'label_id');
    }
}
