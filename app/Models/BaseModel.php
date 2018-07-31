<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/28
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    protected $table;

    public $timestamps = true;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    protected $casts = [];

    protected $fillable = [];

    public function getTable($withDb = false)
    {
        $table = parent::getTable();
        return $withDb ? sprintf('%s.%s', $this->getConnection()->getDatabaseName(), $table) : $table;
    }
}