<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/28
 */

namespace App\Repositorys\Implement;


use App\Models\Label;
use App\Models\LabelRelation;
use App\Repositorys\Interfaces\LabelInterface;
use Illuminate\Support\Facades\DB;

class LabelService implements LabelInterface
{

    public function getList($name)
    {
        $query = Label::from((new Label())->getTable().' AS l')->leftJoin((new LabelRelation())->getTable().' AS lr', 'lr.label_id', '=', 'l.id');
        $query->select(['l.id AS label_id', 'l.name AS label_name', DB::raw('count(th_lr.id) AS label_use_num')]);

        $query->groupBy(['label_id', 'label_name'])->orderBy('l.create_time', 'desc');

        return $query->get();
    }
}