<?php

namespace App\Exports;

use App\Models\PisoWifi_parts_accessories;
use Maatwebsite\Excel\Concerns\FromCollection;

class PisoWifi_parts_AccessoriesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PisoWifi_parts_accessories::all();
    }
}
