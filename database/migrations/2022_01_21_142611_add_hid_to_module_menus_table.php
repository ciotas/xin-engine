<?php

use App\Models\ModuleMenu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHidToModuleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_menus', function (Blueprint $table) {
            $table->string('hid')->nullable()->after('en_name')->default(ModuleMenu::HEADER_TAB_NAME_A);
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
            $table->dropColumn('hid');
        });
    }
}
