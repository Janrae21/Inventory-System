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
        Schema::create('_physical_store_computer_stocks_monitoring', function (Blueprint $table) {
            $table->id();
            $table->string('ItemsName');
            $table->string('Status');
            $table->integer('RemainingStocks');
            $table->integer('StocksPurchased');
            $table->integer('ActualStocksBasedonactualcheckingEDUD');
            $table->integer('Damageormissingorfortesting');
            $table->integer('UpcomingStocks');
            $table->string('Remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_physical_store_computer_stocks_monitoring');
    }
};
