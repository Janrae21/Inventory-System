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
        Schema::create('packagingmonitoring', function (Blueprint $table) {
            $table->id();
            $table->string('ItemsName');
            $table->string('Status');
            $table->double('Remaining Stocks');
            $table->double('ItemSoldAsOf');
            $table->double('Stocks Purchased');
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
        Schema::dropIfExists('packagingmonitoring');
    }
};
