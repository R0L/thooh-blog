<?php

namespace App\Models;

class LabelRelation extends BaseModel
{
    protected $table = 'label_relations';

    protected $casts = ['label_id' => 'int', 'relation_id' => 'int', 'type' => 'int',];

    protected $fillable = ['label_id', 'relation_id'];

    public function label()
    {
        return $this->belongsTo(Label::class, 'label_id', 'id');
    }

    public function article()
    {
        return $this->hasOne(Article::class, 'relation_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'relation_id', 'id');
    }

}
