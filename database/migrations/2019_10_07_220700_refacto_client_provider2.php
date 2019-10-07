<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactoClientProvider2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function($table) {
            $table->string('mobile');
            $table->string('addressId, address_id');
        });

        Schema::table('providers', function($table) {
            $table->string('mobile');
            $table->string('addressId, address_id');
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
            $table->dropColumn('mobile');
            $table->dropColumn('addressId, address_id');
        });

        Schema::table('providers', function($table) {
            $table->dropColumn('mobile');
            $table->dropColumn('addressId, address_id');
        });
    }
}
