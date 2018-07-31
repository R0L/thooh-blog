<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/31
 */

namespace App\Repositorys\Implement;


use App\Exceptions\GeneralException;
use App\Models\ArticleAttribute as ArticleAttributeModel;
use App\Models\ArticleComment as ArticleCommentModel;
use App\Models\User as UserModel;
use App\Repositorys\Interfaces\CommentInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentService implements CommentInterface
{

    public function add($articleId, $userName, $userEmails, $commentId =0, $commentContent)
    {
        DB::beginTransaction();
        try{
            $user = UserModel::firstOrCreate(['email'=>$userEmails], ['name'=>$userName, 'password'=> md5($userEmails)]);

            if(false === $user){
                throw new GeneralException('user find Or add fail');
            }

            $articleComment = ArticleCommentModel::Create([
                'article_id'=>$articleId,
                'user_id'=>$user->id,
                'comment_id'=>$commentId,
                'content'=>$commentContent,
                'create_time'=>time()
            ]);

            if(false === $articleComment){
                throw new GeneralException('article comment add fail');
            }

            $articleAttribute = ArticleAttributeModel::firstOrCreate(['article_id'=>$articleId], ['clicks'=>0, 'comments'=>0]);

            if(false === $articleAttribute){
                throw new GeneralException('article attribute find Or add fail');
            }

            $articleAttribute->increment('clicks');
        }catch(\Exception $e)
        {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new GeneralException($e->getMessage());
        }
        DB::commit();
    }
}