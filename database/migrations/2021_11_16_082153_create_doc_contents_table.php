<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('doc_id')->index()->comment('文档');
            $table->foreign('doc_id')->references('id')->on('docs')->onDelete('cascade');
            $table->unsignedInteger('step_id')->index()->comment('步骤');
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascade');
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
        Schema::dropIfExists('doc_contents');
    }
}
