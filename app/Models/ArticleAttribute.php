<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/28
 */

namespace App\Models;


class ArticleAttribute extends BaseModel
{
    protected $table = 'article_attributes';

    public $timestamps = false;

    protected $casts = [
        'article_id' => 'int',
        'clicks' => 'int',
        'comments' => 'int',
        ];

    protected $fillable = ['article_id', 'clicks', 'comments'];

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}