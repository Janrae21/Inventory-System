<?php

namespace App\Exports;

use App\Models\PackagingMonitoringModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class PackagingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PackagingMonitoringModel::all();
    }
}
