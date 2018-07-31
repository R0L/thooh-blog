<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_comments', function(Blueprint $table){
            $table->unsignedInteger('id', true)->comment('文章评论ID');
            $table->unsignedInteger('article_id')->default(0)->comment('文章ID');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->unsignedInteger('comment_id')->default(0)->comment('评论ID');
            $table->string('content')->default('')->comment('评论内容');
            $table->timestamp('create_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->index(['article_id', 'user_id', 'comment_id'], 'INX_clicks_aid_uid_cid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_comments');
    }
}
