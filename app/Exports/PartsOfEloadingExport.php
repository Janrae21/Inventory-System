<?php

namespace App\Exports;

use App\Models\PartsOfEloadingModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class PartsOfEloadingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PartsOfEloadingModel::all();
    }
}
