<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/13
 */

namespace App\Repositorys\Interfaces;


interface ArticleInterface
{

    const ARTICLE_CREATE_TIME_DESC = 0; // 文章创建时间
    const ARTICLE_UPDATE_TIME_DESC = 1; // 文章更新时间
    const ARTICLE_CLICK_TIME_DESC = 2;  // 文件点击时间
    const ARTICLE_COMMENT_TIME_DESC = 3; // 文件评论时间

    const PAGE_SIZE = 5;

    // 文章列表
    function getList($title = null, $sourceId =null, $labelId =null, $orderBy = self::ARTICLE_CREATE_TIME_DESC, $page = 0, $limit = self::PAGE_SIZE, $isTotal = true, $aticleId = null);

    // 文章详情
    function details($id);

    // 创建文章
    function add($articles);

    // 修改文章
    function update($id, $article);

    // 删除文章
    function delete($ids);

    // 浏览文章
    function click($id);

    // 评论文章
    function comment($id, $userId, $comment_id, $content);
}