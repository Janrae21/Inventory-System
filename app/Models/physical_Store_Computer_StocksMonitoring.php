<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class physical_Store_Computer_StocksMonitoring extends Model
{


    protected $table = '_physical_store_computer_stocks_monitoring';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [

        'ItemsName',
        'Status',
        'RemainingStocks',
        'StocksPurchased',
        'ActualStocksBasedonactualcheckingEDUD',
        'Damageormissingorfortesting',
        'UpcomingStocks',
        'Remarks',

    ];



}
