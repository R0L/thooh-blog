<?php

namespace App\Listeners;

use App\Events\ClickViewEvent;
use App\Exceptions\GeneralException;
use App\Models\Article as ArticleModel;
use App\Models\ArticleAttribute as ArticleAttributeModel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClickEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ClickViewEvent $event
     * @return void
     * @throws \App\Exceptions\GeneralException
     */
    public function handle(ClickViewEvent $event)
    {
        if(isset($event->articleId)){
           $id = $event->articleId;
            try{
                DB::beginTransaction();

                $result = $article = ArticleModel::with('attribute')->find($id);
                if(empty($result)){
                    throw new GeneralException('article id not exists');
                }

                if (isset($article->attribute->clicks))
                {
                    $clicks_num = $article->attribute->clicks;
                    $result = $article->attribute()->update(['clicks' => $clicks_num + 1]);
                }
                else
                {
                    $result = $article->attribute()->create(['clicks' => 1, 'comments' => 0]);
                }

                if(false === $result){
                    throw new GeneralException('change click num fail');
                }


                $result = $article->click()->create(['user_id' => '1', 'create_time' => time()]);
                if(false === $result){
                    throw new GeneralException('add click record fail');
                }
            }catch(\GeneralException $e){
                DB::rollBack();
                log::error($e->getMessage());
                throw new GeneralException($e->getMessage());
            }

            DB::commit();

        }

    }
}
