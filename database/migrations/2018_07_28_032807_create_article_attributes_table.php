<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_attributes', function(Blueprint $table){
            $table->unsignedInteger('id', true)->comment('文章属性ID');
            $table->unsignedInteger('article_id')->index('INX_attributes_aid')->default(0)->comment('文章ID');
            $table->unsignedInteger('clicks')->default(0)->comment('点击量');
            $table->unsignedInteger('comments')->default(0)->comment('评论量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_attributes');
    }
}
