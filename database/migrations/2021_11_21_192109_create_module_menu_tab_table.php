<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleMenuTabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_menu_tab', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('module_menu_id')->index()->comment('模块');
            $table->foreign('module_menu_id')->references('id')->on('module_menus')->onDelete('cascade');
            $table->unsignedInteger('tab_id')->index()->comment('栏目');
            $table->foreign('tab_id')->references('id')->on('tabs')->onDelete('cascade');
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
        Schema::dropIfExists('module_menu_tab');
    }
}
