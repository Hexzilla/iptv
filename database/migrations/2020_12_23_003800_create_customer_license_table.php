<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLicenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_license', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('customer')->unsigned();
            $table->integer('license')->unsigned();
            $table->foreign('customer')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('license')->references('id')->on('license')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_license');
    }
}
