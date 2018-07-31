<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/25
 */

namespace App\Repositorys\Implement;


use App\Repositorys\Interfaces\MarkDownInterface;

class MarkDownService implements MarkDownInterface
{
    private $parsedown = null;

    public function __construct()
    {
        $this->parsedown = new \Parsedown();
        $this->parsedown->setSafeMode(true);
        $this->parsedown->setMarkupEscaped(true);
    }

    public function parse($content)
    {
        return $this->parsedown->text($content);
    }

    public function parseFile($file)
    {
        $content = file_get_contents($file);
        return $this->parse($content);
    }

}