<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function(Blueprint $table){
            $table->unsignedInteger('id', true)->comment('来源ID');
            $table->string('name')->default('')->unique('UK_sources_name')->comment('来源名称');
            $table->text('info')->comment('来源名称');
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
        Schema::dropIfExists('sources');
    }
}
