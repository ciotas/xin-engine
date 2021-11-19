<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner')->nullable()->comment('Banner');
            $table->string('video_title')->nullable()->comment('视频标题');
            $table->string('video_url')->nullable()->comment('视频源');
            $table->string('video_brief')->nullable()->comment('视频介绍');
            $table->string('title')->nullable()->comment('模块标题');
            $table->text('brief')->nullable()->comment('模块介绍');
            $table->string('image')->nullable()->comment('底部配图');
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
        Schema::dropIfExists('menu_pages');
    }
}
