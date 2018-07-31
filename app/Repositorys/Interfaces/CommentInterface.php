<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/31
 */
namespace App\Repositorys\Interfaces;

interface CommentInterface
{


    public function add($articleId, $userName, $userEmails, $commentId =0, $commentContent);

}