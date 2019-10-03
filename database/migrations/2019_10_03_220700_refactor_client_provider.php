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
        Schema::rename('client', 'clients');
        Schema::rename('bill', 'bills');
        Schema::rename('address', 'addresses');
        Schema::rename('provider', 'providers');
        Schema::rename('purchase', 'purchases');
        Schema::rename('product', 'products');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('clients', 'client');
        Schema::rename('bills', 'bill');
        Schema::rename('addresses', 'address');
        Schema::rename('providers', 'provider');
        Schema::rename('purchases', 'purchase');
        Schema::rename('products', 'product');
    }
}
