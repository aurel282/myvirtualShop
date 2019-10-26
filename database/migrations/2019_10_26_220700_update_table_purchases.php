<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablePurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function($table) {
            $table->increments('id');
        });

        Schema::dropIfExists('settings');

        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->float('fixed_fee');
            $table->float('variable_fee');
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
            $table->dropColumn('id');
        });

        Schema::dropIfExists('settings');

        Schema::create('settings', function (Blueprint $table) {
            $table->increments('fixed_fee');
            $table->text('variable_fee');
        });
    }
}
