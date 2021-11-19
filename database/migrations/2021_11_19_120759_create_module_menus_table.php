<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('名称');
            $table->string('en_name')->nullable()->comment('英文名');
            $table->text('brief')->nullable()->comment('简介');
            $table->string('cover')->nullable()->comment('封面图');
            $table->string('bg_img')->nullable()->comment('背景图');
            $table->string('dot_img')->nullable()->comment('圆配图');
            $table->json('tags_img')->nullable()->comment('标签图');
            $table->string('video_title')->nullable()->comment('视频标题');
            $table->string('video_url')->nullable()->comment('视频源');
            $table->text('video_brief')->nullable()->comment('视频介绍');
            $table->string('videos_duration')->nullable()->comment('视频时长');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_menus');
    }
}
