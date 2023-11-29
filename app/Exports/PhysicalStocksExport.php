<?php

namespace App\Exports;

use App\Models\physical_Store_Computer_StocksMonitoring;
use Maatwebsite\Excel\Concerns\FromCollection;

class PhysicalStocksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return physical_Store_Computer_StocksMonitoring::all();
    }
}
