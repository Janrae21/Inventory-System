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
        Schema::create('_parts_of_eloading', function (Blueprint $table) {
            $table->id();
            $table->string('ItemsName');
            $table->string('Status');
            $table->double('RemainingStocks');
            $table->double('ItemSoldAsOf');
            $table->double('StocksPurchased');
            $table->double('ActualStocksBasedonactualchecking(EDUD)');
            $table->double('Damageormissingorforesting');
            $table->string('UpcomingStocks');
            $table->string('RemarksUpdatedAsOf');
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
        Schema::dropIfExists('_parts_of_eloading');
    }
};
