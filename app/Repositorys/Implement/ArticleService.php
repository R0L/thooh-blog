<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/28
 */

namespace App\Repositorys\Implement;


use App\Exceptions\GeneralException;
use App\Models\Article as ArticleModel;
use App\Models\ArticleAttribute as ArticleAttributeModel;
use App\Models\Label as LabelModel;
use App\Models\LabelRelation as LabelRelationModel;
use App\Models\Source as SourceModel;
use App\Repositorys\Interfaces\ArticleInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticleService implements ArticleInterface
{
    function getList($title = null, $sourceId =null, $labelId =null, $orderBy = ArticleInterface::ARTICLE_CREATE_TIME_DESC, $page = 0, $limit = ArticleInterface::PAGE_SIZE, $isTotal = true, $aticleId = null)
    {
        $query = ArticleModel::from((new ArticleModel())->getTable().' AS a')->leftJoin((new ArticleAttributeModel())->getTable().' AS aa', 'aa.article_id', '=', 'a.id')->leftJoin((new SourceModel())->getTable().' AS s', 's.id', '=', 'a.source_id');
        $query = $query->select(['a.id', 'a.title AS article_title', 'a.content AS article_content', 'a.image_url AS article_image_url', 'a.create_time AS article_create_time', 'a.update_time AS article_update_time', 'aa.clicks', 'aa.comments', 's.id AS source_id', 's.name AS source_name', 's.info AS source_info']);
        if(isset($title)){
            $query->where('title', 'like', "%{$title}%");
        }
        if(isset($labelId))
        {
            $query->leftJoin((new LabelRelationModel())->getTable().' AS lr', 'lr.relation_id', '=', 'a.id')->leftJoin((new LabelModel())->getTable().' AS l', 'l.id', '=', 'lr.label_id');
            $query->addSelect(['l.name as label_name']);
            $query->where('l.id', $labelId);
        }

        if(isset($aticleId))
        {
            $query->where('a.id', '!=', $aticleId);
        }

        switch($orderBy){
            case ArticleInterface::ARTICLE_CREATE_TIME_DESC:
                $query->orderBy('article_create_time', 'desc');
                break;
            case ArticleInterface::ARTICLE_UPDATE_TIME_DESC:
                $query->orderBy('article_update_time', 'desc');
                break;
            case ArticleInterface::ARTICLE_CLICK_TIME_DESC:
                $query->orderBy('clicks', 'desc');
                break;
            case ArticleInterface::ARTICLE_COMMENT_TIME_DESC:
                $query->orderBy('comments', 'desc');
                break;
        }

        $articles = array();
        $query = tap($query, function ($query) use (&$articles, $page, $limit){
            $articles = $query->limit($limit)->offset($page*$limit)->get();
        });

        $result = array();
        if ($isTotal)
        {
            $result['total'] = $query->count();
            $result['pageTotal'] = ceil($result['total']/$limit);
            $result['page'] = $page;
            $result['list'] = $articles;
        }
        else
        {
            $result = $articles;
        }

        return $result;
    }

    function details($id)
    {
        return ArticleModel::with(['attribute', 'source', 'labels'])->find($id);
    }

    function add($insertArr)
    {
        if(!isset($insertArr[0])){
            $insertArr = array($insertArr);
        }
        try{
            DB::beginTransaction();
            foreach($insertArr as $insertData)
            {


                $label = LabelModel::firstOrCreate(['name'=>$insertData['labelName']]);

                if(false === $label){
                    throw new GeneralException('label find Or add fail');
                }

                $source = SourceModel::firstOrCreate(['name'=>$insertData['sourceName'], 'info'=>$insertData['sourceInfo']]);

                if(false === $source){
                    throw new GeneralException('source find Or add fail');
                }

                $article = ArticleModel::create([
                    'title'=>$insertData['title'],
                    'user_id'=>$insertData['userId'],
                    'content'=>$insertData['content'],
                    'source_id'=>$source->id,
                    'image_url'=>$insertData['imageUrl']
                ]);
                if(false === $article){
                    throw new GeneralException('article add fail');
                }

                $articleAttribute = ArticleAttributeModel::create(['article_id'=>$article->id, 'clicks'=>0, 'comments'=>0]);

                if(false === $articleAttribute){
                    throw new GeneralException('article attribute add fail');
                }

                $labelRelation = LabelRelationModel::create(['label_id' => $label->id, 'relation_id' => $article->id]);

                if(false === $labelRelation){
                    throw new GeneralException('label relation add fail');
                }
            }

        }catch(\Exception $e)
        {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new GeneralException($e->getMessage());
        }
        DB::commit();
    }

    function update($id, $article)
    {
        // TODO: Implement update() method.
    }

    function delete($ids)
    {
        // TODO: Implement delete() method.
    }

    function click($id)
    {
        // TODO: Implement click() method.
    }

    function comment($id, $userId, $comment_id, $content)
    {
        // TODO: Implement comment() method.
    }
}