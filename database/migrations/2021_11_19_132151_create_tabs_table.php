<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('module_menu_id')->index()->nullable()->comment('大模块');
            $table->foreign('module_menu_id')->references('id')->on('module_menus')->onDelete('cascade');
            $table->string('name')->nullable()->comment('名称');
            $table->text('brief')->nullable()->comment('介绍');
            $table->json('features')->nullable()->comment('特点');
            $table->string('prictice_title')->nullable()->comment('实操标题');
            $table->string('prictice_video_url')->nullable()->comment('视频源');
            $table->text('prictice_brief')->nullable()->comment('视频描述');
            $table->string('card_title')->nullable()->comment('工具卡标题');
            $table->string('card_img')->nullable()->comment('工具卡图片');
            $table->text('card_brief')->nullable()->comment('工具卡描述');
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
        Schema::dropIfExists('tabs');
    }
}
