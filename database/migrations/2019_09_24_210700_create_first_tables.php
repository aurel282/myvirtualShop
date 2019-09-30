<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->text('street');
            $table->integer('number');
            $table->text('zip');
            $table->text('city');
            $table->text('country');
        });

        Schema::create('provider', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('firstname');
            $table->text('email');
            $table->text('type');
            $table->longText('description');
            $table->integer('addressId')->unsigned();
            $table->foreign('addressId')->references('id')->on('address');
        });

        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('firstname');
            $table->text('email');
            $table->text('type');
            $table->longText('description');
            $table->integer('addressId')->unsigned();
            $table->foreign('addressId')->references('id')->on('address');
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('typeId');
            $table->longText('description');
            $table->integer('providerId')->unsigned();
            $table->foreign('providerId')->references('id')->on('provider');
            $table->integer('quantity');
            $table->decimal('price_per_unity');
        });

        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->integer('clientId')->unsigned();
            $table->foreign('clientId')->references('id')->on('client');
            $table->boolean('isPaid');
        });

        Schema::create('purchase', function (Blueprint $table) {
            $table->integer('productId')->unsigned();
            $table->foreign('productId')->references('id')->on('product');
            $table->integer('quantity');
            $table->integer('billId')->unsigned();
            $table->foreign('billId')->references('id')->on('bill');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
        Schema::dropIfExists('bill');
        Schema::dropIfExists('product');
        Schema::dropIfExists('client');
        Schema::dropIfExists('provider');
        Schema::dropIfExists('address');
    }
}
