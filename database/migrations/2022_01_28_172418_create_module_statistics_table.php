<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('module_tab_id')->index()->nullable()->comment('模块tab');
            $table->unsignedInteger('theme_id')->nullable()->comment('主题');
            $table->unsignedInteger('module_menu_id')->nullable()->comment('模块');
            $table->unsignedInteger('num')->default('0')->nullable()->comment('数量');
            $table->string('day')->index()->nullable()->comment('天')->default(Carbon::now()->toDateString());
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
        Schema::dropIfExists('module_statistics');
    }
}
