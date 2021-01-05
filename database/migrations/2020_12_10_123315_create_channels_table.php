<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 50);
            $table->integer('category_id')->unsigned();
            $table->string('logo', 50)->nullable();
            $table->integer('stream_id')->unsigned();
            $table->string('url', 256);
            $table->string('description', 500);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('stream_id')->references('id')->on('stream_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
    }
}
