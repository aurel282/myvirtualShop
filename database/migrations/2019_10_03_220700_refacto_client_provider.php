<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactoClientProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function($table) {
            $table->dropColumn('type');
            $table->dropColumn('description');
            $table->string('phone');
        });

        Schema::table('providers', function($table) {
            $table->dropColumn('type');
            $table->dropColumn('description');
            $table->string('phone');
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
            $table->text('type');
            $table->longText('description');
            $table->dropColumn('phone');
        });

        Schema::table('providers', function($table) {
            $table->text('type');
            $table->longText('description');
            $table->dropColumn('phone');
        });
    }
}
