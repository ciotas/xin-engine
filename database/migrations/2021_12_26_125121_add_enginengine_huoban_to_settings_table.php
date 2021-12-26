<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnginengineHuobanToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('huoban_logo')->nullable()->after('tips');
            $table->string('huoban_title')->nullable()->after('huoban_logo');
            $table->string('huoban_desc')->nullable()->after('huoban_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['huoban_logo', 'huoban_title', 'huoban_desc']);
        });
    }
}
