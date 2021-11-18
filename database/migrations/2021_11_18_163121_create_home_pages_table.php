<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->json('banners')->nullable()->comment('Banners');
            $table->string('service_items')->nullable()->comment('服务项图片');
            $table->string('service_steps')->nullable()->comment('服务步骤图片');
            $table->string('brief')->nullable()->comment('介绍图');
            $table->json('examples')->nullable()->comment('案例');
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
        Schema::dropIfExists('home_pages');
    }
}
