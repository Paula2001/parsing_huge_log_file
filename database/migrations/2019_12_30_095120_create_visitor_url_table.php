<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorUrlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_url', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('visitor_id')->unsigned();
            $table->integer('url_id')->unsigned();
            $table->foreign('visitor_id')->on('visitors')->references('id');
            $table->foreign('url_id')->on('urls')->references('id');
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
        Schema::dropIfExists('visitor_url');
    }
}
