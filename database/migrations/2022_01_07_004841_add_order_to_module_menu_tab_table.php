<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderToModuleMenuTabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_menu_tab', function (Blueprint $table) {
            $table->unsignedInteger('order')->default(0)->after('tab_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_menu_tab', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
