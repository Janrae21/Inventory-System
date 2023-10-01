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
        Schema::table('_eloading_best_seller', function (Blueprint $table) {
            $table->string('Category');
            $table->date('Date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_eloading_best_seller', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('Date');
        });
    }
};
