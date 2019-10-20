<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactoPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function($table) {
            $table->renameColumn('productId', 'product_id');
            $table->renameColumn('billId', 'bill_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases', function($table) {
            $table->renameColumn('product_id', 'productId');
            $table->renameColumn('bill_id', 'billId');
        });
    }
}
