<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactoPeople extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function($table) {
            $table->text('phone')->nullable()->change();
            $table->text('mobile')->nullable()->change();
            $table->text('email')->nullable()->change();
        });
        Schema::table('providers', function($table) {
            $table->text('phone')->nullable()->change();
            $table->text('mobile')->nullable()->change();
            $table->text('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function($table) {
            $table->text('phone')->nullable()->change();
            $table->text('mobile')->nullable()->change();
            $table->text('email')->nullable()->change();
        });
        Schema::table('providers', function($table) {
            $table->text('phone')->nullable()->change();
            $table->text('mobile')->nullable()->change();
            $table->text('email')->nullable()->change();
        });
    }
}
