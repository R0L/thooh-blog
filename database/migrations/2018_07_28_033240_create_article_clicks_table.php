<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_clicks', function(Blueprint $table){
            $table->unsignedInteger('id', true)->comment('文章点击ID');
            $table->unsignedInteger('article_id')->default(0)->comment('文章ID');
            $table->unsignedInteger('user_id')->default(0)->comment('用户ID');
            $table->timestamp('create_time')->comment('创建时间');
            $table->unique(['article_id', 'user_id', 'create_time'], 'UK_clicks_aid_uid_ct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_clicks');
    }
}
