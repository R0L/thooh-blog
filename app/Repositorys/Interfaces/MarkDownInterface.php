<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/25
 */

namespace App\Repositorys\Interfaces;


interface MarkDownInterface
{


    public function parse($content);

    public function parseFile($file);


}