<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingMonitoringModel extends Model
{
    protected $table = 'packagingmonitoring';
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
