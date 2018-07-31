<?php

namespace App\Models;

class Label extends BaseModel
{
    protected $table = 'labels';

    protected $fillable = ['name'];

    public function relation()
    {
        return $this->hasMany(LabelRelation::class, 'label_id', 'id');
    }

}
