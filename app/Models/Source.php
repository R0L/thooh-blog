<?php

namespace App\Models;

class Source extends BaseModel
{
    protected $table = 'sources';

    protected $fillable = ['name', 'info'];

    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'source_id', 'id');
    }

}
