<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgeTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('knowledge_id')->nullable()->comment('知识库');
            $table->foreign('knowledge_id')->references('id')->on('knowledge')->onDelete('cascade');
            $table->unsignedInteger('tag_id')->nullable()->comment('标签');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('knowledge_tag');
    }
}
