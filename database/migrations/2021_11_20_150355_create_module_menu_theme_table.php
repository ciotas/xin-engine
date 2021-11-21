<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleMenuThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_menu_theme', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('theme_id')->index()->comment('主题');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->unsignedInteger('module_menu_id')->index()->comment('模块');
            $table->foreign('module_menu_id')->references('id')->on('module_menus')->onDelete('cascade');
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
        Schema::dropIfExists('module_menu_theme');
    }
}
