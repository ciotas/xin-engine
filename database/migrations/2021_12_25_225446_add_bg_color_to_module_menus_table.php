<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBgColorToModuleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_menus', function (Blueprint $table) {
            $table->string('bg_color')->nullable()->after('bg_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_menus', function (Blueprint $table) {
            $table->dropColumn('bg_color');
        });
    }
}
