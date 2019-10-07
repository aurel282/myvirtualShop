<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactoClientProvider3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function($table) {
            $table->renameColumn('addressId', 'address_id');
            $table->dropColumn('addressId, address_id');
        });

        Schema::table('providers', function($table) {
            $table->renameColumn('addressId', 'address_id');
            $table->dropColumn('addressId, address_id');
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
            $table->renameColumn('address_id', 'addressId');
            $table->string('address_id, addressId');
        });

        Schema::table('providers', function($table) {
            $table->renameColumn('address_id', 'addressId');
            $table->string('address_id, addressId');
        });
    }
}
