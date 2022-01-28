<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderNoToModuleTabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_tab', function (Blueprint $table) {
            $table->unsignedInteger('order_no')->default(0)->nullable()->after('video_brief');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_tab', function (Blueprint $table) {
            $table->dropColumn('order_no');
        });
    }
}
