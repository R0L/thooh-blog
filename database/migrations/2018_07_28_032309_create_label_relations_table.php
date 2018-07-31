<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_relations', function(Blueprint $table){
            $table->unsignedInteger('id', true)->comment('标签关联ID');
            $table->unsignedInteger('label_id')->default(0)->comment('标签ID');
            $table->unsignedTinyInteger('type')->default(0)->comment('标签类型：0 文章；1 用户；默认 0');
            $table->unsignedInteger('relation_id')->default(0)->comment('关联ID');
            $table->timestamp('create_time')->nullable()->comment('创建时间');
            $table->timestamp('update_time')->nullable()->comment('更新时间');
            $table->unique(['type', 'label_id', 'relation_id'], 'UK_relations_type_lid_rid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_relations');
    }
}
