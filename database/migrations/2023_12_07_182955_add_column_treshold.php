<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('_physical_store_computer_stocks_monitoring', function (Blueprint $table) {
            $table->integer('treshold');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_physical_store_computer_stocks_monitoring', function (Blueprint $table) {
            $table->dropColumn('treshold');
        });
    }
};
