<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTabsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabs', function (Blueprint $table) {
            $table->string('title')->after('name')->nullable()->comment('栏目主题');
            $table->string('prictice_video_cover')->after('prictice_video_url')->nullable();
            $table->json('cards')->after('prictice_video_cover')->nullable();
            $table->string('prictice_video_duration')->nullable()->after('prictice_video_cover');
            $table->unsignedInteger('prictice_difficult')->default(0)->after('prictice_video_duration')->nullable();
            $table->json('prictice_points')->nullable()->after('prictice_difficult');
            $table->dropColumn('card_title', 'card_img', 'card_brief', 'prictice_brief');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabs', function (Blueprint $table) {
            $table->dropColumn(['title', 'prictice_video_cover', 'cards', 'prictice_video_duration']);
            
        });
    }
}
