<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoToModuleTabToTabe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_tab', function (Blueprint $table) {
            $table->string('video_title')->nullable()->after('name')->comment('视频标题');
            $table->string('video_url')->nullable()->after('video_title')->comment('视频源');
            $table->string('video_cover')->nullable()->after('video_url')->comment('视频封面');
            $table->text('video_brief')->nullable()->after('video_cover')->comment('视频介绍');
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
            $table->dropColumn(['video_title', 'video_url', 'video_cover', 'video_brief']);
        });
    }
}
