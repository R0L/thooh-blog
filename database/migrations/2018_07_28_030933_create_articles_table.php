<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table){
            $table->unsignedInteger('id', true)->comment('文章ID');
            $table->string('title')->default('')->unique('UK_articles_title')->comment('文章标题');
            $table->unsignedInteger('user_id')->index('
INX_articles_uid')->default(0)->comment('用户Id');
            $table->string('image_url')->comment('文章图片url');
            $table->text('content')->comment('文章内容');
            $table->unsignedInteger('source_id')->comment('来源ID');
            $table->timestamp('create_time')->default('00-00-00 00:00:00')->comment('创建时间');
            $table->timestamp('update_time')->default('00-00-00 00:00:00')->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
